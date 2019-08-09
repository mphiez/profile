			<style>
				.img{
					max-width:220px;
					max-height:220px;
					border-radius : 50%;
					border : 2px lightgray solid;
					overflow: hidden;
					margin: auto;
				}	
			</style>
			<form method='post' action="<?=base_url().'index.php/macharone/save_user';?>" enctype="multipart/form-data">
			<table class="table">
				
				<?php if($onprogres > 0){foreach($onprogres as $row){?>
					<tr>
						<td >User Name</td>
						<td ><input type="text" class="form-control" name="pn_uname" id="pn_name" value=""></td>
					</tr>
					<tr>
						<td >Nama</td>
						<td ><input type="text" class="form-control" name="pn_name" id="pn_name" value=""></td>
					</tr>
					<tr>
						<td >Password</td>
						<td ><input type="text" class="form-control" name="pn_name" id="pn_name" value=""></td>
					</tr>
					<tr>
						<td >Re-password</td>
						<td ><input type="text" class="form-control" name="pn_name" id="pn_name" value=""></td>
					</tr>
					<tr>
						<td >Foto</td>
						<td><input type="file" name="filefoto" id="filefoto" class="form-control"></td>
					</tr>
					<tr>
						<td >Alamat</td>
						<td ><input type="text" class="form-control" name="alamat" id="alamat" value=""></td>
					</tr>
					<tr>
						<td >No Hp</td>
						<td ><input type="text" class="form-control" name="no_hp" id="alamat" value=""></td>
					</tr>
					<tr>
						<td >Email</td>
						<td ><input type="text" class="form-control" name="email" id="alamat" value=""></td>
					</tr>
					<tr>
						<td>
							<input type="hidden" name="pn_id" value="<?php echo $row->pn_id;?>">
							<input type="submit" name="submit" value="Simpan" class='pull-right btn btn-danger' onClick="return check();">
						</td>
					</tr>
				
				<?php } } ?>
			</table>
			</form>
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
			</script>