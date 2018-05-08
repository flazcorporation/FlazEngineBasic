<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
if (!empty($_POST)) {
    if (Sasla::isASpam()){
		echo "Sampai Nih";
        echo "<script>alert('What do you want?')</script>";
    } else {
		$var['email'] 				= safe($_POST['email']);
		$var['password'] 			= md5(safe($_POST['password']));
	    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if (isset($_POST["CSRFtokenLogin"], $_COOKIE["CSRFtokenLogin"])){
	            if ($_POST["CSRFtokenLogin"] == $_COOKIE["CSRFtokenLogin"]){
			    	$execute1		= pdo_select_field_where_string("fe_user","user_f_id","user_f_email",$var['email']);
			    	$execute2		= pdo_select_field_where_string("fe_user","user_f_id","user_f_password",$var['password']);
					if($execute1 && $execute2){
						$_SESSION['id'] 	= $execute1;
						$execute3		= pdo_select_field_where_string("fe_user","user_f_status","user_f_email",$var['email']);
						if($execute3=="Active"){
					    	$exe 				= pdo_select_field_where_string("fe_user","user_r_user_group_f_id","user_f_id",$execute1);
					    	$groupname 			= pdo_select_field_where_string("fe_user_group","user_group_f_name","user_group_f_id",$exe);
							//============ NEW FEATURE ON FE 2.0 ============
								$groupids 				= array($exe);
								$groupnames 			= array($groupname);
								$_SESSION['groupid'] 	= $groupids;
								$_SESSION['groupname'] 	= $groupnames;
							//============ END NEW FEATURE ON FE 2.0 ============
							$query 					= "
													SELECT
														user_access_f_url
													FROM
														fe_user_access
													RIGHT JOIN
														fe_user_group_access
													ON
														fe_user_access.user_access_f_id = fe_user_group_access.user_group_access_r_user_access_f_id
													RIGHT JOIN
														fe_user_group
													ON
														fe_user_group_access.user_group_access_r_user_group_f_id = fe_user_group.user_group_f_id
													WHERE
														user_group_f_id = :user_group_f_id
													AND
														user_group_access_f_status = :user_group_access_f_status
													";
							$attr['user_group_f_id'] 				= $exe;
							$attr['user_group_access_f_status'] 	= 'Active';
							$access					= pdo_select_query($query,$attr);
							$akses 					= array();
							$_SESSION['access'] 	= array();
							foreach($access as $key => $value){
								foreach($value as $key1 => $value1){
									$akses[] 		= $value1;
								}
							}
							$_SESSION['access'] 	= array_filter($akses);
							include_function();
							include fe_back_end_theme."/fe_layout.php";
							login_welcome();
						}elseif($execute3=="Inactive"){
							include fe_back_end_theme."/fe_layout-blank.php";
							login_inactive();
						}
					}else{
							include fe_back_end_theme."/fe_layout-blank.php";
							login_fail();
					}
	            }
	        }

	    }
    }
}
?>
