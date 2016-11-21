<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SubjectSubjective */
/* @var $form yii\widgets\ActiveForm */
?>
<script type="text/javascript" src="js/jquery.raty.min.js"></script>
<div class="subject-subjective-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'result')->textarea(['rows' => 6]) ?>
    
    <div class="form-group">
        <label for="" class="control-label">难度星级</label>
        <div id="star" data-score="<?=$model->level ? $model->level : 3 ;?>"></div>
    </div>
    <?= $form->field($model, 'grade_id')->listBox(\backend\models\Grade::getGrades(),['size'=>1]) ?>
    
    <?= $form->field($model, 'project_id')->listBox(\backend\models\Project::getProjects(),['size'=>1]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end();  ?>
    <script>
        $().ready(function () {
            $('#star').raty({
                score: <?=$model->level ? $model->level : 3 ;?>,
                scoreName: 'SubjectSubjective[level]'
            });
        });
    </script>
</div>
