<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

/* @var $categories \common\models\ar\ShopCategory[] */

$this->title = 'Manly Club - Главная';

$this->params['bodyOptions'] = [
    'class' => 'home-page'
];
$this->params['showVideoHead'] = TRUE;

?>

<section class="brand-holder" id="brand-holder">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-6 col-md-offset-6">
                <div class="ttl-01">Бренд №1 в Украине</div>
                <div class="big-first-letter">
                    <div class="big-first-letter__mob-hidden">
                        <p> Тебя с гордостью приветствует команда “MANLY”, производящая натуральные средства для усов, бород и волос (с 2015 года и для тату).</p>
                        <p>Наша история берет свое начало с февраля 2014 года, ведь именно тогда, в городе Харьков, был основан первый подобный украинским локальный бренд, MANLY club.</p>
                        <p>Вдохновившись винтажной эстетикой, возрожденными знаниями и утилитаризмом, мы создали оригинальный продукт, придающий мужскому стилю большей элегантности и лоска, а дизайн служит отдушиной для настоящих педантов и мужчин, живущих атмосферой старой
                            школы. Производство и фасовка происходит вручную, так что с гордостью заявляем – «TOTALLY HANDMADE» </p>
                        <p>Мы всегда изготавливаем нашу продукцию небольшими партиями. И дело не только в том, чтобы обеспечить высокое качество и постоянство товара, но и потому что мы получаем огромное удовольствие разрабатывая и создавая его. </p>
                        <p>Мы действительно верим в наш продукт и пользуемся им каждый день. Поэтому нет ни малейшего сомнения, что Вы получите истинное наслаждение пользуясь им.</p>
                        <p>Stay MANLY with MANLY club!</p>
                    </div>
                    <div class="text-center">
                        <span class="btn-04 visible-xs">РАЗВЕРНУТЬ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="main-category">
    <div class="container">
        <div class="ttl-02"><span>категории</span></div>
    </div>
    <div class="main-category__items">
        <div class="row">
            <?php foreach ( $categories as $category ): ?>
            <div class="col col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="bg-img">
                    <img src="<?= $category->image; ?>" alt="">
                </div>
                <div class="bg-img__box-inf">
                    <div class="bg-img__box-inf-in">
                        <img src="<?= $category->image; ?>" alt="">
                    </div>
                </div>
                <div class="col__ttl"><?= $category->landing_name ? : $category->name; ?></div>
                <ul class="col__btn-list">
                    <li><span class="col__btn-ico ico-02"></span></li>
                    <li>
                        <?= Html::a('', ['shop/catalog'], ['class' => 'col__btn-ico ico-01']) ?>
                    </li>
                </ul>
                <div class="col__box-inf">
                    <ul class="col__btn-list-box">
                        <li>
                            <?= Html::a('', ['shop/catalog'], ['class' => 'col__btn-ico ico-01']) ?>
                        </li>
                        <li><span class="col__btn-ico ico-02"></span></li>
                    </ul>
                    <div class="col__ttl-box">
                        <?= $category->name; ?>
                    </div>
                    <p><?= $category->description; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<div class="video-main">
    <i class="video-main__play-btn"></i>
    <img src="images/img-06.jpg" alt="">
</div>
<sectoin class="article-list">
    <div class="container">
        <div class="ttl-02"><span>Последние статьи</span></div>
        <div class="text-center">
            <p>Вже давно відомо, що читабельний зміст буде заважати зосередитись людині, яка оцінює<br> композицію сторінки.<br> </p>
            <p>Сенс використання Lorem Ipsum полягає в тому, що цей текст має більш-менш нормальне розподілення<br> літер на відміну від, наприклад, "Тут іде текст. Тут іде текст." Це робить текст схожим на </p>
        </div>
        <div class="blog__item-slider">
            <div class="item">
                <article class="article-list__col">
                    <img src="images/img-07.jpg" alt="">
                    <div class="article-list__contain">
                        <div class="article-list__soc">
                            <div class="ttl">Поделиться:</div>
                            <ul>
                                <li>
                                    <a class="vk" href=""></a>
                                </li>
                                <li>
                                    <a class="tw" href=""></a>
                                </li>
                                <li>
                                    <a class="fb" href=""></a>
                                </li>
                                <li>
                                    <a class="gp" href=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="article-list__bottom-el">
                        <div class="ttl">Как правильно ухаживать за бородой своего мужика</div>
                        <a class="btn-10" href="">Читать</a>
                    </div>
                </article>
            </div>
            <div class="item">
                <article class="article-list__col">
                    <img src="images/img-07.jpg" alt="">
                    <div class="article-list__contain">
                        <div class="article-list__soc">
                            <div class="ttl">Поделиться:</div>
                            <ul>
                                <li>
                                    <a class="vk" href=""></a>
                                </li>
                                <li>
                                    <a class="tw" href=""></a>
                                </li>
                                <li>
                                    <a class="fb" href=""></a>
                                </li>
                                <li>
                                    <a class="gp" href=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="article-list__bottom-el">
                        <div class="ttl">Как правильно ухаживать за бородой своего мужика</div>
                        <a class="btn-10" href="">Читать</a>
                    </div>
                </article>
            </div>
            <div class="item">
                <article class="article-list__col">
                    <img src="images/img-07.jpg" alt="">
                    <div class="article-list__contain">
                        <div class="article-list__soc">
                            <div class="ttl">Поделиться:</div>
                            <ul>
                                <li>
                                    <a class="vk" href=""></a>
                                </li>
                                <li>
                                    <a class="tw" href=""></a>
                                </li>
                                <li>
                                    <a class="fb" href=""></a>
                                </li>
                                <li>
                                    <a class="gp" href=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="article-list__bottom-el">
                        <div class="ttl">Как правильно ухаживать за бородой своего мужика</div>
                        <a class="btn-10" href="">Читать</a>
                    </div>
                </article>
            </div>
            <div class="item">
                <article class="article-list__col">
                    <img src="images/img-07.jpg" alt="">
                    <div class="article-list__contain">
                        <div class="article-list__soc">
                            <div class="ttl">Поделиться:</div>
                            <ul>
                                <li>
                                    <a class="vk" href=""></a>
                                </li>
                                <li>
                                    <a class="tw" href=""></a>
                                </li>
                                <li>
                                    <a class="fb" href=""></a>
                                </li>
                                <li>
                                    <a class="gp" href=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="article-list__bottom-el">
                        <div class="ttl">Как правильно ухаживать за бородой своего мужика</div>
                        <a class="btn-10" href="">Читать</a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</sectoin>