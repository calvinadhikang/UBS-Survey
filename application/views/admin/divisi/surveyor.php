<div id="layoutSidenav_content">
	<main class="main-content position-relative border-radius-lg ">
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
			data-scroll="false">
			<div class="container-fluid py-1 px-3">
                <div class="row w-50">
                    <div class="col">
                        <h2>Penanya</h2>
                        <h3 class="font-weight-bolder mb-0" style="color: #004882;">Divisi <?=$tanya->NAMA ?></h3>
                        <h6>Alias : <?= $tanya->ALIAS ?> </h6>
                    </div>
                    <div class="col">
                        <h2>Ditanya</h2>
                        <h3 class="font-weight-bolder mb-0" style="color: #004882;">Divisi <?=$ditanya->NAMA ?></h3>
                        <h6>Alias : <?= $ditanya->ALIAS ?> </h6>
                    </div>
                </div>
			</div>
		</nav>

        <!-- Karyawan -->
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
				type="submit" data-bs-toggle="modal" data-bs-target="#pertanyaanModal">Add Pertanyaan</button>
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
											<?php foreach ($pertanyaan as $key => $value) { ?>
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
        </div>
        
        
		<!-- Modal Add -->
		<div class="modal fade" id="pertanyaanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Pertanyaan Survey</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body p-0">
						<div class="container-fluid">
							<form action="<?= base_url('divisi/detail/surveyor/add') ?>" method="post">
								<div class="row gy-4">
									<div class="col-lg-8">
										<!-- Menyimpan ID divisi Ditanya -->
										<input type="hidden" name="profile" value="<?= $profile->ID ?>">
										<input type="hidden" name="alias" value="<?= $tanya->ALIAS ?>">
										<input type="hidden" name="parent" value="<?= $ditanya->ALIAS ?>">

										<div class="col-lg-10">
                                            <label class="form-label">Pertanyaan</label>
                                            <select name="pertanyaan" id="" class="form-control">
                                                <option value="" selected disabled>Pilih Pertanyaan</option>
                                                <?php foreach ($allPertanyaan as $key => $value) { ?>
                                                    <option value="<?= $value->ID ?>"><?= $value->TEXT ?></option>
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
	</main>
</div>