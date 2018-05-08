<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
define("fe_config","fe_system/fe_config");
define("fe_control","fe_system/fe_control");
define("fe_core","fe_system/fe_core");
define("fe_lang","fe_system/fe_lang");
define("fe_lib","fe_system/fe_lib");

define("fe_page","fe_system/fe_page");
define("fe_basic","fe_system/fe_page/fe_basic");
define("fe_excel","fe_system/fe_lib/PHPExcel_1.8.0_doc");
define("fe_purifier","fe_system/fe_lib/purifier");
define("fe_pdf","fe_system/fe_lib/fpdf17");
define("fe_ckeditor","fe_system/fe_lib/ckeditor");
define("fe_alert","fe_system/fe_lib/sweetalaert-master");
define("fe_docs","fe_system/fe_page/fe_basic/fe_docs");
define("fe_user","fe_system/fe_page/fe_basic/fe_user");
define("fe_template","fe_system/fe_template");

define("fe_login_welcome_title","Login Success");
define("fe_login_welcome_message","Welcome to ".fe_app_description);
define("fe_login_welcome_status","success");
define("fe_login_inactive_title","Login Locked");
define("fe_login_inactive_message","Login to ".fe_app_description." failed. It's inactive. Please contact Administrator!");
define("fe_login_inactive_status","error");
define("fe_login_fail_title","Login Failed");
define("fe_login_fail_message","Login to ".fe_app_description." failed. Please check your email & password!");
define("fe_login_fail_status","error");
define("fe_reset_success_title","Reset Success");
define("fe_reset_success_message","Reset Password in ".fe_app_description." Success.");
define("fe_reset_success_status","success");
define("fe_reset_fail_title","Reset Failed");
define("fe_reset_fail_message","Reset Password to ".fe_app_description." failed. Please Try Again!");
define("fe_reset_fail_status","error");
define("fe_reset_process_title","Email Sent");
define("fe_reset_process_message","Reset toke has been sent to your email. Please check your email address!");
define("fe_reset_process_status","success");
define("fe_reset_email_fail_title","No Email Found");
define("fe_reset_email_fail_message","Reset Password to ".fe_app_description." failed. Email address not found. Please Try Again!");
define("fe_reset_email_fail_status","error");
define("fe_logout_title","Logout Success");
define("fe_logout_message","Logout from ".fe_app_description." Success.");
define("fe_logout_status","success");
?>