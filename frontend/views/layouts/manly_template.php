<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\ManlyAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

ManlyAsset::register($this);

$bodyOptions = ArrayHelper::getValue($this->params, 'bodyOptions', []);
$showVideoHead = ArrayHelper::getValue($this->params, 'showVideoHead', FALSE);
$showFooter = ArrayHelper::getValue($this->params, 'showFooter', TRUE);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<?= Html::beginTag('body', $bodyOptions) ?>
<?php $this->beginBody() ?>
<div id="page">
    <nav id="menu">
        <ul class="header__nav-items">
            <li><?= Html::a('Магазин', ['shop/catalog']); ?></li>
            <li><?= Html::a('Блог', ['blog/list']); ?></li>
            <li><?= Html::a('О нас', '#'); ?></li>
            <li><?= Html::a('Помощь', '#'); ?></li>
            <li><?= Html::a('Партнеры', '#'); ?></li>
        </ul>
    </nav>
    <header class="header">
        <?php if ( $showVideoHead ): ?>
        <section class="header__bg">
            <div class="header__video_bg rellax" data-rellax-speed="-5"></div>
            <div class="header__big-logo"></div>
            <div class="container">
                <div class="header__top">
                    <strong role="banner" class="header__logo-top"><a href="/">MANLY CLUB est.2014</a></strong>
                </div>
            </div>
            <span class="header__ico-slide-ancor"><i class="header__ico-slide"></i></span>
        </section>
        <?php endif; ?>
        <?= $this->render('_nav'); ?>
    </header>
    <main class="main">
        <?= $content; ?>
    </main>
    <?php if ($showFooter): ?>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-md-12 footer__top-text">
                    <div class="footer__border hidden-md">
                        <strong role="banner" class="footer__logo"><a href="/">MANLY CLUB est.2014</a></strong>
                    </div>
                    <p>MANLY club зиждется на трех принципах: минимализм, функциональность и доступность. Мы верны своим принципам, уважаем традиции и не боимся утверждать новые стандарты.</p>
                    <p>Stay MANLY with MANLY club!</p>
                </div>
                <div class="col-lg-4 col-md-4 col-md-12 footer__logo-wrap">
                    <strong role="banner" class="footer__logo-center"><a href="/">MANLY CLUB est.2014</a></strong>
                </div>
                <div class="col-lg-4 col-md-4 col-md-12 footer__inst-wrap">
                    <div class="footer__border right hidden-md">
                        <div class="footer__instagram">
                            <div class="ttl">instagram</div>
                            <ul>
                                <li>
                                    <a class="vk" href=""></a>
                                </li>
                                <li>
                                    <a class="in" href=""></a>
                                </li>
                                <li>
                                    <a class="fb" href=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul class="footer__instagram-photo">
                        <li>
                            <a href=""><img src="images/img-08.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="images/img-08.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="images/img-08.jpg" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <span class="footer__btn-to-top"></span>
            <div class="container">
                <div class="copy">&copy; 2016, Manly Club Corporation</div>
                <div class="footer__instagram visible-md">
                    <ul>
                        <li>
                            <a class="vk" href=""></a>
                        </li>
                        <li>
                            <a class="in" href=""></a>
                        </li>
                        <li>
                            <a class="fb" href=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php endif; ?>
</div>
<?php if ( Yii::$app->user->isGuest ): ?>
<div class="popups">
    <div class="popup-01" id="popup-lodin">
        <div class="container">
            <div class="popup-01__form-popup">
                <div class="shop__swich">
                    <ul class="groups3">
                        <li><a data-id="10" class="active" href="">Вход</a></li>
                        <li><a data-id="11" href="">Регистрация</a></li>
                    </ul>
                </div>
                <div class="groups-data3">
                    <div id="group-10" class="active">
                        <?= Html::beginForm(['account/login'], 'POST');  ?>
                            <fieldset>
                                <input type="email" name="email"
                                       class="about-us__form-input mail-input" placeholder="Email">
                                <input type="password"
                                       name="password"
                                       class="about-us__form-input pass-input" placeholder="Пароль">
                                <div class="row remember-block">
                                    <div class="col-lg-7">
                                        <input type="checkbox" name="rememberMe"
                                               id="remember" class="popup__radio-btn">
                                        <label for="remember">Запомнить меня</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <a href="#forget_pass" class="forget_pass fancybox">Забыл Пароль</a>
                                    </div>
                                </div>
                                <input type="submit" value="Войти" class="btn-05">
                            </fieldset>
                        <?= Html::endForm(); ?>
                    </div>
                    <div id="group-11">
                        <form action="">
                            <fieldset>
                                <input type="email" class="about-us__form-input mail-input" placeholder="Email">
                                <input type="password" class="about-us__form-input pass-input" placeholder="Пароль">
                                <div class="row remember-block">
                                    <div class="col-lg-7">
                                        <input type="checkbox" id="remember" class="popup__radio-btn">
                                        <label for="remember">Запомнить меня</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <a href="" class="forget_pass">Мой Профиль</a>
                                    </div>
                                </div>
                                <input type="submit" value="Зарегестрироватся" class="btn-06">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="popup-01__social">
                <div class="ttl-03"><span>или</span></div>
                <div class="ttl-sub text-center">Войти через социальную сеть:</div>
                <ul class="social-link">
                    <li><a class="vk" href=""></a></li>
                    <li><a class="fb" href=""></a></li>
                    <li><a class="tw" href=""></a></li>
                    <li><a class="gp" href=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="popup-01" id="forget_pass">
        <div class="container">
            <div class="popup-01__form-popup">
                <form action="">
                    <fieldset>
                        <input type="email" class="about-us__form-input mail-input" placeholder="Email">
                        <input type="submit" value="Сбросить пароль" class="btn-06">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $this->endBody() ?>
<?= Html::endTag('body'); ?>
</html>
<?php $this->endPage() ?>