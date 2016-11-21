<?php
namespace frontend\models;


use backend\models\Student;
use backend\models\Teacher;
use yii\base\Model;
use yii\web\Cookie;

class Login extends Model {
	public $input_account;
	public $input_password;
	public $id;
	public $account;
	public $name;
	public $email;
	public $password;
	public $type;
	
	public function rules() {
		return [
			['input_account','required','message'=>'请填写账户或邮箱'],
			['input_password','required','message'=>'请填写密码'],
		];
	}
	public function login() {
//		删除原有的cookie
		self::logout();
		if(!$this->input_account){
			return false;
		}
//		进行类型判断并赋值帐号 密码 类型
		$this->judgeAccount();
//		判断输入密码和数据库密码是否一致
		if(sha1($this->input_password)==$this->password){
			$this->createCookie();
			return true;
		}else{      //如果密码不一致
			return false;
		}
	}


//	判断前端输入的账户类型 老师、学生、邮箱、账户
	public function judgeAccount() {
		preg_match("/(\@)/", $this->input_account, $match);
		if ($match) {     //使用邮箱进行登录的
			$stu_email = Student::find()->where(['email' => $this->input_account])->asArray()->one();
			$tea_email = Teacher::find()->where(['email' => $this->input_account])->asArray()->one();
			if ($stu_email) {    //学生邮箱\
				$this->id = $stu_email['id'];
				$this->account = $stu_email['stu_account'];
				$this->name = $stu_email['stu_name'];
				$this->email = $stu_email['email'];
				$this->password = $stu_email['stu_password'];
				$this->type = 'stu';
			} else {    //老师邮箱
				$this->id = $tea_email['id'];
				$this->account = $tea_email['tea_account'];
				$this->name = $stu_email['tea_name'];
				$this->email = $tea_email['email'];
				$this->password = $tea_email['tea_password'];
				$this->type = 'tea';
			}
		} else {      //使用账户进行登录的
			$stu_account = Student::find()->where(['stu_account' => $this->input_account])->asArray()->one();
			$tea_account = Teacher::find()->where(['tea_account' => $this->input_account])->asArray()->one();
			if ($stu_account) {    //学生邮箱
				$this->id = $stu_account['id'];
				$this->name = $stu_account['stu_name'];
				$this->account = $stu_account['stu_account'];
				$this->email = $stu_account['email'];
				$this->password = $stu_account['stu_password'];
				$this->type = 'stu';
			} else {    //老师邮箱
				$this->id = $tea_account['id'];
				$this->account = $tea_account['tea_account'];
				$this->name = $tea_account['tea_name'];
				$this->email = $tea_account['email'];
				$this->password = $tea_account['tea_password'];
				$this->type = 'tea';
			}
		}
	}
	
//	设置cookie进行登录
	public function createCookie() {
		$cookie=new Cookie();
		$cookie->name='jld_login';
		$cookie->value=[
			'id'=>$this->id,
			'account'=>$this->account,
			'name'=>$this->name,
			'type'=>$this->type,
		];
		$cookie->httpOnly=true;
		\Yii::$app->response->cookies->add($cookie);
	}
	
	public static function logout() {
		\Yii::$app->response->cookies->remove('jld_login');
	}
}