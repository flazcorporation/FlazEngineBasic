<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
if (!empty($_POST)) {
    if (Sasla::isASpam()){
        echo "<script>alert('What do you want?')</script>";
    }else{
		$var['email']         = safe($_POST['email']);
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if (isset($_POST["CSRFtokenReset"], $_COOKIE["CSRFtokenReset"])){
				if ($_POST["CSRFtokenReset"] == $_COOKIE["CSRFtokenReset"]){
					$execute1   = pdo_select_field_where_string("fe_user","user_f_id","user_f_email",$var['email']);
					if($execute1 !== NULL){
						$email        = pdo_select_field_where_string("fe_user","user_f_email","user_f_email",$var['email']);
						$nama         = pdo_select_field_where_string("fe_user","user_f_name","user_f_email",$var['email']);
						$email1       = encode($email);
						$url          = "https://".$_SERVER['SERVER_NAME']."/login-reset-password/".$email1;

						$mail['to']       = $email;
						$mail['subject']  = "Yayasan Islam Qudwatul Ummah | Reset Login Password";
						$mail['message']  = "
							<center><h1>PERMINTAAN UBAH PASSWORD</h></center>
							<br />
							<br />
							<center>
								<p />
								<h3>
								Halo <b>".$nama."</b>,
								<p />Permintaan ubah password telah dilakukan.
								<p />Untuk melakukan pergantian password silahkan klik tombol berikut:
								<br />
								<br />
								<a href='$url' target='_blank'><button><h1>RESET PASSWORD</h1></button></a>
								<br />
								<br />
								Apabila Anda mendapatkan kesulitan, silahkan menghubungi Admin di admin@alqudwah.id.
								<br />Terima kasih,
								<br />
								<br /><b>Admin Sistem</b>
								</h3>
							</center>
						";
						$kiremail = email($mail);
						if($kiremail){
							include fe_back_end_theme."/fe_layout-blank.php";
							reset_process();
						}else{
							include fe_back_end_theme."/fe_layout-blank.php";
							reset_email_fail();
						}
						//$kirimemail     = reset_mail($mailto,$url);
					}else{
						include fe_back_end_theme."/fe_layout-blank.php";
						reset_email_fail();
					}
				}
			}
		}
	}
}
?>
