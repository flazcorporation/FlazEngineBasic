<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

	function array_key($ar) {
        foreach($ar as $k => $v) {
            if($v!==NULL){
                $key[] = "`".safe($k)."`";
            }
        }
        return $key;
    }
    function array_key_import($ar) {
        foreach($ar as $k => $v) {
            if($v!==NULL){
                $key[] = "`".safe($v)."`";            
            }
        }
        return $key;
    }
    function array_field($ar){
		$before 	= 	"(";
		$after 		= 	")";
		$key 		= 	array();
        foreach($ar as $val) {
            if($val!==NULL){
				if(strpos($val,"(") !== false && strpos($val,")") !== false) {
					$fun 	= strbefore($val,$before);
					$fun1	= trim($fun);
						if($fun1 !==NULL){
							$str 	= "";
							$fnc 		= 	"";
							$alias 		= 	"";
							if($fun1=='min' || $fun1=='MIN' || $fun1=='Min'){
								$as 		= strafter($val,$after);
								if($as !=""){
									$as1 	= trim($as);
									$as2 	= substr($as1,0,2);
									$as3	= trim($as2);
									if($as3!=""){
										$alias 	= $as3;
									}else{
										$alias 	= "min";
									}
									$fnc 	= "min";
								}
							}elseif($fun1=='max' || $fun1=='MAX' || $fun1=='Max'){
								$as 		= strafter($val,$after);
								if($as !=""){
									$as1 	= trim($as);
									$as2 	= substr($as1,0,2);
									$as3	= trim($as2);
									if($as3!=""){
										$alias 	= $as3;
									}else{
										$alias 	= "max";
									}
									$fnc 	= "max";
								}
							}elseif($fun1=='avg' || $fun1=='AVG' || $fun1=='Avg'){
								$as 		= strafter($val,$after);
								if($as !=""){
									$as1 	= trim($as);
									$as2 	= substr($as1,0,2);
									$as3	= trim($as2);
									if($as3!=""){
										$alias 	= $as3;
									}else{
										$alias 	= "avg";
									}
									$fnc 	= "avg";
								}
							}elseif($fun1=='sum' || $fun1=='SUM' || $fun1=='Sum'){
								$as 		= strafter($val,$after);
								if($as !=""){
									$as1 	= trim($as);
									$as2 	= substr($as1,0,2);
									$as3	= trim($as2);
									if($as3!=""){
										$alias 	= $as3;
									}else{
										$alias 	= "sum";
									}
									$fnc 	= "sum";
								}
							}elseif($fun1=='count' || $fun1=='COUNT' || $fun1=='Count'){
								$as 		= strafter($val,$after);
								if($as !=""){
									$as1 	= trim($as);
									$as2 	= substr($as1,0,2);
									$as3	= trim($as2);
									if($as3!=""){
											$alias 	= $as3;
									}else{
										$alias 	= "count";
									}
									$fnc 	= "count";
								}
							}else{
					               $key[] = "`".safe($val)."`";
							}
							$str   	= strbetween($val,$before,$after);
				            $key[] 	= $fnc."(`".safe($str)."`) AS ".$alias;
				            return $key;
						}
				}else{
				    $key[] 	= "`".safe($val)."`";
				}
            }
        }
        return $key;
    }
    /*
    function array_field_join($ar) {
        $key1          = array();
        foreach($ar as $k => $v) {
            foreach($ar[$k] as $k1 => $v1){
            	foreach($ar[$k][$k1] as $k2 => $v2){
	                if($v2!==NULL){
	                    $key[] = "`".$k."`.`".$v2."`";            
	                }
            	}
            }
        }
        return $key;
    }
    */
    function array_field_join($ar) {
		$before 	= 	"(";
		$after 		= 	")";
        $key1          = array();
        foreach($ar as $k => $v) {
            foreach($ar[$k] as $k1 => $v1){
            	foreach($ar[$k][$k1] as $k2 => $val){
		            if($val!==NULL){
						if(strpos($val,"(") !== false && strpos($val,")") !== false) {
							$fun 	= strbefore($val,$before);
							$fun1	= trim($fun);
							if($fun1 !==NULL){
								$str 	= "";
								$fnc 		= 	"";
								$alias 		= 	"";
								if($fun1=='min' || $fun1=='MIN' || $fun1=='Min'){
									$as 		= strafter($val,$after);
									if($as !=""){
										$as1 	= trim($as);
										$as2 	= substr($as1,0,2);
										$as3	= trim($as2);
										if($as3!=""){
											$alias 	= $as3;
										}else{
											$alias 	= "min";
										}
										$fnc 	= "min";
									}
								}elseif($fun1=='max' || $fun1=='MAX' || $fun1=='Max'){
									$as 		= strafter($val,$after);
									if($as !=""){
										$as1 	= trim($as);
										$as2 	= substr($as1,0,2);
										$as3	= trim($as2);
										if($as3!=""){
											$alias 	= $as3;
										}else{
											$alias 	= "max";
										}
										$fnc 	= "max";
									}
								}elseif($fun1=='avg' || $fun1=='AVG' || $fun1=='Avg'){
									$as 		= strafter($val,$after);
									if($as !=""){
										$as1 	= trim($as);
										$as2 	= substr($as1,0,2);
										$as3	= trim($as2);
										if($as3!=""){
											$alias 	= $as3;
										}else{
											$alias 	= "avg";
										}
										$fnc 	= "avg";
									}
								}elseif($fun1=='sum' || $fun1=='SUM' || $fun1=='Sum'){
									$as 		= strafter($val,$after);
									if($as !=""){
										$as1 	= trim($as);
										$as2 	= substr($as1,0,2);
										$as3	= trim($as2);
										if($as3!=""){
											$alias 	= $as3;
										}else{
											$alias 	= "sum";
										}
										$fnc 	= "sum";
									}
								}elseif($fun1=='count' || $fun1=='COUNT' || $fun1=='Count'){
									$as 		= strafter($val,$after);
									if($as !=""){
										$as1 	= trim($as);
										$as2 	= substr($as1,0,2);
										$as3	= trim($as2);
										if($as3!=""){
												$alias 	= $as3;
										}else{
											$alias 	= "count";
										}
										$fnc 	= "count";
									}
								}else{
					                $key[] = "`".$val."`";
								}
								$str   	= strbetween($val,$before,$after);
			                    $key[] 	= $fnc."(`".safe($k)."`.`".safe($str)."`) AS ".$alias;
							}
						}else{
		                    $key[] = "`".safe($k)."`.`".safe($val)."`";
						}
		            }
            	}
            }
        }
        return $key;
    }
    function where($table,$field,$value,$operator) {
        $key          		= array();
        $key1          		= array();
        $ar 				= array_combine($table, $field);
        foreach($ar as $k => $v) {
                if($v!==NULL){
                    $key[] = "`".safe($k)."`.`".safe($v)."`";            
                }                
        }
        $ar1 				= array_combine($key, $value);
        foreach($ar1 as $k1 => $v1) {
                if($v1!==NULL){
                    $key1[] = $k1." = '".safe($v1)."'";
                }                
        }
        if($operator!==NULL || $operator!==""){
	        $value1 = implode($operator, safe($key1));
        }else{
	        $value1 = implode("", safe($key1));
        }
	    return $value1;
    }
    function array_value($ar){
        foreach($ar as $k => $v) {
            if($v!==NULL){
                $val[] = "'".safe($v)."'";
            }
        }
        return $val;
    }
    function data_update($ar){
        foreach($ar as $k => $v) {
            if($v!==NULL){
                $val[] = "`".safe($k)."`"."="."'".safe($v)."'";
            }
        }
        return $val;
    }

    function data_where($ar){
        foreach($ar as $k => $v) {
                $val[] = "(`".safe($k)."`"."="."'".safe($v)."')";
        }
        return $val;
    }   
    function unit($ar,$add){
    $val      = implode($ar,$add);
        return $val;
    }
    /*
    function data_cond($ar,$cond){
        foreach($ar as $k => $v) {
            if($v!==NULL){
                $val[] = $k." ".$cond." ".$v;
            }
        }
        return $val;
    }
    */
    function relation_string($table,$key){
        $string         = "`".$table[0]."`.`".$key[0]."`=`".$table[1]."`.`".$key[1]."`";
        return $string;
    }
    function relation_key($join,$jointype){
        $field              = array();
        $string             = array();
        foreach($join as $k => $v){
            $table              = array();
            $key                = array();
            //echo $k." ".$v."<br />";
                foreach($join[$k] as $k1 => $v1){
                    if($k1==0){
                        $keyjoin        = $v1;
                        //echo $k1." ".$v1."<br />";
                        //var_dump($keyjoin);
                        continue;
                    }else{
                        $table[]            = $v1;
                        $field              = table_field($v1);
                        foreach($field as $v2){
                            if($keyjoin==(substr($v2,strlen($keyjoin)*-1)) || $v2==(substr($keyjoin,strlen($v2)*-1))){
                                $key[]              = $v2;
                            }
                        }
                    }
                }
                $rel_string     = relation_string($table,$key);
                $string[]       = $jointype." `".safe($table[1])."` "." ON ".safe($rel_string);
        }
        return $string;
    }
    function first_table($table){
        $table1     = array();
        $table2     = array();
        foreach($table as $k => $v){
            foreach($table[$k] as $val){
                //echo $k." ".$val."<br />";
                $table1[]   = safe($val);
            }
        }
        return $table1;
    }
    function encrypt($data, $password) {
        // Set a random salt
        $salt = openssl_random_pseudo_bytes(16);

        $salted = '';
        $dx = '';
        // Salt the key(32) and iv(16) = 48
        while (strlen($salted) < 48) {
          $dx = hash('sha256', $dx.$password.$salt, true);
          $salted .= $dx;
        }

        $key = substr($salted, 0, 32);
        $iv  = substr($salted, 32,16);

        $encrypted_data = openssl_encrypt($data, 'AES-256-CBC', $key, true, $iv);
        return base64_encode($salt . $encrypted_data);
    }
