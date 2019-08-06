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
<link rel="stylesheet" href="<?php echo base_url()?>/plugins/treegrid/dist/css/jquery.treegrid.css" type="text/css" />
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
      <section class="content" style="height:100%">
        <div class="col-md-12">
		<div class="well">
			<h4>Recent Activity</h4>
		</div>
          <div class="nav-tabs-custom">
            
            <div class="tab-content">
				<table class="table table-strips table-hover table-grid">
					<tr>
						<th>parent</th>
						<th>Tanggal</th>
						<th>Message</th>
						<th>View</th>
						<th>Private</th>
						<th>User</th>
						<th style="display:<?php if(!$this->session->userdata('pn_id') == '1002'){echo 'none';}?>">Action</th>
					</tr>
					<?php 
					$j = 0;
					if($data_message > 0){
						foreach($data_message as $row){
							$j++;
							?>
					<tr class="treegrid-<?php echo $j?>">
						<td><?php echo $row->parent?></td>
						<td><?php echo $row->datetime?></td>
						<td><?php echo $row->message?></td>
						<td><?php echo $row->view?></td>
						<td><?php echo $row->private?></td>
						<td><?php echo $row->user_id?></td>
						<td style="display:<?php if(!$this->session->userdata('pn_id') == '1002'){echo 'none';}?>"><?php if($this->session->userdata('pn_id') == '1002'){?><button class="btn btn-primary" id="show">Show</button><?php } ?></td>
					</tr>
					<?php } }?>
				</table>
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
	
	$('#send').click(function(){
		
	});
	
	$.ajax({
		url: '<?php echo base_url()?>index.php/profile/change',
		type: "POST",
		data: {},
		success: function(datax) {
			$('#education').append(datax);
		}
	});
</script>