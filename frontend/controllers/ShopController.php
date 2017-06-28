<?php

namespace frontend\controllers;


use common\models\ar\ShopCategory;
use common\models\ar\ShopProduct;
use common\queries\ShopProductVarietyAttachmentQuery;
use common\queries\ShopProductVarietyQuery;
use yii\db\ActiveQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ShopController extends Controller
{

    public function actionCatalog()
    {
        $categories = ShopCategory::find()->root()->active()->priority()->all();
        $products = ShopProduct::find()
            ->with(['varieties' => function ( $q ) {/* @var ShopProductVarietyQuery $q */
                $q->priority()->with(['attachments' => function ( $q2 ) {
                    /* @var ShopProductVarietyAttachmentQuery $q2 */
                    $q2->byPriority();
                }]);
            }])
            ->active()
            ->all();

        return $this->render('catalog', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function actionProduct($slug)
    {

        $model = ShopProduct::find()->slug($slug)->active()->one();

        if ( !$model )
            throw new NotFoundHttpException();

        return $this->render('product', [
            'model' => $model
        ]);

    }

    public function actionFaq($productSlug)
    {
        $model = ShopProduct::find()->slug($productSlug)->one()->faq;
        return $this->render('faq', [
            'model' => $model
        ]);
    }

}