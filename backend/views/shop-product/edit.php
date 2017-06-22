<?php

use backend\assets\ProductExtendedEditAsset;
use common\models\ar\ShopProduct;
use common\models\ar\ShopProductVarietyAttachment;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use zxbodya\yii2\elfinder\TinyMceElFinder;
use zxbodya\yii2\tinymce\TinyMce;

/* @var \yii\web\View $this */
/* @var \backend\models\ProductExtendedForm $model */
/* @var array $faqList */
/* @var array $categoryList */

ProductExtendedEditAsset::register($this);
?>

<div id="attachmentTemplate" class="hidden">
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-1">
                <?= Html::textInput($model->formName()
                    . "[varieties][{{varietyIndex}}][attachments][{{fileIndex}}][priority]", NULL,
                    ['class' => 'form-control input-sm']) ?>
            </div>
            <div class="col-md-2">
                <?= Html::dropDownList($model->formName()
                    . "[varieties][{{varietyIndex}}][attachments][{{fileIndex}}][type]",
                    NULL,
                    ShopProductVarietyAttachment::typeLabels(),
                    ['class' => 'form-control input-sm']); ?>
            </div>
            <div class="col-md-4">
                <?= Html::textInput($model->formName()
                    . "[varieties][{{varietyIndex}}][attachments][{{fileIndex}}][url_remote]", NULL,
                    ['class' => 'form-control input-sm']) ?>
            </div>
            <div class="col-md-5">
                <?= Html::fileInput($model->formName()
                    . "[varieties][{{varietyIndex}}][attachments][{{fileIndex}}][uploadFile]", NULL) ?>
            </div>
        </div>
    </li>
</div>
<div id="varietyTemplate" data-index="<?= count($model->varieties)
    ? (max(array_keys($model->varieties)) + 1) : 0; ?>" class="hidden">
    <div class="well well-sm varieties-list">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-4">
                <div class="form-group">
                    <label class="control-label">Код товара</label>
                    <?= Html::textInput($model->formName() . '[varieties][{{index}}][code]',
                        NULL, ['class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Объем</label>
                    <?= Html::textInput($model->formName() . '[varieties][{{index}}][volume]',
                        NULL, ['class' => 'form-control']); ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Цена</label>
                    <?= Html::textInput($model->formName() . '[varieties][{{index}}][cost]',
                        NULL, ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-8">
                <p class="text-center">
                    Файлы
                    <button
                        type="button"
                        data-category="add-variety-attachment"
                        data-variety-index="{{index}}"
                        data-file-index="0"
                        class="btn btn-xs btn-success">Добавить файл</button>
                </p>
                <ul class="list-group"
                    data-category="variety-attachments"
                    data-content="{{index}}">
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="shop-product-extended-edit">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <h3 class="text-center">Товар</h3>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'productName')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'productShortName')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'productSlug')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'productLabel')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'productFaqId')
                ->dropDownList($faqList, ['prompt' => 'Не выбрано']) ?>
            <?= $form->field($model, 'productStatus')->dropDownList(ShopProduct::statusLabels()) ?>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Добавить категорию</label>
                <div class="row">
                    <div class="col-md-8">
                        <?= Html::dropDownList('', NULL, $categoryList, [
                            'id' => 'catListAvail', 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-md-4">
                        <?= Html::a('Добавить', '#', [
                            'id' => 'btnAddCategory',
                            'class' => 'btn btn-success btn-block',
                            'data' => [
                                'form-name' => $model->formName(),
                                'attribute' => 'productCategories'
                            ]
                        ]); ?>
                    </div>
                </div>
                <br />
                <div class="well well-sm">
                    <label>Выбранные категории</label>
                    <div id="catListEnable">
                        <?php foreach ($model->productCategories as $catId): ?>
                            <span class="badge">
                                <?= Html::hiddenInput($model->formName() . '[productCategories][]',
                                    $catId); ?>
                                <?= $categoryList[$catId]; ?>
                                <button type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'productCatalogDescr')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'fileManager' => [
            'class' => TinyMceElFinder::className(),
            'connectorRoute' => 'site/elfinder',
        ],
        'settings' => [
            'paste_as_text' => true
        ]
    ]) ?>

    <?= $form->field($model, 'productDescr')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'fileManager' => [
            'class' => TinyMceElFinder::className(),
            'connectorRoute' => 'site/elfinder',
        ],
        'settings' => [
            'paste_as_text' => true
        ]
    ]) ?>

    <hr />

    <h3 class="text-center">
        <a id="btnAddVariety" href="#" class="btn btn-xs btn-success pull-right">Добавить</a>
        Разновидности
    </h3>

    <div id="varieties">
        <?php foreach ($model->varieties as $i => $variety): ?>
            <div class="well well-sm varieties-list">
                <button type="button" class="close close-variety" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="form-group">
                            <label class="control-label">Код товара</label>
                            <?= Html::activeTextInput($model, "varieties[$i][code]",
                                ['class' => 'form-control input-sm']) ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Объем</label>
                            <?= Html::activeTextInput($model, "varieties[$i][volume]",
                                ['class' => 'form-control input-sm']) ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Цена</label>
                            <?= Html::activeTextInput($model, "varieties[$i][cost]",
                                ['class' => 'form-control input-sm']) ?>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-8">
                        <p class="text-center">
                            Файлы
                            <button
                                type="button"
                                data-category="add-variety-attachment"
                                data-variety-index="<?= $i ?>"
                                data-file-index="<?= max(array_keys(
                                    count($variety['attachments']) ? $variety['attachments'] : [0]
                                )) + 1; ?>"
                                class="btn btn-xs btn-success">Добавить файл</button>
                        </p>
                        <ul class="list-group"
                            data-category="variety-attachments"
                            data-content="<?= $i; ?>">
                        <?php foreach ( $variety['attachments'] as $j => $attachment ): ?>
                            <li class="list-group-item">
                                <button type="button" class="close close-file" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <div class="row">
                                    <div class="col-md-1">
                                        <?= Html::activeTextInput($model,
                                            "varieties[$i][attachments][$j][priority]",
                                            ['class' => 'form-control input-sm']) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= Html::activeDropDownList($model,
                                            "varieties[$i][attachments][$j][type]",
                                            ShopProductVarietyAttachment::typeLabels(),
                                            ['class' => 'form-control input-sm']); ?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= Html::activeTextInput($model,
                                            "varieties[$i][attachments][$j][url_remote]",
                                            ['class' => 'form-control input-sm']) ?>
                                    </div>
                                    <div class="col-md-5">
                                        <?= Html::activeFileInput($model,
                                            "varieties[$i][attachments][$j][uploadFile]") ?>
                                        <?php
                                        if(isset($model->varieties[$i]['attachments'][$j]['url_local']))
                                            echo Html::img(Yii::$app->urlManagerFrontend->createAbsoluteUrl($model->varieties[$i]['attachments'][$j]['url_local']),
                                                [
                                                    'class' => 'img-rounded',
                                                    'style' => 'max-width: 250px; max-height: 150px;']);
                                        ?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <button type="submit">Go</button>

    <?php ActiveForm::end(); ?>

</div>
