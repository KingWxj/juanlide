<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%student}}".
 *
 * @property integer $id
 * @property string $stu_account
 * @property string $stu_name
 * @property string $stu_password
 * @property string $login_date
 * @property string $verify
 * @property string $verify_code
 */
class Student extends \yii\db\ActiveRecord {
	
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%student}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['stu_account', 'stu_name', 'stu_password', 'email'], 'required', 'message' => '这里不能留空'],
			[['stu_account'], 'check_account'],
			[['email'], 'check_email'],
			['email', 'email', 'message' => '邮箱格式不合法'],
			['stu_account', 'string', 'min' => 6, 'tooShort' => '账号长度不能小于6位'],
			[['stu_account', 'stu_name'], 'string', 'max' => 30, 'tooLong' => '不能超过30位'],
			[['stu_password'], 'string', 'max' => 60],
			[['login_date'], 'string', 'max' => 20],
			[['verify', 'verify_code'], 'safe']
		];
	}
	
	public function check_account($attribute, $params) {
		if ($this->isNewRecord) {
			$check_stu = self::find()->where(['stu_account' => $this->stu_account])->one();
			$check_tea = Teacher::find()->where(['tea_account' => $this->stu_account])->one();
			if ($check_stu || $check_tea) {
				$this->addError($attribute, '账号已存在，请更换新的登录账号');
			}
		} else {
			$check_stu = self::find()->where(['stu_account' => $this->stu_account])->andWhere(['!=', 'id', $this->id])->one();
			$check_tea = Teacher::find()->where(['tea_account' => $this->stu_account])->one();
			if ($check_stu || $check_tea) {
				$this->addError($attribute, '账号已存在，请更换新的登录账号');
			}
		}
		preg_match("/^[a-zA-Z0-9_]+$/", $this->stu_account, $match);
		if (!$match) {
			$this->addError($attribute, '账号只能是字母大小写、数字或下划线的组合');
		}
	}
	
	public function check_email($attribute, $params) {
		if ($this->isNewRecord) {
			$check_stu = self::find()->where(['email' => $this->email])->one();
			$check_tea = Teacher::find()->where(['tea_account' => $this->email])->one();
			if ($check_stu || $check_tea) {
				$this->addError($attribute, '邮箱已存在，请更换其他邮箱');
			}
		} else {
			$check_stu = self::find()->where(['email' => $this->email])->andWhere(['!=', 'id', $this->id])->one();
			$check_tea = Teacher::find()->where(['tea_account' => $this->email])->one();
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
			'stu_account' => '学生登录账户',
			'email' => '邮箱',
			'stu_name' => '昵称',
			'stu_password' => '学生登录密码',
			'login_date' => '登录日期',
		];
	}
	
	public function beforeSave($insert) {
		if (parent::beforeSave($insert)) {
			if ($this->isNewRecord) {
				$this->verify = 1;
				$this->verify_code = sha1($this->stu_account . 'wxj4108' . $this->stu_password);
				$this->stu_password = sha1($this->stu_password);
			} else {
				$db_info = self::find()->where(['id' => $this->id])->asArray()->one();
				if ($this->stu_password != $db_info['stu_password']) {
					$this->verify_code = sha1($this->stu_account . 'wxj4108' . $this->stu_password);
					$this->stu_password = sha1($this->stu_password);
				}
			}
			return true;
		}
		return false;
	}
}
