<?php 
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
function input($input){
	if(is_array($input) || is_object($input)){
	  foreach($input as $k => $v){
	    if(check_access($_SESSION['groupname'],$input[$k]['access'])){
	        if($input[$k]['type']=="email" || $input[$k]['type']=="url" || $input[$k]['type']=="file"){
	        	field($input[$k]);
	        }elseif($input[$k]['type']=="text"){
	        	text($input[$k]);
	        }elseif($input[$k]['type']=="date"){
	        	date_input($input[$k]);
	        }elseif($input[$k]['type']=="select_query"){
	        	select_query($input[$k]);
	        }elseif($input[$k]['type']=="select_data"){
	        	select_data($input[$k]);
	        }elseif($input[$k]['type']=="select"){
	        	select($input[$k]);
	        }elseif($input[$k]['type']=="select_target"){
	        	select_target($input[$k]);
	        }elseif($input[$k]['type']=="number"){
	        	number($input[$k]);
	        }elseif($input[$k]['type']=="currency"){
	        	currency($input[$k]);
	        }elseif($input[$k]['type']=="radio"){
	        	radio($input[$k]);
	        }elseif($input[$k]['type']=="checkbox"){
	        	checkbox($input[$k]);
	        }elseif($input[$k]['type']=="password"){
	        	password($input[$k]);
	        }elseif($input[$k]['type']=="hidden"){
	        	hidden($input[$k]);
	        }elseif($input[$k]['type']=="textarea"){
	        	textarea($input[$k]);
	        }
	    }
	  }		
	}
}
function field($property){
    if(check_access($_SESSION['groupname'],$property['access'])){
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            <div class="col-md-<?php echo $property['column'];?>">		
		<?php
		}
		?>
	    <div class="form-group">
			<?php
				if(isset($property['size'])){
					if($property['size'] == 'sm'){
						$heading 	= 'h6';
					}elseif($property['size']=='md'){
						$heading 	= 'h5';
					}else{
						$heading 	= 'h4';
					}
				}else{
					$heading 	= 'h4';
				};
			?>
	        <<?php echo $heading; ?> class="box-title"><?php echo $property['label']; ?></<?php echo $heading; ?>>
	            <input id="<?php echo $property['name']; ?>" type="<?php echo $property['type']; ?>" name="<?php echo $property['name']; ?>" placeholder="<?php echo $property['placeholder']; ?>" class="form-control input<?php if(isset($property['size'])){if($property['size'] == 'sm'){echo '-sm';}elseif($property['size']=='md'){echo 'default';}else{echo '-lg';}}else{echo '-lg';};?>" value="<?php echo $property['value'];?>" <?php if($property['required']==true){echo "required";}?> <?php if(!check_access($_SESSION['groupname'],$property['unlock-for'])){echo "disabled";}?><?php if(isset($property['autofocus']) && $property['autofocus']){echo 'autofocus';}?>/>
	    </div>
	    <?php    	
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            </div>		
		<?php
		}
    }
}
function date_input($property){
    if(check_access($_SESSION['groupname'],$property['access'])){
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            <div class="col-md-<?php echo $property['column'];?>">		
		<?php
		}
		?>
	    <div class="form-group">
			<?php
				if(isset($property['size'])){
					if($property['size'] == 'sm'){
						$heading 	= 'h6';
					}elseif($property['size']=='md'){
						$heading 	= 'h5';
					}else{
						$heading 	= 'h4';
					}
				}else{
					$heading 	= 'h4';
				};
			?>
	        <<?php echo $heading; ?> class="box-title"><?php echo $property['label']; ?></<?php echo $heading; ?>>
	            <input id="<?php echo $property['name']; ?>" type="text" name="<?php echo $property['name']; ?>" placeholder="<?php echo $property['placeholder']; ?>" class="form-control input<?php if(isset($property['size'])){if($property['size'] == 'sm'){echo '-sm';}elseif($property['size']=='md'){echo 'default';}else{echo '-lg';}}else{echo '-lg';};?>" value="<?php echo $property['value'];?>" <?php if($property['required']==true){echo "required";}?> <?php if(!check_access($_SESSION['groupname'],$property['unlock-for'])){echo "disabled";}?><?php if(isset($property['autofocus']) && $property['autofocus']){echo 'autofocus';}?>/>
	    </div>
	    <?php    	
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            </div>		
		<?php
		}
			if(isset($property['mask']) && $property['mask'] !==''){
				?>
					<script>
						$( function() {
							$("#<?php echo $property['name']; ?>").inputmask(<?php echo $property['mask']; ?>);
						});
					</script>
				<?php
			}
    }
}
function text($property){
    if(check_access($_SESSION['groupname'],$property['access'])){
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            <div class="col-md-<?php echo $property['column'];?>">		
		<?php
		}
		?>
	    <div class="form-group">
			<?php
				if(isset($property['size'])){
					if($property['size'] == 'sm'){
						$heading 	= 'h6';
					}elseif($property['size']=='md'){
						$heading 	= 'h5';
					}else{
						$heading 	= 'h4';
					}
				}else{
					$heading 	= 'h4';
				};
			?>
	        <<?php echo $heading; ?> class="box-title"><?php echo $property['label']; ?></<?php echo $heading; ?>>
            <input id="<?php echo $property['name']; ?>" type="<?php echo $property['type']; ?>" name="<?php echo $property['name']; ?>" placeholder="<?php echo $property['placeholder']; ?>" class="form-control input<?php if(isset($property['size'])){if($property['size'] == 'sm'){echo '-sm';}elseif($property['size']=='md'){echo 'default';}else{echo '-lg';}}else{echo '-lg';};?> <?php if(isset($property['unmask']) && $property['unmask']){echo 'unmask';}else{echo '';} ?>" value="<?php echo $property['value'];?>" <?php if($property['required']==true){echo "required";}?> <?php if(!check_access($_SESSION['groupname'],$property['unlock-for'])){echo "disabled";}?><?php if(isset($property['autofocus']) && $property['autofocus']){echo 'autofocus';}?>/>
	    </div>
	    <?php    	
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            </div>		
		<?php
		}
			if(isset($property['mask']) && $property['mask'] !==''){
				?>
					<script>
						$( function() {
							$("#<?php echo $property['name']; ?>").inputmask(<?php echo $property['mask']; ?><?php if(isset($property['unmask']) && $property['unmask']){echo ',{ "removeMaskOnSubmit": true }';}?>);
						});
					</script>
				<?php
			}
		?>
    <?php
	}
}
function password($property){
    if(check_access($_SESSION['groupname'],$property['access'])){
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            <div class="col-md-<?php echo $property['column'];?>">		
		<?php
		}
		?>
	    <div class="form-group">
			<?php
				if(isset($property['size'])){
					if($property['size'] == 'sm'){
						$heading 	= 'h6';
					}elseif($property['size']=='md'){
						$heading 	= 'h5';
					}else{
						$heading 	= 'h4';
					}
				}else{
					$heading 	= 'h4';
				};
			?>
	        <<?php echo $heading; ?> class="box-title"><?php echo $property['label']; ?></<?php echo $heading; ?>>
            <input id="<?php echo $property['name']; ?>" type="<?php echo $property['type']; ?>" name="<?php echo $property['name']; ?>" placeholder="<?php echo $property['placeholder']; ?>" class="form-control input<?php if(isset($property['size'])){if($property['size'] == 'sm'){echo '-sm';}elseif($property['size']=='md'){echo 'default';}else{echo '-lg';}}else{echo '-lg';};?>" value="" <?php if($property['required']==true){echo "required";}?> <?php if(!check_access($_SESSION['groupname'],$property['unlock-for'])){echo "disabled";}?><?php if(isset($property['autofocus']) && $property['autofocus']){echo 'autofocus';}?>/>
	    </div>
	    <?php    	
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            </div>		
		<?php
		}
	}
}
function hidden($property){
    if(check_access($_SESSION['groupname'],$property['access'])){
	?>
	    <div class="form-group">
            <input id="<?php echo $property['name']; ?>" type="<?php echo $property['type']; ?>" name="<?php echo $property['name']; ?>" class="form-control input<?php if(isset($property['size'])){if($property['size'] == 'sm'){echo '-sm';}elseif($property['size']=='md'){echo 'default';}else{echo '-lg';}}else{echo '-lg';};?>" value="<?php echo $property['value']; ?>" <?php if($property['required']==true){echo "required";}?> <?php if(!check_access($_SESSION['groupname'],$property['unlock-for'])){echo "disabled";}?><?php if(isset($property['autofocus']) && $property['autofocus']){echo 'autofocus';}?>/>
	    </div>
    <?php
	}
}
function number($property){
    if(check_access($_SESSION['groupname'],$property['access'])){
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            <div class="col-md-<?php echo $property['column'];?>">		
		<?php
		}
		?>
	    <div class="form-group">
			<?php
				if(isset($property['size'])){
					if($property['size'] == 'sm'){
						$heading 	= 'h6';
					}elseif($property['size']=='md'){
						$heading 	= 'h5';
					}else{
						$heading 	= 'h4';
					}
				}else{
					$heading 	= 'h4';
				};
			?>
	        <<?php echo $heading; ?> class="box-title"><?php echo $property['label']; ?></<?php echo $heading; ?>>
            <input id="<?php echo $property['name']; ?>" type="text" name="<?php echo $property['name']; ?>" placeholder="<?php echo $property['placeholder']; ?>" class="form-control input<?php if(isset($property['size'])){if($property['size'] == 'sm'){echo '-sm';}elseif($property['size']=='md'){echo 'default';}else{echo '-lg';}}else{echo '-lg';};?>" value="<?php echo $property['value'];?>" <?php if($property['required']==true){echo "required";}?> min="<?php if(isset($property['min'])){echo $property['min'];}else{echo '0';} ?>" max="<?php if(isset($property['max'])){echo $property['max'];}else{echo '';} ?>" step="<?php if(isset($property['step'])){echo $property['step'];}else{echo '1';} ?>" <?php if(!check_access($_SESSION['groupname'],$property['unlock-for'])){echo "disabled";}?><?php if(isset($property['autofocus']) && $property['autofocus']){echo 'autofocus';}?>/>
	    </div>
	    <?php    	
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            </div>		
		<?php
		}
			if(isset($property['mask']) && $property['mask'] !==''){
				?>
					<script>
						$('#<?php echo $property['name']; ?>').mask("<?php echo $property['mask']; ?>", {reverse: true});
					</script>
				<?php
			}
		?>		
    <?php
	}
}
function currency($property){
    if(check_access($_SESSION['groupname'],$property['access'])){
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            <div class="col-md-<?php echo $property['column'];?>">		
		<?php
		}
		?>
	    <div class="form-group">
			<?php
				if(isset($property['size'])){
					if($property['size'] == 'sm'){
						$heading 	= 'h6';
					}elseif($property['size']=='md'){
						$heading 	= 'h5';
					}else{
						$heading 	= 'h4';
					}
				}else{
					$heading 	= 'h4';
				};
			?>
	        <<?php echo $heading; ?> class="box-title"><?php echo $property['label']; ?></<?php echo $heading; ?>>
            <input id="<?php echo $property['name']; ?>" type="text" name="<?php echo $property['name']; ?>" placeholder="<?php echo $property['placeholder']; ?>" class="form-control input<?php if(isset($property['size'])){if($property['size'] == 'sm'){echo '-sm';}elseif($property['size']=='md'){echo 'default';}else{echo '-lg';}}else{echo '-lg';};?>" value="<?php echo $property['value'];?>" <?php if($property['required']==true){echo "required";}?> min="<?php if(isset($property['min'])){echo $property['min'];}else{echo '0';} ?>" max="<?php if(isset($property['max'])){echo $property['max'];}else{echo '';} ?>" step="<?php if(isset($property['step'])){echo $property['step'];}else{echo '1';} ?>" <?php if(!check_access($_SESSION['groupname'],$property['unlock-for'])){echo "disabled";}?><?php if(isset($property['autofocus']) && $property['autofocus']){echo 'autofocus';}?>/>
	    </div>
	    <?php    	
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            </div>		
		<?php
		}
			if(isset($property['mask']) && $property['mask'] !==''){
				?>
					<script>
						$('#<?php echo $property['name']; ?>').mask("<?php echo $property['mask']; ?>", {reverse: true});
					</script>
				<?php
			}
		?>		
    <?php
	}
}
function textarea($property){
    if(check_access($_SESSION['groupname'],$property['access'])){
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            <div class="col-md-<?php echo $property['column'];?>">		
		<?php
		}
		?>
        <div class="form-group">
			<?php
				if(isset($property['size'])){
					if($property['size'] == 'sm'){
						$heading 	= 'h6';
					}elseif($property['size']=='md'){
						$heading 	= 'h5';
					}else{
						$heading 	= 'h4';
					}
				}else{
					$heading 	= 'h4';
				};
			?>
	        <<?php echo $heading; ?> class="box-title"><?php echo $property['label']; ?></<?php echo $heading; ?>>
            <textarea id="<?php echo $property['name']; ?>" name="<?php echo $property['name']; ?>" rows="10" cols="80" <?php if(!check_access($_SESSION['groupname'],$property['unlock-for'])){echo "disabled";}?> <?php if($property['required']==true){echo "required";}?><?php if(isset($property['autofocus']) && $property['autofocus']){echo 'autofocus';}?>><?php echo $property['value'];?></textarea>
        </div>
	    <script src="<?php echo uri_file(fe_ckeditor.'/ckeditor.js'); ?>"></script>
	    <script>
	        $(function (){
	            CKEDITOR.replace('<?php echo $property['name']; ?>');
	            //$("textarea").wysihtml5();
	        });
	    </script>
	    <?php    	
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            </div>		
		<?php
		}
	}
}
function select_query($property){
    if(check_access($_SESSION['groupname'],$property['access'])){
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            <div class="col-md-<?php echo $property['column'];?>">		
		<?php
		}
		?>
	    <div class="form-group">
			<?php
				if(isset($property['size'])){
					if($property['size'] == 'sm'){
						$heading 	= 'h6';
					}elseif($property['size']=='md'){
						$heading 	= 'h5';
					}else{
						$heading 	= 'h4';
					}
				}else{
					$heading 	= 'h4';
				};
			?>
	        <<?php echo $heading; ?> class="box-title"><?php echo $property['label']; ?></<?php echo $heading; ?>>
				<select id="<?php echo $property['name']; ?>" name="<?php echo $property['name']; ?>" class="form-control input<?php if(isset($property['size'])){if($property['size'] == 'sm'){echo '-sm';}elseif($property['size']=='md'){echo 'default';}else{echo '-lg';}}else{echo '-lg';};?> select2" <?php if($property['required']==true){echo "required";}?> <?php if(!check_access($_SESSION['groupname'],$property['unlock-for'])){echo "disabled";}?><?php if(isset($property['autofocus']) && $property['autofocus']){echo 'autofocus';}?>>
					<option value=""><?php echo $property['placeholder']; ?></option>
					<?php
					$select 	= pdo_query_array($property['query']);
					if(is_array($select) || is_object($select)){
						foreach($select as $arr){
							$data 	= array_values($arr);
							$txt 	= $data[1];
							if(sizeof($data)>2){
								for($i=2;$i<sizeof($data);$i++){
									$txt .= ' | '.$data[$i];
								}
							}
							?>
							<option value="<?php echo $data[0];?>"><?php echo $txt;?></option>
							<?php
						}
					}
					?>
				</select>
	    </div>
	    <?php    	
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            </div>		
		<?php
		}
	if(isset($property['target'])){
		if(isset($property['target']['data'])){
			if(is_array($property['target']['data']) || is_object($property['target']['data'])){
				foreach($property['target']['data'] as $k => $v) {
					if($v!==NULL){
						$val[] = '"'.safe($k).'":'.'"'.$v.'"';
					}
				}
				$data = implode(",",$val);				
			}
		}
	?>
		<script type="text/javascript">
		
		/*
		$(function (){
		});
		*/
		window.init = function(){
			<?php echo $property['name']; ?>();
		}
		$(document).ready(function(){
			window.<?php echo $property['name']; ?> = function(){
				$('#<?php echo $property['target']['id'];?>').html("<option><?php echo $property['placeholder']; ?></option>");
				var id = $("#<?php echo $property['name']; ?>").val();
				$.ajax({
					type: "POST",
					async: false,
					url: "<?php echo $property['target']['url'];?>",
					data: {"id":id},
					cache: false,
					success: function(data){
						var res = $.parseJSON(data);
						var arr = Object.keys(res).map(function (key) { return res[key]; });
						for(var obj in res){
							var arr1 = Object.keys(res[obj]).map(function (key) { return res[obj][key]; });
							var txt  = arr1[1];
							if(arr1.length > 2){
								for(var i=2; i<arr1.length;i++){
									txt += ' | '+arr1[i];
								}								
							}
							$('#<?php echo $property['target']['id'];?>').append($('<option>', { 
								value: arr1[0],
								text : txt
							}));
						}
					}
				});				
			}
			$("#<?php echo $property['name']; ?>").on('click change', function(){ <?php echo $property['name']; ?>();});
		});
		</script>
	<?php
	}
	}
}

