<?php

namespace frontend\components;


use yii\base\Component;
use yii\web\Application;
use yii\web\Cookie;

class Cart extends Component
{

    public $cookieName = 'cart';

    protected $_items = [];

    public function init()
    {
        parent::init();

        \Yii::$app->on(Application::EVENT_AFTER_REQUEST, function() {
            $this->save();
        });
        \Yii::$app->on(Application::EVENT_BEFORE_REQUEST, function() {
            $this->load();
        });
    }


    /***
     * @param $id
     * @param integer $count
     * @return integer
     */
    public function addItem($id, $count = 1)
    {
        if( $count < 1 )
            $count = 0;
        if ( !isset($this->_items[$id]) )
            $this->_items[$id] = 0;
        $this->_items[$id] += $count;
        return $this->_items[$id];
    }

    /***
     * @param $id
     * @param bool|integer $count
     * @return integer
     */
    public function removeItem($id, $count = FALSE)
    {
        if ( !isset($this->_items[$id]) )
            return 0;
        if ( $count === FALSE ) {
            unset($this->_items[$id]);
            return 0;
        }
        $this->_items[$id] -= $count;
        return $this->_items[$id];
    }


    public function getItems()
    {
        return $this->_items;
    }


    public function load()
    {
        if ( \Yii::$app->user->isGuest ) {
            $val = \Yii::$app->request->cookies->getValue($this->cookieName, NULL);
            $this->_items = $val === NULL ? [] : json_decode($val, TRUE);
        }
    }

    public function save()
    {
        if ( \Yii::$app->user->isGuest ) {
            \Yii::$app->response->cookies->add(new Cookie([
                'name' => $this->cookieName,
                'value' => json_encode($this->_items)
            ]));
        }
    }

}