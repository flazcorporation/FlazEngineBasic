<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
function table_old($table){
    $whereid        = $table['id'];
	if(isset($table['data'])){
		$data           = addcslashes($table['data'],"\\\'\"\n\r");		
	}
	if(is_array($table['query'])){
		$table['body']				= $table['query'];
	}else{
		if(isset($table['bind'])){
			$table['body']			= pdo_query_array_prepare($table['query'],$table['bind']);
		}else{
			$table['body']			= pdo_query_array($table['query']);
		}		
	}

	?>
    <script>
        jQuery(document).ready( function(){
            $("#<?php echo $table['module'];?>").DataTable();
        });
    </script>
	<style>
	input[type='file'] {
	  color: transparent;
	}
	</style>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
						<?php
							if(isset($table['title'])){
		            echo strtoupper($table['title']);
							}else{
		            echo strtoupper($table['module']." ".fe_table);
							}
						?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo uri_link(strtolower($table['module']."-".fe_table)); ?>"><i class="fa fa-dashboard"></i><?php echo ucwords($table['module']); ?></a></li>
            <li class="active"><?php echo ucwords($table['module']." ".fe_table); ?></li>
          </ol>
        </section>

        <section class="content">
              <!-- Form Element sizes -->
              <div class="box box-success">
                <div class="box-header with-border">
			        <div class="input-group" style="width: 150px;">
			            <div class="input-group-btn">
			            	<div class="row">
					            <div class="col-xs-12">
					            <tr>
			            		<?php 
			            			if($table['back_button']==true){
			            			?>
			            				<td>
										    <a href="<?php echo uri_link($table['back']); ?>"><div class="btn btn-success btn-sm" style="margin:2px;"><i class="fa fa-home"></i> Kembali</div></a>
						            	</td>
			            			<?php
			            			}
			            			if($table['add']==true){
			            			?>
					            		<td>
					            			<?php
					            				if($table['modal']==true){
					            					?>
												        <div class="btn btn-success btn-sm" style="margin:2px;" data-toggle="modal" onclick="clear_form()" data-target="#addData"><i class="fa fa-plus"></i> Add Data</div>
					            					<?php
					            				}else{
					            					?>
												        <a href="<?php echo uri_link($table['module'].'-'.fe_form); ?>" ><div class="btn btn-success btn-sm" style="margin:2px;" onclick="document.getElementById('selectedFile').click();" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Data</div></a>
					            					<?php					            					
					            				}
					            			?>
					            		</td>
			            			<?php
			            			}
			            		?>
			            		<?php 
			            			if($table['import']==true){
			            			?>
					            		<td>
									        <form action="<?php echo uri_link('import');?>" name="import" method="post" enctype="multipart/form-data"><input type="file" name="file" class="form-control input-md" style="display: none;" id="selectedFile" onchange="this.form.submit()"/><input type="hidden" name="table" value="<?php echo $table['module']; ?>"/><div class="btn btn-success btn-sm" style="margin:2px;" onclick="document.getElementById('selectedFile').click();"><i class="fa fa-folder-open"></i> Import Excel</div></form>
					            		</td>
			            			<?php
			            			}
			            		?>
			            		<?php 
			            			if($table['export_view']==true){
			            			?>
					            		<td>
									        <form action="<?php echo uri_link('export');?>" name="export1" method="post" enctype="multipart/form-data"><input type="hidden" name="data" value="<?php print base64_encode(serialize($table['body'])); ?>"/><input type="hidden" name="title" value="<?php echo $table['title']; ?>"/><input type="hidden" name="type" value="xls"/><button class="btn btn-success btn-sm" style="margin:2px;margin-left:50px;"><i class="fa fa-th-list"></i> Export View</button></form>
					            		</td>
			            			<?php
			            			}
			            		?>
			            		<?php 
			            			if($table['export_table']==true){
			            			?>
					            		<td>
									        <form action="<?php echo uri_link('export');?>" name="export1" method="post" enctype="multipart/form-data"><input type="hidden" name="data" value="<?php print base64_encode(serialize($table['table'])); ?>"/><input type="hidden" name="title" value="<?php echo $table['title']; ?>"/><input type="hidden" name="type" value="xls"/><button class="btn btn-success btn-sm" style="margin:2px;margin-left:95px;"><i class="fa fa-table"></i> Export Data</button></form>
					            		</td>
			            			<?php
			            			}
			            		?>
			            		</tr>
			            		</div>
			            	</div>
					        <!-- <button class="btn btn-success btn-sm" style="margin:2px;" onclick="export_data('<?php //echo http_build_query(array('data' => $table['body'])); ?>','<?php //echo $table['title']; ?>','xls');"><i class="fa fa-file-excel-o"></i> Export Excel Visible Data</button>
					        <button class="btn btn-success btn-sm" style="margin:2px;" onclick="export_data('<?php //echo http_build_query(array('data' => $table['table'])); ?>','<?php //echo $table['title']; ?>','xls');"><i class="fa fa-file-excel-o"></i> Export Excel All Data</button> -->
					        <!-- <button class="btn btn-success btn-sm" style="margin:2px;" onclick="export_data('<?php //echo http_build_query(array('data' => $table['body'])); ?>','<?php //echo $table['title']; ?>','xlsx');"><i class="fa fa-file-excel-o"></i> Export Excel 2007</button> -->
					        <!-- <button class="btn btn-success btn-sm" style="margin:2px;" onclick="export_data('<?php //echo http_build_query(array('data' => $table['body'])); ?>','<?php //echo $table['title']; ?>','pdf');"><i class="fa fa-file-pdf-o"></i> Export PDF</button> -->
			            </div>
			        </div>
                </div>
                <div class="box-body">
                	<!-- GANTI DARI SINI -->

			        <!-- Main content -->
			          <div class="row">
			            <div class="col-xs-12">
			                <div class="box-header">
			                  <!-- <h3 class="box-title">Tabel Daftar Kelas</h3> -->
			                  <div class="box-tools">
			                  	<!--
			                    <div class="input-group" style="width: 150px;">
			                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
			                      <div class="input-group-btn">
			                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
			                      </div>
			                    </div>
			                	-->
			                  </div>
			                </div><!-- /.box-header -->
			                <div class="box-body table-responsive no-padding">
			                  <table id="<?php echo $table['module'];?>" class="table table-bordered table-hover table-striped">
			                  	<thead>
				                  	<tr>
					                    <?php
					                    foreach($table['thead'] as $thead){
					                    	echo "<th>".$thead."</th>";
					                    }
					                    ?>
				                    </tr>
			                    </thead>
			                    <tbody>
			                    <?php
			                    	if(isset($table['body'])){
					                    $no=0;
					                    foreach($table['body'] as $body){
					                    $no++;
							            $id = "";
					                    ?>
						                    <tr>
				   		                    	   	<td><?php echo $no; ?></td>
						                <?php
							              foreach($body as $key1 => $val1){
								        			if($key1==$table['id']){
								        				$id = $val1;
								        				continue;
								        			}else{
																if(isset($table['action'])){
																	foreach($table['action'] as $kunci => $nilai){
																		if(isset($nilai['id'])){
																			$button[] 	= array();
																			foreach($nilai['id'] as $kunci1 => $nilai1){
																				if($key1==$nilai1){
																					$button[$kunci1]	=	$val1;
																					continue 3;
																				}
																			}
																		}
																	}
																}
								        				if($val1!=""){
										        			?>
											                    <td><?php echo $val1; ?></td>
											                <?php						        				
								        				}else{
										        			?>
											                    <td></td>
											                <?php						        												        					
								        				}
																
								        			}
							              }
										if(($table['button_edit'] == TRUE || $table['button_delete'] == TRUE) || (isset($table['action']) || isset($table['modals']) || isset($table['modal_file']))){
										?>
							              <td align="center" width="<?php if(isset($table['action_width'])){echo $table['action_width'];}else{echo '15%';}?>">
												<div class='btn-group'>
												<?php
													if(isset($table['action']) || isset($table['modals']) || isset($table['modal_file'])){
														?>
															<div class="btn-group">
																<button type="button" class="btn btn-sm btn-primary">Action</button>
																<button type="button" class="btn btn-sm dropdown-toggle btn-primary" data-toggle="dropdown">
																	<span class="caret"></span>
																	<span class="sr-only">Toggle Dropdown</span>
																</button>
																<ul class="dropdown-menu" role="menu">
																
																<?php
																//to show all button sent from list
																if(isset($table['action'])){
																	foreach($table['action'] as $key => $value){
																		if(isset($value['id'])){
																			$ids 	= http_build_query($value['id']);
																		}
																		?>
																			<li><a onclick="<?php if(isset($value['function'])){echo $value['function'].'('.$id.')';}else{echo '';}?>" href="<?php if(isset($value['url'])){echo $value['url'];}else{echo '#';}?>/<?php echo $id;if(isset($button)){echo '&'.http_build_query($button);}else{echo '';}?>" role='button' data-toggle='tooltip' title="<?php if(isset($value['title'])){echo $value['title'];}else{echo '#';}?>" target="<?php if(isset($value['target'])){echo '_'.$value['target'];}else{echo '';}?>"><i class='fa fa-<?php if(isset($value['icon'])){echo $value['icon'];}else{echo '#';}?>'></i> <?php if(isset($value['title'])){echo $value['title'];}else{echo '#';}?></a></li>
																		<?php
																	}
																}
																//to show all button sent from list
																if(isset($table['modals'])){
																	foreach($table['modals'] as $key => $value){
																		?>
																			<li><a onclick="<?php if(isset($value['function'])){echo $value['function'].'('.$id.')';}else{echo '';}?>" href="#" role='button' data-toggle='modal' title='Ubah' data-target="#<?php echo $value['id']; ?>"><i class='fa fa-<?php if(isset($value['icon'])){echo $value['icon'];}else{echo '#';}?>'></i> <?php if(isset($value['title'])){echo $value['title'];}else{echo '#';}?></a></li>
																		<?php
																	}
																}
																//to show all button sent from list
																if(isset($table['modal_file'])){
																	foreach($table['modal_file'] as $key => $value){
																		?>
																			<div class='btn btn-success btn-sm' onclick="getdata(<?php echo $id;?>)" role='button' data-toggle='modal' title='Ubah' data-target="#addData"><i class='fa fa-edit'></i></div>
																		<?php
																	}
																}
															?>
																</ul>
															</div>														
														<?php
													}
												?>													
													<?php
											            if($table['button_edit']==true){
																		?>
																			<div class='btn btn-success btn-sm' onclick="getdata('<?php echo $data;?>','<?php echo $whereid;?>','<?php echo $id;?>')" role='button' data-toggle='modal' title='Ubah' data-target="#addData"><i class='fa fa-edit'></i></div>
																		<?php
											          	}
											            if($table['button_delete']==true){
											              ?>
																		<a href="<?php echo uri_link($table['module'].'-delete/'.$table['name'].'/'.$table['id'].'/'.$id);?>" class='btn btn-danger btn-sm' role='button' data-toggle='tooltip' title='Hapus' id='delete<?php echo $id;?>'><i class='fa fa-remove'></i></a>
																		<script>
																			$(document).ready(function(){
																				$('#<?php echo $table['module'];?> tbody').on('click','#delete<?php echo $id;?>',function(e){
																						var href = $(this).attr('href');
																						swal({
																								title: "Delete Data?",
																								type: "warning",
																								showCancelButton: true,
																								confirmButtonColor: "#DD6B55",
																								confirmButtonText: "Yes, Delete!",
																								cancelButtonText: "No, Cancel!",
																								closeOnConfirm: true,
																								closeOnCancel: true
																						},
																										function (isConfirm) {
																												if (isConfirm) {
																														window.location.href = href;
																												}
																										});

																						return false;
																				});
																			});
																		</script>
												                <?php
											            }									                	
											          ?>
												</div>
							                </td>
										<?php
										}
						                ?>
										
											
								            </tr>
								        <?php 
								    	}
			                    	}
						        ?>
						    	</tbody>
			                  	<tfoot>
				                  	<tr>
					                    <?php
					                    foreach($table['thead'] as $thead){
					                    	echo "<th>".$thead."</th>";
					                    }
					                    ?>
				                    </tr>
			                    </tfoot>
			                  </table>
			                </div><!-- /.box-body -->
			              </div><!-- /.box -->
					</div>
				</div>
			</div>
		</section>
	<?php
	if(isset($table['path']) && isset($table['module'])){
		$file 	= $table['path'].'/'.$table['module'].'-form.php';
		?>
			<div class="modal fade" id="addData" role="dialog">
				<div class="modal-dialog modal-lg">
				  <div class="modal-content">
					<div class="modal-body">
						<?php
							include uri_include('/',$file);
						?>
					</div>
					<div class="modal-footer">
					</div>
				  </div>
				</div>
			</div>		
		<?php
	}
	if(isset($table['modal_file'])){
		foreach($table['modal_file'] as $key => $value){
			$file 	= $value['src'];
			modal_file($file,$value['id']);
		}
	}
	if(isset($table['modals'])){
		foreach($table['modals'] as $key => $value){
			modal($value['content'],$value['id']);
		}
	}
	?>
		<script>
			$(document).ready(function(){
				window.getdata = function(data,where,id){
					$.ajax({
							type: "POST",
							async: false,
							url: "<?php echo uri_link('form-data');?>",
							data: {
								"query" 		: data,
								"where" 		: where,
								"id"			: id
								},
							cache: false,
							dataType: "json",
							success: function(res){
								for(var obj in res){
									for (var val in res[obj]){
										$('#'+val).val(res[obj][val]);
									}
								}
							}
					});	
				}
				window.clear_form 	= function(){
					$('#addData').find("input[type=text], input[type=file], input[type=number], input[type=date], input[type=radio], input[type=checkbox], input[type=password], input[type=hidden], select, textarea").val("");
				}
			});
		</script>
	<?php
}
?>