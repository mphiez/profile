			<table class="table" style="bordersolid 1px black;width100%">
				<tr>
					<td colspan="2">Transaksi Berjalan</td>
				</tr>
				<?php if($onprogres > 0){foreach($onprogres as $row){
				$lunas = 'btn-success';
				$selesai = 'btn-success';
				if($row->status != 'selesai'){
					$selesai = 'btn-danger';
				}
				if($row->status_bayar != 'lunas'){
					$lunas = 'btn-danger';
				}	
				?>
				<tr>
					<td style="background-color:lightgray" colspan="2"><?php echo date("d M Y",strtotime($row->selesai));?></td>
				</tr>
				<?php if($this->session->userdata('jabatan') == 0){?>
				<tr>
					<td width="50%">Nama Pelanggan</td>
					<td width="50%"> <?php echo $row->user_name;?> </td>
				</tr>
				<?php }?>
				<tr>
					<td width="50%">Paket</td>
					<td width="50%"> <?php echo $row->nama_paket;?> </td>
				</tr>
				<tr>
					<td>Berat</td>
					<td> <?php echo $row->berat;?> Kg </td>
				</tr>
				<tr>
					<td>Total</td>
					<td> Rp. <?php echo number_format($row->harga);?> </td>
				</tr>
				<tr>
					<td>Transaksi</td>
					<td> <?php echo date('d M Y', strtotime($row->terima))?> </td>
				</tr>
				<?php if($this->session->userdata('jabatan') == 0){?>
				<tr>
					<td>Status</td>
					<td><button class="btn <?php echo $selesai;?>" onclick="return status_selesai('<?php echo $row->id;?>')"><?php echo $row->status;?></button> </td>
				</tr>
				<tr>
					<td>Status Pembayaran</td>
					<td><button class="btn <?php echo $lunas;?>" onclick="return status_selesai('<?php echo $row->id;?>')"><?php echo $row->status_bayar;?></button> </td>
				</tr>
				<?php }else{ ?>
				<tr>
					<td>Status</td>
					<td><button class="btn <?php echo $selesai;?>"><?php echo $row->status;?></button> </td>
				</tr>
				<tr>
					<td>Status Pembayaran</td>
					<td><button class="btn <?php echo $lunas;?>"><?php echo $row->status_bayar;?></button> </td>
				</tr>
				
				<?php } } } ?>
			</table>
			<div id="modal-user" class="modal fade" tabindex="-1" role="dialog">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-body">
					<table class="table">
						<tr>
							<td>Bayar</td>
							<td><input type="text" class="form-control" id="bayar"><input type="hidden" class="form-control" id="id"></td>
						</tr>
						<tr>
							<td>Status Pembayaran</td>
							<td>
							<select id="status_bayar" class="form-control">
								<option value='belumlunas'>Belum Lunas</option>
								<option value='lunas'>Lunas</option>
							</select>
							</td>
						</tr>
						<tr>
							<td>Status Progres</td>
							<td>
							<select id="status" class="form-control">
								<option value='onprogres'>onprogres</option>
								<option value='selesai'>selesai</option>
								<option value='diterima'>diterima</option>
							</select>
							</td>
						</tr>
						<tr>
							<td>Diterima Oleh</td>
							<td>
							<input type="text" class="form-control" id="diterima_oleh">
							</td>
						</tr>
						<tr>
							<td>Diterima Tanggal</td>
							<td>
							<input type="text" class="form-control" id="tanggal_diterima">
							</td>
						</tr>
					</table>
					</div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<button type="button" class="btn btn-danger" id="simpan_user">Simpan</button>
				  </div>
				</div>
			 </div>
			<script>
				function status_selesai(x){
					$('#id').val(x);
					$('#bayar').val('');
					$('#status_bayar').val('');
					$('#status').val('');
					$('#tanggal_diterima').val('');
					$('#diterima_oleh').val('');
					$('#modal-user').modal();
				}
				
				$('#tanggal_diterima').datepicker({ dateFormat: 'dd-mm-yy' });
				
				$('#simpan_user').click(function(){
					$.ajax({
						url: '<?php echo base_url()?>index.php/laundry/update_transaksi',
						type: "POST",
						data: {
							tanggal_diterima : $('#tanggal_diterima').val(), 
							bayar : $('#bayar').val(), 
							status : $('#status').val(), 
							status_bayar : $('#status_bayar').val(),
							diterima_oleh : $('#diterima_oleh').val(),
							id : $('#id').val()
						},
						success: function(datax) {
							alert('Berhasil disimpan');
							$('#modal-user').modal('toggle');
							document.getElementById('onprogres').innerHTML = '';
							$.ajax({
								url: '<?php echo base_url()?>index.php/laundry/onprogres',
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
						}
					});
				});
			</script>