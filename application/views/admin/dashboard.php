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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/punyaadmin.css">
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
</head>
<body>
	<!-- SIDEBAR -->
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-white" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<a class="navbar-brand m-5" target="_blank">
							<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
							<img src="assets/img/LogoUbs.png" class="navbar-brand-img h-100" width="150px" height="200px" alt="main_logo">
							<br><br>
							<div style="border: 2px solid #004882; background-color: #004882; border-radius: 7px; text-align:center;" >
								<h5 style="color: white;">Ivander Wijaya</h5>
								<h7 style="color: white;">Admin</h7>
							</div>
							<li class="nav-item">
								<a class="nav-link active" href="<?= base_url('dashboard') ?>">
									<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
									</div>
									<span class="nav-link-text ms-1">Dashboard</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="<?= base_url('department') ?>">
									<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
									</div>
									<span class="nav-link-text ms-1">Master Department</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="<?= base_url('user') ?>">
									<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-credit-card text-success text-sm opacity-10"></i>
									</div>
									<span class="nav-link-text ms-1">Master User</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="<?= base_url('pertanyaan') ?>">
									<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-app text-info text-sm opacity-10"></i>
									</div>
									<span class="nav-link-text ms-1">Master Pertanyaan</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link "  href="<?= base_url('sesi') ?>">
									<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
									<i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
									</div>
									<span class="nav-link-text ms-1">Master Session</span>
								</a>
							</li>
								<br><br><br><br>
							<li class="nav-item">
								<a class="nav-link " href="<?= base_url() ?>">
									<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
										<i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
									</div>
									<span class="nav-link-text ms-1">Logout</span>
								</a>
							</li>
						</a>
					</div>
				</div>
			</nav>
		</div>

		<!-- UNTUK ISI WINDOW KANAN -->
		<div id="layoutSidenav_content">
			<main class="main-content position-relative border-radius-lg ">
				<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
					<div class="container-fluid py-1 px-3">
						<nav aria-label="breadcrumb">
						<h3 class="font-weight-bolder mb-0" style="color: #004882;">Dashboard</h3>
						</nav>
					</div>
				</nav>
				<div class="container-fluid py-4">
				<div class="row">
					<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
						<div class="container-fluid py-1 px-3">
							<nav aria-label="breadcrumb">
							<h3 class="font-weight-bolder text-black mb-0">Session Yang Dipilih</h3>
							</nav>
						</div>
					</div>
				</div>
				<button style="border-radius: 7px; border: #004882; float:right; background-color:#004882; color:white;" type="submit">Update</button>
				<div class="col-lg-15">
					<div class="card card-carousel overflow-hidden h-100 p-0">
						<h4 style="text-align: center;">Session 1</h4>
						<h5 style="text-align: center;">2 Februari 2023 - 2 Maret 2023</h5>
					</div>
				</div>
				<br>
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="container-fluid py-1 px-3">
						<nav aria-label="breadcrumb">
						<h3 class="font-weight-bolder text-white mb-0">Laporan Singkat Nilai Survey</h3>
						</nav>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-lg-7 mb-lg-0 mb-4">
						<div class="card z-index-2 h-100">
						<div class="card-header pb-0 pt-3 bg-transparent">
							<h6 class="text-capitalize">Nilai Survey</h6>
							<p class="text-sm mb-0">
							<i class="fa fa-arrow-up text-success"></i>
							<span class="font-weight-bold">4% more</span> in 2021
							</p>
						</div>
						<div class="card-body p-3">
							<div class="chart">
							<canvas id="chart-line" class="chart-canvas" height="300"></canvas>
							</div>
						</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="card card-carousel overflow-hidden h-100 p-0">
						<h3>Isinya Chart Nanti</h3>
					</div>
				</div>
				<br>
				<br>
				<br>
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="container-fluid py-1 px-3">
						<nav aria-label="breadcrumb">
						<h3 class="font-weight-bolder text-black mb-0">Laporan Responden</h3>
						</nav>
					</div>
				</div>
				<div class="row">
				<div class="row mt-4">
					<div class="col-lg-7 mb-lg-0 mb-4">
						<div class="card z-index-2 h-100">
						<div class="card-header pb-0 pt-3 bg-transparent">
							<h6 class="text-capitalize">Nilai Responden</h6>
							<p class="text-sm mb-0">
							<i class="fa fa-arrow-up text-success"></i>
							<span class="font-weight-bold">4% more</span> in 2021
							</p>
						</div>
						<div class="card-body p-3">
							<div class="chart">
							<canvas id="chart-line" class="chart-canvas" height="300"></canvas>
							</div>
						</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="card card-carousel overflow-hidden h-100 p-0">
						<h3>Isinya Chart Nanti</h3>
					</div>
				</div>
				</div>
			</main>
		</div>
</body>
<!--   Core JS Files   -->
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="/assets/js/plugins/chartjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
</html>




	


