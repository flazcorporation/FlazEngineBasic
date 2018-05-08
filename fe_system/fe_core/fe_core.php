<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
// ------------------------------------------------------------- //
// ============================================================= //
// ------------------------------------------------------------- //
//  		AUTHOR 			: FLAZ CORPORATION                   //
//  		EMAIL			: flazengine@flazhost.com			 //
//  		WEB SITE		: http://flazhost.com				 //
// ------------------------------------------------------------- //
// ============================================================= //
// ------------------------------------------------------------- //
// ============================================================= //
// --------------------       CLASS     ------------------------ //
// ============================================================= //

// --------------------------------------------------------------//
// ==============================================================//
// --------------------------------------------------------------//

    function update_check(){
		if(isset($_POST['id']) && $_POST['id']!=""){
    		return TRUE;
    	}else{
    		return FALSE;
    	}
    }

    function update_id(){
        if(isset($_GET['id']) && $_GET['id']!=""){
            $id = $_GET['id'];
            return $id;
        }elseif((isset($_POST['id']) && $_POST['id']!="")){
            $id = $_POST['id'];
            return $id;
        }else{
            return FALSE;        	
        }
    }
	function safe($value){
		require_once fe_purifier."/HTMLPurifier.auto.php";
		$config = HTMLPurifier_Config::createDefault();
		$purifier = new HTMLPurifier($config);
		$clean_html = $purifier->purify($value);
		return $clean_html;
	}

	function strbefore($string, $substring){
	  $pos = strpos($string, $substring);
	  if ($pos === false)
	   return $string;
	  else
	   return(substr($string, 0, $pos));
	}

	function strafter($string, $substring) {
	  $pos = strpos($string, $substring);
	  if ($pos === false)
	   return $string;
	  else  
	   return(substr($string, $pos+strlen($substring)));
	}

	function strbetween($string, $start, $end){
	    $string = ' ' . $string;
	    $ini = strpos($string, $start);
	    if ($ini == 0) return '';
	    $ini += strlen($start);
	    $len = strpos($string, $end, $ini) - $ini;
	    return substr($string, $ini, $len);
	}

	function fe_sum(){

	}
	function fe_max(){

	}
	function fe_min(){

	}
	function fe_avg(){

	}
	function fe_count(){

	}

	function aritmatical_function($val){
	}

// --------------------------------------------------------------//
// ==============================================================//
// --------------------------------------------------------------//

// --------------------------------------------------------------//
// =========================   ENCODE DECODE ====================//
// --------------------------------------------------------------//
	function encode($string){
		if(is_int(id_crypt_rot13) && id_crypt_rot13 > 0)
		{
			for($i = 0; $i < id_crypt_rot13; $i++)
			{
				$string     = str_rot13($string);                    
			}
		}            
		if(is_int(id_crypt_base) && id_crypt_base > 0)
		{
			for($i = 0; $i < id_crypt_base; $i++)
			{
				$string     = base64_encode($string);
			}
		}            
		$string     = str_replace('/','{',$string);
		$string     = str_replace('=','}',$string);
		return $string;
	}
	function decode($string){
        $string     =  str_replace('{','/',$string);
        $string     =  str_replace('}','=',$string);
        if(is_int(id_crypt_base) && id_crypt_base > 0)
        {
            for($i = 0; $i < id_crypt_base; $i++)
            {
                $string     = base64_decode($string);
            }
        }            
        if(is_int(id_crypt_rot13) && id_crypt_rot13 > 0)
        {
            for($i = 0; $i < id_crypt_rot13; $i++)
            {
                $string     = str_rot13($string);                    
            }
        }            
        return $string;
	}
	
