<?php

namespace common\queries;
use common\models\ar\ShopProductVarietyAttachment;

/**
 * This is the ActiveQuery class for [[\common\models\ar\ShopProductVarietyAttachment]].
 *
 * @see \common\models\ar\ShopProductVarietyAttachment
 */
class ShopProductVarietyAttachmentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\ShopProductVarietyAttachment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\ShopProductVarietyAttachment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /***
     * @param bool $desc
     * @return static
     */
    public function byPriority($desc = FALSE)
    {
        return $this->orderBy([ShopProductVarietyAttachment::tableName() . '.priority' => $desc
            ? SORT_DESC : SORT_ASC]);
    }

    /***
     * @param integer $id
     * @return static
     */
    public function byVarietyId($id)
    {
        return $this->andWhere([ShopProductVarietyAttachment::tableName() . '.shop_product_variety_id' => $id]);
    }

}
