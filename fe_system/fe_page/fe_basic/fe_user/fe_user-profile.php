<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
  if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
  }
  update_check();
  $value = pdo_select_all_where_array_result('fe_user','user_f_id',$id);
	if(!$value){
		access_deny();
	}
  $form['module']         = "user-profile";
  $form['method']         = "post";
  $form['submit']         = true;
  $form['submit_button']  = true;
	$form['title']					= "User Profile";
  $form['input']          = array(
                            array(
                            "label"         => "User Code",
                            "placeholder"   => "Type your code",
                            "type"          => "text",
                            "name"          => "user_f_code",
                            "value"         => $value['user_f_code'],
                            "required"      => FALSE,
                            "unlock-for"    => group_all(),
                            "access"        => group_all()
                            ),
                            array(
                            "label"         => "Name",
                            "placeholder"   => "Type your name",
                            "type"          => "text",
                            "name"          => "user_f_name",
                            "value"         => $value['user_f_name'],                 
                            "required"      => TRUE,
                            "unlock-for"    => group_all(),
                            "access"        => group_all()
                            ),
                            array(
                            "label"         => "Phone",
                            "placeholder"   => "Your phone number",
                            "type"          => "number",
                            "name"          => "user_f_phone",
                            "value"         => $value['user_f_phone'],
                            "required"      => FALSE,
                            "unlock-for"    => group_all(),
                            "access"        => group_all()
                            ),
                            array(
                            "label"         => "Email",
                            "placeholder"   => "Type your mail",
                            "type"          => "email",
                            "name"          => "user_f_email",
                            "value"         => $value['user_f_email'],
                            "required"      => TRUE,
                            "unlock-for"    => group_all(),
                            "access"        => group_all()
                            ),
                            array(
                            "label"         => "Password",
                            "placeholder"   => "Type to change password",
                            "type"          => "password",
                            "name"          => "user_f_password",
                            "value"         => "",
                            "required"      => FALSE,
                            "unlock-for"    => group_all(),
                            "access"        => group_all()
                            ),
                            array(
                            "label"         => "Status",
                            "default-empty" => "Your Status",
                            "placeholder"   => "Your status",
                            "type"          => "select",
                            "name"          => "user_f_status",
                            "option"        => array("Active","Inactive"),
                            "value"         => $value['user_f_status'],
                            "required"      => TRUE,
                            "unlock-for"    => group_all(),
                            "access"        => group_all()
                            ),
                            array(
                            "label"         => "Picture",
                            "placeholder"   => "Pick to change picture",
                            "type"          => "file",
                            "name"          => "user_f_picture",
                            "value"         => $value['user_f_picture'],
                            "required"      => FALSE,
                            "unlock-for"    => group_all(),
                            "access"        => group_all()
                            )
                          );
form($form);
?>