<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">


    <?php $this->registerCsrfMetaTags() ?>


    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <?php
    $img =  '/img/Emblem_of_Uzbekistan.svg';

    ?>
    <div class="relative flex flex-0 items-center w-full h-16 sm:h-20 px-4 md:px-6 z-49 shadow dark:shadow-none dark:border-b bg-card dark:bg-transparent print:hidden">
        <div class="flex items-center gap-2 lg:mr-8"><button mat-icon-button="" class="mat-focus-indicator mat-icon-button mat-button-base"><span class="mat-button-wrapper"><mat-icon role="img" svgicon="feather:menu" class="mat-icon notranslate mat-icon-no-color" aria-hidden="true" data-mat-icon-type="svg" data-mat-icon-name="menu" data-mat-icon-namespace="feather"><svg x="384" y="288" viewBox="0 0 24 24" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                            <path fill="none" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" d="M3 12h18M3 6h18M3 18h18"></path>
                        </svg></mat-icon></span><span matripple="" class="mat-ripple mat-button-ripple mat-button-ripple-round"></span><span class="mat-button-focus-overlay"></span></button>
            <div class="hidden lg:flex ng-star-inserted">

                <img src="<?=$img?>" class="dark:hidden w-12">
                <img src="<?=$img?>" class="hidden dark:flex w-12">
            </div>
            <img src="<?=$img?>" class="flex lg:hidden w-8 ng-star-inserted">
            <div class="flex flex-col items-start ng-star-inserted">
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
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
