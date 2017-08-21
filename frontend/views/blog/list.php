<?php

/* @var \yii\web\View $this */
/* @var \common\models\ar\Post[] $posts */

$this->params['bodyOptions'] = [
    'class' => 'body-color-grey'
];

$this->registerJs("$('.article-list__bottom-el').on('click', function() {
    window.location = $(this).find('a').attr('href');
})");

?>

<div class="container article-list">
    <div class="row">

        <?php foreach ($posts as $post): ?>
        <?= $this->render($post->display_type == $post::DISPLAY_DEFAULT
                ? '_list_item' : '_list_item_wide', ['post' => $post]); ?>
        <?php endforeach; ?>

    </div>
    <div class="article-list__pagination">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                <a class="prev" href=""><i></i>Предидущие</a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                <a class="next" href=""><i></i>Следующие</a>
            </div>
        </div>
    </div>
</div>
