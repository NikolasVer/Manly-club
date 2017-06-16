<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ar\ShopProduct */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Магазин - Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этот товар?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'shop_faq_id',
                'value' => $model->shop_faq_id
            ],
            'name',
            'description_cut:html',
            'description_full:html',
            'slug',
            [
                'attribute' => 'status',
                'value' => $model->statusLabel
            ],
        ],
    ]) ?>

</div>
