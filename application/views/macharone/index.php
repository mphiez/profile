<?php $this->load->view('header-top-macharone');?>
<style>
	.content{
		padding-left : 0px;
		padding-right : 0px;
	}
	.content-header{
		padding-left : 0px;
		padding-right : 0px;
	}
	.box-footer-md {
		height: 70px !important;
	}
	.box-body-md {
		height: 120px;
	}
	.box-body-md-draw {
		height: 180px;
	}
	.item-image{
		cursor:pointer;
	}
	.box-footer{
		text-align:center;
	}
	.col-lg-12{
		margin : 0px 0px 0px 0px !important;
		padding : 0px 0px 0px 0px !important;
	}
	
	.btn-space{
		margin : 0px 0px 10px 0px;
	}
	
	.top-menu-icon{
		display:inline-block;
		color:white;
		cursor:pointer;
	}
	
	.top-menu-icon{
		display:inline-block;
		color:white;
	}
	
	.content-header > .breadcrumb {
		background: #dd4b39;
	}
	.col-md-12{
		margin-left : 0px;
		margin-right : 0px;
		padding-left : 0px;
		padding-right : 0px;
	}
	
	.col-xs-4{
		margin-left : 0px;
		margin-bottom : 5px;
		margin-right : 0px;
		padding-left : 4px;
		padding-right : 4px;
	}
	
	.label-warning{
		border-radius : 50%;
		font-size : 10px;
	}
	.top-icon{
		font-size : 20px;
		color : white;
		padding: 5px !important;
	}
	.breadcrumb{
		padding: 0px !important;
	}
	
	.img{
		max-width:220px;
		max-height:220px;
		border-radius : 50%;
		border : 2px lightgray solid;
		overflow: hidden;
		margin: auto;
	}
	
	@media only screen and (max-width: 450px) {
		.img{
			max-width:80px;
			max-height:80px;
			border-radius : 50%;
			border : 2px lightgray solid;
			overflow: hidden;
			margin: auto;
		}
		h5{
			font-size : 11px;
			margin-bottom : 10px;
		}
	}
	
	small{
		padding-top: 6px;
	}
	
	.table-responsive {
		overflow-y : visible;
		height:300px;
	}
	
	@media only screen and (min-width: 700px) {
		.table-responsive {
			overflow-y : visible;
			height:unset;
		}
	}
	
	.form-control{
		padding : 0px;
	}
	
	.btn {
		padding : 5px;
	}
	
	.mini-icon {
		color:red;font-size:8px;background-color:white;border-radius:50%;border:1px solid red;padding: 3px;
	}
	
	.mini-icon-red {
		color:red;font-size:8px;background-color:white;border-radius:50%;border:1px solid red;padding: 3px;
	}
	
	.mini-icon-green {
		color:green;font-size:8px;background-color:white;border-radius:50%;border:1px solid green;padding: 3px;
	}
	
	.mini-icon-blue {
		color:blue;font-size:8px;background-color:white;border-radius:50%;border:1px solid blue;padding: 3px;
	}
	
