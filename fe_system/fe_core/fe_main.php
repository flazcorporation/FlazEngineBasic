<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
include "fe_system/fe_config/fe_config_app.php";
include "fe_system/fe_core/fe_config.php";
include "fe_system/fe_core/fe_module.php";
include "fe_system/fe_config/fe_module.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo fe_app_initial; ?> | <?php echo fe_app_description; ?></title>
<?php
	sweetalert();
?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
	include fe_back_end_theme."/fe_layout.php";
}else{
	
	if(isset($_GET)){
		$get 		= page();
		$page 		= $get;
	}else{
		$page 		= '';
	}
	
	if($page !== ''){
		if($page=="login"){
			include fe_back_end_theme."/fe_login.php";	
		}elseif($page=="login-check"){
			include fe_core."/fe_login-check.php";	
		}elseif($page=="login-reset-form"){
			include fe_back_end_theme."/fe_login-reset-form.php";
		}elseif($page=="login-reset-process"){
			include fe_core."/fe_login-reset.php";
		}elseif($page=="login-reset-password"){
			include fe_back_end_theme."/fe_login-reset-password.php";
		}elseif($page=="login-reset-password-process"){
			include fe_core."/fe_login-reset-password.php";
		}elseif($page=="sms-inbox"){
			include fe_page."/eschool/pesan/sms/sms-inbox.php";
		}else{
			include fe_back_end_theme."/fe_layout-front.php";
		}
	}else{
			include fe_back_end_theme."/fe_login.php";
	}
}
?>
    <script src="<?php echo uri_file(fe_core.'/fe_jquery.js'); ?>"></script>
    <script src="<?php echo uri_file(fe_lib.'/maskMoney/maskMoney.min.js'); ?>"></script>
    <script src="<?php echo uri_file(fe_lib.'/shortcut/shortcut.js'); ?>"></script>
	</body>
</html>