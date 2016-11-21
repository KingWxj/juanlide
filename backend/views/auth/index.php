<?php
$this->params['breadcrumbs'][] = ['label' => '管理员权限列表'];
?>
<style>
	.panel {
		margin-bottom: 0;
	}
	.row{height:100%; }
</style>
<table class="table table-striped">
	<tr>
		<th width="10%">ID</th>
		<th width="20%">登录名</th>
		<th width="50%">角色/权限</th>
		<th width="20%">操作</th>
	</tr>
	<?php
	foreach ($list as $k => $v) {
		?>
		<tr>
			<td width="10%"><?= $v['id'] ?></td>
			<td width="20%"><?= $v['admin_name'] ?></td>
			<td width="50%">
				<div class="row">
				<?php
				$roles = \backend\models\AuthMgr::getRolesByUser($v['id']);
				if ($roles) {
					foreach ($roles as $role) {
						?>
						<div class="panel panel-default col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding: 0;height: 100%">
							<div class="panel-heading"><?= $role->description ?></div>
							<div class="panel-body">
								<?php
								$permissions = \backend\models\AuthMgr::getPermissionByRole($role->name);
								foreach ($permissions as $permission) {
									echo $permission->description . '<br>';
								}
								?>
							</div>
						</div>
						<?php
					}
				} else {
					?>
					<div class="panel panel-default col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="panel-heading">角色——无</div>
						<div class="panel-body">
							权限——无
						</div>
					</div>
					<?php
				}
				?>
				</div>
			</td>
			
			<td width="20%" style="padding-left: 2%">
				<a href="<?= \yii\helpers\Url::to(['link-user-role', 'user_id' => $v['id']]) ?>"><i class="glyphicon glyphicon-link"></i> 关联角色</a>
			</td>
		</tr>
		<?php
	}
	?>
</table>
<script>
	$().ready(function () {
		var $max_height=0;
		$.each($("div.panel"),function (panel) {
			$height=$("div.panel:eq("+panel+")").height();
			if($height>$max_height){
				$max_height=$height;
			}
		});
		$(".panel").css('height',$max_height);
	});
</script>