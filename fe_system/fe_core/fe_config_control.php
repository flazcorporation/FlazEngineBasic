<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
// ----------------------------------------------------------
// ========= DONT EDIT THIS IF YOU DON'T UNDERSTAND =========
// ----------------------------------------------------------
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
	if(isset($_GET)){
		$get 		= page();
		$page 		= $get;
	}else{
		$page 		= '';
	}
	
	if($page !== ''){
		if($page=="dashboard"){
		    include fe_back_end_theme."/fe_dashboard-layout.php";
		}elseif($page=="login-check"){
			login_welcome();
		}elseif($page=="logout"){
		    include fe_core."/fe_logout.php";
		}elseif($page=="table-data"){
		    include fe_template."/fe_table-data.php";
		}elseif($page=="form-data"){
		    include fe_template."/fe_form-data.php";
		}else{
			include fe_core."/fe_control.php";
		}
	}else{
        include fe_back_end_theme."/fe_dashboard-layout.php";
	}
}else{
	include fe_page."/fe_basic/fe_blog/fe_front/fe_homepage.php";
}
// ----------------------------------------------------------
// ======= END DONT EDIT THIS IF YOU DON'T UNDERSTAND =======
// ----------------------------------------------------------
?>