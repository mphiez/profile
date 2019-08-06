 <script>
		var img_src = document.getElementsByClassName('item-image');
		for(i=0; i< img_src.length; i++){
			if(img_src[i].naturalWidth > img_src[i].naturalHeight){
				img_src[i].style="height:100%";
			}else if(img_src[i].naturalWidth == img_src[i].naturalHeight){
				img_src[i].style="width:100%";
			}else{
				img_src[i].style="width:100%";
			}
		}
	</script>
<script src="<?=base_url();?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url();?>bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url();?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?=base_url();?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url();?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?=base_url();?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?=base_url();?>plugins/chartjs/Chart.min.js"></script>
<script src="<?=base_url();?>plugins/chosen/chosen.jquery.js"></script>
<script src="<?=base_url();?>plugins/chosen/chosen.jquery.min.js"></script>
<script src="<?=base_url()?>plugins/jQueryUI/jquery-ui.min.js"></script>
<script src="<?=base_url()?>plugins/datatables/jquery.dataTables.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--
<script src="<?=base_url();?>dist/js/pages/dashboard2.js"></script>
-->
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>dist/js/demo.js"></script>
</body>
</html>