<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Блог';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать пост', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'slug',
            [
                'attribute' => 'display_type',
                'value' => function ($m) {/* @var \common\models\ar\Post $m */
                    return $m->displayTypeLabel;
                },
                'filter' => $searchModel::displayTypeLabels()
            ],
            [
                'attribute' => 'status',
                'value' => function ($m) {/* @var \common\models\ar\Post $m */
                    return $m->statusLabel;
                },
                'filter' => $searchModel::statusLabels()
            ],
            'publish_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
