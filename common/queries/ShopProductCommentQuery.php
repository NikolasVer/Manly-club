<?php

namespace common\queries;
use common\models\ar\ShopProductComment;

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


    /***
     * @param integer $status
     * @return static
     */
    public function status($status)
    {
        return $this->andWhere([ShopProductComment::tableName() . '.status' => $status]);
    }

    /***
     * @return static
     */
    public function active()
    {
        return $this->status(ShopProductComment::STATUS_ACTIVE);
    }

    /***
     * @param bool $asc
     * @return static
     */
    public function dateSort($asc = FALSE)
    {
        return $this->orderBy([ShopProductComment::tableName() . '.created_at' => $asc ? SORT_ASC : SORT_DESC]);
    }

}
