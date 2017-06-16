<?php

namespace common\queries;

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
}
