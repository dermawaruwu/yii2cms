<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CmsCategory;

/**
 * CmsCategorySearch represents the model behind the search form about `backend\models\CmsCategory`.
 */
class CmsCategorySearch extends CmsCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'category_parent'], 'integer'],
            [['category_title', 'category_count'], 'safe'],
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
        $query = CmsCategory::find();

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
            'category_id' => $this->category_id,
            'category_parent' => $this->category_parent,
            'category_count' => $this->category_count,
        ]);

        $query->andFilterWhere(['like', 'category_title', $this->category_title]);

        return $dataProvider;
    }
}
