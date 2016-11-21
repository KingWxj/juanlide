<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%project}}".
 *
 * @property integer $id
 * @property string $project
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project'], 'string', 'max' => 20,'tooLong'=>'学科名称长度不能超过20'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project' => '科目名称',
        ];
    }
	
	public function beforeSave($insert) {
		parent::beforeSave($insert);
		$this->project=trim($this->project);
    }
	//    获取所有学科
	public static function getProjects() {
		$result['']='请选择学科';
		$projects=self::find()->orderBy('id')->asArray()->all();
		$result=ArrayHelper::merge($result,ArrayHelper::map($projects,'id','project'));
		return $result;
    }
}
