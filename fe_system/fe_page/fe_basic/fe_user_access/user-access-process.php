<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_url']."'>");
if (!empty($_POST)) {
    if (Sasla::isASpam()) {
		access_deny();	
    }else{

		if(validate($_POST)){
			$var['user_access_f_id'] 		= uuid();
			$var['user_access_f_url'] 		= safe($_POST['user_access_f_url']);
			$var['user_access_f_desc'] 		= safe($_POST['user_access_f_desc']);

			$table							= "fe_user_access";
			if(update_check()){
				$cond						= "user_access_f_id";
				$id 						= safe($_POST['id']);
			}
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				if(update_check()){
					$execute 			= pdo_update($table,$var,$cond,$id);
					if($execute){
						$message['title']	= success;
						$message['message'] = success_message;
						$message['status'] 	= "success";
						echo json_encode($message);
					}else{
						$message['title']	= error;
						$message['message'] = error_message;
						$message['status'] 	= "error";
						echo json_encode($message);
					}
				}else{
					$cekemail		= pdo_select_field_where_string("fe_user_access","user_access_f_url","user_access_f_url",$var['user_access_f_url']);
					if($cekemail){
							$message['title']    = "Fail";
							$message['message']  = "We are sorry, access name is already taken.";
							$message['status']   = "error";
							echo json_encode($message);
					}else{
						$query 			= "
												SELECT
													user_group_f_id
												FROM
													fe_user_group
												";
						$group			= pdo_query_array($query);
						$table1 		= "fe_user_group_access";
						$var1['user_group_access_f_status'] 	= "Inactive";
						$execute 			= pdo_create($table,$var);			
						foreach($group as $key => $value){
							foreach($value as $key1 => $value1){
								$var1['user_group_access_f_id'] 				= uuid();
								$var1['user_group_access_r_user_group_f_id'] 	= $value1;
								$var1['user_group_access_r_user_access_f_id'] 	= $execute;
								$execute1 			= pdo_create($table1,$var1);
							}
						}
						if($execute){
							if(update_check()){
								success_id($id);
							}else{
								success_id($execute);
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