<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JURNAL - Acountan Managment System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url()?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>font-awesome-4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="<?=base_url()?>font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="shortcut icon" href="<?=base_url()?>/assets/icon.ico" type="image/x-icon" /> 
  <link rel="stylesheet" href="<?=base_url()?>dist/ionicons.min.css">
  <!-- data tables -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=base_url()?>plugins/datatables/jquery.dataTables.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/chosen/chosen.css">
  <link rel="stylesheet" href="<?=base_url()?>plugins/chosen/chosen.min.css">
  <link rel="stylesheet" href="<?=base_url()?>plugins/jQueryUI/jquery-ui.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>DMS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$this->session->userdata('pn_name')?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
			  <li class="dropdown tasks-menu">
				<div class="top-menu-icon" id="home" style="padding: 5px 10px 1px 20px !important;">
				<p>
					<i class="fa fa-home top-icon"></i>
				</p>
			</div>
			  </li>
			  <li class="dropdown tasks-menu">
				<div class="top-menu-icon" id="setting">
					&nbsp;&nbsp;&nbsp;
					<p>
						<i class="fa fa-gear top-icon"></i>
					</p>
				</div>
			  </li>
			  <li class="dropdown tasks-menu">
				<div class="top-menu-icon pull-right" id="" style="padding:5px 20px 1px 10px">
					&nbsp;&nbsp;&nbsp;
					<p><a href="<?php echo base_url()?>index.php/login/logout_laundry">
						<img src="<?php echo base_url()?>assets/off.png" width="20px" height="20px">
					</a></p>
				</div>
			  </li>
			  <li class="dropdown tasks-menu">
				<div class="top-menu-icon pull-right" id="pesan">
					&nbsp;&nbsp;&nbsp;
					<p>
						<i class="fa fa-envelope-o top-icon"></i>
						<span class="label label-warning" id="tot_pesan"></span>
					</p>
				</div>
			  </li>
			  <li class="dropdown tasks-menu">
				<div class="top-menu-icon pull-right" id="notification">
					&nbsp;&nbsp;&nbsp;
					<p>
						<i class="fa fa-bell-o top-icon"></i>
						<span class="label label-warning" id="tot_notif"></span>
					</p>
				</div>
			  </li>
              <li class="user-header">
                <img src="<?=base_url()?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->userdata('pn_name')?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url()?>index.php/login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('pn_name')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
		<?php 
		$active = $this->uri->segment(1);
		$sub_ac		= $this->uri->segment(2);
		$pn_jabatan = $this->session->userdata('pn_jabatan');
		echo $pn_akses = $this->session->userdata('pn_akses');
		if($pn_akses == '1'){
			echo tampil_menu($pn_jabatan,$active,$sub_ac);
		}
		?>
		 <!-- menu here --> 
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->