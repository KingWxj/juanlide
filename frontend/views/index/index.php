<?php
use yii\bootstrap\Html;
use yii\helpers\Url;

$this->title = '卷立得-最好的试卷之家';
/*
 * @var $model 来自控制器的模型实例化
 */

?>
<?php $this->beginBlock('head_css_js') ?>
<style>
	#register-content {
		background: rgba(240, 240, 240, 0.5);
	}
	
	#find-parple {
		background: rgba(0, 191, 255, 0.7);
	}
	
	.nav-tabs > li.active > a {
		background: rgba(250, 250, 250, 0.6);
	}
	
	.nav-tabs li a {
		color: darkslateblue;
	}
	
	#welcome p {
		color: #000;
	}
</style>
<script>
	$().ready(function () {
		$("#home").addClass('active');
	});
</script>
<?php $this->endBlock() ?>
<?php $this->beginBlock('foot_css_js') ?>
<script type="text/javascript" src="<?= Url::base(true) ?>/js/index.js"></script>
<?php $this->endBlock() ?>
<div class="jumbotron" id="jum" style="margin-top: 50px">
	<div class="container">
		<div class="row" id="page-head">
			<div class="col-lg-12 col-xs-12">
				<div class="col-lg-6 col-xs-6">
					<h2>我们不生产试卷</h2>
					<h2>我们只是试卷的搬运工</h2>
				</div>
				<div class="col-lg-6 col-xs-6" id="form1">
					<?php
					if (!Yii::$app->request->cookies->has('jld_login')) {
						echo Html::beginForm(['index/index'], 'post', ['class' => 'form-horizontal', 'id' => 'defaultForm']);
						?>
						<div class="row">
							<div class="form-group" id="zhanggroup">
								<label class="col-lg-3 col-xs-3 control-label" id="zhanghao">账号</label>
								<div class="col-lg-7 col-xs-9">
									<?= Html::activeInput('text', $model, 'input_account', ['class' => 'form-control', 'id' => 'user']) ?>
									<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" id="zhangerror"></span>
									<?= Html::error($model, 'input_account', ['style' => 'font-size:small;color:red;']) ?>
									<label class="label" id="label2">用户名不能为空！</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group" id="migroup">
								<label class="col-lg-3 col-xs-3 control-label" id="mima">密码</label>
								<div class="col-lg-7 col-xs-9">
									<?= Html::activeInput('password', $model, 'input_password', ['class' => 'form-control', 'id' => 'pass']) ?>
									<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" id="mierror"></span>
									<?= Html::error($model, 'input_password', ['style' => 'font-size:small;color:red;']) ?>
									<label class="label" id="label4">密码不能为空！</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-3 col-xs-offset-3">
									<input type="submit" class="btn btn-primary inputs" value="登陆" onclick="return check(this.form)"/>
									<a href="<?=Url::to(['register/student'])?>" class="btn btn-success inputs" id="register">注册</a>
								</div>
							</div>
						</div>
						<?php
						echo Html::endForm();
					} else {
						?>
						<div id="register-content">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#welcome" data-toggle="tab">欢迎来到卷立得</a></li>
								<li><a id="personal-link" href="#personal" data-toggle="tab">个人中心</a></li>
							</ul>
							<div class="tab-content opacity" style="padding: 10px;color: #000;;">
								<div class="tab-pane fade in active " id="welcome">
									<p>这里，是你的学习世界；这里，是你提升分数最好的地方；</p>
									<p>这里，没有杂乱无章的题目；这里，是属于你的题海······</p>
									<a href="#find-parple" class="btn btn-info " id="find-parple">找到一张试卷，在这片美丽的题海中起航吧</a>
								</div>
								<div class="tab-pane" id="personal">
									<p>个人中心</p>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<!--//巨幕-->
		
		<div id="project">
			<ul id="class1">
				<li><a href="#">语文</a></li>
				<li><a href="#">数学</a></li>
				<li><a href="#">英语</a></li>
				<li><a href="#">数学</a></li>
				<li><a href="#">物理</a></li>
			</ul>
			<ul id="class2">
				<li><a href="#">语文</a></li>
				<li><a href="#">语文</a></li>
				<li><a href="#">语文</a></li>
				<li><a href="#">语文</a></li>
				<li><a href="#">物理</a></li>
			</ul>
			<ul id="class3">
				<li><a href="#">语文</a></li>
				<li><a href="#">数学</a></li>
				<li><a href="#">英语</a></li>
				<li><a href="#">数学</a></li>
				<li><a href="#">物理</a></li>
			</ul>
			<ul id="class4">
				<li><a href="#">物理</a></li>
				<li><a href="#">物理</a></li>
				<li><a href="#">物理</a></li>
				<li><a href="#">物理</a></li>
				<li><a href="#">物理</a></li>
			</ul>
			<div id="class">
				<h2 id="grade"><img src="<?= Url::base(true) ?>/img/arrow_left_32px_515111_easyicon.net.png" id="left"/>
					<span>小学课程</span>
					<img src="<?= Url::base(true) ?>/img/arrow_right_32px_515112_easyicon.net.png" id="right"/></h2>
			</div>
		</div>
	</div>
</div>
<!--科目导航栏-->

<div class="container" id="grade1">
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/二 年 级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/二 年 级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/三 年 级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/四  年  级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/五  年  级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/六  年  级.png"/></a></div>
</div>
<div class="container" id="grade2">
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/二 年 级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/二 年 级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/三 年 级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/四  年  级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/五  年  级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/六  年  级.png"/></a></div>
</div>
<div class="container" id="grade3">
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/二 年 级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/二 年 级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/三 年 级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/四  年  级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/五  年  级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/六  年  级.png"/></a></div>
</div>
<div class="container" id="grade4">
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/二 年 级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/二 年 级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/三 年 级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/四  年  级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/五  年  级.png"/></a></div>
	<div class="col-lg-4 col-sm-6 col-xs-12 main-grade"><a href="#"><img src="<?= Url::base(true) ?>/img/六  年  级.png"/></a></div>
</div>
<!--年纪板块-->

<div class="container">
	<h1>精品试卷</h1>
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-xs-12" id="test">
			<div style="background: url(<?= Url::base(true) ?>/img/fooer.png);width: 50%; height:30rem;float: left;">
			</div>
			<div style="float: left;margin-left: 2rem;">
				<h3>试卷类型</h3>
				适应阶段：<p id="period"></p>
				出题人：<p id="person"></p>
				试卷难度：<p id="different"></p>
				试卷概况：<p id="per"></p>
				<input type="button" value="详情" class="btn btn-danger more"/>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-xs-12" id="test">
			<div style="background: url(<?= Url::base(true) ?>/img/fooer.png);width:50%; height:30rem;float: left;">
			</div>
			<div style="float: left;margin-left: 2rem;">
				<h3>试卷类型</h3>
				适应阶段：<p id="period"></p>
				出题人：<p id="person"></p>
				试卷难度：<p id="different"></p>
				试卷概况：<p id="per"></p>
				<input type="button" value="详情" class="btn btn-danger more"/>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-xs-12" id="test">
			<div style="background: url(<?= Url::base(true) ?>/img/fooer.png);width:50%; height:30rem;float: left;">
			</div>
			<div style="float: left;margin-left: 2rem;">
				<h3>试卷类型</h3>
				适应阶段：<p id="period"></p>
				出题人：<p id="person"></p>
				试卷难度：<p id="different"></p>
				试卷概况：<p id="per"></p>
				<input type="button" value="详情" class="btn btn-danger more"/>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-xs-12" id="test">
			<div style="background: url(<?= Url::base(true) ?>/img/fooer.png);width:50%; height:30rem;float: left;">
			</div>
			<div style="float: left;margin-left: 2rem;">
				<h3>试卷类型</h3>
				适应阶段：<p id="period"></p>
				出题人：<p id="person"></p>
				试卷难度：<p id="different"></p>
				试卷概况：<p id="per"></p>
				<input type="button" value="详情" class="btn btn-danger more"/>
			</div>
		</div>
	</div>
</div>
<!--//试卷-->

<div class="container">
	<h1>我们很不同</h1>
	<div class="col-lg-2 col-sm-3 col-xs-12">
		<div class="main-step-img"><img src="<?= Url::base(true) ?>/img/1.png"/></div>
		<h3>快速</h3>
		<p>自主选题，一键生成想怎么搭配怎么搭配，我有题库，你敢来尝试吗？</p>
	</div>
	<div class="col-lg-1 col-xs-0"></div>
	<div class="col-lg-2 col-sm-3 col-xs-12">
		<div class="main-step-img"><img src="<?= Url::base(true) ?>/img/2.png"/></div>
		<h3>丰富</h3>
		<p>广泛筛选各各名校的测试试题海量题型任你选，更新快种类多只有你想不到没有你找不到。</p>
	</div>
	<div class="col-lg-1 col-xs-0"></div>
	<div class="col-lg-2 col-sm-3  col-xs-12">
		<div class="main-step-img"><img src="<?= Url::base(true) ?>/img/3.png"/></div>
		<h3>专业</h3>
		<p>在线测试，及时改错同时具备收藏功能，好习惯的养成。只差一个错题本的距离。</p>
	</div>
	<div class="col-lg-1 col-xs-0"></div>
	<div class="col-lg-2 col-sm-3 col-xs-12">
		<div class="main-step-img"><img src="<?= Url::base(true) ?>/img/4.png"/></div>
		<h3>明确</h3>
		<p>老师学生各司其职。账户分明，老师省心，学生安心，家长放心。</p>
	</div>
</div>
<!--我们的优点-->

<div class="jumbotron" style="padding: 0px;">
	<img src="<?= Url::base(true) ?>/img/fooer.png" width="100%" height="auto"/>
</div>