<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	if(page()=="user-access-list"){
		include fe_basic."/fe_user_access/user-access-list.php";
	}elseif(page()=="user-access-form"){
		include fe_basic."/fe_user_access/user-access-form.php";
	}elseif(page()=="user-access-form-data"){
		include fe_basic."/fe_user_access/user-access-form-data.php";
	}elseif(page()=="user-access-process"){
		include fe_basic."/fe_user_access/user-access-process.php";
	}elseif(page()=="user-access-delete"){
		include fe_basic."/fe_user_access/user-access-delete.php";
	}
?>