<?php

namespace common\models\ar;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\behaviors\SluggableBehavior;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $excerpt
 * @property string $content
 * @property string $image
 * @property string $image_preview
 * @property integer $display_type
 * @property integer $status
 * @property string $slug
 * @property integer $publish_at
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $views
 *
 * @property string $statusLabel
 * @property string $displayTypeLabel
 */
class Post extends \yii\db\ActiveRecord
{

    const DISPLAY_DEFAULT = 1;//default in db
    const DISPLAY_WIDE = 2;

    const STATUS_PUBLISHED = 10;//default in db
    const STATUS_DRAFT = 9;
    const STATUS_DELETED = 0;

    const IMG_DIR_SIZE = 50;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
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
            [['excerpt', 'content'], 'string'],
            [['display_type', 'status', 'created_at', 'updated_at', 'views'], 'integer'],
            [['title', 'image', 'image_preview', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['display_type'], 'in', 'range' => array_keys(static::displayTypeLabels())],
            [['status'], 'in', 'range' => array_keys(static::statusLabels())],
            [['publish_at'], 'date', 'format' => Yii::$app->formatter->datetimeFormat,
                'timestampAttribute' => 'publish_at'],
            [['views'], 'default', 'value' => 0]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'excerpt' => 'Кратк. содержание',
            'content' => 'Содержание',
            'image' => 'Изображение в посте',
            'image_preview' => 'Изображение в блоге',
            'display_type' => 'Формат отображения',
            'status' => 'Состояние',
            'slug' => 'Url',
            'publish_at' => 'Дата публикации',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
            'views' => 'Просмотры'
        ];
    }

    /**
     * @inheritdoc
     * @return \common\queries\PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\PostQuery(get_called_class());
    }

    public static function displayTypeLabels()
    {
        return [
            static::DISPLAY_DEFAULT => 'Обычный',
            static::DISPLAY_WIDE => 'Широкий',
        ];
    }

    public static function statusLabels()
    {
        return [
            static::STATUS_PUBLISHED => 'Опубликовано',
            static::STATUS_DRAFT => 'Черновик',
            static::STATUS_DELETED => 'Удалено',
        ];
    }


    public function getDisplayTypeLabel()
    {
        return static::displayTypeLabels()[$this->display_type];
    }
    public function getStatusLabel()
    {
        return static::statusLabels()[$this->status];
    }

    public function getComments()
    {
        return $this->hasMany(PostComment::className(), ['post_id' => 'id']);
    }

}
