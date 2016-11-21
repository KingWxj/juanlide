<?php
$this->params['breadcrumbs'][] = ['label' => '管理员权限列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '管理员-角色 关联管理'];
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
<div class="alert alert-info">
	当前管理员：
	<?php
	$user_id = Yii::$app->request->get('user_id');
	$user=\backend\models\Admin::find()->where(['id'=>$user_id])->asArray()->one();
	$roles = \backend\models\AuthMgr::getRolesByUser($user_id);
	echo $user['admin_name'];
	?>
</div>
<div class="well">
	<?= \yii\bootstrap\Html::beginForm('', 'post') ?>
	<div class="form-group form-inline">
		<label for="role" class="control-label">选择一个权限</label>
		<select class="form-control" name="role_name" id="role">
			<?php
			$allRole=\backend\models\AuthMgr::getRoles();
			$hasRoles=\backend\models\AuthMgr::getRolesByUser($user_id);
			foreach ($allRole as $name=>$role) {
				if (!isset($hasRoles[$name])){
					?>
					<option value="<?= $role->name ?>"><?= $role->description ?></option>
					<?php
				}else{
					?>
					<option disabled value="<?= $role->name ?>"><?= $role->description ?></option>
					<?php
				}
			}
			?>
		</select>
		<input type="submit" value="添加权限到角色" class="btn btn-success">
	</div>
	<?= \yii\bootstrap\Html::endForm() ?>
</div>
<table class="table table-striped">
	<tr>
		<th width="20%">角色名称（name）</th>
		<th>权限简介（permission）</th>
		<th width="20%">操作</th>
	</tr>
	<?php
	foreach ($roles as $role) {
		?>
		<tr>
			<td><?=$role->name?></td>
			<td><?=$role->description?></td>
			<td>
				<a href="<?=\yii\helpers\Url::to(['unlink-user-role','user_id'=>$user_id,'role_name'=>$role->name])?>"><i class="glyphicon glyphicon-remove-circle"></i> 取消关联</a>
			</td>
		</tr>
		<?php
	}
	?>
</table>
