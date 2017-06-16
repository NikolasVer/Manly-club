<?php

namespace frontend\controllers;


use yii\web\Controller;

class BlogController extends Controller
{

    public function actionList()
    {
        return $this->render('list');
    }

}