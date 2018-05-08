<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	//var_dump($_FILES['file']);
	import($_FILES['file'],$_POST['table']);
	get_back();
?>