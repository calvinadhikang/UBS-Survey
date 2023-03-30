<div id="layoutSidenav_content">
	<main class="main-content position-relative border-radius-lg ">
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
			data-scroll="false">
			<div class="container-fluid py-1 px-3">
				<nav aria-label="breadcrumb">
					<h3 class="font-weight-bolder mb-0" style="color: #004882;">Divisi <?=$divisi->NAMA ?></h3>
                    <h6>Alias : <?= $divisi->ALIAS ?> </h6>
                    <h6>Jumlah Karyawan : <?= $count_karyawan ?></h6>
				</nav>
			</div>
		</nav>

        <!-- Karyawan -->
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="container-fluid py-1 px-3">
						<nav aria-label="breadcrumb">
							<h3 class="font-weight-bolder text-black mb-0">Tabel Karyawan</h3>
						</nav>
					</div>
				</div>
			</div>
			<button style="border-radius: 7px; border: #004882; float:right; background-color:#004882; color:white;"
				type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Karyawan</button>
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
											</tr>
										</thead>
										<tbody>
											<?php foreach ($karyawan as $key => $value) { ?>
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
        </div>


        <!-- Divisi Peng-Survey -->
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="container-fluid py-1 px-3">
						<nav aria-label="breadcrumb">
							<h3 class="font-weight-bolder text-black mb-0">Tabel Peng-Survey</h3>
						</nav>
					</div>
				</div>
			</div>
			<button style="border-radius: 7px; border: #004882; float:right; background-color:#004882; color:white;"
				type="submit" data-bs-toggle="modal" data-bs-target="#divisiModal">Add Divisi</button>
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
													ALIAS</th>
												<th
													class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
													Nama</th>
												<th
													class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
													Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($surveyor as $key => $value) { ?>
											<tr>
												<td>
													<div class="d-flex px-3 py-1">
														<p class="text-xs font-weight-bold mb-0"><?= $value->ALIAS ?></p>
													</div>
												</td>
												<td>
													<span class="text-secondary text-xs font-weight-bold"><?= $value->NAMA ?></span>
												</td>
												<td>
													<a href="<?= base_url("divisi/detail/surveyor?alias=".$value->ALIAS."&parent=".$divisi->ALIAS) ?>">
														<button class="btn btn-info">Lihat Pertanyaan</button>
													</a>
												</td>
											</tr>
											<?php }  ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        
        
        
		<!-- Modal Add -->
		<div class="modal fade" id="divisiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Divisi Peng-Survey</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body p-0">
						<div class="container-fluid">
							<form action="<?= base_url('divisi/add/surveyor') ?>" method="post">
								<div class="row gy-4">
									<div class="col-lg-8">
										<!-- Menyimpan ID divisi Ditanya -->
										<input type="hidden" name="divisiDitanya" value="<?= $divisi->ALIAS ?>">

										<div class="col-lg-10">
                                            <label class="form-label">Divisi</label>
                                            <select name="divisiTanya" id="" class="form-control">
                                                <option value="" selected disabled>Pilih Divisi</option>
                                                <?php foreach ($allDivisi as $key => $value) { ?>
                                                    <option value="<?= $value->ALIAS ?>"><?= $value->ALIAS ?> - <?= $value->NAMA ?></option>
                                                <?php } ?>
                                            </select>
										</div>
										<br>
										<div class="col-lg-10">
											<button type="button" data-bs-dismiss="modal"
												class="btn btn-danger">Cancel</button>
											<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Add
												Divisi</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Delete -->
		<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Hapus Divisi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body p-0">
						<div class="container-fluid">
							<form action="<?= base_url('divisi/delete') ?>" method="post">
								<div class="row gy-4">
									<div class="col-lg-8">
										<div class="col-lg-10">
											<input type="hidden" name="id" id="deleteId" value="">
											<p id="deleteText"></p>
										</div>
										<div class="col-lg-10">
											<button type="button" data-bs-dismiss="modal"
												class="btn btn-danger">Cancel</button>
											<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Hapus
												Divisi</button>
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
						<h5 class="modal-title">Update Divisi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body p-0">
						<div class="container-fluid">
							<form action="<?= base_url('divisi/update') ?>" method="post">
								<div class="row gy-4">
									<div class="col-lg-8">
										<div class="col-lg-10">
											<input type="hidden" name="id" id="updateId" value="">
										</div>
										<div class="col-lg-10">
											<label class="form-label">Nama Divisi</label>
											<input type="text" class="form-control" name="nama"
												placeholder="Masukkan Nama Divisi" id="updateNama">
										</div>
										<br>
										<div class="col-lg-10">
											<label class="form-label">Alias Divisi</label>
											<input type="text" class="form-control" name="alias"
												placeholder=" Masukkan Kode Divisi" id="updateAlias">
										</div>
										<br>
										<div class="col-lg-10">
											<button type="button" data-bs-dismiss="modal"
												class="btn btn-danger">Cancel</button>
											<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Update Divisi</button>
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
</div>