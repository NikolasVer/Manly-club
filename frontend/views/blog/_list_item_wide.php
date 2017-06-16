<?php

use yii\helpers\Html;

/* @var \yii\web\View $this */
/* @var \common\models\ar\Post $post */


?>

<div class="col-lg-6 col-md-8 col-sm-12 article-list__long">
    <article class="article-list__col article-list__long-left">
        <img src="<?= $post->image_preview; ?>" alt="">
        <div class="article-list__contain">
        </div>
        <div class="article-list__bottom-el">
            <div class="ttl text-center">
                <?= Html::a($post->title, ['blog/post', 'slug' => $post->slug]); ?>
            </div>
            <?= Html::a('Читать', ['blog/post', 'slug' => $post->slug], ['class' => 'btn-10']); ?>
        </div>
    </article>
    <article class="article-list__col no-img-bg dark article-list__long-right">
        <div class="article-list__contain">
            <div class="article-list__soc">
                <div class="ttl">Поделиться:</div>
                <ul class="black-icon">
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
            <div class="article-list__prew-text text-left">
                Первые три-четыре недели самые ленивые - пусть отращивает. Это позволит выявить любые неоднородные области, а длины волоса уже будет достаточно, чтобы подобрать самый неожиданный бородатый стиль. Скорее всего, при отращивании бороды Ваш мужчина столкнется
                с зудом и шелушением кожи. Именно поэтому Вы должны убедиться, что он держится
            </div>
        </div>
    </article>
</div>
