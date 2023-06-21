<div id="layoutSidenav_content">
	<main class="main-content position-relative border-radius-lg ">
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
			data-scroll="false">
			<div class="container-fluid py-1 px-3">
                <div class="row w-50">
                    <div class="col">
                        <h2>Surveyor</h2>
                        <h3 class="font-weight-bolder mb-0" style="color: #004882;">Divisi <?=$tanya->NAMA ?></h3>
                        <h6>Alias : <?= $tanya->ALIAS ?> </h6>

                    </div>
                    <div class="col">
                        <h2>Target Survey</h2>
                        <h3 class="font-weight-bolder mb-0" style="color: #004882;">Divisi <?=$ditanya->NAMA ?></h3>
                        <h6>Alias : <?= $ditanya->ALIAS ?> </h6>
                    </div>
                </div>
			</div>
		</nav>

        <!-- List Pertanyaan Survey -->
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="container-fluid py-1 px-3">
						<nav aria-label="breadcrumb">
							<h3 class="font-weight-bolder text-black mb-0">Tabel Pertanyaan</h3>
						</nav>
					</div>
				</div>
				<div class="col mx-4">
					<div class="float-end">
						<!-- Btn Pertanyaan -->
						<a href="<?php echo base_url()."divisi/detail/surveyor/pertanyaan?surveyor=".$tanya->ALIAS."&target=".$ditanya->ALIAS;  ?>">
							<button style="border-radius: 7px; border: #004882; float:right; background-color:#004882; color:white;" class="p-2">Edit Pertanyaan</button>
						</a>
					</div>
				</div>
			</div>
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
											</tr>
										</thead>
										<tbody>
											<?php 
												if (count($pertanyaan) <= 0) { ?>
													<tr>
														<td class="text-danger"><b>Belum ada pertanyaan...</b></td>
														<td></td>
													</tr>
											<?php } else {
													foreach ($pertanyaan as $key => $value) { ?>
													<tr>
														<td>
															<div class="d-flex px-3 py-1">
																<p class="text-xs font-weight-bold mb-0"><?= $value->ID ?></p>
															</div>
														</td>
														<td>
															<span class="text-secondary text-xs font-weight-bold"><?= $value->TEXT ?></span>
														</td>
													</tr>
											<?php	
												}
											} ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
	</main>
</div>