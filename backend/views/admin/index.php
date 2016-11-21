<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\searchAdmin */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员列表';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
?>
<div class="admin-index">
	
	<!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->
	<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<p>
		<?= Html::a('Create Admin', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			
			'id',
			'admin_name',
			'admin_password',
			'description',
			[
				'attribute' => 'create_date',
				'label' => '登录时间',
				'value' => function ($model) {
					return $model->create_date?date('Y-m-d H:i:s', $model->create_date):'无';
				},
			],
			[
				'attribute' => 'login_date',
				'label' => '登录时间',
				'value' => function ($model) {
					return $model->login_date?date('Y-m-d H:i:s', $model->login_date):'无';
				},
			],
			'login_ip',
			
			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
