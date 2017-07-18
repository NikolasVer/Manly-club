<?php

namespace common\queries;
use common\models\ar\PostComment;

/**
 * This is the ActiveQuery class for [[\common\models\ar\PostComment]].
 *
 * @see \common\models\ar\PostComment
 */
class PostCommentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\PostComment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\PostComment|array|null
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
        return $this->andWhere([PostComment::tableName() . '.status' => $status]);
    }

    /***
     * @return static
     */
    public function active()
    {
        return $this->status(PostComment::STATUS_ACTIVE);
    }

    /***
     * @param bool $asc
     * @return static
     */
    public function dateSort($asc = FALSE)
    {
        return $this->orderBy([PostComment::tableName() . '.created_at' => $asc ? SORT_ASC : SORT_DESC]);
    }
}
