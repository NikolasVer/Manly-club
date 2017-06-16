<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.06.17
 * Time: 16:04
 */

namespace common\queries;


use common\models\ar\Post;
use yii\db\ActiveQuery;

class PostQuery extends ActiveQuery
{

    /***
     * @param integer $status
     * @return static
     */
    public function status($status)
    {
        return $this->andWhere([Post::tableName() . '.status' => $status]);
    }

    /***
     * @return static
     */
    public function published()
    {
        return $this->status(Post::STATUS_PUBLISHED);
    }

    /***
     * @param bool|integer $customDate
     * @return static
     */
    public function actual($customDate = FALSE)
    {
        if ( $customDate === FALSE )
            $customDate = time();
        return $this->andWhere(['<=', Post::tableName() . '.publish_at', $customDate]);
    }

    public function sortByDate($asc = FALSE)
    {
        return $this->orderBy([Post::tableName() . '.publish_at' => $asc ? SORT_ASC : SORT_DESC]);
    }

    public function slug($slug)
    {
        return $this->andWhere([Post::tableName() . '.slug' => $slug]);
    }

}