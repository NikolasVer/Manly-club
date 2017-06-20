<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "shop_product_variety".
 *
 * @property integer $id
 * @property integer $shop_product_id
 * @property string $code
 * @property double $volume
 * @property double $cost
 *
 * @property ShopProduct $product
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
            [['shop_product_id', 'code', 'volume', 'cost'], 'required'],
            [['shop_product_id'], 'integer'],
            [['volume', 'cost'], 'number'],
            [['code'], 'string', 'max' => 20],
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
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(ShopProduct::className(), ['id' => 'shop_product_id']);
    }

}
