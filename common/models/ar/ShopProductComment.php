<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "shop_product_comment".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $shop_product_id
 * @property integer $user_id
 * @property string $author_name
 * @property string $author_email
 * @property string $content
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class ShopProductComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_product_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'shop_product_id', 'user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['shop_product_id', 'content'], 'required'],
            [['content'], 'string'],
            [['author_name', 'author_email'], 'string', 'max' => 255],
            [['author_name', 'author_email'], 'required', 'when' => function ( $m ) {/* @var static $m */
                return $m->user_id == NULL;
            }]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'shop_product_id' => 'Shop Product ID',
            'user_id' => 'User ID',
            'author_name' => 'Author Name',
            'author_email' => 'Author Email',
            'content' => 'Content',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\queries\ShopProductCommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\ShopProductCommentQuery(get_called_class());
    }
}
