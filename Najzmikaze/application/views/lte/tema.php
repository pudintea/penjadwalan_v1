<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TI | Jadwal dan Agenda Keuangan</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?=base_url('assets');?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url('assets');?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="<?=base_url('assets');?>/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url('assets');?>/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?=base_url('assets');?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url('assets');?>/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?=base_url('assets');?>/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<script src="<?=base_url('assets');?>/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?=base_url('assets');?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?=base_url('assets');?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url('assets');?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	</head>
	
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<a href="<?=base_url();?>" class="logo">
					<span class="logo-mini"><b>A</b>LT</span>
					<span class="logo-lg"><b>Jadwal</b>Agenda</span>
				</a>
				<nav class="navbar navbar-static-top">
					<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>

					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown messages-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-envelope-o"></i>
									<span class="label label-success">4</span>
								</a>
								<ul class="dropdown-menu">
									<li class="header">You have 4 messages</li>
									<li>
										<ul class="menu">
											<li><!-- start message -->
												<a href="#">
													<div class="pull-left">
														<img src="<?=base_url('assets/img/logo-hitam-100px.png');?>" class="img-circle" alt="User Image" width="160px">
													</div>
													<h4>
														Support Team
														<small><i class="fa fa-clock-o"></i> 5 mins</small>
													</h4>
													<p>Why not buy a new awesome theme?</p>
												</a>
											</li>
										  <!-- end message -->
											<li>
												<a href="#">
													<div class="pull-left">
														<img src="<?=base_url('assets/img/logo-hitam-100px.png');?>" class="img-circle" alt="User Image" width="128px">
													</div>
													<h4>
														AdminLTE Design Team
														<small><i class="fa fa-clock-o"></i> 2 hours</small>
													</h4>
													<p>Why not buy a new awesome theme?</p>
												</a>
											</li>
											<li>
												<a href="#">
													<div class="pull-left">
														<img src="<?=base_url('assets/img/logo-hitam-100px.png');?>" class="img-circle" alt="User Image" width="128px">
													</div>
													<h4>
														Developers
														<small><i class="fa fa-clock-o"></i> Today</small>
													</h4>
													<p>Why not buy a new awesome theme?</p>
												</a>
											</li>
											<li>
												<a href="#">
													<div class="pull-left">
														<img src="<?=base_url('assets/img/logo-hitam-100px.png');?>" class="img-circle" alt="User Image" width="128px">
													</div>
													<h4>
														Sales Department
														<small><i class="fa fa-clock-o"></i> Yesterday</small>
													</h4>
													<p>Why not buy a new awesome theme?</p>
												</a>
											</li>
											<li>
												<a href="#">
													<div class="pull-left">
														<img src="<?=base_url('assets/img/logo-hitam-100px.png');?>" class="img-circle" alt="User Image" width="128px">
													</div>
													<h4>
														Reviewers
														<small><i class="fa fa-clock-o"></i> 2 days</small>
													</h4>
													<p>Why not buy a new awesome theme?</p>
												</a>
											</li>
										</ul>
									</li>
									<li class="footer"><a href="#">See All Messages</a></li>
								</ul>
							</li>
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								  <img src="<?=base_url('assets/img/logo-hitam-100px.png');?>" class="user-image" alt="User Image">
								  <span class="hidden-xs">Admin Jadwal / Agenda</span>
								</a>
								<ul class="dropdown-menu">
									<li class="user-header">
										<img src="<?=base_url('assets/img/logo-hitam-100px.png');?>" class="img-circle" alt="User Image" width="160px">
										<p>
											Sub Bagian TI - Web Developer
											<small>Member since Okt. 2018</small>
										</p>
									</li>
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
									</li>
									<li class="user-footer">
										<div class="pull-left">
											<a href="#" class="btn btn-default btn-flat">Profile</a>
										</div>
										<div class="pull-right">
											<a href="<?=base_url('login/logout');?>" class="btn btn-default btn-flat">Sign out</a>
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
				<section class="sidebar">
					<!-- Sidebar user panel -->
						<div class="user-panel">
							<div class="pull-left image">
								<img src="<?=base_url('assets/img/logo-putih-100px.png');?>" class="img-circle" alt="User Image" width="160px">
							</div>
							<div class="pull-left info">
								<p>Admin Jadwal / Agenda</p>
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
				  <!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu" data-widget="tree">
						<li class="<?php echo isset($dashboard) 	? $dashboard 	: ''; ?>" style="background-color: #656786;" ><a href="<?=base_url('welcome/jadwal');?>" target="_blank"><i class="fa fa-area-chart"></i> <span>Halaman Jadwal</span></a></li>

						<li class="header">MAIN NAVIGATION</li>
						<li class="<?php echo isset($dashboard) 	? $dashboard 	: ''; ?>" ><a href="<?=base_url('Dashboard');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
						<li class="<?php echo isset($lihatjadwal) 	? $lihatjadwal	: ''; ?>" ><a href="<?=base_url('welcome');?>"><i class="fa fa-file-text"></i> <span>Lihat Jadwal</span></a></li>
						<li class="<?php echo isset($tambahjadwal) 	? $tambahjadwal : ''; ?>" ><a href="<?=base_url('welcome/add');?>"><i class="fa fa-pencil-square"></i> <span>Tambah Jadwal</span></a></li>
						<li class="<?php echo isset($member) 	? $member 	: ''; ?>" ><a href="<?=base_url('Member');?>"><i class="fa fa-user"></i> <span>Lihat Member</span></a></li>
						<li class="header">PENGATURAN</li>
						<li class="<?php echo isset($membertambah) ? $membertambah	: ''; ?>" ><a href="<?=base_url('Member/add');?>"><i class="fa fa-user-plus text-red"></i> <span>Tambah Member</span></a></li>
						<li class="<?php echo isset($cetakjadwal) ? $cetakjadwal	: ''; ?>"><a href="<?=base_url('welcome/front_print');?>"><i class="fa fa-print text-yellow"></i> <span>Cetak Jadwal</span></a></li>
						<li><a href="<?=base_url('login/logout');?>" onclick = "if( ! confirm('Apakah anda yakin akan keluar??')) return false"><i class="fa fa-circle-o text-aqua"></i> <span>Logout</span></a></li>
					</ul>
				</section>
			</aside>

			<div class="content-wrapper">
				<!-- DISINI CONTENT -->
					<?php echo $contents; ?>
				<!-- END CONTENT -->
			</div>
		  
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 1.2
				</div>
				<strong>Copyright &copy; 2018 - <?=date('Y');?> <a href="http://www.al-azhar.or.id">Sub Bagian Teknologi Informasi</a>.</strong> All rights reserved.
			</footer>
			<div class="control-sidebar-bg"></div>
		</div>
	<script src="<?=base_url('assets');?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
	<script src="<?=base_url('assets');?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url('assets');?>/bower_components/fastclick/lib/fastclick.js"></script>
	<script src="<?=base_url('assets');?>/dist/js/adminlte.min.js"></script>
	<script src="<?=base_url('assets');?>/dist/js/demo.js"></script>
	</body>
</html>
