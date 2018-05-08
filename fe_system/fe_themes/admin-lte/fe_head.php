<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo fe_app_initial; ?> | <?php echo fe_app_description; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Tell the browser to be responsive to screen width -->
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/bootstrap/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/font/font-awesome-4.7.0/css/font-awesome.min.css');?>">
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/plugins/datatables/dataTables.bootstrap.css');?>">

    <link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/dist/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/dist/css/skins/_all-skins.min.css');?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/plugins/iCheck/flat/blue.css');?>">
    <!-- Morris chart -->
    
    <link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/plugins/morris/morris.css');?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/plugins/jvectormap/jquery-jvectormap-1.2.2.css');?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/plugins/datepicker/datepicker3.css');?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/plugins/daterangepicker/daterangepicker-bs3.css');?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/plugins/select2/select2.min.css');?>">
    <link rel="stylesheet" href="<?php echo uri_file(fe_back_end_theme.'/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">
    <!-- SWEET ALERT -->
    <?php
        sweetalert();
    ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" type="image/png" href="<?php echo uri_file(fe_app_icon);?>"/>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/bootstrap/js/bootstrap.min.js');?>"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>    
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/morris/morris.min.js');?>"></script>
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/datatables/core.data.js');?>"></script>

	<!-- INPUT MASKING FOR TEXT AND DATE -->
    <script src="<?php echo uri_file(fe_lib.'/input-mask/jquery.inputmask.bundle.min.js');?>"></script>
    <script src="<?php echo uri_file(fe_lib.'/input-mask/phone.min.js');?>"></script>	
	
	<!-- INPUT MASKING FOR NUMBER -->
    <script src="<?php echo uri_file(fe_lib.'/mask/jquery.mask.min.js');?>"></script>

	<!-- INPUT VALIDATION -->
    <link rel="stylesheet" href="<?php echo uri_file(fe_lib.'/validation/css/formValidation.min.css');?>">
    <script src="<?php echo uri_file(fe_lib.'/validation/js/formValidation.min.js');?>"></script>
    <script src="<?php echo uri_file(fe_lib.'/validation/js/framework/bootstrap.min.js');?>"></script>
    <script src="<?php echo uri_file(fe_lib.'/validation/js/language/id_ID.js');?>"></script>
	<!-- FLAZ ENGINE FUNCTION -->
    <script src="<?php echo uri_file(fe_core.'/fe_core.js');?>"></script>
</head>