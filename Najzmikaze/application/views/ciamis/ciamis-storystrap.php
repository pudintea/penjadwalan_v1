<!DOCTYPE html>
<html lang="id">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Humas dan IT</title>
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
		<meta name="generator" content="Humas dan IT" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- CSS -->
		<link href="<?=base_url('assets');?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=base_url('assets');?>/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?=base_url('assets');?>/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<link href="<?=base_url('assets');?>/css/styles.css" rel="stylesheet">
		
		<!-- Java Script -->
		<script src="<?=base_url('assets');?>/js/jquery_2.0.2.min.js"></script>
		<script src="<?=base_url('assets');?>/js/bootstrap.min.js"></script>
		<script src="<?=base_url('assets');?>/datatables/jquery.dataTables.js"></script>
		<script src="<?=base_url('assets');?>/datatables/dataTables.bootstrap4.js"></script>
	</head>
	<body>
		<header class="navbar navbar-bright navbar-fixed-top" role="banner">
		  <div class="container">
			<div class="navbar-header">
			  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			</div>
			<nav class="collapse navbar-collapse" role="navigation">
				<ul class="nav navbar-nav">
					<li><a class="<?php echo isset($dashboard) 	? $dashboard 	: ''; ?>" 	href="<?=base_url('Dashboard');?>">Dashboard</a></li>
					<li><a class="<?php echo isset($ipaddress) 	? $ipaddress	: ''; ?>" 	href="<?=base_url('IpAddress');?>">Ip Address</a></li>
					<li><a class="<?php echo isset($profil)  ? $profil          : ''; ?>"   href="<?=base_url('Profil');?>">Profil</a></li>
					<?php if ($this->session->userdata('level') == 'Admin'){ ?>
					<li><a class="<?php echo isset($user) 	? $user 			: ''; ?>" 	href="<?=base_url('User');?>">User</a></li>
					<li><a class="<?php echo isset($network) 	? $network		: ''; ?>" 	href="<?=base_url('Network');?>">Network</a></li>
					<?php } ?>
				</ul>
			  <ul class="nav navbar-right navbar-nav">
				<li><a  href="<?=base_url('Login/logout');?>" onclick ="if( ! confirm('Apakah anda yakin akan Keluar..??')) return false">Logout</a></li>
			  </ul>
			</nav>
		  </div>
		</header>

		<div id="masthead">  
		  <div class="container">
			<div class="row">
			  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h3>APLIKASI IP ADDRESS
				</h3>
			  </div>
			</div> 
		  </div><!-- /cont -->
		  
		  <div class="container">
			<div class="row">
			  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="top-spacer">
					<!-- Ada -->
				</div>
			  </div>
			</div> 
		  </div><!-- /cont -->
		</div>


		<div class="container">
			<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="panel panel-dafault">
					<div class="panel-body">
				  <!--/stories-->
						<div class="pdn-panel-naikdikit">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<!-- CONTENT -->
								<?php echo $contents; ?>
								<!-- End CONTENT -->
							</div>
						</div>
						</div>
					</div>
				</div>
			</div><!--/col-12-->
			</div>
		</div>

		   <div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<h4><b>Design By Team Humas dan IT</b></h4>
						<p><i class="fa fa-coffee" aria-hidden="true">&nbsp;</i> Diciptakan dengan sepenuh hati, Untuk para pecinta kopi</p>
						<p><i class="fa fa-database" aria-hidden="true">&nbsp;</i> Waktu Prosess Server <strong>{elapsed_time}</strong> seconds</p>
						<p><i class="fa fa-apple" aria-hidden="true">&nbsp;</i> Versi Aplikasi Ip Address 1.3</p>
						<p><i class="fa fa-hdd-o" aria-hidden="true">&nbsp;</i> Versi System <?=CI_VERSION;?></p>
						<br/>
						<br/>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					
					</div>
				</div>
			</div>
		   </div>
	</body>
</html>