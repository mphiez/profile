<?php $this->load->view('header-top-laundry');?>
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
	
</style>
<style>
	td {
		text-align : left;
	}
</style>
<div class="content">
    <div class="container nav-tabs-custom">

      <!-- Main content -->
      <section class="content" style="height:40%">
		<div class="col-md-12" id="onprogres">
		<div id="modal-print" class="modal fade" tabindex="-1" role="dialog" style="background-color:white;">
			  <div class="modal-dialog modal-lg" style="margin:0px;width: 300px;" role="document">
				<div class="modal-footer" style="padding-top:0px;padding-bottom:0px;text-align:left">
					<h1 style="margin-top;0px;margin-bottom:0px;">
					  <img src="<?php echo base_url()?>/assets/logo_macharone.png" width="35px" height="30px"><b>Macharone</b>
					</h1>
					<h5 style="margin-top;0px;margin-bottom:0px;">
						Jl. Cingised No.31, Cisaranten Endah, Kec. Arcamanik, Kota Bandung, Jawa Barat 40293 Tlpn : 0822-1945-0379
					</h5>
				</div>
				<div class="modal-footer">
					<table class="table">
						<tr>
							<td>No</td>
							<td>Jenis</td>
							<td>Bumbu</td>
							<td>Harga</td>
							<td>Qty</td>
							<td>Total</td>
						</tr>
						<tbody id="list_menu2">
							
						</tbody>
					</table>
				  </div>
				</div>
			 </div>
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
	
  <?php $this->load->view('footer-top-laundry');?>
  
  <script>
  $('#modal-print').modal();
		document.getElementById('list_menu2').innerHTML = "";
		$.ajax({
			url: '<?php echo base_url()?>index.php/macharone/load_transaksi',
			type: "POST",
			beforeSend: function( xhr ) {
				document.getElementById('list_menu2').innerHTML = '<td colspan="5" style="text-align:center;"><img src="<?php echo base_url(); ?>/assets/spinner.gif" alt="Wait" style="height:35px;width:35px;opacity: 0.8;"/> loading . . .</td>';
			},
			data: {
				id : '<?php echo $id_transaksi?>',
			},
			success: function(datax) {
				document.getElementById('list_menu2').innerHTML = "";
				var data_s = JSON.parse(datax);
				$.each(data_s, function(i, item){
					$('#list_menu2').append('<tr>'+
						'<td>'+((i*1)+1)+'</td>'+
						'<td>'+item.jenis+'</td>'+
						'<td>'+item.bumbu+'</td>'+
						'<td>'+item.harga+'</td>'+
						'<td>'+item.total+'</td>'+
						'<td>'+item.total_bayar+'</td>'+
					'</tr>');
				});
				window.print();
				setTimeout(function(){
					//window.location.replace('<?php echo base_url(); ?>index.php/macharone/');
				}, 5000);
			},
			error: function (xhr, ajaxOptions, thrownError) {
				document.getElementById('list_menu2').innerHTML = "";
				alert(thrownError);
			}
		});
  </script>