<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
?>
    <!-- Sparkline -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/sparkline/jquery.sparkline.min.js');?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/knob/jquery.knob.js');?>"></script>
    <!-- daterangepicker -->
	
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/moment/moment.js');?>"></script>
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/daterangepicker/daterangepicker.js');?>"></script>
    <!-- datepicker -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/datepicker/bootstrap-datepicker.js');?>"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
    <!-- Slimscroll -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/fastclick/fastclick.min.js');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/dist/js/app.min.js');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/datatables/jquery.dataTables.min.js');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/datatables/dataTables.bootstrap.min.js');?>"></script>
    <!-- AdminLTE App -->    
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->    
    <script src="<?php echo uri_file(fe_back_end_theme.'/dist/js/pages/dashboard.js');?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/select2/select2.full.min.js');?>"></script>
    <script src="<?php echo uri_file(fe_back_end_theme.'/dist/js/demo.js');?>"></script>
    <!-- ChartJS -->
    <script src="<?php echo uri_file(fe_back_end_theme.'/plugins/chartjs/Chart.js');?>"></script>

	<!-- TAWK TO CHAT -->
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src= '<?php echo fe_tawktosrc; ?>';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
		<?php
			if(fe_app_right_click){
				?>
					$(document).on("contextmenu",function(e){
						return false;
					});		
				<?php
			}
		?>
	</script>
	<!--End of Tawk.to Script-->
	<!-- TAWK TO CHAT -->