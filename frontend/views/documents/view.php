<?php


?>
<div class="row d-flex align-items-center justify-content-between">
    <div class="col-md-3">
        <?= $this->render('sidebar.php', ['model'   =>  $model]);?>
    </div> 
    <div class="col-md-9 text-right">
        <div class="pdf-page">
        <iframe src="<?= $pdfUrl ?>#toolbar=0&navpanes=0&scrollbar=0" 
            width="70%" 
            height="100%" 
            style="border: none; min-height: 90vh;">
        </div>
    </div>
</div>

