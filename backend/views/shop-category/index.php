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
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            'id',
            'priority',
            'name',
            [
                'attribute' => 'status',
                'value' => function ($m) {/* @var \common\models\ar\ShopCategory $m */
                    return $m->statusLabel;
                },
                'filter' => $searchModel::statusLabels()
            ],
            [
                'attribute' => 'show_in_landing',
                'format' => 'boolean',
                'filter' => Html::activeDropDownList($searchModel, 'show_in_landing', [
                    1 => 'Да',
                    0 => 'Нет'
                ], ['class' => 'form-control', 'prompt' => ''])
            ],
            'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
