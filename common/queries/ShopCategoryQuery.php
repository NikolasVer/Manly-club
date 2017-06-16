<?php

namespace common\queries;

/**
 * This is the ActiveQuery class for [[\common\models\ar\ShopCategory]].
 *
 * @see \common\models\ar\ShopCategory
 */
class ShopCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\ShopCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\ShopCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
