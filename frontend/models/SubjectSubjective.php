<?php

namespace frontend\models;

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
            [['type', 'content', 'result', 'project_id'], 'required'],
            [['content', 'result'], 'string'],
            [['grade_id', 'project_id', 'level'], 'integer'],
            [['title'], 'string', 'max' => 200],
            [['type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'type' => 'Type',
            'content' => 'Content',
            'result' => 'Result',
            'grade_id' => 'Grade ID',
            'project_id' => 'Project ID',
            'level' => 'Level',
        ];
    }
}
