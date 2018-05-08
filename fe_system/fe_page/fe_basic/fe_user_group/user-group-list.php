<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
$table['name']						= "fe_user_group";
$table['id']						= "user_group_f_id";
$table['module']					= "user-group";
$table['path'] 						= dirname( __FILE__ );
$table['modal']						= true;
$table['thead']						= array("No.","Group Name","Status","Action");
$table['width'] 					= array('5%','65%','10%','15%');
$table['field']						= array("user_group_f_id","user_group_f_name","user_group_f_status");
$table['add']						= true;
$table['import']					= false;
$table['export_view']				= true;
$table['export_table']				= false;
$table['button_edit']				= true;
$table['button_delete']				= true;
$table['back']						= "dashboard";
$table['back_button']				= true;
$table['back_title']				= "Dashboard";
$table['title']						= "User Group List";
$table['child'] 					= false;
$table['add_segment'] 				= 1;

$table['action'][0]['title']        =  "Permission";
$table['action'][0]['icon']         =  "gear";
$table['action'][0]['url']          =  uri_link("user-group-access-list");
$table['action'][0]['type']         =  "warning";
$table['action'][0]['access']       =  array("Administrator");

$table['query']						= "
									SELECT
										fe_user_group.user_group_f_id,
										fe_user_group.user_group_f_name,
										fe_user_group.user_group_f_status
									FROM
										fe_user_group
									ORDER BY user_group_f_name ASC
									";
table($table);
?>