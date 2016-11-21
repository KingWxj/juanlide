<?php

use yii\helpers\Html;
use yii\grid\GridView;
$this->title = '网络爬虫';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$this->beginBlock("head_css_js");
?>
<style>
	#spider td{
		text-align: center;
	}
</style>
<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	$().ready(function () {
		$("#getUrl").click(function () {
			getUrl();
		});
		$("#getExam").click(function () {
			getExam();
		});
	});
	function getUrl() {
		$("#getUrl").attr("disabled",true);
		$("#getExam").attr("disabled",true);
		$("#status").text('正在抓取试卷的Url存入数据库，请稍等···');
		$.post('<?=\yii\helpers\Url::to(["spider/run-spider-url"])?>',{'handle':'getUrl'},function (data) {
			$("#status").text(data);
			$("#getExam").removeAttr("disabled");
			$("#getUrl").removeAttr("disabled");
		});
	}
	function getExam() {
		$("#getUrl").attr("disabled",true);
		$("#getExam").attr("disabled",true);
		$("#status").text('正在从数据库获取Url抓取试卷，请稍等···');
		$.post('<?=\yii\helpers\Url::to(["spider/run-spider-exam"])?>',{'handle':'getExam'},function (data) {
			$("#status").text(data);
			$("#getExam").removeAttr("disabled");
			$("#getUrl").removeAttr("disabled");
		});
	}
</script>
<?php
$this->endBlock("head_css_js");
?>
<table id="spider" class="table table-striped table-bordered">
	<tr>
		<td colspan="2">爬虫！</td>
	</tr>
	<tr>
		<td colspan="2">http://tiku.21cnjy.com/</td>
	</tr>
	<tr>
		<td><button class="btn btn-warning" id="getUrl">爬链接</button></td>
		<td><button class="btn btn-success" id="getExam">爬试卷</button></td>
	</tr>
	<tr>
		<td colspan="2">当前状态：<span id="status" style="color: red;;">待机</span></td>
	</tr>
</table>

