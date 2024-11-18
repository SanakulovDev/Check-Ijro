<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap5\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
    
        #loader {
            display: flex;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #0d1117; /* Qorong'i fon rangi */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader-container {
            text-align: center;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }

        .loader-logo {
            width: 150px; /* Logotip o'lchami */
            height: auto;
            margin-bottom: 20px;
        }

        .loader-spinner {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: block;
            margin:15px auto;
            position: relative;
            color: #FFF;
            left: -100px;
            box-sizing: border-box;
            animation: shadowRolling 2s linear infinite;
        }

        @keyframes shadowRolling {
            0% {
                box-shadow: 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
            }
            12% {
                box-shadow: 100px 0 white, 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
            }
            25% {
                box-shadow: 110px 0 white, 100px 0 white, 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
            }
            36% {
                box-shadow: 120px 0 white, 110px 0 white, 100px 0 white, 0px 0 rgba(255, 255, 255, 0);
            }
            50% {
                box-shadow: 130px 0 white, 120px 0 white, 110px 0 white, 100px 0 white;
            }
            62% {
                box-shadow: 200px 0 rgba(255, 255, 255, 0), 130px 0 white, 120px 0 white, 110px 0 white;
            }
            75% {
                box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 130px 0 white, 120px 0 white;
            }
            87% {
                box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 130px 0 white;
            }
            100% {
                box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0);
            }
        }

        @media (max-width: 768px) { /* Mobil qurilmalar uchun */
            
        }
           

        .hidden-logo {
            display: none !important;
        }

    </style>

    <?php $this->registerCsrfMetaTags() ?>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
