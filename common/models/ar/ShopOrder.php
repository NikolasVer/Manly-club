<?php

namespace common\models\ar;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "shop_order".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property string $city
 * @property string $street
 * @property string $house_number
 * @property string $apartment_number
 * @property string $np_number
 * @property string $comment
 * @property double $cost_amount
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ShopProductVariety[] $varieties
 */
class ShopOrder extends \yii\db\ActiveRecord
{

    const STATUS_CURRENT = 10;
    const STATUS_DELETED = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_order';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['cost_amount'], 'number'],
            [['firstname', 'lastname', 'email', 'phone', 'city', 'street', 'house_number',
                'apartment_number', 'np_number'], 'string', 'max' => 255],
            [['comment'], 'string', 'max' => 400],
            ['status', 'default', 'value' => static::STATUS_CURRENT]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'phone' => 'Phone',
            'city' => 'City',
            'street' => 'Street',
            'house_number' => 'House Number',
            'apartment_number' => 'Apartment Number',
            'np_number' => 'Np Number',
            'comment' => 'Comment',
            'cost_amount' => 'Cost Amount',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\queries\ShopOrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\ShopOrderQuery(get_called_class());
    }

    public function getVarietyAssns()
    {
        return $this->hasMany(ShopOrderVarietyAssn::className(), ['shop_order_id' => 'id']);
    }

    public function getVarieties()
    {
        return $this->hasMany(ShopProductVariety::className(), ['id' => 'shop_product_variety_id'])
            ->via('categoryProductAssn');
    }
}
