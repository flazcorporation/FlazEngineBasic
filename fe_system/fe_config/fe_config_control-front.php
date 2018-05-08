<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	if(isset($_GET)){
		$get 		= page();
		$page 		= $get;
	}

		if($page=="kirim-sms"){
			include fe_page."/admin/sms.php";
		}else{
			header('Location:'.fe_app_base_url);
		}
?>