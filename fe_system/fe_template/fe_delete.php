<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	$table				= decode(safe($_POST['table']));
	$cond				= decode(safe($_POST['where']));
	$val 				= decode(safe($_POST['id']));
	
	$execute = pdo_delete($table,$cond,$val);
	if($execute){
		success_json();
	}else{
		error_json();
	}
?>