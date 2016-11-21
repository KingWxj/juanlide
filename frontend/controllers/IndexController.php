<?php
namespace frontend\controllers;
use frontend\models\Login;
use yii\web\Controller;
use yii\web\HttpException;

class IndexController extends Controller {
	
	public function actionIndex() {
		$this->layout = 'main';
		$model=new Login();
		if(\Yii::$app->request->isPost){
//			pd($_POST);
			$model->load(\Yii::$app->request->post());
			if($model->validate()){     //都不为空
				if($model->login()){
					return $this->redirect(['index']);
				}else{
					echo '<script> alert("登录失败，用户名或密码错误！") </script>';
				}
			}else{
				return $this->redirect(['index']);
			}
		}
		return $this->render('index',['model'=>$model]);
	}
	
	public function actionLogout() {
		Login::logout();
		return $this->redirect(['index']);
	}
	
	public function actionJumpperson() {
		$cookie=\Yii::$app->request->cookies->getValue('jld_login');
		if ($cookie['type']=='stu') {
			return $this->redirect(['personstu/index']);
		}elseif ($cookie['type']=='tea'){
			return $this->redirect(['persontea/index']);
		}else{
			throw new HttpException(404);
		}
	}
}