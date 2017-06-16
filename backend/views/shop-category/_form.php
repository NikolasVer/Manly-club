<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ar\ShopCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($model::statusLabels()) ?>

    <?= $form->field($model, 'priority')->input('number') ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true])->hint('Заполнять не обязательно - создается автоматически из имени категории.') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить изменения',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
