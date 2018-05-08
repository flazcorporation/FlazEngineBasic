<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
include fe_config."/fe_config_db.php";
include fe_config."/fe_config_access.php";
include fe_core."/fe_core.php";
//include fe_core."/fe_db_mysql.php";
include fe_core."/fe_db_pdo.php";

include fe_template."/fe_box.php";
include fe_template."/fe_calendar.php";
include fe_template."/fe_chart.php";
include fe_template."/fe_email.php";
include fe_template."/fe_sms.php";
include fe_template."/fe_field.php";
include fe_template."/fe_alert.php";
include fe_template."/fe_table.php";
include fe_template."/fe_table-old.php";
include fe_template."/fe_form.php";
include fe_template."/fe_pdf.php";
include fe_template."/fe_menu.php";
include fe_template."/fe_validation.php";

include fe_lang."/lang-en.php";

include_module();

?>