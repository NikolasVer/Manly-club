<?php

namespace backend\models;


use common\models\ar\Post;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/***
 * Class PostUploadFiles
 * @package backend\models
 * @property Post $postModel
 * @property UploadedFile $mainImage
 * @property UploadedFile $previewImage
 */
class PostUploadFiles extends Model
{

    const IMG_DIR_SIZE = 50;

    public $postModel;
    public $mainImage;
    public $previewImage;

    public function rules()
    {
        return [
            [['postModel'], 'required'],
            [['mainImage', 'previewImage'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'mainImage' => 'Изображеие внутри поста',
            'previewImage' => 'Изображение в блоге',
        ];
    }

    public function upload()
    {
        if ( $this->validate() ) {


            $subDir = floor($this->postModel->id / static::IMG_DIR_SIZE);

            if ( $this->mainImage instanceof UploadedFile) {

                $uploadDir = Yii::getAlias('@uploads/posts/' . $subDir);
                $uploadUrl = '/uploads/posts/' . $subDir . '/';
                $fName = md5($this->mainImage->baseName . $this->postModel->id) . '.' . $this->mainImage->extension;

                if (!is_dir($uploadDir)) {
                    if (!mkdir($uploadDir)) {
                        $this->addError('mainImage', 'Cant create folder "' . $uploadDir . '" for this image');
                        return FALSE;
                    }
                }
                $this->postModel->image = $uploadUrl . $fName;
                if ( !$this->mainImage->saveAs($uploadDir . DIRECTORY_SEPARATOR . $fName) ) {
                    $this->addError('mainImage', 'Cant save file "' . ($uploadDir . DIRECTORY_SEPARATOR . $fName)
                        . '"');
                    return FALSE;
                }
            }

            if ( $this->previewImage instanceof UploadedFile) {

                $uploadDir = Yii::getAlias('@uploads/posts/preview/' . $subDir);
                $uploadUrl = '/uploads/posts/preview/' . $subDir . '/';
                $fName = md5($this->previewImage->baseName . $this->postModel->id) . '.'
                    . $this->previewImage->extension;

                if (!is_dir($uploadDir)) {
                    if (!mkdir($uploadDir)) {
                        $this->addError('previewImage', 'Cant create folder "' . $uploadDir . '" for this image');
                        return FALSE;
                    }
                }
                $this->postModel->image_preview = $uploadUrl . $fName;
                if ( !$this->previewImage->saveAs($uploadDir . DIRECTORY_SEPARATOR . $fName) ) {
                    $this->addError('mainImage', 'Cant save file "' . ($uploadDir . DIRECTORY_SEPARATOR . $fName)
                        . '"');
                    return FALSE;
                }
            }

            if ( $this->postModel->isAttributeChanged('image')
                || $this->postModel->isAttributeChanged('image_preview') ) {
                if ( !$this->postModel->save() ) {
                    $this->addError('postModel', 'Cant save changes');
                    return FALSE;
                }
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }


}