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
			<div class="row">
				<div class="col-lg-15">
					<div class="card card-carousel overflow-hidden h-100 p-0">
						<?php 
							if ($sesiAktif) {
								echo "<h4 style='text-align: center;'>".$sesiAktif->NAMA."</h4>";
								echo "<h5 style='text-align: center;'>".$sesiAktif->MULAI." - ".$sesiAktif->AKHIR."</h5>";
							}else{
								echo "<h4 style='text-align: center;'>Tidak Ada Session Yang Sedang Aktif</h4>";
								echo "<h5 style='text-align: center;'>Pilih Session Terlebih Dahulu</h5>";
							}  
						?>
						<!-- <h4 style="text-align: center;">Session 1</h4>
						<h5 style="text-align: center;">2 Februari 2023 - 2 Maret 2023</h5> -->
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="d-flex justify-content-between">
				<div class="col-5 border rounded shadow-sm p-4">
					<div class="row">
						<div class="col">
							<h4>Laporan Grade</h4>
						</div>
						<div class="col text-end">
							<select id="filterGrade" class="form-control">
								<option value="">Semua Divisi</option>
								<?php foreach ($divisi as $key => $value) { ?>
									<option value="<?= $value->ALIAS ?>"><?= $value->NAMA ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="spinner-border" role="status" id="loadingGrade"></div>
					</div>
					<hr>
					<div id="chartGrade" style="height: 370px; width: 100%;"></div>
				</div>
				<div class="col-5 border rounded shadow-sm p-4">
					<div class="row">
						<div class="col">
							<h4>Laporan Completion</h4>
						</div>
						<div class="col text-end">
							<select name="" id="" class="form-control">
								<option value="">Semua Divisi</option>
							</select>
						</div>
					</div>
					<hr>
					<div id="chartCompletion" style="height: 370px; width: 100%;"></div>
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

<script>
	$('#filterGrade').on('change', (e) => {
		let divisi = e.target.value;
		console.log(divisi);

		generateLaporanGrade(divisi)
	})

	generateLaporanGrade = (divisi = "") => {
		showLoadingGrade(true);
		let sesi = "<?= $sesiAktif->ID ?>";

		let req = new Request(`<?= base_url() ?>api/laporan?type=grade&sesi=${sesi}&divisi=${divisi}`);
		fetch(req)
			.then((res) => res.json())
			.then((res) => {
				showLoadingGrade(false);
				console.log(res)

				let dataPoint = [];
				res.data.forEach(element => {
					dataPoint.push({name: `Point ${element.name}`, y: element.value});
				});

				let chartTitle = "Laporan Grade Semua Divisi";
				if (divisi) {
					chartTitle = `Laporan Grade Divisi ${divisi}`;
				}
				
				var chart = new CanvasJS.Chart("chartGrade", {
					exportEnabled: true,
					animationEnabled: true,
					title:{
						text: chartTitle
					},
					legend:{
						cursor: "pointer",
						itemclick: explodePie
					},
					data: [{
						type: "pie",
						showInLegend: true,
						toolTipContent: "{name}: <strong>{y}x</strong>",
						indexLabel: "{name}: {y}x",
						dataPoints: dataPoint
					}]
				});
				chart.render();
			})
	}

	function explodePie (e) {
		if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
			e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
		} else {
			e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
		}
		e.chart.render();
	}

	showLoadingGrade = (status) => {
		if (status) {
			$('#loadingGrade').show();
		}else {
			$('#loadingGrade').hide();
		}
	}

	generateLaporanGrade();
</script>
