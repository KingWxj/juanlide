<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
    ]); ?>

<!--    --><?//= $form->field($model, 'id') ?>

    <?= $form->field($model, 'stu_account') ?>

    <?= $form->field($model, 'stu_name') ?>

<!--    --><?//= $form->field($model, 'stu_password') ?>

<!--    --><?//= $form->field($model, 'login_date') ?>

    <div class="form-group" style="vertical-align: top">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
