<?php

namespace backend\models;

use common\models\ar\ShopCategory;
use common\models\ar\ShopCategoryProductAssn;
use common\models\ar\ShopProduct;
use common\models\ar\ShopProductVariety;
use common\models\ar\ShopProductVarietyAttachment;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/***
 * Class ProductExtendedForm
 * @package backend\models
 */
class ProductExtendedForm extends Model
{

    protected $productId = NULL;
    public $productName;
    public $productShortName;
    public $productLabel;
    public $productSlug;
    public $productFaqId;
    public $productStatus;
    public $productDescr;
    public $productCatalogDescr;

    public $productCategories;
    public $varieties;

    public function rules()
    {
        return [
            [['productName'], 'required'],
            [['productFaqId', 'productStatus'], 'integer'],
            [['productName', 'productShortName', 'productLabel', 'productSlug'], 'string', 'max' => 255],
            [['productDescr', 'productCatalogDescr'], 'string'],
            ['productStatus', 'in', 'range' => array_keys(ShopProduct::statusLabels())],
            ['productCategories', 'each', 'rule' => ['integer']],
            ['productCategories', 'each', 'rule' => [
                'exist', 'targetClass' => ShopCategory::className(), 'targetAttribute' => 'id']],
            ['varieties', 'validateVarieties'],
            ['varieties', 'default', 'value' => []],
            ['productCategories', 'default', 'value' => []]
        ];
    }

    public function validateVarieties($attribute)
    {

        /*$varieties = $this->$attribute;
        foreach ($varieties as $i => $variety) {
            if ( empty($variety['code']) ) {
                $this->addError($attribute . "[$i][code]", 'Поле код обязательно');
            }
            if ( empty($variety['volume']) ) {
                $this->addError($attribute . "[$i][volume]", 'Поле объем обязательно');
            }
            if ( empty($variety['cost']) ) {
                $this->addError($attribute . "[$i][cost]", 'Поле цена обязательно');
            }
        }*/
    }

    public function initProduct($productId = NULL)
    {
        if ( $productId && ($pModel = ShopProduct::find()
                ->where(['id' => $productId])
                ->with(['varieties' => function ( $q ) {
                    $q->indexBy('id')->asArray()
                        ->with(['attachments' => function ( $q2 ) {
                            $q2->indexBy('id')->asArray();
                        }]);
                }, 'categoryProductAssns'])
                ->one()) ) {

        } else {
            $this->varieties = [];
            $this->productCategories = [];
            return;
        }

        $this->productId = $pModel->id;
        $this->productName = $pModel->name;
        $this->productShortName = $pModel->short_name;
        $this->productLabel = $pModel->label;
        $this->productSlug = $pModel->slug;
        $this->productFaqId = $pModel->shop_faq_id;
        $this->productStatus = $pModel->status;
        $this->productDescr = $pModel->description_full;
        $this->productCatalogDescr = $pModel->description_cut;

        $this->varieties = $pModel->varieties;
        $this->productCategories = ArrayHelper::getColumn($pModel->categoryProductAssns,
            'shop_category_id');
    }


    /***
     * @param ShopProductVariety $variety
     */
    protected function saveAttachments($index, $variety)
    {
        $attachments = ArrayHelper::getValue($this->varieties[$index], 'attachments', []);

        $attachmentsExisted = ShopProductVarietyAttachment::find()
            ->where(['shop_product_variety_id' => $variety->id])
            ->indexBy('id')->all();

        foreach ($attachments as $i => $attachment) {
            if ( isset($attachmentsExisted[$i]) ) {
                $model = $attachmentsExisted[$i];
                unset($attachmentsExisted[$i]);
            } else {
                $model = new ShopProductVarietyAttachment(['shop_product_variety_id' => $variety->id]);
            }
            $model->attributes = $attachment;
            $model->save(FALSE);
            $model->loadFile(UploadedFile::getInstance($this,
                "varieties[$index][attachments][$i][uploadFile]"));
        }

        foreach ($attachmentsExisted as $item)
            $item->delete();

    }

    /***
     * @param ShopProduct $pModel
     */
    protected function saveVarieties($pModel)
    {
        $varietiesExisted = ShopProductVariety::find()
            ->where(['shop_product_id' => $pModel->id])
            ->indexBy('id')->all();
        $newVarieties = [];
        foreach ( $this->varieties as $i => $variety ) {
            if ( isset($varietiesExisted[$i]) ) {
                $vModel = $varietiesExisted[$i];
                unset($varietiesExisted[$i]);
            } else {
                $vModel = new ShopProductVariety(['shop_product_id' => $pModel->id]);
            }
            $vModel->attributes = $variety;
            $vModel->save(FALSE);

            $this->saveAttachments($i, $vModel);

            $attachments = ArrayHelper::map($vModel->attachments, 'id', function($r){return $r;});

            $newVarieties[$vModel->id] = $vModel->toArray();
            $newVarieties[$vModel->id]['attachments'] = $attachments;
        }

        foreach ($varietiesExisted as $item) {
            $item->delete();
        }
        $this->varieties = $newVarieties;
    }

    /***
     * @param ShopProduct $product
     */
    protected function saveCategories($product)
    {
        $existed = ShopCategoryProductAssn::find()
            ->where(['shop_product_id' => $product->id])
            ->select('shop_category_id')->column();


        $insert = [];
        foreach ($this->productCategories as $categoryId) {
            $idx = array_search($categoryId, $existed);
            if ( $idx !== FALSE )
                unset($existed[$idx]);
            else
                $insert[] = [$product->id, $categoryId];
        }

        if( count($existed) )
            ShopCategoryProductAssn::deleteAll(['shop_category_id' => $existed,
                'shop_product_id' => $product->id]);
        if( count($insert) ) {
            \Yii::$app->db->createCommand()->batchInsert(ShopCategoryProductAssn::tableName(),
                ['shop_product_id', 'shop_category_id'], $insert)->execute();
        }
    }

    public function save()
    {
        if ( !$this->validate() )
            return FALSE;

        $pModel = $this->productId ? ShopProduct::findOne($this->productId) : new ShopProduct();
        $pModel->name = $this->productName;
        $pModel->short_name = $this->productShortName;
        $pModel->label = $this->productLabel;
        $pModel->slug = $this->productSlug;
        $pModel->shop_faq_id = $this->productFaqId;
        $pModel->status = $this->productStatus;
        $pModel->description_full = $this->productDescr;
        $pModel->description_cut = $this->productCatalogDescr;
        $pModel->save(FALSE);

        $this->saveCategories($pModel);
        $this->saveVarieties($pModel);

        return TRUE;
    }

}