function select_table($property){
    if(check_access($_SESSION['groupname'],$property['access'])){
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            <div class="col-md-<?php echo $property['column'];?>">		
		<?php
		}
		?>
	    <div class="form-group">
			<?php
				if(isset($property['size'])){
					if($property['size'] == 'sm'){
						$heading 	= 'h6';
					}elseif($property['size']=='md'){
						$heading 	= 'h5';
					}else{
						$heading 	= 'h4';
					}
				}else{
					$heading 	= 'h4';
				};
			?>
	        <<?php echo $heading; ?> class="box-title"><?php echo $property['label']; ?></<?php echo $heading; ?>>
				<select id="<?php echo $property['name']; ?>" name="<?php echo $property['name']; ?>" class="form-control input<?php if(isset($property['size'])){if($property['size'] == 'sm'){echo '-sm';}elseif($property['size']=='md'){echo 'default';}else{echo '-lg';}}else{echo '-lg';};?> select2" <?php if($property['required']==true){echo "required";}?> <?php if(!check_access($_SESSION['groupname'],$property['unlock-for'])){echo "disabled";}?><?php if(isset($property['autofocus']) && $property['autofocus']){echo 'autofocus';}?>>
					<option value=""><?php echo $property['placeholder']; ?></option>
					<?php
					$select 	= select_all($property['option']['table_name']);
					if(is_array($select) || is_object($select)){
						foreach ($select as $data) {
						?>
						<option value="<?php echo $data[$property['option']['value']];?>" id="<?php echo $property['name'].$data[$property['option']['value']];?>"><?php echo $data[$property['option']['text']];?></option>
						<?php
						}						
					}
					?>
				</select>
	    </div>
	    <?php    	
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            </div>		
		<?php
		}
	if(isset($property['target'])){
		if(isset($property['target']['data'])){
			if(is_array($property['target']['data']) || is_object($property['target']['data'])){
				foreach($property['target']['data'] as $k => $v) {
					if($v!==NULL){
						$val[] = '"'.safe($k).'":'.'"'.$v.'"';
					}
				}
				$data = implode(",",$val);				
			}
		}
	?>
		<script type="text/javascript">
		$(document).ready(function(){
			window.<?php echo $property['name']; ?> = function(){
				$('#<?php echo $property['target']['id'];?>').html("<option><?php echo $property['placeholder']; ?></option>");
				var id = $("#<?php echo $property['name']; ?>").val();
				$.ajax({
					type: "POST",
					async: false,
					url: "<?php echo $property['target']['url'];?>",
					data: {"id":id},
					cache: false,
					success: function(data){
						var res = $.parseJSON(data);
						var arr = Object.keys(res).map(function (key) { return res[key]; });
						for(var obj in res){
							var arr1 = Object.keys(res[obj]).map(function (key) { return res[obj][key]; });
							var txt  = arr1[1];
							if(arr1.length > 2){
								for(var i=2; i<arr1.length;i++){
									txt += ' | '+arr1[i];
								}								
							}
							$('#<?php echo $property['target']['id'];?>').append($('<option>', { 
								value: arr1[0],
								text : txt
							}));
						}
					}
				});
			}
			$("#<?php echo $property['name']; ?>").on('click change', function(){ <?php echo $property['name']; ?>();});
		});
		</script>
	<?php
	}
	}
}
function select($property){
    if(check_access($_SESSION['groupname'],$property['access'])){
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            <div class="col-md-<?php echo $property['column'];?>">		
		<?php
		}
		?>
	    <div class="form-group">
			<?php
				if(isset($property['size'])){
					if($property['size'] == 'sm'){
						$heading 	= 'h6';
					}elseif($property['size']=='md'){
						$heading 	= 'h5';
					}else{
						$heading 	= 'h4';
					}
				}else{
					$heading 	= 'h4';
				};
			?>
	        <<?php echo $heading; ?> class="box-title"><?php echo $property['label']; ?></<?php echo $heading; ?>>
				<select id="<?php echo $property['name']; ?>" name="<?php echo $property['name']; ?>" class="form-control input<?php if(isset($property['size'])){if($property['size'] == 'sm'){echo '-sm';}elseif($property['size']=='md'){echo 'default';}else{echo '-lg';}}else{echo '-lg';};?>" <?php if($property['required']==true){echo "required";}?> <?php if(!check_access($_SESSION['groupname'],$property['unlock-for'])){echo "disabled";}?><?php if(isset($property['autofocus']) && $property['autofocus']){echo 'autofocus';}?>>
					<option value=""><?php echo $property['placeholder'] ?></option>
					<?php
					if(isset($property['option'])){
						if(is_array($property['option']) || is_object($property['option'])){
							foreach ($property['option'] as $k => $v) {
							?>
							<option value="<?php echo $property['option'][$k];?>" id="<?php echo $property['name'].$property['option'][$k];?>"><?php echo $property['option'][$k];?></option>
							<?php
							}
						}
					}
					?>
				</select>
	    </div>
	    <?php    	
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            </div>		
		<?php
		}
	if(isset($property['target'])){
		if(isset($property['target']['data'])){
			if(is_array($property['target']['data']) || is_object($property['target']['data'])){
				foreach($property['target']['data'] as $k => $v) {
					if($v!==NULL){
						$val[] = '"'.safe($k).'":'.'"'.$v.'"';
					}
				}
				$data = implode(",",$val);				
			}
		}
	?>
		<script type="text/javascript">
		$(document).ready(function(){
			window.<?php echo $property['name']; ?> = function(){
				$('#<?php echo $property['target']['id'];?>').html("<option><?php echo $property['placeholder']; ?></option>");
				var id = $("#<?php echo $property['name']; ?>").val();
				$.ajax({
					type: "POST",
					async: false,
					url: "<?php echo $property['target']['url'];?>",
					data: {"id":id},
					cache: false,
					success: function(data){
						var res = $.parseJSON(data);
						var arr = Object.keys(res).map(function (key) { return res[key]; });
						for(var obj in res){
							var arr1 = Object.keys(res[obj]).map(function (key) { return res[obj][key]; });
							var txt  = arr1[1];
							if(arr1.length > 2){
								for(var i=2; i<arr1.length;i++){
									txt += ' | '+arr1[i];
								}								
							}
							$('#<?php echo $property['target']['id'];?>').append($('<option>', { 
								value: arr1[0],
								text : txt
							}));
						}
					}
				});
			}
			$("#<?php echo $property['name']; ?>").on('click change', function(){ <?php echo $property['name']; ?>();});
		});
		</script>
	<?php
	}
	}
}
function radio($property){
    if(check_access($_SESSION['groupname'],$property['access'])){
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            <div class="col-md-<?php echo $property['column'];?>">		
		<?php
		}
		?>
	    <div class="form-group">
			<?php
				if(isset($property['size'])){
					if($property['size'] == 'sm'){
						$heading 	= 'h6';
					}elseif($property['size']=='md'){
						$heading 	= 'h5';
					}else{
						$heading 	= 'h4';
					}
				}else{
					$heading 	= 'h4';
				};
			?>
	        <<?php echo $heading; ?> class="box-title"><?php echo $property['label']; ?></<?php echo $heading; ?>>
	<?php
		if(is_array($property['option']) || is_object($property['option'])){
			foreach ($property['option'] as $k => $v) {
				//echo $k." ".$v."<br />";
			?>
				<label class="containerradio"><?php echo $property['option'][$k];?>
					<input type="<?php echo $property['type']; ?>" name="<?php echo $property['name']; ?>" value="<?php echo $property['option'][$k];?>" id="<?php echo $property['option'][$k];?>" class="class="form-control input<?php if(isset($property['size'])){if($property['size'] == 'sm'){echo '-sm';}elseif($property['size']=='md'){echo 'default';}else{echo '-lg';}}else{echo '-lg';};?>" <?php if($property['required']==true){echo "required";}?> <?php if(!check_access($_SESSION['groupname'],$property['unlock-for'])){echo "disabled";}?><?php if(isset($property['autofocus']) && $property['autofocus']){echo 'autofocus';}?>/>
					<span class="radiomark"></span>
				</label>
			<?php
			}			
		}
	?>
		</div>
		<script>
			$(document).ready(function(){
				$("#<?php echo $property['value']; ?>").attr('checked',true);
			});
		</script>
	    <?php    	
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            </div>		
		<?php
		}
	}
}
function checkbox($property){
    if(check_access($_SESSION['groupname'],$property['access'])){
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            <div class="col-md-<?php echo $property['column'];?>">		
		<?php
		}
		?>
	    <div class="form-group">
			<?php
				if(isset($property['size'])){
					if($property['size'] == 'sm'){
						$heading 	= 'h6';
					}elseif($property['size']=='md'){
						$heading 	= 'h5';
					}else{
						$heading 	= 'h4';
					}
				}else{
					$heading 	= 'h4';
				};
			?>
	        <<?php echo $heading; ?> class="box-title"><?php echo $property['label']; ?></<?php echo $heading; ?>>
    <?php
		if(is_array($property['option']) || is_object($property['option'])){
			foreach ($property['option'] as $k => $v) {
				//echo $k." ".$v."<br />";
			?>
				<label class="containercheck"><?php echo $property['option'][$k];?>
					<input id="<?php echo $property['name']; ?>" type="<?php echo $property['type']; ?>" name="<?php echo $property['name']; ?>" value="<?php echo $property['option'][$k];?>" id="<?php echo $property['option'][$k];?>" <?php if($property['required']==true){echo "required";}?> <?php if(!check_access($_SESSION['groupname'],$property['unlock-for'])){echo "disabled";}?><?php if(isset($property['autofocus']) && $property['autofocus']){echo 'autofocus';}?>/>
					<span class="checkmark"></span>
				</label>
			<?php
			}			
		}
	?>
	    </div>	
	    <?php    	
		if(isset($property['column']) && (!empty($property['column']) || $property['column'] !== '')){
		?>
            </div>		
		<?php
		}
	if(update_check()){
	?><script>
	document.getElementById('<?php echo $property['value']; ?>').setAttribute("checked","checked");
	</script>
	<?php
	}
	}
}
?>