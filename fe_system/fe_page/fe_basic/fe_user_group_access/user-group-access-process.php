<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	if (uri_segment(2) !== ''){
		$var['user_group_access_r_user_group_f_id']     = safe(uri_segment(1));
		$var['user_group_access_r_user_access_f_id'] 	= decode(safe(uri_last()));
		$table				= "fe_user_group_access";
		   
		$query 				= "
								SELECT
									user_group_access_f_id,
									user_group_access_f_status
								FROM
									fe_user_group_access
								WHERE
									user_group_access_r_user_group_f_id = :user_group_access_r_user_group_f_id
								AND
									user_group_access_r_user_access_f_id = :user_group_access_r_user_access_f_id
								";
		$prepare['user_group_access_r_user_group_f_id'] 	= $var['user_group_access_r_user_group_f_id'];
		$prepare['user_group_access_r_user_access_f_id'] 	= $var['user_group_access_r_user_access_f_id'];
		
		$cek_update			    = pdo_select_query_result($query,$prepare);
		if($cek_update){
			if($cek_update['user_group_access_f_status'] == 'Active'){
				$var['user_group_access_f_status']  = "Inactive";
			}else{
				$var['user_group_access_f_status']  = "Active";            
			}
			$cond						            = "user_group_access_f_id";
			$id 						            = $cek_update['user_group_access_f_id'];
		}else{
			$var['user_group_access_f_status']  	= "Active";                        
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($cek_update){
				$execute 			= pdo_update($table,$var,$cond,$id);
				if($execute){
					success_json();
				}else{
					error_json();
				}
			}else{
				$execute 			= pdo_create($table,$var); 
				var_dump($execute);
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
		}else{
			access_deny();	        
		}
	}else{
		access_deny();	
	}
?>