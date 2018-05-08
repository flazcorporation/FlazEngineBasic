<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
if (!empty($_POST)) {

    if (Sasla::isASpam()) {
		access_deny();	
    }else{

		if(validate($_POST)){
			$var['user_f_code'] 				= safe($_POST['user_f_code']);
			$var['user_f_name'] 				= safe($_POST['user_f_name']);
			$var['user_f_phone'] 				= safe($_POST['user_f_phone']);
			$var['user_f_email'] 				= safe($_POST['user_f_email']);
			if(safe($_POST['user_f_password'])!==""){
				$var['user_f_password'] 	= md5(safe($_POST['user_f_password']));
			}

			$var['user_f_status'] 			= safe($_POST['user_f_status']);
			$file['file']					= $_FILES['user_f_picture'];

			$type							= array("png","jpg"); 	// FILE TYPE LIMITATION
			$size							= 100000;				// FILE SIZE LIMITATION
			$field							= "user_f_picture";		// FIELD/COLUMN FOR PICTURE URL
			$location						= fe_data;			// FOLDER/DIRECTORY LOCATION
			$key							= "user_f_id"; 			// PRIMARY KEY OF TABLE

			$table							= "fe_user";
			$cond							= "user_f_id";
			$id 							= $_SESSION['id'];
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$execute 			= pdo_update($table,$var,$cond,$id);
					if($execute){
						if($file['file']['name']!==""){
							$upload 		= upload($file,$type,$size,$id,$location,$table,$field,$cond,$id);
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
		}else{
			error_json();
		}
	}
}


?>