<?php

namespace backend\models;


use common\models\ar\ShopProduct;
use yii\base\Model;

/***
 * Class ProductExtendedForm
 * @package backend\models
 * @property ShopProduct $productModel
 */
class ProductExtendedForm extends Model
{

    public $isNewRecord = TRUE;


    public $productModel = NULL;

    public function init()
    {
        parent::init();
        if ( $this->productModel === NULL )
            $this->productModel = new ShopProduct();
    }

    public function rules()
    {
        return [
            [['productModel[name]'], 'string']
        ];
    }


    public function save()
    {
        var_dump($this->productModel->name);
        return TRUE;
    }

}