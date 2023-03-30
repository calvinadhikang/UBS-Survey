<!-- UNTUK ISI WINDOW KANAN -->
<div id="layoutSidenav_content">
	<main class="main-content position-relative border-radius-lg ">
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
			data-scroll="false">
			<div class="container-fluid py-1 px-3">
				<nav aria-label="breadcrumb">
					<h3 class="font-weight-bolder mb-0" style="color: #004882;">Dashboard</h3>
				</nav>
			</div>
		</nav>
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="container-fluid py-1 px-3">
						<nav aria-label="breadcrumb">
							<h3 class="font-weight-bolder text-black mb-0">Session Yang Dipilih</h3>
						</nav>
					</div>
				</div>
				<div class="col">
					<button
						style="border-radius: 7px; border: #004882; float:right; background-color:#004882; color:white;"
						data-bs-toggle="modal" data-bs-target="#sesiModal">Update</button>
				</div>
			</div>
			<div class="col-lg-15">
				<div class="card card-carousel overflow-hidden h-100 p-0">
					<?php 
						$panjang = count($sesiAktif);
						if ($panjang <= 0) {
							echo "<h4 style='text-align: center;'>Tidak Ada Session Yang Sedang Aktif</h4>";
							echo "<h5 style='text-align: center;'>Pilih Session Terlebih Dahulu</h5>";
						}else{
							$sesi = $sesiAktif[0];
							echo "<h4 style='text-align: center;'>".$sesi->NAMA."</h4>";
							echo "<h5 style='text-align: center;'>".$sesi->MULAI." - ".$sesi->AKHIR."</h5>";
						}  
					?>
					<!-- <h4 style="text-align: center;">Session 1</h4>
					<h5 style="text-align: center;">2 Februari 2023 - 2 Maret 2023</h5> -->
				</div>
			</div>
			<br>
			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="container-fluid py-1 px-3">
					<nav aria-label="breadcrumb">
						<h3 class="font-weight-bolder text-white mb-0">Laporan Singkat Nilai Survey</h3>
					</nav>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-lg-7 mb-lg-0 mb-4">
					<div class="card z-index-2 h-100">
						<div class="card-header pb-0 pt-3 bg-transparent">
							<h6 class="text-capitalize">Nilai Survey</h6>
							<p class="text-sm mb-0">
								<i class="fa fa-arrow-up text-success"></i>
								<span class="font-weight-bold">4% more</span> in 2021
							</p>
						</div>
						<div class="card-body p-3">
							<div class="chart">
								<canvas id="chart-line" class="chart-canvas" height="300"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="card card-carousel overflow-hidden h-100 p-0">
						<h3>Isinya Chart Nanti</h3>
					</div>
				</div>
				<br>
				<br>
				<br>
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="container-fluid py-1 px-3">
						<nav aria-label="breadcrumb">
							<h3 class="font-weight-bolder text-black mb-0">Laporan Responden</h3>
						</nav>
					</div>
				</div>
				<div class="row">
					<div class="row mt-4">
						<div class="col-lg-7 mb-lg-0 mb-4">
							<div class="card z-index-2 h-100">
								<div class="card-header pb-0 pt-3 bg-transparent">
									<h6 class="text-capitalize">Nilai Responden</h6>
									<p class="text-sm mb-0">
										<i class="fa fa-arrow-up text-success"></i>
										<span class="font-weight-bold">4% more</span> in 2021
									</p>
								</div>
								<div class="card-body p-3">
									<div class="chart">
										<canvas id="chart-line" class="chart-canvas" height="300"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-5">
							<div class="card card-carousel overflow-hidden h-100 p-0">
								<h3>Isinya Chart Nanti</h3>
							</div>
						</div>
					</div>
	</main>
</div>

<!-- Modal Ganti Session -->
<div class="modal fade" id="sesiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Sesi</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('dashboard/updateSesi') ?>" method="post">
				<div class="modal-body">
					<select name="sesi" class="form-control">
						<option value="-1" selected disabled>Pilih Sesi</option>
						<?php 
						foreach ($listSesi as $key => $value) { ?>
							<option value="<?=$value->ID?>"><?=$value->NAMA?></option>
						<?php }
						?>
					</select>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Ganti Sesi</button>
				</div>
			</form>
		</div>
	</div>
</div>
