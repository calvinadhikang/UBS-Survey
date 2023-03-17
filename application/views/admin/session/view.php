<!-- isi konten -->
<div id="layoutSidenav_content">
	<main class="main-content position-relative border-radius-lg ">
		<!-- Navbar -->
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
			data-scroll="false">
			<div class="container-fluid py-1 px-3">
				<nav aria-label="breadcrumb">
					<h3 class="font-weight-bolder mb-0" style="color: #004882;">Master Session</h3>
				</nav>
			</div>
		</nav>
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="container-fluid py-1 px-3">
						<nav aria-label="breadcrumb">
							<h3 class="font-weight-bolder text-black mb-0">Tabel Session</h3>
						</nav>
					</div>
				</div>
			</div>
			<button style="border-radius: 7px; border: #004882; float:right; background-color:#004882; color:white;"
				type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Session</button>
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
													Id</th>
												<th
													class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
													Session</th>
												<th
													class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Tanggal Mulai</th>
												<th
													class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Tanggal Akhir</th>
												<th
													class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Aksi</th>
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
													<span class="text-secondary text-xs font-weight-bold">Session Februari
														2023</span>
												</td>
												<td>
													<span class="text-secondary text-xs font-weight-bold">01 Februari
														2023</span>
												</td>
												<td>
													<span class="text-secondary text-xs font-weight-bold">28 Februari
														2023</span>
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
													<span class="text-secondary text-xs font-weight-bold">Session Maret
														2023</span>
												</td>
												<td>
													<span class="text-secondary text-xs font-weight-bold">01 Maret
														2023</span>
												</td>
												<td>
													<span class="text-secondary text-xs font-weight-bold">31 Maret
														2023</span>
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
													<span class="text-secondary text-xs font-weight-bold">Session
														April</span>
												</td>
												<td>
													<span class="text-secondary text-xs font-weight-bold">01 April
														2023</span>
												</td>
												<td>
													<span class="text-secondary text-xs font-weight-bold">30 April
														2023</span>
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

			<!-- UNTUK MODAL SAAT DI TEKAN ADD -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Tambah Session</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body p-0">
							<div class="container-fluid">
								<div class="row gy-4">
									<div class="col-lg-8">
										<div class="col-lg-10">
											<label class="form-label">Nama Session</label>
											<input type="text" class="form-control" name="namasession"
												placeholder="Masukkan Nama Session">
										</div>
										<br>
										<h5>Waktu Session</h5>
										<div class="col-lg-10">
											<label class="form-label">Tanggal Mulai</label>
											<input type="text" class="form-control" name="tglmulai"
												placeholder=" Masukkan Nama Department">
										</div>
										<br>
										<div class="col-lg-10">
											<label class="form-label">Tanggal Berakhir</label>
											<input type="text" class="form-control" name="tglakhir"
												placeholder="Masukkan Username">
										</div>
										<br>
										<div class="col-lg-10">
											<button type="submit" data-bs-dismiss="modal"
												class="btn btn-danger">Cancel</button>
											<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Add
												Session</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</main>
