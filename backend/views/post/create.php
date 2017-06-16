<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ar\Post */
/* @var $uploadModel backend\models\PostUploadFiles */

$this->title = 'Создать пост';
$this->params['breadcrumbs'][] = ['label' => 'Блог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'uploadModel' => $uploadModel
    ]) ?>

</div>
