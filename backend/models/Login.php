<?php
namespace backend\models;


use yii\base\Model;
use yii\web\Cookie;

class Login extends Model {
//	存放表单接受的数据
	public $admin_name;
	public $admin_password;
	public $remember;
//	存放从数据库读取的admin数据
	private $admin;
	
	public function rules() {
		return [
			['admin_name', 'validateAdmin', 'skipOnEmpty' => false],
			['admin_name', 'required', 'message' => '管理员账户不能为空！'],
			['admin_password', 'required', 'message' => '管理员密码不能为空！'],
			['remember', 'safe'],
		];
	}
	
	
	public function login() {
		$this->createSession();
		if ($this->remember) {
			$this->createCookie();
		}
		$this->update_admin_data();
		return true;
	}
	
	public function update_admin_data() {
		$admin_id=Admin::find()->where(['admin_name'=>$this->admin_name,'admin_password'=>sha1($this->admin_password)])->select('id')->asArray()->one();
		$admin=Admin::findOne($admin_id['id']);
		$admin->login_date=time();
		$admin->login_ip=\Yii::$app->request->getUserIP();
		return $admin->save();
	}
	
	public function validateAdmin($attribute, $params) {
		$valid = Admin::find()->where(['admin_name' => $this->admin_name, 'admin_password' => sha1($this->admin_password)])->asArray()->one();
		if ($valid) {
			$this->admin = $valid;
		} else {
			$this->addError($attribute, '管理员名称或密码错误！');
		}
	}
	
	private function createSession() {
		$setName = \Yii::$app->session->set('admin_id', $this->admin['id']);
		$setName = \Yii::$app->session->set('admin_name', $this->admin['admin_name']);
	}
	
	private function createCookie() {
		$cookie = new Cookie();
		$cookie->name = 'auth_admin';
		$cookie->value = [
			'admin_id' => $this->admin['id'],
			'admin_name' => $this->admin['admin_name'],
		];
		$cookie->expire = time() + 3600 * 24 * 7;
		$cookie->httpOnly = true;
		$create = \Yii::$app->response->cookies->add($cookie);
	}
	
	public function loginByCookie() {
		$cookies = \Yii::$app->request->cookies;
		$adminData = $cookies->getValue('auth_admin');
		if (isset($adminData['admin_id']) && isset($adminData['admin_name'])) {
			$this->admin = Admin::find()->where(['id' =>$adminData['admin_id'], 'admin_name' => $adminData['admin_name'],])->asArray()->one();
			if ($this->admin){
				$this->createSession();
				return true;
			}else{
//				与数据库不对应
				return false;
			}
		}else{
//			找不到session
			return false;
		}
	}
	
	public static function logout() {
		\Yii::$app->response->cookies->remove('auth_admin');
		\Yii::$app->session->remove('admin_id');
		\Yii::$app->session->remove('admin_name');
		return true;
	}
}