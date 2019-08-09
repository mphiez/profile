			<table class="table" style="border:solid 1px black;width:100%">
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
					<td style="background-color:lightgray" colspan="2"><?php echo date("d M Y");?></td>
				</tr>
				<tr>
					<td width="50%">Paket</td>
					<td width="50%"><?php echo $row->nama_paket;?> </td>
				</tr>
				<tr>
					<td>Berat</td>
					<td><?php echo $row->berat;?> Kg </td>
				</tr>
				<tr>
					<td>Total</td>
					<td>Rp. <?php echo number_format($row->harga);?> </td>
				</tr>
				<tr>
					<td>Tanggal Selesai</td>
					<td><?php echo date('d M Y', strtotime($row->selesai))?> </td>
				</tr>
				<tr>
					<td>Status</td>
					<td><button class="btn <?php echo $selesai;?>"><?php echo $row->status;?></button> </td>
				</tr>
				<tr>
					<td>Status Pembayaran</td>
					<td><button class="btn <?php echo $lunas;?>"><?php echo $row->status_bayar;?></button> </td>
				</tr>
				<?php } } ?>
			</table>