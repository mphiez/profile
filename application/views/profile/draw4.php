<div class="row well">
					<div class="col-lg-12">
						<div class="col-sm-2 col-md-4">
			  <!-- DIRECT CHAT SUCCESS -->
						  <div class="box box-success direct-chat direct-chat-success">
							<!-- /.box-header -->
							<div class="box-body box-body-md-draw">
							  <!-- Conversations are loaded here -->
								<img class="item-image" onclick="return view('simpang_empat/1')" src="<?php echo base_url();?>assets/simpang_empat/1.jpg">
							  <!-- /.direct-chat-pane -->
							</div>
							<!-- /.box-footer box-footer-md-->
						  </div>
						  <!--/.direct-chat -->
						</div>
						<div class="col-sm-2 col-md-4">
			  <!-- DIRECT CHAT SUCCESS -->
						  <div class="box box-success direct-chat direct-chat-success">
							
							<!-- /.box-header -->
							<div class="box-body box-body-md-draw">
							  <!-- Conversations are loaded here -->
								<img class="item-image" onclick="return view('simpang_empat/2')" src="<?php echo base_url();?>assets/simpang_empat/2.jpg">
							  <!-- /.direct-chat-pane -->
							</div>
							<!-- /.box-footer box-footer-md-->
						  </div>
						  <!--/.direct-chat -->
						</div>
						<div class="col-sm-2 col-md-4">
			  <!-- DIRECT CHAT SUCCESS -->
						  <div class="box box-success direct-chat direct-chat-success">
							
							<!-- /.box-header -->
							<div class="box-body box-body-md-draw">
							  <!-- Conversations are loaded here -->
								<img class="item-image" onclick="return view('simpang_empat/3')" src="<?php echo base_url();?>assets/simpang_empat/3.jpg">
							  <!-- /.direct-chat-pane -->
							</div>
							<!-- /.box-footer box-footer-md-->
						  </div>
						  <!--/.direct-chat -->
						</div>
						<div class="col-sm-2 col-md-4">
			  <!-- DIRECT CHAT SUCCESS -->
						  <div class="box box-success direct-chat direct-chat-success">
							
							<!-- /.box-header -->
							<div class="box-body box-body-md-draw">
							  <!-- Conversations are loaded here -->
								<img class="item-image" onclick="return view('simpang_empat/4')" src="<?php echo base_url();?>assets/simpang_empat/4.jpg">
							  <!-- /.direct-chat-pane -->
							</div>
							<!-- /.box-footer box-footer-md-->
						  </div>
						  <!--/.direct-chat -->
						</div>
						<div class="col-sm-2 col-md-4">
			  <!-- DIRECT CHAT SUCCESS -->
						  <div class="box box-success direct-chat direct-chat-success">
							
							<!-- /.box-header -->
							<div class="box-body box-body-md-draw">
							  <!-- Conversations are loaded here -->
								<img class="item-image" onclick="return view('simpang_empat/5')" src="<?php echo base_url();?>assets/simpang_empat/1.jpg">
							  <!-- /.direct-chat-pane -->
							</div>
							<!-- /.box-footer box-footer-md-->
						  </div>
						  <!--/.direct-chat -->
						</div>
					</div>
				</div>
				<script>
		var img_src = document.getElementsByClassName('item-image');
		for(i=0; i< img_src.length; i++){
			//console.log('width : '+img_src[i].clientWidth+'- height : '+img_src[i].clientHeight+' ww');
			if(img_src[i].naturalWidth > img_src[i].naturalHeight){
				img_src[i].style="width:100%";
				console.log(' ww');
			}else{
				img_src[i].style="height:100%";
				console.log(' hh');
			}
		}
	</script>