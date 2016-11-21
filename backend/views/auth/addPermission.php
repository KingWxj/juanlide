<?php
$this->params['breadcrumbs'][] = ['label' => '管理员权限列表', 'url' => ['auth/index']];
$this->params['breadcrumbs'][] = ['label' => '添加权限', 'url' => ['auth/add-permission']];
if (Yii::$app->session->hasFlash('success')) {
	echo \yii\bootstrap\Alert::widget([
		'options' => [
			'class' => 'alert-success',
		],
		'body' => Yii::$app->session->getFlash('success'),
	]);
}
if (Yii::$app->session->hasFlash('error')) {
	echo \yii\bootstrap\Alert::widget([
		'options' => [
			'class' => 'alert-danger',
		],
		'body' => Yii::$app->session->getFlash('error'),
	]);
}
?>
<style>
	form small{
		color: red;
	}
</style>
<?= \yii\bootstrap\Html::beginForm('', 'post') ?>
<div class="form-group">
	<?= \yii\bootstrap\Html::label('权限名', '', ['class' => 'control-label']) ?>
	<?= \yii\bootstrap\Html::activeInput('text', $model, 'name', ['class' => 'form-control']) ?>
	<small><?= \yii\bootstrap\Html::error($model, 'name') ?></small>
</div>
<div class="form-group">
	<?= \yii\bootstrap\Html::label('权限简介', '', ['class' => 'control-label']) ?>
	<?= \yii\bootstrap\Html::activeInput('text', $model, 'description', ['class' => 'form-control']) ?>
	<small><?= \yii\bootstrap\Html::error($model, 'description') ?></small>
</div>
<div class="form-group">
	<input type="submit" value="添加权限" class="btn btn-success">
</div>
<?= \yii\bootstrap\Html::endForm() ?>
<!--当前的权限列表-->
<table class="table table-striped">
	<tr>
		<th width="20%">权限名称(name)</th>
		<th>权限简介(description)</th>
		<th width="20%">操作</th>
	</tr>
	<?php
	foreach ($allPermissions as $name => $permission) {
		?>
		<tr>
			<td><?= $permission->name; ?></td>
			<td><?= $permission->description; ?></td>
			<td>
				<a href="<?=\yii\helpers\Url::to(['auth/delete-permission','name'=>$permission->name])?>"><i class="glyphicon glyphicon-remove"></i>删除</a>
			</td>
		</tr>
		<?php
	}
	?>
</table>