<?php
//error_reporting(0); 		// Activate this option to hide all PHP error or warning
error_reporting(E_ALL);		// Uncomment this option to show all PHP error or warning
ob_start();
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')){
	require_once "fe_system/fe_core/fe_main_plain.php";	
}else{
	require_once "fe_system/fe_core/fe_main.php";
}
?>