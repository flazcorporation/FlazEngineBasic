<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

	//----------------------------------------------------//
	// ====================== USER  ======================//
	//----------------------------------------------------//

	if(in_array(page(),$_SESSION['access'])){
		include_control();
	}else{
		access_deny();
	}
?>
