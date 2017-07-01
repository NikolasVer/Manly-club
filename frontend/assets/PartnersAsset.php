<?php

namespace frontend\assets;


use yii\web\AssetBundle;

class PartnersAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBOiQ6eEVBY0oZSNxZjDE1vMbqOzDpLz68',
        'js/google-map-style.js'
    ];

    public $depends = [
        'frontend\assets\ManlyAsset',
    ];

}