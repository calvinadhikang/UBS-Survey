<div id="layoutSidenav_content">
	<main class="main-content position-relative border-radius-lg ">
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
			data-scroll="false">
			<div class="container-fluid py-1 px-3">
				<nav aria-label="breadcrumb">
					<h3 class="font-weight-bolder mb-0" style="color: #004882;">Master Department</h3>
				</nav>
			</div>
		</nav>
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="container-fluid py-1 px-3">
						<nav aria-label="breadcrumb">
							<h3 class="font-weight-bolder text-black mb-0">Tabel Department</h3>
						</nav>
					</div>
				</div>
			</div>
			<button style="border-radius: 7px; border: #004882; float:right; background-color:#004882; color:white;"
				type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Department</button>
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
												<th
													class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Kode</th>
												<th
													class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
													Nama</th>
												<th
													class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Aksi</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="d-flex px-3 py-1">
														<p class="text-xs font-weight-bold mb-0">AS</p>
													</div>
												</td>
												<td>
													<span class="text-secondary text-xs font-weight-bold">Asahan</span>
												</td>
												<td class="align-middle text-center">
													<button class="btn btn-primary">Update</button>
													<button class="btn btn-danger">Delete</button>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex px-3 py-1">
														<p class="text-xs font-weight-bold mb-0">HM</p>
													</div>
												</td>
												<td>
													<span class="text-secondary text-xs font-weight-bold">Hubungan
														Masyarakat</span>
												</td>
												<td class="align-middle text-center">
													<button class="btn btn-primary">Update</button>
													<button class="btn btn-danger">Delete</button>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex px-3 py-1">
														<p class="text-xs font-weight-bold mb-0">KN</p>
													</div>
												</td>
												<td>
													<span
														class="text-secondary text-xs font-weight-bold">Keamanan</span>
												</td>
												<td class="align-middle text-center">
													<button class="btn btn-primary">Update</button>
													<button class="btn btn-danger">Delete</button>
												</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex px-3 py-1">
														<p class="text-xs font-weight-bold mb-0">DV</p>
													</div>
												</td>
												<td>
													<span class="text-secondary text-xs font-weight-bold">Design
														Visual</span>
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
			</div>
		</div>
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Department</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body p-0">
						<div class="container-fluid">
							<div class="row gy-4">
								<div class="col-lg-8">
									<div class="col-lg-10">
										<label class="form-label">Nama Department</label>
										<input type="text" class="form-control" name="namadepartment"
											placeholder="Masukkan Nama Department">
									</div>
									<br>
									<div class="col-lg-10">
										<label class="form-label">Kode Department</label>
										<input type="text" class="form-control" name="kodedepartment"
											placeholder=" Masukkan Kode Department">
									</div>
									<br>
									<div class="col-lg-10">
										<button type="submit" data-bs-dismiss="modal"
											class="btn btn-danger">Cancel</button>
										<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Add
											Department</button>
									</div>
								</div>
							</div>
						</div>
					</div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script type="text/javascript" src="assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

</html>
