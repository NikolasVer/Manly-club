<?php

/* @var $this yii\web\View */

$this->title = 'Manly admin';

/* @var \common\models\ar\ShopFaq[] $models */
/* @var \common\models\ar\ShopFaq[] $newModels */


?>
<div class="site-index">

    <?php $form = \yii\bootstrap\ActiveForm::begin(); ?>

    <?php foreach ($models as $index => $model): ?>

        <?= $form->field($model, "[$index]title"); ?>

        <?= $form->field($model, "[$index]content"); ?>

    <?php endforeach; ?>

    <hr />

    <?php foreach ($newModels as $index => $model): ?>

        <?= $form->field($model, "[$index]title"); ?>

        <?= $form->field($model, "[$index]content"); ?>

    <?php endforeach; ?>


    <button type="submit">Submit</button>

    <?php \yii\bootstrap\ActiveForm::end(); ?>

</div>
