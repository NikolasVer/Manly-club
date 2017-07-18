<?php

namespace frontend\controllers;


use frontend\models\LoginForm;
use frontend\models\RegisterForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class AccountController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'register'],
                'rules' => [
                    [
                        'actions' => ['register'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'login' => ['post'],
                    'register' => ['post'],
                ],
            ],
        ];
    }


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {

        } else {

        }
        return $this->goBack();
    }

    public function actionRegister()
    {
        if ( !Yii::$app->user->isGuest )
            return $this->goHome();

        $model = new RegisterForm();

        if ( $model->load(Yii::$app->request->post(), '') && $model->register() ) {

        } else {
            var_dump($model->errors);
            exit;
        }

        return $this->goBack();
    }

}