<div class="row">
					<div class="col-lg-12">
						<div class="col-sm-2 col-md-4">
			  <!-- DIRECT CHAT SUCCESS -->
						  <div class="box box-success direct-chat direct-chat-success">
							<!-- /.box-header -->
							<div class="box-body box-body-md">
							  <!-- Conversations are loaded here -->
								<img class="item-image" onclick="return view('budiana-web-developer-queue-system')" src="<?php echo base_url();?>assets/budiana-web-developer-queue-system.jpg">
							  <!-- /.direct-chat-pane -->
							</div>
							<!-- /.box-body box-body-md -->
							<div class="box-footer box-footer-md">
								<p class="text-muted" style="text-align:center">Queue System and Management.
								
							</div>
							<!-- /.box-footer box-footer-md-->
						  </div>
						  <!--/.direct-chat -->
						</div>
						<div class="col-sm-2 col-md-4">
			  <!-- DIRECT CHAT SUCCESS -->
						  <div class="box box-success direct-chat direct-chat-success">
							
							<!-- /.box-header -->
							<div class="box-body box-body-md">
							  <!-- Conversations are loaded here -->
								<img class="item-image" onclick="return view('budiana-web-developer-rensys')" src="<?php echo base_url();?>assets/budiana-web-developer-rensys.jpg">
							  <!-- /.direct-chat-pane -->
							</div>
							<!-- /.box-body box-body-md -->
							<div class="box-footer box-footer-md box-footer box-footer-md-md">
							  <p class="text-muted" style="text-align:center"> Rental Management System</p>
								
							</div>
							<!-- /.box-footer box-footer-md-->
						  </div>
						  <!--/.direct-chat -->
						</div>
						<div class="col-sm-2 col-md-4">
			  <!-- DIRECT CHAT SUCCESS -->
						  <div class="box box-success direct-chat direct-chat-success">
							
							<!-- /.box-header -->
							<div class="box-body box-body-md">
							  <!-- Conversations are loaded here -->
								<img class="item-image" onclick="return view('budiana-web-developer-driver-management-system')" src="<?php echo base_url();?>assets/budiana-web-developer-driver-management-system.jpg">
							  <!-- /.direct-chat-pane -->
							</div>
							<!-- /.box-body box-body-md -->
							<div class="box-footer box-footer-md">
							  <p class="text-muted" style="text-align:center">Driver Management System </p>
								
							</div>
							<!-- /.box-footer box-footer-md-->
						  </div>
						  <!--/.direct-chat -->
						</div>
						<div class="col-sm-2 col-md-4">
			  <!-- DIRECT CHAT SUCCESS -->
						  <div class="box box-success direct-chat direct-chat-success">
							
							<!-- /.box-header -->
							<div class="box-body box-body-md">
							  <!-- Conversations are loaded here -->
								<img class="item-image" onclick="return view('budiana-web-developer-decoration-management')" src="<?php echo base_url();?>assets/budiana-web-developer-decoration-management.jpg">
							  <!-- /.direct-chat-pane -->
							</div>
							<!-- /.box-body box-body-md -->
							<div class="box-footer box-footer-md">
							  <p class="text-muted" style="text-align:center">Decoration Management System </p>
								
							</div>
							<!-- /.box-footer box-footer-md-->
						  </div>
						  <!--/.direct-chat -->
						</div>
						<div class="col-sm-2 col-md-4">
			  <!-- DIRECT CHAT SUCCESS -->
						  <div class="box box-success direct-chat direct-chat-success">
							
							<!-- /.box-header -->
							<div class="box-body box-body-md">
							  <!-- Conversations are loaded here -->
								<img class="item-image" onclick="return view('budiana-web-developer-simrs')" src="<?php echo base_url();?>assets/budiana-web-developer-simrs.jpg">
							  <!-- /.direct-chat-pane -->
							</div>
							<!-- /.box-body box-body-md -->
							<div class="box-footer box-footer-md">
							  <p class="text-muted" style="text-align:center"> Hospitaly Management System</p>
								
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