<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">
	
	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
		'options' => [
			'class' => 'form-inline',
		],
	]); ?>
	<?= $form->field($model, 'project') ?>
	
	<div class="form-group" style="vertical-align: top">
		<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
		<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>

</div>
