<?php
use yii\helpers\Url;

$examid = Yii::$app->request->get('examid');
$this->beginBlock('head_css_js');
?>
<link rel="stylesheet" href="<?= Url::base(true) ?>/css/three.css"/>
<style>
	.pagination .active a{
		background: #5cb85c;
		border-color: #5cb85c;
	}
	.pagination .active a:hover{
		background: #4ba74d;
		border-color: #5cb85c;
	}
	.pagination li a{
		color: green;
		cursor: pointer;
	}
</style>
<?php
$this->endBlock('head_css_js');
$this->beginBlock('foot_css_js');
?>
<script>
	$().ready(function () {
		$("#comeon").addClass('active');
	});
	function addToExam($id) {
		if ($(".id" + $id).attr('status') != 'selected') {
			ajax_add($id);
		} else {
			ajax_remove($id);
		}
	}
	function ajax_add($id) {
		$.post("<?=Url::to(['addexam/addquestion'])?>", {'examid':<?=$examid?>, 'queid': $id}, function (data) {
			if (data == 'success') {
				$(".id" + $id).text('取消添加').attr('status', 'selected').removeClass("btn-success").addClass('btn-danger');
			} else if (data == 'error') {
				alert('数据异常，刷新页面后继续操作！');
				window.location.reload(true);
			}
		});
	}
	function ajax_remove($id) {
		$.post("<?=Url::to(['addexam/removequestion'])?>", {'examid':<?=$examid?>, 'queid': $id}, function (data) {
			if (data == 'success') {
				$(".id" + $id).text('添加到试卷').removeAttr('status').removeClass("btn-danger").addClass('btn-success');
			} else if (data == 'error') {
				alert('数据异常，刷新页面后继续操作！');
				window.location.reload(true);
			}
		});
	}
</script>
<?php
$this->endBlock('foot_css_js');
?>
<nav class="nav navbar-default">
	<div class="navbar-header">
		<a href="#" class="navbar-brand"><span id="ico-one">卷</span><span>立得</span></a>
	</div>
	<div class="pull-right">
		<img src="img/1.png" class="user-head"/>
		<a class="btn btn-link"><span class=" user-name">用户名</span></a>
	</div>
</nav>
<div class="container" style="margin-bottom: 5em;margin-top: 20px">
	<div id="exam_name" class="row">
		<h3 class="col-sm-12 col-md-8 col-md-push-2" style="text-align: center;color: #777777;">
			<span class="glyphicon glyphicon-list-alt" style="vertical-align: bottom;"></span>
			<span>试卷名：</span>
			<i><?= $exam_name ?></i>
		</h3>
		<h3 class="col-md-2 col-md-push-2">
			<a href="<?=Url::to(['addexam/preview'])?>&examid=<?=$examid?>">
				<span class="glyphicon glyphicon-eye-open"></span>
				<span>查看试卷</span>
			</a>
		</h3>
	</div>
	<div class="row" id="buliding-content">
		<div class="col-md-4 col-xs-4 content-head main-content-head-active">
			<div class="main-content-head">
				<img src="img/试卷创建.png" class="main-content-head-ico"/>
				<span class="main-content-head-title">选择题</span>
				<span>|</span>
				<span class="main-content-head-mintitle">判断题</span>
			</div>
		</div>
		<div class="col-md-4 col-xs-4 content-head">
			<div class="main-content-head">
				<img src="img/试卷.png" class="main-content-head-ico"/>
				<span class="main-content-head-title">在线测试</span>
				<span>|</span>
				<span class="main-content-head-mintitle">快速统计</span>
			</div>
		</div>
		<div class="col-md-4 col-xs-4 content-head">
			<div class="main-content-head">
				<img src="img/错题统计.png" class="main-content-head-ico"/>
				<span class="main-content-head-title">错题统计</span>
				<span>|</span>
				<span class="main-content-head-mintitle">着重标记</span>
			</div>
		</div>
		
		<div class="row" id="buliding-content-main">
			<?php
			foreach ($result as $key => $res) {
				?>
				<div class="col-md-12 col-xs-12">
					<div class="make-parper-step row">
						<div class="col-md-10">
							<?= str_replace('<img src="', '<img src="http://www.jldback.com', $res['content']) ?>
						</div>
						<div class="col-md-2">
							<?php
							if (!in_array($res['id'], $selected)) {
								?>
								<button class="btn btn-success id<?= $res['id'] ?>" onclick="addToExam(<?= $res['id'] ?>)">添加到试卷</button>
								<?php
							} else {
								?>
								<button class="btn btn-danger id<?= $res['id'] ?>" status="selected" onclick="addToExam(<?= $res['id'] ?>)">取消添加</button>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			<!--			<div class="col-md-12 col-xs-12">-->
			<!--				<div class="make-parper-step">-->
			<!--					<a href="#" class="btn btn-success col-md-2 col-sm-2 col-xs-4 ">试卷设置</a>-->
			<!--					<div class="col-md-1 col-xs-0 col-sm-1"></div>-->
			<!--					<div class="col-md-8 col-xs-8 col-sm-8">清晰的题目，相关的文字说明，以避免题目重复。</div>-->
			<!--				</div>-->
			<!--			</div>-->
			<!--			<div class="col-md-12 col-xs-12">-->
			<!--				<div class="make-parper-step">-->
			<!--					<a href="#" class="btn btn-success col-md-2 col-xs-4  col-sm-2 ">试卷外观</a>-->
			<!--					<div class="col-md-1 col-xs-0 col-sm-1"></div>-->
			<!--					<div class="col-md-8 col-xs-8 col-sm-8">个性的颜色搭配，整齐的试卷排版，以及多种多样的文字选择</div>-->
			<!--				</div>-->
			<!--			</div>-->
			<!--			<div class="col-md-12 col-xs-12" style="margin-bottom: 10em;">-->
			<!--				<div class="make-parper-step">-->
			<!--					<a href="#" class="btn btn-success col-md-2 col-xs-4 col-sm-2 ">豪礼相送</a>-->
			<!--					<div class="col-md-1 col-xs-0 col-sm-1"></div>-->
			<!--					<div class="col-md-8 col-xs-8 col-sm-8">创建即有好礼相送，没有我们送不到，只有你想不到</div>-->
			<!--				</div>-->
			<!--			</div>-->
		</div>
		<div class="row">
			<div class="col-md-6 col-md-push-4" >
				<?= \yii\widgets\LinkPager::widget([
					'pagination'    => $pagination,
					'nextPageLabel' => '下一页',
					'prevPageLabel' => '上一页',
				]) ?>
			</div>
		</div>
	</div>
</div>

<footer>
	<div class="container" style="padding-top: 2em;">
		<div class="row">
			<div class="col-md-8 col-xs-6">
				<span id="footer-title">卷立得</span>
				<span>|</span>
				<span>定制试卷专家</span>
			</div>
			<div class="col-md-2 col-xs-3" id="footer-sao"><h5>手机扫一扫</h5><h4>管理试卷更轻松</h4></div>
			<div class="col-md-2 col-xs-3"><img src="img/二维码.png" id="QR-code"/></div>
			<div class="row" id="copyright">copyright© 2016 卷立得，所有内容均来自分享的公开引用资源。</div>
		</div>
	</div>
</footer>