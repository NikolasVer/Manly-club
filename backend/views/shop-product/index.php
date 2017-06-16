<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ShopProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Магазин - Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'shop_faq_id',
            'name',
            'slug',
            [
                'attribute' => 'status',
                'value' => function ( $model ) {/* @var \common\models\ar\ShopProduct $model */
                    return $model->statusLabel;
                },
                'filter' => $searchModel::statusLabels()
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
