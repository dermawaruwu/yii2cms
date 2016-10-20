<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CmsPost;

/**
 * CmsPostSearch represents the model behind the search form about `backend\models\CmsPost`.
 */
class CmsPostSearch extends CmsPost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'post_comment', 'post_hits'], 'integer'],
            [['post_title', 'post_content', 'post_tag', 'post_category', 'post_date', 'post_editor', 'post_active', 'post_headline', 'post_commentable', 'post_picture', 'post_picture_desc'], 'safe'],
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
        $query = CmsPost::find();

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
            'post_id' => $this->post_id,
            'post_date' => $this->post_date,
            'post_comment' => $this->post_comment,
            'post_hits' => $this->post_hits,
        ]);

        $query->andFilterWhere(['like', 'post_title', $this->post_title])
            ->andFilterWhere(['like', 'post_content', $this->post_content])
            ->andFilterWhere(['like', 'post_tag', $this->post_tag])
            ->andFilterWhere(['like', 'post_category', $this->post_category])
            ->andFilterWhere(['like', 'post_editor', $this->post_editor])
            ->andFilterWhere(['like', 'post_active', $this->post_active])
            ->andFilterWhere(['like', 'post_headline', $this->post_headline])
            ->andFilterWhere(['like', 'post_commentable', $this->post_commentable])
            ->andFilterWhere(['like', 'post_picture', $this->post_picture])
            ->andFilterWhere(['like', 'post_picture_desc', $this->post_picture_desc]);

        return $dataProvider;
    }
}