// ============================================================= //
// --------------------       CRUD      ------------------------ //
// ============================================================= //

	function connect(){
		//$connect = mysql_connect(host,userdb,pass) or die(message("error",mysql_error(),back()));
		$connect = mysql_connect(host,userdb,pass);
		if($connect){
			//$select = mysql_select_db(db,$connect) or die(message("error",mysql_error(),back()));
			$select = mysql_select_db(db,$connect);
		}
	}

	function close(){
		mysql_close();
	}
	function create($table,$var){
		connect();
	    $key		= array_key($var);
	    $value		= array_value($var);
		$table1 	= "`".safe($table)."`";
		$field1		= implode(",",$key);
		$value1		= implode(",",$value);
		$sql		= "INSERT INTO $table1 ($field1) VALUES($value1)";
		//echo $sql;
		$exe		= mysql_query($sql) or die(mysql_error());
		if($exe){
			$id 	= mysql_insert_id();
			return $id;
		}
		close();
	}
	function create_ignore($table,$var){
		connect();
	    $key		= array_key($var);
	    $value		= array_value($var);
		$table1 	= "`".safe($table)."`";
		$field1		= implode(",",$key);
		$value1		= implode(",",$value);
		$sql		= "INSERT IGNORE INTO $table1 ($field1) VALUES($value1)";
		$exe		= mysql_query($sql);
		if($exe){
			$id 	= mysql_insert_id();
			return $id;
		}
		close();
	}
	function update($table, $var, $cond, $val){
		connect();
	    $data		= data_update($var);
		$table1 	= "`".safe($table)."`";
		$cond1 		= "`".safe($cond)."`";
		$field		= implode(",",$data);
		$val1 		= "'".safe($val)."'";
		$sql		= "UPDATE $table1 SET $field WHERE $cond1 = $val1";
		//echo $sql."<br /><br />";
		$exe		= mysql_query($sql);
		if($exe){
			return TRUE;
		}else{
			return FALSE;
		}
		close();
	}
	function update_all($table, $data){
		connect();
		$table1 	= "`".safe($table)."`";
		$field		= implode(",",$data);
		$sql		= "UPDATE $table1 SET $field";
		$exe		= mysql_query($sql);
		if($exe){
			return TRUE;
		}else{
			return FALSE;
		}
		close();
	}
	
	function select_query($query){
		connect();
		$exe		= mysql_query($query);
		$value 		= array();
		if(mysql_num_rows($exe)!==NULL){
			while($val  = mysql_fetch_assoc($exe)){
				$value[] 	= $val;
			}
			return $value;
		}else{
			return FALSE;
		}
		close();
	}

	function select_query_result($query){
		connect();
		$exe		= mysql_query($query);
		$value 		= array();
		$value1 		= array();		
		if(mysql_num_rows($exe)!==NULL){
			while($val  = mysql_fetch_array($exe)){
				$value[] 	= $val;
			}
			foreach($value as $k => $v){
				foreach($value[$k] as $k1 => $v1){
					$value1[$k1]	= $v1;
				}
			}
			return $value1;
		}else{
			return FALSE;
		}
		close();
	}

	function select_query_json($query){
		connect();
		$exe		= mysql_query($query);
		$value 		= array();
		if(mysql_num_rows($exe)!==NULL){
			while($val  = mysql_fetch_assoc($exe)){
				$value = $val;
			}
				return $value;
		}else{
			return FALSE;
		}
		close();
	}

	function select_query_table($query){
		connect();
		$exe		= mysql_query($query);
		$value 		= array();
		if(mysql_num_rows($exe)!==NULL){
			while($val  = mysql_fetch_assoc($exe)){
				$value[] 	= $val;
			}

			if($value!==NULL){
				foreach($value as $data1){
					$data[] 	= $data1;
				}
			}else{
					$data	 	= "";	
			}
			return $data;
		}else{
			return FALSE;
		}
		close();
	}

	
	function select_query_field_string($query){
		connect();
		$exe		= mysql_query($query);
		while($data = mysql_fetch_row($exe)){
			return $data[0];
		}
	}
	function select_all($table){
		connect();
		$table1 	= "`".safe($table)."`";
		$sql		= "SELECT * FROM $table1";
		$exe		= mysql_query($sql);
		$value 		= array();
		if(mysql_num_rows($exe)!==NULL){
			while($val  = mysql_fetch_assoc($exe)){
				$value[] 	= $val;
			}
				return $value;
		}else{
			return FALSE;
		}
		close();
	}
	function select_field($table,$field){
		connect();
		$table1 	= "`".safe($table)."`";
		$field1 	= array_field($field);
		$field2		= implode(",",$field1);
		$sql		= "SELECT $field2 FROM $table1";
		
		$exe		= mysql_query($sql);
		$value  	= array();
		while($data = mysql_fetch_assoc($exe)){
			$value[] = $data;
		}
		return $value;
		close();	
	}
	function select_field_table($table,$field){
		connect();
		$table1 	= "`".safe($table)."`";
		$field1 	= array_field($field);
		$field2		= implode(",",$field1);
		$sql		= "SELECT $field2 FROM $table1";
		
		$exe		= mysql_query($sql);
		$value  	= array();
		while($data_array = mysql_fetch_assoc($exe)){
			$value[] = $data_array;
		}
		if($value!==NULL){
			foreach($value as $data1){
				$data[] 	= $data1;
			}
		}else{
				$data	 	= "";	
		}
		return $data;
		close();	
	}
	function select_fields_where($table,$field,$cond,$val){
		connect();
		$table1 	= "`".safe($table)."`";
		$field1 	= array_field($field);
		$field2		= implode(",",$field1);
		$cond1 		= "`".safe($cond)."`";
		$val1 		= "'".safe($val)."'";
		$sql		= "SELECT $field2 FROM $table1 WHERE $cond1 = $val1";
		
		$exe		= mysql_query($sql);
		$value  	= array();
		while($data = mysql_fetch_assoc($exe)){
			$value[] = $data;
		}
		return $value;
		close();	
	}
	function select_all_where($table,$cond,$val){
		connect();
		$table1 	= "`".safe($table)."`";
		$cond1 		= "`".safe($cond)."`";
		$val1 		= "'".safe($val)."'";		
		$sql		= "SELECT * FROM $table1 WHERE $cond1 = $val1";
		$exe		= mysql_query($sql);
		$value  	= array();
		while($data = mysql_fetch_assoc($exe)){
				$value[] 	= $data;
		}
		return $value;
		close();
	}
	function select_all_where_array($table,$cond,$val){
		connect();
		$table1 	= "`".safe($table)."`";
		$cond1 		= "`".safe($cond)."`";
		$val1 		= "'".safe($val)."'";		
		$sql		= "SELECT * FROM $table1 WHERE $cond1 = $val1";
		$exe		= mysql_query($sql);
		$value  	= array();
		while($data = mysql_fetch_array($exe)){
				$value[] 	= $data;
		}
		return $value;
		close();
	}
	function select_all_where_array_result($table,$cond,$val){
		connect();
		$table1 	= "`".safe($table)."`";
		$cond1 		= "`".safe($cond)."`";
		$val1 		= "'".safe($val)."'";		
		$sql		= "SELECT * FROM $table1 WHERE $cond1 = $val1";
		$exe		= mysql_query($sql);
		$value  	= array();
		$value1  	= array();
		while($data = mysql_fetch_array($exe)){
				$value[] 	= $data;
		}
		foreach($value as $k => $v){
			foreach($value[$k] as $k1 => $v1){
				$value1[$k1]	= $v1;
			}
		}
		return $value1;
		close();
	}
	function select_all_where_anor($table,$data,$cond){
		connect();
		$data1 		= data_where($data);
		$data2 		= unit($data1,$cond);
		$table1 	= "`".safe($table)."`";
		$sql		= "SELECT * FROM $table1 WHERE $data2";
		$exe		= mysql_query($sql);
		$value  	= array();
		while($data = mysql_fetch_assoc($exe)){
				$value[] 	= $data;
		}
		return $value;
		close();
	}
	function select_field_where_anor_string($table,$field,$data,$cond){
		connect();
		$data1 		= data_where($data);
		$field1 	= "`".safe($field)."`";
		$data2 		= unit($data1,$cond);
		$table1 	= "`".safe($table)."`";
		$sql		= "SELECT $field1 FROM $table1 WHERE $data2";
		$exe		= mysql_query($sql);
		while($data = mysql_fetch_assoc($exe)){
				return $data[$field];
		}
		close();
	}
	function select_field_where_string($table,$field,$cond,$val){
		connect();
		$table1 	= "`".safe($table)."`";
		$field1 	= "`".safe($field)."`";
		$cond1 		= "`".safe($cond)."`";
		$val1 		= "'".safe($val)."'";
		$sql		= "SELECT $field1 FROM $table1 WHERE $cond1 = $val1";
		$exe		= mysql_query($sql);
		while($data = mysql_fetch_array($exe)){
			return $data[$field];
		}
	}
	function select_field_where($table,$field,$cond,$val){
		connect();
		$table1 	= "`".safe($table)."`";
		$field1 	= "`".safe($field)."`";
		$cond1 		= "`".safe($cond)."`";
		$val1 		= "'".safe($val)."'";
		$value  	= array();
		$sql		= "SELECT $field1 FROM $table1 WHERE $cond1 = $val1";
		$exe		= mysql_query($sql);
		while($data = mysql_fetch_array($exe)){
			$value[] 	= $data;
		}
			return $value;
		close();
	}
	function table_field($table){
		$data = "SHOW columns FROM $table";
		$exe = mysql_query($data);
		$field 		= array();
		while($hasil = mysql_fetch_array($exe)){
			$field[]   = $hasil['Field'];
		}
		return $field;
	}
	function select_field_join_left($join){
		$tablefirst	= first_table($join['key']);
		//var_dump($tablefirst);
		$field1		= array_field_join($join['field']);
		//var_dump($field1);
		$field2		= implode(",",$field1);
		//var_dump($field2);
		//var_dump($join['key']);
		$field_key	= relation_key($join['key'],"LEFT JOIN");
		//var_dump($field_key);
		$joins 		= implode(" ",$field_key);
		//var_dump($join['where']['value']);
		//$combine 	= array_combine($join['where']['key'],$join['where']['value']);
		//var_dump($combine);
		$sql		= "SELECT $field2 FROM `$tablefirst[1]` $joins";
		//echo $sql;
		$exe		= mysql_query($sql);
		$value  	= array();
		while($data = mysql_fetch_assoc($exe)){
			$value[] = $data;
		}
		return $value;
		close();
	}
	function select_field_join_right($join){
		//var_dump($join);
		connect();
		$tablefirst	= first_table($join['key']);
		//var_dump($tablefirst);
		$field1		= array_field_join($join['field']);
		//var_dump($field1);
		$field2		= implode(",",$field1);
		//var_dump($field2);
		//var_dump($join['key']);
		$field_key	= relation_key($join['key'],"RIGHT JOIN");
		//var_dump($field_key);
		$joins 		= implode(" ",$field_key);
		$sql		= "SELECT $field2 FROM `$tablefirst[1]` $joins";
		//echo $sql;
		$exe		= mysql_query($sql);
		$value  	= array();
		while($data = mysql_fetch_assoc($exe)){
			$value[] = $data;
		}
		return $value;
		close();
	}
	function select_field_join_left_where($join){
		$tablefirst	= first_table($join['key']);
		//var_dump($tablefirst);
		$field1		= array_field_join($join['field']);
		//var_dump($field1);
		$field2		= implode(",",$field1);
		//var_dump($field2);
		//var_dump($join['key']);
		$field_key	= relation_key($join['key'],"LEFT JOIN");
		//var_dump($field_key);
		$joins 		= implode(" ",$field_key);
		$where  	= where($join['where']['key']['table'],$join['where']['key']['field'],$join['where']['value'],$join['where']['operator']);
		//var_dump($where);
		//$where1		= implode("",$where);
		//var_dump($where1);
		//var_dump($join['where']['value']);
		//$combine 	= array_combine($join['where']['key'],$join['where']['value']);
		//var_dump($combine);
		$sql		= "SELECT $field2 FROM `$tablefirst[1]` $joins WHERE $where";
		//echo $sql;
		$exe		= mysql_query($sql);
		$value  	= array();
		while($data = mysql_fetch_assoc($exe)){
			$value[] = $data;
		}
		return $value;
		close();
	}
	function select_field_join_right_where($join){
		//var_dump($join);
		connect();
		$tablefirst	= first_table($join['key']);
		//var_dump($tablefirst);
		$field1		= array_field_join($join['field']);
		//var_dump($field1);
		$field2		= implode(",",$field1);
		//var_dump($field2);
		//var_dump($join['key']);
		$field_key	= relation_key($join['key'],"RIGHT JOIN");
		//var_dump($field_key);
		$joins 		= implode(" ",$field_key);
		$where  	= where($join['where']['key']['table'],$join['where']['key']['field'],$join['where']['value'],$join['where']['operator']);
		$sql		= "SELECT $field2 FROM `$tablefirst[1]` $joins WHERE $where";
		//echo $sql;
		$exe		= mysql_query($sql);
		$value  	= array();
		while($data = mysql_fetch_assoc($exe)){
			$value[] = $data;
		}
		return $value;
		close();
	}
	function query($query){
		connect();
		$exe		= mysql_query($query);
		$value  	= array();
		while($data = mysql_fetch_assoc($exe)){
			$value[] = $data;
		}
		return $value;
		close();	
	}
	function query_plain($query){
		connect();
		$exe		= mysql_query($query);
		if($exe){
			return TRUE;
		}else{
			return FALSE;
		}
		close();	
	}
	function install_table($query){
		connect();
		$exe		= mysql_query($query);
		if($exe){
			return TRUE;
		}else{
			return FALSE;
		}
		close();	
	}
	function delete($table,$cond,$val){
		connect();
		$table1 	= "`".safe($table)."`";
		$cond1 		= "`".safe($cond)."`";
		$sql		= "DELETE FROM $table1 WHERE $cond1 = $val";
		//echo $sql;
		$exe		= mysql_query($sql);
		if($exe){
			return TRUE;
		}else{
			return FALSE;
		}
		close();
	}
	function delete_loop($table,$cond,$val){
		connect();
		$table1 	= "`".safe($table)."`";
		$cond1 		= "`".safe($table)."_".safe($cond)."`";
		$sql		= "DELETE FROM $table1 WHERE $cond1 = $val";
		//echo $sql;
		$exe		= mysql_query($sql);
		if($exe){
			return TRUE;
		}else{
			return FALSE;
		}
		close();
	}

?>