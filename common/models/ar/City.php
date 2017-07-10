<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property integer $country_id
 * @property string $name
 * @property integer $priority
 * @property string $gmap
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id', 'name'], 'required'],
            [['country_id', 'priority'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['gmap'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'Country ID',
            'name' => 'Name',
            'priority' => 'Priority',
            'gmap' => 'Gmap',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\queries\CityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\CityQuery(get_called_class());
    }
}
