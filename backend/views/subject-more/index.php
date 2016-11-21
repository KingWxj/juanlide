<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubjectMoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '一对多大题';
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->session->hasFlash('error')) {
	echo \yii\bootstrap\Alert::widget([
		'options' => ['class' => 'alert-danger',],
		'body' => Yii::$app->session->getFlash('error'),
	]);
}
?>

<div class="subject-more-index">
	
	<h1><?= Html::encode($this->title) ?></h1>
	<?php echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<p>
		<?= Html::a('添加题目', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			
			'id',
			'title',
			'type',
			'content:ntext',
//            'child:ntext',
			// 'grade_id',
			// 'project_id',
			'level',
			
			[
				'class' => 'common\components\ActionColumn', 'header' => '操作',
				'template' => '{view:view}  {update:update}  {delete:delete}  {add-select:addSelect} {add-subjective:addSubjective}',
				'buttons' => [
					// 自定义按钮
					'addSelect' => function ($url, $model, $key) {
						$options = [
							'title' => Yii::t('yii', '关联选择题'),
							'aria-label' => Yii::t('yii', '关联选择题'),
							'data-pjax' => '0',
						];
						return Html::a('<br><span class="glyphicon glyphicon-random"></span> 关联选择题', $url, $options);
					},
					'addSubjective' => function ($url, $model, $key) {
						$options = [
							'title' => Yii::t('yii', '关联主观题'),
							'aria-label' => Yii::t('yii', '关联主观题'),
							'data-pjax' => '0',
						];
						return Html::a('<br><span class="glyphicon glyphicon-pencil"></span> 关联主观题', $url, $options);
					},
				],
			],

//	        [
//		        'label'=>'更多操作',
//		        'format'=>'raw',
//		        'value' => function($data){
//			        $url = "";
//			        return Html::a('<i class="glyphicon glyphicon-random"></i> 添加关联', $url, ['title' => '添加']);
//		        }
//	        ]
		],
	]); ?>
</div>
