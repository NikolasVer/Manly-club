<?php

namespace common\models\ar;

use common\behaviors\SluggableBehavior;
use Yii;

/**
 * This is the model class for table "shop_product".
 *
 * @property integer $id
 * @property integer $shop_faq_id
 * @property string $name
 * @property string $description_cut
 * @property string $description_full
 * @property string $slug
 * @property integer $status
 *
 * @property string $statusLabel
 * @property ShopCategoryProductAssn[] $categoryProductAssns
 * @property ShopCategory[] $categories
 * @property ShopProductVariety[] $varieties
 */
class ShopProduct extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 10;//default in db
    const STATUS_HIDDEN = 1;
    const STATUS_DELETED = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_product';
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
            [['shop_faq_id', 'status'], 'integer'],
            [['name'], 'required'],
            [['description_cut', 'description_full'], 'string'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['status'], 'in', 'range' => array_keys(static::statusLabels())],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_faq_id' => 'FAQ',
            'name' => 'Название',
            'description_cut' => 'Описание в каталоге',
            'description_full' => 'Описание в товаре',
            'slug' => 'URL',
            'status' => 'Состояние',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\queries\ShopProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\ShopProductQuery(get_called_class());
    }

    public static function statusLabels()
    {
        return [
            static::STATUS_ACTIVE => 'Активен',
            static::STATUS_HIDDEN => 'Скрыт',
            static::STATUS_DELETED => 'Удален'
        ];
    }

    public function getStatusLabel()
    {
        return static::statusLabels()[$this->status];
    }

    public function getCategoryProductAssns()
    {
        return $this->hasMany(ShopCategoryProductAssn::className(), ['shop_product_id' => 'id']);
    }

    public function getCategories()
    {
        return $this->hasMany(ShopCategory::className(), ['id' => 'shop_category_id'])
            ->via('categoryProductAssn');
    }

    public function getVarieties()
    {
        return $this->hasMany(ShopProductVariety::className(), ['shop_product_id' => 'id']);
    }
}