// --------------------------------------------------------------//
// ==============================================================//
// --------------------------------------------------------------//

    function date_id($date){
        $BulanIndo  = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");     
        $tahun      = substr($date, 0, 4);
        $bulan      = substr($date, 5, 2);
        $tgl        = substr($date, 8, 2);
        $hari       = date('D', strtotime($date));
        if($hari=="Sunday"){
            $hari_indo = "Senin";
        }elseif($hari=="Monday"){
            $hari_indo = "Senin";
        }elseif($hari=="Tuesday"){
            $hari_indo = "Selasa";
        }elseif($hari=="Wednesday"){
            $hari_indo = "Rabu";
        }elseif($hari=="Thursday"){
            $hari_indo = "Kamis";
        }elseif($hari=="Friday"){
            $hari_indo = "Jumat";
        }elseif($hari=="Saturday"){
            $hari_indo = "Sabtu";
        }
        $result     = $hari_indo.", ".$tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
        return($result);
    }    
    function logout(){
        session_destroy();
    }
    function access(){
        $access = $_SESSION['akses'];
        return $access;
    }
    function decrypt($edata, $password) {
        $data = base64_decode($edata);
        $salt = substr($data, 0, 16);
        $ct = substr($data, 16);

        $rounds = 3; // depends on key length
        $data00 = $password.$salt;
        $hash = array();
        $hash[0] = hash('sha256', $data00, true);
        $result = $hash[0];
        for ($i = 1; $i < $rounds; $i++) {
            $hash[$i] = hash('sha256', $hash[$i - 1].$data00, true);
            $result .= $hash[$i];
        }
        $key = substr($result, 0, 32);
        $iv  = substr($result, 32,16);

        return openssl_decrypt($ct, 'AES-256-CBC', $key, true, $iv);
    }    
    function xssafe($data,$encoding='UTF-8')
    {
       return htmlspecialchars($data,ENT_QUOTES | ENT_HTML401,$encoding);
    }
    function xecho($data)
    {
       echo xssafe($data);
    }
	function dir_list($dir, &$dir_array)
	{
	    // Create array of current directory
	    $files = scandir($dir);
	   
	    if(is_array($files))
	    {
	        foreach($files as $val)
	        {
	            // Skip home and previous listings
	            if($val == '.' || $val == '..')
	                continue;
	           
	            // If directory then dive deeper, else add file to directory key
	            if(is_dir($dir.'/'.$val))
	            {
	                // Add value to current array, dir or file
	                $dir_array[$dir][] = $val;
	               
	                dir_list($dir.'/'.$val, $dir_array);
	            }
	            else
	            {
	                $dir_array[$dir][] = $val;
	            }
	        }
	    }
	    ksort($dir_array);
	}
	function include_control(){
		$folder_list = array();
		dir_list(fe_page, $folder_list);	
		//var_dump($folder_list);
		foreach($folder_list as $key => $val){
			foreach($folder_list[$key] as $val1){
				if($val1=="fe_control.php"){
					include $key."/".$val1;
				}
			}
		}				
	}
	function include_menu(){
		$folder_list = array();
		dir_list(fe_page, $folder_list);	
		//var_dump($folder_list);
		foreach($folder_list as $key => $val){
			foreach($folder_list[$key] as $val1){
				if($val1=="fe_menu.php"){
					include $key."/".$val1;
				}
			}
		}				
	}
	function include_module(){
		$folder_list = array();
		dir_list(fe_page, $folder_list);	
		//var_dump($folder_list);
		foreach($folder_list as $key => $val){
			foreach($folder_list[$key] as $val1){
				if($val1=="fe_module.php"){
					include $key."/".$val1;
				}
			}
		}				
	}
	function include_module_config(){
		$folder_list = array();
		dir_list(fe_page, $folder_list);	
		//var_dump($folder_list);
		foreach($folder_list as $key => $val){
			foreach($folder_list[$key] as $val1){
				if($val1=="fe_config.php"){
					include $key."/".$val1;
				}
			}
		}				
	}
	function include_function(){
		$folder_list = array();
		dir_list(fe_page, $folder_list);	
		//var_dump($folder_list);
		foreach($folder_list as $key => $val){
			foreach($folder_list[$key] as $val1){
				if($val1=="fe_function.php"){
					include $key."/".$val1;
				}
			}
		}				
	}
	function include_table(){
		$folder_list = array();
		dir_list(fe_page, $folder_list);	
		//var_dump($folder_list);
		foreach($folder_list as $key => $val){
			foreach($folder_list[$key] as $val1){
				if($val1=="fe_table.php"){
					include $key."/".$val1;
				}
			}
		}				
	}
	function include_db(){
		$folder_list = array();
		dir_list(fe_page, $folder_list);	
		//var_dump($folder_list);
		foreach($folder_list as $key => $val){
			foreach($folder_list[$key] as $val1){
				if($val1=="fe_db.php"){
					include $key."/".$val1;
				}
			}
		}
	}

	function upload($file,$type,$size,$name,$location,$table,$field,$cond,$id){
		$file_type					= pathinfo($file['file']['name'],PATHINFO_EXTENSION);
		$name1						= $name.".".$file_type;
		$location1					= $location."/".$name1;
		$temporary					= $file['file']['tmp_name'];
		if($file['file']['size']>$size){
			$message['title']		= "Error Upload";
			$message['message'] 	= "File Harus Kurang Dari $size";
			$message['status'] 		= "error";
		}elseif(! in_array($file_type,$type)){
			$type1 					= implode(", ",$type);
			$message['title']		= "Error Upload";
			$message['message'] 	= "File type must be $type1";
			$message['status'] 		= "error";
		}elseif(is_executable($file['file']['name'])){
			$message['title']		= "File Berbahaya";
			$message['message'] 	= "File tidak bisa diupload karena berbahaya";
			$message['status'] 		= "error";
		}else{
			$upload 				= move_uploaded_file($temporary, $location1);
			if($upload){
	            $data[$field]	 	= $location1;
				$update 			= pdo_update($table,$data,$cond,$id);
				$message['title']	= "Success Upload";
				$message['message'] = "File Uploaded Successfully";
				$message['status'] 	= "success";
			}else{
				$message['title']	= "Error Uplod";
				$message['message'] = "Picture Fail Uploaded";
				$message['status'] 	= "error";
			}
		}
		return $message;
	}
	function upload_check($file,$type,$size,$name,$location,$table,$field,$cond,$id){
		$file_type					= pathinfo($file['file']['name'],PATHINFO_EXTENSION);
		$name1						= $name.".".$file_type;
		$location1					= $location."/".$name1;
		$temporary					= $file['file']['tmp_name'];
		if($file['file']['size']>$size){
			$message['title']		= "Error Upload";
			$message['message'] 	= "File Harus Kurang Dari $size";
			$message['status'] 		= "error";
		}elseif(! in_array($file_type,$type)){
			$type1 					= implode(", ",$type);
			$message['title']		= "Error Upload";
			$message['message'] 	= "File type must be $type1";
			$message['status'] 		= "error";
		}else{
			$message['title']	= "Success Upload";
			$message['message'] = "File Uploaded Successfully";
			$message['status'] 	= "success";
		}
		return $message;
	}
	function upload_import($file,$type,$size,$location){
		$name 						= $file['file']['name'];
		$file_type					= pathinfo($file['file']['name'],PATHINFO_EXTENSION);
		$name1						= $name.".".$file_type;
		$location1					= $location."/".$name1;
		$temporary					= $file['file']['tmp_name'];
		if($file['file']['size']>$size){
			$message['title']		= "Error Upload";
			$message['message'] 	= "File Harus Kurang Dari $size";
			$message['status'] 		= "error";
		}elseif(! in_array($file_type,$type)){
			$type1 					= implode(", ",$type);
			$message['title']		= "Error Upload";
			$message['message'] 	= "File type must be $type1";
			$message['status'] 		= "error";
		}else{
			$upload 				= move_uploaded_file($temporary, $location1);
			if($upload){
				$message['title']	= "Success Upload";
				$message['message'] = "File Uploaded Successfully";
				$message['status'] 	= "success";
				$message['location']= $location1;
			}else{
				$message['title']	= "Error Uplod";
				$message['message'] = "Picture Fail Uploaded";
				$message['status'] 	= "error";
			}
		}
		return $message;
	}
	function delete_file($file){
		$delete 		= unlink($file);
		if($delete){
			$message	= "File Removed Successfully";
		}else{
			$message	= "File Fail Removed";
		}
		return $message;
	}


