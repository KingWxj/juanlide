<?php
$this->params['breadcrumbs'][] = ['label' => '管理员权限列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '角色列表', 'url' => ['add-role']];
$this->params['breadcrumbs'][] = ['label' => '角色-权限 关联管理'];
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
	当前角色：
	<?php
	$role_name = Yii::$app->request->get('role_name');
	$role = \backend\models\AuthMgr::getRole(Yii::$app->request->get('role_name'));
	$role_permission = \backend\models\AuthMgr::getPermissionByRole($role_name);
	echo $role_name;
	echo $role->description;
	?>
</div>
<div class="well">
	<?php
	$permissions = \backend\models\AuthMgr::getPermissions();
	?>
	<?= \yii\bootstrap\Html::beginForm('', 'post') ?>
	<div class="form-group form-inline">
		<label for="permission" class="control-label">选择一个权限</label>
		<select class="form-control" name="permission_name" id="permission">
			<?php
			$auth=Yii::$app->authManager;
			foreach ($permissions as $permission) {
				$oneRole=$auth->getRole($role_name);
				$onePermission=$auth->getPermission($permission->name);
				if(!$auth->hasChild($oneRole,$onePermission)){
					?>
					<option value="<?= $permission->name ?>"><?= $permission->description ?></option>
					<?php
				}else{
					?>
					<option disabled value="<?= $permission->name ?>"><?= $permission->description ?></option>
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
		<th width="20%">权限名称（name）</th>
		<th>权限简介（permission）</th>
		<th width="20%">操作</th>
	</tr>
	<?php
	foreach ($role_permission as $permission) {
		?>
		<tr>
			<td><?=$permission->name?></td>
			<td><?=$permission->description?></td>
			<td>
				<a href="<?=\yii\helpers\Url::to(['unlink-role-permission','role_name'=>$role_name,'permission_name'=>$permission->name])?>"><i class="glyphicon glyphicon-remove-circle"></i> 取消关联</a>
			</td>
		</tr>
		<?php
	}
	?>
</table>