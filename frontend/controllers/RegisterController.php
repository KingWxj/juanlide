<?php
namespace frontend\controllers;


use common\models\SendMail;
use frontend\models\Student;
use frontend\models\Teacher;
use yii\base\Exception;

class RegisterController extends BaseController {
	public $defaultAction = 'student';
	
	public function actionStudent() {
		$this->layout = 'main';
		$model = new Student();
		if (\Yii::$app->request->isPost) {
			$model->scenario = 'register';
			if ($model->load(\Yii::$app->request->post()) && $model->save()) {
				$email_info = sha1($model->stu_account . 'wxj4108' . $model->stu_password);
				try {
					$this->sendUserMail($model->email, $email_info, 'stu');
				} catch (Exception $e) {
					
				}
				\Yii::$app->session->set('email_to', $model->email);
				\Yii::$app->session->set('email_info', $email_info);
				\Yii::$app->session->set('type', 'stu');
//			    \Yii::$app->session->set('email_count',1);
				return $this->redirect(['success']);
			} else {
				return $this->render('student', ['model' => $model]);
			}
		}
		return $this->render('student', ['model' => $model]);
	}
	
	public function actionTeacher() {
		$this->layout = 'main';
		$model = new Teacher();
		if (\Yii::$app->request->isPost) {
			$model->scenario = 'register';
			if ($model->load(\Yii::$app->request->post()) && $model->save()) {
				$email_info = sha1($model->tea_account . 'wxj4108' . $model->tea_password);
				$this->sendUserMail($model->email, $email_info, 'tea');
				\Yii::$app->session->set('email_to', $model->email);
				\Yii::$app->session->set('email_info', $email_info);
				\Yii::$app->session->set('type', 'tea');
//			    \Yii::$app->session->set('email_count',1);
				return $this->redirect(['success']);
			} else {
				return $this->render('teacher', ['model' => $model]);
			}
		}
		return $this->render('teacher', ['model' => $model]);
	}
	
	public function actionVerify($code, $type) {
		if ($type == 'stu') {
			Student::runEmailVerify($code);
		} elseif ($type == 'tea') {
			Teacher::runEmailVerify($code);
		}
		return $this->render('verify');
	}
	
	public function sendUserMail($to, $code, $type, $subject = '激活您的账户') {
		$url = 'www.jld.com/index.php?r=register/verify&code=' . $code . '&type=' . $type;
		$template = '<div>
					<h1>卷立得感谢您的注册</h1>
					<p>点击此链接以激活您的账户----&gt;<a href="%s">激活账户</a></p>
					<p>如果链接不能点击，请复制下面的网址到浏览器粘贴访问以激活账户</p>
					<p>%s</p>

		</div>';
		$data = sprintf($template, $url, $url);
		SendMail::sendMail($to, $subject, $data);
	}
	
	public function actionSuccess() {
		return $this->renderPartial('success');
	}
	
	public function actionResend() {
		$email_to = \Yii::$app->session->get('email_to');
		$email_info = \Yii::$app->session->get('email_info');
		$type = \Yii::$app->session->get('type');
//		$count=\Yii::$app->session->get('email_count');
//		if ($count<=5){
		$this->sendUserMail($email_to, $email_info, $type);
//			\Yii::$app->session->set('email_count',$count+1);
//		}
		return $this->redirect(['success']);
	}
}