<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
    function message($message){
        if($message['url']==""){
            $url = $_SERVER['HTTP_REFERER'];
        }
            ?>
            <meta http-equiv="refresh" content="0;url=<?php echo $message['url']; ?>">
            <script>
                swal("<?php echo $message['title']; ?>", "<?php echo $message['message']; ?>", "<?php echo $message['status']; ?>");
            </script>
        <?php
        }
    function alert($message){
		if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
			$red 	= $_SERVER['HTTP_REFERER'];
		}else{
			$red 	= fe_app_base_url;
		}
        ?>
            <meta http-equiv="refresh" content="0;url=<?php echo $red; ?>">
            <script>
                swal("<?php echo $message['title']; ?>", "<?php echo $message['message']; ?>", "<?php echo $message['status']; ?>");
            </script>
        <?php
    }
    function success(){
		if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
			$red 	= $_SERVER['HTTP_REFERER'];
		}else{
			$red 	= fe_app_base_url;
		}
        ?>
            <meta http-equiv="refresh" content="0;url=<?php echo $red; ?>">
            <script>
                swal("<?php echo success; ?>", "<?php echo success_message; ?>", "success");
            </script>
        <?php
    }
    function success_url($url){
        ?>
            <meta http-equiv="refresh" content="0;url=<?php echo $url; ?>">
            <script>
                swal("<?php echo success; ?>", "<?php echo success_message; ?>", "success");
            </script>
        <?php
    }
    function error(){
		if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
			$red 	= $_SERVER['HTTP_REFERER'];
		}else{
			$red 	= fe_app_base_url;
		}
        ?>
            <meta http-equiv="refresh" content="0;url=<?php echo $red; ?>">
            <script>
                swal("<?php echo error; ?>", "<?php echo error_message; ?>", "error");
            </script>
        <?php
    }
    function success_message($title,$message,$url){
        if($url==""){
			if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
				$red 	= $_SERVER['HTTP_REFERER'];
			}else{
				$red 	= fe_app_base_url;
			}
        }
        ?>
                <meta http-equiv="refresh" content="0;url=<?php echo $red; ?>">
                <script>
                    swal("<?php echo $title; ?>", "<?php echo $message; ?>", "success");
                </script>
        <?php
    }
    function error_message($title,$message,$url){
        if($url==""){
			if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
				$red 	= $_SERVER['HTTP_REFERER'];
			}else{
				$red 	= fe_app_base_url;
			}
        }
                ?>
                <meta http-equiv="refresh" content="0;url=<?php echo $red; ?>">
                <script>
                    swal("<?php echo $title; ?>", "<?php echo $message; ?>", "error");
                </script>
        <?php
    }
    function back(){
		if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
			$red 	= $_SERVER['HTTP_REFERER'];
		}else{
			$red 	= fe_app_base_url;
		}
        return $red;        
    }
    function get_back(){
		if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
			$red 	= $_SERVER['HTTP_REFERER'];
		}else{
			$red 	= fe_app_base_url;
		}
    ?>
        <meta http-equiv="refresh" content="0;url=<?php echo $red; ?>">
    <?php
    }
    function access_deny(){
				if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
					$red 	= $_SERVER['HTTP_REFERER'];
				}else{
					$red 	= fe_app_base_url;
				}
                ?>
				<meta http-equiv="refresh" content="0;url=<?php echo $red; ?>">
                <script>
                swal("<?php echo access_deny; ?>", "<?php echo deny_message; ?>", "error");
                </script>
                <?php                               
    }    
    function login_welcome(){
        ?>
            <meta http-equiv="refresh" content="0;url=<?php echo uri_link('dashboard');?>">
            <script>
                swal("<?php echo fe_login_welcome_title; ?>", "<?php echo fe_login_welcome_message; ?>", "<?php echo fe_login_welcome_status; ?>");
            </script>
        <?php
    }
    function login_inactive(){
        ?>
            <meta http-equiv="refresh" content="0;url=<?php echo $_SERVER['HTTP_REFERER']; ?>">
            <script>
                swal("<?php echo fe_login_inactive_title; ?>", "<?php echo fe_login_inactive_message; ?>", "<?php echo fe_login_inactive_status; ?>");
            </script>
        <?php
    }
    function login_fail(){
        ?>
            <meta http-equiv="refresh" content="0;url=<?php echo $_SERVER['HTTP_REFERER']; ?>">
            <script>
                swal("<?php echo fe_login_fail_title; ?>", "<?php echo fe_login_fail_message; ?>", "<?php echo fe_login_fail_status; ?>");
            </script>
        <?php
    }
    function reset_success(){
        ?>
            <meta http-equiv="refresh" content="2;url=<?php echo uri_link('login');?>">
            <script>
                swal("<?php echo fe_reset_success_title; ?>", "<?php echo fe_reset_success_message; ?>", "<?php echo fe_reset_success_status; ?>");
            </script>
        <?php
    }
    function reset_fail(){
        ?>
            <meta http-equiv="refresh" content="0;url=<?php echo $_SERVER['HTTP_REFERER']; ?>">
            <script>
                swal("<?php echo fe_reset_fail_title; ?>", "<?php echo fe_reset_fail_message; ?>", "<?php echo fe_reset_fail_status; ?>");
            </script>
        <?php
    }
    function reset_process(){
        ?>
            <meta http-equiv="refresh" content="0;url=<?php echo uri_link('login');?>">
            <script>
                swal("<?php echo fe_reset_process_title; ?>", "<?php echo fe_reset_process_message; ?>", "<?php echo fe_reset_process_status; ?>");
            </script>
        <?php
    }
    function reset_email_fail(){
        ?>
            <meta http-equiv="refresh" content="0;url=<?php echo $_SERVER['HTTP_REFERER']; ?>">
            <script>
                swal("<?php echo fe_reset_email_fail_title; ?>", "<?php echo fe_reset_email_fail_message; ?>", "<?php echo fe_reset_email_fail_status; ?>");
            </script>
        <?php
    }
    function logout_message(){
        ?>
            <meta http-equiv="refresh" content="0;url=<?php echo uri_link('login');?>">
            <script>
                swal("<?php echo fe_logout_title; ?>", "<?php echo fe_logout_message; ?>", "<?php echo fe_logout_status; ?>");
            </script>
        <?php
    }
    function sweetalert(){
    ?>
        <script src="<?php echo uri_file(fe_lib.'/sweetalert-master/dist/sweetalert.min.js'); ?>" type="text/javascript" language="javascript"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo uri_file(fe_lib.'/sweetalert-master/dist/sweetalert.css'); ?>">
    <?php
    }
?>