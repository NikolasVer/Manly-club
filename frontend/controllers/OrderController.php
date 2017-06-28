<?php

namespace frontend\controllers;

use common\models\ar\ShopProduct;
use common\models\ar\ShopProductVariety;
use common\queries\ShopProductQuery;
use yii\web\Controller;

class OrderController extends Controller
{

    public function actionCart()
    {
        $name = \Yii::$app->request->post('name', FALSE);
        $item = \Yii::$app->request->post('item', FALSE);
        $change = \Yii::$app->request->post('change', FALSE);

        if ( $name !== FALSE && $item !== FALSE && $change !== FALSE ) {
            $v = ShopProductVariety::find()
                ->innerJoinWith(['product' => function ( $q ) use ( $name ) {/* @var ShopProductQuery $q */
                    $q->onCondition([ShopProduct::tableName() . '.slug' => $name]);
                }], FALSE)
                ->priority()
                ->offset($item)
                ->limit(1)
                ->asArray()
                ->select([ShopProductVariety::tableName() . '.id'])
                ->one();
            if ( $v ) {
                if($change > 0)
                    \Yii::$app->cart->addItem($v['id'], $change);
                elseif($change < 0)
                    \Yii::$app->cart->removeItem($v['id'], -1*$change);
            }
        }

        return $this->renderPartial('_small-cart');

    }

}