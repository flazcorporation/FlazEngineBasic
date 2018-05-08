<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	if(page()=="user-group-list"){
		include fe_basic."/fe_user_group/user-group-list.php";
	}elseif(page()=="user-group-form"){
		include fe_basic."/fe_user_group/user-group-form.php";
	}elseif(page()=="user-group-process"){
		include fe_basic."/fe_user_group/user-group-process.php";
	}elseif(page()=="user-group-delete"){
		include fe_basic."/fe_user_group/user-group-delete.php";
	}
?>