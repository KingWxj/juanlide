<?php

namespace backend\models;

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
class SubjectSelect extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%subject_select}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'content', 'result', 'project_id'], 'required','message'=>'这里不能留空'],
            [['content',  'result'], 'string'],
            [['level', 'grade_id', 'project_id'], 'integer','message'=>'数据类型异常！请刷新重试'],
            [['title'], 'string', 'max' => 200,'tooLong'=>'不能超过200字'],
            [['type'], 'string', 'max' => 100,'tooLong'=>'不能超过100字'],
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
            'type' => '类型',
            'content' => '题干',
            'result' => '答案',
            'level' => '难度星级1~5',
            'grade_id' => '年级信息',
            'project_id' => '学科信息',
        ];
    }
}
