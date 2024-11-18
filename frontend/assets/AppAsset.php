<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/inter.css',
        'css/splash-screen.css',
        'css/styles.edaf3cfbf503fe385ae6.css',
    ];
    public $js = [
        'js/runtime.5d4598e7ebc238fb25ed.js',
        'js/emicrypter.js',
        'js/polyfills.fd0e8ca299601d56c5f2.js',
        'js/main.b747d9c32c1272c4097e.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',

    ];
}
