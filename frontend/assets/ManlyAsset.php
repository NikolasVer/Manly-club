<?php

namespace frontend\assets;


use yii\web\AssetBundle;

class ManlyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700',
        '//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700',
        'css/styles.css',
        'css/libs.min.css',
    ];
    public $js = [
        'js/libs.min.js',
        //'js/google-map-style.js',
        'js/scripts.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}