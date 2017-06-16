<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "shop_category_product_assn".
 *
 * @property integer $id
 * @property integer $shop_category_id
 * @property integer $shop_product_id
 *
 * @property ShopCategory $category
 * @property ShopProduct $product
 */
class ShopCategoryProductAssn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_category_product_assn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_category_id', 'shop_product_id'], 'required'],
            [['shop_category_id', 'shop_product_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_category_id' => 'Shop Category ID',
            'shop_product_id' => 'Shop Product ID',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(ShopCategory::className(), ['id' => 'shop_category_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(ShopProduct::className(), ['id' => 'shop_product_id']);
    }
}
