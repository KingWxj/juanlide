<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%student}}".
 *
 * @property integer $id
 * @property string $stu_account
 * @property string $stu_name
 * @property string $stu_password
 * @property string $email
 * @property string $login_date
 */
class Student extends \yii\db\ActiveRecord {
	public $rePassword;
	
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%student}}';
	}
	
	public function scenarios() {
		return [
			'register' => ['stu_account', 'stu_name', 'stu_password', 'rePassword', 'email','verify_code'],
			'email_verify' => ['email_verify'],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['stu_account', 'stu_name', 'stu_password', 'rePassword', 'email'], 'required', 'message' => '这里不能留空', 'on' => ['register']],
			[['stu_account', 'stu_name'], 'string', 'max' => 30, 'tooLong' => '不能超过30位', 'on' => ['register']],
			[['stu_password', 'rePassword'], 'string', 'max' => 60, 'tooLong' => '不能超过60个字符', 'on' => ['register']],
			[['email'], 'string', 'max' => 50, 'tooLong' => 'Email长度不能超过50位', 'on' => ['register']],
			[['login_date', 'email_verify'], 'safe', 'on' => ['register']],
			[['stu_account', 'stu_password', 'rePassword'], 'string', 'min' => 6, 'tooShort' => '不能少于6位', 'on' => ['register']],
			['email', 'email', 'message' => '邮箱格式不合法', 'on' => ['register']],
			[['email'], 'check_email', 'on' => ['register']],
			[['stu_account'], 'check_account', 'on' => ['register']],
//	        检查密码是否相同
			['rePassword', 'check_same_password', 'on' => ['register']],
			['email_verify','safe','on'=>'email_verify'],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'stu_account' => 'Stu Account',
			'stu_name' => 'Stu Name',
			'stu_password' => 'Stu Password',
			'email' => 'Email',
			'login_date' => 'Login Date',
		];
	}

//	密码加密
	public function beforeSave($insert) {
		if (parent::beforeSave($insert)) {
			if ($this->isNewRecord) {
				$this->stu_password = sha1($this->stu_password);
				$this->verify_code = sha1($this->stu_account . 'wxj4108' . $this->stu_password);
			}
			return true;
		}
		return false;
	}

//	账号检查
	public function check_account($attribute, $params) {
		if ($this->isNewRecord) {
			$check_tea = Teacher::find()->where(['tea_account' => $this->stu_account])->one();
			$check_stu = self::find()->where(['stu_account' => $this->stu_account])->one();
			if ($check_stu || $check_tea) {
				$this->addError($attribute, '账号已存在，请更换新的登录账号');
			}
		} else {
			$check_tea = Teacher::find()->where(['tea_account' => $this->stu_account])->one();
			$check_stu = self::find()->where(['stu_account' => $this->stu_account])->andWhere(['!=', 'id', $this->id])->one();
			if ($check_stu || $check_tea) {
				$this->addError($attribute, '账号已存在，请更换新的登录账号');
			}
		}
		preg_match("/^[a-zA-Z0-9_]+$/", $this->stu_account, $match);
		if (!$match) {
			$this->addError($attribute, '账号只能是字母大小写、数字或下划线的组合');
		}
	}

//	邮箱检查
	public function check_email($attribute, $params) {
		if ($this->isNewRecord) {
			$check_tea = Teacher::find()->where(['email' => $this->email])->one();
			$check_stu = self::find()->where(['email' => $this->email])->one();
			if ($check_stu || $check_stu) {
				$this->addError($attribute, '邮箱已存在，请更换其他邮箱');
			}
		} else {
			$check_tea = Teacher::find()->where(['email' => $this->email])->one();
			$check_stu = self::find()->where(['email' => $this->email])->andWhere(['!=', 'id', $this->id])->one();
			if ($check_stu || $check_stu) {
				$this->addError($attribute, '邮箱已存在，请更换其他邮箱');
			}
		}
	}

//	密码重复检查
	public function check_same_password($attribute, $params) {
		if ($this->stu_password != $this->rePassword) {
			$this->addError($attribute, '重复密码和原密码不一致');
		}
	}

//	点击邮箱链接后执行验证通过的方法
	public static function runEmailVerify($verify_code) {
		$user = self::find()->where(['verify_code' => $verify_code])->one();
		$user->scenario='email_verify';
		$user->email_verify = '1';
		$user->save();
		return true;
	}
}
