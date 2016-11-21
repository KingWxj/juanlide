<?php
namespace backend\controllers;


use backend\models\Admin;

class IndexController extends BaseController  {
	public function actionIndex() {
		$admin_id = \Yii::$app->session->get('admin_id');
		$admin_name = \Yii::$app->session->get('admin_name');
		$admin_info=Admin::find()->where(['id'=>$admin_id,'admin_name'=>$admin_name])->asArray()->one();
		return $this->render('index',['admin_info'=>$admin_info]);
	}
	public function actionAuthError() {
		return $this->render('authError');
	}
	
}
