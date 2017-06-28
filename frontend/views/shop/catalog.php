<?php

use yii\helpers\ArrayHelper;

/* @var \common\models\ar\ShopCategory[] $categories */
/* @var \common\models\ar\ShopProduct[] $products */

$this->params['bodyOptions'] = [
    'class' => 'body-color-grey2'
];

?>

<div class="shop__page">
    <div class="shop__swich">
        <div class="container">
            <!--<ul class="text-center simplefilter" data-v="*">
                <li><a data-filter="all" class="active" href="javascript:;">Все</a></li>
                <li><a data-filter="1" class="filtr-button" href="javascript:;">усы</a></li>
                <li><a data-filter="2" class="filtr-button" href="javascript:;">борода</a></li>
                <li><a data-filter="3" class="filtr-button" href="javascript:;">Волосы</a></li>
                <li><a data-filter="4" class="filtr-button" href="javascript:;">Тату</a></li>
                <li><a data-filter="5" class="filtr-button" href="javascript:;">Другое</a></li>
            </ul>-->
            <ul class="text-center simplefilter" data-v="*">
                <li><a data-filter="all" class="active" href="javascript:;">Все</a></li>
                <?php foreach($categories as $category): ?>
                <li>
                    <a data-filter="<?= $category->id ?>"
                       class="filtr-button" href="javascript:;">
                        <?= $category->catalog_name ? : $category->name; ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="container shop__items">
        <div class="row">
            <div class="filtr-container">
                <?php foreach($products as $product): ?>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 filtr-item"
                     data-category="<?= implode(', ',
                         ArrayHelper::getColumn($product->categoryProductAssns,
                             'shop_category_id')); ?>">
                    <div class="shop__item">
                        <div class="shop__iocns">
                            <span class="shop__card" data-name="<?= $product->slug; ?>"
                                  data-item="0"></span>
                            <span class="shop__info"></span>
                        </div>
                        <div class="text-center">
                            <a class="ttl" href="<?= Yii::$app->urlManager->createUrl(['shop/product', 'slug' => $product->slug]); ?>">
                                <?= $product->short_name ?>
                                <span><?= $product->label ?></span>
                            </a>
                        </div>
                        <div class="txt">
                            <?= $product->description_cut; ?>
                        </div>
                        <div class="shop__item-slider">
                            <?php foreach ($product->varieties as $variety): ?>
                            <div class="item"><img src="<?= $variety->attachments[0]->url_local; ?>" alt=""></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="shop__bottom-information">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                    <span class="shop__ml">
                                        <?php foreach ($product->varieties as $i => $variety): ?>
                                        <span class="<?php if($i==0)echo 'active'; ?>"
                                              data-index="<?= $i ?>"><?= $variety->volume; ?></span>
                                        <?php endforeach; ?>
                                    </span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                                    <span class="shop__price">
                                        <?php foreach ($product->varieties as $i => $variety): ?>
                                            <span class="<?php if($i==0)echo 'active'; ?>"
                                                  data-index="<?= $i ?>">₴ <?= $variety->cost; ?></span>
                                        <?php endforeach; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>