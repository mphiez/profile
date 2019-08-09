			<table class="table" style="bordersolid 1px black;width100%">
				<?php if($onprogres > 0){foreach($onprogres as $row){?>
				<tr>
					<td style="background-color:lightgray" colspan="2"><?php echo $row->nama_paket;?></td>
				</tr>
				<tr>
					<td width="50%">Harga</td>
					<td width="50%"> <?php echo number_format($row->harga);?> </td>
				</tr>
				<tr>
					<td>Lama Proses</td>
					<td> <?php echo $row->lama_hari;?> </td>
				</tr>
				<tr>
					<td>Keuntungan</td>
					<td> <?php echo '-'.str_replace(',','<br> - ',$row->keuntungan);?> </td>
				</tr>
				<?php } } ?>
			</table>