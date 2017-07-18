<?php

namespace frontend\controllers;


use common\models\ar\Post;
use common\models\ar\PostComment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BlogController extends Controller
{

    public $defaultAction = 'list';

    public function actionList()
    {
        $posts = Post::find()->actual()->published()->sortByDate()->all();
        return $this->render('list', ['posts' => $posts]);
    }

    public function actionPost($slug)
    {
        $post = Post::find()->slug($slug)->actual()->published()->one();
        $post->updateCounters(['views' => 1]);

        if ( !$post )
            throw new NotFoundHttpException();

        $commentModel = new PostComment();

        if ( $commentModel->load(\Yii::$app->request->post()) ) {
            $commentModel->post_id = $post->id;
            if ( !\Yii::$app->user->isGuest )
                $commentModel->user_id = \Yii::$app->user->id;
            if ( $commentModel->save() )
                return $this->redirect(\Yii::$app->request->url);
        }

        $comments = PostComment::buildTree($post->getComments()
            ->with('author')
            ->active()
            ->dateSort()
            ->asArray()
            ->all());

        return $this->render('post', [
            'post' => $post,
            'commentModel' => $commentModel,
            'comments' => $comments
        ]);
    }

}