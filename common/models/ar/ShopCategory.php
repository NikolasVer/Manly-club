<?php

namespace common\models\ar;

use common\behaviors\SluggableBehavior;
use Yii;

/**
 * This is the model class for table "shop_category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $priority
 * @property integer $status
 * @property string $name
 * @property string $slug
 *
 * @property string $statusLabel
 * @property ShopCategoryProductAssn[] $categoryProductAssns
 * @property ShopProduct[] $products
 */
class ShopCategory extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 10;//default in db
    const STATUS_DELETED = 0;
    const STATUS_HIDDEN = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_category';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'ensureUnique' => TRUE,
                'immutable' => TRUE
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'priority', 'status'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['status'], 'in', 'range' => array_keys(static::statusLabels())],
            [['priority'], 'default', 'value' => 0]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'priority' => 'Приоритет',
            'status' => 'Состояние',
            'name' => 'Название',
            'slug' => 'Url',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\queries\ShopCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\ShopCategoryQuery(get_called_class());
    }

    public static function statusLabels()
    {
        return [
            static::STATUS_ACTIVE => 'Активная',
            static::STATUS_HIDDEN => 'Скрытая',
            static::STATUS_DELETED => 'Удалена'
        ];
    }

    public function getStatusLabel()
    {
        return static::statusLabels()[$this->status];
    }

    public function getCategoryProductAssns()
    {
        return $this->hasMany(ShopCategoryProductAssn::className(), ['shop_category_id' => 'id']);
    }

    public function getProducts()
    {
        return $this->hasMany(ShopProduct::className(), ['id' => 'shop_product_id'])
            ->via('categoryProductAssn');
    }

}
