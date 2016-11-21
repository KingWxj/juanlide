<?php
$this->beginBlock('head_css_js');
?><style>
	footer{
		position: absolute;
		bottom:0;
	}
</style>
<?php
$this->endBlock('head_css_js');
?>
<?php
$this->beginBlock('foot_css_js');
?>
<script>
	$().ready(function () {
		var $time=5;
		setInterval(function () {
			$("#time").text($time);
			$time--;
			if($time<0){
				window.location.href='<?=\yii\helpers\Url::to(['index/index'])?>';
			}
		},1000);
	});
</script>
<?php
$this->endBlock('foot_css_js');
?>
<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="panel panel-default col-xs-12 col-sm-12 col-md-6 c0l-lg-4 col-md-push-3 col-lg-push-4" style="padding: 0 0">
			<div class="panel-heading">
				账号激活成功！
			</div>
			<div class="panel-body">
				<p>欢迎您使用卷立得</p>
				<p><span id="time">5</span>秒后跳转到<a href="<?= \yii\helpers\Url::to(['index/index']) ?>">[ 主页 ]</a></p>
			</div>
			<div class="panel-footer">
				<a href="<?= \yii\helpers\Url::to(['index/index']) ?>">&gt;&gt;立即跳转</a>
			</div>
		</div>
	</div>
</div>
