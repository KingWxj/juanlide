<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%grade}}".
 *
 * @property integer $id
 * @property string $stage
 * @property string $grade
 * @property string $grade_type
 */
class Grade extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%grade}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['stage', 'grade'], 'required'],
			[['stage', 'grade', 'grade_type'], 'string', 'max' => 20],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'stage' => 'Stage',
			'grade' => 'Grade',
			'grade_type' => 'Grade Type',
		];
	}
	
//	获取年级列表做下拉菜单
	public static function getGradeList() {
		$list=self::find()->asArray()->all();
		$result=ArrayHelper::getColumn($list,function ($element){
			return ['id'=>$element['id'],'name'=>$element['stage'].$element['grade'].$element['grade_type']];
		});
		return $result;
	}
}
