<?php

use yii\helpers\Html;

/* @var \yii\web\View $this */

?>
<nav class="header__nav">
    <div class="container">
        <a class="mob-menu__icon visible-sm position-nav" href="#menu">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <strong role="banner" class="header__logo"><a href="/">MANLY CLUB est.2014</a></strong>
        <ul class="header__nav-items position-nav hidden-sm">
            <li><?= Html::a('Магазин', ['shop/catalog']); ?></li>
            <li><?= Html::a('Блог', ['blog/list']); ?></li>
            <li><?= Html::a('О нас', '#'); ?></li>
            <li><?= Html::a('Помощь', '#'); ?></li>
            <li><?= Html::a('Партнеры', '#'); ?></li>
        </ul>
        <ul class="header__nav-icons position-nav position-nav">
            <li class="hidden-sm">
                <div class="header__search-form">
                    <form action="">
                        <fieldset>
                            <input type="text" placeholder="Search..." class="txt-s">
                            <input type="submit" value="Поиск" class="header__search-icon">
                            <i class="header__search-icon"></i>
                        </fieldset>
                    </form>
                </div>
            </li>
            <li><a class="fancybox" href="#popup-lodin"><i class="header__login-icon hidden-sm"></i></a></li>
            <li>
                <i class="header__cart-icon"></i>
                <div class="header__box-add-cart">
                    <div class="wrap-in">
                        <div class="ttl none-products">В Корзине нет товаров</div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="mob__user-inf">
            <div class="user-inf">
                <div class="avatar"><a href=""><img src="images/img-35.png" alt=""></a></div>
                <div class="name"><a href="">User Name</a></div>
            </div>
            <div class="settings-icon">
                <ul>
                    <li><a class="fancybox" href="#popup-lodin"><i class="icon-setting"></i></a></li>
                    <li><a href=""><i class="icon-exit"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>