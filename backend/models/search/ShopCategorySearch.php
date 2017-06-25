<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ar\ShopCategory;

/**
 * ShopCategorySearch represents the model behind the search form about `common\models\ar\ShopCategory`.
 */
class ShopCategorySearch extends ShopCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'priority', 'status'], 'integer'],
            [['name', 'slug'], 'safe'],
            [['show_in_landing'], 'boolean'],
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
        $query = ShopCategory::find();

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
            'parent_id' => $this->parent_id,
            'priority' => $this->priority,
        ]);

        if ( $this->status !== NULL && $this->status !== '' )
            $query->andFilterWhere(['status' => $this->status]);
        else
            $query->andWhere(['<>', 'status', static::STATUS_DELETED]);

        $query->andFilterWhere(['show_in_landing' => $this->show_in_landing]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->name]);

        return $dataProvider;
    }
}