</head>
<?php
$isHuman = Yii::$app->session->get('isHuman') || Yii::$app->request->cookies->getValue('isHuman');
?>
<body class="d-flex flex-column h-100 <?= $isHuman ? '' : 'recaptcha-active' ?> bg-light">
    <?php $this->beginBody() ?>
    <!-- reCAPTCHA Overlay -->
    <div id="recaptcha-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: #fff; z-index: 9999; display: flex; align-items: center; justify-content: center;">
        <div id="recaptcha-container">
            <div id="recaptcha"></div>
        </div>
    </div>

    <div id="loader">
        <div class="loader-container">
            <img src="/img/Emblem_of_Uzbekistan.svg" alt="Logo" class="loader-logo">
            <div class="loader-spinner">
            </div>
        </div>
    </div>

        

    <?php
    $img =  '/img/Emblem_of_Uzbekistan.svg';
    ?>
    <div class="relative bg-white flex flex-0 items-center w-full h-30 sm:h-20 px-4 md:px-6 z-49 shadow dark:shadow-none dark:border-b bg-card dark:bg-transparent print:hidden">
        <div class="flex items-center gap-2 lg:mr-8">
            <button mat-icon-button="" class="mat-focus-indicator mat-icon-button mat-button-base" id="toggleButton">
                <span class="mat-button-wrapper">
                    <mat-icon role="img" svgicon="feather:menu" class="mat-icon notranslate mat-icon-no-color" aria-hidden="true" data-mat-icon-type="svg" data-mat-icon-name="menu" data-mat-icon-namespace="feather">
                        <svg x="384" y="288" viewBox="0 0 24 24" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                            <path fill="none" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" d="M3 12h18M3 6h18M3 18h18"></path>
                        </svg>
                    </mat-icon>
                </span>
                <span matripple="" class="mat-ripple mat-button-ripple mat-button-ripple-round"></span>
                <span class="mat-button-focus-overlay"></span>
            </button>
            <div class="hidden  lg:flex ng-star-inserted header-logo">
                <img src="<?=$img?>" class="dark:hidden w-12">
                <img src="<?=$img?>" class="hidden dark:flex w-12">
            </div>
            <img src="<?=$img?>" class="flex lg:hidden w-10 ng-star-inserted header-logo">
            <div class="flex flex-col items-start ng-star-inserted header-logo">
                <div class="font-medium">Ижро интизоми</div>
                <div class="text-secondary text-small">Идоралараро ягона электрон тизими</div>
            </div><!----><!---->
        </div>
        <div class="flex items-center pl-2 ml-auto space-x-0.5 sm:space-x-2">
            <search class="ng-tns-c82-0 search-appearance-bar ng-star-inserted"><button mat-icon-button="" class="mat-focus-indicator mat-icon-button mat-button-base ng-tns-c82-0 ng-star-inserted"><span class="mat-button-wrapper"><mat-icon role="img" class="mat-icon notranslate mat-icon-no-color" aria-hidden="true" data-mat-icon-type="svg" data-mat-icon-name="search" data-mat-icon-namespace="heroicons_outline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg></mat-icon></span><span matripple="" class="mat-ripple mat-button-ripple mat-button-ripple-round"></span><span class="mat-button-focus-overlay"></span></button><!----><!----><!----><!----><!----><!----><!----><!----></search>
        </div>
    </div>

    <main role="main" class="flex-shrink-0 bg-light">
            <?= $content ?>
    </main>
   
    <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.enterprise.ready(async () => {
            const token = await grecaptcha.enterprise.execute('6LfYfYEqAAAAAA3Wx5lgQC1RS6oC-WlgVRbHp7J-', {action: 'LOGIN'});
            });
        }

        
    </script>

    

    <script>
        var widgetId;
        var verifyCallback = function(response) {
            // reCAPTCHA muvaffaqiyatli to'ldirilganda chaqiriladi
            $.ajax({
                url: '<?= \yii\helpers\Url::to(['documents/verify-recaptcha']) ?>',
                type: 'POST',
                data: {
                    'g-recaptcha-response': response,
                    '_csrf-frontend': '<?= Yii::$app->request->csrfToken ?>'
                },
                success: function(data) {
                    if (data.success) {
                        // Overlayni yashirish
                        $('#recaptcha-overlay').fadeOut();
                        // 'recaptcha-active' klassini olib tashlash
                        $('body').removeClass('recaptcha-active');
                    } else {
                        // Xato bo'lsa, xabar chiqaring
                        alert('reCAPTCHA tekshiruvi muvaffaqiyatsiz bo\'ldi. Iltimos, qayta urinib ko\'ring.');
                        grecaptcha.reset(widgetId);
                    }
                }
            });
        };

        var onloadCallback = function() {
            // reCAPTCHA vidjetini yuklaymiz
            widgetId = grecaptcha.render('recaptcha', {
                'sitekey' : "6LfNm4IqAAAAALl9PcuV4gazAYvicz4xE3vRrzHi", // O'zingizning site key'ingizni qo'ying
                'callback' : verifyCallback
            });
        };

        // Agar foydalanuvchi allaqachon tasdiqlangan bo'lsa, overlayni yashirish
        


        $(document).ready(function () {
            $('#toggleButton').on('click', function () {
                $('#sidebar').toggleClass('active');
                if ($('#sidebar').hasClass('active')) {
                    // Sidebar ochilganida logotip va matnlarni yashirish
                    $('.header-logo').addClass('hidden-logo');
                    $('.header-logo').removeClass('flex');
                } else {
                    // Sidebar yopilganida logotip va matnlarni qaytarish
                    $('.header-logo').removeClass('hidden-logo');
                }
            });
        });
    </script>

    <?php
    $this->registerJs(<<<JS
        $(document).ready(function () {
            $('#loader').fadeIn(); // Loaderni ko'rsatadi
            $(window).on('load', function () {
                $('#loader').fadeOut(); // Sahifa yuklanganda loaderni yashiradi
            });
            $(document).ajaxStart(function () {
                $('#loader').fadeIn(); // AJAX so'rov boshida
            }).ajaxStop(function () {
                $('#loader').fadeOut(); // AJAX so'rov tugagandan keyin
            });
        });
    JS, \yii\web\View::POS_END);
    ?>
<?php $this->endBody() ?>
</body>


</body>


</html>
<?php $this->endPage();
