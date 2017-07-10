<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ar\Partner */
/* @var $form yii\widgets\ActiveForm */

$cities = \common\models\ar\City::find()->select(['id', 'name'])->asArray()->all();
$cities = \yii\helpers\ArrayHelper::map($cities, 'id', 'name');

?>

<div class="partner-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'city_id')->dropDownList($cities, ['prompt' => 'Выбрать город']) ?>

            <?= $form->field($model, 'phones')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'priority')->textInput() ?>

            <?= $form->field($model, 'gmap')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'img')->fileInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'gmap_img')->fileInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохоранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
