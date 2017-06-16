<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\ManlyAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

ManlyAsset::register($this);

$bodyOptions = ArrayHelper::getValue($this->params, 'bodyOptions', []);
$showVideoHead = ArrayHelper::getValue($this->params, 'showVideoHead', FALSE);

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
            <li><a href="">Магазин</a></li>
            <li><a href="">Блог</a></li>
            <li><a href="">О нас</a></li>
            <li><a href="">Помощь</a></li>
            <li><a href="">Партнеры</a></li>
        </ul>
    </nav>
    <header class="header">
        <?php if ( $showVideoHead ): ?>
        <section class="header__bg">
            <div class="header__video_bg rellax" data-rellax-speed="-5"></div>
            <div class="header__big-logo rellax" data-rellax-speed="-9"></div>
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
</div>
<?php $this->endBody() ?>
<?= Html::endTag('body'); ?>
</html>
<?php $this->endPage() ?>