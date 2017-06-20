<?php

use yii\helpers\Html;

/* @var \common\models\ar\ShopProductVariety $model */
/* @var \yii\bootstrap\ActiveForm $form */
/* @var integer $index */
/* @var boolean $isNew */

if ( $index === NULL )
    $index = "[__INDEX__]";
else
    $index = "[$index]";

if (!isset($isNew))
    $isNew = FALSE;

$rps = 'newvariety[' . $model->formName() . ']';

?>


<div class="row">
    <div class="col-md-4">
        <?= $isNew
            ? str_replace($model->formName(), $rps, $form->field($model, $index . 'code'))
            : $form->field($model, $index . 'code');
        ?>
        <?= $isNew
            ? str_replace($model->formName(), $rps, $form->field($model, $index . 'volume'))
            : $form->field($model, $index . 'volume');
        ?>
        <?= $isNew
            ? str_replace($model->formName(), $rps, $form->field($model, $index . 'cost'))
            : $form->field($model, $index . 'cost');
        ?>
    </div>
    <div class="col-md-4">
        <?php if ( !$model->isNewRecord ): ?>
            <?= Html::a('Файлы', ['attach-files', 'variety_id' => $model->id],
                ['class' => 'btn btn-success']); ?>
        <?php endif; ?>
    </div>
    <div class="col-md-4">

    </div>
</div>
