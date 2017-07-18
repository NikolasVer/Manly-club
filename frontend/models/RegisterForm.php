<?php

namespace frontend\models;


use common\models\User;
use yii\base\Model;

class RegisterForm extends Model
{

    public $email;
    public $password;
    public $rememberMe;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [['email'], 'trim'],
            [['email'], 'email'],
            [['password'], 'string', 'min' => 6],
            [['email'], 'unique', 'targetClass' => '\common\models\User',
                'message' => 'This email has already been taken.'],
            [['rememberMe'], 'boolean'],
            [['rememberMe'], 'default', 'value' => 1]
        ];
    }

    public function register()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if ( !$user->save() )
            return NULL;

        if ( $this->rememberMe )
            \Yii::$app->user->login($user);

        return $user;
    }

}