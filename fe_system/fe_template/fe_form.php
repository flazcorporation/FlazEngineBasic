<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
function form($form){
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php
			if(isset($form['title'])){
				echo $form['title'];
			}
			?>
            <!-- <small>Form Biodata Kelas</small> -->
          </h1>
          <ol class="breadcrumb">
			<?php
				if(isset($form['back_button'])){
					if($form['back_button'] == true){
						?>
							<a href="<?php echo '#'; ?>"><div class="btn btn-success btn-sm" style="margin:2px;" class="close" data-dismiss="modal">Kembali</div></a>
						<?php											
					}
				}else{
					?>
						<a href="<?php echo '#'; ?>"><div class="btn btn-success btn-sm" style="margin:2px;" class="close" data-dismiss="modal">Kembali</div></a>
					<?php					
				}
			?>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
              <!-- Form Element sizes -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <!-- <h2 class="box-title">FORM BIODATA GURU</h2> -->
                </div>
                <div class="box-body">
				<?php
					if($form['ajax']){
						?>
							<form name="<?php echo $form['module']; ?>" id="<?php echo str_replace('-','',$form['module']).'_frm'; ?>" enctype="multipart/form-data" method="<?php echo $form['method']; ?>" <?php if($form['submit']==FALSE){echo "onsubmit=onsubmit='return false;'";}?>>
						<?php
					}else{
						?>
							<form action="<?php echo uri_link($form['module'].'-'.fe_process); ?>" name="<?php echo $form['module']; ?>" id="<?php echo str_replace('-','',$form['module']).'_frm'; ?>" enctype="multipart/form-data" method="<?php echo $form['method']; ?>" <?php if($form['submit']==FALSE){echo "onsubmit=onsubmit='return false;'";}?> target="<?php if(isset($form['target']) && $form['target'] == "_blank"){echo $form['target'];}else{echo "_parent";}?>">
						<?php
					}
				?>
                  <?php
                  /* Initial Protection code
                   * You can put it anywhere inside the <form> tag
                   */
                  Sasla::protectMe();
                  ?>

                  <?php
                          input($form['input']);
                  ?>
                    <div class="form-group">
						<?php
							if($form['ajax']){
								?>
									<input type="hidden" name="id" id="id<?php echo str_replace('-','',$form['module']);?>" class="form-control input-lg"/>
								<?php
							}
						?>
                    </div>
                    <div class="form-group">
							<input type="hidden" name="required" id="required<?php echo str_replace('-','',$form['module']);?>" class="form-control input-lg"/>
                    </div>
                    <div class="form-group">
                        <?php
						if((isset($form['modal']) && $form['modal'] == false) && (isset($form['edit_only']) && $form['edit_only'] == true) && (is_numeric($form['edit_segment']) && empty(uri_segment($form['edit_segment'])))){
						}else{
							if($form['submit_button']==TRUE){
								?>
								<button type="submit" id="save_button<?php echo str_replace('-','',$form['module']);?>" class="form-control input-lg btn btn-primary" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Menyimpan Data">Simpan</button>
								<?php
							}							
						}
                        ?>
                    </div>
				</form>
				<?php
					if(isset($form['detail'])){
						?>
						<ul class="nav nav-tabs">
						<?php
						foreach($form['detail'] as $key => $value){
							if(check_access($_SESSION['groupname'],$value['access'])){
								if(isset($value['title']) && $value['title'] !== ''){
									$title 	= $value['title'];
								}else{
									$title 	= 'Tab '.$key;
								}
								?>
								<li class="<?php if($key == 0){echo 'active';}?>"><a data-toggle="tab" href="#<?php echo $value['id'];?>"><?php echo $title;?></a></li>
								<?php
							}
						}
						?>
						</ul>
						<?php
					}				
				?>

				<?php
					if(isset($form['detail'])){
						?>
						<div class="tab-content">
						<?php
						foreach($form['detail'] as $key => $value){
							if(check_access($_SESSION['groupname'],$value['access'])){
								?>
								<div id="<?php echo $value['id'];?>" class="tab-pane fade in <?php if($key == 0){echo 'active';}?>">
									<?php if(is_windows()){
											$isi = str_replace('/','\\',$value['include']);
											include $isi;
									}else{
										include $value['include'];										
									}
									?>									
								</div>
								<?php
								if(is_numeric($form['edit_segment']) && empty(uri_segment($form['edit_segment']))){
									$form_module 	= end(explode('/',$value['include']));
									if(strpos($form_module,'-form.php')){
										$mod_name 	= str_replace('-form.php','_frm',$form_module);
										?>
										<script>
											$(document).ready(function(){
												$("#<?php echo str_replace('-','',$mod_name);?> :input").prop("disabled", true);
											})
										</script>
										<?php
									}									
								}
							}
						}
						?>
						</div>				
						<?php
					}				
				?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </section><!-- /.content -->
		<style type="text/css">
		#<?php echo str_replace('-','',$form['module']).'_frm'; ?> .form-control-feedback {
			pointer-events: auto;
		}
		#<?php echo str_replace('-','',$form['module']).'_frm'; ?> .form-control-feedback:hover {
			cursor: pointer;
		}
		</style>		
		<?php
			if($form['ajax']){
				?>
					<script type="text/javascript">
								$(document).ready(function(){
									window.getdata<?php echo str_replace('-','',$form['module']);?> = function(id){
										$.ajax({
												type: "POST",
												async: false,
												url: "<?php echo uri_link('form-data');?>",
												data: {
													"query" 		: <?php echo json_encode(encode($form['data']));?>,
													"where" 		: <?php echo json_encode(encode($form['id']));?>,
													"bind" 			: <?php if(isset($form['bind'])){echo json_encode($form['bind']);}else{echo "0";}?>,
													"id"			: id
													},
												cache: false,
												dataType: "json",
												success: function(res){
													for(var obj in res){
														for (var val in res[obj]){
															var date_format 	= "YYYY-MM-DD";
															if(moment(res[obj][val], date_format, true).isValid()){
																res[obj][val] = moment(res[obj][val]).format('<?php echo fe_date_format_input; ?>'); // return true
															}
															if(isFloat(res[obj][val])){
																res[obj][val] = numberToStr(res[obj][val],'<?php echo fe_thousand_separator;?>','<?php echo fe_decimal_separator;?>');
															}
															if(val === 'id'){
																$("#id<?php echo str_replace('-','',$form['module']);?>").val(res[obj][val]).change();
																$("#id<?php echo str_replace('-','',$form['module']);?>").trigger('change');
																
															}else{
																$('#'+val).val(res[obj][val]).change();
																$('#'+val).trigger('change');
															}
														}
													}
												}
										});	
									}
									<?php
										if(isset($form['modal']) && $form['modal'] == false){
											?>
												getdata<?php echo str_replace('-','',$form['module']);?>("<?php echo uri_segment($form['edit_segment']);?>");
												var _href = $("a.subtableadd").attr("href");
												$("a.subtableadd").attr("href", _href + '/<?php echo uri_segment($form['edit_segment']);?>');												
											<?php
										}
									?>
									$('#<?php echo str_replace('-','',$form['module']).'_frm'; ?>')
									.formValidation({
										framework: 'bootstrap',
										icon: {
											valid: 'glyphicon glyphicon-ok',
											invalid: 'glyphicon glyphicon-remove',
											validating: 'glyphicon glyphicon-refresh'
										},
										fields: {
											<?php
												validation($form['input'])
											?>
										}
									}).on('success.form.fv', function(e){
											// Prevent form submission
											e.preventDefault();
											var cek     = $('#<?php echo str_replace('-','',$form['module']).'_frm'; ?>').find('input[required], select[required], textarea[required]');						
											var req     = [];
											var ids     = [];
											for(var i=0;i<cek.length;i++){
												req.push(cek[i]['id']);
												if(cek[i]['value'] =='' || cek[i]['value'] ==null){
													ids.push(cek[i]['id']);
												}
											}
											$("#required<?php echo str_replace('-','',$form['module']);?>").val(req);
											console.log(ids);
											if(!(ids.length>0)){
												var form 	= document.getElementById("<?php echo str_replace('-','',$form['module']).'_frm'; ?>");
												var data = new FormData(form);
												$.ajax({
														type: "POST",
														async: false,
														url: "<?php echo uri_link($form['module'].'-'.fe_process); ?>",
														data: data,
														cache: false,
														processData: false,
														contentType: false,
														dataType: "json",
														async: true,
														beforeSend: function(){
															$("#save_button<?php echo str_replace('-','',$form['module']);?>").button('loading');
														},
														complete: function(){
														},
														success: function(res){
															if(res['status'] === 'success'){
																<?php
																if(isset($form['modal']) && $form['modal'] == false){
																	if(isset($form['reload']) && $form['reload'] == true){
																		if(empty(uri_segment($form['edit_segment']))){
																			$url 	= implode('/',uri_all());
																			?>
																			$(location).attr("href","<?php echo uri_link($url.'/');?>"+res['message']);
																			<?php																			
																		}else{
																			?>
																			$("#addData<?php echo str_replace('-','',$form['module']);?>").modal('hide');
																			$("#<?php echo str_replace('-','',$form['module']);?>_table").DataTable().ajax.reload();										
																			$("#save_button<?php echo str_replace('-','',$form['module']);?>").button('reset');
																			<?php																		
																		}
																	}else{
																		?>
																		$("#addData<?php echo str_replace('-','',$form['module']);?>").modal('hide');
																		$("#<?php echo str_replace('-','',$form['module']);?>_table").DataTable().ajax.reload();										
																		$("#save_button<?php echo str_replace('-','',$form['module']);?>").button('reset');
																		<?php																		
																	}
																}else{
																	?>
																	$("#addData<?php echo str_replace('-','',$form['module']);?>").modal('hide');
																	$("#<?php echo str_replace('-','',$form['module']);?>_table").DataTable().ajax.reload();										
																	$("#save_button<?php echo str_replace('-','',$form['module']);?>").button('reset');
																	<?php
																}
																?>
															}else{
																var status 	= "error";
																swal(res['title'], res['message'], status);
																$("#save_button<?php echo str_replace('-','',$form['module']);?>").button('reset');
															}
														}
												});
											}
									});
									$('#<?php echo str_replace('-','',$form['module']).'_frm'; ?>').data('formValidation').resetForm();
									window.clear_form<?php echo str_replace('-','',$form['module']);?> 	= function(){
										$("#<?php echo str_replace('-','',$form['module']);?>_frm").find("input[type=text], input[type=file], input[type=number], input[type=date], input[type=radio], input[type=checkbox], input[type=password], input[type=email], select, textarea").val('');
										$("#<?php echo str_replace('-','',$form['module']);?>_frm").find("#id<?php echo str_replace('-','',$form['module']);?>").val('');
									}															
								});	
							</script>
				<?php
			}
		?>
