<?php

namespace common\models\ar;

use common\models\User;
use common\queries\ShopProductCommentQuery;
use Yii;
use yii\behaviors\TimestampBehavior;

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
 *
 * @property User $author
 */
class ShopProductComment extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 10;
    const STATUS_DELETED = 9;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_product_comment';
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
            [['parent_id', 'shop_product_id', 'user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['shop_product_id', 'content'], 'required'],
            [['content'], 'string'],
            [['author_name', 'author_email'], 'string', 'max' => 255],
            [['author_name', 'author_email'], 'required', 'when' => function ( $m ) {/* @var static $m */
                return $m->user_id == NULL;
            }],
            [['status'], 'default', 'value' => static::STATUS_ACTIVE],
            [['status'], 'in', 'range' => array_keys(static::statusLabels())]
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
            'shop_product_id' => 'Товар',
            'user_id' => 'Пользователь',
            'author_name' => 'Имя автора',
            'author_email' => 'Email автора',
            'content' => 'Контент',
            'status' => 'Статус',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }

    /**
     * @inheritdoc
     * @return ShopProductCommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopProductCommentQuery(get_called_class());
    }

    public static function statusLabels()
    {
        return [
            static::STATUS_ACTIVE => 'Активен',
            static::STATUS_DELETED => 'Удален'
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function buildTree($comments, $parentId = NULL)
    {
        $results = [];

        foreach ( $comments as $comment ) {
            if ( $comment['parent_id'] != $parentId )
                continue;
            $results[] = [
                'comment' => $comment,
                'childs' => static::buildTree($comments, $comment['id'])
            ];
        }
        return $results;
    }

}
