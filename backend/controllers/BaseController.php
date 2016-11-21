<?php
namespace backend\controllers;


use backend\models\Login;
use yii\web\Controller;

class BaseController extends Controller {
	public function init() {
		parent::init();
		$login = new Login();
		$admin_id = \Yii::$app->session->get('admin_id');
		$admin_name = \Yii::$app->session->get('admin_name');
		if (!$admin_id || !$admin_name) {
//			如果session不存在
			if ($login->loginByCookie()) {
//				如果session不存在但是cookie存在，也自动登录
				return \Yii::$app->response->redirect(['index/index']);
			}
			return \Yii::$app->response->redirect(['login/index']);
		}
	}
}