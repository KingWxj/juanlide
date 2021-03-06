<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stu_account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_password')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email') ?>

<!--    --><?//= $form->field($model, 'login_date')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
