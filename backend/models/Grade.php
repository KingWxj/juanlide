<?php

namespace backend\models;

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
class Grade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%grade}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stage', 'grade'], 'required'],
            [['stage', 'grade', 'grade_type'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stage' => '阶段',
            'grade' => '年级',
            'grade_type' => '学期',
        ];
    }
	
	public static function getGrades() {
		$result['']='请选择学科';
		$tmp=array();
		$grades=self::find()->orderBy('id desc')->asArray()->all();
		foreach ($grades as $grade) {
			$tmp[]=['id'=>$grade['id'],'grade'=>$grade['stage'].$grade['grade'].$grade['grade_type']];
		}
		$result=ArrayHelper::merge($result,ArrayHelper::map($tmp,'id','grade'));
		return $result;
    }
}
