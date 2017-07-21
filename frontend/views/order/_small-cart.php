<?php
/* view like a small standalone widget and has a some logic */

use common\models\ar\ShopProductVariety;
use yii\helpers\Html;

/* @var \yii\web\View $this */


$items = Yii::$app->cart->getItems();
$cnt = count($items);
if ( $cnt ) {
    $varieties = ShopProductVariety::find()
        ->where(['id' => array_keys($items)])
        ->with(['product' => function ($q) {
            /* @var \common\queries\ShopProductQuery $q */
            $q->select(['id', 'short_name', 'slug']);
        }])
        ->select(['id', 'shop_product_id'])
        ->asArray()->all();
}

?>

<i class="header__cart-icon"><?php if($cnt) echo "<span>$cnt</span>"; ?></i>
<div class="header__box-add-cart">
    <div class="wrap-in">
        <?php if ($cnt): ?>
        <div class="ttl">В Корзине</div>
        <ul>
            <?php foreach ($varieties as $variety): ?>
                <li>
                    <?= Html::a($variety['product']['short_name'],
                        ['shop/product', 'slug' => $variety['product']['slug']], ['class' => 'ttl-prod']) ?>
                    <span class="number-prod"><?= $items[$variety['id']] ?> шт</span>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
        <div class="ttl none-products">В Корзине нет товаров</div>
        <?php endif; ?>
    </div>
    <?php if ( $cnt ): ?>
        <?= Html::a('оформит заказ', ['order/cart'], ['class' => 'btn-09']) ?>
    <?php endif; ?>
</div>
