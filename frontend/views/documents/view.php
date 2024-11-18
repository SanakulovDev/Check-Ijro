<?php


?>
<div class="row d-flex justify-content-between">
    <!-- Sidebar -->
    <div class="col-md-3 col-sm-0 sidebar d-none d-md-block"> <!-- Sidebar faqat katta ekranlarda ko'rinadi -->
        <?= $this->render('sidebar.php', ['model' => $model, 'pdfUrl' => $pdfUrl]); ?>
    </div>

    <!-- PDF qismi -->
    <div class="col-md-9 col-sm-12 text-right bg-secondary pdf-container">
        <div class="pdf-page" style="height: 100vh; overflow-y: auto;">
            <object data="<?= $pdfUrl ?>#zoom=150&toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="100%">
                <p>PDF faylni yuklab olish uchun <a href="<?= $pdfUrl ?>">bu yerga bosing</a>.</p>
            </object>
        </div>
        <!-- <div class="pdf-page">
            <iframe src="<?php // $pdfUrl ?>#zoom=150&toolbar=0&navpanes=0&scrollbar=0" 
                width="100%" 
                height="100%" 
                style="border: none; height: calc(100vh - 20px); width: 100%;">
            </iframe>
        </div> -->
    </div>
</div>

<style>
/* Mobil qurilmalarda sidebar yashirish */
@media (max-width: 768px) {
    .sidebar {
        display: none; /* Sidebar mobilda ko'rinmaydi */
    }

    .pdf-container {
        width: 100%; /* PDF qismi butun oynani egallaydi */
    }

    .pdf-container .pdf-page iframe {
        height: calc(100vh - 10px); /* PDF qismi maksimal balandlikda */
        width: 100%; /* PDF qismi to‘liq kenglikni egallaydi */
    }
}
</style>
