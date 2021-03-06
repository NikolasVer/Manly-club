<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ar\ShopProduct */
/* @var $faqList array */
/* @var $newVarieties \common\models\ar\ShopProductVariety[] */

$this->title = 'Обновить товар: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Магазин - Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="shop-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'faqList' => $faqList,
        'newVarieties' => $newVarieties
    ]) ?>

</div>
