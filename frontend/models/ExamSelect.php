<?php

namespace frontend\models;

use backend\models\Grade;
use backend\models\Project;
use common\models\Exam;
use yii\base\Model;

class ExamSelect extends Model {
	public $subject;
	public $subject_id;
	public $gradeId;

//	根据传来的单字处理学科
	public function subjectNameManage() {
		switch (trim($this->subject)) {
			case '语':
				$this->subject = '语文';
				break;
			case '数':
				$this->subject = '数学';
				break;
			case '英':
				$this->subject = '英语';
				break;
			case '物':
				$this->subject = '物理';
				break;
			case '化':
				$this->subject = '化学';
				break;
			case '生':
				$this->subject = '生物';
				break;
			case '历':
				$this->subject = '历史';
				break;
			case '地':
				$this->subject = '地理';
				break;
			case '政':
				$this->subject = '政治';
				break;
			default:
				$this->subject = '其他';
				break;
		}
	}
//	根据当前的学科名找到学科id
	public function subjectIdManage() {
		$id=Project::find()->where(['project'=>$this->subject])->select('id')->asArray()->one();
		if ($id) {
			$this->subject_id=$id['id'];
		}
		return false;
	}
	
	
//	根据学科和年级ID来组织出获取题目列表的条件
	public function getSelectQuestions($offset,$limit,$type = '单选题') {
//		对学科单字进行处理
		$this->subjectNameManage();
		$conditions['project_id'] = $this->subject_id;
		$conditions['type'] = $type;
		$conditions['grade_id'] = $this->gradeId;
		$result = SubjectSelect::find()->where($conditions)->offset($offset)->limit($limit)->asArray()->all();
		return $result;
	}

//	获取所有的题目类型
	public static function getTypes() {
//		获取select的所有类型
		$select_type = SubjectSelect::find()->select('type')->groupBy('type')->asArray()->all();
//		获取所有主观题类型
		$subjective_type = SubjectSubjective::find()->select('type')->groupBy('type')->asArray()->all();
		$types['select'] = $select_type;
		$types['subjective'] = $subjective_type;
		return $types;
	}
	
	/*
	 * 检查数据库中是否存在一个id为$id并且name为$name的试卷
	 * user的id和user_type从cookie里获取
	 * 如果不存在，返回false
	 */
	public function checkExamName($exam_name) {
		$user_id = \Yii::$app->request->cookies->getValue('jld_login')['id'];
		$user_type = \Yii::$app->request->cookies->getValue('jld_login')['type'];
		$check = Exam::find()->where(['user_id' => $user_id, 'user_type' => $user_type, 'name' => $exam_name])->asArray()->one();
		return $check['id'];
//		return $check;
	}
	
	/*
	 * 根据前端传来的试卷的name来判断数据库中是否有该试卷存在
	 * 如果没有，添加入数据库并返回id
	 * 如果有，直接返回id
	 */
	public function examName2Id($name) {
		$this->subjectNameManage();
		$this->subjectIdManage();
		$user_id = \Yii::$app->request->cookies->getValue('jld_login')['id'];
		$user_type = \Yii::$app->request->cookies->getValue('jld_login')['type'];
//		如果该用户已创建同样name的试卷
		$check=self::checkExamName($name);
		if ($check) {
			return $check;
		}
//		如果没有创建同样name的试卷
		
		$model = new Exam();
		$model->name = $name;
		$model->user_id = $user_id;
		$model->user_type = $user_type;
		$model->subject_id = $this->subject_id;
		$model->grade_id = $this->gradeId;
		$model->create_time = time();
		if ($model->save()) {
			return $model->id;
		}
		return false;
	}
//	根据试卷id获取试卷的科目类别，题目列表
	public static function examidToExam($examid) {
		$exam=Exam::findOne($examid);
		$result['examid']=$examid;
//		根据exam的subjectid获取这个试卷的subject
		$result['subject']=Project::findOne($exam->subject_id)->project;
//		根据exam的gradeid获取该试卷的grade信息
		$grade=Grade::findOne($exam->grade_id);
		$result['grade']=$grade->stage.$grade->grade.$grade->grade_type;
//		根据questions里面的json来获取到每一道题
		$que_json=json_decode($exam->questions,true);
		
		foreach ($que_json as $k=>$que){
			if ($que['type']=='select') {
				$result['questions']['select'][]=SubjectSelect::findOne($que['id']);
			}elseif ($que['type']=='subjective'){
				$result['questions']['subjective'][]=SubjectSubjective::findOne($que['id']);
			}elseif ($que['type']=='subjective_more'){
//				太复杂，先放一放
//				太复杂，先放一放
//				太复杂，先放一放
			}
		}
		return $result;
	}
}