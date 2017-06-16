<?php

/* @var \common\models\ar\ShopProductVariety $model */
/* @var \yii\bootstrap\ActiveForm $form */
/* @var integer $index */

$index = $index === NULL ? "[__INDEX__]" : "[$index]";

?>

<div class="well">
    <div class="row">
        <div class="col-md-4"><?= $form->field($model, $index . 'code'); ?></div>
        <div class="col-md-4"><?= $form->field($model, $index . 'volume'); ?></div>
        <div class="col-md-4"><?= $form->field($model, $index . 'cost'); ?></div>
    </div>
</div>