</style>
<div class="content">
    <div class="container nav-tabs-custom">
      <section class="content-header">
        <h1>
          <img src="<?php echo base_url()?>/assets/logo_macharone.png" width="35px" height="30px"><b>Macharone</b>
          <small class="pull-right">Version 1.0</small>
        </h1>
		<div class="breadcrumb">
			<div class="top-menu-icon" id="home" style="padding: 5px 10px 1px 20px !important;">
				<p>
					<i class="fa fa-home top-icon"></i>
				</p>
			</div>
			<div class="top-menu-icon" id="setting">
				&nbsp;&nbsp;&nbsp;
				<p>
					<i class="fa fa-gear top-icon"></i>
				</p>
			</div>
			<div class="top-menu-icon pull-right" id="" style="padding:5px 20px 1px 10px">
				&nbsp;&nbsp;&nbsp;
				<p><a href="<?php echo base_url()?>index.php/login/logout_laundry">
					<img src="<?php echo base_url()?>assets/off.png" width="20px" height="20px">
				</a></p>
			</div>
			<div class="top-menu-icon pull-right" id="pesan">
				&nbsp;&nbsp;&nbsp;
				<p>
					<i class="fa fa-envelope-o top-icon"></i>
					<span class="label label-warning" id="tot_pesan"></span>
				</p>
			</div>
			
			<div class="top-menu-icon pull-right" id="notification">
				&nbsp;&nbsp;&nbsp;
				<p>
					<i class="fa fa-bell-o top-icon"></i>
					<span class="label label-warning" id="tot_notif"></span>
				</p>
			</div>
		</div>
      </section>

      <!-- Main content -->
      <section class="content" style="height:40%">
		<div id="body-content">
			<div class="col-md-12">
				<div class="img"><img src="<?php echo base_url()?>assets/<?php echo $this->session->userdata('foto_macharone');?>" class="item-image"></div>
			</div>
			<div class="col-md-12" style="text-align:center">
				<h4 style="margin:0px"><label><?php echo $this->session->userdata('pn_name_macharone');?></label></h4>
			</div>
			<div class="col-md-12"  style="text-align:center">
				<h5 style="font-size:12px;margin:0px 0px 10px 0px;"><?php echo $this->session->userdata('alamat_macharone');?></h5>
			</div>
		</div>
        <div class="row" style="padding: 10px">
			<div class="col-md-12">
				<?php if($this->session->userdata('jabatan') == 0){?>
					<div class="col-xs-4"><button class="btn btn-danger form-control" id="create">Create</div>
					<div class="col-xs-4"><button class="btn btn-danger form-control" id="user">User</div>
					<div class="col-xs-4"><button class="btn btn-danger form-control" id="timeline">Timeline</div>
				<?php } ?>
				<div class="col-xs-4"><button class="btn btn-danger form-control" id="information">Informasi</div>
				<div class="col-xs-4"><button class="btn btn-danger form-control" id="transaction">History</div>
				<div class="col-xs-4"><button class="btn btn-danger form-control" id="package">Paket</div>
			</div>
        </div>
		<div class="col-md-12" id="onprogres">
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
	<input type="hidden" value="0" id="get_new">
	<div id="modal-success-save" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-body">
			<div id="success-info"></div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
		  </div>
		</div>
	  </div>
	</div>
      <!-- /.content -->
    </div>
	
  <?php $this->load->view('footer-top-macharone');?>
  
  <script>
	document.getElementById('onprogres').innerHTML = '';
	/* $.ajax({
		url: '<?php echo base_url()?>index.php/macharone/information',
		type: "POST",
		data: {},
		success: function(datax) {
			$('#onprogres').append(datax);
		}
	}); */
	
	$('#package').click(function(){
		document.getElementById('onprogres').innerHTML = '';
		$('#get_new').val('0');
		$("#body-content").slideUp();
		$.ajax({
			url: '<?php echo base_url()?>index.php/macharone/paket',
			beforeSend: function( xhr ) {
				$('#onprogres').html('<i class="fa fa-loading"></i>');
			},
			type: "POST",
			data: {},
			success: function(datax) {
				document.getElementById('onprogres').innerHTML = '';
				$('#onprogres').append(datax);
			}
		});
	});
	
	$('#transaction').click(function(){
		document.getElementById('onprogres').innerHTML = '';
		$('#get_new').val('0');
		$("#body-content").slideUp();
		$.ajax({
			url: '<?php echo base_url()?>index.php/macharone/transaksi/5',
			beforeSend: function( xhr ) {
				$('#onprogres').html('<i class="fa fa-loading"></i>');
			},
			type: "POST",
			data: {},
			success: function(datax) {
				document.getElementById('onprogres').innerHTML = '';
				$('#onprogres').append(datax);
			}
		});
	});
	
	$('#information').click(function(){
		document.getElementById('onprogres').innerHTML = '';
		$('#get_new').val('0');
		$("#body-content").slideUp();
		$.ajax({
			url: '<?php echo base_url()?>index.php/macharone/information/4',
			beforeSend: function( xhr ) {
				$('#onprogres').html('<i class="fa fa-loading"></i>');
			},
			type: "POST",
			data: {},
			success: function(datax) {
				document.getElementById('onprogres').innerHTML = '';
				$('#onprogres').append(datax);
			}
		});
	});
	
	$('#pesan').click(function(){
		var urlx = '<?php echo base_url()?>index.php/macharone/mail';
		if('<?php echo $this->session->userdata('jabatan')?>' == '0'){
			urlx = '<?php echo base_url()?>index.php/macharone/list_mail';
		}
		document.getElementById('onprogres').innerHTML = '';
		$('#get_new').val('1');
		$("#body-content").slideUp();
		$.ajax({
			url: urlx,
			beforeSend: function( xhr ) {
				$('#onprogres').html('<i class="fa fa-loading"></i>');
			},
			type: "POST",
			data: {},
			success: function(datax) {
				document.getElementById('onprogres').innerHTML = '';
				$('#onprogres').append(datax);
				if('<?php echo $this->session->userdata('jabatan')?>' != '0'){
					document.getElementById('focus_point').focus();
				}
				
			}
		});
	});
	
	$('#notification').click(function(){
		document.getElementById('onprogres').innerHTML = '';
		$('#get_new').val('0');
		$("#body-content").slideUp();
		$.ajax({
			url: '<?php echo base_url()?>index.php/macharone/notification',
			beforeSend: function( xhr ) {
				$('#onprogres').html('<i class="fa fa-loading"></i>');
			},
			type: "POST",
			data: {},
			success: function(datax) {
				document.getElementById('onprogres').innerHTML = '';
				$('#onprogres').append(datax);
			}
		});
	});
	
	$('#setting').click(function(){
		edit_user();
	});
	
	function edit_user(x = null){
		document.getElementById('onprogres').innerHTML = '';
		$('#get_new').val('0');
		$("#body-content").slideUp();
		$.ajax({
			url: '<?php echo base_url()?>index.php/macharone/setting',
			beforeSend: function( xhr ) {
				$('#onprogres').html('<i class="fa fa-loading"></i>');
			},
			type: "POST",
			data: {pn_id : x},
			success: function(datax) {
				document.getElementById('onprogres').innerHTML = '';
				$('#onprogres').append(datax);
			}
		});
	}
	
	$('#home').click(function(){
		document.getElementById('onprogres').innerHTML = '';
		$('#get_new').val('0');
		$("#body-content").slideDown();
		$.ajax({
			url: '<?php echo base_url()?>index.php/macharone/information',
			beforeSend: function( xhr ) {
				$('#onprogres').html('<i class="fa fa-loading"></i>');
			},
			type: "POST",
			data: {},
			success: function(datax) {
				document.getElementById('onprogres').innerHTML = '';
				$('#onprogres').append(datax);
			}
		});
	});
	
	$('#create').click(function(){
		document.getElementById('onprogres').innerHTML = '';
		$('#get_new').val('0');
		$("#body-content").slideUp();
		$.ajax({
			url: '<?php echo base_url()?>index.php/macharone/create',
			beforeSend: function( xhr ) {
				$('#onprogres').html('<i class="fa fa-loading"></i>');
			},
			type: "POST",
			data: {},
			success: function(datax) {
				document.getElementById('onprogres').innerHTML = '';
				$('#onprogres').append(datax);
			}
		});
	});
	
	$('#user').click(function(){
		document.getElementById('onprogres').innerHTML = '';
		$('#get_new').val('0');
		$("#body-content").slideUp();
		$.ajax({
			url: '<?php echo base_url()?>index.php/macharone/user',
			beforeSend: function( xhr ) {
				$('#onprogres').html('<i class="fa fa-loading"></i>');
			},
			type: "POST",
			data: {},
			success: function(datax) {
				document.getElementById('onprogres').innerHTML = '';
				$('#onprogres').append(datax);
			}
		});
	});
	
	$('#timeline').click(function(){
		document.getElementById('onprogres').innerHTML = '';
		$('#get_new').val('0');
		$("#body-content").slideUp();
		$.ajax({
			url: '<?php echo base_url()?>index.php/macharone/timeline',
			beforeSend: function( xhr ) {
				$('#onprogres').html('<i class="fa fa-loading"></i>');
			},
			type: "POST",
			data: {},
			success: function(datax) {
				document.getElementById('onprogres').innerHTML = '';
				$('#onprogres').append(datax);
			}
		});
	});
	
	load_notif();
	
	window.setInterval(function(){
		load_notif();
	}, 5000);
	
	function load_notif(){
		/* $.ajax({
			url: '<?php echo base_url()?>index.php/macharone/tot_message',
			type: "POST",
			data: {},
			success: function(datax) {
				if(datax > 0){
					document.getElementById('tot_pesan').style.display = '';
				}else{
					document.getElementById('tot_pesan').style.display = 'none';
				}
				document.getElementById('tot_pesan').innerHTML = datax;
			}
		}); */
		
		$.ajax({
			url: '<?php echo base_url()?>index.php/macharone/tot_notif',
			type: "POST",
			data: {},
			success: function(datax) {
				var data = JSON.parse(datax);
				if(data.notif > 0){
					document.getElementById('tot_notif').style.display = '';
				}else{
					document.getElementById('tot_notif').style.display = 'none';
				}
				document.getElementById('tot_notif').innerHTML = data.notif;
				
				if(data.pesan > 0){
					document.getElementById('tot_pesan').style.display = '';
				}else{
					document.getElementById('tot_pesan').style.display = 'none';
				}
				document.getElementById('tot_pesan').innerHTML = data.pesan;
			}
		});
	}
	
	$("#example").DataTable();
  </script>