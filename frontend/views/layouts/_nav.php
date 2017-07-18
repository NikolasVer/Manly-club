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
            <li><?= Html::a('Партнеры', ['site/partners']); ?></li>
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
            <?php if(Yii::$app->user->isGuest): ?>
            <li><a class="fancybox" href="#popup-lodin"><i class="header__login-icon hidden-sm"></i></a></li>
            <?php else: ?>
                <li>
                    <span class="avatar hidden-sm"><img src="images/img-36.png" alt=""></span>
                    <div class="header__user-settings">
                        <div class="user-name">
                            <a class="ico-avatar" href=""><?= Yii::$app->user
                                    ->identity->displayName; ?></a>
                        </div>
                        <ul>
                            <li><div class="user-settings"><a class="ico-settings" href="">Настройки</a></div></li>
                            <li>
                                <div class="user-exit">
                                    <?= Html::a('Выйти', ['site/logout'], [
                                        'class' => 'ico-exit',
                                        'data-method' => 'post'
                                    ]); ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
            <li id="smallCart">
                <?= $this->render('//order/_small-cart'); ?>
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