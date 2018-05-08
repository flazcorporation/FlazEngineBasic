<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
	$fe_user	= "CREATE TABLE IF NOT EXISTS `fe_user` (
				  `user_f_id` int(11) NOT NULL AUTO_INCREMENT,
				  `user_f_code` varchar(20) NOT NULL,
				  `user_f_name` varchar(50) NOT NULL,
				  `user_f_gender` varchar(15) NOT NULL,
				  `user_f_phone` varchar(15) NOT NULL,
				  `user_f_email` varchar(50) NOT NULL,
				  `user_f_password` varchar(100) NOT NULL,
				  `user_f_status` varchar(10) NOT NULL,
				  `user_f_access` varchar(20) NOT NULL,
				  `user_f_picture` varchar(200) NOT NULL,
				  PRIMARY KEY (`user_f_id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=484";
	$user 		= "INSERT IGNORE INTO `fe_user` (`user_f_id`, `user_f_code`, `user_f_name`, `user_f_gender`, `user_f_phone`, `user_f_email`, `user_f_password`, `user_f_status`, `user_f_access`, `user_f_picture`) VALUES
					(469, 'E0001', 'Mulyawan Sentosa, S. ST.', 'Male', '6289640077916', 'flazengine@flazhost.com', '21232f297a57a5a743894a0e4a801fc3', 'Active', 'Admin', '')";
	pdo_install_table($fe_user);
//	query_plain($user);
?>