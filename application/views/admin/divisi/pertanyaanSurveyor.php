<div id="layoutSidenav_content">
	<main class="main-content position-relative border-radius-lg ">
        <div class="row mx-4">
            <h1>Tambah Pertanyaan Untuk</h1>
        </div>
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
			</div>
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
										<tbody id="body">
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

                <!-- Btn Submit -->
                <button class="p-2" style="border-radius: 7px; border: #004882; float:right; background-color:#004882; color:white;" id="btnSubmit">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span>
                    <span id="btnText">Simpan Pertanyaan</span>
                </button>
			</div>
        </div>
	</main>
</div>

<script>
    let data = [];

    isLoading = (flag) => {
        let spinner = $('#spinner')
        let txt = $('#btnText')
        let btn = $('#btnSubmit')
        btn.prop('disabled', flag)

        if (flag) {
            spinner.show()
            txt.html("Loading..")
        }else{
            spinner.hide()
            txt.html("Simpan Pertanyaan")
        }
    }
    isLoading(false)

    fetchPertanyaanProfile = () => {
        let req = new Request("<?= base_url()."api/pertanyaan/surveyor?profile=$profile->ID" ?>")
        fetch(req)
        .then((resp) => resp.json())
        .then((resp) => {
            data = resp.data
            
            renderToTable()
        })
        
        console.log(data)
    }

    // Ini Harus ada.. karena kita mau overide funsgi DataTable yang di footer
    //Datatable yang disini, punya kelebihan yaitu menentukan dataSource (aaData)
    //Sehingga ketika search, data tidak hilang
    $(document).ready(function() {
        $('#example').dataTable({      
            "aaData" : data,
        });
    });

    renderToTable = () => {
        let result = ""
        data.forEach(element => {

            let check = ""
            if (element.CHECK) {
                check = "checked"
            }

            result += 
            `
            <tr>
                <td>
                    <div class="d-flex px-3 py-1">
                        <p class="text-xs font-weight-bold mb-0">${element.ID}</p>
                    </div>
                </td>
                <td>
                    <span class="text-secondary text-xs font-weight-bold">${element.TEXT}</span>
                </td>
                <td class="align-middle text-center">
                    <input type="checkbox" class="form-input checkbox" id=${element.ID} ${check}>
                </td>
            </tr>
            `
        });

        document.getElementById('body').innerHTML = result;
    }

    fetchPertanyaanProfile()

    $(document).on('change', '.checkbox', (e) => {
        let id = e.target.getAttribute('id');
        let status = e.target.checked;
        console.log(id)
        console.log(status)
        
        data.forEach(element => {
            if (element.ID == id) {
                element.CHECK = status
            }
        });

        console.log(data)
    });

    $(document).on('click', '#btnSubmit', (e) => {
        e.preventDefault()
        isLoading(true)

        let sendData = data.filter((e) => e.CHECK == true)

        let formData = new FormData();
        formData.append("data", JSON.stringify(sendData));
        formData.append("profile", <?= $profile->ID ?>);

        let req = new Request("<?= base_url()."api/pertanyaan/surveyor" ?>", {
            method: 'POST',
            body: formData
        })

        fetch(req)
            .then((resp) => resp.json())
            .then((resp) => {
                isLoading(false)

                console.log(resp)
                // Href ke halaman sebelumyna
                if (!resp.error) {
                    window.location.href = "<?= base_url()."divisi/detail/surveyor?surveyor=$tanya->ALIAS&target=$ditanya->ALIAS" ?>"
                }
            })
    })
</script>