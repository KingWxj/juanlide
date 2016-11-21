<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SubjectMore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-more-form">
	
	<?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
	
<!--	--><?//= $form->field($model, 'child')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'grade_id')->listBox(\backend\models\Grade::getGrades(),['size'=>1]) ?>
	
	<?= $form->field($model, 'project_id')->listBox(\backend\models\Project::getProjects(),['size'=>1]) ?>
	
<!--	--><?//= $form->field($model, 'level')->textInput() ?>
	<div class="form-group">
		<label for="" class="control-label">难度星级</label>
		<div id="star" data-score="<?= $model->level ? $model->level : 3; ?>"></div>
	</div>
	<div class="alert alert-info">先添加大题主干，稍后在题目关联中添加子类小题</div>
	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>

</div>
<script type="text/javascript" src="js/jquery.raty.min.js"></script>
<script>
	$().ready(function () {
		$('#star').raty({
			score: <?=$model->level ? $model->level : 3 ;?>,
			scoreName: 'SubjectMore[level]'
		});
	});
</script>
