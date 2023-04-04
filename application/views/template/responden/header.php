<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<!-- Nucleo Icons -->
	<link href="<?=base_url('assets/css/nucleo-icons.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/nucleo-svg.css')?>" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<link href="<?=base_url('assets/css/nucleo-svg.css')?>" rel="stylesheet" />
	<!-- CSS Files -->
	<link id="pagestyle" href="<?=base_url('assets/css/argon-dashboard.css?v=2.0.4')?>" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/punyaadmin.css')?>">
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
	
	<!-- UNTUK ALERT -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
	<!-- END OF UNTUK ALERT -->
	
	<!-- DataTables -->
	<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<!-- END OF DataTables -->
</head>
<?php
	$user = $this->session->login;
	$survey = $this->session->survey;
?>
<body>

	<nav class="sb-topnav navbar">
		<!-- Navbar Brand-->
		<a class="navbar-brand ps-3" href="<?= base_url('dashboard') ?>" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Untung Bersama Sejahtera</a>
		<!-- Sidebar Toggle-->
		<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
				class="fas fa-bars"></i></button>
		<!-- Navbar Search-->
		<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
			<div class="input-group">
				<h3 class="text-white">Welcome, Admin</h3>
			</div>
		</form>
	</nav>

	<!-- SIDEBAR -->
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-white" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<a class="navbar-brand my-4 mx-3" target="_blank">
							<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
								aria-hidden="true" id="iconSidenav"></i>
							<!-- <img src="<?= base_url("assets/img/logoubsnew.png") ?>" class="navbar-brand-img h-100" width="150px"
								height="200px" alt="main_logo" style="border-radius:7px;">
							<br><br> -->
							<div
								style="border: 2px solid #004882; background-color: #004882; border-radius: 7px; text-align:center;">
								<h5 style="color: white;"><?= $user->NAMA ?></h5>
								<h7 style="color: white;"><?= $user->DIVISI ?></h7>
							</div>
							<li class="nav-item">
								<a class="nav-link active" href="<?= base_url('responden') ?>">
									<div
										class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
										<i class="fas fa-table text-primary text-sm opacity-10"></i>
									</div>
									<span class="nav-link-text ms-1">Dashboard</span>
								</a>
							</li>
							<?php
							foreach ($survey as $key => $value) { ?>
								<li class="nav-item">
									<a class="nav-link active" href="<?= base_url('survey?quiz='.$value->ID_PROFILE) ?>">
										<div
											class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
											<i class="fas fa-times text-primary text-sm opacity-10"></i>
										</div>
										<span class="nav-link-text ms-1"><?= $value->NAMA ?></span>
									</a>
								</li>
							<?php } ?>
							<br><br><br><br> 
							<li class="nav-item">
								<a class="nav-link " href="<?= base_url() ?>">
									<div
										class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
										<i class="fa fa-sign-out text-danger text-sm opacity-10"></i>
									</div>
									<span class="nav-link-text ms-1">Logout</span>
								</a>
							</li>
						</a>
					</div>
				</div>
			</nav>
		</div>

		<div>
		<?php
		$this->load->view('alert');
		?>
    	</div>
