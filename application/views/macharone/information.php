			<style>
				td {
					text-align : left;
				}
			</style>
			<div class="">
			<table class="table">
				<?php if(count($onprogres) > 0){ foreach($onprogres as $row){?>
				<tr>
					<td width="35%" class="btn btn-danger form-control" style="background-color:#f7b3b3;border-radius:5px;/*! border:red 1px solid; */padding:5px 5px;margin-bottom:5px;text-align:left">
						<span style="color:black"><i class="fa fa-calendar mini-icon mini-icon-red"></i> <?php echo $row->create_dtm?></span>
						<span style="color:white;margin: 0px 5px;" class="pull-right"><i class="fa fa-list mini-icon mini-icon-green"></i> <?php echo number_format($row->jumlah_item)?></span>
						<span style="color:white;margin: 0px 3px;"  class="pull-right"><i class="fa fa-money mini-icon mini-icon-blue"></i> <?php echo number_format($row->total_tagihan)?></span></td>
				</tr>
				<?php }}?>
			</table>
			</div>
			<div class="col-md-12">
			
			</div>
			<div id="modal-daftar" class="modal fade" tabindex="-1" role="dialog" style="background-color:white;">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-footer">
					<table class="table">
						<tr>
							<td>No</td>
							<td>Jenis</td>
							<td>Bumbu</td>
							<td>Qty</td>
							<td>Total</td>
							<td>Action</td>
						</tr>
						<tbody id="list_menu">
							
						</tbody>
					</table>
				  </div>
				  <div class="modal-footer" id="mnu_print">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
					<button type="button" class="btn btn-danger" id="simpan_user" onclick="return print_menu()">Selesai</a>
				  </div>
				</div>
			 </div>
			</div>