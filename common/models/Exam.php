<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%exam}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $user_type
 * @property integer $subject_id
 * @property integer $grade_id
 * @property string $name
 * @property string $questions
 * @property string $create_time
 */
/*
 * 学生或老师建立试卷的模型，操作jld_exam数据表
 */


class Exam extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%exam}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['id', 'user_id', 'subject_id', 'grade_id'], 'integer'],
			[['questions'], 'string'],
			[['user_type'], 'string', 'max' => 5],
			[['name'], 'string', 'max' => 200],
			[['create_time'], 'safe'],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id'          => 'ID',
			'user_id'     => '用户idD',
			'user_type'   => '用户类型',
			'subject_id'  => '科目类型id',
			'grade_id'    => '年级id',
			'name'        => '试卷名称',
			'questions'   => '题目json',
			'create_time' => '创建时间',
		];
	}
}
