<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Admin;

/**
 * searchAdmin represents the model behind the search form about `backend\models\Admin`.
 */
class searchAdmin extends Admin {
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['id'], 'integer'],
			[['admin_name', 'admin_password', 'description', 'create_date', 'login_date', 'login_ip'], 'safe'],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function scenarios() {
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
	public function search($params) {
		$query = Admin::find();
		
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
		]);
		
		$query->andFilterWhere(['like', 'admin_name', $this->admin_name])
			->andFilterWhere(['like', 'admin_password', $this->admin_password])
			->andFilterWhere(['like', 'description', $this->description])
			->andFilterWhere(['like', 'create_date', $this->create_date])
			->andFilterWhere(['like', 'login_date', $this->login_date])
			->andFilterWhere(['like', 'login_ip', $this->login_ip]);
		
		return $dataProvider;
	}
}
