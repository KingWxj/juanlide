<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%subject_select}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $type
 * @property string $content
 * @property string $result
 * @property integer $level
 * @property integer $grade_id
 * @property integer $project_id
 */
class SubjectSelect extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%subject_select}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['type', 'content', 'result', 'project_id'], 'required'],
			[['content', 'result'], 'string'],
			[['level', 'grade_id', 'project_id'], 'integer'],
			[['title'], 'string', 'max' => 200],
			[['type'], 'string', 'max' => 100],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'title' => '标题',
			'type' => '类型',
			'content' => '题干',
			'result' => '答案',
			'level' => '难度星级',
			'grade_id' => '年级id',
			'project_id' => '科目id',
		];
	}
}
