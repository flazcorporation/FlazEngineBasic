<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	$form['module']         = "user";
	$form['method']         = "post";
	$form['ajax']         	= true;
	
	$form['modal'] 					= true;
	$form['reload']					= false;
	$form['edit_only'] 				= false;
	$form['edit_segment'] 			= 1;
	$form['id']						= "user_f_id";
	$form['data'] 					= "
									SELECT
										user_f_id as id,
										user_f_code,
										user_f_name,
										user_f_phone,
										user_f_email,
										user_f_status,
										user_r_user_group_f_id
									FROM
										fe_user
									WHERE
										user_f_id = :user_f_id
									";

	$form['submit']         = true;
	$form['submit_button']  = true;
	$form['title']			= "User Form";
	$form['input']          = array(
								array(
								"label"         => "User Code",
								"placeholder"   => "Type your code",
								"type"          => "text",
								"name"          => "user_f_code",
								"value"         => "",
								"required"      => FALSE,
								"unlock-for"    => group_all(),
								"access" 		=> group_all(),
								"size" 			=> "lg",
								"column" 		=> 6
								),
								array(
								"label"         => "Name",
								"placeholder"   => "Type your name",
								"type"          => "text",
								"name"          => "user_f_name",
								"value"         => "",        
								"required"      => TRUE,
								"unlock-for"    => group_all(),
								"access" 		=> group_all(),
								"size" 			=> "lg",
								"column" 		=> 6
								),
								array(
								"label"         => "Phone",
								"placeholder"   => "Your phone number",
								"type"          => "number",
								"name"          => "user_f_phone",
								"value"         => "",
								"required"      => FALSE,
								"unlock-for"    => group_all(),
								"access" 		=> group_all(),
								"size" 			=> "lg",
								"column" 		=> 6
								),
								array(
								"label"         => "Email",
								"placeholder"   => "Type your mail",
								"type"          => "email",
								"name"          => "user_f_email",
								"value"         => "",
								"required"      => TRUE,
								"unlock-for"    => group_all(),
								"access" 		=> group_all(),
								"size" 			=> "lg",
								"column" 		=> 6
								),
								array(
								"label"         => "Password",
								"placeholder"   => "Type to change password",
								"type"          => "password",
								"name"          => "user_f_password",
								"value"         => "",
								"required"      => FALSE,
								"unlock-for"    => group_all(),
								"access" 		=> group_all(),
								"size" 			=> "lg",
								"column" 		=> 6
								),
								array(
								"label"         => "Status",
								"default-empty" => "Your Status",
								"placeholder"   => "Your status",
								"type"          => "select",
								"name"          => "user_f_status",
								"option"        => array("Active","Inactive"),
								"value"         => "",
								"required"      => TRUE,
								"unlock-for"    => group_all(),
								"access" 		=> group_all(),
								"size" 			=> "lg",
								"column" 		=> 6
								),
								array(
								"label"         => "Access",
								"placeholder" 	=> "Your access",
								"type"          => "select_query",
								"name"          => "user_r_user_group_f_id",
								"query" 		=> "
												SELECT
													user_group_f_id,
													user_group_f_name
												FROM
													fe_user_group
												",
								"value"         => "",
								"required"      => TRUE,
								"unlock-for"    => group_all(),
								"access" 		=> group_all(),
								"size" 			=> "lg",
								"column" 		=> 6
								),
								array(
								"label"         => "Picture",
								"placeholder"   => "Pick to change picture",
								"type"          => "file",
								"name"          => "user_f_picture",
								"value"         => "",
								"required"      => FALSE,
								"unlock-for"    => group_all(),
								"access" 		=> group_all(),
								"size" 			=> "lg",
								"column" 		=> 6
								)
							);		

form($form);
?>