<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ar\ShopProduct;

/**
 * ShopProductSearch represents the model behind the search form about `common\models\ar\ShopProduct`.
 */
class ShopProductSearch extends ShopProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'shop_faq_id', 'status'], 'integer'],
            [['name', 'description_cut', 'description_full', 'slug'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ShopProduct::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'shop_faq_id' => $this->shop_faq_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description_cut', $this->description_cut])
            ->andFilterWhere(['like', 'description_full', $this->description_full])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
