<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SubjectSubjectiveSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-subjective-search">
	
	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
		'options' => ['class' => 'form-inline'],
	]); ?>
	
	<!--    --><? //= $form->field($model, 'id') ?>
	
	<?= $form->field($model, 'title') ?>
	
	<!--    --><? //= $form->field($model, 'type') ?>
	
	<?= $form->field($model, 'content') ?>
	
	
	<?php // echo $form->field($model, 'result') ?>
	
	<?php echo $form->field($model, 'grade_id')->listBox(\backend\models\Grade::getGrades(), ['size' => 1]) ?>
	
	<?php echo $form->field($model, 'project_id')->listBox(\backend\models\Project::getProjects(), ['size' => 1]) ?>
	
	<!--    --><?php // echo $form->field($model, 'level') ?>
	<div class="form-group" style="vertical-align: top;margin: 0 10px">
		<script type="text/javascript" src="js/jquery.raty.min.js"></script>
		<label for="" class="control-label">难度星级</label>
		<div id="star"></div>
		<script>
			$().ready(function () {
				$('#star').raty({
					score: <?=$model->level ? $model->level : 0 ;?>,
					scoreName: 'SubjectSubjectiveSearch[level]'
				});
			});
		</script>
	</div>
	
	<div class="form-group" style="vertical-align: top;">
		<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
		<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>

</div>
