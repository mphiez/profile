			<div >
				<?php if($onprogres > 0){?>
				<label>New Message</label>
				<table class="table table-strips table-hover" id="example">
					<thead>
					<tr>
						<th>Tanggal</th>
						<th>Nama</th>
						<th>Pesan</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($onprogres as $row){?>
						<tr>
							<td><a href="#/" onclick="return edit_user('<?php echo $row->user_id;?>')"><b><?php echo $row->datetime?></a></td>
							<td><?php echo $row->pn_name?></td>
							<td><?php echo $row->pesan?></td>
						</tr>
						
					
					<?php } ?>
					</tbody>
				</table>
				<?php } ?>
				
				<?php if($all > 0){?>
				<table class="table table-strips table-hover" id="example2">
					<thead>
					<tr>
						<th>Tanggal</th>
						<th>Nama</th>
						<th>Pesan</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($all as $row){?>
						<tr>
							<td><a href="#/" onclick="return edit_user('<?php echo $row->user_id;?>')"><b><?php echo $row->datetime?></a></td>
							<td><?php echo $row->pn_name?></td>
							<td><?php echo $row->pesan?></td>
						</tr>
						
					
					<?php } ?>
					</tbody>
				</table>
				<?php } ?>
			</div>
			<script>
				$("#example").DataTable();
				$("#example2").DataTable();
				function edit_user(x = null){
					document.getElementById('onprogres').innerHTML = '';
					$("#body-content").slideUp();
					$.ajax({
						url: '<?php echo base_url()?>index.php/laundry/mail',
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