<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	function sms($telp,$msg){
		if(sms_operator == "zenziva"){
			$msg1 		= str_replace(" ", "+", $msg);
			$results 	= fopen("https://reguler.zenziva.net/apps/smsapi.php?userkey=".sms_userkey."&passkey=".sms_passkey."&nohp=$telp&pesan=$msg1","r");
			if($result){
				return TRUE;
			}else{
				return FALSE;
			}			
		}elseif(sms_operator == "domosquare"){
			$smslist[] = array('nomor'=>$telp,'pesan'=>$msg);
			$ch = @curl_init();
			$smslist2 = base64_encode(serialize($smslist));
			$posts = array('login_api'=>sms_userkey,'token'=>sms_passkey,'smslist'=>$smslist2);
			curl_setopt($ch, CURLOPT_URL,'https://sms.otomat.web.id/sendsms.php');
			@curl_setopt($ch,CURLOPT_POST,1);
			@curl_setopt($ch,CURLOPT_POSTFIELDS,$posts);
			@curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
			@curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			@curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			@curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.11) Gecko/2009060215 Firefox/3.0.11");
			ob_start();
			$result = @curl_exec($ch);
			ob_end_clean();
			@curl_close($ch);
			if($result=="SUCCESS") {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
	
	function sms_all($content){
		if(sms_operator == "zenziva"){
			$results 		= array();
			foreach($content as $isi){
				$nomor 		= $isi['nomor'];
				$pesan 		= $isi['pesan'];
				$pesan1 	= str_replace(" ", "+", $pesan);
				$results[] 	= fopen("https://reguler.zenziva.net/apps/smsapi.php?userkey=".sms_userkey."&passkey=".sms_passkey."&nohp=$nomor&pesan=$pesan1","r");
			}
			if(in_array('FALSE',$results)){
				return FALSE;
			}else{
				return TRUE;
			}
		}elseif(sms_operator == "domosquare"){
			$smslist		= array();
			foreach($content as $isi){
				$nomor 		= $isi['nomor'];
				$pesan 		= $isi['pesan'];
				$smslist[] 	= array('nomor'=>$nomor,'pesan'=>$pesan);
			}
			$ch = @curl_init();
			$smslist2 = base64_encode(serialize($smslist));
			$posts = array('login_api'=>sms_userkey,'token'=>sms_passkey,'smslist'=>$smslist2);
			curl_setopt($ch, CURLOPT_URL,'https://sms.otomat.web.id/sendsms.php');
			@curl_setopt($ch,CURLOPT_POST,1);
			@curl_setopt($ch,CURLOPT_POSTFIELDS,$posts);
			@curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
			@curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			@curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			@curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.11) Gecko/2009060215 Firefox/3.0.11");
			ob_start();
			$result = @curl_exec($ch);
			ob_end_clean();
			@curl_close($ch);
			if($result=="SUCCESS") {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
	
?>