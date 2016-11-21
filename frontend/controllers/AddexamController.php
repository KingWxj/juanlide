<?php
namespace frontend\controllers;


use common\models\Exam;
use common\models\GetWordZip;
use frontend\models\ExamSelect;
use frontend\models\Grade;
use frontend\models\SubjectSelect;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

class AddexamController extends BaseController {
	public $enableCsrfValidation = false;

//	首页，选择试卷类型，年级，输入试卷名的页面
	public function actionIndex() {
		$this->layout = 'main';
		return $this->render('index');
	}

//	选题的界面（选择题、判断题）
	public function actionSelect($examid) {
		$examid = (int)$examid;
		$exam = Exam::findOne($examid);
//		分页
		$pagination = new Pagination(['totalCount' => SubjectSelect::find()->where(['like', 'type', '单选'])->count(), 'pageSize' => 5]);
		$res = new ExamSelect();
		$res->gradeId = $exam->grade_id;
		$res->subject_id = $exam->subject_id;
//		获取所有select表里题目的类型
		$types = SubjectSelect::find()->select('type')->groupBy('type')->asArray()->all();
//		获取结果
		$result = $res->getSelectQuestions($pagination->offset, $pagination->limit);
//		获取这个examid对应的试卷信息
		$thisExam = Exam::findOne($examid);
		$questions = $thisExam->questions ? json_decode($thisExam->questions, true) : [];
//		已经被选择的题目的id数组
		$selected_id = ArrayHelper::getColumn($questions, 'id');
//		渲染
		return $this->render('select', [
			'types'     => $types,
			'result'    => $result,
			'selected'  => $selected_id,
			'exam_name' => $thisExam->name,
			'pagination'=>$pagination,
		]);
	}
	
//	ajax添加题目到question字段
	public function actionAddquestion() {
		$this->enableCsrfValidation = false;
		$examid = (int)\Yii::$app->request->post('examid');
		$queid = (int)\Yii::$app->request->post('queid');
		if (!$examid || !$queid) {
			echo 'error';
			exit();
		}
		$exam = Exam::findOne($examid);
//		questions如果存在已选择题目
		if ($exam->questions) {
			$questions = json_decode($exam->questions, true);
			$sort = ArrayHelper::getColumn($questions, 'sort');
			$id = ArrayHelper::getColumn($questions, 'id');
			$is_exist = in_array($queid, $id);
			sort($sort);
		} else {
//			如果不存在已选择题目
			$is_exist = false;
			$sort = false;
		}
//		这道题要是没有添加
		if (!$is_exist) {
			$max_sort = $sort ? $sort[count($sort) - 1] : 0;
			$questions[] = [
				'id'   => $queid,
				'type' => 'select',
				'sort' => $max_sort + 1
			];
			$questions = json_encode($questions);
			$exam->questions = $questions;
			if ($exam->save()) {
				echo 'success';
				exit();
			}
			echo 'error';
		} else {
//			如果本来就已添加
			echo 'success';
		}
		
	}

//	Ajax从question字段移除题目
	public function actionRemovequestion() {
		$this->enableCsrfValidation = false;
		$examid = (int)\Yii::$app->request->post('examid');
		$queid = (int)\Yii::$app->request->post('queid');
		if (!$examid || !$queid) {
			echo 'error';
			die();
		}
//		检查数据结束
		$exam = Exam::findOne($examid);
//		questions如果存在已选择题目
		if ($exam->questions) {
			$questions = json_decode($exam->questions, true);
			foreach ($questions as $key => $question) {
				if ($question['id'] == $queid) {
					array_splice($questions, $key, 1);
				}
			}
			$questions = json_encode($questions);
			$exam->questions = $questions;
			$exam->save();
		}
		echo 'success';
	}
	
	public function actionGetexamid() {
		$examSelect = new ExamSelect();
		$examSelect->subject = $_POST['subject'];
		$examSelect->gradeId = $_POST['grade'];
		echo $examSelect->examName2Id($_POST['name']);
	}
//	预览试卷
	public function actionPreview() {
		$examid=(int)\Yii::$app->request->get('examid');
		$exam=ExamSelect::examidToExam($examid);
		return $this->render('preview',['exam'=>$exam]);
	}
//	下载试卷
	public function actionDownload() {
		$examid=(int)\Yii::$app->request->get('examid');
		if (!$examid) {
			die("404");
		}
		$exam=ExamSelect::examidToExam($examid);
		$data="";
		$data.="<ol>";
				$i=0;
				foreach ($exam['questions']['select'] as $key => $select) {
					$i++;
					$data.='<li>';
					$data.=str_replace('<img src="', '<img src="http://www.jldback.com', $select->content);
					$data.='</li>';
				}
		$data.='</ol>';
		$word=new GetWordZip();
		$word->getDownZip($data);
	}
}