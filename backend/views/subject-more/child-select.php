<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ChildSelect */
/* @var $form ActiveForm */
$this->params['breadcrumbs'][] = ['label' => '一对多大题管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = '添加选择题';
$id = (int)Yii::$app->request->get('id');

if (Yii::$app->session->hasFlash('success')) {
	echo \yii\bootstrap\Alert::widget([
		'options' => ['class' => 'alert-success',],
		'body' => Yii::$app->session->getFlash('success'),
	]);
}
if (Yii::$app->session->hasFlash('error')) {
	echo \yii\bootstrap\Alert::widget([
		'options' => ['class' => 'alert-danger',],
		'body' => Yii::$app->session->getFlash('error'),
	]);
}
?>
<div class="subject-more-child_select">
	
	<?php $form = ActiveForm::begin(); ?>
	<input type="hidden" name="ChildSelect[pid]" value="<?= $id ?>">
	<!--        --><? //= $form->field($model, 'pid')->textInput() ?>
	<?= $form->field($model, 'title') ?>
	<?= $form->field($model, 'type') ?>
	<?= $form->field($model, 'sort') ?>
	<?= $form->field($model, 'content')->textarea(['rows' => 10]) ?>
	<?= $form->field($model, 'result') ?>
	<!--		--><? //= $form->field($model, 'level') ?>
	<!--        --><? //= $form->field($model, 'imgroute') ?>
	<div class="form-group">
		<label for="" class="control-label">难度星级</label>
		<div id="star" data-score="<?= $model->level ? $model->level : 3; ?>"></div>
	</div>
	
	<div class="form-group">
		<?= Html::submitButton('添加小题', ['class' => 'btn btn-primary']) ?>
	</div>
	<?php ActiveForm::end(); ?>

</div>
<script type="text/javascript" src="js/jquery.raty.min.js"></script>
<script>
	$().ready(function () {
		$('#star').raty({
			score: <?=$model->level ? $model->level : 3;?>,
			scoreName: 'ChildSelect[level]'
		});
	});
</script>
<?=$this->render('show-child',['id'=>$id]);?>