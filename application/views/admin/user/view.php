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
</head>
<body>
	<div class="min-height-300 bg-primary position-absolute w-100"></div>
  	<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
		<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
		<a class="navbar-brand m-4" target="_blank">
			<img src="assets/img/LogoUbs.png" class="navbar-brand-img h-100" width="350px" height="400px" alt="main_logo">
			<br><br>
			<div style="border: 2px solid #004882; background-color: #004882; border-radius: 7px;" >
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
      </ul>
    </div>
	</aside>


	<!-- isi konten -->
	<main class="main-content position-relative border-radius-lg ">
	<!-- Navbar -->
	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
		<div class="container-fluid py-1 px-3">
			<nav aria-label="breadcrumb">
			<h3 class="font-weight-bolder text-white mb-0">Master User</h3>
			</nav>
		</div>
    </nav>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
			<div class="container-fluid py-1 px-3">
				<nav aria-label="breadcrumb">
				<h3 class="font-weight-bolder text-white mb-0">Tabel User</h3>
				</nav>
			</div>
        </div>
    </div>
	<button style="border-radius: 7px; border: #004882; float:right; background-color:#004882; color:white;" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Add User</button>
	<br>
	  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Department</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    	<td>
							<div class="d-flex px-3 py-1">
								<p class="text-xs font-weight-bold mb-0">1</p>
							</div>
                    	</td>
						<td>
							<span class="text-secondary text-xs font-weight-bold">Asahan</span>
						</td>
						<td class="align-middle text-center text-sm"> 
							<span class="text-secondary text-xs font-weight-bold">Ivander</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="text-secondary text-xs font-weight-bold">ibw</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="text-secondary text-xs font-weight-bold">Admin</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="badge badge-sm bg-gradient-success">Aktif</span>
						</td>
						<td class="align-middle text-center">
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-danger">Delete</button>
						</td>
                    </tr>
                    <tr>
						<td>
							<div class="d-flex px-3 py-1">
								<p class="text-xs font-weight-bold mb-0">2</p>
							</div>
                    	</td>
						<td>
							<span class="text-secondary text-xs font-weight-bold">Hubungan Masyarakat</span>
						</td>
						<td class="align-middle text-center text-sm"> 
							<span class="text-secondary text-xs font-weight-bold">Berwyn</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="text-secondary text-xs font-weight-bold">gans</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="text-secondary text-xs font-weight-bold">Responden</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="badge badge-sm bg-gradient-danger">Non-Aktif</span>
						</td>
						<td class="align-middle text-center">
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-danger">Delete</button>
						</td>
                    </tr>
                    <tr>
						<td>
							<div class="d-flex px-3 py-1">
								<p class="text-xs font-weight-bold mb-0">3</p>
							</div>
                    	</td>
						<td>
							<span class="text-secondary text-xs font-weight-bold">Design Visual</span>
						</td>
						<td class="align-middle text-center text-sm"> 
							<span class="text-secondary text-xs font-weight-bold">Wijaya</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="text-secondary text-xs font-weight-bold">banget</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="text-secondary text-xs font-weight-bold">Responden</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="badge badge-sm bg-gradient-danger">Non-Aktif</span>
						</td>
						<td class="align-middle text-center">
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-danger">Delete</button>
						</td>
                    </tr>
                    <tr>
						<td>
							<div class="d-flex px-3 py-1">
								<p class="text-xs font-weight-bold mb-0">4</p>
							</div>
                    	</td>
						<td>
							<span class="text-secondary text-xs font-weight-bold">Keamanan</span>
						</td>
						<td class="align-middle text-center text-sm"> 
							<span class="text-secondary text-xs font-weight-bold">Caca</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="text-secondary text-xs font-weight-bold">Cacu</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="text-secondary text-xs font-weight-bold">Admin</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="badge badge-sm bg-gradient-danger">Non-Aktif</span>
						</td>
						<td class="align-middle text-center">
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-danger">Delete</button>
						</td>
                    </tr>
                    <tr>
						<td>
							<div class="d-flex px-3 py-1">
								<p class="text-xs font-weight-bold mb-0">5</p>
							</div>
                    	</td>
						<td>
							<span class="text-secondary text-xs font-weight-bold">It</span>
						</td>
						<td class="align-middle text-center text-sm"> 
							<span class="text-secondary text-xs font-weight-bold">Angel</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="text-secondary text-xs font-weight-bold">agl123</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="text-secondary text-xs font-weight-bold">Responden</span>
						</td>
						<td class="align-middle text-center text-sm">
							<span class="badge badge-sm bg-gradient-success">Aktif</span>
						</td>
						<td class="align-middle text-center">
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-danger">Delete</button>
						</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div> 	

	<!-- modal untuk Add -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah User</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body p-0">
					<div class="container-fluid">
						<div class="row gy-4">
							<div class="col-lg-8">
								<div class="col-lg-10">
									<label class="form-label">Nama User</label>
									<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama User">
								</div>
								<br>
								<div class="col-lg-10">
									<label class="form-label">Department</label>
									<input type="text" class="form-control" name="namadepartment" placeholder=" Masukkan Nama Department">
								</div>
								<br>
								<div class="col-lg-10">
									<label class="form-label">Username</label>
									<input type="text" class="form-control" name="username" placeholder="Masukkan Username">
								</div>
								<br>
								<div class="col-lg-10">
									<label class="form-label">Password</label>
									<input type="text" class="form-control" name="pass" placeholder="Masukan Password">
								</div>
								<br>
								<div class="col-lg-10">
									<label class="form-label">Role</label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
										<label class="form-check-label" for="flexRadioDefault1">Admin</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
										<label class="form-check-label" for="flexRadioDefault2">Responden</label>
									</div>
								</div>
								<br>
								<div class="col-lg-10">
									<button type="submit" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
									<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Add User</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
</body>
<!--   Core JS Files   -->
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="/assets/js/plugins/chartjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>

