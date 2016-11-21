<?php
$this->params['breadcrumbs'][] = ['label' => '管理员权限列表', 'url' => ['auth/index']];
$this->params['breadcrumbs'][] = ['label' => '角色列表', 'url' => ['auth/add-role']];
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
	<?=\yii\bootstrap\Html::label('角色名','',['class'=>'control-label'])?>
	<?=\yii\bootstrap\Html::activeInput('text',$model,'name',['class'=>'form-control'])?>
	<small><?=\yii\bootstrap\Html::error($model,'name')?></small>
</div>
<div class="form-group">
	<?=\yii\bootstrap\Html::label('角色简介','',['class'=>'control-label'])?>
	<?=\yii\bootstrap\Html::activeInput('text',$model,'description',['class'=>'form-control'])?>
	<small><?=\yii\bootstrap\Html::error($model,'description')?></small>
</div>
<div class="form-group">
	<input type="submit" value="添加角色" class="btn btn-success">
</div>
<?= \yii\bootstrap\Html::endForm() ?>
<table class="table table-striped">
	<tr>
		<th width="20%">角色名称(name)</th>
		<th>角色简介(description)</th>
		<th width="20%">操作</th>
	</tr>
	<?php
	foreach ($allRoles as $name => $role) {
		?>
		<tr>
			<td><?= $role->name; ?></td>
			<td><?= $role->description; ?></td>
			<td>
				<a href="<?=\yii\helpers\Url::to(['auth/link-role-permission','role_name'=>$role->name])?>"><i class="glyphicon glyphicon-random"></i> 设置关联</a>&emsp;&emsp;
				<a href="<?=\yii\helpers\Url::to(['auth/delete-role','role_name'=>$role->name])?>"><i class="glyphicon glyphicon-remove"></i>删除</a>
			</td>
		</tr>
		<?php
	}
	?>
</table>