<?php
$permissions=\backend\models\AuthMgr::getPermissionsByUser(Yii::$app->session->get('admin_id'));
$system_info=\backend\models\SystemInfo::getSystemInfo();
?>
<style>
	p{
		font-size: large;
	}
	#info p{
		font-weight: 500;
	}
</style>
<div id="head_title" class="alert alert-info">
	<h1>欢迎来到卷立得后台管理</h1>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<?=$admin_info['admin_name']?>的账户权限
	</div>
	<div class="panel-body">
		<?php
		foreach ($permissions as $permission) {
			?>
			<p><?=$permission->description?></p>
			<?php
		}
		?>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-heading">系统信息</div>
	<div class="panel-body" id="info">
		<p>当前主机名：<?php echo $_SERVER['SERVER_NAME']; ?> </p>
		<p>网站运行环境：<?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
		<p>浏览器信息：<?php echo $_SERVER['HTTP_USER_AGENT'];  ?> </p>
		<p>文件根目录：<?php echo $_SERVER['DOCUMENT_ROOT'];  ?> </p>
		<p>CGI规范版本：<?php echo $_SERVER['GATEWAY_INTERFACE']; ?> </p>
		<p>网络通信协议：<?php echo $_SERVER['SERVER_PROTOCOL']; ?> </p>
		<p>当前登录IP：<?php echo $_SERVER['REMOTE_ADDR'];  ?> </p>
	</div>
</div>