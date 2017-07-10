<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $name
 * @property integer $priority
 * @property string $gmap
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['priority'], 'integer'],
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
            'name' => 'Name',
            'priority' => 'Priority',
            'gmap' => 'Gmap',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\queries\CountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\CountryQuery(get_called_class());
    }

    public function getCities()
    {
        return $this->hasMany(City::className(), ['country_id' => 'id']);
    }
}
