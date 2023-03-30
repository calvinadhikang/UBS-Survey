<!-- UNTUK ISI WINDOW KANAN -->
<div id="layoutSidenav_content">
	<main class="main-content position-relative border-radius-lg ">
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
			data-scroll="false">
			<div class="container-fluid py-1 px-3">
				<nav aria-label="breadcrumb">
					<h3 class="font-weight-bolder mb-0" style="color: #004882;">Master User</h3>
				</nav>
			</div>
		</nav>
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="container-fluid py-1 px-3">
						<nav aria-label="breadcrumb">
							<h3 class="font-weight-bolder text-black mb-0">Tabel User</h3>
						</nav>
					</div>
				</div>
			</div>
			<button style="border-radius: 7px; border: #004882; float:right; background-color:#004882; color:white;"
				type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Add User</button>
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
													Divisi</th>
												<th
													class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Nama</th>
												<th
													class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Username</th>
												<th
													class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Role</th>
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
													<span class="text-secondary text-xs font-weight-bold"><?= $value->DIVISI ?></span>
												</td>
												<td class="align-middle text-center text-sm">
													<span class="text-secondary text-xs font-weight-bold"><?= $value->NAMA ?></span>
												</td>
												<td class="align-middle text-center text-sm">
													<span class="text-secondary text-xs font-weight-bold"><?= $value->USERNAME ?></span>
												</td>
												<td class="align-middle text-center text-sm">
													<?php 
														$role = "Admin";
														if ($value->ROLE == 1) {
															$role = "Responden";
														}
													?>
													<span class="text-secondary text-xs font-weight-bold"><?= $role ?></span>
												</td>
												<td class="align-middle text-center text-sm">
													<?php 
														$status = "Non-Aktif";
														if($value->STATUS){
															$status = "Aktif";
														}
													?>
													<span class="badge badge-sm bg-gradient-success"><?= $status ?></span>
												</td>
												<td class="align-middle text-center">
													<button class="btn btn-primary btnUpdate" data-bs-toggle="modal" data-bs-target="#updateModal" nama="<?= $value->NAMA ?>" id="<?= $value->ID ?>">Update</button>
													<button class="btn btn-danger btnDelete" data-bs-toggle="modal" data-bs-target="#deleteModal" nama="<?= $value->NAMA ?>" id="<?= $value->ID ?>">Delete</button>
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
							<h5 class="modal-title">Tambah User</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body p-0">
							<div class="container-fluid">
								<form action="<?= base_url('user/add') ?>" method="post">
									<div class="row gy-4">
										<div class="col-lg-8">
											<div class="col-lg-10">
												<label class="form-label">Nama User</label>
												<input type="text" class="form-control" name="nama"
													placeholder="Masukkan Nama User">
											</div>
											<br>
											<div class="col-lg-10">
												<label class="form-label">Divisi</label>
												<select name="divisi" id="" class="form-control">
													<option value="" selected disabled>Pilih Divisi</option>
													<?php foreach ($divisi as $key => $value) { ?>
														<option value="<?= $value->ALIAS ?>"><?= $value->NAMA ?></option>
													<?php } ?>
												</select>
											</div>
											<br>
											<div class="col-lg-10">
												<label class="form-label">Username</label>
												<input type="text" class="form-control" name="username"
													placeholder="Masukkan Username">
											</div>
											<br>
											<div class="col-lg-10">
												<label class="form-label">Password</label>
												<input type="text" class="form-control" name="password"
													placeholder="Masukan Password">
											</div>
											<br>
											<div class="col-lg-10">
												<label class="form-label">Role</label>
												<div class="form-check">
													<input class="form-check-input" type="radio" name="role"
														id="flexRadioDefault1" value="0">
													<label class="form-check-label" for="flexRadioDefault1">Admin</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="radio" name="role"
														id="flexRadioDefault2" checked value="1">
													<label class="form-check-label"
														for="flexRadioDefault2">Responden</label>
												</div>
											</div>
											<br>
											<div class="col-lg-10">
												<button type="button" data-bs-dismiss="modal"
													class="btn btn-danger">Cancel</button>
												<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Add
													User</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>


			<!-- UNTUK MODAL SAAT DI TEKAN DELETE -->
			<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Yakin Hapus User Dibawah Ini ?</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body p-0">
							<div class="container-fluid">
								<form action="<?= base_url('user/delete') ?>" method="post">
									<div class="row gy-4">
										<div class="col-lg-8">
											<div class="col-lg-10">
												<p id="deleteName"></p>
												<input type="hidden" class="form-control" name="id" id="deleteId">
											</div>
											<br>
											<div class="col-lg-10">
												<button type="button" data-bs-dismiss="modal"class="btn btn-danger">Cancel</button>
												<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Hapus User</button>
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
$(document).ready(() => {
	$('body').on('click', '.btnDelete', function() {
		let nama = $(this).attr('nama');
		let id = $(this).attr('id');

		console.log(id)

		$('#deleteName').html(nama);
		$('#deleteId').val(id);
	});

	$('body').on('click', '.btnUpdate', function() {
		let nama = $(this).attr('nama');
		let id = $(this).attr('id');

		$('#updateText').html(nama);
		$('#updateId').val(id);
	});
})
</script>