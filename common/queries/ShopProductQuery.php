<?php

namespace common\queries;
use common\models\ar\ShopProduct;

/**
 * This is the ActiveQuery class for [[\common\models\ar\ShopProduct]].
 *
 * @see \common\models\ar\ShopProduct
 */
class ShopProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\ShopProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\ShopProduct|array|null
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
        return $this->andWhere([ShopProduct::tableName() . '.status' => $status]);
    }

    /***
     * @return static
     */
    public function active()
    {
        return $this->status(ShopProduct::STATUS_ACTIVE);
    }

    /***
     * @param string $slug
     * @return static
     */
    public function slug($slug)
    {
        return $this->andWhere([ShopProduct::tableName() . '.slug' => $slug]);
    }

}
