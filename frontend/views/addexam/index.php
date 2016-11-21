<?php
use yii\helpers\Url;

$this->title = '生成试卷';
?>
<?php $this->beginBlock('head_css_js') ?>
<link rel="stylesheet" href="<?= Url::base(true) ?>/css/two.css"/>
<script>
	$().ready(function () {
		$("#comeon").addClass('active');
	});
</script>
<?php $this->endBlock() ?>
<?php $this->beginBlock('foot_css_js') ?>
<script type="text/javascript" src="<?= Url::base(true) ?>/js/two.js"></script>
<script>
	var $subject;
	$(".projects,#project-left,#project-right").click(function () {
		$selected = $("div.project-background");
		$subject = $selected ? $selected.text() : undefined;
		if ($subject) {
			$("#subject").val($subject);
		}
	});
	function selectSubject() {
		var $subject = $("#subject").val();
		var $grade = $("#grade").val();
		var $name = $("#name").val();
		if (!$subject) {
			alert('请选择科目');
			return false;
		}
		if (!$name) {
			alert('请输入您的试卷标题');
			
		}
		$.post("<?=Url::to(['addexam/getexamid'])?>", {'name': $name, 'grade': $grade, 'subject': $subject}, function (data) {
			var $href = "<?=Url::to(['addexam/select'])?>&examid=" + data;
			window.location.href = $href;
		});
	}
</script>
<?php $this->endBlock() ?>
<div class="container" id="container">
	<div id="png-background">
		<div id="png-head">
			<span class="glyphicon glyphicon-list-alt"></span>
			<span>创建试卷类型</span>
		</div><!--内容头-->
	</div>
	<div class="row">
		<div id="project-left"><img src="<?= Url::base(true) ?>/img/leftrow.png"/></div>
		<div id="project1" class="projects">语</div>
		<div id="project2" class="projects">数</div>
		<div id="project3" class="projects">英</div>
		<div id="project4" class="projects">物</div>
		<div id="project5" class="projects">化</div>
		<div id="project-right"><img src="<?= Url::base(true) ?>/img/rightrow.png"/></div>
	</div><!--内容导航栏-->
	<div class="tonexts">
<!--		<form action="--><?//= Url::to(['addexam/select']) ?><!--" id="select_form" method="post">-->
			<div class="form-group">
				<label for="name" class="control-label">试卷名称：</label>
				<input type="text" id="name" name="name" class="form-control">
				<div style="color: red;font-size: small;" id="name_error"></div>
			</div>
			<div class="form-group">
				<label for="grade" class="control-label">年级/阶段</label>
				<select name="grade" id="grade" class="form-control">
					<?php
					foreach (\frontend\models\Grade::getGradeList() as $grade) {
						?>
						<option value="<?= $grade['id'] ?>"><?= $grade['name'] ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<input type="hidden" name="subject" id="subject">
			
			<div class="form-group">
				<input type="button" onclick="selectSubject()" class="btn btn-success tonext" value="下一步">
			</div>
<!--		</form>-->
	</div>
	<div class="container">
		<div class="row steps" style="">
			<div class="pull-left" id="makea"></div>
			<div class="pull-right"><a href="#" id="morestep">了解更多-></a></div>
		</div>
		<div class="row steps" id="steps-img">
			<img src="<?= Url::base(true) ?>/img/step.jpg"/>
		</div>
	</div>
</div>
<!--内容-->