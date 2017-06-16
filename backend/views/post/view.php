<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ar\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Блог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этот пост?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'excerpt:html',
            'content:html',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ( $m ) {/* @var \common\models\ar\Post $m */
                    return $m->image ? Html::img(Yii::$app->urlManagerFrontend
                        ->createAbsoluteUrl($m->image), ['style' => 'max-width: 200px;']) : NULL;
                }
            ],
            [
                'attribute' => 'image_preview',
                'format' => 'html',
                'value' => function ( $m ) {/* @var \common\models\ar\Post $m */
                    return $m->image_preview ? Html::img(Yii::$app->urlManagerFrontend
                        ->createAbsoluteUrl($m->image_preview), ['style' => 'max-width: 200px;']) : NULL;
                }
            ],
            [
                'attribute' => 'display_type',
                'value' => $model->displayTypeLabel
            ],
            [
                'attribute' => 'status',
                'value' => $model->statusLabel
            ],
            'slug',
            'publish_at:datetime',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
