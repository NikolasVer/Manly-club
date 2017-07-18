<?php

namespace common\queries;
use common\models\ar\ShopOrder;
use yii\base\Exception;

/**
 * This is the ActiveQuery class for [[\common\models\ar\ShopOrder]].
 *
 * @see \common\models\ar\ShopOrder
 */
class ShopOrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\ShopOrder[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\ShopOrder|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /***
     * @param integer $status
     * @return static
     */
    public function status($status)
    {
        return $this->andWhere([ShopOrder::tableName() . '.status' => $status]);
    }

    /***
     * @return static
     */
    public function current()
    {
        return $this->status(ShopOrder::STATUS_CURRENT);
    }

    /***
     * @param integer $user_id
     * @return static
     */
    public function byUserId($user_id)
    {
        return $this->andWhere([ShopOrder::tableName() . '.user_id' => $user_id]);
    }

    /***
     * @return static
     * @throws Exception
     */
    public function own()
    {
        if ( \Yii::$app->user->isGuest )
            throw new Exception('To user this option user need to be authorized');
        return $this->byUserId(\Yii::$app->user->id);
    }
}
