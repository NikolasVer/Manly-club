<?php

namespace common\models\ar;

use mongosoft\file\UploadBehavior;
use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property integer $city_id
 * @property string $name
 * @property string $type
 * @property string $phones
 * @property string $site
 * @property string $address
 * @property string $img
 * @property string $gmap
 * @property string $gmap_img
 * @property integer $priority
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id', 'priority'], 'integer'],
            [['name'], 'required'],
            [['name', 'type', 'phones', 'site', 'address'], 'string', 'max' => 255],
            [['gmap'], 'string', 'max' => 50],
            [['img', 'gmap_img'], 'file', 'extensions' => 'png, jpg']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'Город',
            'name' => 'Бренд',
            'type' => 'Тип',
            'phones' => 'Телефоны',
            'site' => 'Сайт',
            'address' => 'Адрес',
            'img' => 'Img',
            'gmap' => 'Google maps',
            'gmap_img' => 'Gmap Img',
            'priority' => 'Приоритет',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\queries\PartnerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\PartnerQuery(get_called_class());
    }

    function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'img',
                'scenarios' => [static::SCENARIO_DEFAULT],
                'path' => '@uploads/partners',
                'url' => '/uploads/partners',
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'gmap_img',
                'scenarios' => [static::SCENARIO_DEFAULT],
                'path' => '@uploads/partners',
                'url' => '/uploads/partners',
            ],
        ];
    }

}
