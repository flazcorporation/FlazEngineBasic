<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
if (isset($_POST) && !empty($_POST)) {
    $field          = $_POST['field'];
    $index          = decode($_POST['id']);
    $whereid        = decode($_POST['id']);
	$ids 			= $_POST['ids'];
    $table          = decode($_POST['table']);
    $module         = $_POST['module'];
    $query          = decode($_POST['query']);
    $bind           = $_POST['bind'];
	$modal 			= $_POST['modal'];
    $edit           = $_POST['edit'];
    $delete         = $_POST['delete'];
    $divider        = $_POST['divider'];
    $action         = $_POST['action'];
    $modals         = $_POST['modals'];
    $modal_file     = $_POST['modal_file'];
    
    $aColumns       = $field;
    $sIndexColumn   = $index;
    $sTable         = $table;

    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
            intval( $_GET['iDisplayLength'] );
    }     
    $sOrder = "";
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY  ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
            }
        }
         
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" )
        {
            $sOrder = "";
        }
    }
     
    $sWhere = "";
    if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
    {
        $sWhere = "WHERE (";
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" )
            {
                $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
            }
        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ')';
    }
     
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
        {
            if ( $sWhere == "" )
            {
                $sWhere = "WHERE ";
            }
            else
            {
                $sWhere .= " AND ";
            }
            $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
        }
    }
     
    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
            intval( $_GET['iDisplayLength'] );
    }
     
    $sOrder = "";
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY  ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
            }
        }
         
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" )
        {
            $sOrder = "";
        }
    }
     
    $sWhere = "";
    if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
    {
        $sWhere = "WHERE (";
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" )
            {
                $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
            }
        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ')';
    }
     
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
        {
            if ( $sWhere == "" )
            {
                $sWhere = "WHERE ";
            }
            else
            {
                $sWhere .= " AND ";
            }
            $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
        }
    }
     
    $sQuery = "
                $query
                $sWhere
                $sOrder
                $sLimit
                ";

    $database = pdo_connect();
    $database->query($sQuery);
    if($bind){
		foreach ($bind as $key => $value) {
			$field 	= ":".$key;
			$val 	= safe($value);
			$database->bind($field,$val);
		}    
    }
    $database->execute();

    $sQuery1 = "
                SELECT
                FOUND_ROWS()
            ";
    $sQuery1 .= substr(strstr($query," "), 1);

    if($bind){
        $aResultFilterTotal = pdo_query_array_prepare($sQuery1,$bind);
    }else{
        $aResultFilterTotal = pdo_query_array($sQuery1);
    }
    if(!isset($aResultFilterTotal[0])){
		$aResultFilterTotal[0] 	= 0;
	}
    $iFilteredTotal = $aResultFilterTotal[0];
    $database1 = null;
    $sQuery2 = $query;

    if($bind){
        $aResultTotal = pdo_query_array_prepare($sQuery2,$bind);
    }else{
        $aResultTotal = pdo_query_array($sQuery2);
	}
    if(!isset($aResultTotal[0])){
		$aResultTotal[0] 	= 0;
	}
    $iTotal = $aResultTotal[0];
    if(!isset($_GET['sEcho'])){
        $_GET['sEcho'] = 0;
    }
    $output = array(
        "sEcho" => intval($_GET['sEcho']),
        "iTotalRecords" => $iTotal,
        "iTotalDisplayRecords" => $iFilteredTotal,
        "aaData" => ""
    );

    $nomor = 1;
	$where  = $index;
	$output['aaData'] 	= array();	
    while ( $aRow = $database->stmt->fetch())
    {
		$ids1 	= '';
        $row = array();
        $row[] = $nomor;
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( $aColumns[$i] == "version" )
            {
                $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
            }
            else if ($aColumns[$i] != ' ' )
            {
                if($aColumns[$i]==$index){
                    $id = $aRow[$aColumns[$i]];
                    continue;
                }
				if($ids){
					if(in_array($aColumns[$i],$ids)){
						$ids1 .= '/'.$aRow[$aColumns[$i]];
						continue;					
					}					
				}
                $row[] = $aRow[$aColumns[$i]];
            }
        }
		$uriaction 		= $ids1.'/'.$id;
        $button         = "";
        $button         .= "
						<div class='btn-group'>
                        ";

        if($divider || $action || $modals || $modal_file){
			$buttons 		= array();
			if(isset($divider)){
				if($divider){
					foreach($divider as $key => $value){
						if(is_array($value)){
							if(check_access($_SESSION['groupname'],$value)){
								if(!empty($key) && $key >= 0){
									if(isset($buttons[$key])){
										$buttons[$key]  .= "
										<li class='divider'></li>
										";														
									}else{
										$buttons[]  .= "
										<li class='divider'></li>
										";														
									}
									
								}
							}					
						}
					}
				}				
			}
			if(isset($action)){
				if($action){
					foreach($action as $key => $value){
						if(is_array($value['access'])){
							if(!isset($value['dropdown'])){
								if(check_access($_SESSION['groupname'],$value['access'])){
									if(isset($value['function'])){$act = $value['function'].'("'.encode($id).'")';}else{$act = '';}
									if(isset($value['url'])){$url = $value['url'];}else{$url = '#';}
									if(isset($value['title'])){$title = $value['title'];}else{$title = '#';}
									if(isset($value['target'])){$target = '_'.$value['target'];}else{$target = '';}
									if(isset($value['icon'])){$icon = $value['icon'];}else{$icon = '#';}
									if($key >= 0){
										if($value['url'] !== '' && $value['url'] !== '#'){
											if(isset($buttons[$key])){
												$buttons[$key]  .= "
												<li><a onclick='$act' href='$url$uriaction' role='button' data-toggle='tooltip' title='$title' target='$target'><i class='fa fa-$icon'></i>$title</a></li>
												";																			
											}else{
												$buttons[]  .= "
												<li><a onclick='$act' href='$url$uriaction' role='button' data-toggle='tooltip' title='$title' target='$target'><i class='fa fa-$icon'></i>$title</a></li>
												";																			
											}
										}else{
											if(isset($buttons[$key])){
												$buttons[$key]  .= "
												<li><a onclick='$act' role='button' data-toggle='tooltip' title='$title' target='$target'><i class='fa fa-$icon'></i>$title</a></li>
												";																													
											}else{
												$buttons[]  .= "
												<li><a onclick='$act' role='button' data-toggle='tooltip' title='$title' target='$target'><i class='fa fa-$icon'></i>$title</a></li>
												";																																									
											}								
										}
									}
								}								
							}else{
								if($value['dropdown'] == "true"){
									if(check_access($_SESSION['groupname'],$value['access'])){
										if(isset($value['function'])){$act = $value['function'].'("'.encode($id).'")';}else{$act = '';}
										if(isset($value['url'])){$url = $value['url'];}else{$url = '#';}
										if(isset($value['title'])){$title = $value['title'];}else{$title = '#';}
										if(isset($value['target'])){$target = '_'.$value['target'];}else{$target = '';}
										if(isset($value['icon'])){$icon = $value['icon'];}else{$icon = '#';}
										if($key >= 0){
											if($value['url'] !== '' && $value['url'] !== '#'){
												if(isset($buttons[$key])){
													$buttons[$key]  .= "
													<li><a onclick='$act' href='$url$uriaction' role='button' data-toggle='tooltip' title='$title' target='$target'><i class='fa fa-$icon'></i>$title</a></li>
													";																			
												}else{
													$buttons[]  .= "
													<li><a onclick='$act' href='$url$uriaction' role='button' data-toggle='tooltip' title='$title' target='$target'><i class='fa fa-$icon'></i>$title</a></li>
													";																			
												}
											}else{
												if(isset($buttons[$key])){
													$buttons[$key]  .= "
													<li><a onclick='$act' role='button' data-toggle='tooltip' title='$title' target='$target'><i class='fa fa-$icon'></i>$title</a></li>
													";																													
												}else{
													$buttons[]  .= "
													<li><a onclick='$act' role='button' data-toggle='tooltip' title='$title' target='$target'><i class='fa fa-$icon'></i>$title</a></li>
													";																													
												}
											}
										}
									}								
								}
							}
						}
					}
				}				
			}

			if(isset($modals)){
				if($modals){
					foreach($modal as $key => $value){
						if(is_array($value['access'])){
							if(!isset($value['dropdown'])){
								if(check_access($_SESSION['groupname'],$value['access'])){
									if(isset($value['function'])){$act = $value['function'].'("'.encode($id).'")';}else{$act = '';}
									if(isset($value['id'])){$target = $value['id'];}else{$url = '';}
									if(isset($value['icon'])){$icon = $value['icon'];}else{$icon = '#';}
									if(isset($value['title'])){$title = $value['title'];}else{$title = '#';}
									if($key >= 0){
										if(isset($buttons[$key])){
											$buttons[$key]  .= "
											<li><a onclick='$act' href='#' role='button' data-toggle='modal' title='$title' data-target='#$target'><i class='fa fa-$icon'></i>$title</a></li>
											";									
										}else{
											$buttons[]  .= "
											<li><a onclick='$act' href='#' role='button' data-toggle='modal' title='$title' data-target='#$target'><i class='fa fa-$icon'></i>$title</a></li>
											";									
										}										
									}
								}								
							}else{
								if($value['dropdown'] == "true"){
									if(check_access($_SESSION['groupname'],$value['access'])){
										if(isset($value['function'])){$act = $value['function'].'("'.encode($id).'")';}else{$act = '';}
										if(isset($value['id'])){$target = $value['id'];}else{$url = '';}
										if(isset($value['icon'])){$icon = $value['icon'];}else{$icon = '#';}
										if(isset($value['title'])){$title = $value['title'];}else{$title = '#';}
										if($key >= 0){
											if(isset($buttons[$key])){
												$buttons[$key]  .= "
												<li><a onclick='$act' href='#' role='button' data-toggle='modal' title='$title' data-target='#$target'><i class='fa fa-$icon'></i>$title</a></li>
												";									
											}else{
												$buttons[]  .= "
												<li><a onclick='$act' href='#' role='button' data-toggle='modal' title='$title' data-target='#$target'><i class='fa fa-$icon'></i>$title</a></li>
												";									
											}
										}
									}																	
								}
							}
						}
					}
				}				
			}

			if(isset($modal_file)){
				if($modal_file){
					foreach($modal_file as $key => $value){
						if(is_array($value['access'])){
							if(!isset($value['dropdown'])){
								if(check_access($_SESSION['groupname'],$value['access'])){
									if(isset($value['function'])){$act = $value['function'].'("'.encode($id).'")';}else{$act = '';}
									if(isset($value['id'])){$target = $value['id'];}else{$url = '';}
									if(isset($value['icon'])){$icon = $value['icon'];}else{$icon = '#';}
									if(isset($value['title'])){$title = $value['title'];}else{$title = '#';}
									if($key >= 0){
										if(isset($buttons[$key])){
											$buttons[$key]  .= "
														<li><a href='#'' onclick='$act' role='button' data-toggle='modal' title='$title' data-target='#$target'><i class='fa fa-$icon'></i>$title</a></li>
														";									
										}else{
											$buttons[]  .= "
														<li><a href='#'' onclick='$act' role='button' data-toggle='modal' title='$title' data-target='#$target'><i class='fa fa-$icon'></i>$title</a></li>
														";									
										}
									}
								}								
							}else{
								if($value['dropdown'] == "true"){
									if(check_access($_SESSION['groupname'],$value['access'])){
										if(isset($value['function'])){$act = $value['function'].'("'.encode($id).'")';}else{$act = '';}
										if(isset($value['id'])){$target = $value['id'];}else{$url = '';}
										if(isset($value['icon'])){$icon = $value['icon'];}else{$icon = '#';}
										if(isset($value['title'])){$title = $value['title'];}else{$title = '#';}
										if($key >= 0){
											if(isset($buttons[$key])){
												$buttons[$key]  .= "
												<li><a href='#'' onclick='$act' role='button' data-toggle='modal' title='$title' data-target='#$target'><i class='fa fa-$icon'></i>$title</a></li>
												";									
											}else{
												$buttons[]  .= "
												<li><a href='#'' onclick='$act' role='button' data-toggle='modal' title='$title' data-target='#$target'><i class='fa fa-$icon'></i>$title</a></li>
												";																					
											}
										}
									}									
								}
							}
						}
					}
				}				
			}
        }

		if(isset($buttons)){
			if(sizeof($buttons)>0){
				if($divider || $action || $modals || $modal_file){
					$button     .= "
										<div class='btn-group'>
											<button type='button' class='btn btn-sm dropdown-toggle btn-primary' data-toggle='dropdown'>Action</button>
											<ul class='dropdown-menu' role='menu'>
									";
				}
				ksort($buttons);
				$button 	.= implode('',$buttons);
			
				if($divider || $action || $modals || $modal_file){
					$button     .= "
											</ul>
										</div>
									";
				}			
			}			
		}

		if(isset($action)){
			if($action){
				foreach($action as $key => $value){
					if(is_array($value['access'])){
						if(isset($value['dropdown'])){
							if($value['dropdown'] == "false"){
								if(check_access($_SESSION['groupname'],$value['access'])){
									if(isset($value['function'])){$act = $value['function'].'("'.encode($id).'")';}else{$act = '';}
									if(isset($value['url'])){$url = $value['url'];}else{$url = '#';}
									if(isset($value['title'])){$title = $value['title'];}else{$title = '#';}
									if(isset($value['target'])){$target = '_'.$value['target'];}else{$target = '';}
									if(isset($value['icon'])){$icon = $value['icon'];}else{$icon = '#';}
									if(isset($value['type'])){$type = $value['type'];}else{$type = 'success';}
									if($key >= 0){
										if($value['url'] !== '' && $value['url'] !== '#'){
											$button  	.= "
															<a class='btn btn-$type btn-sm' onclick='$act' href='$url$uriaction' role='button' data-toggle='tooltip' title='$title' target='$target'><i class='fa fa-$icon'></i> $title</a>
															";																			
										}else{
											$button  	.= "
															<div class='btn btn-$type btn-sm' onclick='$act' role='button' data-toggle='tooltip' title='$title' target='$target'><i class='fa fa-$icon'></i> $title</div>
															";																													
										}
									}
								}			
							}
						}
					}
				}				
			}
        }
		
		if(isset($modals)){
			if($modals){
				foreach($modal as $key => $value){
					if(is_array($value['access'])){
						if(isset($value['dropdown'])){
							if($value['dropdown'] == "false"){
								if(check_access($_SESSION['groupname'],$value['access'])){
									if(isset($value['function'])){$act = $value['function'].'("'.encode($id).'")';}else{$act = '';}
									if(isset($value['id'])){$target = $value['id'];}else{$url = '';}
									if(isset($value['icon'])){$icon = $value['icon'];}else{$icon = '#';}
									if(isset($value['title'])){$title = $value['title'];}else{$title = '#';}
									if(isset($value['type'])){$type = $value['type'];}else{$type = 'success';}
									if($key >= 0){
										$button  .= "
														<a class='btn btn-$type btn-sm' onclick='$act' href='#' role='button' data-toggle='modal' title='$title' data-target='#$target'><i class='fa fa-$icon'></i>$title</a>
														";									
									}
								}								
								
							}
						}
					}
				}
			}				
		}
		
		if(isset($modal_file)){
			if($modal_file){
				foreach($modal_file as $key => $value){
					if(is_array($value['access'])){
						if(isset($value['dropdown'])){
							if($value['dropdown'] == "false"){
								if(check_access($_SESSION['groupname'],$value['access'])){
									if(isset($value['function'])){$act = $value['function'].'("'.encode($id).'")';}else{$act = '';}
									if(isset($value['id'])){$target = $value['id'];}else{$url = '';}
									if(isset($value['icon'])){$icon = $value['icon'];}else{$icon = '#';}
									if(isset($value['title'])){$title = $value['title'];}else{$title = '#';}
									if(isset($value['type'])){$type = $value['type'];}else{$type = 'success';}
									if($key >= 0){
										$button  .= "
														<a class='btn btn-$type btn-sm' href='#'' onclick='$act' role='button' data-toggle='modal' title='$title' data-target='#$target'><i class='fa fa-$icon'></i>$title</a>
														";									
									}
								}																	
							}
						}
					}
				}
			}				
		}

        if($edit){
   			if(in_array($module.'-edit',$_SESSION['access'])){
				$id1 		= json_encode($id);
				$module_url = str_replace('-','',$module);
				$uri_edit 	= uri_link($module.'-'.fe_form).$ids1.'/'.$id;
				if($modal){
					$button     .= "
									<div class='btn btn-success btn-sm' onclick='getdata$module_url($id1)' role='button' data-toggle='modal' title='Ubah' data-target='#addData$module_url'><i class='fa fa-edit'></i></div>
									";				
				}else{
					$button     .= "
									<a href='$uri_edit' class='btn btn-success btn-sm' role='button' data-toggle='modal' title='Ubah'><i class='fa fa-edit'></i></a>
									";				
				}				
			}
        }

        if($delete){
   			if(in_array($module.'-delete',$_SESSION['access'])){
				$uri_delete = uri_link($module.'-delete');
				$table1		= encode($table);
				$where1		= encode($whereid);
				$id1 		= encode($id);

				$mod 		= str_replace('-','',$module).'_table';
				$button     .= "
							<div class='btn btn-danger btn-sm' role='button' data-toggle='tooltip' title='Hapus' id='delete$id'><i class='fa fa-remove'></i></div>
								<script>
								$(document).ready(function(){
									$('#$mod tbody').on('click','#delete$id',function(e){
										var href = $(this).attr('href');
										swal({
											title: 'Delete Data?',
											type: 'warning',
											showCancelButton: true,
											confirmButtonColor: '#DD6B55',
											confirmButtonText: 'Yes, Delete!',
											cancelButtonText: 'No, Cancel!',
											closeOnConfirm: true,
											closeOnCancel: true
										},
										function (isConfirm){
											if (isConfirm){
												$.ajax({
														type: 'POST',
														async: false,
														url: '$uri_delete',
														data: {table:'$table1',where:'$where1',id:'$id1'},
														cache: false,
														dataType: 'json',
														success: function(res){
															if(res['status'] === 'success'){
																console.log('Status Nih: '+res['status']);
																$('#$mod').DataTable().ajax.reload();								
															}else{
																alert(res['message']);
															}
														}
												});	
											}
										});
										return false;											
									});
								});
							</script>
							";				
			}
        }
        $button         .= "
                        </div>
                        ";
		if(($edit || $delete) || ($divider || $action || $modals || $modal_file)){
			$row[] = preg_replace('/\s+/', ' ',trim($button));
			$output['aaData'][] = $row;
			
		}
        $nomor++;
    }
    $database = null;
    echo json_encode( $output );
}else{
    access_deny();
}
?>