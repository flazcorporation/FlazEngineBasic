<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
  function calendar($property){
  ?>
    <div class="col-lg-<?php echo $property['column'];?> col-xs-6">
      <div class="box box-solid" style="background-color: <?php echo $property['color'];?>;color: white;">
          <div class="box-header">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title"><?php echo ucwords($property['title']);?></h3>
            <div class="pull-right box-tools">
              <!--                
              <div class="btn-group">
                <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#">Add new event</a></li>
                  <li><a href="#">Clear events</a></li>
                  <li class="divider"></li>
                  <li><a href="#">View calendar</a></li>
                </ul>
              </div>
              -->
              <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
        <div class="box-body no-padding" style="color: white;">
          <div id="calendar" style="width: 100%"></div>
        </div><!-- /.box-body -->
        <!--
        <div class="box-footer text-black">
          <div class="row">
            <div class="col-sm-6">
                <div class="clearfix">
                  <span class="pull-left">Task #1</span>
                  <small class="pull-right">90%</small>
                </div>
              <div class="progress xs">
                <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
              </div>
              <div class="clearfix">
                <span class="pull-left">Task #2</span>
                <small class="pull-right">70%</small>
              </div>
              <div class="progress xs">
                <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="clearfix">
                <span class="pull-left">Task #3</span>
                <small class="pull-right">60%</small>
              </div>
              <div class="progress xs">
              </div>
              <div class="clearfix">
                <span class="pull-left">Task #4</span>
                <small class="pull-right">40%</small>
              </div>
              <div class="progress xs">
                <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
              </div>
            </div>
          </div>
        </div>
        -->
      </div><!-- /.box -->
    </div>
  <?php
  }
?>
  