<?php
}

function form_master($form,$table){
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo strtoupper($form['module']." ".fe_form); ?>
            <!-- <small>Form Biodata Kelas</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo uri_link(strtolower($form['module']."-".fe_table)); ?>"><i class="fa fa-dashboard"></i><?php echo ucwords($form['module']); ?></a></li>
            <li class="active"><?php echo ucwords($form['module']." ".fe_form); ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
              <!-- Form Element sizes -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <!-- <h2 class="box-title">FORM BIODATA GURU</h2> -->
                </div>
                <div class="box-body">

              <div class="row">
                  <form action="<?php echo uri_link($form['module'].'-'.fe_process); ?>" name="kelas" enctype="multipart/form-data" method="<?php echo $form['method']; ?>">
                  <?php
                  /* Initial Protection code
                   * You can put it anywhere inside the <form> tag
                   */

                  Sasla::protectMe();
                  ?>
                <div class="col-md-6">
                  <?php
                  if(array_key_exists("input-top-left",$form)){
                    input($form['input-top-left']);
                  }
                  ?>
                </div><!-- /.col -->
                <div class="col-md-6">
                  <?php
                  if(array_key_exists('input-top-right',$form)){
                    input($form['input-top-right']);
                  }
                  ?>
                </div><!-- /.col -->


              </div><!-- /.row -->
              <!-- FORM DETAIL -->
              <div class="row">
                <div class="col-md-12">

                        <div id="detail"  style="margin-top:-30px;margin-bottom: -30px;">
                            <!--
                            <section class="content-header">
                              <h1>
                                <?php //echo $table['title']; ?>
                              </h1>
                            </section>
                          -->


                            <section class="content">
                                  <!-- Main content -->
                                    <br />
                                    <div class="row">
                                      <div class="col-xs-12">
                                          <div class="box-header">
                                            <!-- <h3 class="box-title">Tabel Daftar Kelas</h3> -->
                                            <div class="box-tools">
                                              <div class="input-group" style="width: 150px;">
                                                <!--
                                                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                                                <div class="input-group-btn">
                                                  <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                                </div>
                                                -->
                                              </div>
                                            </div>
                                          </div><!-- /.box-header -->
                                          <div class="box-body table-responsive no-padding">
                                            <table id="datatable" class="table table-bordered table-hover table-striped">
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
                                                      $item = "";
                                                    ?>
                                                      <tr>
                                                          <td><?php echo $no; ?></td>
                                                            <?php
                                                              foreach($body as $key1 => $val1){
                                                                if($key1==$table['id']){
                                                                  $item = $val1;
                                                                  continue;
                                                                }else{
                                                                ?>
                                                                        <td><?php echo $val1; ?></td>
                                                                    <?php                           
                                                                }
                                                              }                         
                                                            ?>
                                                            <td align="center">
                                                              <div class="btn-group">
                                                                  <a href="<?php echo uri_link($table['module'].'-form/'.$id); ?>"><div class="btn btn-success btn-sm"><i class="fa fa-edit"></i></div></a>
                                                                  <a href="<?php echo uri_link('delete/'.$table['name'].'/'.$table['id'].'/'.$item); ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button>
                                                              </div><!-- /.btn-group -->
                                                             </td>
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

                                          </div>
                                        </div><!-- /.box -->
                                  </div><!-- /.row -->
                                <!-- </div> --><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="col-xs-4">
                                      <!-- <div class="btn btn-success btn-sm" style="margin:2px;" onclick="jq_hide(this,'.box-body',0);"><i class="fa fa-plus"></i> Add Data</div> -->
                                    </div>
                                </div>
                              <!-- </div><!-- /.box -->

                            </section>
                        </div>
                    <?php
                      if(update_check()==false){
                      ?>
                        <script type="text/javascript">
                          //jq_hide(this,'.button-add',0);
                        </script>    
                      <?php
                      }
                    ?>
                </div>
              </div>
              <!-- END FORM DETAIL -->



              <div class="row">
              <form action="<?php echo $form['action']; ?>" name="kelas" enctype="multipart/form-data" method="<?php echo $form['method']; ?>">                
              <?php
              /* Initial Protection code
               * You can put it anywhere inside the <form> tag
               */

              Sasla::protectMe();
              ?>
                
                <div class="col-md-6">
                  <?php
                  if(array_key_exists('input-bottom-left',$form)){
                    input($form['input-bottom-left']);
                  }
                  ?>
                </div><!-- /.col -->
                <div class="col-md-6">
                  <?php
                  if(array_key_exists('input-bottom-right',$form)){
                    input($form['input-bottom-right']);
                  }
                  ?>
                </div><!-- /.col -->

              </div><!-- /.row -->

            </div><!-- /.box-body -->
            <div class="box-footer">
                <div class="form-group">
					<input type="hidden"    name="id" id="id<?php echo str_replace('-','',$form['module']);?>" class="form-control input-lg" value="<?php if(update_check()){echo $id;}?>"/>
                    <?php
						if((isset($form['modal']) && $form['modal'] == false) && (isset($form['edit_only']) && $form['edit_only'] == true) && (is_numeric($form['edit_segment']) && empty(uri_segment($form['edit_segment'])))){
						}else{
							if($form['submit_button']==TRUE){
							?>
							  <input type="submit" value="Simpan" class="form-control input-lg btn btn-primary" id="simpan"/>
							<?php
							}
						}
						if($form['print_button']==TRUE){
						?>
						  <a href="<?php echo uri_link('penjualan-invoice/$id');?>" target="_blank"><div class="form-control input-lg btn btn-primary">Cetak Invoice</div></a>
						<?php
						}														
                    ?>
                </div>
            </div>
          </form>
          </div><!-- /.box -->
      </section>
<?php
}
?>