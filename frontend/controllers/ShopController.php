<?php

namespace frontend\controllers;


use common\models\ar\ShopCategory;
use common\models\ar\ShopProduct;
use yii\web\Controller;

class ShopController extends Controller
{

    public function actionCatalog()
    {
        $categories = ShopCategory::find()->root()->active()->priority()->all();
        $products = ShopProduct::find()->all();

        return $this->render('catalog', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

}