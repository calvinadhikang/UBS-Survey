<div class="p-3 w-100">
    <h1>Menjawab Survey <?= $divisi->NAMA ?></h1>
    <form action="<?= base_url('survey/submit') ?>" method="post">
    <input type="hidden" name="profile" value="<?= $profile->ID ?>">
    <?php
    foreach ($pertanyaan as $key => $value) { ?>
        <div class="mx-4 my-3">
            <p><b><?= $value->TEXT ?></b></p>
            <div class="row w-50 my-2">
                <div class="col"><input type="radio" name="<?= $value->ID ?>"> 1 </div>
                <div class="col"><input type="radio" name="<?= $value->ID ?>"> 2 </div>
                <div class="col"><input type="radio" name="<?= $value->ID ?>"> 3 </div>
                <div class="col"><input type="radio" name="<?= $value->ID ?>"> 4 </div>
                <div class="col"><input type="radio" name="<?= $value->ID ?>"> 5 </div>
            </div>
    
            <textarea name="" class="form-control" cols="30" rows="2">

            </textarea>
        </div>
        <br>
    <?php } ?>
    <br>
    <button class="btn btn-primary mx-4">Submit</button>
    </form>
</div>