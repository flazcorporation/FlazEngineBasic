<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
$table['name']			= "fe_user_access";
$table['id']			= "user_access_f_id";
$table['module']		= "user-access";
$table['path'] 			= dirname( __FILE__ );
$table['modal']			= true;
$table['thead']			= array("No.","Controller","Description","Action");
$table['width'] 		= array('5%','40%','45%','10%');
$table['field'] 		= array("user_access_f_id","user_access_f_url","user_access_f_desc");
$table['add']			= true;
$table['import']		= false;
$table['export_view']	= true;
$table['export_table']	= false;
$table['button_edit']	= true;
$table['button_delete']	= true;
$table['back']			= "dashboard";
$table['back_button']	= true;
$table['back_title']	= "Dashboard";
$table['title']			= "User Access List";
$table['child'] 		= false;
$table['add_segment'] 	= 1;
$table['query'] 		= "
						SELECT
							user_access_f_id,
							user_access_f_url,
							user_access_f_desc
						FROM
							fe_user_access
						";
/*
$table['data'] 	 		="
							SELECT
                                user_access_f_id as id,
                                user_access_f_url,
                                user_access_f_desc
							FROM
							fe_user_access
							WHERE
							user_access_f_id = :user_access_f_id
						";
*/
table($table);
?>