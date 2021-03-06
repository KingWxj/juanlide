<?php
namespace backend\controllers;


use backend\models\Login;
use yii\web\Controller;

class LoginController extends Controller {
	public function init() {
		parent::init();
		$login = new Login();
		$admin_id = \Yii::$app->session->get('admin_id');
		$admin_name = \Yii::$app->session->get('admin_name');
		if ($admin_id && $admin_name) {
//			如果session存在的话，直接自动登录
			return \Yii::$app->response->redirect(['index/index']);
		} else {
			if ($login->loginByCookie()) {
//				如果session不存在但是cookie存在，也自动登录
				return \Yii::$app->response->redirect(['index/index']);
			}
		}
	}
	
	public function actionIndex() {
		$model = new Login();
		if (\Yii::$app->request->isPost) {
			if ($model->load(\Yii::$app->request->post()) && $model->validate() && $model->login()) {
				return $this->redirect(['index/index']);
			}
		}
		return $this->renderPartial('index', ['model' => $model]);
	}
	
	public function actionLogout() {
		Login::logout();
		return $this->redirect(['login/index']);
	}
}