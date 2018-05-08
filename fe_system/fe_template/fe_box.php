<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
  function box($property){
  ?>
    <div class="col-lg-<?php echo $property['column'];?> col-xs-6">
      <div class="small-box" style="background-color: <?php echo $property['color'];?>;color: white;">
        <div class="inner">
          <h3>
            <?php echo $property['number']; ?>
          </h3>
          <p><?php echo $property['label'];?></p>
        </div>
        <div class="icon" style="margin-top: 20px;">
          <i class="ion ion-<?php echo $property['icon'];?>"></i>
        </div>
        <a href="<?php echo $property['url'];?>" class="small-box-footer"><?php echo $property['more'];?> <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  <?php
  }
	function box_mini($property){
	?>
		<a href="<?php echo $property['url'];?>">
		<div class="col-md-<?php echo $property['column'];?> col-sm-<?php echo $property['column']*2;?> col-xs-<?php echo $property['column']*4;?>">
		  <div class="info-box">
			<span class="info-box-icon bg-aqua"><i class="ion ion-ios-<?php echo $property['icon'];?>"></i></span>
				<div class="info-box-content">
			  <span class="info-box-text">
				<?php echo $property['label'];?>
			  </span>
			  <span class="info-box-number">
				<?php echo $property['number']; ?>
			  </span>
			</div>
			<!-- /.info-box-content -->
		  </div>
		  <!-- /.info-box -->
		</div>
		</a>
	<?php
	}
?>