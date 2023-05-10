<div class="p-3 w-100">
    <h1 class="text-center fw-bold">Menjawab Survey <?= $divisi->NAMA ?></h1>
    <br>
    <div id="body"></div>
    
    <br>
    <button class="btn btn-primary mx-4" id="submit">Kirim Jawaban Survey</button>
</div>

<!-- Toast -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="myToast" class="toast hide bg-primary text-white" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Bootstrap</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" id="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>
<script>
    let data = [];

    getPertanyaan = () => {
        let req = new Request('<?= base_url()."/api/pertanyaan?profile=$profile->ID" ?>')
        fetch(req)
            .then((res) => res.json())
            .then((res) => {
                console.log(res);
                data = addInitialValues(res.data);

                renderToTable()
            })
    }

    addInitialValues = (arr) => {
        arr.forEach(element => {
            element.GRADE = 0
            element.SARAN = ""
        });

        return arr;
    }

    renderToTable = () => {
        console.log(data);

        let result = ""
        data.forEach(element => {
            result += 
            `
            <div class="mx-4 my-3">
                <h3><b>${element.TEXT}</b></h3>
                <div class="row w-50 my-2">
                    <div class="col"><input type="radio" class="radio" name="${element.ID}" value="1"> 1 </div>
                    <div class="col"><input type="radio" class="radio" name="${element.ID}" value="2"> 2 </div>
                    <div class="col"><input type="radio" class="radio" name="${element.ID}" value="3"> 3 </div>
                    <div class="col"><input type="radio" class="radio" name="${element.ID}" value="4"> 4 </div>
                    <div class="col"><input type="radio" class="radio" name="${element.ID}" value="5"> 5 </div>
                </div>
                kritik dan saran : 
                <textarea name="${element.ID}" class="form-control textarea" cols="30" rows="2"></textarea>
            </div>
            <br>
            `
        });

        $('#body').html(result);
    }

    getPertanyaan()

    // Radio Button Change
    $(document).on('change', '.radio', (e) => {
        const target = e.target;
        const name = target.getAttribute('name');
        const value = target.value;

        const idx = data.findIndex(obj => {
            return obj.ID === name
        })

        if (idx > -1) {
            data[idx].GRADE = value;
        }
    })

    // Textarea Change
    $(document).on('keyup', '.textarea', (e) => {
        const target = e.target;
        const name = target.getAttribute('name');
        const value = target.value;

        const idx = data.findIndex(obj => {
            return obj.ID === name
        })
        
        if (idx > -1) {
            data[idx].SARAN = value;
        }
        console.log(data);
    }) 

    $('#submit').click(() => {
        const nullData = data.findIndex(obj => obj.GRADE === 0)
        if (nullData > -1) {
            alert('Semua Quiz Harus Terisi')
            return;
        }

        let body = new FormData();
        body.append('data', JSON.stringify(data));
        body.append('profile', <?= $profile->ID ?>);
        body.append('user', <?= $this->session->login->ID ?>);

        let req = new Request('<?= base_url()."api/response" ?>' , {
            method: "POST",
            body: body
        })
        fetch(req)
            .then((res) => res.text())
            .then((res) => {
                console.log(res)

                if (res.error) {
                    alert(`Tidak berhasil kirim Survey, Silahkan ulagi lagi \n Error : ${res.message}`);
                }else{
                    alert("Survey Diterima, Terima Kasih Sudah Mengisi Survey Tepat Waktu");
                    window.location.href = "<?= base_url().'responden' ?>"
                }
            })
    })
</script>