<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
if (!empty($_POST)){
    if (Sasla::isASpam()){
		echo "Apa";
		//access_deny();
    }else{
		if(isset($_POST['token'])){
			$email        = decode($_POST['token']);
			$cekemail     = pdo_select_field_where_string("fe_user","user_f_email","user_f_email",$email);
			if($cekemail !==''){
				$var['user_f_password']     = md5($_POST['password']);
				$pass                       = $_POST['password'];

				if (isset($_POST["CSRFtokenChange"], $_SESSION["CSRFtokenChange"])){
					if ($_POST["CSRFtokenChange"] == $_SESSION["CSRFtokenChange"]){
						$execute    = pdo_update("fe_user",$var,"user_f_email",$email);
						if($execute){
							$nama           = pdo_select_field_where_string("fe_user","user_f_name","user_f_email",$email);
							$phone          = pdo_select_field_where_string("fe_user","user_f_phone","user_f_email",$email);
							$mail['to']       = $email;
							$mail['subject']  = "Yayasan Islam Qudwatul Ummah | Password Telah Diubah";
							$mail['message']  = "
							  <center><h1>PASSWORD TELAH DIUBAH</h></center>
							  <br />
							  <br />
							  <center>
								<p />
								<h3>
								Halo <b>".$nama."</b>,
								<p />Passwod Anda telah diubah.
								<p />Sebagai Pengingat, berikut informasi login Anda:
								<br />
								<br />
								<table>
								  <tr>
									<td>No. HP</td>
									<td>:</td>
									<td>$phone</td>
								  </tr>
								  <tr>
									<td>Email</td>
									<td>:</td>
									<td>$email</td>
								  </tr>
								  <tr>
									<td>Sandi/Password</td>
									<td>:</td>
									<td>$pass</td>
								  </tr>
								</table>
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
								reset_success();
							}else{
								echo "Satu";
								//reset_email_fail();
							}
						}else{
							echo "Dua";
							//reset_fail();
						}                        
					}else{
						echo "Tiga";
						//access_deny();									
					}
				}else{
					echo "Berapa";
				}
			}else{
				echo "Empat";
				//access_deny();				
			}
		}else{
			echo "Lima";
			//access_deny();
		}
    }
}else{
	echo "Enam";
	//exit();
}
?>