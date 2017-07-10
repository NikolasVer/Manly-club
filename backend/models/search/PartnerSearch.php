<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ar\Partner;

/**
 * PartnerSearch represents the model behind the search form about `common\models\ar\Partner`.
 */
class PartnerSearch extends Partner
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'city_id', 'priority'], 'integer'],
            [['name', 'type', 'phones', 'site', 'address', 'img', 'gmap', 'gmap_img'], 'safe'],
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
        $query = Partner::find();

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
            'city_id' => $this->city_id,
            'priority' => $this->priority,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'phones', $this->phones])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'gmap', $this->gmap])
            ->andFilterWhere(['like', 'gmap_img', $this->gmap_img]);

        return $dataProvider;
    }
}
