<?php

namespace common\models\ar;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "shop_product_variety_attachment".
 *
 * @property integer $id
 * @property integer $shop_product_variety_id
 * @property integer $type
 * @property string $url_local
 * @property string $url_remote
 * @property integer $priority
 */
class ShopProductVarietyAttachment extends \yii\db\ActiveRecord
{

    const TYPE_IMAGE = 1;
    const TYPE_VIDEO = 2;

    public $uploadFile = NULL;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_product_variety_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_product_variety_id', 'type'], 'required'],
            [['shop_product_variety_id', 'type', 'priority'], 'integer'],
            [['url_local', 'url_remote'], 'string', 'max' => 255],
            [['type'], 'in', 'range' => array_keys(static::typeLabels())],
            [['uploadFile'], 'file', 'skipOnEmpty' => TRUE, 'extensions' => 'png, jpg, mp4'],
            /*[['uploadFile', 'url_remote'], 'required', 'when' => function ( $model ) {
                return !$model->url_local && !$model->url_remote;
            }, 'whenClient' => "function (attr, val, m) {
                var el = $('#' + attr.id).closest('form').find('[name=\""
                . $this->formName() . "[' + (attr.name == 'url_remote' ? 'uploadFile' : 'url_remote') + ']\"][type!=hidden]');
                //console.log(el);
                return el.length == 0 || el.val() == '';
            }", 'message' => 'Укажите удаленную ссылку или загрузите файл']*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_product_variety_id' => 'Shop Product Variety ID',
            'type' => 'Тип файла',
            'url_local' => 'Url Local',
            'url_remote' => 'Удаленная ссылка',
            'priority' => 'Приоритет показа',
            'uploadFile' => 'Загрузить файл на сайт'
        ];
    }

    /**
     * @inheritdoc
     * @return \common\queries\ShopProductVarietyAttachmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\ShopProductVarietyAttachmentQuery(get_called_class());
    }

    public static function typeLabels()
    {
        return [
            static::TYPE_IMAGE => 'Изображение',
            static::TYPE_VIDEO => 'Видео',
        ];
    }

    public function loadFile($customFile = FALSE)
    {
        if ( $this->isNewRecord )
            return FALSE;

        $this->uploadFile = $customFile !== FALSE
            ? $customFile
            : UploadedFile::getInstance($this, 'uploadFile');

        if ( !($this->uploadFile instanceof UploadedFile) )
            return TRUE;

        if ( !$this->validate(['uploadFile']) )
            return FALSE;

        $uploadDir = Yii::getAlias('@uploads/varieties');
        $uploadUrl = '/uploads/varieties/';
        $fName = md5($this->uploadFile->baseName . $this->id) . '.' . $this->uploadFile->extension;

        $this->url_local = $uploadUrl . $fName;

        if ( !$this->uploadFile->saveAs($uploadDir . DIRECTORY_SEPARATOR . $fName)
            || !$this->save(FALSE, ['url_local']) ) {
            $this->addError('uploadFile', 'Не удалось сохранить файл');
            return FALSE;
        }

        return TRUE;
    }

    public static function url($local, $remote)
    {
        return $local ? : $remote;
    }
}