// ============================================================= //
// --------------------       BARCODE     ---------------------- //
// ============================================================= //

function barcode($code){
  include(fe_lib.'/barcode/php-barcode.php');
  require(fe_lib.'/fpdf17/fpdf.php');
  
  // -------------------------------------------------- //
  //                      USEFUL
  // -------------------------------------------------- //
  
  class eFPDF extends FPDF{
    function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0)
    {
        $font_angle+=90+$txt_angle;
        $txt_angle*=M_PI/180;
        $font_angle*=M_PI/180;
    
        $txt_dx=cos($txt_angle);
        $txt_dy=sin($txt_angle);
        $font_dx=cos($font_angle);
        $font_dy=sin($font_angle);
    
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',$txt_dx,$txt_dy,$font_dx,$font_dy,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
        if ($this->ColorFlag)
            $s='q '.$this->TextColor.' '.$s.' Q';
        $this->_out($s);
    }
  }

  
  
  // -------------------------------------------------- //
  //            ALLOCATE FPDF RESSOURCE
  // -------------------------------------------------- //
    
  $pdf = new eFPDF('P', 'pt');
  $pdf->AddPage();
  
  // -------------------------------------------------- //
  //                      BARCODE
  // -------------------------------------------------- //
  $vertical = 28;
  $baris = 18;
  $panjang 	= strlen($code);
  if($panjang <= 8){
	$kolom = 5;
  	if ((strpos($code, "-") !== false) OR (strpos($code, "_") !== false) OR (strpos($code, "*") !== false)) {
		$kolom = 5-1;
	}
  }elseif($panjang <= 15){
	$kolom = 4;
  	if ((strpos($code, "-") !== false) OR (strpos($code, "_") !== false) OR (strpos($code, "*") !== false)) {
		$kolom = 4-1;
	}
  }elseif($panjang <= 25){
	$kolom = 3;
  	if ((strpos($code, "-") !== false) OR (strpos($code, "_") !== false) OR (strpos($code, "*") !== false)) {
		$kolom = 3-1;
	}
  }elseif($panjang <= 30){
	$kolom = 2;
  	if ((strpos($code, "-") !== false) OR (strpos($code, "_") !== false) OR (strpos($code, "*") !== false)) {
		$kolom = 2-1;
	}
  }else{
	  $kolom = 1;
  }
  for($i=0;$i<$baris;$i++){
	  if($panjang <= 15){
		$horizontal = 80;
	  	if ((strpos($code, "-") !== false) OR (strpos($code, "_") !== false) OR (strpos($code, "*") !== false)) {
			$horizontal = 130;
		}
	  }elseif($panjang <= 25){
		$horizontal = 80;
	  	if ((strpos($code, "-") !== false) OR (strpos($code, "_") !== false) OR (strpos($code, "*") !== false)) {
			$horizontal = 130;
		}
	  }elseif($panjang <= 30){
		$horizontal = 80;
	  	if ((strpos($code, "-") !== false) OR (strpos($code, "_") !== false) OR (strpos($code, "*") !== false)) {
			$horizontal = 130;
		}
	  }else{
			$horizontal = 130;
	  }
  	for($i1=0;$i1<$kolom;$i1++){
	  // -------------------------------------------------- //
	  //                  PROPERTIES
	  // -------------------------------------------------- //
	  
	  $fontSize = 9;
	  $marge    = 0;   // between barcode and hri in pixel
	  $x        = $horizontal;  // barcode center
	  $y        = $vertical;  // barcode center
	  $height   = 30;   // barcode height in 1D ; module size in 2D
	  $width    = 1;    // barcode height in 1D ; not use in 2D
	  $angle    = 0;   // rotation in degrees
	  
	  $code     = $code; // barcode, of course ;)
	  $type     = 'code128';
	  $black    = '000000'; // color in hexa
	  $data = Barcode::fpdf($pdf, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);
	  // -------------------------------------------------- //
	  //                      HRI
	  // -------------------------------------------------- //
	  
	  $pdf->SetFont('Arial','B',$fontSize);
	  $pdf->SetTextColor(0, 0, 0);
	  $len = $pdf->GetStringWidth($data['hri']);
	  Barcode::rotate(-$len / 2, ($data['height'] / 2) + $fontSize + $marge, $angle, $xt, $yt);
	  $pdf->TextWithRotation($x + $xt, $y + $yt, $data['hri'], $angle);
	  $horizontal += $data['width']+10;
  	}
	  $vertical += $data['height']+16;
  }

  
  $pdf->Output();	
  
}


