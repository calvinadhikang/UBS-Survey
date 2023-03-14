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
	<link href="assets/css/nucleo-icons.css" rel="stylesheet" />
	<link href="assets/css/nucleo-svg.css" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<link href="assets/css/nucleo-svg.css" rel="stylesheet" />
	<!-- CSS Files -->
	<link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="min-height-300 bg-primary position-absolute w-100"></div>
	<aside
		class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
		id="sidenav-main">
		<div class="sidenav-header">
			<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
				aria-hidden="true" id="iconSidenav"></i>
			<a class="navbar-brand m-4" target="_blank">
				<img src="assets/img/LogoUbs.png" class="navbar-brand-img h-100" width="350px" height="400px"
					alt="main_logo">
				<br><br>
				<div style="border: 2px solid #004882; background-color: #004882; border-radius: 7px;">
					<h5 style="color: white;">Ivander Wijaya</h5>
					<h7 class="text-justify" style="color: white; margin-left:42px;">Admin</h7>
				</div>
			</a>
		</div>
		<br>
		<br>
		<br>
		<hr class="horizontal dark mt-0">
		<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link active" href="<?= base_url('dashboard') ?>">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="<?= base_url('department') ?>">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Master Department</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="<?= base_url('user') ?>">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="ni ni-credit-card text-success text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Master User</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="<?= base_url('pertanyaan') ?>">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="ni ni-app text-info text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Master Pertanyaan</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="<?= base_url('session') ?>">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Master Session</span>
					</a>
				</li>
				<br><br><br><br>
				<li class="nav-item">
					<a class="nav-link " href="<?= base_url() ?>">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Logout</span>
					</a>
				</li>
			</ul>
		</div>
	</aside>
