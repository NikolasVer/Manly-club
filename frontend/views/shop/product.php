<?php

use yii\helpers\Html;

/* @var \yii\web\View $this */
/* @var \common\models\ar\ShopProduct $model */

$this->params['bodyOptions'] = [
    'class' => 'body-color-grey-blog'
];

?>

<article class="product">
    <div class="container">
        <div class="groups-data">
            <?php foreach ( $model->varieties as $i => $variety ): ?>
            <div id="group-<?= $variety->id; ?>" <?= $i == 0 ? 'class="active"' : ''; ?>>
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <div class="product__slider">
                            <div class="top-iocn visible-md">
                                <div class="social-icons hidden-sm">
                                    <span>Поделится:</span>
                                    <ul class="ico-soc-01">
                                        <li>
                                            <a class="vk" href=""></a>
                                        </li>
                                        <li>
                                            <a class="tw" href=""></a>
                                        </li>
                                        <li>
                                            <a class="fb" href=""></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-icons">
                                    <ul class="product__icons">
                                        <li class="visible-sm"><i class="ico-social"></i></li>
                                        <li><a class="fancybox-02" href="#popup-delivery"><span class="ico-delivery"></span></a></li>
                                        <li><span class="ico-faq"></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product__slide-title text-center visible-md">
                                <?= $model->name; ?></div>
                            <div id="sync1" class="product__slider-big sync1">
                                <?php foreach ($variety->attachments as $attachment): ?>
                                    <div class="item">
                                        <img src="<?= $attachment->url_local
                                            ? : $attachment->url_remote; ?>" alt="">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div id="sync2" class="product__slider-min sync2">
                                <?php foreach ($variety->attachments as $attachment): ?>
                                    <div class="item">
                                        <img src="<?= $attachment->url_local
                                            ? : $attachment->url_remote; ?>" alt="">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="product__description">
                            <div class="top-iocn hidden-md">
                                <div class="social-icons">
                                    <span>Поделится:</span>
                                    <ul class="ico-soc-01">
                                        <li>
                                            <a class="vk" href=""></a>
                                        </li>
                                        <li>
                                            <a class="tw" href=""></a>
                                        </li>
                                        <li>
                                            <a class="fb" href=""></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-icons">
                                    <ul class="product__icons">
                                        <li class="visible-sm"><i class="ico-social"></i></li>
                                        <li><a class="fancybox-02" href="#popup-delivery"><span class="ico-delivery"></span></a></li>
                                        <?php if($model->shop_faq_id): ?>
                                        <li><?= Html::a('', ['shop/faq', 'productSlug' => $model->slug],
                                                ['class' => 'ico-faq']); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <h1 class="ttl hidden-md"><?= $model->name; ?></h1>
                            <div class="price hidden-md">₴ <?= $variety->cost; ?></div>
                            <div class="product__text-information">
                                <?= $model->description_full; ?>
                            </div>
                            <div class="bottom-inf visible-xs">
                                <a class="btn-03" href="">В Корзину</a>
                            </div>
                            <div class="row bottom-inf">
                                <div class="col-lg-0 col-md-0 col-sm-4 col-xs-4 visible-md">
                                    <div class="price">₴ <?= $variety->cost; ?></div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-3 col-xs-4">
                                    <div class="shop__swich">
                                        <ul class="groups">
                                            <?php foreach ($model->varieties as
                                                           $i => $variety): ?>
                                                <li>
                                                    <a href="#"
                                                       data-id="<?= $variety->id; ?>"
                                                       <?= $i == 0
                                                           ? 'class="active"' : ''; ?>
                                                    ><?= $variety->volume ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-4">
                                    <div class="input-number">
                                        <span class="input-number__plus">+</span>
                                        <input class="input-number__digit" type="text" value="1" />
                                        <span class="input-number__minus">-</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                    <a class="btn-03" href="">В Корзину</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="product__bottom-tab" id="product-bottom-tab">
            <div class="shop__swich">
                <ul class="text-center groups2">
                    <li><a data-id="6" class="active" href="">Лента</a></li>
                    <li><a data-id="7" href="">Отзывы</a></li>
                    <li><a data-id="8" href="">Написать мне</a></li>
                </ul>
            </div>
            <div class="groups-data2">
                <div id="group-6" class="active">
                    <div class="product__tape">
                        <div class="top-inf">
                            Здесь будут отображаться ваши посты которые вы оставляете в таких социальных сетях <br>
                            <span>как -</span>
                            <ul class="ico-soc-02">
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
                                <li>
                                    <a class="inst" href=""></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product__hashtag">
                            <span>Под постом с нашей продукцией пишите хештег -</span>
                            <ul class="hashtag-list">
                                <li><a href="">#Manly_Club</a></li>
                                <li><a href="">#Manly</a></li>
                                <li><a href="">#ManlyWax</a></li>
                                <li><a href="">#Manly_Stuff</a></li>
                            </ul>
                        </div>
                        <div class="product__tape-list row">
                            <div class="col-lg-3 col-md-3 col-sm-4">
                                <div class="product__tape-item">
                                    <div class="img">
                                        <img src="../images/img-32.jpg" alt="">
                                    </div>
                                    <div class="bottom-inf">
                                        <div class="text-center">
                                            <div class="avatar"><span><a href=""><img src="../images/img-33.png" alt=""></a></span></div>
                                            <div class="name"><a href="">Александр Иванович</a></div>
                                            <div class="date">2 дня назад</div>
                                        </div>
                                        <div class="hashtag">
                                            <i class="icon-insta"></i>
                                            <ul class="hashtag-list">
                                                <li><a href="">#Manly_Club</a></li>
                                                <li><a href="">#Manly</a></li>
                                                <li><a href="">#ManlyWax</a></li>
                                                <li><a href="">#Manly_Stuff</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4">
                                <div class="product__tape-item">
                                    <div class="img">
                                        <img src="../images/img-32.jpg" alt="">
                                    </div>
                                    <div class="bottom-inf">
                                        <div class="text-center">
                                            <div class="avatar"><span><a href=""><img src="../images/img-33.png" alt=""></a></span></div>
                                            <div class="name"><a href="">Александр Иванович</a></div>
                                            <div class="date">2 дня назад</div>
                                        </div>
                                        <div class="hashtag">
                                            <i class="icon-insta"></i>
                                            <ul class="hashtag-list">
                                                <li><a href="">#Manly_Club</a></li>
                                                <li><a href="">#Manly</a></li>
                                                <li><a href="">#ManlyWax</a></li>
                                                <li><a href="">#Manly_Stuff</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4">
                                <div class="product__tape-item">
                                    <div class="img">
                                        <img src="../images/img-32.jpg" alt="">
                                    </div>
                                    <div class="bottom-inf">
                                        <div class="text-center">
                                            <div class="avatar"><span><a href=""><img src="../images/img-33.png" alt=""></a></span></div>
                                            <div class="name"><a href="">Александр Иванович</a></div>
                                            <div class="date">2 дня назад</div>
                                        </div>
                                        <div class="hashtag">
                                            <i class="icon-insta"></i>
                                            <ul class="hashtag-list">
                                                <li><a href="">#Manly_Club</a></li>
                                                <li><a href="">#Manly</a></li>
                                                <li><a href="">#ManlyWax</a></li>
                                                <li><a href="">#Manly_Stuff</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 hidden-md">
                                <div class="product__tape-item">
                                    <div class="img">
                                        <img src="../images/img-32.jpg" alt="">
                                    </div>
                                    <div class="bottom-inf">
                                        <div class="text-center">
                                            <div class="avatar"><span><a href=""><img src="../images/img-33.png" alt=""></a></span></div>
                                            <div class="name"><a href="">Александр Иванович</a></div>
                                            <div class="date">2 дня назад</div>
                                        </div>
                                        <div class="hashtag">
                                            <i class="icon-insta"></i>
                                            <ul class="hashtag-list">
                                                <li><a href="">#Manly_Club</a></li>
                                                <li><a href="">#Manly</a></li>
                                                <li><a href="">#ManlyWax</a></li>
                                                <li><a href="">#Manly_Stuff</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="group-7">
                    <div class="blog-post__comments">
                        <div class="blog-post__comments-text">
                            <div class="blog-post__ttl-mob text-center visible-sm">Комментарии:</div>
                            <ul class="comment-list">
                                <li>
                                    <div class="img">
                                        <a href=""><img src="../images/img-17.jpg" alt=""></a>
                                    </div>
                                    <div class="txt">
                                        <div class="top-txt">
                                            <a class="name" href="">User Name</a>
                                            <span class="time-status">Неделю назад</span>
                                        </div>
                                        <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus
                                            a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.</p>
                                        <ul class="icon-list">
                                            <li><a href=""><i class="ico-answer active"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="answer-comment">
                                    <div class="img">
                                        <a href=""><img src="../images/img-17.jpg" alt=""></a>
                                    </div>
                                    <div class="txt">
                                        <div class="top-txt">
                                            <a class="name" href="">User Name</a>
                                            <span class="time-status">Неделю назад</span>
                                        </div>
                                        <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean</p>
                                        <ul class="icon-list">
                                            <li><a href=""><i class="ico-answer"></i></a></li>
                                            <li><a href=""><i class="ico-edit"></i></a></li>
                                            <li><a href=""><i class="ico-delete"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="img">
                                        <a href=""><img src="../images/img-17.jpg" alt=""></a>
                                    </div>
                                    <div class="txt">
                                        <div class="top-txt">
                                            <a class="name" href="">User Name</a>
                                            <span class="time-status">Неделю назад</span>
                                        </div>
                                        <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate </p>
                                        <ul class="icon-list">
                                            <li><a href=""><i class="ico-answer"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <div class="answer-form">
                                <form action="">
                                    <fieldset>
                                        <textarea id="" cols="10" rows="10"></textarea>
                                        <div class="btn-box">
                                            <span class="btn-12">отмена</span>
                                            <input class="btn-11" type="submit" value="Ответить">
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="blog-post__comments-form">
                            <div class="blog-post__form">
                                <form action="">
                                    <fieldset>
                                        <div class="ttl text-center">Оставить отзыв</div>
                                        <input class="about-us__form-input" placeholder="Имя" type="text">
                                        <input class="about-us__form-input" placeholder="Email" type="email">
                                        <textarea class="about-us__form-input" name="massage" rows="8" cols="40" placeholder="Сообщение"></textarea>
                                        <div class="text-right">
                                            <input class="btn-02" value="Отправить" type="submit">
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="group-8">
                    <div class="blog-post__comments write-me">
                        <div class="blog-post__comments-text">
                            <div class="write-me__main-inf text-center">
                                <div class="avatar"><span><img src="../images/img-34.png" alt=""></span></div>
                                <div class="article-list__soc">
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
                                    </ul>
                                </div>
                                <div class="name">Владимир Дибчак</div>
                                <div class="sub-inf">Владелец компании “Manly Club”</div>
                                <p>Если у вас есть какой либо вопрос или предложение по данному<br> продукту вы можете оставить сообщение здесь или связаться сомной<br> через социальные сети.<br> Постараюсь как можно быстрее ответить</p>
                            </div>
                        </div>
                        <div class="blog-post__comments-form">
                            <form action="">
                                <fieldset>
                                    <div class="ttl text-center">Написать мне</div>
                                    <input class="about-us__form-input" placeholder="Имя" type="text">
                                    <input class="about-us__form-input" placeholder="Email" type="email">
                                    <textarea class="about-us__form-input" name="massage" rows="8" cols="40" placeholder="Сообщение"></textarea>
                                    <div class="text-right">
                                        <input class="btn-02" value="Отправить" type="submit">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
