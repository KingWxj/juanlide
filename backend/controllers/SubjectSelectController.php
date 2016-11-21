<?php

namespace backend\controllers;

use backend\models\AuthMgr;
use Yii;
use backend\models\SubjectSelect;
use backend\models\SubjectSelectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubjectSelectController implements the CRUD actions for SubjectSelect model.
 */
class SubjectSelectController extends BaseController  {
	public function init() {
		parent::init();
		if(!AuthMgr::checkAuth('subjectControl')){
			return \Yii::$app->response->redirect(['index/auth-error']);
		}
	}
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}
	
	/**
	 * Lists all SubjectSelect models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel = new SubjectSelectSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}
	
	/**
	 * Displays a single SubjectSelect model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}
	
	/**
	 * Creates a new SubjectSelect model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new SubjectSelect();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}
	
	/**
	 * Updates an existing SubjectSelect model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}
	
	/**
	 * Deletes an existing SubjectSelect model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();
		
		return $this->redirect(['index']);
	}
	
	/**
	 * Finds the SubjectSelect model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return SubjectSelect the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = SubjectSelect::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