// ============================================================= //
// --------------------       EXIM      ------------------------ //
// ============================================================= //

	function export($data,$bind,$title,$type){
		$query 			= $data;
		$database = pdo_connect();
		$database->query($query);
		if($bind){
			foreach ($bind as $key => $value) {
				$field 	= ":".$key;
				$val 	= safe($value);
				$database->bind($field,$val);
			}
		}
		$database->execute();
		if($bind){
			$result		= pdo_query_array_prepare($query,$bind);
		}else{
			$result 	= pdo_query_array($query);
		}
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		date_default_timezone_set('Europe/London');

		if (PHP_SAPI == 'cli')
			die('This example should only be run from a Web Browser');

		require_once fe_excel."/Classes/PHPExcel.php";


		if($type=="pdf"){
			$rendererName = PHPExcel_Settings::PDF_RENDERER_MPDF;
			$rendererLibrary = 'mPDF';
			$rendererLibraryPath = fe_excel.'/Classes/PHPExcel/Writer/PDF/'. $rendererLibrary;
		}

		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("FlazEngine")
									 ->setLastModifiedBy("FlazEngine")
									 ->setTitle("Document Rendered by FlazEngine")
									 ->setSubject("Document Rendered by FlazEngine")
									 ->setDescription("Document Rendered by FlazEngine")
									 ->setKeywords("Flaz Engine")
									 ->setCategory("FlazEngine");


		$colom = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','X','W','Z');
		$no=0;
		foreach($result as $k1 => $v1){
		$no++;
		$key = array();
		$val = array();
			foreach($result[$k1] as $k2 => $v2){
				$key[] = safe($k2);
				$val[] = safe($v2);
				foreach($colom as $k3 => $v3){
					if($k3<count($result[$k1])){
							$objPHPExcel->setActiveSheetIndex(0)
										->setCellValue($v3."1", $key[$k3]);
					}
					if($k3<count($result[$k1])){
						$cell = $v3.($k1+2);
							$objPHPExcel->setActiveSheetIndex(0)
										->setCellValue($cell, $val[$k3]);
					}
				}				
			}
		}

		$objPHPExcel->getActiveSheet()->setTitle('Simple');

		$objPHPExcel->setActiveSheetIndex(0);

		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");


		if($type=="xls"){
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$title.".".$type.'"');
		}elseif($type=="xlsx"){
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$title.".".$type.'"');
		}elseif($type=="pdf"){
			if (!PHPExcel_Settings::setPdfRenderer(
					$rendererName,
					$rendererLibraryPath
				)) {
				die(
					'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
					'<br />' .
					'at the top of this script as appropriate for your directory structure'
				);
			}
			header('Content-Type: application/pdf');
			header('Content-Disposition: attachment;filename="'.$title.".".$type.'"');
		}
		// Redirect output to a client’s web browser (Excel5)
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		ob_end_clean();
		if($type=="xls"){
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		}elseif($type=="xlsx"){
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		}elseif($type=="pdf"){
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
		}

		$objWriter->save('php://output');
		exit;
	}

	function import($file,$table){
		require_once fe_excel."/Classes/PHPExcel/IOFactory.php";
		require_once fe_excel."/Classes/PHPExcel/Reader/Abstract.php";

		$file['file']		= $file;
		$type				= array("xls","xlsx","xlsm");
		$size				= 100000;
	    $location			= "data";
		$upload 			= upload_import($file,$type,$size,$location);
		if($upload['status']=="error"){
		    alert($upload);
		}else{
			$objPHPExcel = PHPExcel_IOFactory::load($upload['location']);	
			foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
			    $worksheetTitle     = $worksheet->getTitle();
			    $highestRow         = $worksheet->getHighestDataRow(); // e.g. 10
			    $highestColumn      = $worksheet->getHighestDataColumn(); // e.g 'F'
			    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
			    $nrColumns = ord($highestColumn) - 64; // count of column
				$column 	= array();
				$field 		= array();
			    for ($row = 1; $row <= $highestRow; ++ $row) {
					$record 					= array();
				    for ($col = 0; $col < $highestColumnIndex; ++ $col) {
				    	if($row==1){
					        $cell 				= $worksheet->getCellByColumnAndRow($col, $row);
					        $val 				= $cell->getValue();
					        $field[] 			= $val;
				    	}else{
							$field1 			= array();
					        $cell 				= $worksheet->getCellByColumnAndRow($col, $row);
					        $val 				= $cell->getValue();
							$field1 			= explode("_",$val);
							$table_name			= $field1[0];
							$record[]			= $val;
				    	}
				    }
				    	if($row!==1){		    		
						    $data[] = array_combine($field,$record);
						}
				}	
							foreach($data as $k => $v){
								$k2 	= array();
								$v2		= array();
								foreach ($data[$k] as $k1 => $v1) {
									//echo $k1." => ".$v1."<br />";
									if($k1==NULL){
										$k1 	= "";
									}
									if($v1==NULL){
										$v1 	= "";
									}
									$k2[]				= safe($k1);
									$v2[]				= safe($v1);
								}
									$k3				= array_key_import($k2);
									$v3				= array_value($v2);
									$execute 		= create_ignore($table,$k3,$v3);								
							}
			}
		    alert($upload);		
		}

	}

	function display_excel(){
		require_once fe_excel."/Classes/PHPExcel/IOFactory.php";
		require_once fe_excel."/Classes/PHPExcel/Reader/Abstract.php";
		$objPHPExcel = PHPExcel_IOFactory::load("system/data.xls");	

		foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		    $worksheetTitle     = $worksheet->getTitle();
		    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
		    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
		    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		    $nrColumns = ord($highestColumn) - 64;
		    echo "<br>The worksheet ".$worksheetTitle." has ";
		    echo $nrColumns . ' columns (A-' . $highestColumn . ') ';
		    echo ' and ' . $highestRow . ' row.';
		    echo '<br>Data: <table border="1"><tr>';
		    for ($row = 1; $row <= $highestRow; ++ $row) {
		        echo '<tr>';
		        for ($col = 0; $col < $highestColumnIndex; ++ $col) {
		            $cell = $worksheet->getCellByColumnAndRow($col, $row);
		            $val = $cell->getValue();
		            $dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
		            echo '<td>' . $val . '<br>(Typ ' . $dataType . ')</td>';
		        }
		        echo '</tr>';
		    }
		    echo '</table>';
		}
	}


