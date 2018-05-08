<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	$form['module']         = "user-access";
	$form['method']         = "post";
	$form['ajax']         	= true;
	
	$form['modal'] 			= true;
	$form['reload']			= false;
	$form['edit_only'] 		= false;
	$form['edit_segment'] 	= 1;
	$form['id']				= "user_access_f_id";
	$form['data'] 			= "
							SELECT
								user_access_f_id as id,
								user_access_f_url,
								user_access_f_desc
							FROM
								fe_user_access
							WHERE
								user_access_f_id = :user_access_f_id
							";

	$form['submit']         = true;
	$form['submit_button']  = true;
	$form['title']			= "User Access Form";
	$form['input']          = array(
								array(
								"label"         => "Controller",
								"placeholder"   => "Type Controller Here, example: user-access-list",
								"type"          => "text",
								"name"          => "user_access_f_url",
								"value"         => "",
								"required"      => true,
								"unlock-for"    => group_all(),
								"access"        => group_all()
								),
								array(
								"label"         => "Access Description",
								"placeholder"   => "Type access description",
								"type"          => "text",
								"name"          => "user_access_f_desc",
								"value"         => "",
								"required"      => false,
								"unlock-for"    => group_all(),
								"access"        => group_all()
								)
							);
form($form);
?>