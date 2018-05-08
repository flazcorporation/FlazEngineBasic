<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
?>
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo uri_link('dashboard');?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><?php echo fe_app_initial; ?></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?php echo fe_app_title; ?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php
                  $gambar = pdo_select_field_where_string("fe_user","user_f_picture","user_f_id",$_SESSION['id']);
                  if($gambar!==""){
                  ?>
                      <img src="<?php echo uri_file($gambar); ?>" class="user-image" alt="User Image">
                  <?php
                  }else{
                  ?>
                      <img src="<?php echo uri_file(fe_data.'/profile.png');?>" class="user-image" alt="User Image">
                  <?php
                  }    
                  ?>               
                  <span class="hidden-xs"><?php echo pdo_select_field_where_string("fe_user","user_f_name","user_f_id",$_SESSION['id']); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?php
                    if($gambar!==""){
                    ?>
                        <img src="<?php echo uri_file($gambar); ?>" class="img-circle" alt="User Image">
                    <?php
                    }else{
                    ?>
                        <img src="<?php echo uri_file(fe_data.'/profile.png');?>" class="img-circle" alt="User Image">
                    <?php
                    }    
                    ?>               
                    <p>
                      <?php echo pdo_select_field_where_string("fe_user","user_f_name","user_f_id",$_SESSION['id']); ?> - <?php echo $_SESSION['groupname'][0]; ?>
                      <small><?php echo pdo_select_field_where_string("fe_user","user_f_name","user_f_id",$_SESSION['id']); ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo uri_link('user-profile');?>" class="btn btn-default btn-flat"><?php echo profile; ?></a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo uri_link('logout');?>" class="btn btn-default btn-flat"><?php echo logout; ?></a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
              </li>
            </ul>
          </div>
        </nav>
        <?php
          if(!check_license()){
            ?>
              <script>
                var online = navigator.onLine;
                if(online){
                  var ok = '<nav class="navbar navbar-static-top" style="background-color: orange;padding-left: 20px;padding-top:-20px;" role="navigation"><h3 style="color: white;"><center><b>THIS IS NOT LICENSED COPY, PLEASE BUY ON <a href="https://codecanyon.net/" target="_blank">ENVATO</a>!</b></center></h3></nav>';
                  document.write(ok);
                }else{
                  var ok1 = '<nav class="navbar navbar-static-top" style="background-color: orange;padding-left: 20px;padding-top:-20px;" role="navigation"><h3 style="color: white;"><center><b>Could not resolved license. Make sure you are connected to internet.</b></center></h3></nav>';
                  document.write(ok1);
                }
              </script>
            <?php
          }
        ?>
      </header>