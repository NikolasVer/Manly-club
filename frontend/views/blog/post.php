<?php

/* @var \yii\web\View $this */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var \common\models\ar\Post $post */
/* @var \common\models\ar\PostComment $commentModel */
/* @var array $comments */

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
                            <li><i class="ico-views"></i><?= $post->views; ?></li>
                            <li><i class="ico-comm"></i><?= count($comments); ?></li>
                        </ul>
                    </div>
                    <h1 class="blog-post__main-title"><?= $post->title; ?></h1>
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
                    <?php foreach ($comments as $comment): ?>
                        <?= $this->render('_post_comment', ['comment' => $comment]) ?>
                    <?php endforeach; ?>
                </ul>
                <div class="answer-form">
                    <?php $form = ActiveForm::begin([
                        'enableClientValidation' => FALSE
                    ]); ?>
                    <fieldset>
                        <?= Html::activeHiddenInput($commentModel, 'parent_id',
                            ['id' => 'comment_parent']); ?>
                        <?php if ( Yii::$app->user->isGuest ): ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($commentModel, 'author_name')
                                        ->textInput(['placeholder' => 'Ваше имя'])
                                        ->label(FALSE); ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($commentModel, 'author_email')
                                        ->textInput(['placeholder' => 'Ваш Email'])
                                        ->label(FALSE); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?= $form->field($commentModel, 'content')
                            ->textarea(['rows' => 10, 'cols' => 10])->label(FALSE); ?>
                        <div class="btn-box">
                            <span class="btn-12">отмена</span>
                            <input class="btn-11" type="submit" value="Ответить">
                        </div>
                    </fieldset>
                    <?php ActiveForm::end(); ?>
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
