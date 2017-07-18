<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "shop_order_variety_assn".
 *
 * @property integer $id
 * @property integer $shop_order_id
 * @property integer $shop_product_variety_id
 * @property integer $amount
 */
class ShopOrderVarietyAssn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_order_variety_assn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_order_id', 'shop_product_variety_id'], 'required'],
            [['shop_order_id', 'shop_product_variety_id', 'amount'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_order_id' => 'Shop Order ID',
            'shop_product_variety_id' => 'Shop Product Variety ID',
            'amount' => 'Amount',
        ];
    }
}
