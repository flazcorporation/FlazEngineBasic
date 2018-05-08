<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	date_default_timezone_set('Asia/Jakarta');
	include_module();
	include_module_config();
?>