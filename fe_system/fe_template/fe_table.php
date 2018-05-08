<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
function table($table){
	if(isset($table['width'])){ // Membuat array width table
		$width  = array();
		foreach($table['width'] as $val){
			$width[]['width'] 	= $val;
		}
	}
	?>
    <script>
		$(document).ready(function(){
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
										    <a href="<?php echo uri_link($table['back']);?>"><div class="btn btn-success btn-sm" style="margin:2px;"><i class="fa fa-home"></i> Kembali</div></a>
						            	</td>
			            			<?php
			            			}
			            			if(in_array($table['module'].'-add',$_SESSION['access'])){
										if($table['add'] == true){
											?>
												<td>
													<?php
														if(isset($table['child']) && $table['child'] == true){
															if(isset($table['add_segment']) && is_numeric($table['add_segment']) && !empty(uri_segment($table['add_segment']))){
																if($table['modal']==true){
																	?>
																		<div id="btnaddData<?php echo str_replace('-','_',$table['module']);?>" class="btn btn-success btn-sm" style="margin:2px;" data-toggle="modal" onclick="clear_form<?php echo str_replace('-','',$table['module']);?>()" data-target="#addData<?php echo str_replace('-','',$table['module']);?>"><i class="fa fa-plus"></i> Add Data</div>
																	<?php
																}else{
																	$href 	= '/'.implode('/',uri_except(array(0)));
																	?>
																		<a id="btnaddData<?php echo str_replace('-','_',$table['module']);?>" href="<?php echo uri_link($table['module'].'-'.fe_form.$href);?>" ><div class="btn btn-success btn-sm" style="margin:2px;" onclick="document.getElementById('selectedFile').click();" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Data</div></a>
																	<?php					            					
																}																															
															}
														}else{
															if($table['modal']==true){
																?>
																	<div id="btnaddData<?php echo str_replace('-','_',$table['module']);?>" class="btn btn-success btn-sm" style="margin:2px;" data-toggle="modal" onclick="clear_form<?php echo str_replace('-','',$table['module']);?>()" data-target="#addData<?php echo str_replace('-','',$table['module']);?>"><i class="fa fa-plus"></i> Add Data</div>
																<?php
															}else{
																?>
																	<a id="btnaddData<?php echo str_replace('-','_',$table['module']);?>" href="<?php echo uri_link($table['module'].'-'.fe_form);?>" ><div class="btn btn-success btn-sm" style="margin:2px;" onclick="document.getElementById('selectedFile').click();" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Data</div></a>
																<?php					            					
															}																														
														}
													?>
												</td>
											<?php											
										}
			            			}
			            		?>
			            		<?php 
			            			if($table['import']==true){
			            			?>
					            		<td>
									        <div class="btn btn-success btn-sm" style="margin:2px;"><form action="<?php echo uri_link('import');?>" name="import" method="post" enctype="multipart/form-data"><input type="file" name="file" class="form-control input-md" style="display: none;" id="selectedFile" onchange="this.form.submit()"/><input type="hidden" name="table" value="<?php echo $table['module']; ?>"/><div class="btn btn-success btn-sm" style="margin:2px;" onclick="document.getElementById('selectedFile').click();"><i class="fa fa-folder-open"></i> Import Excel</div></form></div>
					            		</td>
			            			<?php
			            			}
			            		?>
			            		<?php
			            			if(in_array($table['module'].'-export-view',$_SESSION['access'])){
										if($table['export_view']==true){
										?>
											<td>
												<div class="btn btn-success btn-sm" style="margin:2px;" data-toggle="modal"><form action="<?php echo uri_link($table['module'].'-export-view');?>" name="export1" method="post" enctype="multipart/form-data"><input type="hidden" name="data" value="<?php print base64_encode(serialize($table['query'])); ?>"/><input type="hidden" name="bind" value="<?php if(isset($table['bind'])){print base64_encode(serialize($table['bind']));}else{echo "0";}?><?php ; ?>"/><input type="hidden" name="title" value="<?php echo $table['title']; ?>"/><input type="hidden" name="type" value="xls"/><button style="background-color:Transparent;background-repeat:no-repeat;border: none;cursor:pointer;overflow: hidden;outline:none;width:100%;height:100%;"><i class="fa fa-th-list"></i> Export View</button></form></div>
											</td>
										<?php
										}
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
			                  <table id="<?php echo str_replace('-','',$table['module']);?>_table" class="table table-bordered table-hover table-striped" style="width: 100%">
			                  	<thead>
				                  	<tr>
					                    <?php
					                    foreach($table['thead'] as $thead){
					                    	echo "<th>".$thead."</th>";
					                    }
					                    ?>
				                    </tr>
			                    </thead>
			                  	<tfoot>
				                  	<tr>
					                    <?php
					                    foreach($table['thead'] as $key => $thead){
					                    	echo "<th id='sum$key'>".$thead."</th>";
					                    }
					                    ?>
				                    </tr>
			                    </tfoot>
			                  </table>
			                </div><!-- /.box-body -->
			              </div><!-- /.box -->
			    <!--
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
				-->
					</div>
				</div>
			</div>
		</section>
	<?php
	if($table['modal']){
		if(in_array($table['module'].'-form',$_SESSION['access'])){
			$file 	= $table['path'].'/'.$table['module'].'-form.php';
			if(file_exists($file)){
				?>
					<div class="modal fade" id="addData<?php echo str_replace('-','',$table['module']);?>" role="dialog">
						<div class="modal-dialog modal-lg">
						  <div class="modal-content">
							<div class="modal-body">
								<?php
									if(is_windows()){
										$path 	= '\\';
										$url_file 	= str_replace('/',$path,$file);
										include $url_file;
									}else{
										$path 	= '/';
										$url_file 	= $file;
										include uri_include($path,$url_file);
									}
								?>
							</div>
							<div class="modal-footer">
							</div>
						  </div>
						</div>
					</div>		
				<?php					
			}
		}		
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
			<?php
				if(isset($table['width'])){
					if(is_array($table['width']) || is_object($table['width'])){
						$width 	= array();
						foreach($table['width'] as $key => $value){
							$width[] 	= array("width" => $value, "targets" => $key);
						}
					}
				}else{
					$width = array();
				}
			?>
			var width<?php echo str_replace('-','',$table['module']);?> = <?php echo json_encode($width);?>;
            $("#<?php echo str_replace('-','',$table['module']);?>_table").DataTable({
							"ajax": {
								"url"  : "<?php echo uri_link('table-data');?>",
								"dataType": 'json',
								"async": true,
								"data" : {
													<?php if(isset($table['field'])){echo '"field":'.json_encode($table['field']).',';}else{echo '"field":'.'"0"'.',';}?>
													<?php if(isset($table['id'])){echo '"id":'.'"'.encode($table['id']).'"'.',';}else{echo '"id":'.'"0"'.',';}?>
													<?php if(isset($table['ids'])){echo '"ids":'.json_encode($table['ids']).',';}else{echo '"ids":'.'"0"'.',';}?>
													<?php if(isset($table['name'])){echo '"table":'.'"'.encode($table['name']).'"'.',';}else{echo '"table":'.'"0"'.',';}?>
													<?php if(isset($table['module'])){echo '"module":'.'"'.$table['module'].'"'.',';}else{echo '"module":'.'"0"'.',';}?>
													<?php if(isset($table['query'])){echo '"query":'.json_encode(encode($table['query'])).',';}else{echo '"query":'.'"0"'.',';}?>
													<?php if(isset($table['bind'])){echo '"bind":'.json_encode($table['bind']).',';}else{echo '"bind":'.'"0"'.',';}?>
													<?php if(isset($table['modal'])){echo '"modal":'.'"'.$table['modal'].'"'.',';}else{echo '"modal":'.'"0"'.',';}?>
													<?php if(isset($table['button_edit'])){echo '"edit":'.'"'.$table['button_edit'].'"'.',';}else{echo '"edit":'.'"0"'.',';}?>
													<?php if(isset($table['button_delete'])){echo '"delete":'.'"'.$table['button_delete'].'"'.',';}else{echo '"delete":'.'"0"'.',';}?>
													<?php if(isset($table['divider'])){echo '"divider":'.json_encode($table['divider']).',';}else{echo '"divider":'.'"0"'.',';}?>
													<?php if(isset($table['action'])){echo '"action":'.json_encode($table['action']).',';}else{echo '"action":'.'"0"'.',';}?>
													<?php if(isset($table['modals'])){echo '"modals":'.json_encode($table['modals']).',';}else{echo '"modals":'.'"0"'.',';}?>
													<?php if(isset($table['modal_file'])){echo '"modal_file":'.json_encode($table['modal_file']).',';}else{echo '"modal_file":'.'"0"'.',';}?>
													},
								"type": "POST",
								"complete" : function(){
									<?php
										if(isset($table['sum']['currency'])){
											if(is_array($table['sum']['currency']) || is_object($table['sum']['currency'])){
												foreach($table['sum']['currency'] as $sum){
													?>
													$('#sum<?php echo $sum;?>').html(sum_currency<?php echo str_replace('-','',$table['module']);?>('<?php echo $sum; ?>'));										
													<?php
												}												
											}
										}
									?>
									<?php
										if(isset($table['sum']['integer'])){
											if(is_array($table['sum']['integer']) || is_object($table['sum']['integer'])){
												foreach($table['sum']['integer'] as $sum){
													?>
													$('#sum<?php echo $sum;?>').html(sum_integer<?php echo str_replace('-','',$table['module']);?>('<?php echo $sum; ?>'));										
													<?php
												}												
											}
										}
									?>
									<?php
										if(isset($table['sum']['float'])){
											if(is_array($table['sum']['float']) || is_object($table['sum']['float'])){
												foreach($table['sum']['float'] as $sum){
													?>
													$('#sum<?php echo $sum;?>').html(sum_float<?php echo str_replace('-','',$table['module']);?>('<?php echo $sum; ?>'));										
													<?php
												}												
											}
										}
									?>
									<?php
										if(isset($table['sum']['decimal'])){
											if(is_array($table['sum']['decimal']) || is_object($table['sum']['decimal'])){
												foreach($table['sum']['decimal'] as $sum){
													?>
													$('#sum<?php echo $sum;?>').html(sum_decimal<?php echo str_replace('-','',$table['module']);?>('<?php echo $sum; ?>'));										
													<?php
												}												
											}
										}
									?>
								}
							},
							"destroy": false,
							"columnDefs": width<?php echo str_replace('-','',$table['module']);?>,
							"language": {
								"lengthMenu"	: "Menampilkan _MENU_ record per Hal",
								"zeroRecords"	: "Tabel Kosong",
								"info"			: "Memunculkan halaman _PAGE_ dari _PAGES_",
								"infoEmpty"		: "Tidak ada data ditemukan.",
								"infoFiltered"	: "(ditemukan _MAX_ jumlah records)",
								"processing"	: "Proses menampilkan data...",								
							}
			});
			jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
				return this.flatten().reduce( function ( a, b ) {
					if ( typeof a === 'string' ) {
						a = a.replace(/^\D+/g, '');
						a = a.replace(/\./g, '');
						a = a.replace(/\,/g, '.');
						a = Number(a);
					}
					if ( typeof b === 'string' ) {
						b = b.replace(/^\D+/g, '');
						b = b.replace(/\./g, '');
						b = b.replace(/\,/g, '.');
						b = Number(b);
					}
						return a + b;
				}, 0 );
			} );
			window.sum_currency<?php echo str_replace('-','',$table['module']);?> = function(col){
				var value  		= $("#<?php echo str_replace('-','', $table['module']);?>_table").DataTable().column(col).data().sum();
				var result 		= '<?php echo fe_currency_prefix;?>'+value.toFixed(<?php echo fe_decimal_number;?>).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				return result;
			}
			window.sum_integer<?php echo str_replace('-','',$table['module']);?> = function(col){
				var value  		= $("#<?php echo str_replace('-','', $table['module']);?>_table").DataTable().column(col).data().sum();
				var result 		= parseInt(value);
				return result;
			}
			window.sum_float<?php echo str_replace('-','',$table['module']);?> = function(col){
				var value  		= $("#<?php echo str_replace('-','', $table['module']);?>_table").DataTable().column(col).data().sum();
				var result 		= value.toFixed(<?php echo fe_decimal_number;?>);
				return result;
			}
			window.sum_decimal<?php echo str_replace('-','',$table['module']);?> 	= function(col){
				var value  		= $("#<?php echo str_replace('-','', $table['module']);?>_table").DataTable().column(col).data().sum();
				var result 		= value.toFixed(<?php echo fe_decimal_number;?>).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
				return result;
			}
		});
	</script>
	<?php		
}
?>