<?php 
	$sesi = $this->session->sesi;
?>
<div class="p-3 w-100">
    <h1 class="mb-3">Dashboard</h1>
    <div class="w-100 text-center p-3 shadow rounded mb-4">
        <span class="fw-bold">Survey Aktif</span>
        <h2 class="text-primary"><?= $sesi->NAMA ?></h2>
    </div>
</div>