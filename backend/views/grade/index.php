<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GradeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '年级列表管理';
$this->params['breadcrumbs'][] = ['label'=>$this->title];
?>
<div class="grade-index">
	
	<h1><?= Html::encode($this->title) ?></h1>
	<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<p>
		<?= Html::a('新建年级信息', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			
//			'id',
			'stage',
			'grade',
			'grade_type',
			
			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
