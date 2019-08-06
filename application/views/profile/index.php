<?php $this->load->view('header-top-profile');?>
<style>
	.box-footer-md {
		height: 70px !important;
	}
	.box-body-md {
		height: 120px;
	}
	.box-body-md-draw {
		height: 180px;
	}
	.item-image{
		cursor:pointer;
	}
	.box-footer{
		text-align:center;
	}
	.col-lg-12{
		margin : 0px 0px 0px 0px !important;
		padding : 0px 0px 0px 0px !important;
	}
	
	.btn-space{
		margin : 0px 0px 10px 0px;
	}
</style>
<div class="content-wrapper">
    <div class="container nav-tabs-custom">
      <section class="content-header">
        <h1>
          Top Navigation
          <small>Example 2.0</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive" src="<?php echo base_url();?>assets/budiana-profile.jpeg" style="width:100%" alt="User profile picture">

              <h3 class="profile-username text-center">Budiana S.Kom</h3>

              <p class="text-muted text-center">Web Developer</p>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
			<ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Visitors</b> <a class="pull-right">132</a>
                </li>
                <li class="list-group-item">
                  <b>User Join</b> <a class="pull-right">27</a>
                </li>
                <li class="list-group-item">
                  <b>Project Request</b> <a class="pull-right">10</a>
                </li>
            </ul>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
              <p class="text-muted">
                Computer Engineering - Indonesia Computer University
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Bandung, Jawa barat</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Ajax</span>
                <span class="label label-warning">Codeigniter</span>
                <span class="label label-danger">Zend Frameworks</span>
                <span class="label label-success">Bootstrap</span>
                <span class="label label-warning">Mysql</span>
                <span class="label label-primary">HTML</span>
                <span class="label label-danger">jQuery</span>
                <span class="label label-info">Oracle</span>
                <span class="label label-success">Adobe Photoshop</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Have fun your visit. <br>please send your comment, critic, job and others in visitors activity.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Visitors Activity</a></li>
              <li><a href="#education" data-toggle="tab">Formal Education</a></li>
              <li><a href="#experience" data-toggle="tab">Experience</a></li>
              <li><a href="#skills" data-toggle="tab">Skills</a></li>
              <li><a href="#galery" data-toggle="tab">Galery</a></li>
              <li><a href="#draw-galery" data-toggle="tab">Drawing Galery</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url()?>assets/budiana-profile.jpeg" alt="user image">
                        <span class="username">
                          <a href="#">Budiana</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM 19 April 2018</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Hello, welcome to my profile page.
                  </p>

                  <div class="fb-like" data-href="http://forest-code.com/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
				  <br>
				  <br>
				  <div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Comment Here</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					  <div class="box-body">
						<div class="form-group">
						  <div class="col-sm-12">
							<textarea id="message" class="form-control"></textarea>
						  </div>
						</div>
						<div class="form-group">
						  <div class="col-sm-12">
							<div class="checkbox">
							  <label>
								<input type="checkbox" id="private"> Private Message
							  </label>
							  <button class="btn btn-primary pull-right" onclick="return send('','')">Kirim</button>
							</div>
						  </div>
						</div>
					  </div>
					  <!-- /.box-body -->
					  <div class="box-footer" id="last_comment">
					  <?php if($data_message > 0){
						  foreach($data_message as $row){
							  if($row->user_id == '1002'){
								  
									$img = base_url().'assets/budiana-profile.jpeg';
									
								}else{
								
									$img = base_url().'assets/img_webcam.png';
								
								}
						  ?>
						<div class="user-block" style="text-align:left">
							<img class="img-circle img-bordered-sm" src="<?php echo $img;?>" alt="user image">
								<span class="username">
								  <a href="#"><?php echo $row->user_name?></a>
								  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
								</span>
							<span class="description">Shared publicly - <?php echo date('d M Y H:i:s',strtotime($row->datetime))?></span>
						</div>
					  <!-- /.user-block -->
					  <p style="text-align:left">
						<?php echo $row->message;?>
					  </p>
					  <?php }}?>
					  </div>
					  <!-- /.box-footer -->
				  </div>
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="education">
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="experience">
                
              </div>
			  <div class="tab-pane" id="skills">
				
              </div>
			  <div class="tab-pane well" id="galery">
				
              </div>
			  <div class="tab-pane" id="draw-galery">
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
	<div id="modal-success-save" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-body">
			<div id="success-info"></div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
		  </div>
		</div>
	  </div>
	</div>
  </div>
	<div id="modal-success-comment" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-body">
			<div id="success-info-comment"></div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
		  </div>
		</div>
	  </div>
	</div>
  </div>
  <?php $this->load->view('footer-top-profile');?>
  <script>
	function view(x){
		document.getElementById('success-info').innerHTML = '';
		$('#modal-success-save').modal();
		document.getElementById('success-info').innerHTML = '<img width="100%" src="<?php echo base_url();?>assets/'+x+'.jpg">';
	}
	
	function send(parent=null, to=null){
		var private_ = 0;
		if(document.getElementById('private').checked == true){
			var private_ = 1;
		}
		
		if($('#message').val() == ''){
			document.getElementById('success-info-comment').innerHTML = '';
			$('#modal-success-comment').modal();
			$('#success-info-comment').append('Please Write Your Comment First !');
			return false;
		}
		$.ajax({
			url: '<?php echo base_url()?>index.php/profile/save',
			type: "POST",
			data: {
				message : $('#message').val(), private : private_, parent : parent, to : to
			},
			success: function(datax) {
				document.getElementById('success-info-comment').innerHTML = '';
				$('#modal-success-comment').modal();
				$('#success-info-comment').append('Your message is in our review, to be published');
				var data_s = JSON.parse(datax);
				if(data_s.view != '1'){
					if(data_s.user_id == '1002'){
						var img = '<?php echo base_url()?>assets/budiana-profile.jpeg';
					}else{
						var img = '<?php echo base_url()?>assets/img_webcam.png';
						
					}
					$('#last_comment').prepend('<div class="user-block" style="text-align:left">'+
							'<img class="img-circle img-bordered-sm" src="'+img+'" alt="user image">'+
								'<span class="username">'+
								  '<a href="#">'+data_s.user_name+'</a>'+
								  '<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>'+
								'</span>'+
							'<span class="description">Shared publicly - '+data_s.datetime+'</span>'+
						'</div>'+
					  <!-- /.user-block -->
					  '<p style="text-align:left">'+
						''+data_s.message+''+
					  '</p>');
				}
			}
		});
	};
	
	$.ajax({
		url: '<?php echo base_url()?>index.php/profile/education',
		type: "POST",
		data: {},
		success: function(datax) {
			$('#education').append(datax);
		}
	});
	
	$.ajax({
		url: '<?php echo base_url()?>index.php/profile/experience',
		type: "POST",
		data: {},
		success: function(datax) {
			$('#experience').append(datax);
		}
	});
	
	$.ajax({
		url: '<?php echo base_url()?>index.php/profile/skills',
		type: "POST",
		data: {},
		success: function(datax) {
			$('#skills').append(datax);
		}
	});
	
	$.ajax({
		url: '<?php echo base_url()?>index.php/profile/galery',
		type: "POST",
		data: {},
		success: function(datax) {
			$('#galery').append(datax);
		}
	});
	
	$.ajax({
		url: '<?php echo base_url()?>index.php/profile/draw1',
		type: "POST",
		data: {},
		success: function(datax) {
			$('#draw-galery').append(datax);
		}
	});
	
	$.ajax({
		url: '<?php echo base_url()?>index.php/profile/draw2',
		type: "POST",
		data: {},
		success: function(datax) {
			$('#draw-galery').append(datax);
		}
	});
	
	$.ajax({
		url: '<?php echo base_url()?>index.php/profile/draw3',
		type: "POST",
		data: {},
		success: function(datax) {
			$('#draw-galery').append(datax);
		}
	});
	
	$.ajax({
		url: '<?php echo base_url()?>index.php/profile/draw4',
		type: "POST",
		data: {},
		success: function(datax) {
			$('#draw-galery').append(datax);
		}
	});
	
	$.ajax({
		url: '<?php echo base_url()?>index.php/profile/draw5',
		type: "POST",
		data: {},
		success: function(datax) {
			$('#draw-galery').append(datax);
		}
	});
	
  </script>
	  <div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>