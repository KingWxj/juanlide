<?php
use yii\helpers\Url;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?= $this->title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum—scale=1, user-scalable=no">
	<script type="text/javascript" src="<?= Url::base(true) ?>/js/jquery.min.js"></script>
	<!--	<script type="text/javascript" src="js/jquery.moblie.min.js"></script>-->
	<link rel="stylesheet" href="<?= Url::base(true) ?>/css/bootstrap.css"/>
	<link rel="stylesheet" href="<?= Url::base(true) ?>/css/bootstrap-theme.css"/>
	<script type="text/javascript" src="<?= Url::base(true) ?>/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?= Url::base(true) ?>/css/style.css"/>
	<?=$this->blocks['head_css_js']?>
<!--	<style>-->
<!--		.blur {-->
<!--			-webkit-filter: blur(10px); /* Chrome, Opera */-->
<!--			-moz-filter: blur(10px);-->
<!--			-ms-filter: blur(10px);-->
<!--			filter: blur(10px);-->
<!--		}-->
<!--		.opacity{-->
<!--			filter:alpha(opacity=50);  /* ie 有效*/-->
<!--			-moz-opacity:0.5; /* Firefox  有效*/-->
<!--			opacity: 0.5; /* 通用，其他浏览器  有效*/-->
<!--		}-->
<!--		.no_opacity{-->
<!--			filter:alpha(opacity=100);  /* ie 有效*/-->
<!--			-moz-opacity:1; /* Firefox  有效*/-->
<!--			opacity: 1; /* 通用，其他浏览器  有效*/-->
<!--		}-->
<!--	</style>-->
</head>
<body>
<?php $this->beginBody() ?>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-header">
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="<?=Url::to(['index/index'])?>" class="navbar-brand" style="vertical-align: top;"><span><img src="<?=Url::base(true)?>/img/jldlogo.png" alt="Logo" style="max-height: 30px;"> 卷立得</span></a>
	</div>
	<div class="collapse navbar-collapse navbar-responsive-collapse">
		<ul class="nav navbar-nav">
			<li id="home"><a href="<?=Url::to(['index/index'])?>">主页</a></li>
			<li id="comeon"><a href="<?=Url::to(['addexam/index'])?>">扬帆题海</a></li>
			<li><a href="#">关于我们</a></li>
			<li><a href="#">关于我们</a></li>
			<li id="help"><a href="#">使用帮助</a></li>
			<li id="contact"><a href="#">联系我们</a></li>
		</ul>
		<?php
		$cookie = Yii::$app->request->cookies->getValue('jld_login');
		if (isset($cookie)) {
			?>
			<div class="navbar-right">
				<img src="<?=Url::base(true)?>/img/head.png" alt="头像" class="img-circle img-thumbnail img-responsive hidden-sm hidden-xs" style="max-width: 50px">
				<div class="navbar-btn dropdown" style="margin-right: 40px;display: inline-block">
					<button class="btn btn-info" data-toggle="dropdown">
						欢迎，<?= $cookie['name']?>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a target="_blank" href="<?=Url::to(['index/jumpperson'])?>">个人中心</a></li>
						<li><a href="<?=Url::to(['index/logout'])?>">退出登录</a></li>
					</ul>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>
<!--导航栏-->
<?= $content ?>
<!--底部巨幕-->
<footer id="main_footer">
	<div class="container">
		<div class="col-lg-2 col-sm-2 col-xs-2">
			<ul>
				<h4>关于我们</h4>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
			</ul>
		</div>
		<div class="col-lg-2 col-sm-2 col-xs-2">
			<ul>
				<h4>关于我们</h4>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
			</ul>
		</div>
		<div class="col-lg-2 col-sm-2 col-xs-2">
			<ul>
				<h4>关于我们</h4>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
			</ul>
		</div>
		<div class="col-lg-3 col-sm-3 col-xs-3">
			<ul>
				<h4>关于我们</h4>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
			</ul>
		</div>
		<div class="col-lg-3 col-sm-3 col-xs-3">
			<h4>联系方式</h4>
			<div class="row">
				<div class="col-xs-4"><a href="#" class="contact"><img src="<?= Url::base(true) ?>/img/微信.png"/></a></div>
				<div class="col-xs-4"><a href="#" class="contact"><img src="<?= Url::base(true) ?>/img/qq.png"/></a></div>
				<div class="col-xs-4"><a href="#" class="contact"><img src="<?= Url::base(true) ?>/img/微博.png"/></a></div>
			</div>
			<div class="row">
				<img src="<?= Url::base(true) ?>/img/二维码.png"/>
				<h5>官方微信</h5>
			</div>
		</div>
	</div>
</footer>
<div id="footer">
	<div class="container">
		<ul class="footer-link">
			<li><a href="#">关于我们</a></li>
			<li>/</li>
			<li><a href="#">关于我们</a></li>
			<li>/</li>
			<li><a href="#">关于我们</a></li>
			<li>/</li>
			<li><a href="#">关于我们</a></li>
			<li>/</li>
			<li><a href="#">联系我们</a></li>
		</ul>
		<p>© 2016 卷立得，所有内容均来自分享的公开引用资源。</p>
	</div>
</div>
<!--底部导航栏-->
<?=$this->blocks['foot_css_js']?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>