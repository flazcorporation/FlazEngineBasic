<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
if (!empty($_POST)) {
    if (Sasla::isASpam()) {
		access_deny();	
    }else{

		if(validate($_POST)){
			$var['user_f_id'] 					= uuid();
			$var['user_f_code'] 				= safe($_POST['user_f_code']);
			$var['user_f_name'] 				= safe($_POST['user_f_name']);
	//		$var['user_f_gender'] 				= safe($_POST['user_f_gender']);
			$var['user_f_phone'] 				= safe($_POST['user_f_phone']);
			$var['user_f_email'] 				= safe($_POST['user_f_email']);
			$var['user_f_blocked'] 				= 0;
			if(update_check()){
				if(safe($_POST['user_f_password'])!==""){
					$var['user_f_password'] 	= md5(safe($_POST['user_f_password']));
				}
			}else{
				if(safe($_POST['user_f_password'])!==""){
					$var['user_f_password'] 	= md5(safe($_POST['user_f_password']));
				}else{
					$var['user_f_password'] 	= md5(rand(100000,999999));		
				}		
			}

			$var['user_f_status'] 			= safe($_POST['user_f_status']);
			$var['user_r_user_group_f_id'] 	= safe($_POST['user_r_user_group_f_id']);
			$file['file']					= $_FILES['user_f_picture'];

			$type							= array("png","jpg"); 	// FILE TYPE LIMITATION
			$size							= 100000;				// FILE SIZE LIMITATION
			$field							= "user_f_picture";		// FIELD/COLUMN FOR PICTURE URL
			$location						= fe_data;			// FOLDER/DIRECTORY LOCATION
			$key							= "user_f_id"; 			// PRIMARY KEY OF TABLE

			$table							= "fe_user";
			if(update_check()){
				$cond						= "user_f_id";
				$id 						= safe($_POST['id']);
			}
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				if(update_check()){
					$execute 			= pdo_update($table,$var,$cond,$id);
					if($execute){
						if($file['file']['name']!==""){
							$upload 		= upload($file,$type,$size,$id,$location,$table,$field,$cond,$id);
							//alert($upload);
							success_json();
						}else{
							success_json();
						}
					}else{
						error_json();
					}
				}else{
					$cekemail		= pdo_select_field_where_string("fe_user","user_f_email","user_f_email",$var['user_f_email']);
					if($cekemail){
							$message['title']    = "Fail";
							$message['message']  = "We are sorry, email is already taken.";
							$message['status']   = "error";
							echo json_encode($message);
					}else{
						$execute 			= pdo_create($table,$var);    			
						if($execute){
							if($file['file']['name']!==""){
								$upload 		= upload($file,$type,$size,$execute,$location,$table,$field,$key,$execute);
								//alert($upload);
								if(update_check()){
									success_id($id);
								}else{
									success_id($execute);
								}
							}else{
								if(update_check()){
									success_id($id);
								}else{
									success_id($execute);
								}
							}	    			
						}else{
							error_json();
						}

					}

				}
			}			
		}else{
			error_json();
		}
	}
}else{
	access_deny();	
}
?>