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
			<div class="row mb-2">
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="container-fluid py-1 px-3">
						<nav aria-label="breadcrumb">
							<h3 class="font-weight-bolder text-black mb-0">Session Yang Dipilih</h3>
						</nav>
					</div>
				</div>
				<div class="col">
					<button style="border-radius: 7px; border: #004882; float:right; background-color:#004882; color:white;" data-bs-toggle="modal" data-bs-target="#sesiModal" class="p-2">Pilih Session</button>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-15">
					<div class="card card-carousel overflow-hidden h-100 p-0">
						<?php 
							if ($sesiAktif) {
								echo "<h2 style='text-align: center; color:#004882'>".$sesiAktif->NAMA."</h2>";
								echo "<h5 style='text-align: center;'>".$sesiAktif->MULAI." - ".$sesiAktif->AKHIR."</h5>";
							}else{
								echo "<h2 style='text-align: center; color:#004882'>Tidak Ada Session Yang Sedang Aktif</h2>";
								echo "<h5 style='text-align: center;'>Pilih Session Terlebih Dahulu</h5>";
							}  
						?>
					</div>
				</div>
			</div>
		</div>
		<!-- Laporan Part -->
		<div class="container-fluid py-2">
			<h3 class="px-3 font-weight-bolder text-black mb-0">Laporan Survey</h3>
		</div>
		<div class="container-fluid">
			<div class="d-flex justify-content-between">
				<?php if ($sesiAktif) { ?>
					<div class="col-5 border rounded shadow-sm p-4">
						<div class="row">
							<div class="col">
								<h4>Laporan Nilai</h4>
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
						<button class="btn btn-outline-primary" id="btnExcelGrade">Buat Excel</button>
					</div>
					<div class="col-5 border rounded shadow-sm p-4">
						<div class="row">
							<div class="col">
								<h4>Laporan Completion</h4>
							</div>
							<div class="col text-end">
								<select name="" id="" class="form-control">
									<option value="">Semua Divisi</option>
									<?php foreach ($divisi as $key => $value) { ?>
										<option value="<?= $value->ALIAS ?>"><?= $value->NAMA ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="spinner-border" role="status" id="loadingCompletion"></div>
						</div>
						<hr>
						<div id="chartCompletion" style="height: 370px; width: 100%;"></div>
					</div>
				<?php } else { ?>
					<div class="col border rounded shadow-sm p-4">
						<h3 style="color: red;">
							Laporan tidak dapat di muat, Silahkan pilih Session Terlebih Dahulu
						</h3>
					</div>
				<?php } ?>
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
	const sesi = "<?= $sesiAktif->ID ?? "" ?>";
	let divisiGrade = "";
	let divisiGradeNama = "";
	let dataExcelGrade = [];

	$('#filterGrade').on('change', (e) => {
		divisiGrade = e.target.value;
		divisiGradeNama = e.target.getAttribute('teks');
		generateLaporanGrade()
	})

	$('#btnExcelGrade').on('click', (e) => {
		console.log('generating excel..')
		// var data = [
		// 	["Nama", "Email"],
		// 	["Joa Doe", "joa@doe.com"],
		// 	["Job Doe", "job@doe.com"],
		// 	["Joe Doe", "joe@doe.com"],
		// 	["Jon Doe", "jon@doe.com"],
		// 	["Joy Doe", "joy@doe.com"]
		// ];

		let namaFile = "Semua Divisi"
		if (divisiGrade != ""){
			namaFile = divisiGrade;
		}

		var workbook = XLSX.utils.book_new(),
    		worksheet = XLSX.utils.aoa_to_sheet(dataExcelGrade);
		workbook.SheetNames.push(namaFile);
		workbook.Sheets[namaFile] = worksheet;

		XLSX.writeFile(workbook, `LaporanGrade ${namaFile} .xlsx`);
	})

	generateLaporanGrade = () => {
		showLoadingGrade(true);
		if (sesi == "") {
			console.log('no sesi');
			return;
		}

		let req = new Request(`<?= base_url() ?>api/laporan?type=grade&sesi=${sesi}&divisi=${divisiGrade}`);
		fetch(req)
			.then((res) => res.json())
			.then((res) => {
				showLoadingGrade(false);

				let dataPoints = [];
				dataExcelGrade = [];
				res.data.forEach(element => {
					console.log(element)
					// Hanya tampilkan data Point kedalam chart yang valuenya (skornya) lebih dari 0
					dataPoints.push({label: `Nilai ${element.name}`, y: element.value});
					if (element.value > 0) {
					}

					//fillExcelData
					// Excel Data tidak ada filter, karena di excel akan ditampilkan nilai asli
					// setiap point (5,4,3,2,1)
					dataExcelGrade.push([`Point ${element.name}`, `${element.value}`]);
				});

				// let chartTitle = "Laporan Nilai Semua Divisi";
				// if (divisiGrade != "") {
				// 	chartTitle = `Laporan Nilai Divisi ${divisiGrade}`;
				// }

				var chart = new CanvasJS.Chart("chartGrade", {
					animationEnabled: true,
					theme: "light2", // "light1", "light2", "dark1", "dark2"
					title: {
						text: ""
					},
					axisY: {
						title: "Jumlah",
					},
					axisX: {
						title: "Nilai"
					},
					data: [{
						type: "column",
						yValueFormatString: "#,##0.0#\"%\"",
						dataPoints: dataPoints
					}]
				});
				chart.render();
				
				
			})
	}

	generateLaporanCompletion = () => {
		var chart = new CanvasJS.Chart("chartCompletion", {
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
