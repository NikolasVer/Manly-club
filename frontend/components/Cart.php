<?php

namespace frontend\components;


use common\models\ar\ShopOrder;
use common\models\ar\ShopOrderVarietyAssn;
use yii\base\Component;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;
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
        $cookieVal = \Yii::$app->request->cookies->getValue($this->cookieName, NULL);
        $cookieVal = $cookieVal === NULL ? [] : json_decode($cookieVal, TRUE);

        if ( \Yii::$app->user->isGuest ) {
            $this->_items = $cookieVal;
            return;
        }

        $order = ShopOrder::find()->current()->own()
            ->select(['id'])->asArray()->one();
        if ( $order ) {
            $this->_items = ArrayHelper::map(ShopOrderVarietyAssn::find()
                ->where(['shop_order_id' => $order['id']])
                ->select(['shop_product_variety_id', 'amount'])
                ->asArray()->all(), 'shop_product_variety_id', 'amount');
        }

        if ( $cookieVal ) {
            \Yii::$app->response->cookies->remove($this->cookieName);
            foreach ($cookieVal as $id => $amount) {
                $this->_items[$id] = $amount;
            }
        }

    }

    public function save()
    {
        if ( \Yii::$app->user->isGuest ) {
            \Yii::$app->response->cookies->add(new Cookie([
                'name' => $this->cookieName,
                'value' => json_encode($this->_items)
            ]));
            return;
        }

        if ( !count($this->_items) )
            return;

        $order = ShopOrder::find()->current()
            ->own()
            ->select(['id'])->asArray()->one();
        if ( !$order ) {
            $order = new ShopOrder(['user_id' => \Yii::$app->user->id]);
            $order->save();
        }

        ShopOrderVarietyAssn::deleteAll(['shop_order_id' => $order['id']]);
        $insert = [];
        foreach ($this->_items as $id => $amount) {
            $insert[] = [$order['id'], $id, $amount];
        }
        \Yii::$app->db->createCommand()->batchInsert(ShopOrderVarietyAssn::tableName(),
            ['shop_order_id', 'shop_product_variety_id', 'amount'], $insert)->execute();

    }

}