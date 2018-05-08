<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
                  <?php
                  $gambar = pdo_select_field_where_string("fe_user","user_f_picture","user_f_id",$_SESSION['id']);
                  if($gambar!==""){
                  ?>
                    <img src="<?php echo uri_file(pdo_select_field_where_string("fe_user","user_f_picture","user_f_id",$_SESSION['id'])); ?>" class="user-image" alt="User Image">
                  <?php
                  }else{
                  ?>
                    <img src="<?php echo uri_file('fe_system/fe_data/profile.png');?>" class="user-image" alt="User Image">
                  <?php
                  }    
                  ?>               
            </div>
            <div class="pull-left info">
              <p><?php echo pdo_select_field_where_string("fe_user","user_f_name","user_f_id",$_SESSION['id']); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="header"><?php echo menu_list; ?></li>
            <li>
              <a href="<?php echo uri_link('dashboard');?>">
                <i class="fa fa-dashboard"></i> <span><?php echo dashboard; ?></span></i>
              </a>
            </li>
            <?php
				include_menu();
            ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
