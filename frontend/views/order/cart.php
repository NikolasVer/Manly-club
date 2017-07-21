<?php

/* @var \yii\web\View $this */
use common\models\ar\ShopProductVarietyAttachment;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var array $itemsCount */
/* @var array $products */

$this->params['bodyOptions'] = [
    'class' => 'no-footer-page body-color-grey2'
];
$this->params['showFooter'] = FALSE;

$deliveryCost = 35.00;

?>

<div class="cart__steps-form">
    <div class="cart__top-nav">
        <div class="container">
            <div class="cart__back-btn">Назад</div>
            <div class="shop__swich">
                <ul class="text-center">
                    <li><a class="arrow active" href="">1  Корзина</a></li>
                    <li><a class="arrow" href="">2  Контакты</a></li>
                    <li><a class="" href="">3  Подтвердить заказ</a></li>
                </ul>
            </div>
            <div class="cart__close-btn">Закрыть</div>
        </div>
    </div>
</div>
<div class="cart__steps-cart">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="cart__table">
                    <table>
                        <?php
                        $sum = (float)0;
                        foreach($products as $variety):
                            $productUrl = Url::to(['shop/product', 'slug' => $variety['product']['slug']]);
                            $cost = $itemsCount[$variety['id']] * $variety['cost'];
                            $sum += $cost;
                            ?>
                        <tr>
                            <td>
                                <a href="<?= $productUrl ?>">
                                    <img src="<?= ShopProductVarietyAttachment::url($variety['attachments'][0]['url_local'], $variety['attachments'][0]['url_remote']) ?>" alt="">
                                </a>
                            </td>
                            <td class="cart__table-border">
                                <a class="cart__table-title" href="<?= $productUrl ?>">
                                    <?= $variety['product']['name'] . ' ' . $variety['volume']; ?>
                                </a>
                            </td>
                            <td class="cart__table-border">
                                <div class="input-number">
                                    <span class="input-number__plus">+</span>
                                    <?= Html::textInput('', $itemsCount[$variety['id']],
                                        ['class' => 'input-number__digit']); ?>
                                    <span class="input-number__minus">-</span>
                                </div>
                            </td>
                            <td class="cart__table-border">
                                <span class="cart__table-price">₴ <?= number_format($cost, 2); ?></span>
                            </td>
                            <td class="cart__table-border"><a href=""><i class="cart__table-remove-cart"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="cart__sidebar col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="cart__steps-price-box">
                    <div class="cart__update-box">
                        <span class="cart__update-check"><i class="cart__update-check-ico"></i>Обновить Чек</span>
                    </div>
                    <dl>
                        <dt>Сумма:</dt>
                        <dd>₴ <?= number_format($sum, 2); ?></dd>
                        <dt>Доставка</dt>
                        <dd>₴ <?= number_format($deliveryCost, 2); ?></dd>
                    </dl>
                    <dl class=" all-price">
                        <dt><span>Всего:</span></dt>
                        <dd><strong><span>₴</span> <?= number_format($sum + $deliveryCost, 2); ?></strong></dd>
                    </dl>
                </div>
                <div class="txt-ifo">
                    Доставку заказа осуществляет перевозчик!<br> Доставка 3 - 12 дней
                </div>
                <div class="cart__steps-update">
                    <?= Html::a('Продолжить', ['order/create'], ['class' => 'btn-02']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
