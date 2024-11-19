<?php


?>
<style>
    /* Sidebar uchun maxsus uslub */
    #sidebar {
        position: fixed;
        left: -350px;
        top: 60px;
        /* Navbar balandligi */
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
        padding-top: 0px;
        /* Navbar balandligi */
    }

    #sidebar.active+#content {
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

    #content {
        margin-left: 0;
        overflow-y: auto;
    }


    /* PDF konteynerini moslashuvchan qilish */

    /* .pdf-container {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa;
        overflow: auto;
        max-height: calc(100vh - 20px);
    } */
    .pdf-container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        /* Yuqoridan boshlash */
        /* background-color: #E5EEF9; */
        /* Fon rang */
        overflow-y: auto;
        /* Scroll qo‘shish */
        height: calc(100vh - 20px);
        /* Ekran balandligini to‘liq qamrab olish */
        padding: 10px;
        /* Kichik bo‘sh joy */
        box-sizing: border-box;
        /* Paddingni ichki hisoblash */
    }

    /* Canvasni barcha ekranlar uchun markazlash va responsiv qilish */
    #pdfCanvas {
        max-width: 100%;
        /* Kenglikni maksimal qilish */
        height: auto;
        /* Proportsiyani saqlash */
        margin: auto;
        /* Markazlashtirish */
        display: block;
        /* Elementni blok holatiga o'tkazish */
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-top: 0;
    }

    /* Mobil ekranlar uchun maxsus moslashtirish */
    @media (max-width: 768px) {
        .font-medium {
            color: grey;
            font-weight: 700;
        }

        .pdf-container {
            padding: 10px;
            /* Mobil ekranda biroz bo‘sh joy qo‘shish */
        }

        #pdfCanvas {
            max-width: 85%;
            /* Mobil ekranda kengroq */
            height: auto;
            /* Aspect ratio saqlash */
        }
    }

    @media (min-width: 768px) {

        .navbar-text {
            display: inline;
        }

        #sidebar {
            left: 0px;
            /* font-size: 20px; */
        }

        #sidebar.active {
            left: -350px;


        }

        #sidebar.active+#content {
            margin-left: 0;
        }

        #content {
            margin-left: 370px;
        }

        #pdfCanvas {
            max-width: 75%;
            /* Desktop uchun kenglik */
            height: auto;
        }
    }



    /* Not found view */
    .not-found-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: calc(100vh - 100px);
        /* Ekran balandligini qoplash */
        text-align: center;
        background-color: #f8f9fa;
        /* Orqa fon */
        color: #333;
        padding: 20px;
        box-sizing: border-box;
    }

    .not-found-container h1 {
        font-size: 120px;
        margin: 0;
        color: #ff6b6b;
        /* Qizil rang */
    }

    .not-found-container p {
        font-size: 18px;
        margin: 10px 0;
        color: #555;
    }

    .go-home-btn {
        display: inline-block;
        margin-top: 0px;
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .go-home-btn:hover {
        background-color: #0056b3;
    }

    .not-found-icon {
        margin-bottom: 15px;
        color: #4A5568;
        /* Pochta ikonka uchun quyuq kulrang */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .not-found-icon svg {
        stroke: #4A5568;
        /* SVG ikonka uchun rang */
    }
</style>
<?php if ($model): ?>
    <!-- Sidebar -->
    <?= $this->render('sidebar.php', ['model' => $model, 'pdfUrl' => $pdfUrl]); ?>


    <!-- PDF qismi -->
    <div id="content" class=" text-right pdf-container mt-5" style="background-color: #E5EEF9;">
        <!-- <embed src="<?php //echo $pdfUrl 
                            ?>#zoom=150&toolbar=0&navpanes=0&scrollbar=0"  width="100%" 
                    height="100%" 
                    style="border: none; height: calc(100vh - 20px); width: 100%;" type="application/pdf"> -->
        <canvas id="pdfCanvas" width="80%" height="80%"></canvas>

    </div>
<?php else: ?>
    <div class="pdf-container">
    <div class="flex flex-col items-center w-full pt-10 ng-star-inserted"><svg fill="#1e293b" viewBox="0 0 32 32" x="0" y="2744" preserveAspectRatio="xMidYMid meet" focusable="false" class="max-w-30">
            <path d="M15.467 24.267h-14.933c-0.294 0-0.533-0.24-0.533-0.533v-12.933c0-4.337 3.588-7.867 8-7.867s8 3.529 8 7.867v12.933c0 0.293-0.239 0.533-0.533 0.533zM1.067 23.2h13.867v-12.4c0-3.749-3.11-6.8-6.933-6.8s-6.933 3.050-6.933 6.8v12.4z"></path>
            <path d="M31.467 24.267h-16.533c-0.294 0-0.533-0.24-0.533-0.533s0.239-0.533 0.533-0.533h16v-12.4c0-3.686-3.211-6.8-7.012-6.8h-15.388c-0.294 0-0.533-0.239-0.533-0.533s0.239-0.533 0.533-0.533h15.388c4.379 0 8.079 3.602 8.079 7.867v12.933c0 0.293-0.24 0.533-0.533 0.533z"></path>
            <path d="M29.333 15.733h-3.2c-0.293 0-0.533-0.239-0.533-0.533v-5.333c0-0.294 0.24-0.533 0.533-0.533h3.2c0.293 0 0.533 0.239 0.533 0.533v5.333c0 0.294-0.24 0.533-0.533 0.533zM26.667 14.667h2.133v-4.267h-2.133v4.267z"></path>
            <path d="M26.667 10.4h-7.467c-0.293 0-0.533-0.239-0.533-0.533s0.24-0.533 0.533-0.533h7.467c0.293 0 0.533 0.239 0.533 0.533s-0.24 0.533-0.533 0.533z"></path>
            <path d="M11.733 21.067h-7.467c-0.294 0-0.533-0.24-0.533-0.533s0.239-0.533 0.533-0.533h7.467c0.294 0 0.533 0.24 0.533 0.533s-0.239 0.533-0.533 0.533z"></path>
            <path d="M19.733 29.067c-0.293 0-0.533-0.24-0.533-0.533v-4.267h-5.333v4.267c0 0.293-0.239 0.533-0.533 0.533s-0.533-0.24-0.533-0.533v-4.8c0-0.293 0.239-0.533 0.533-0.533h6.4c0.293 0 0.533 0.24 0.533 0.533v4.8c0 0.293-0.24 0.533-0.533 0.533z"></path>
        </svg>
        <h1 class="text-center text-2xl"> Ҳужжат топилмади </h1>
    </div>
    </div>
    <!-- Not found content-->
    <!-- <div class="not-found-container">
            <div class="not-found-icon">
            <svg fill="#1e293b" viewBox="0 0 32 32" x="0" y="2744" preserveAspectRatio="xMidYMid meet" focusable="false" class="max-w-30"><path d="M15.467 24.267h-14.933c-0.294 0-0.533-0.24-0.533-0.533v-12.933c0-4.337 3.588-7.867 8-7.867s8 3.529 8 7.867v12.933c0 0.293-0.239 0.533-0.533 0.533zM1.067 23.2h13.867v-12.4c0-3.749-3.11-6.8-6.933-6.8s-6.933 3.050-6.933 6.8v12.4z"></path><path d="M31.467 24.267h-16.533c-0.294 0-0.533-0.24-0.533-0.533s0.239-0.533 0.533-0.533h16v-12.4c0-3.686-3.211-6.8-7.012-6.8h-15.388c-0.294 0-0.533-0.239-0.533-0.533s0.239-0.533 0.533-0.533h15.388c4.379 0 8.079 3.602 8.079 7.867v12.933c0 0.293-0.24 0.533-0.533 0.533z"></path><path d="M29.333 15.733h-3.2c-0.293 0-0.533-0.239-0.533-0.533v-5.333c0-0.294 0.24-0.533 0.533-0.533h3.2c0.293 0 0.533 0.239 0.533 0.533v5.333c0 0.294-0.24 0.533-0.533 0.533zM26.667 14.667h2.133v-4.267h-2.133v4.267z"></path><path d="M26.667 10.4h-7.467c-0.293 0-0.533-0.239-0.533-0.533s0.24-0.533 0.533-0.533h7.467c0.293 0 0.533 0.239 0.533 0.533s-0.24 0.533-0.533 0.533z"></path><path d="M11.733 21.067h-7.467c-0.294 0-0.533-0.24-0.533-0.533s0.239-0.533 0.533-0.533h7.467c0.294 0 0.533 0.24 0.533 0.533s-0.239 0.533-0.533 0.533z"></path><path d="M19.733 29.067c-0.293 0-0.533-0.24-0.533-0.533v-4.267h-5.333v4.267c0 0.293-0.239 0.533-0.533 0.533s-0.533-0.24-0.533-0.533v-4.8c0-0.293 0.239-0.533 0.533-0.533h6.4c0.293 0 0.533 0.24 0.533 0.533v4.8c0 0.293-0.24 0.533-0.533 0.533z"></path></svg>
            </div>
            <p>Hujjat topilmadi</p>
            <a href="/" class="go-home-btn">Bosh sahifaga qaytish</a>
        </div> -->
<?php endif; ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="/js/pdf.min.js"></script>
<script>
    var url = 'https://mozilla.github.io/pdf.js/web/compressed.tracemonkey-pldi-09.pdf';
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';
    var loadingTask = pdfjsLib.getDocument("<?= $pdfUrl ?>");
    loadingTask.promise.then(function(pdf) {

        pdf.getPage(1).then(function(page) {
            console.log('1-sahifa yuklandi.');

            var scale = 2.0; // PDF ni kattalashtirish
            var viewport = page.getViewport({
                scale: scale
            });
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