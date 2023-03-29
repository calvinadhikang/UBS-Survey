<!-- isi konten -->
<div id="layoutSidenav_content">
	<main class="main-content position-relative border-radius-lg ">
		<!-- Navbar -->
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
			data-scroll="false">
			<div class="container-fluid py-1 px-3">
				<nav aria-label="breadcrumb">
					<h3 class="font-weight-bolder mb-0" style="color: #004882;">Master Pertanyaan</h3>
				</nav>
			</div>
		</nav>
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="container-fluid py-1 px-3">
						<nav aria-label="breadcrumb">
							<h3 class="font-weight-bolder text-black mb-0">Tabel Pertanyaan</h3>
						</nav>
					</div>
				</div>
			</div>
			<button style="border-radius: 7px; border: #004882; float:right; background-color:#004882; color:white;"
				type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Pertanyaan</button>
			<br>
			<div class="container-fluid py-4">
				<div class="row">
					<div class="col-12">
						<div class="card mb-4">
							<div class="card-body px-0 pt-0 pb-2">
								<div class="p-4"> 
									<table class="table align-items-center mb-0 table-responsive" id="myTable">
										<thead>
											<tr>
												<th
													class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
													Id</th>
												<th
													class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
													Pertanyaan</th>
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
														<span class="text-secondary text-xs font-weight-bold"><?= $value->TEXT ?></span>
													</td>
													<td class="align-middle text-center">
														<button class="btn btn-primary btnUpdate" data-bs-toggle="modal" data-bs-target="#updateModal" teks="<?= $value->TEXT ?>" id="<?= $value->ID ?>">Update</button>
														<button class="btn btn-danger btnDelete" data-bs-toggle="modal" data-bs-target="#deleteModal" teks="<?= $value->TEXT ?>" id="<?= $value->ID ?>">Delete</button>
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

			<!-- modal untuk Add -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Tambah Pertanyaan</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body p-0">
							<div class="container-fluid">
								<form action="<?= base_url('pertanyaan/add') ?>" method="post">
									<div class="row gy-4">
										<div class="col-lg-8">
											<div class="col-lg-6">
												<label class="form-label">Pertanyaan</label><br>
												<textarea placeholder="Masukkan Pertanyaan" name="text" class="form-control w-100"></textarea>
											</div>
											<br>
											<div class="col-lg-10">
												<button type="button" data-bs-dismiss="modal"
												class="btn btn-danger">Cancel</button>
												<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Add
													Pertanyaan</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- modal untuk Delete -->
			<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Yakin Hapus Pertanyaan Dibawah Ini ?</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body p-0">
							<div class="container-fluid">
								<form action="<?= base_url('pertanyaan/delete') ?>" method="post">
									<div class="row gy-4">
										<div class="col-lg-8">
											<div class="col-lg-6">
												<input type="hidden" id="deleteId" name="id" value="">
												<p id="deleteText"></p>
											</div>
											<br>
											<div class="col-lg-10">
												<button type="button" data-bs-dismiss="modal"
												class="btn btn-danger">Cancel</button>
												<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Hapus Pertanyaan</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- modal untuk Update -->
			<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Ganti Pertanyaan Dibawah Ini ?</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body p-0">
							<div class="container-fluid">
								<form action="<?= base_url('pertanyaan/update') ?>" method="post">
									<div class="row gy-4">
										<div class="col-lg-8">
											<div class="col-lg-6">
												<input type="hidden" id="updateId" name="id" value="">
												<textarea class="form-control w-100" id="updateText" name="text"></textarea>
											</div>
											<br>
											<div class="col-lg-10">
												<button type="button" data-bs-dismiss="modal"
												class="btn btn-danger">Cancel</button>
												<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Update Pertanyaan</button>
												</div>
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
			let teks = $(this).attr('teks');
			let id = $(this).attr('id');

			$('#deleteText').html(teks);
			$('#deleteId').val(id);
		});

		$('body').on('click', '.btnUpdate', function() {
			let teks = $(this).attr('teks');
			let id = $(this).attr('id');

			console.log(teks);

			$('#updateText').html(teks);
			$('#updateId').val(id);
		});

		$('#myTable').DataTable();
	})
</script>