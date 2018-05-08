<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
if(uri_segment(0) == 'login-reset-password' && uri_segment(1) !== ''){
  //echo "Ada Token Nih";
  $email        = decode(uri_segment(1));
  $cekemail     = pdo_select_field_where_string("fe_user","user_f_email","user_f_email",$email);
  if($cekemail !== ''){
    ?>
    <!DOCTYPE html>
    <html>
	  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" type="image/png" href="<?php echo uri_file(fe_app_icon);?>"/>
		<title><?php echo fe_app_initial; ?> | <?php echo fe_app_description; ?></title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.5 -->
		<link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/bootstrap/css/bootstrap.min.css');?>">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/dist/css/AdminLTE.min.css');?>">
		<!-- iCheck -->
		<link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/plugins/iCheck/square/blue.css');?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
  <?php
    $type = pathinfo(fe_app_background,PATHINFO_EXTENSION);
    $filetype   = array("png","jpg","jpeg","gif");
    if(in_array($type, $filetype)){
      $background = "background-image:url(".uri_file(fe_app_background).");";
    }else{
      $background = "background-color:".fe_app_background.";";
    }
  ?>
  <body class="hold-transition login-page" style="<?php echo $background;?>">
        <div class="login-box">
          <div class="login-logo" style="color: <?php echo fe_app_background_font_color; ?>;">
	     		  <center><img src="<?php echo uri_file(fe_app_logo);?>" width="150px" height="150px"/></center>
            <b><?php echo fe_app_initial; ?></b><br /><?php echo fe_app_description; ?>
          </div><!-- /.login-logo -->
          <div class="login-box-body">
            <p class="login-box-msg">Silahkan Ketikkan Password Baru</p>
            <?php
				$token = bin2hex(openssl_random_pseudo_bytes(16));
                //setcookie("CSRFtokenChange", $token, time() + 60 * 60 * 24);
				$_SESSION['CSRFtokenChange'] 	= $token;
            ?>
            <form action="<?php echo uri_link('login-reset-password-process');?>" method="post" onsubmit="return validate();">
              <div class="form-group has-feedback">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password Baru" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" name="password" id="password1" class="form-control" placeholder="Ulangi Password Baru" required>
                <input name="CSRFtokenChange" type="hidden" value="<?php echo $token; ?>">
                <input type="hidden" name="token" class="form-control" placeholder="Token" value="<?php echo uri_segment(1); ?>" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-8">
                </div><!-- /.col -->
                <div class="col-xs-12">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button></form>
                </div><!-- /.col -->
              </div>
            <!--
            <div class="social-auth-links text-center">
              <p>- OR -</p>
              <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
              <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
            </div><!-- /.social-auth-links -->
            <!--
            <a href="#">Lupa/Pertama Kali? Ikuti Langkah Ini!</a><br>
            <a href="register.html" class="text-center">Register a new membership</a>
            -->
          </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

		<!-- jQuery 2.1.4 -->
		<script src="<?php echo uri_file(fe_back_end_theme.'/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="<?php echo uri_file(fe_back_end_theme.'/bootstrap/js/bootstrap.min.js');?>"></script>
		<!-- iCheck -->
		<script src="<?php echo uri_file(fe_back_end_theme.'/plugins/iCheck/icheck.min.js');?>"></script>
        <script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' // optional
            });
        </script>
		<script>
			function validate(){
				var pass1 = document.getElementById('password').value;
				var pass2 = document.getElementById('password1').value;
				if(pass1 === pass2){
					return true
				}else{
					swal("Password Berbeda", "Mohon ketik ulang password", "warning");
					return false;				
				}
			}
		</script>		
      </body>
    </html>
      });
<?php
	}else{
		echo "Gak Ketemu";
		//header('Location:'.fe_app_base_url);	  
	}
}else{
	echo "Gak Boleh";
	//header('Location:'.fe_app_base_url);
}
?>