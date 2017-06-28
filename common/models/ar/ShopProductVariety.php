<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "shop_product_variety".
 *
 * @property integer $id
 * @property integer $shop_product_id
 * @property string $code
 * @property string $volume
 * @property double $cost
 * @property integer $priority
 *
 * @property ShopProduct $product
 * @property ShopProductVarietyAttachment[] $attachments
 */
class ShopProductVariety extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_product_variety';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_product_id', 'volume', 'cost'], 'required'],
            [['shop_product_id'], 'integer'],
            [['cost'], 'number'],
            [['code'], 'string', 'max' => 20],
            [['volume'], 'string', 'max' => 100],
            [['code'], 'default', 'value' => ''],
            [['priority'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_product_id' => 'Shop Product ID',
            'code' => 'Код товара',
            'volume' => 'Объем',
            'cost' => 'Стоимость',
            'priority' => 'Приоритет',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\queries\ShopProductVarietyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\ShopProductVarietyQuery(get_called_class());
    }

    public function getProduct()
    {
        return $this->hasOne(ShopProduct::className(), ['id' => 'shop_product_id']);
    }

    public function getAttachments()
    {
        return $this->hasMany(ShopProductVarietyAttachment::className(),
            ['shop_product_variety_id' => 'id']);
    }

}
