<?php

namespace backend\controllers;

use backend\models\AuthMgr;
use Yii;
use backend\models\Admin;
use backend\models\searchAdmin;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends BaseController {
	public function init() {
		parent::init();
		if (!AuthMgr::checkAuth('adminControl')) {
			return \Yii::$app->response->redirect(['index/auth-error']);
		}
	}
	
	public function behaviors() {
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
//					'delete' => ['POST'],
				],
			],
		];
	}
	
	public function actionIndex() {
		$searchModel = new searchAdmin();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}
	
	public function actionView($id) {
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}
	
	public function actionCreate() {
		$model = new Admin();
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}
	
	
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
	
	public function actionDelete($id) {
		$this->findModel($id)->delete();
		return $this->redirect(['admin/index']);
	}
	
	
	protected function findModel($id) {
		if (($model = Admin::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
