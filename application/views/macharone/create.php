			<style>
				td {
					text-align : left;
				}
			</style>
			<div class="">
			<table class="table">
				<tr>
					<td width="35%">Harga (Rp)</td>
					<td>
					<select class="form-control" id="harga">
						<option value="5000">5.000</option>
						<option value="6000">6.000</option>
					</select>
					<input type="hidden" class="form-control" id="transaksi" value="">
					</td>
				</tr>
			</table>
			<table class="table">
				<tr>
					<td width="35%">Jenis</td>
					<td>
						<select class="form-control" id="nama_paket">
							<?php if($paket > 0){foreach($paket as $row){?>
							<option value="<?php echo $row->nama_paket?>">
							<?php echo $row->nama_paket;?>
							</option>
							<?php } }?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="35%">Bumbu</td>
					<td>
						<?php if($bumbu > 0){
							$i=1;
							foreach($bumbu as $row){?>
							<input type="checkbox" id="bumbu_<?php echo $i?>" name="bumbu[]" value="<?php echo $row->nama_bumbu?>">
							
						<?php echo $row->nama_bumbu;?>
						<br>
						<?php $i++;} }?>
					</td>
				</tr>
				<tr>
					<td width="35%">Jumlah</td>
					<td><input type="text" class="form-control"  id="jumlah" value="1"></td>
				</tr>
				
			</table>
			<table class="table">
				<tr>
					<td colspan="2" id="saveEx">
						<button class='btn btn-danger' onClick="return simpan_pesanan();">Simpan</button>
						<button class='pull-right btn btn-success' onClick="return daftar();">Daftar</button>
					</td>
				</tr>
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
			<script>
				function simpan_pesanan(){
					if($('#harga').val() == ''){
						alert('harga tidak boleh kosong');
						return false;
					}else if($('#jumlah').val() == ''){
						alert('jumlah tidak boleh kosong');
						return false;
					}
					var bumbuList = new Array();
					for ( var i = 1; i <= '<?php echo count($bumbu)?>'; i++ ){
							if ($('#bumbu_'+i).prop("checked")) {
								bumbuList.push($('#bumbu_'+i).val());
							}
							
					}
					$.ajax({
						url: '<?php echo base_url()?>index.php/macharone/save_transaksi',
						type: "POST",
						beforeSend: function( xhr ) {
							$('#saveEx').html('<button class="btn btn-danger"><img src="<?php echo base_url(); ?>/assets/spinner.gif" alt="Wait" style="height:15px;width:15px;opacity: 0.8;"/> Simpan</button><button class="pull-right btn btn-success">Daftar</button>');
						},
						data: {
							harga : $('#harga').val(),
							total : $('#jumlah').val(),
							transaksi : $('#transaksi').val(),
							jenis : $('#nama_paket').val(),
							bumbu : bumbuList,
						},
						success: function(datax) {
							$('#nama_paket').val('Makaroni Basah');
							$('#harga').val(5000);
							$('#jumlah').val(1);
							if($('#transaksi').val() == ""){
								$('#transaksi').val(datax);
							}
							document.getElementById("harga").focus();
							for ( var i = 1; i <= '<?php echo count($bumbu)?>'; i++ ){
								document.getElementById("bumbu_"+i).checked = false;									
							}
							$('#saveEx').html('<button class="btn btn-danger" onClick="return simpan_pesanan();">Simpan</button><button class="pull-right btn btn-success" onClick="return daftar();">Daftar</button>');
							alert('Berhasil disimpan');
						}
					});
				}
				
				function daftar(){
					if($('#transaksi').val() == ""){
						alert('belum ada pesanan');
						return false;
					}
					$('#modal-daftar').modal();
					document.getElementById('list_menu').innerHTML = "";
					$.ajax({
						url: '<?php echo base_url()?>index.php/macharone/load_transaksi',
						type: "POST",
						beforeSend: function( xhr ) {
							document.getElementById('list_menu').innerHTML = '<td colspan="5" style="text-align:center;"><img src="<?php echo base_url(); ?>/assets/spinner.gif" alt="Wait" style="height:35px;width:35px;opacity: 0.8;"/> loading . . .</td>';
						},
						data: {
							id : $('#transaksi').val(),
						},
						success: function(datax) {
							document.getElementById('list_menu').innerHTML = "";
							var data_s = JSON.parse(datax);
							$.each(data_s, function(i, item){
								$('#list_menu').append('<tr>'+
									'<td>'+((i*1)+1)+'</td>'+
									'<td>'+item.jenis+'</td>'+
									'<td>'+item.bumbu+'</td>'+
									'<td>'+item.total+'</td>'+
									'<td>'+item.total_bayar+'</td>'+
									'<td id="hapus_'+item.id+'"><button class="btn btn-danger" onclick="return hapus('+item.id+')">Hapus</button></td>'+
								'</tr>');
							});
						},
						error: function (xhr, ajaxOptions, thrownError) {
							document.getElementById('list_menu').innerHTML = "";
							alert(thrownError);
						}
					});
				}
				
				function hapus(x){
					$.ajax({
						url: '<?php echo base_url()?>index.php/macharone/hapus_transaksi',
						type: "POST",
						beforeSend: function( xhr ) {
							document.getElementById('list_menu').innerHTML = '<td colspan="5" style="text-align:center;"><img src="<?php echo base_url(); ?>/assets/spinner.gif" alt="Wait" style="height:35px;width:35px;opacity: 0.8;"/> loading . . .</td>';
						},
						data: {
							id : x
						},
						success: function(datax) {
							daftar();
						},
						error: function (xhr, ajaxOptions, thrownError) {
							document.getElementById('list_menu').innerHTML = "";
							daftar();
							alert(thrownError);
						}
					});
				}
				
				function print_menu(){
					var id = $('#transaksi').val();
					window.location.replace('<?php echo base_url(); ?>index.php/macharone/print_struk/'+id);
				}
			</script>