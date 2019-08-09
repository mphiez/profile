				<style>
					well{
						padding : 5px;
						margin : 3px,0px,3px,0px;
					}
					
					hr{
						margin : 0px;
					}
					
					.col-md-12{
						width : 100%;
					}
				</style>
				<div class="container" style="background-color: #dd4b39;font-weight: 700;font-size: 15px;color: white;">
					<table width="100%">
						<tr>
							<td width="20%"><img style="border-radius: 50%;padding: 8px;" src="<?php echo base_url()?>assets/<?php echo $onprogres[0]->foto?>" height="50px" width="50px"> </td>
							<td><?php echo $onprogres[0]->pn_name?></td>
						</tr>
					</table>
				</div>
				<div class="column table-responsive" id="history" style="height:250px">
				<?php if($onprogres > 0){foreach($onprogres as $row){
					if($row->replay == '1'){
						$rep = 'style="background-color:lightblue;padding:10px;border-radius:10px;margin:0px"';
						$ali = 'style="text-align:left;font-size:11px" class="pull-left col-md-12"';
						$ali2 = 'style="text-align:left"';
					}else{
						$rep = 'style="background-color:lightgreen;padding:10px;border-radius:10px;margin:0px"';
						$ali = 'style="text-align:right;font-size:11px" class="pull-right col-md-12"';
						$ali2 = 'style="text-align:right"';
					}
					?>
					
					<div class="row well" style="margin:0px;padding:3px;background-color:white;border:0px;">
						<div class="col-md-12">
						
							<div class="form-group" <?php echo $rep;?>>
							<label <?php echo $ali;?>><?php echo $row->datetime?></label>
							<div class="col-sm-12" <?php echo $ali2;?>>
								<h4 style="font-size:14px"><?php echo $row->pesan?></h4>
							</div>
							</div>
						</div>
					</div>
					<?php 
					if($this->session->userdata('jabatan') == 0){
						echo '<input type="hidden" id="pn_id" value="'.$row->user_id.'">';
					}else{
						echo '<input type="hidden" id="pn_id" value="">';
					}
					?>
				<?php } } ?>
				<div id="new_message_self"></div>
				<input type="text" height="1px" id="focus_point">
				</div>
				<div class="col-md-12">
					<textarea id="message_content" class="form-control"></textarea>
				</div>
				<div class="col-md-12">
					<button class="btn btn-danger pull-right" id="send_message" style="margin-top:10px">Send</button>
				</div>
				
				<script>
				$('#send_message').click(function(){
				$.ajax({
					url: '<?php echo base_url()?>index.php/macharone/send_message',
					type: "POST",
					data: {pesan : $('#message_content').val(), pn_id : $('#pn_id').val()},
					success: function(datax) {
						$('#message_content').val('');
						var data_s = JSON.parse(datax);
							if(data_s.replay == '1'){
								$('#new_message_self').append('<div class="well" style="margin:0px;padding:3px;background-color:white;border:0px">'+
									'<div class="col-md-12">'+
									'<div class="form-group" style="background-color:lightblue;padding:10px;border-radius:10px;margin:0px">'+
									'<label class="pull-left" style="font-size:11px">'+data_s.datetime+'</label><br>'+
									'<div class="col-sm-11" style="text-align:left">'+
									'<h4 style="font-size:14px">'+data_s.pesan+'</h4>'+
									'</div>'+
									'</div>'+
									'</div>'+
								'</div>');
							}else{
								$('#new_message_self').append('<div class="well" style="margin:0px;padding:3px;background-color:white;border:0px">'+
									'<div class="col-md-12">'+
									'<div class="form-group" style="background-color:lightgreen;padding:10px;border-radius:10px;margin:0px">'+
									'<label class="pull-right">'+data_s.datetime+'</label><br>'+
									'<div class="col-sm-11" style="text-align:right">'+
									'<h4>'+data_s.pesan+'</h4>'+
									'</div>'+
									'</div>'+
									'</div>'+
								'</div>');
							}
							
						document.getElementById('focus_point').style.display='block';
						document.getElementById('focus_point').focus();
						document.getElementById('focus_point').style.display='none';
					}
				});
			});
			document.getElementById('focus_point').focus();
			document.getElementById('focus_point').style.display='none';
			window.setInterval(function(){
				if($('#get_new').val() == '1'){
				$.ajax({
						url: '<?php echo base_url()?>index.php/macharone/new_mail',
						type: "POST",
						data: {pn_id : $('#pn_id').val()},
						success: function(datax) {
							var data_s = JSON.parse(datax);
							var data_s = data_s.onprogres;
							
							if(data_s != 0){
								data_s = data_s[0];
								if('<?php echo $this->session->userdata('jabatan')?>' != 0 && data_s.replay == 0){
									$('#new_message_self').append('<div class="well" style="background-color:lightgreen">'+
									'<div class="row">'+
									'<div class="form-group">'+
										'<label class="pull-left col-md-12">'+data_s.datetime+'</label><br>'+
										'<div class="col-sm-11" style="text-align:left">'+
										'<h4>'+data_s.pesan+'</h4>'+
										'</div>'+
										'</div>'+
										'</div>'+
									'</div>');
								}else{
									$('#new_message_self').append('<div class="well" style="background-color:lightblue">'+
									'<div class="row">'+
									'<div class="form-group">'+
										'<label class="pull-right col-md-12" style="text-align:right">'+data_s.datetime+'</label><br>'+
										'<div class="col-sm-11" style="text-align:right">'+
										'<h4>'+data_s.pesan+'</h4>'+
										'</div>'+
										'</div>'+
										'</div>'+
									'</div>');
								}
								document.getElementById('focus_point').style.display='block';
								document.getElementById('focus_point').focus();
								document.getElementById('focus_point').style.display='none';
							}
							
						}
					});
				}
			}, 5000);
		  </script>