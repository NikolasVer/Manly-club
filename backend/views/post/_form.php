<?php

use common\models\ar\Post;
use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zxbodya\yii2\elfinder\TinyMceElFinder;
use zxbodya\yii2\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model Post */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadModel backend\models\PostUploadFiles */

?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'display_type')->dropDownList(Post::displayTypeLabels()); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'status')->dropDownList(Post::statusLabels()); ?>
                </div>
            </div>
            <?= $form->field($model, 'publish_at')->widget(DateTimePicker::className(), [
                'convertFormat' => true,
                'pluginOptions' => [
                    'format' => 'php:Y-m-d H:i:s',
                    'todayHighlight' => true,
                ]
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($uploadModel, 'mainImage')->fileInput() ?>
            <?php if ( $model->image ): ?>
                <label>Текущее изображение</label>
                <div>
                <?= Html::img(Yii::$app->urlManagerFrontend->createAbsoluteUrl($model->image),
                    ['class' => 'img-rounded', 'style' => 'width: 200px;']) ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($uploadModel, 'previewImage')->fileInput() ?>
            <?php if ( $model->image_preview ): ?>
                <label>Текущее изображение</label>
                <div>
                    <?= Html::img(Yii::$app->urlManagerFrontend->createAbsoluteUrl($model->image_preview),
                        ['class' => 'img-rounded', 'style' => 'width: 200px;']) ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <hr />

    <?= $form->field($model, 'excerpt')->widget(TinyMce::className(), [
        'options' => ['rows' => 5],
        'fileManager' => [
            'class' => TinyMceElFinder::className(),
            'connectorRoute' => 'site/elfinder',
        ],
        'settings' => [
            'paste_as_text'=>true
        ]
    ]) ?>

    <?= $form->field($model, 'content')->widget(TinyMce::className(), [
        'options' => ['rows' => 15],
        'fileManager' => [
            'class' => TinyMceElFinder::className(),
            'connectorRoute' => 'site/elfinder',
        ],
        'settings' => [
            'paste_as_text'=>true
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохарнить изменения',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
