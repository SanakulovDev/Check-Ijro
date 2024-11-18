<?php


?>
<style>
    /* Sidebar uchun maxsus uslub */
    #sidebar {
        position: fixed;
        left: -350px;
        top: 60px; /* Navbar balandligi */
        width: 350px;
        background: #fff;
        color: #222;
        transition: all 0.3s;
        height: calc(100% - 56px);
        overflow-y: auto;
    }
    #sidebar.active {
        left: 0;
    }
    /* Asosiy kontent */
    #content {
        transition: all 0.3s;
        margin-left: 0;
        padding-top: 56px; /* Navbar balandligi */
    }
    #sidebar.active + #content {
        margin-left: 350px;
    }
    /* Navbar uslubi */
    .navbar {
        margin-bottom: 0;
    }
    /* Kichik ekranlarda navbar matnini yashirish */
    .navbar-text {
        display: none;
    }
    @media (min-width: 768px) {
        .navbar-text {
            display: inline;
        }
        #sidebar{
            left: 0px;
        }
        #sidebar.active{
            left: -350px;
        }
    }

    /* PDF konteynerini markazlashtirish uchun uslublar */
    /* PDF konteynerini moslashuvchan qilish */
    .pdf-container {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa; /* Orqa fon (optional) */
        overflow: hidden;
        height: 100vh; /* Ekran balandligini to‘liq olish */
    }

    /* Canvasni barcha ekranlar uchun markazlash va responsiv qilish */
    #pdfCanvas {
        max-width: 100%; /* Kenglikni ekranga moslashtirish */
        max-height: 100%; /* Balandlikni ekranga moslashtirish */
        width: auto; /* Aspect ratio-ni saqlash */
        height: auto; /* Aspect ratio-ni saqlash */
    }

    /* Mobil ekranlar uchun maxsus moslashtirish */
    @media (max-width: 768px) {
        .pdf-container {
            padding: 10px; /* Mobil ekranda biroz bo‘sh joy qo‘shish */
        }
        #pdfCanvas {
            max-width: 90%; /* Kenglikni moslashtirish */
            max-height: 80%; /* Balandlikni moslashtirish */
        }
    }

</style>

    <!-- Sidebar -->
        <?= $this->render('sidebar.php', ['model' => $model, 'pdfUrl' => $pdfUrl]); ?>
    

    <!-- PDF qismi -->
        <div id="content" class=" text-right bg-light pdf-container p-0">
                <!-- <embed src="<?php //echo $pdfUrl ?>#zoom=150&toolbar=0&navpanes=0&scrollbar=0"  width="100%" 
                    height="100%" 
                    style="border: none; height: calc(100vh - 20px); width: 100%;" type="application/pdf"> -->
            <canvas id="pdfCanvas" width="80%" height="80%"></canvas>

        </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="/js/pdf.min.js"></script>
<script>
        var url = 'https://mozilla.github.io/pdf.js/web/compressed.tracemonkey-pldi-09.pdf';
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';
        var loadingTask = pdfjsLib.getDocument("<?=$pdfUrl?>");
        loadingTask.promise.then(function(pdf) {
            console.log('PDF yuklandi, jami sahifalar soni:', pdf.numPages);

            pdf.getPage(1).then(function(page) {
                console.log('1-sahifa yuklandi.');

                var viewport = page.getViewport({ scale: 1.5 });
                var canvas = document.getElementById('pdfCanvas');
                var context = canvas.getContext('2d');

                canvas.height = viewport.height;
                canvas.width = 900;

                console.log(canvas.height);
                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
            });
        }).catch(function(error) {
            console.error('PDF yuklashda xatolik:', error);
        });
    </script>
