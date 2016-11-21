<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SubjectSelect */
/* @var $form yii\widgets\ActiveForm */
/*
 * SubjectSelect[project_id]
 *
 */
?>
<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/kityformula-plugin/addKityFormulaDialog.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/kityformula-plugin/getKfContent.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/kityformula-plugin/defaultFilterFix.js"></script>
<div class="subject-select-form">
	
	<?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'type')->listBox(['单选题' => '单选题', '多选题' => '多选题', '判断题' => '判断题'], ['maxlength' => true, 'size' => 1]) ?>
	
	<!--	--><? //= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
	<div class="form-group">
		<label for="editor_content" class="control-label">题干内容</label>
		<script id="editor_content" name="SubjectSelect[content]" type="text/plain"><?= $model->content ?></script>
	</div>
	
	<!--    --><? //= $form->field($model, 'imgroute')->textInput(['rows' => 6]) ?>
	
	<!--	--><? //= $form->field($model, 'result')->textarea(['rows' => 6]) ?>
	<div class="form-group">
		<label for="editor_result" class="control-label">答案</label>
		<script id="editor_result" name="SubjectSelect[result]" type="text/plain"><?= $model->result ?></script>
	</div>
	<div class="form-group">
		<label for="" class="control-label">难度星级</label>
		<div id="star" data-score="<?= $model->level ? $model->level : 3; ?>"></div>
	</div>
	<?= $form->field($model, 'grade_id')->listBox(\backend\models\Grade::getGrades(), ['size' => 1]) ?>
	
	<?= $form->field($model, 'project_id')->listBox(\backend\models\Project::getProjects(), ['size' => 1]) ?>
	
	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>
	<script type="text/javascript" src="js/jquery.raty.min.js"></script>
	<script>
		var ue_content = UE.getEditor('editor_content', {
			toolbars: toolbar
		});
		var ue_result = UE.getEditor('editor_result', {
			toolbars: toolbar
		});
		$().ready(function () {
			$('#star').raty({
				score: <?=$model->level ? $model->level : 3;?>,
				scoreName: 'SubjectSelect[level]'
			});
		});
	</script>
</div>