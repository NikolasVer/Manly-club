<?php

namespace frontend\controllers;


use common\models\ar\Post;
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

        if ( !$post )
            throw new NotFoundHttpException();

        return $this->render('post', ['post' => $post]);
    }

}