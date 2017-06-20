<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ar\ShopCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-category-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name_extended')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description')->textarea(); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'status')->dropDownList($model::statusLabels()) ?>
            <?= $form->field($model, 'priority')->input('number') ?>
            <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'imageFile')->fileInput(); ?>
        </div>
        <div class="col-md-6">
            <label>Текущее изображение</label>
            <?php if ($model->image): ?>
                <div>
                    <?= Html::img(Yii::$app->urlManagerFrontend->createAbsoluteUrl($model->image),
                        ['class' => 'img-rounded', 'style' => 'max-width: 300px;']) ?>
                </div>
            <?php else: ?>
                <p class="text-warning">Не задано</p>
            <?php endif; ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить изменения',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
