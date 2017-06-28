<?php

/* @var \yii\web\View $this */
/* @var \common\models\ar\ShopFaq $model */

$this->params['bodyOptions'] = [
    'class' => 'no-footer-page'
];
$this->params['showFooter'] = FALSE;


$content = $model->parsedContent;

?>

<div class="faq-page">
    <div class="faq-page__bagraund"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 faq-page__menu">
                <span class="faq-page__open"></span>
                <div class="faq-page__left-title">
                    F.A.Q
                    <span><?= $model->title; ?></span>
                </div>
                <ul class="faq-page__scroll-menu" id="faq-menu">
                    <?php foreach ($content as $i => $part): ?>
                        <li><a <?= $i == 0?'class="selected"':''; ?> href="#section<?=$i;?>"><?= $part[0]; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 faq-page__menu-posts">
                <div class="faq-page__menu-posts-in" id="contentcontainer">
                    <div class="faq-page__posts-padding">
                        <?php foreach ($content as $i => $part): ?>
                            <article class="faq-page__post " id="section<?= $i ?>">
                                <?= $part[1]; ?>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
