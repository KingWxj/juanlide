<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\searchAdmin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-search">
	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
		'options' => ['class' => 'form-inline'],
	]); ?>
		<?= $form->field($model, 'id') ?>
		<?= $form->field($model, 'admin_name') ?>
	
	<!--    --><? //= $form->field($model, 'admin_password') ?>
	
	<!--    --><? //= $form->field($model, 'description') ?>
	
	<!--    --><? //= $form->field($model, 'create_date') ?>
	
	<?php // echo $form->field($model, 'login_date') ?>
	
	<?php // echo $form->field($model, 'login_ip') ?>
	
	<div class="form-group" style="vertical-align: top;">
		<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
		<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>

</div>
