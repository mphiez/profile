			<div class="col-md-12">
				<button id="tambah" class="btn btn-danger">Tambah Customer</button>
			</div>
			<div >
				<table class="table table-strips table-hover" id="example">
					<thead>
					<tr>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Hutang</th>
					</tr>
					</thead>
					<tbody>
					<?php if($onprogres > 0){foreach($onprogres as $row){?>
						<tr>
							<td><a href="#/" onclick="return edit_user('<?php echo $row->pn_id;?>')"><b><?php echo $row->pn_name?></a></td>
							<td><?php echo $row->alamat?></td>
							<td><?php echo $row->hutang?></td>
						</tr>
						
					
					<?php } } ?>
					</tbody>
				</table>
			</div>
			<script>
				$("#example").DataTable();
				function edit_user(x = null){
					document.getElementById('onprogres').innerHTML = '';
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
			</script>