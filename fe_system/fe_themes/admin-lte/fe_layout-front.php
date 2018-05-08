<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
?>
<?php include "fe_head.php"; ?>
  <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper">

    <?php include "fe_menus-dropdown-front.php"; ?>
    <?php //include "fe_menus-sidebar-front.php"; ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      <?php include "fe_system/fe_config/fe_config_control-front.php"; ?>
            <!-- GANTI DARI SINI -->

          <!-- GANTI DARI SINI -->
      </div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b><?php echo fe_app_version; ?></b>
        </div>
        <?php
          if(!check_license()){
            ?>
              <strong>Copyright &copy; <?php echo fe_app_year; ?> <a href="https://flazengine.com" target="_blank">FlazEngine.Com</a></strong> All rights reserved.
            <?php
          }else{
            ?>
              <strong>Copyright &copy; <?php echo fe_app_year; ?> <a href="https://flazengine.com" target="_targe">FlazEngine.Com</a></strong> All rights reserved | Developed by <strong><a href="<?php echo fe_app_author_url;?>"><?php echo fe_app_author_name; ?></a></strong>
            <?php
          }
        ?>
      </footer>

      <?php
        //include "fe_sidebar.php";
      ?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <!-- <div class="control-sidebar-bg"></div> -->
    </div><!-- ./wrapper -->
    <?php include "fe_footer.php"; ?>
