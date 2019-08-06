			<div class="table-responsive">
			<table class="table">
				<tr>
					<td width="35%">Nama</td>
					<td>
					<input type="text" class="form-control" onkeyup="return cari_user()" id="user_name" value="">
					<input type="hidden" class="form-control" id="user_id" value="">
					</td>
				</tr>
				<tr>
					<td width="35%">Alamat</td>
					<td><input type="text" class="form-control" id="alamat" value=""></td>
				</tr>
				<tr>
					<td width="35%">Nomor Hp</td>
					<td><input type="text" class="form-control"  id="no_hp" value=""></td>
				</tr>
				<tr>
					<td width="35%">Nama Paket</td>
					<td>
						<select class="form-control" id="nama_paket" onchange="return pilih_paket()">
							<option value="0" id="paket_0" data-name="0" data-name-paket="" data-lama="0"></option>
							<?php if($onprogres > 0){foreach($onprogres as $row){?>
							<option id="paket_<?php echo $row->id;?>" data-name-paket="<?php echo $row->nama_paket?>" data-lama="<?php echo $row->lama_hari?>" value="<?php echo $row->id?>" data-name="<?php echo $row->harga?>">
							<?php echo $row->nama_paket;?>
							</option>
							<?php } }?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="35%">Berat</td>
					<td><input type="text" class="form-control" onkeyup="return pilih_paket()"  id="berat" value=""></td>
				</tr>
				<tr>
					<td width="35%">Tanggal Kirim</td>
					<td><input type="text" class="form-control"  onchange="return selesai()" id="terima" value=""></td>
				</tr>
				<tr>
					<td width="35%">Selesai</td>
					<td><input type="text" class="form-control"  id="selesai" value=""></td>
				</tr>
				<tr>
					<td width="35%">Harga Perkilo</td>
					<td><input type="text" class="form-control"  id="harga_perkilo" value=""></td>
				</tr>
				<tr>
					<td width="35%">Total Bayar</td>
					<td><input type="text" class="form-control"  id="harga" value=""></td>
				</tr>
				<tr>
					<td width="35%">Bayar</td>
					<td><input type="text" class="form-control"  id="bayar" value=""></td>
				</tr>
				<tr>
					<td width="35%">Catatan</td>
					<td><textarea class="form-control"  id="catatan" value=""></textarea></td>
				</tr>
				<tr>
					<td colspan="2">
						<button class='pull-right btn btn-danger' onClick="return save();">Simpan</button>
					</td>
				</tr>
			</table>
			</div>
			<div class="col-md-12">
			
			</div>
			<div id="modal-user" class="modal fade" tabindex="-1" role="dialog">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-body">
					<table class="table">
						<tr>
							<td>Nama</td>
							<td><input type="text" class="form-control" id="new_user"></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><input type="text" class="form-control" id="new_alamat"></td>
						</tr>
						<tr>
							<td>Nomor Hp</td>
							<td><input type="text" class="form-control" id="new_hp"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" class="form-control" id="email"></td>
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
			</div>
			<script>
				function check(){
					if($("#pn_name").val() == ''){
						alert('dsda');
						document.getElementById("pn_name").focus();
						return false;
					}else if($("#alamat").val() == ''){
						alert('dsda');
						document.getElementById("alamat").focus();
						return false;
					}
				}
				
				function cari_user(){
					$.ajax({
						url: '<?php echo base_url()?>index.php/laundry/search_user',
						type: "POST",
						data: {pn_name:$('#user_name').val()},
						success: function(datax) {
							var datax = JSON.parse(datax);

								var list_name = new Array();
								$.each(datax.data, function(i, item){
									var pn_id = item.pn_id;
									var pn_name = item.pn_name;
									var alamat = item.alamat;
									if(alamat != null){
										alamat = (item.alamat).substring(0,20);
									}
									
									var temp_name = pn_id+' - '+pn_name+' - '+alamat;
									list_name.push(temp_name);
								});
								$("#user_name").autocomplete({
									source: list_name,
									select: function( event , ui ) {
										if(ui.item.label == 'Tidak ditemukan, klik untuk menambah user'){
											$('#modal-user').modal();
										}else{
											var str = (ui.item.label).split(' -');
											var index = str[0];
											var user_id = datax.user_list[index]['pn_id'];
											var user_name = datax.user_list[index]['pn_name'];
											var alamat = datax.user_list[index]['alamat'];
											var no_hp = datax.user_list[index]['no_hp'];
											$('#user_id').val(user_id);
											$('#user_name').val(str[1]);
											$('#no_hp').val(no_hp);
											$('#alamat').val(alamat);
										}
									},
									response: function(event, ui) {
										if (!(ui.content.length)) {
												var noResult = { value:"",label:"Tidak ditemukan, klik untuk menambah user" };
												ui.content.push(noResult);
										}
									}
								});
						}
					});
				}
				
				
				function pilih_paket(){
					
					var id = $('#nama_paket').val();
					var harga = $('option#paket_'+id).attr('data-name');
					
					var berat = $('#berat').val();
					
					var bayar = harga * berat;

					$('#harga_perkilo').val(harga);
					$('#harga').val(bayar);
					
				};
				
				function selesai(){
					
					var terima = $('#terima').val();
					var id = $('#nama_paket').val();
					var hari = $('option#paket_'+id).attr('data-lama');
					
					$.ajax({
						url: '<?php echo base_url()?>index.php/laundry/estimasi',
						type: "POST",
						data: {terima : terima, hari : hari},
						success: function(datax) {
							$('#selesai').val(datax);
						}
					});
				};
				
				function save(){
					var sts = 'belum lunas';
					if($('#bayar').val() >= $('#harga').val()){
						var sts = 'lunas';
					}
					
					var id = $('#nama_paket').val();
					$.ajax({
						url: '<?php echo base_url()?>index.php/laundry/save_transaksi',
						type: "POST",
						data: {
							user_id : $('#user_id').val(), 
							user_name : $('#user_name').val(), 
							terima : $('#terima').val(), 
							selesai : $('#selesai').val(),
							harga : $('#harga').val(), 
							bayar: $('#bayar').val(),
							nama_paket : $('option#paket_'+id).attr('data-name-paket'), 
							berat: $('#berat').val(), 
							harga_perkilo:$('#harga_perkilo').val(), 
							id_paket : $('#nama_paket').val(), 
							alamat : $('#alamat').val(), 
							status_bayar : sts, 
							status_reading : 0, 
							status : 'onprogres', 
							catatan :$('#catatan').val() },
						success: function(datax) {
							alert('Berhasil disimpan');
							$('#get_new').val('0');
							$("#body-content").slideUp();
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
				};
				
				$('#selesai').datepicker({ dateFormat: 'dd-mm-yy' });
				$('#terima').datepicker({ dateFormat: 'dd-mm-yy' });
				
				$('#simpan_user').click(function(){
					$.ajax({
						url: '<?php echo base_url()?>index.php/laundry/save_user',
						type: "POST",
						data: {pn_name : $('#new_user').val(), alamat : $('#new_alamat').val(), pn_jabatan : '1',  no_hp : $('#new_hp').val(), pn_jabatan : '1',  pn_akses : '1',  email : $('#email').val(),   sts_marketing : 'N', insert_date :"<?php echo date("Y-m-d")?>", pn_wilayah : '1', },
						success: function(datax) {
							alert('ID User anda : '+datax);
							$('#user_id').val(datax);
							$('#user_name').val($('#new_user').val());
							$('#alamat').val($('#new_alamat').val());
							$('#no_hp').val($('#new_hp').val());
							$('#modal-user').modal('toggle');
						}
					});
				});
			</script>