<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	$table				= decode(safe($_POST['table']));
	$cond				= decode(safe($_POST['where']));
	$val 				= decode(safe($_POST['id']));
	$field				= "user_f_picture";
	$hasil 				= pdo_select_field_where_string($table,$field,$cond,$val);
	$hapus				= delete_file($hasil);
	if($hapus){
		$execute 	= pdo_delete($table,$cond,$val);
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
	}
?>