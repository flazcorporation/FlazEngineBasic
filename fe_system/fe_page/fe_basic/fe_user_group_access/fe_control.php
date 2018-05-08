<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	if(page()=="user-group-access-list"){
		include fe_basic."/fe_user_group_access/user-group-access-list.php";
	}elseif(page()=="user-group-access-process"){
		include fe_basic."/fe_user_group_access/user-group-access-process.php";
	}
?>