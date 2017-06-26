<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ar\ShopFaq */

$this->title = 'Create Shop Faq';
$this->params['breadcrumbs'][] = ['label' => 'Shop Faqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-faq-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
