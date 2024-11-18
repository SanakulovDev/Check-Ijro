<?php


?>
<div class="row d-flex align-items-center justify-content-between">
    <div class="col-md-3 sidebar">
        <?= $this->render('sidebar.php', ['model'   =>  $model, 'pdfUrl'   =>  $pdfUrl]);?>
    </div> 
    <div class="col-md-7 text-right">
        <div class="pdf-page">
        <iframe src="<?= $pdfUrl ?>#toolbar=0&navpanes=0&scrollbar=0" 
            width="70%" 
            height="100%" 
            style="border: none; min-height: 700px;">

        </iframe>
        </div>
    </div>
</div>



