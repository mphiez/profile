<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JURNAL - Acountan Managment System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>font-awesome-4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="<?=base_url()?>font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="shortcut icon" href="<?=base_url()?>/assets/icon.ico" type="image/x-icon" /> 
  <link rel="stylesheet" href="<?=base_url()?>dist/ionicons.min.css">
  <!-- data tables -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=base_url()?>plugins/datatables/jquery.dataTables.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/chosen/chosen.css">
  <link rel="stylesheet" href="<?=base_url()?>plugins/chosen/chosen.min.css">
  <link rel="stylesheet" href="<?=base_url()?>plugins/jQueryUI/jquery-ui.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>DMS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$this->session->userdata('pn_name')?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->userdata('pn_name')?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url()?>index.php/login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<div class="row">
		<div class="col-lg-6">
			<div class="col-lg-12">
				<h3>Tujuan</h3>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<label class="col-md-3">Province</label>
					<div class="col-md-9">
						<select id="province-origin" onchange="return getCityOrigin()" class="form-control">
							<option value="">Pilih Provinsi</option>
							<?php 
							$result = json_decode($province);
							if($result->rajaongkir->status->code == 200){
								foreach($result->rajaongkir->results as $res){
							?>
							<option value="<?php echo $res->province_id;?>"><?php echo $res->province;?></option>
								<?php }}?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<label class="col-md-3">Kota</label>
					<div class="col-md-9">
						<select id="city-origin" class="form-control">
							<option value="">Pilih Kota</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<h3>Tujuan</h3>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<label class="col-md-3">Province</label>
					<div class="col-md-9">
						<select id="province-destination" onchange="return getCityDestination()" class="form-control">
							<option value="">Pilih Provinsi</option>
							<?php 
							$result = json_decode($province);
							if($result->rajaongkir->status->code == 200){
								foreach($result->rajaongkir->results as $res){
							?>
							<option value="<?php echo $res->province_id;?>"><?php echo $res->province;?></option>
								<?php }}?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<label class="col-md-3">Kota</label>
					<div class="col-md-9">
						<select id="city-destination" class="form-control">
							<option value="">Pilih Kota</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<h3>Weight</h3>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<label class="col-md-3">Berat</label>
					<div class="col-md-9">
						<input type="text" class="form-control" placeholder="0" value="" id="weight">
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<div class="col-md-12">
						<button class="btn btn-success pull-right" onclick="return hitung()">Hitung</button>
					</div>
				</div>
			</div>
		</div>
	</div>
  </div>
    <!-- /.content -->
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2016 <a href="#">Pisilia Decoration</a>.</strong> All rights
    reserved.
  </footer>
  <script>
	function getCityOrigin(){
		$.ajax({
			url:"<?php echo base_url()?>index.php/ongkir/getcity",  
			type:"POST",
			data : {"province" : $('#province-origin').val()},
			success:function(datax){
				$('#city-origin').empty();
				$('#city-origin').append(datax);
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			  }
	   });
	}
	
	function getCityDestination(){
		$.ajax({
			url:"<?php echo base_url()?>index.php/ongkir/getcity",  
			type:"POST",
			data : {"province" : $('#province-destination').val()},
			success:function(datax){
				$('#city-destination').empty();
				$('#city-destination').append(datax);
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			  }
	   });
	}
	
	function hitung(){
		$.ajax({
			url:"<?php echo base_url()?>index.php/ongkir/getcost",  
			type:"POST",
			data : {origin : $('#city-origin').val(), destination:$('#city-destination').val(), weight: $('#weight').val()},
			success:function(datax){
				console.log(datax.jne);
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			  }
	   });
	}
  </script>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
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
