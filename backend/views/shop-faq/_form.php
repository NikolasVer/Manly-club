<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zxbodya\yii2\elfinder\TinyMceElFinder;
use zxbodya\yii2\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\ar\ShopFaq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-faq-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(TinyMce::className(), [
        'options' => ['rows' => 15],
        'fileManager' => [
            'class' => TinyMceElFinder::className(),
            'connectorRoute' => 'site/elfinder',
        ],
        'settings' => [
            'paste_as_text'=>true
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
