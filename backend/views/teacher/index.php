<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '教师账户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-index">
	
	<h1><?= Html::encode($this->title) ?></h1>
	<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<p>
		<?= Html::a('Create Teacher', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			
			'id',
			'tea_account',
			'tea_name',
			'tea_password',
			'email',
			'login_date',
			
			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
