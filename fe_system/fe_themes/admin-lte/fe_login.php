<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
?>
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
				<p class="login-box-msg"><?php echo please_login; ?></p>
				<?php
					$token = bin2hex(openssl_random_pseudo_bytes(16));
					setcookie("CSRFtokenLogin", $token, time() + 60 * 60 * 24);
				?>
				<form action="<?php echo uri_link('login-check');?>" method="post">
					<div class="form-group has-feedback">
						<input type="email" name="email" class="form-control" placeholder="Email" required>
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="password" class="form-control" placeholder="Password" required>
						<input name="CSRFtokenLogin" type="hidden" value="<?php echo $token; ?>">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-6">
						  <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo login; ?></button>
						</div><!-- /.col -->
						<div class="col-xs-6">
						  <a href="<?php echo uri_link('login-reset-form');?>" class="btn btn-primary btn-block btn-flat"><?php echo reset; ?></a>
						</div>
					</div>
				</form>
            <!-- /.col -->
			</div>
		</div><!-- /.login-box-body -->
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
      });
    </script>
    <!-- TAWK TO CHAT -->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src= '<?php echo fe_tawktosrc; ?>';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
    </script>
    <!--End of Tawk.to Script-->
    <!-- TAWK TO CHAT -->