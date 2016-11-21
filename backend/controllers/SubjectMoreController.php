<?php

namespace backend\controllers;

use backend\models\AuthMgr;
use backend\models\ChildSelect;
use backend\models\ChildSubjective;
use Yii;
use backend\models\SubjectMore;
use backend\models\SubjectMoreSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubjectMoreController implements the CRUD actions for SubjectMore model.
 */
class SubjectMoreController extends BaseController  {
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
//					'delete' => ['POST'],
				],
			],
		];
	}
	
	/**
	 * Lists all SubjectMore models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel = new SubjectMoreSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}
	
	/**
	 * Displays a single SubjectMore model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}
	
	/**
	 * Creates a new SubjectMore model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new SubjectMore();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}
	
	/**
	 * Updates an existing SubjectMore model.
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
	 * Deletes an existing SubjectMore model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();
		
		return $this->redirect(['index']);
	}
	
	/**
	 * Finds the SubjectMore model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return SubjectMore the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = SubjectMore::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
	
	/*
	 * 下面是自定义的操作
	 * 添加子类选择题
	 * 添加子类主观题
	 */
	public function actionAddSelect() {
		$id=(int)Yii::$app->request->get('id');
		if(!$id){
			Yii::$app->session->setFlash('error',"ID异常，请刷新重试");
			return $this->redirect(['index']);
		}
		$model=new ChildSelect();
		if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save()){
			Yii::$app->session->setFlash('success',"添加成功！");
			return $this->redirect(['add-select','id'=>$id]);
		}
		return $this->render('child-select',['model'=>$model]);
		
	}
	public function actionAddSubjective() {
		$id=(int)Yii::$app->request->get('id');
		if(!$id){
			Yii::$app->session->setFlash('error',"ID异常，请刷新重试");
			return $this->redirect(['index']);
		}
		$model=new ChildSubjective();
		if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save()){
			Yii::$app->session->setFlash('success',"添加成功！");
			return $this->redirect(['add-subjective','id'=>$id]);
		}
		return $this->render('child-subjective',['model'=>$model]);
		
	}
}
