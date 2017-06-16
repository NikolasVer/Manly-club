<?php

namespace frontend\controllers;


use yii\web\Controller;

class ShopController extends Controller
{

    public function actionCatalog()
    {
        return $this->render('catalog');
    }

}