<?php

/* @var \yii\web\View $this */
/* @var \common\models\ar\Post $post */

?>

<div class="col-lg-3 col-md-4 col-sm-6">
    <article class="article-list__col">
        <?= \yii\helpers\Html::img($post->image_preview); ?>
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
            <div class="ttl text-center"><?= $post->title; ?></div>
            <?= \yii\helpers\Html::a('Читать', ['blog/post', 'slug' => $post->slug], ['class' => 'btn-10']); ?>
        </div>
    </article>
</div>
