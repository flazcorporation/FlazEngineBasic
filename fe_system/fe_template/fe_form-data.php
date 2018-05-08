<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
if (isset($_POST) && !empty($_POST)) {
    $id             = safe($_POST['id']);
    $where          = decode(safe($_POST['where']));
    $query          = decode($_POST['query']);
	
	$binds          = $_POST['bind'];
	if($binds){
		foreach($binds as $key => $value){
			$bind[$key] = $value;
		}		
	}
    $bind[$where]   = $id;

	$value		    = pdo_query_array_prepare($query,$bind);
    echo json_encode($value);
}else{
    access_deny();
}
?>