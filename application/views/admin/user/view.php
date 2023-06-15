<!-- UNTUK ISI WINDOW KANAN -->
<div id="layoutSidenav_content">
	<main class="main-content position-relative border-radius-lg ">
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
			data-scroll="false">
			<div class="container-fluid py-1 px-3">
				<div class="row">
					<h3 class="font-weight-bolder mb-0" style="color: #004882;">Master User</h3>
				</div>
				<div class="row mx-2">
					<button class="btn btn-danger" type="submit" data-bs-toggle="modal" data-bs-target="#randomModal">Random Password Users</button>
				</div>
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
				<div class="col mx-4">
					<div class="float-end">
						<button style="border-radius: 7px; border: #004882; background-color:#004882; color:white;" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal" class="p-2">Tambah User</button>
					</div>
				</div>
			</div>
			<div class="container-fluid py-2">
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
													Divisi</th>
												<th
													class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Nama</th>
												<th
													class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Username</th>
												<th
													class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Password</th>
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
													<span class="text-secondary text-xs font-weight-bold"><?= $value->PASSWORD ?></span>
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
														$color = "danger";
														if($value->STATUS){
															$status = "Aktif";
															$color = "success";
														}
													?>
													<span class="badge badge-sm bg-gradient-<?= $color ?>"><?= $status ?></span>
												</td>
												<td class="align-middle text-center">
													<button class="btn btn-primary btnUpdate" data-bs-toggle="modal" data-bs-target="#updateModal" 
														nama="<?= $value->NAMA ?>" 
														id="<?= $value->ID ?>"
														username="<?= $value->USERNAME ?>"
														password="<?= $value->PASSWORD ?>"
														>Update</button>
													<button class="btn btn-danger btnDelete" data-bs-toggle="modal" data-bs-target="#deleteModal" nama="<?= $value->NAMA ?>" id="<?= $value->ID ?>">Delete</button>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="">
							<h3>Dapatkan Data User dalam Excel</h3>
							<button class="btn btn-outline-success" id="excel">Buat Excel</button>
							<div class="spinner-border" role="status" id="excelLoading"></div>
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
													placeholder="Masukkan Nama User" required>
											</div>
											<br>
											<div class="col-lg-10">
												<label class="form-label">Divisi</label>
												<select name="divisi" id="" class="form-control" required>
													<option value="" selected disabled>Pilih Divisi</option>
													<option value="ADMIN" >ADMIN</option>
													<?php foreach ($divisi as $key => $value) { ?>
														<option value="<?= $value->ALIAS ?>"><?= $value->NAMA ?></option>
													<?php } ?>
												</select>
											</div>
											<br>
											<div class="col-lg-10">
												<label class="form-label">Username</label>
												<input type="text" class="form-control" name="username"
													placeholder="Masukkan Username" required>
											</div>
											<br>
											<div class="col-lg-10">
												<label class="form-label">Password</label>
												<input type="text" class="form-control" name="password"
													placeholder="Masukan Password" required>
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


			<!-- UNTUK MODAL SAAT DI TEKAN UPDATE -->
			<div class="modal fade" data-bs-backdrop="static" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Update User</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body p-0">
							<div class="container-fluid">
								<form action="<?= base_url('user/update') ?>" method="post">
									<input type="hidden" name="id" id="updateId">
									<div class="row gy-4">
										<div class="col-lg-8">
											<div class="col-lg-10">
												<label class="form-label">Nama User</label>
												<input type="text" class="form-control" name="nama"
													placeholder="Masukkan Nama User" required id="updateName">
											</div>
											<br>
											<div class="col-lg-10">
												<label class="form-label">Divisi</label>
												<select name="divisi" id="" class="form-control" required>
													<option value="" selected disabled>Pilih Divisi</option>
													<option value="ADMIN" >ADMIN</option>
													<?php foreach ($divisi as $key => $value) { ?>
														<option value="<?= $value->ALIAS ?>"><?= $value->NAMA ?></option>
													<?php } ?>
												</select>
											</div>
											<br>
											<div class="col-lg-10">
												<label class="form-label">Username</label>
												<input type="text" class="form-control" name="username"
													placeholder="Masukkan Username" required id="updateUsername">
											</div>
											<br>
											<div class="col-lg-10">
												<label class="form-label">Password</label>
												<input type="text" class="form-control" name="password"
													placeholder="Masukan Password" required id="updatePassword">
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
												<label class="form-label">Status</label>
												<div class="form-check">
													<input class="form-check-input" type="radio" name="status"
														id="flexRadioDefault1" checked value="1">
													<label class="form-check-label" for="flexRadioDefault1">Aktif</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="radio" name="status"
														id="flexRadioDefault2" value="0">
													<label class="form-check-label"
														for="flexRadioDefault2">Non-Aktif</label>
												</div>
											</div>
											<br>
											<div class="col-lg-10">
												<button type="button" data-bs-dismiss="modal"
													class="btn btn-danger">Cancel</button>
												<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Update
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

			<!-- UNTUK MODAL SAAT DI TEKAN RESET PASSWORD -->
			<div class="modal fade" id="randomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Yakin Random Password User Dibawah Ini ?</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body p-0">
							<div class="container-fluid">
								<br>
								<!-- Spinner -->
								<div class="d-flex justify-content-center">
									<div class="spinner-border" role="status" id="spinner">
										<span class="visually-hidden">Loading...</span>
									</div>
								</div>
								<br>
								<button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
								<button type="submit" class="btn btn-outline-danger" id="btnRandom">Ya, Random Password User</button>
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
		let username = $(this).attr('username');
		let password = $(this).attr('password');
		let id = $(this).attr('id');

		$('#updateName').val(nama);
		$('#updateUsername').val(username);
		$('#updatePassword').val(password);
		$('#updateId').val(id);
	});

	showLoading = (status) => {
		status ? $('#spinner').show() : $('#spinner').hide()  
	}

	$(document).on('click', '#btnRandom', () => {
		let body = new FormData();
		body.append('command', 'random');
	
		let request = new Request("<?= base_url() ?>api/user", {
			method: "POST",
			body: body
		})

		showLoading(true);
		fetch(request)
			.then((res) => res.json())
			.then((res) => {
				showLoading(false);
				if (res.error) {
					alert(`Error: ${res.message} `);
				}else{
					alert(`Berhasil random password`);
					window.location.href = "<?= base_url("user") ?>"
				}
			})
	})

	showExcelLoading = (status) => {
		if (status) {
			$('#excelLoading').show();
		}else{
			$('#excelLoading').hide();
		}
	}

	$(document).on('click', '#excel', () => {
		let request = new Request("<?= base_url() ?>api/user?active=1", {
			method: "GET",
		})

		showExcelLoading(true);
		fetch(request)
			.then((res) => res.json())
			.then((res) => {
				showExcelLoading(false);
				console.log(res);
				
				let namaFile = "Data User";
				let dataExcel = [];

				//add Excel Header
				dataExcel.push(["NAMA", "USERNAME", "PASSWORD", "DIVISI"])
				//add Excel Data / Body
				res.forEach(element => {
					dataExcel.push([element.NAMA, element.USERNAME, element.PASSWORD, element.NAMA_DIVISI]);
				});

				var workbook = XLSX.utils.book_new(),
				worksheet = XLSX.utils.aoa_to_sheet(dataExcel);
				workbook.SheetNames.push(namaFile);
				workbook.Sheets[namaFile] = worksheet;

				XLSX.writeFile(workbook, `Excel ${namaFile}.xlsx`);
				alert("Excel Berhasil Dibuat !");
			})
	})

	// Tutup / Hilangkan loading saat pertama kali berjalan..
	showLoading(false);
	showExcelLoading(false);
})
</script>