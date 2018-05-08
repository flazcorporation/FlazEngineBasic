<?php 
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
function validation($input){
	if(is_array($input) || is_object($input)){
	  foreach($input as $k => $v){
	    if(check_access($_SESSION['groupname'],$input[$k]['access'])){
	        if($input[$k]['type']=="file"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validation 	= $input[$k]['name'].":{validators:{".$val."$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="url"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validate 		= "uri:{message: '".fe_val_invalid_email."'}";
				$validation 	= $input[$k]['name'].":{validators:{".$val."$validate,$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="email"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validate 		= "emailAddress:{message: '".fe_val_invalid_email."'}";
				$validation 	= $input[$k]['name'].":{validators:{".$val."$validate,$required}},";
				echo $validation;
			}elseif($input[$k]['type']=="text"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validation 	= $input[$k]['name'].":{validators:{".$val."$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="date"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validate 		= "date:{format: '".fe_date_format_input."',message: '".fe_val_invalid_date."'}";
				$validation 	= $input[$k]['name'].":{validators:{".$val."$validate,$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="select_query"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validation 	= $input[$k]['name'].":{validators:{".$val."$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="select_data"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validation 	= $input[$k]['name'].":{validators:{".$val."$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="select"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validation 	= $input[$k]['name'].":{validators:{".$val."$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="select_target"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validation 	= $input[$k]['name'].":{validators:{".$val."$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="number"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validation 	= $input[$k]['name'].":{validators:{".$val."$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="currency"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validation 	= $input[$k]['name'].":{excluded: true,validators:{".$val."$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="radio"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validation 	= $input[$k]['name'].":{validators:{".$val."$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="checkbox"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validation 	= $input[$k]['name'].":{validators:{".$val."$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="password"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validation 	= $input[$k]['name'].":{validators:{".$val."$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="hidden"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validation 	= $input[$k]['name'].":{excluded: false,validators:{".$val."$required}},";
				echo $validation;
	        }elseif($input[$k]['type']=="textarea"){
				if($input[$k]['required']){
					$required 	= "notEmpty:{message:'".fe_val_required_message."'}";
				}else{
					$required 	= "";
				}
				if(isset($input[$k]['validation'])){
					$val 			= $input[$k]['validation'].',';					
				}else{
					$val 			= "";
				}
				$validation 	= $input[$k]['name'].":{validators:{".$val."$required}},";
				echo $validation;
	        }
	    }
	  }		
	}
}
?>