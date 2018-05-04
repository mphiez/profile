<?php $this->load->view('header');?>
    <section class="content-header">
      <h1>
       <?=$judul?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$judul?></li>
      </ol>
    </section>
	<section class="content-header">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			<div class="box-body">
			 <a href="<?=base_url()?>index.php/master/add_customer" class="btn btn-warning btn-sm">Tambah Customer <i class="fa fa-plus"></i>
			  </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-hover dataTable example1">
				<thead>
					<tr>
					  <th width="5%">ID</th>
					  <th>Perusahaan</th>
					  <th>Nama Pemesan</th>
					  <th>Alamat</center></th>
					  <th>Kota</th>
					  <th>Telpon</th>
					  <th>sales</th>
					  <th>Alamat</th>
					  <th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i=0;
						if($list_customer > 0){
							foreach($list_customer as $row){
							$i++;
							
					?>
					<tr>
					  <td><?=$row->id?></td>
					  <td><?=$row->nama_perusahaan?></td>
					  <td><?=$row->nama_pemesan?></td>
					  <td><?=$row->alamat?></td>
					  <td><?=$row->kota?></td>
					  <td><?=$row->tlp?></td>
					  <td><?=$row->sales?></td>
					  <td><?=$row->alamat?></td>
					  <td>
					  <div class="btn-group">
						<a href="<?=base_url()?>index.php/master/edit_customer/<?=$row->id?>" class='btn btn-info btn-sm'>Edit</a>
					  </div>
					  </td>
					</tr>
					<?php
							}
						}
					?>

				</tbody>
              </table>
			  <div id="show_supp"></div>
            </div>
        </div>
        </div>
    </div>
	</section>
<?php $this->load->view('footer');?>
<!-- DataTables -->
<script src="<?=base_url()?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script>
  $(function () {
    $(".example1").DataTable();
  });
  function info(id){
	$.get( "<?= base_url(); ?>index.php/master/detail_supplier" , { option : id } , function ( data ) {
		$( '#show_supp' ) . html ( data ) ;
		$('#myModal').modal('show');
	} ) ;
  }
  function edit(id){
	$.get( "<?= base_url(); ?>index.php/master/edit_supplier" , { option : id } , function ( data ) {
		$( '#show_supp' ) . html ( data ) ;
		$('#myModal').modal('show');
	} ) ;
  }
  function add_cus(){
	$.get( "<?= base_url(); ?>index.php/master/add_customer" , { option :"" } , function ( data ) {
		$( '#show_supp' ) . html ( data ) ;
		$('#myModal').modal('show');
	} ) ;
  }
</script>