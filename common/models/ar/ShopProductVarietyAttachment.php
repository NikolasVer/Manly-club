<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "shop_product_variety_attachment".
 *
 * @property integer $id
 * @property integer $shop_product_variety_id
 * @property integer $type
 * @property string $url_local
 * @property string $url_remote
 * @property integer $priority
 */
class ShopProductVarietyAttachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_product_variety_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_product_variety_id', 'type'], 'required'],
            [['shop_product_variety_id', 'type', 'priority'], 'integer'],
            [['url_local', 'url_remote'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_product_variety_id' => 'Shop Product Variety ID',
            'type' => 'Type',
            'url_local' => 'Url Local',
            'url_remote' => 'Url Remote',
            'priority' => 'Priority',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\queries\ShopProductVarietyAttachmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\ShopProductVarietyAttachmentQuery(get_called_class());
    }
}
