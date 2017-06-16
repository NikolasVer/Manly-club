<?php

namespace common\queries;

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
}
