<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%child_select}}".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $title
 * @property string $type
 * @property string $content
 * @property string $result
 * @property integer $level
 */
class ChildSelect extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%child_select}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'type', 'content', 'result'], 'required','message'=>'此处不能为空'],
            [['pid', 'level'], 'integer','message'=>'类型异常，请刷新重试'],
	        [['level','sort'],'safe'],
            [['content', 'result'], 'string'],
            [['title'], 'string', 'max' => 200,'tooLong'=>'此处不能超过200字'],
            [['type'], 'string', 'max' => 100,'tooLong'=>'此处不能超过100字'],
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
            'title' => '标题',
            'type' => '类型',
            'content' => '题干内容',
//            'imgroute' => '图片路径（如果有）',
            'result' => '答案',
            'level' => '难度星级',
	        'sort' => '排序（第几小题）',
        ];
    }
	
	public static function getChildSelect($id) {
		if(!$id){
			return false;
		}
		$result=ChildSelect::find()->where(['pid'=>$id])->asArray()->all();
		return $result;
    }
}
