<?php

/* @var \yii\web\View $this */
/* @var array $comment */


//strftime('%e %b %G', $comment['comment']['created_at'])
?>

<li>
    <div class="img">
        <a href=""><img src="../images/img-17.jpg" alt=""></a>
    </div>
    <div class="txt">
        <div class="top-txt">
            <?php if ( $comment['comment']['author'] ): ?>
                <a class="name" href="#"><?= $comment['comment']['author']['firstname']
                    . ' ' . $comment['comment']['author']['lastname'] ?></a>
            <?php else: ?>
                <span class="name"><?= $comment['comment']['author_name'] ?></span>
            <?php endif; ?>
            <span class="time-status"><?= Yii::$app->formatter->asDate($comment['comment']['created_at']); ?></span>
        </div>
        <p><?= $comment['comment']['content']; ?></p>
        <ul class="icon-list">
            <li><a data-toggle="answer-comment" data-id="<?= $comment['comment']['id']; ?>"
                   href="javascript:void(0)" >
                    <i class="ico-answer active"></i></a></li>
        </ul>
    </div>
    <?php if ( count($comment['childs']) ) : ?>
        <ul>
            <?php foreach ($comment['childs'] as $child): ?>
                <?= $this->render('_product_comment', ['comment' => $child]); ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</li>
