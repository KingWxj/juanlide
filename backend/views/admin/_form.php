<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'admin_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'create_date')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'login_date')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'login_ip')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
