<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	$table				= decode(safe($_POST['table']));
	$cond				= decode(safe($_POST['where']));
	$val 				= decode(safe($_POST['id']));
	
    $table1     = "fe_user_group_access";
    $cond1      = "user_group_access_r_user_access_f_id";
	$execute    = pdo_delete($table,$cond,$val);
	$execute1   = pdo_delete($table1,$cond1,$val);
	if($execute && execute1){
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
?>