// ============================================================= //
// --------------------       HTML      ------------------------ //
// ============================================================= //

	function h1($string){
		?>
			<h1><?php echo $string;?></h1>
		<?php
	}
	function h2($string){
		?>
			<h2><?php echo $string;?></h2>
		<?php
	}
	function h3($string){
		?>
			<h3><?php echo $string;?></h3>
		<?php
	}
	function h4($string){
		?>
			<h4><?php echo $string;?></h4>
		<?php
	}
	function h5($string){
		?>
			<h5><?php echo $string;?></h5>
		<?php
	}
	function h6($string){
		?>
			<h6><?php echo $string;?></h6>
		<?php
	}
	function b($string){
		?>
			<b><?php echo $string;?></b>
		<?php
	}
	function i($string){
		?>
			<i><?php echo $string;?></i>
		<?php
	}
	function u($string){
		?>
			<u><?php echo $string;?></u>
		<?php
	}
	function img($src,$alt){
		?>
			<img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>"/>
		<?php
	}
	function a($string){

	}

// ============================================================= //
// --------------------  SASLA SECURITY ------------------------ //
// ============================================================= //

class Sasla {
    /*
     * Protects your forms from spam
     * Place it anywhere inside the <form> tag.
     *      
     */

    public static function protectMe() {

        $sasla_box = '';
        $data = uniqid(microtime(), true);

        if (function_exists('hash')) {
            $sasla_box = hash('sha256', $data);
        } else {
            $sasla_box = sha1($data);
        }

        $_SESSION['sasla_box'] = $sasla_box;
        echo '<noscript><input type="hidden" name="jscheck" value="0"></noscript>';
        echo "<input type=\"text\" name=\"$sasla_box\" value=\"\" style=\"display:none\">";
    }

    /*
     * Validates whether the form submission is a spam or not     
     * 
     * @return TRUE if the POST is a spam or FALSE if not a spam
     */

    public static function isASpam() {
		if(isset($_SESSION['sasla_box'])){
			$sec_box_name = $_SESSION['sasla_box'];
			if (isset($_POST['jscheck']) && $_POST['jscheck'] == 0 || !empty($_POST[$sec_box_name])) {
				return TRUE;
			} else {
				unset($_SESSION['sasla_box']);
				return FALSE;
			}
		}else{
			if (isset($_POST['jscheck']) && $_POST['jscheck'] == 0) {
				return TRUE;
			} else {
				unset($_SESSION['sasla_box']);
				return FALSE;
			}
		}
    }

}

// ============================================================= //
// --------------------       JQUERY    ------------------------ //
// ============================================================= //

?>
<?php
// ============================================================= //
// -------------- END OF FLAZ ENGINE CORE LIBRARY -------------- //
// ------------------------- CHEEERS :) ------------------------ //
// ============================================================= //

