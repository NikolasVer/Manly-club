<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PartnerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'city_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'phones') ?>

    <?php // echo $form->field($model, 'site') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'gmap') ?>

    <?php // echo $form->field($model, 'gmap_img') ?>

    <?php // echo $form->field($model, 'priority') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
