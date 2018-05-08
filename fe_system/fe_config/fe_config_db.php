<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
// ----------------------------------------------------------
// ================ EDIT THIS CONFIGURATION =================
// ----------------------------------------------------------

define('driver','mysql');
define('host','localhost');
define('userdb','root');
define('pass','');
define('db','flazenginebasic');
define('uuid',TRUE);

// ----------------------------------------------------------
// ================ END EDIT THIS CONFIGURATION =================
// ----------------------------------------------------------
?>
