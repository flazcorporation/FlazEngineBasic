<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
?>
              <div class="box box-success">
                <div class="box-header with-border">
                  <!-- <h2 class="box-title">FORM BIODATA GURU</h2> -->
                </div>
                <div class="box-body">
                	<!-- GANTI DARI SINI -->
			        <!-- Main content -->
			          <div class="row">
			            <div class="col-xs-12">
						<center><h1 onclick="jq_animate({'height':'toggle'},'.small-box','5');"><b>SELAMAT DATANG DI SISTEM INFORMASI ARSIP NILAI</b></h1></center>
						<!-- <center><h1 onclick="jq_hide(this,".small-box","5");"><b>(SIAN)</b></h1></center> -->
            <center><h1 onClick="jqhide();" class="sian"><b>(SIAN)</b></h1></center>
						<center><h3 onClick="jq_set_text('.sian','APLIKASI NILAI');"><b>Aplikasi Ini Digunakan Untuk Memudahkan Distribusi Nilai Dari Guru Ke Wali Kelas.</b></h3></center>
						<center><h4 onClick="jq_load('.sian','http://www.w3schools.com/jquery/jquery_ajax_load.asp');"><b>Dikembangkan Oleh: <a href="http://flazhost.com" target="_blank">Mulyawan Sentosa,S. ST.</a></b></h3></center>
            <center><button class="btn btn-primary btn-lg" onClick="hello();">Kirim Data</button></center>            
						<?php
                //success_message("Hallo","Ini Hello","");
            ?>
						</div>
					  </div>
				</div>
    		  </div>
        <script>
          function jqhide(){
            var attribute = {
              'effect'    : 'animate',
              'target'    : '.small-box',
              'param'     : {'height' : 'toggle'},
              'speed'     : 'slow'
            }
            jq(attribute);
          }
          function lihat(target){
            var value = jq_text(target);
            //var nilai = jq_text(selector,target);
            //console.log(value);
            alert(value);
          }
        </script>
