<?php

namespace common\queries;

/**
 * This is the ActiveQuery class for [[\common\models\ar\ShopProductComment]].
 *
 * @see \common\models\ar\ShopProductComment
 */
class ShopProductCommentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\ShopProductComment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\ShopProductComment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
