<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '学生账户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">
	
	<h1><?= Html::encode($this->title) ?></h1>
	<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<p>
		<?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			
			'id',
			'stu_account',
			'stu_name',
			'stu_password',
			'email',
			[
				'attribute'=>'login_date',
				'label'=>'登录时间',
				'value'=>function($model){
					return $model->login_date?date('Y-m-d H:i:s',$model->login_date):'无';
				}
			],
			
			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
