<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	$form['module']         = "user-group";
	$form['method']         = "post";
	$form['ajax']         	= true;
	
	$form['modal'] 					= true;
	$form['reload']					= false;
	$form['edit_only'] 				= false;
	$form['edit_segment'] 			= 1;
	$form['id']						= "user_group_f_id";
	$form['data'] 					= "
									SELECT
										user_group_f_id as id,
										user_group_f_name,
										user_group_f_status,
										user_group_f_desc
									FROM
									fe_user_group
									WHERE
									user_group_f_id = :user_group_f_id
									";
	
	$form['submit']         = true;
	$form['submit_button']  = true;
	$form['title']			= "User Group Form";
	$form['input']          = array(
								array(
								"label"         => "Group Name",
								"placeholder"   => "Type group name",
								"type"          => "text",
								"name"          => "user_group_f_name",
								"value"         => "",
								"required"      => FALSE,
								"unlock-for"    => group_all(),
								"access"        => group_all()
								),
								array(
								"label"         => "Group Status",
								"default-empty" => "Group Status",
								"placeholder"   => "Group status",
								"type"          => "select",
								"name"          => "user_group_f_status",
								"option"        => array("Active","Inactive"),
								"value"         => "",
								"required"      => TRUE,
								"unlock-for"    => group_all(),
								"access"        => group_all()
								),
								array(
								"label"         => "Group Description",
								"placeholder"   => "Type group description",
								"type"          => "text",
								"name"          => "user_group_f_desc",
								"value"         => "",
								"required"      => FALSE,
								"unlock-for"    => group_all(),
								"access"        => group_all()
								)
							);
form($form);
?>