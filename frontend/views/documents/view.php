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
        height: calc(100% - 20px);
        overflow-y: auto;
    }
    #sidebar.active {
        left: 0;
    }
    /* Asosiy kontent */
    #content {
        transition: all 0.3s;
        margin-left: 0;
        padding-top: 0px; /* Navbar balandligi */
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
    #content{
        margin-left: 0;
        overflow-y: auto;
    }
    

    /* PDF konteynerini markazlashtirish uchun uslublar */
    /* PDF konteynerini moslashuvchan qilish */
    .pdf-container {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa; /* Orqa fon (optional) */
        overflow: auto;
        max-height: calc(100vh - 20px);
         /* Ekran balandligini to‘liq olish */
    }

    /* Canvasni barcha ekranlar uchun markazlash va responsiv qilish */
    #pdfCanvas {
        max-width: 100%; /* Kenglikni maksimal qilish */
        height: auto; /* Proportsiyani saqlash */
        margin: auto; /* Markazlashtirish */
        display: block; /* Elementni blok holatiga o'tkazish */
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    /* Mobil ekranlar uchun maxsus moslashtirish */
    @media (max-width: 768px) {
        .font-medium{
            color: grey;
            font-weight: 700;
        }
        .pdf-container {
            padding: 10px; /* Mobil ekranda biroz bo‘sh joy qo‘shish */
        }
        #pdfCanvas {
            max-width: 85%; /* Mobil ekranda kengroq */
            height: auto; /* Aspect ratio saqlash */
        }
    }

    @media (min-width: 768px) {

        .navbar-text {
            display: inline;
        }
        #sidebar{
            left: 0px;
            /* font-size: 20px; */
        }
        #sidebar.active{
            left: -350px;

            
        }
        #sidebar.active + #content {
            margin-left: 0;
        }
        #content{
            margin-left: 370px;
        }
        #pdfCanvas {
            max-width: 75%; /* Desktop uchun kenglik */
            height: auto;
        }
    }

</style>

    <!-- Sidebar -->
        <?= $this->render('sidebar.php', ['model' => $model, 'pdfUrl' => $pdfUrl]); ?>
    

    <!-- PDF qismi -->
        <div id="content" class=" text-right pdf-container mt-5" style="background-color: #E5EEF9;">
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

            pdf.getPage(1).then(function(page) {
                console.log('1-sahifa yuklandi.');

                var scale = 2.0; // PDF ni kattalashtirish
                var viewport = page.getViewport({ scale: scale });
                var canvas = document.getElementById('pdfCanvas');
                var context = canvas.getContext('2d');

                canvas.height = viewport.height;
                canvas.width = viewport.width;

                console.log('Canvas o‘lchamlari:', canvas.height, canvas.width);

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
