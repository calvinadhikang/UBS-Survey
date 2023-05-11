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
								<div class="table-responsive p-4">
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
													class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Tanggal Mulai</th>
												<th
													class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Tanggal Akhir</th>
												<th
													class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Status</th>
												<th
													class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($data as $key => $value) { ?>
												<tr>
													<td>
														<div class="d-flex px-3 py-1">
															<p class="text-xs font-weight-bold mb-0"><?= $value->ID ?></p>
														</div>
													</td>
													<td>
														<span class="text-secondary text-xs font-weight-bold"><?= $value->NAMA ?></span>
													</td>
													<td>
														<span class="text-secondary text-xs font-weight-bold"><?= $value->MULAI ?></span>
													</td>
													<td>
														<span class="text-secondary text-xs font-weight-bold"><?= $value->AKHIR ?></span>
													</td>
													<td>
														<?php if ($value->STATUS) { ?>
															<span class="badge badge-sm bg-gradient-success">Aktif</span>															
														<?php } else { ?>
															<span class="badge badge-sm bg-gradient-secondary">Non-Aktif</span>															
														<?php } ?>
													</td>
													<td class="align-middle text-center">
														<button class="btn btn-primary btnUpdate" data-bs-toggle="modal" data-bs-target="#updateModal" 
															idSesi="<?= $value->ID ?>"
															nama="<?= $value->NAMA ?>"
															mulai="<?= $value->MULAI ?>"
															akhir="<?= $value->AKHIR ?>"
															>Update</button>
													</td>
												</tr>
											<?php } ?>
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
								<form action="<?= base_url('sesi/add') ?>" method="post">
									<div class="row gy-4">
										<div class="col-lg-8">
											<div class="col-lg-10">
												<label class="form-label">Nama Session</label>
												<input type="text" class="form-control" name="nama"
													placeholder="Masukkan Nama Session" required>
											</div>
											<br>
											<h5>Waktu Session</h5>
											<div class="col-lg-10">
												<label class="form-label">Tanggal Mulai</label>
												<input type="date" class="form-control" name="mulai" required>
											</div>
											<br>
											<div class="col-lg-10">
												<label class="form-label">Tanggal Berakhir</label>
												<input type="date" class="form-control" name="akhir" required>
											</div>
											<br>
											<div class="col-lg-10">
												<button type="button" data-bs-dismiss="modal"
													class="btn btn-danger">Cancel</button>
												<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Add
													Session</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Update -->
			<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Update Session</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body p-0">
							<div class="container-fluid">
								<form action="<?= base_url('sesi/update') ?>" method="post">
									<div class="row gy-4">
										<div class="col-lg-8">
											<div class="col-lg-10">
												<input type="hidden" name="id" id="updateId" value="">
											</div>
											<div class="col-lg-10">
												<label class="form-label">Nama Session</label>
												<input type="text" class="form-control" name="nama"
													placeholder="Masukkan Nama Session" required id="updateNama">
											</div>
											<br>
											<h5>Waktu Session</h5>
											<div class="col-lg-10">
												<label class="form-label">Tanggal Mulai</label>
												<input type="date" class="form-control" name="mulai" required id="updateMulai">
											</div>
											<br>
											<div class="col-lg-10">
												<label class="form-label">Tanggal Berakhir</label>
												<input type="date" class="form-control" name="akhir" required id="updateAkhir">
											</div>
											<br>
											<div class="col-lg-10">
												<button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
												<button type="submit" class="btn btn-primary">Update Session</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
	</main>
<script>
$(document).ready(function () {

	$('body').on('click', '.btnUpdate', function() {
		let idSesi = $(this).attr('idSesi');
		let nama = $(this).attr('nama');
		let mulai = $(this).attr('mulai');
		let akhir = $(this).attr('akhir');

		console.log(mulai);
	
		$('#updateId').val(idSesi);
		$('#updateNama').val(nama);
		document.getElementById('updateMulai').value = mulai;
		$('#updateMulai').val(Date.parse(mulai));
		$('#updateAkhir').val(Date.parse(akhir));
	})
})
</script>
