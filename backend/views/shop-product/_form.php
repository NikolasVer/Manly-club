<?php

use backend\widgets\ProductTabs;;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zxbodya\yii2\elfinder\TinyMceElFinder;
use zxbodya\yii2\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model common\models\ar\ShopProduct */
/* @var $form yii\widgets\ActiveForm */
/* @var $faqList array */
/* @var $newVarieties \common\models\ar\ShopProductVariety */

$js = <<<JS
var newVarieryCounter = 0;
var newVarietyTemplate = $('#new_variety_template').html();
var tabLinks = $('#tab_links');
$('#new_variety_template').remove();
function addVariety()
{
    var t = newVarietyTemplate.replace(/(name=")(.*?)\[__INDEX__\](\[.*\]?")/g, '$1newvariety[$2]['
    + newVarieryCounter + ']$3');
    
    var idNewTab = 'ztab_links_tab' + newVarieryCounter;
    tabLinks.next().append('<div id="' + idNewTab + '" class="tab-pane">' + t + '</div>');
    tabLinks.append('<li><a href="#' + idNewTab + '" data-toggle="tab">Новый</a></li>').find('a').tab('show');
    
    newVarieryCounter++;
}
$('#btn_add_variety').on('click', function(e) {
    e.preventDefault();
    $(this).blur();
    addVariety();
});
JS;


$this->registerJs($js);

?>


<div class="shop-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div id="new_variety_template" class="hidden">
        <?= $this->render('_variety_form', [
            'form' => $form,
            'model' => new \common\models\ar\ShopProductVariety(),
            'index' => NULL
        ]) ?>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'shop_faq_id')->dropDownList($faqList, ['prompt' => 'Не выбрано']) ?>
            <?= $form->field($model, 'status')->dropDownList($model::statusLabels()) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'description_cut')->widget(TinyMce::className(), [
                'options' => ['rows' => 8],
                'fileManager' => [
                    'class' => TinyMceElFinder::className(),
                    'connectorRoute' => 'site/elfinder',
                ],
                'settings' => [
                    'paste_as_text' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'description_full')->widget(TinyMce::className(), [
                'options' => ['rows' => 8],
                'fileManager' => [
                    'class' => TinyMceElFinder::className(),
                    'connectorRoute' => 'site/elfinder',
                ],
                'settings' => [
                    'paste_as_text' => true
                ]
            ]) ?>
        </div>
    </div>

    <?php
    $items = [
        [
            'label' => 'Добавить объем',
            'url' => '#add_variery',
            'linkOptions' => ['class' => 'text-danger', 'id' => 'btn_add_variety']
        ]
    ];
    $hasActive = FALSE;
    foreach ( $model->varieties as $index => $variety ) {
        $items[] = [
            'label' => $variety->volume,
            'content' => $this->render('_variety_form', [
                'form' => $form,
                'model' => $variety,
                'index' => $index
            ]),
            'active' => !$hasActive
        ];
        $hasActive = TRUE;
    }
    foreach ($newVarieties as $index => $newVariety) {
        $items[] = [
            'label' => 'Новое',
            'content' => $this->render('_variety_form', [
                'form' => $form,
                'model' => $newVariety,
                'index' => $index,
                'isNew' => TRUE
            ])
        ];
        $hasActive = TRUE;
    }

    echo Html::beginTag('div', ['class' => 'well']);
    echo ProductTabs::widget([
        'items' => $items,
        'id' => 'tab_links',
    ]);
    echo Html::endTag('div');
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
