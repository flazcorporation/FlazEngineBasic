<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
// ----------------------------------------------------------
// ================ EDIT THIS CONFIGURATION =================
// ----------------------------------------------------------
define("fe_license","123456789");
define("fe_app_base_url","flazenginev3.local");
define("fe_app_initial","FlazEngine");
define("fe_app_title","FlazEngine");
define("fe_app_description","FlazEngine Application");
define("fe_app_logo","fe_system/fe_data/profile.png");
define("fe_app_background","green");
define("fe_app_background_font_color","white");
define("fe_app_icon","fe_system/fe_data/profile.png");
define("fe_app_version","Version 1.0");
define("fe_app_author_name","Mulyawan Sentosa");
define("fe_app_author_url","FlazHost.Com");
define("fe_app_year",date('Y'));
define("fe_back_end_theme","fe_system/fe_themes/admin-lte");
define("fe_dashboard","fe_system/fe_page/fe_basic/fe_dashboard/fe_dashboard.php");
define("fe_data","fe_system/fe_data");
define("fe_tawktosrc",'');
define("fe_app_right_click",false);
define("fe_app_skin","red");

// ---------------------- NUMBER FORMAT ----------------------
define("fe_currency_prefix", "Rp. ");
define("fe_currency_postfix", "-");
define("fe_thousand_separator", ".");
define("fe_decimal_separator", ",");
define("fe_decimal_number", "2");
// -------------------- END NUMBER FORMAT --------------------

// -------------------- DATE FORMAT --------------------
define("fe_date_separator", "/");
define("fe_date_format", "d".fe_date_separator."m".fe_date_separator."Y");
define("fe_date_format_input", "DD".fe_date_separator."MM".fe_date_separator."YYYY");
// -------------------- END DATE FORMAT --------------------

// ---------------------- TELEGRAM BOT ----------------------
define("fe_telegram_token", "");
// -------------------- END TELEGRAM BOT --------------------

// --------- FOR CONTROL & CRUD TEMPLATE --------------------
define("fe_form","form");
define("fe_table","list");
define("fe_process","process");

// --------- FOR SMS GATEWAY --------------------
define("sms_operator","domosquare"); // domosquare or zenziva
//define("sms_userkey","");
//define("sms_passkey","");
define("sms_userkey","");
define("sms_passkey","");

// --------- DEBUGING MODE --------------------
define("fe_debugging",FALSE);
define("fe_show_php_error",FALSE);
define("fe_show_mysql_error",FALSE);

// --------- VALIDATION --------------------
define("fe_val_invalid_message","Salah mengisikan Inputan");
define("fe_val_invalid_email","Harap mengisikan alamat email dengan benar");
define("fe_val_invalid_date","Harap mengisikan alamat tanggal dengan benar");
define("fe_val_required_message","Isian tidak boleh kosong");
define("fe_val_numeric_message","Isian ini harus berisi nomor");
define("fe_val_length_message","Panjang isian harus ");

// --------- ENCODE-DECODE -----------------
define("id_crypt_rot13",2);
define("id_crypt_base",2);

// ----------------------------------------------------------
// ============== END EDIT THIS CONFIGURATION ===============
// ----------------------------------------------------------
?>