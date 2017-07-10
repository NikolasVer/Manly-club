<?php

use frontend\assets\PartnersAsset;

/* @var \yii\web\View $this */
/* @var array $partners */
/* @var array $places */

PartnersAsset::register($this);

?>

<div style="display: none;" id="partners_json"><?= json_encode($partners); ?></div>
<div style="display: none;" id="places_json"><?= json_encode($places); ?></div>
<div class="partners-page">
    <div class="partners-page__map">
        <div class="partners-page__select-wrap text-center">
            <div class="container">
                <select id="select_country" class="basic">
                </select>
                <div class="long-list">
                    <select id="select_city" class="basic"></select>
                </div>
            </div>
        </div>
        <div id="mapstyle"></div>
        <div class="partners-page__slider-wrap">
            <div class="container">
                <div id="partners-slider" class="partners-page__slider">
                    <?php foreach ($partners as $partner): ?>
                        <div class="item" data-map-pos="<?= $partner['gmap']; ?>" >
                            <img src="/uploads/partners/<?= $partner['img']; ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
