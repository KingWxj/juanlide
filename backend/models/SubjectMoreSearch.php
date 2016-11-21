<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SubjectMore;

/**
 * SubjectMoreSearch represents the model behind the search form about `backend\models\SubjectMore`.
 */
class SubjectMoreSearch extends SubjectMore
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'grade_id', 'project_id', 'level'], 'integer'],
            [['title', 'type', 'content', 'child'], 'safe'],
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
        $query = SubjectMore::find();

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
            'grade_id' => $this->grade_id,
            'project_id' => $this->project_id,
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'child', $this->child]);

        return $dataProvider;
    }
}
