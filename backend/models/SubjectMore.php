<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%subject_more}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $type
 * @property string $content
 * @property string $child
 * @property integer $grade_id
 * @property integer $project_id
 * @property integer $level
 */
class SubjectMore extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%subject_more}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['type', 'content', 'project_id'], 'required', 'message' => '这里不能是空的'],
			[['content', 'child'], 'safe'],
			[['grade_id', 'project_id', 'level'], 'integer', 'message' => '数据异常，请刷新重试！'],
			[['title'], 'string', 'max' => 200, 'tooLong' => '不能超过200字'],
			[['type'], 'string', 'max' => 100, 'tooLong' => '不能超过100字'],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'title' => '标题（题目要求）',
			'type' => '类型',
			'content' => '题干',
			'child' => '子级小题',
			'grade_id' => '年级ID',
			'project_id' => '科目ID',
			'level' => '难度级别',
		];
	}
}
