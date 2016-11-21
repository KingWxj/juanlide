<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%child_subjective}}".
 *
 * @property integer $id
 * @property integer $pid
 * @property integer $sort
 * @property string $title
 * @property string $type
 * @property string $content
 * @property string $result
 * @property integer $level
 */
class ChildSubjective extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%child_subjective}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'content', 'result'], 'required','message'=>'这里不能为空'],
            [['pid', 'sort', ], 'integer','message'=>'必须是整数'],
	        [['level'],'safe'],
            [['content','result'], 'string'],
            [['title'], 'string', 'max' => 200,'tooLong'=>'这里不能超过200字'],
            [['type'], 'string', 'max' => 100,'tooLong'=>'这里不能超过100字'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '所属大题ID',
            'sort' => '排序（第几小题）',
            'title' => '标题',
            'type' => '题目类型',
            'content' => '题干信息',
//            'imgroute' => '图片路径（如果有）',
            'result' => '答案',
            'level' => '难度星级',
        ];
    }
	public static function getChildSubjective($id) {
		if(!$id){
			return false;
		}
		$result=ChildSubjective::find()->where(['pid'=>$id])->asArray()->all();
		return $result;
	}
}
