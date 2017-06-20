<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var \yii\web\View $this */
/* @var \common\models\ar\ShopProductVariety $variety */
/* @var \common\models\ar\ShopProductVarietyAttachment $model */
/* @var \common\models\ar\ShopProductVarietyAttachment[] $attachments */

$this->title = 'Файлы: ' . $variety->product->name . '[' . $variety->volume . ']';
$this->params['breadcrumbs'][] = ['label' => 'Магазин - Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $variety->product->name,
    'url' => ['view', 'id' => $variety->shop_product_id]];
$this->params['breadcrumbs'][] = $variety->volume;
$this->params['breadcrumbs'][] = 'Файлы';

$js = <<<JS
$('#current_files').on('click', 'button.close', function(e) {
    e.preventDefault();
    if(confirm('Вы точно хотите удалить этот файл?'))
        $(this).parent().parent().parent().remove();
});
JS;

$this->registerJs($js);


?>

<div class="shop-product-attach-files">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="panel panel-success">

        <div class="panel-heading">
            <div class="panel-title">Форма добавления файла</div>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'type')->dropDownList($model::typeLabels()); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'priority')->input('number'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <?= $form->field($model, 'url_remote')->textInput(); ?>
                </div>
                <div class="col-md-2">
                    <div class="text-center" style="padding-top: 25px;">Или</div>
                </div>
                <div class="col-md-5">
                    <?= $form->field($model, 'uploadFile')->fileInput(); ?>
                </div>
            </div>

            <div class="form-group text-center">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>

    <hr />

    <?php $form2 = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div id="current_files" class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Загруженые файлы</div>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-1">Приоритет</div>
                    <div class="col-md-2">Тип</div>
                    <div class="col-md-3">Удаленная ссылка</div>
                    <div class="col-md-3">Локальный файл</div>
                </div>
            </li>
            <?php foreach ($attachments as $index => $attachment): ?>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-1">
                            <?= $form->field($attachment, "[$index]priority")
                                ->input('number')->label(FALSE) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($attachment, "[$index]type")
                                ->dropDownList($model::typeLabels())->label(FALSE); ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($attachment, "[$index]url_remote")->label(FALSE); ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($attachment, "[$index]uploadFile")->fileInput()
                                ->label('Загрузить новый'); ?>
                            <div>
                                <label>Текущий</label>
                                <?php if ($attachment->url_local): ?>
                                    <?= Html::img(Yii::$app->urlManagerFrontend
                                        ->createAbsoluteUrl($attachment->url_local),
                                        ['class' => 'img-rounded',
                                            'style' => 'max-width: 100%;max-height: 120px;']) ?>
                                <?php else: ?>
                                    <p class="text-warning">Не задан</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3 text-right">
                            <button type="button" class="close text-danger" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="panel-footer text-center">
            <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-primary']); ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>