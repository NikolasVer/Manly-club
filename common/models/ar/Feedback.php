<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property integer $id
 * @property integer $shop_product_id
 * @property string $author_name
 * @property string $author_email
 * @property string $content
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_product_id'], 'integer'],
            [['content'], 'required'],
            [['author_name', 'author_email'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 500],
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
            'author_name' => 'Author Name',
            'author_email' => 'Author Email',
            'content' => 'Content',
        ];
    }
}
