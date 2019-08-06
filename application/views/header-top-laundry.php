<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>nice laundry</title>
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
  <style>
	.box-body-md{
		height:200px;
	}
	
	.box-body-lg{
		height:250px;
	}
	
	.box-footer-md{
		height:100px;
	}
	
	.box-footer2{
		height:100px;
	}
	.skin-blue .main-header .navbar {
		background-color: #00a65a;
	}
	.dropdown-menu > li{
		background-color: #86f586;
	}
	.dropdown-menu > li > a:hover{
		background-color: #41c941;
	}
	.dropdown-menu{
		border-color: #86f586;
		width: 950px;
		-webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
		box-shadow: 2px 5px 8px 5px rgba(0,0,0,.35);
	}
	.dropdown-menu > li > a {
		color: #2D2A2A;
		padding : 7px 10px 7px 10px;
	}
	.skin-blue .main-header .navbar .dropdown-menu li a {
		color: #2D2A2A;
	}
	
	.modalxx {
		position: fixed;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 1050;
		display: none;
		overflow: hidden;
		-webkit-overflow-scrolling: touch;
		outline: 0;
		background-color: #bff0bb;
		opacity: 0.5;
	}
	
	.dropdown-span{
		padding: 20px;
		font-family: open sans,tahoma,sans-serif;
		cursor: pointer;
		list-style-position: outside;
		color: rgba(0, 0, 0, 0.7);
		list-style-image: none;
		font-size: 15px;
	}
	
	.category-header{
		background-color: #f39934;
		padding: 10px;
		margin: 10px;
		border-top: 3px green solid;
		border-radius: 3px;
		-webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
		box-shadow: 0px 1px 3px 0px rgba(0,0,0,.35);
	}
	
	.item-small{
		margin: 8px 0px 8px 0px;
	}
	
	.dropdown-span:hover{
		color:orange;
	}
	
	.list-group-unbordered > .list-group-item {
		border-left: 0;
		border-right: 0;
		border-radius: 0;
		padding-left: 5px;
		padding-right: 5px;
	}
	
	.main-header {
		position: fixed;
		max-height: 100px;
		z-index: 1030;
		width: 100%;
	}
	
	.item-image{
		margin-left: auto;
		margin-right: auto;
		display: block;
	}
  </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body>