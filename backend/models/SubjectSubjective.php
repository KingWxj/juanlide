<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%subject_subjective}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $type
 * @property string $content
 * @property string $result
 * @property integer $grade_id
 * @property integer $project_id
 * @property integer $level
 */
class SubjectSubjective extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%subject_subjective}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'content', 'result', 'project_id'], 'required','message'=>'这里不能为空'],
            [['content',  'result'], 'string'],
            [['grade_id', 'project_id', 'level'], 'integer','message'=>'数据类型异常！'],
            [['title'], 'string', 'max' => 200,'tooLong'=>'不能超过200字！'],
            [['type'], 'string', 'max' => 100,'tooLong'=>'不能超过100字！'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题（题目要求）',
            'type' => '类型（问答/作文 等）',
            'content' => '题干',
            'result' => '答案',
            'grade_id' => '年级ID',
            'project_id' => '科目ID',
            'level' => '难度星级',
        ];
    }
}
