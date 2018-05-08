<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	export(unserialize(base64_decode($_POST['data'])),unserialize(base64_decode($_POST['bind'])),$_POST['title'],$_POST['type']);
	//var_dump();
	/*
	var_dump(unserialize($_POST['data']));
	var_dump($_POST['title']);
	var_dump($_POST['type']);
	*/
	//$_POST['title']
	//$_POST['type'];
	//get_back();
?>