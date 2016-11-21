<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%teacher}}".
 *
 * @property integer $id
 * @property string $tea_account
 * @property string $tea_name
 * @property string $email
 * @property string $tea_password
 * @property string $login_date
 * @property string $verify
 * @property string $verify_code
 */
class Teacher extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%teacher}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['tea_account', 'tea_name', 'tea_password', 'email'], 'required', 'message' => '这里不能留空'],
			[['tea_account', 'tea_name'], 'string', 'max' => 30, 'tooLong' => '长度不能超过30位'],
			[['tea_account'], 'check_account'],
			[['email'], 'check_email'],
			['email', 'email', 'message' => '邮箱格式不合法'],
			[['tea_password'], 'string', 'max' => 60, 'tooLong' => '长度不能超过60位'],
			[['login_date'], 'string', 'max' => 20, 'tooLong' => '长度不能超过20位'],
			[['verify','verify_code'],'safe']
		];
	}
	
	public function check_account($attribute, $params) {
		if ($this->isNewRecord){
			$check_stu = Student::find()->where(['stu_account' => $this->tea_account])->one();
			$check_tea = self::find()->where(['tea_account' => $this->tea_account])->one();
			if ($check_stu || $check_tea) {
				$this->addError($attribute, '账号已存在，请更换新的登录账号');
			}
		}else{
			$check_stu = Student::find()->where(['stu_account' => $this->tea_account])->one();
			$check_tea = self::find()->where(['tea_account' => $this->tea_account])->andWhere(['!=', 'id', $this->id])->one();
			if ($check_stu || $check_tea) {
				$this->addError($attribute, '账号已存在，请更换新的登录账号');
			}
		}
		preg_match("/^[a-zA-Z0-9_]+$/",$this->tea_account,$match);
		if(!$match){
			$this->addError($attribute,'账号只能是字母大小写、数字或下划线的组合');
		}
	}
	
	public function check_email($attribute, $params) {
		if ($this->isNewRecord){
			$check_stu = Student::find()->where(['email' => $this->email])->one();
			$check_tea = self::find()->where(['email' => $this->email])->one();
			if ($check_stu || $check_tea) {
				$this->addError($attribute, '邮箱已存在，请更换其他邮箱');
			}
		}else{
			$check_stu = Student::find()->where(['email' => $this->email])->one();
			$check_tea = self::find()->where(['email' => $this->email])->andWhere(['!=', 'id', $this->id])->one();
			if ($check_stu || $check_tea) {
				$this->addError($attribute, '邮箱已存在，请更换其他邮箱');
			}
		}
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'tea_account' => '登录账户',
			'email' => '邮箱',
			'tea_name' => '用户昵称',
			'tea_password' => '登陆密码',
			'login_date' => '最近登录时间',
		];
	}
	
	public function beforeSave($insert) {
		if (parent::beforeSave($insert)) {
			if ($this->isNewRecord) {
				$this->verify=1;
				$this->verify_code=sha1($this->tea_account.'wxj4108'.$this->tea_password);
				$this->tea_password = sha1($this->tea_password);
			} else {
				$db_info = self::find()->where(['id' => $this->id])->asArray()->one();
				if ($this->tea_password != $db_info['tea_password']) {
					$this->verify_code=sha1($this->tea_account.'wxj4108'.$this->tea_password);
					$this->tea_password = sha1($this->tea_password);
				}
			}
			return true;
		}
		return false;
	}
}
