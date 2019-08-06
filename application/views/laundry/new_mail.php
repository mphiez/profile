			<div class="table-responsive">
			<table class="table">
				<tr>
					<td width="35%">Nama</td>
					<td>
						<select name="id_user">
							<?php 
							foreach($user as $row){
							?>
							
							<option value="<?php echo $row->pn_id?>"><?php echo $row->pn_name?></option>
							
							<?php }?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="35%">Pesan</td>
					<td><textarea class="form-control" id="pesan" value=""></td>
				</tr>
				<tr>
					<td colspan="2">
						<button class='pull-right btn btn-danger' onClick="return save();">Simpan</button>
					</td>
				</tr>
			</table>
			</div>
			<script>
				
			</script>