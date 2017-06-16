<?php

/* @var \yii\web\View $this */
/* @var \common\models\ar\Post $post */

?>
<section class="blog-post">
    <div class="container">
        <div class="blog-post__baner">
            <img src="<?= $post->image; ?>" alt="">
            <i class="ico-close"></i>
            <div class="row blog-post__baner-text">
                <div class="col-lg-8 col-md-8 blog-post__baner-title">
                    <div class="blog-post__icon-inf">
                        <ul>
                            <li><i class="ico-day"></i>2 дня назад</li>
                            <li><i class="ico-views"></i>132</li>
                            <li><i class="ico-comm"></i>24</li>
                        </ul>
                    </div>
                    <h1 class="blog-post__main-title">Гайд для прекрасной половины человечества<br> или как правильно ухаживать за бородой своего мужика</h1>
                </div>
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
                        <li>
                            <a class="gp" href=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="blog-post__main-information">
            <div class="blog-post__main-text">
                <?= $post->content; ?>
            </div>
            <aside class="blog-post__sidebar hidden-sm">
                <div class="sidebar__ttl text-center">также читайте:</div>
                <div class="article-list">
                    <div class="article-list__col">
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
                            <div class="ttl text-center">Как правильно ухаживать за бородой своего мужика</div>
                            <a class="btn-01" href="">Читать</a>
                        </div>
                    </div>
                    <div class="article-list__col">
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
                            <div class="ttl text-center">Как правильно ухаживать за бородой своего мужика</div>
                            <a class="btn-01" href="">Читать</a>
                        </div>
                    </div>
                </div>
                <div class="blog-post__banner-sidebar">
                    <a href=""><img src="images/img-16.jpg" alt=""></a>
                </div>
            </aside>
        </div>
        <div class="blog-post__comments">
            <div class="blog-post__comments-text">
                <div class="blog-post__ttl-mob text-center visible-sm">Комментарии:</div>
                <ul class="comment-list">
                    <li>
                        <div class="img">
                            <a href=""><img src="images/img-17.jpg" alt=""></a>
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
                            <a href=""><img src="images/img-17.jpg" alt=""></a>
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
                            <a href=""><img src="images/img-17.jpg" alt=""></a>
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
                                <input class="btn-11" value="Ответить" type="submit">
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
</section>
