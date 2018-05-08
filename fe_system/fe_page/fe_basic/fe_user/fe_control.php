<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	if(page()=="user-list"){
		include fe_basic."/fe_user/user-list.php";
	}elseif(page()=="user-form"){
		include fe_basic."/fe_user/user-form.php";
	}elseif(page()=="user-form-data"){
		include fe_basic."/fe_user/user-form-data.php";
	}elseif(page()=="user-profile"){
		include fe_basic."/fe_user/fe_user-profile.php";
	}elseif(page()=="user-profile-process"){
		include fe_basic."/fe_user/fe_user-profile-process.php";
	}elseif(page()=="user-process"){
		include fe_basic."/fe_user/user-process.php";
	}elseif(page()=="user-delete"){
		include fe_basic."/fe_user/user-delete.php";
	}	
?>