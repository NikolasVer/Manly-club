<?php

namespace common\queries;
use common\models\ar\ShopCategory;

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

    /***
     * @param integer $status
     * @return static
     */
    public function status($status)
    {
        return $this->andWhere([ShopCategory::tableName() . '.status' => $status]);
    }

    /**
     * @return static
     */
    public function active()
    {
        return $this->status(ShopCategory::STATUS_ACTIVE);
    }

    /***
     * @return static
     */
    public function root()
    {
        return $this->andWhere([ShopCategory::tableName() . '.parent_id' => NULL]);
    }

    /***
     * @param bool $desc
     * @return static
     */
    public function priority($desc = FALSE)
    {
        return $this->orderBy([ShopCategory::tableName() . '.priority' => $desc ? SORT_DESC : SORT_ASC]);
    }


    /***
     * @param bool $show
     * @return static
     */
    public function landing($show = TRUE)
    {
        return $this->andWhere([ShopCategory::tableName() . '.show_in_landing' => (boolean)$show]);
    }

}
