<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ar\ShopProduct */
/* @var $faqList array */

$this->title = 'Создать товар';
$this->params['breadcrumbs'][] = ['label' => 'Магазин - Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'faqList' => $faqList
    ]) ?>

</div>
