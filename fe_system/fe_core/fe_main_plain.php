<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
include "fe_system/fe_config/fe_config_app.php";
include "fe_system/fe_core/fe_config.php";
include "fe_system/fe_core/fe_module.php";
include "fe_system/fe_config/fe_module.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
	      include "fe_system/fe_core/fe_config_control.php";
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
		}else{
			if(fe_front_page==TRUE){
				include fe_back_end_theme."/fe_login.php";				
			}else{
				include fe_back_end_theme."/fe_layout-front.php";
			}
		}

	}else{
			if(fe_front_page==TRUE){
				include fe_back_end_theme."/fe_login.php";				
			}else{
				include fe_back_end_theme."/fe_layout-front.php";
			}
	}
}
?>