// ============================================================= //
// -----------------  TANGGAL INDONESIA  ----------------------- //
// ============================================================= //

	function hari($date){
		//Array Hari
		$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
		$hari = $array_hari[date_format(date_create($date),"w")];
		return $hari;
	}
	function tanggal($date){
		//Format Tanggal
		$dat = date_format(date_create($date),'j');
		return $dat;
	}
	function bulan($date){
		//Array Bulan
		$array_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		$bulan = $array_bulan[date_format(date_create($date),'n')];
		return $bulan;
	}
	function hr_tgl_bln_thn($date){
		$dat = hari($date).', '.tanggal($date).' '.bulan($date).' '.tahun($date);
		return $dat;
	}
	function tgl_bln_thn($date){
		$dat = tanggal($date).' '.bulan($date).' '.tahun($date);
		return $dat;
	}
	function bln_thn($date){
		$dat = bulan($date).' '.tahun($date);
		return $dat;
	}
	function tahun($date){
		//Format Tahun
		$tahun = date_format(date_create($date),'Y');
		return $tahun;
	}

	function modal_file($file,$id){
		?>
			<div class="modal fade" id="<?php echo $id; ?>" role="dialog">
			    <div class="modal-dialog modal-lg">
			      <div class="modal-content">
			        <div class="modal-body">
				        <?php
				        	include uri_include('',$file);
				        ?>
			        </div>
			        <div class="modal-footer">
			        </div>
			      </div>
			    </div>
		  	</div>		
		<?php		
	}
	function modal_data($file,$id){
		?>
			<div class="modal fade" id="<?php echo $id; ?>" role="dialog">
			    <div class="modal-dialog modal-lg">
			      <div class="modal-content">
			        <div class="modal-body">
				        <?php
							$ekstensi 				= pathinfo($file,PATHINFO_EXTENSION);
							if($ekstensi == 'jpg' || $ekstensi == 'jpeg' || $ekstensi == 'png' || $ekstensi == 'gif'){
								?>
									<img id="<?php echo $id; ?>" src="<?php echo $file; ?>" style=" height:auto; width:100%;"/>
								<?php
							}else{
								?>
									<iframe id="<?php echo $id; ?>" src="http://docs.google.com/gview?url=<?php echo $file; ?>&embedded=true" style="height:82vh; width:100%;" frameborder="0"></iframe>
								<?php		
							}
				        ?>
			        </div>
			        <div class="modal-footer">
			          <!-- <button type="button" class="btn btn-default" data-dismiss="modal"><?php if(isset($modal['close'])){echo $modal['close'];}?></button> -->
			        </div>
			      </div>
			    </div>
		  	</div>		
		<?php		
	}
	function modal($content,$id){
		?>
			<div class="modal fade" id="<?php echo $id; ?>" role="dialog">
			    <div class="modal-dialog modal-lg">
			      <div class="modal-content">
			        <div class="modal-body">
				        <?php
				        	echo $content;
				        ?>
			        </div>
			        <div class="modal-footer">
			          <!-- <button type="button" class="btn btn-default" data-dismiss="modal"><?php if(isset($modal['close'])){echo $modal['close'];}?></button> -->
			        </div>
			      </div>
			    </div>
		  	</div>		
		<?php		
	}
	function page(){
		$get 		= array_keys($_GET);
		if(isset($get[0])){
			$url 		= explode('/',$get[0]);
			$page 		= $url[0];
		}else{
			$page 		= "";
		}
		return $page;
	}
	function uri_segment($id){
		$get 		= array_keys($_GET);
		if(isset($get[0])){
			$url 		= explode('/',$get[0]);
			if(sizeof($url)-1 < $id){
				return "";
			}else{
				return $url[$id];
			}
		}else{
			return "";
		}
	}
	function uri_all(){
		$get 		= array_keys($_GET);
		if(isset($get[0])){
			$url 		= explode('/',$get[0]);
			return $url;
		}else{
			return array();
		}
	}
	function uri_last(){
		$get 		= array_keys($_GET);
		if(isset($get[0])){
			$url 		= explode('/',$get[0]);
			return end($url);
		}else{
			return "";
		}
	}
	function uri_except($remove){
		$get 		= array_keys($_GET);
		if(isset($get[0])){
			$url 		= explode('/',$get[0]);
			foreach($url as $key => $value){
				if(in_array($key,$remove)){
					unset($url[$key]);
				}
			}
			return $url;
		}else{
			return array();
		}
	}
	function uri_segment_check($segment){
		$res 	= array();
		foreach($segment as $val){
			$seg 	= uri_segment($val);
			if($seg !== ''){
				if(in_array(uri_segment($val),$_SESSION['access'])){
					$res[] 	= 1;
				}else{
					$res[] 	= 0;
				}				
			}else{
				$res[] 	= 0;				
			}
		}
		if(sizeof($res)>0){
			if(in_array(0,$res)){
				return false;
			}else{
				return true;
			}			
		}else{
			return false;
		}
	}
	function group_all(){
		$query 			= "
							SELECT
								user_group_f_id,
								user_group_f_name
							FROM
								fe_user_group
							";
		$group			= pdo_query_array($query);
		$groups[] 		= array();
		foreach($group as $key => $value){
			foreach($value as $key1 => $value1){
				if($key1 == 'user_group_f_id'){
					$id = $value1;
				}elseif($key1 == 'user_group_f_name'){
					$name = $value1;
				}
				if(isset($id, $name)){
					$groups[$id] 	= $name;
				}
			}
		}
		return array_values(array_filter($groups));
	}
	function group_except($remove){
		$query 			= "
							SELECT
								user_group_f_id,
								user_group_f_name
							FROM
								fe_user_group
							";
		$group			= pdo_query_array($query);
		$groups[] 		= array();
		foreach($group as $key => $value){
			foreach($value as $key1 => $value1){
				if($key1 == 'user_group_f_id'){
					$id = $value1;
				}elseif($key1 == 'user_group_f_name'){
					$name = $value1;
				}
				if(isset($id, $name)){
					$groups[$id] 	= $name;
				}
			}
		}
		$array1 = array_filter($groups);
		foreach($array1 as $key2 => $value2){
			if(in_array($value2,$remove)){
				unset($array1[$key2]);
			}
		}
		return array_values(array_filter($array1));
	}
	function curl_json($url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_CURL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPPER, false);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
		curl_setopt($curl, CURLOPT_FRESH_CONNECT, 1);
		$result = json_decode(curl_exec($curl),true);
		curl_close($curl);
		return $result;
	}
	function zip($source, $target){
		$source = realpath($source);
		$zip = new ZipArchive();
		$status = $zip->open($target, ZipArchive::CREATE | ZipArchive::OVERWRITE);
		$files = new RecursiveIteratorIterator(
		    new RecursiveDirectoryIterator($source),
		    RecursiveIteratorIterator::LEAVES_ONLY
		);
		foreach ($files as $name => $file){
		    if (!$file->isDir()){
		        $filePath = $file->getRealPath();
		        $relativePath = substr($filePath, strlen($source) + 1);
		        $zip->addFile($filePath, $relativePath);
		    }
		}
		$zip->close();
		if($status == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	function unzip($source, $target){
       	$target = str_replace("\\","/",$target);
        $zip = new ZipArchive;
        $res = $zip->open($source);
        if ($res === TRUE) {
            $zip->extractTo($target);
            $zip->close();
            return TRUE;
        }else{
            return FALSE;
        }		
	}
	function list_files($rootDir, $allData=array()) {
		// set filenames invisible if you want
		$invisibleFileNames = array(".", "..", ".htaccess", ".htpasswd");
		// run through content of root directory
		$dirContent = scandir($rootDir);
		foreach($dirContent as $key => $content) {
			// filter all files not accessible
			$path = $rootDir.'/'.$content;
			if(!in_array($content, $invisibleFileNames)) {
				// if content is file & readable, add to array
				if(is_file($path) && is_readable($path)) {
					$path = str_replace("\\","/",$path);
					// save file name with path
					$allData[] = $path;
				// if content is a directory and readable, add path and name
				}elseif(is_dir($path) && is_readable($path)) {
					$path = str_replace("\\","/",$path);
					// recursive callback to open new directory
					$allData = list_files($path, $allData);
				}
			}
		}
		return $allData;
	}
	function list_files_path($rootDir, $allData=array()) {
		// set filenames invisible if you want
		$invisibleFileNames = array(".", "..", ".htaccess", ".htpasswd");
		// run through content of root directory
		$dirContent = scandir($rootDir);
		foreach($dirContent as $key => $content) {
			// filter all files not accessible
			$path = $rootDir.'/'.$content;
			if(!in_array($content, $invisibleFileNames)) {
				// if content is file & readable, add to array
				if(is_file($path) && is_readable($path)) {
					$path 	 = getcwd().'/'.$path;
					$path 	 = str_replace("\\","/",$path);
					// save file name with path
					$allData[] = $path;
				// if content is a directory and readable, add path and name
				}elseif(is_dir($path) && is_readable($path)) {
					// recursive callback to open new directory
					$path 	 = getcwd().'/'.$path;
					$path 	 = str_replace("\\","/",$path);
					$allData = list_files($path, $allData);
				}
			}
		}
		return $allData;
	}
    function git_private_array($url, $username, $password) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 100000);
        $resp = json_decode(curl_exec($ch),true);
        if ($ch != null) curl_close($ch);
        return $resp;
    }
	function remove_content($dir){
	    foreach(scandir($dir) as $file) {
	        if ('.' === $file || '..' === $file) continue;
	        if (is_dir("$dir/$file")) remove_content("$dir/$file");
	        else unlink("$dir/$file");
	    }
	    $cek = rmdir($dir);
	    if($cek){
	    	return true;
	    }else{
	    	return false;
	    }
	}
	function check_license(){
		/*
		$admingroupid 	= pdo_select_field_where_string("fe_user_group","user_group_f_id","user_group_f_name","Administrator");
		$email 			= pdo_select_field_where_string("fe_user","user_f_email","user_r_user_group_f_id",$admingroupid);
		$license 		= fe_license;
		$username       = 'flazcorporation';
		$password       = '1Tsluhme1';
		$url            = "https://bitbucket.org/api/1.0/repositories/flazengine/licenseflazengine/changesets";
		$log            = git_private_array($url,$username, $password);
		if($log){
			$user_list 		= array();
			foreach($log['changesets'] as $key){
				if(strbefore($key['message'],':[{') == "licenseflazengine"){
					$user_list[] = json_decode(strafter($key['message'],'licenseflazengine:'),true);
				}
			}
			$last_updated 	= end($user_list);
			$user_license 	= array();
			foreach($last_updated as $key1 => $value1){
				foreach($value1 as $key2 => $value2){
					if($value2 == $license){
						$user_license[]	= array($key2 => $value2);
					}								
				}
			}
			if(sizeof($user_license)>0){
				$last_licensed 	= end($user_license);
				foreach($last_licensed as $key3 => $value3){
					if($key3 == $email && $value3 == $license){
						return true;
					}else{
						return false;
					}						
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
		*/
		return true;
	}
	function get_words($sentence, $count) {
	preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
	return $matches[0];
	}
	function doc_view($file,$width,$height){
		$file 			= uri_link($file);
		$ekstensi 		= pathinfo($file,PATHINFO_EXTENSION);
		if($ekstensi == 'jpg' || $ekstensi == 'jpeg' || $ekstensi == 'png' || $ekstensi == 'gif'){
			?>
				<img src="<?php echo $file; ?>" style=" height:auto; width:<?php echo $width;?>%;"/>
			<?php
		}else{
			?>
				<iframe src="http://docs.google.com/gview?url=<?php echo $file; ?>&embedded=true" style="height:<?php echo $height;?>vh; width:<?php echo $width;?>%;" frameborder="0"></iframe>
			<?php		
		}		
	}
	function kekata($x) {
		$x = abs($x);
		$angka = array("", "satu", "dua", "tiga", "empat", "lima",
		"enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($x <12) {
			$temp = " ". $angka[$x];
		} else if ($x <20) {
			$temp = kekata($x - 10). " belas";
		} else if ($x <100) {
			$temp = kekata($x/10)." puluh". kekata($x % 10);
		} else if ($x <200) {
			$temp = " seratus" . kekata($x - 100);
		} else if ($x <1000) {
			$temp = kekata($x/100) . " ratus" . kekata($x % 100);
		} else if ($x <2000) {
			$temp = " seribu" . kekata($x - 1000);
		} else if ($x <1000000) {
			$temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
		} else if ($x <1000000000) {
			$temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
		} else if ($x <1000000000000) {
			$temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
		} else if ($x <1000000000000000) {
			$temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
		}     
			return $temp;
	}	 
	function terbilang($x, $style=4){
		if($x<0) {
			$hasil = "minus ". trim(kekata($x));
		} else {
			$hasil = trim(kekata($x));
		}
		switch ($style) {
			case 1:
				$hasil = strtoupper($hasil);
				break;
			case 2:
				$hasil = strtolower($hasil);
				break;
			case 3:
				$hasil = ucwords($hasil);
				break;
			default:
				$hasil = ucfirst($hasil);
				break;
		}     
		return $hasil;
	}
	function var_js($var){
		return addcslashes($var,"\\\'\"\n\r");
	}
	function uri_link($url){
		$dir 	= explode('/',strbefore($_SERVER['PHP_SELF'],'/index.php'));
		if(sizeof($dir)>1){
			$base_dir 	= '/'.end($dir);
		}else{
			$base_dir 	= "";
		}
		if(isset($_SERVER['HTTPS']) && 'on' === $_SERVER['HTTPS']){
			$protocol 	= "https://";
		}else{
			$protocol 	= "http://";
		}
		return $protocol.$_SERVER['HTTP_HOST'].$base_dir.'/'.$url;			
	}
	function uri_file($url){
		if($_SERVER['SERVER_NAME'] == 'localhost'){
			return $url;
		}else{
			$dir 	= explode('/',strbefore($_SERVER['PHP_SELF'],'/index.php'));
			if(sizeof($dir)>1){
				$base_dir 	= end($dir);
			}else{
				$base_dir 	= "";
			}
			return $base_dir.'/'.$url;
		}
	}
	function uri_include($pre,$url){
		$url1  		= explode('/',$url);
		if($url1[0] == ''){
			unset($url1[0]);
			$url 	= implode('/',$url1);
		}
		return $pre.$url;
	}
	function telegram_message_send(){
		$token 		= fe_telegram_token;
		$userid 	= "325799837";
		$message 	= "Nih Jawabannya dari FlazEngine";
		$params  	= [
						"chat_id" 	=> $userid,
						"text" 		=> $message
						];
		//$url 		= "https://api.telegram.org/bot".$token."/getUpdates?".http_build_query($params);
		$url 		= "https://api.telegram.org/bot".$token."/sendMessage?".http_build_query($params);
		return file_get_contents($url);
	}
	function str_to_integer($str){
		return filter_var($str, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_FRACTION);
	}
	function str_to_float($str){
		if(strpos($str, '.') !== false && strpos($str, ',') !== false){
			$str 	= str_replace('.','',$str);				
			$str 	= str_replace(',','.',$str);
		}elseif(strpos($str, '.') == false && strpos($str, ',') !== false){
			$str 	= str_replace(',','.',$str);			
		}
		return filter_var($str, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);;
	}
	function float_to_currency($str){
		return fe_currency_prefix.number_format($str,2,fe_thousand_separator,fe_decimal_separator);		
	}
	function str_to_date($date){
		if($date == ''){
			$date 	= '01/01/1900';
		}
		$date = DateTime::createFromFormat(fe_date_format, $date);
		return $date->format('Y-m-d');
	}
	function date_to_str($date){
		return date_format($date,"d/m/Y");
	}
	function validate($post){
		if(isset($post['required']) && (!empty($post['required']) || $post['required'] !== '' || $post['required'] !== null )){
			$input 	= explode(',',$post['required']);
			$var 	= array();
			foreach($input as $key){
				if($post[$key] == '' || $post[$key] == null || empty($post[$key])){
					foreach($_POST as $keyp => $valp){
						if($keyp == $key){
							$var	= $key;
						}
					}
				}
			}
			if(sizeof($var) > 0){
				return false;
			}else{
				return true;
			}			
		}else{
			return false;
		}
	}
	function success_json(){
		$message['title']	= success;
		$message['message'] = success_message;
		$message['status'] 	= "success";
		echo json_encode($message);
	}
	function success_id($id){
		$message['title']	= success;
		$message['message'] = $id;
		$message['status'] 	= "success";
		echo json_encode($message);
	}
	function error_json(){
		$message['title']	= error;
		$message['message'] = error_message;
		$message['status'] 	= "error";
		echo json_encode($message);		
	}	
	function path_to($url,$cut){
		if(is_windows()){
			$path 	= '\\';
		}else{
			$path 	= '/';
		}
		$url_ex = explode($path,$url);
		$url_in = array();
		foreach($url_ex as $value){
			if($value == $cut){
				break;
			}else{
				$url_in[] = $value;
			};
		}
		$url_res = implode($path,$url_in);
		return $url_res;
	}
	function check_access($groupsession,$grouparray){
		//We need to check group session in group array
		if(sizeof($groupsession)>0){
			$result 		= array();
			foreach($groupsession as $key => $val){
				foreach($grouparray as $key1 => $val1){
					if($val == $val1){
						$result[] 	= TRUE;
					}else{
						$result[] 	= FALSE;						
					}
				}
			}
			if(in_array(TRUE, $result)){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}			
		/*
		if(is_array($groupsession)){
			if(sizeof($groupsession)>0){
				$result 		= array();
				foreach($groupsession as $key => $val){
					foreach($grouparray as $key1 => $val1){
						if($val == $val1){
							$result[] 	= TRUE;
						}else{
							$result[] 	= FALSE;						
						}
					}
				}
				if(in_array(TRUE, $result)){
					return TRUE;
				}else{
					return FALSE;
				}
			}else{
				return FALSE;
			}			
		}else{
			if(in_array($groupsession,$grouparray)){
				return TRUE;
			}else{
				return FALSE;
			};
		}
		*/
	}
	function check_group($group){
		if(in_array($group,$_SESSION['groupname'])){
			return TRUE;
		}else{
			return FALSE;		
		}			
	}	
	function is_mobile(){
		$useragent=$_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function is_windows(){
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'){
			return TRUE;
		}else{
			return FALSE;
		}		
	}	
	function is_linux(){
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN'){
			return TRUE;
		}else{
			return FALSE;
		}		
	}	
	function is_mac(){
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'MAC'){
			return TRUE;
		}else{
			return FALSE;
		}		
	}	
	
?>