<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
$table['name']			= "fe_user";
$table['id']			= "user_f_id";
$table['module']		= "user";
$table['path'] 			= dirname( __FILE__ );
$table['modal']			= true;
$table['thead']			= array("No.","Name","Phone","Email","Status","Access","Action");
$table['width'] 		= array('5%','35%','10%','20%','10%','10%','10%');
$table['field'] 		= array("user_f_id","user_f_name","user_f_phone","user_f_email","user_f_status","user_group_f_name");
$table['add']			= true;
$table['import']		= false;
$table['export_view']	= true;
$table['export_table']	= false;
$table['button_edit']	= true;
$table['button_delete']	= true;
$table['back']			= "dashboard";
$table['back_button']	= true;
$table['back_title']	= "Dashboard";
$table['title']			= "Tabel Daftar Pengguna";
$table['child'] 		= false;
$table['add_segment'] 	= 1;

$table['query']			= "
						SELECT
							user_f_id,
							user_f_name,
							user_f_phone,
							user_f_email,
							user_f_status,
							user_group_f_name
						FROM
							fe_user
						LEFT JOIN
							fe_user_group
						ON
							fe_user.user_r_user_group_f_id = fe_user_group.user_group_f_id
						";
table($table);
?>