<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ShopCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Магазин - Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            //'parent_id',
            'name',
            'priority',
            [
                'attribute' => 'status',
                'value' => function ($m) {/* @var \common\models\ar\ShopCategory $m */
                    return $m->statusLabel;
                },
                'filter' => $searchModel::statusLabels()
            ],
            'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
