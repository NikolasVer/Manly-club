<?php

namespace backend\assets;


use yii\web\AssetBundle;

class ProductExtendedEditAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/product_extended_edit.css'
    ];
    public $js = [
        'js/product_extended_edit.js'
    ];
    public $depends = [
        'backend\assets\AppAsset'
    ];
}