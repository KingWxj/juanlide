<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property integer $id
 * @property string $admin_name
 * @property string $admin_password
 * @property string $description
 * @property string $create_date
 * @property string $login_date
 * @property string $login_ip
 */
class Admin extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%admin}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['admin_name', 'admin_password'], 'required'],
			[['admin_name', 'admin_password'], 'string', 'max' => 50],
			[['description'], 'string', 'max' => 255],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'admin_name' => '登录名',
			'admin_password' => '密码',
			'description' => '简介',
			'create_date' => '创建时间',
			'login_date' => '登录时间',
			'login_ip' => '登录IP',
		];
	}
	
	public function beforeSave($insert) {
		if (parent::beforeSave($insert)){
			if($this->isNewRecord){
				$this->create_date=time();
				$this->admin_password=sha1($this->admin_password);
			}else{
				$db_info=self::find()->where(['id'=>$this->id])->asArray()->one();
				if($this->admin_password!=$db_info['admin_password']){
					$this->admin_password=sha1($this->admin_password);
				}
			}
			return true;
		}
		return false;
	}
}
