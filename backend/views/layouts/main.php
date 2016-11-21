<?php
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$permissions = \backend\models\AuthMgr::getPermissionsByUser(Yii::$app->session->get('admin_id'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- Basic -->
	<meta charset="UTF-8"/>
	
	<title>卷立得 后台管理</title>
	
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	
	<!-- Import google fonts -->
	<!--	<link href="http://fonts.useso.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css" />-->
	
	<!-- Favicon and touch icons -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<!-- start: CSS file-->
	
	<!-- Vendor CSS-->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="assets/vendor/skycons/css/skycons.css" rel="stylesheet"/>
	<link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
	
	<!-- Plugins CSS-->
	<link href="assets/plugins/bootkit/css/bootkit.css" rel="stylesheet"/>
	<link href="assets/plugins/scrollbar/css/mCustomScrollbar.css" rel="stylesheet"/>
	<link href="assets/plugins/fullcalendar/css/fullcalendar.css" rel="stylesheet"/>
	<link href="assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css" rel="stylesheet"/>
	<link href="assets/plugins/xcharts/css/xcharts.min.css" rel="stylesheet"/>
	<link href="assets/plugins/morris/css/morris.css" rel="stylesheet"/>
	
	<!-- Theme CSS -->
	<link href="assets/css/jquery.mmenu.css" rel="stylesheet"/>
	
	<!-- Page CSS -->
	<link href="assets/css/style.css" rel="stylesheet"/>
	<link href="assets/css/add-ons.min.css" rel="stylesheet"/>
	
	<!-- end: CSS file-->
	
	<!-- Head Libs -->
	<script src="assets/plugins/modernizr/js/modernizr.js"></script>
	<script src="assets/vendor/js/jquery.min.js"></script>
	<script src="assets/vendor/js/jquery-2.1.1.min.js"></script>
	<script src="assets/vendor/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--<script src="assets/vendor/skycons/js/skycons.js"></script>-->
	
	<!-- Theme JS -->
	<script src="assets/js/jquery.mmenu.min.js"></script>
	<script src="assets/js/core.min.js"></script>
	<?= $this->blocks["head_css_js"] ?>
</head>

<body>

<!-- Start: Header -->
<div class="navbar" role="navigation">
	<div class="container-fluid container-nav">
		<!-- Navbar Action -->
		<ul class="nav navbar-nav navbar-actions navbar-left">
			<li class="visible-md visible-lg"><a href="javascript:void (0)" id="main-menu-toggle"><i class="fa fa-th-large"></i></a></li>
			<li class="visible-xs visible-sm"><a href="javascript:void (0)" id="sidebar-menu"><i class="fa fa-navicon"></i></a></li>
		</ul>
		<!-- Navbar Left -->
		<div class="navbar-left">
			<!-- Search Form -->
			<form class="search navbar-form" action="https://www.baidu.com/s" method="get" target="_blank">
				<div class="input-group input-search">
					<input type="text" class="form-control" name="wd" id="q" placeholder="Baidu...">
					<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
				</div>
			</form>
		</div>
		<!-- Navbar Right -->
		<div class="navbar-right">
			<!-- Notifications -->
			<!--
			<ul class="notifications hidden-sm hidden-xs">
				<li>
					<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
						<i class="fa fa-tasks"></i>
						<span class="badge">10</span>
					</a>
					<ul class="dropdown-menu update-menu" role="menu">
						<li><a href="#"><i class="fa fa-database bk-fg-primary"></i> Database </a></li>
						<li><a href="#"><i class="fa fa-bar-chart-o bk-fg-primary"></i> Connection </a></li>
						<li><a href="#"><i class="fa fa-bell bk-fg-primary"></i> Notification </a></li>
						<li><a href="#"><i class="fa fa-envelope bk-fg-primary"></i> Message </a></li>
						<li><a href="#"><i class="fa fa-flash bk-fg-primary"></i> Traffic </a></li>
						<li><a href="#"><i class="fa fa-credit-card bk-fg-primary"></i> Invoices </a></li>
						<li><a href="#"><i class="fa fa-dollar bk-fg-primary"></i> Finances </a></li>
						<li><a href="#"><i class="fa fa-thumbs-o-up bk-fg-primary"></i> Orders </a></li>
						<li><a href="#"><i class="fa fa-folder bk-fg-primary"></i> Directories </a></li>
						<li><a href="#"><i class="fa fa-users bk-fg-primary"></i> Users </a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
						<i class="fa fa-envelope"></i>
						<span class="badge">5</span>
					</a>
					<ul class="dropdown-menu">
						<li class="dropdown-menu-header">
							<strong>Messages</strong>
							<div class="progress progress-xs  progress-striped active">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
									60%
								</div>
							</div>
						</li>
						<li class="avatar">
							<a href="page-inbox.html">
								<img class="avatar" src="assets/img/avatar1.jpg" alt=""/>
								<div>
									<div class="point point-primary point-lg"></div>
									New message
								</div>
								<span><small>1 minute ago</small></span>
							</a>
						</li>
						<li class="avatar">
							<a href="page-inbox.html">
								<img class="avatar" src="assets/img/avatar2.jpg" alt=""/>
								<div>
									<div class="point point-primary point-lg"></div>
									New message
								</div>
								<span><small>3 minute ago</small></span>
							</a>
						</li>
						<li class="avatar">
							<a href="page-inbox.html">
								<img class="avatar" src="assets/img/avatar3.jpg" alt=""/>
								<div>
									<div class="point point-primary point-lg"></div>
									New message
								</div>
								<span><small>4 minute ago</small></span>
							</a>
						</li>
						<li class="avatar">
							<a href="page-inbox.html">
								<img class="avatar" src="assets/img/avatar4.jpg" alt=""/>
								<div>
									<div class="point point-primary point-lg"></div>
									New message
								</div>
								<span><small>30 minute ago</small></span>
							</a>
						</li>
						<li class="avatar">
							<a href="page-inbox.html">
								<img class="avatar" src="assets/img/avatar5.jpg" alt=""/>
								<div>
									<div class="point point-primary point-lg"></div>
									New message
								</div>
								<span><small>1 hours ago</small></span>
							</a>
						</li>
						<li class="dropdown-menu-footer text-center">
							<a href="page-inbox.html">View all messages</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
						<i class="fa fa-bell"></i>
						<span class="badge">3</span>
					</a>
					<ul class="dropdown-menu list-group">
						<li class="dropdown-menu-header">
							<strong>Notifications</strong>
							<div class="progress progress-xs  progress-striped active">
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
									60%
								</div>
							</div>
						</li>
						<li class="list-item">
							<a href="page-inbox.html">
								<div class="pull-left">
									<i class="fa fa-envelope-o bk-fg-primary"></i>
								</div>
								<div class="media-body clearfix">
									<div>Unread Message</div>
									<h6>You have 10 unread message</h6>
								</div>
							</a>
						</li>
						<li class="list-item">
							<a href="#">
								<div class="pull-left">
									<i class="fa fa-cogs bk-fg-primary"></i>
								</div>
								<div class="media-body clearfix">
									<div>New Settings</div>
									<h6>There are new settings available</h6>
								</div>
							</a>
						</li>
						<li class="list-item">
							<a href="#">
								<div class="pull-left">
									<i class="fa fa-fire bk-fg-primary"></i>
								</div>
								<div class="media-body clearfix">
									<div>Update</div>
									<h6>There are new updates available</h6>
								</div>
							</a>
						</li>
						<li class="list-item-last">
							<a href="#">
								<h6>Unread notifications</h6>
								<span class="badge">15</span>
							</a>
						</li>
					</ul>
				</li>
			</ul>-->
			<!-- End Notifications -->
			<!-- Userbox -->
			<div class="userbox">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<div class="profile-info">
						<span class="name">行思工作室行舟团队</span>
						<span class="role">AdminMenu</span>
					</div>
					<i class="fa custom-caret"></i>
				</a>
				<div class="dropdown-menu">
					<ul class="list-unstyled">
						<li class="dropdown-menu-header bk-bg-white bk-margin-top-15">
							<div class="progress progress-xs  progress-striped active">
								<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
									60%
								</div>
							</div>
						</li>
						<!--<li>
							<a href="page-profile.html"><i class="fa fa-user"></i> Profile</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-wrench"></i> Settings</a>
						</li>
						<li>
							<a href="page-invoice"><i class="fa fa-usd"></i> Payments</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-file"></i> File</a>
						</li>-->
						<li>
							<a href="<?= Url::to(['login/logout']) ?>"><i class="fa fa-power-off"></i> Logout</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- End Userbox -->
		</div>
		<!-- End Navbar Right -->
	</div>
</div>
<!-- End: Header -->
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/">企业网站模板</a></div>
<!-- Start: Content -->
<div class="container-fluid content">
	<div class="row">
		
		<!-- Sidebar -->
		<div class="sidebar">
			<div class="sidebar-collapse">
				<!-- Sidebar Header Logo-->
				<div class="sidebar-header">
					<img src="assets/img/logo.png" class="img-responsive" alt=""/>
				</div>
				<!-- Sidebar Menu-->
				<div class="sidebar-menu">
					<nav id="menu" class="nav-main" role="navigation">
						<ul class="nav nav-sidebar">
							<div class="panel-body text-center">
								<div class="bk-avatar">
									<img src="assets/img/avatar.jpg" class="img-circle bk-img-60" alt=""/>
								</div>
								<div class="bk-padding-top-10">
									<i class="fa fa-circle text-success"></i>
									<small><?= Yii::$app->session->get('admin_name') ?></small>
								</div>
							</div>
							<!--							line-->
							<div class="divider2"></div>
							<li class="active">
								<a href="<?= Url::to(['index/index']) ?>">
									<i class="fa fa-laptop" aria-hidden="true"></i><span>首页-系统信息</span>
								</a>
							</li>
							<!--<li>
								<a href="page-inbox.html">
									<span class="pull-right label label-primary">165</span>
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<span>Mail</span>
								</a>
							</li>-->
							<?php
							if (isset($permissions['adminControl'])) {
								?>
								<li class="nav-parent">
									<a>
										<i class="fa fa-user" aria-hidden="true"></i><span>管理员账户管理</span>
									</a>
									<ul class="nav nav-children">
										<li><a href="<?= Url::to(['admin/index']) ?>"><span class="text">管理员列表</span></a></li>
										<li><a href="<?= Url::to(['admin/create']) ?>"><span class="text">创建管理员</span></a></li>
									</ul>
								</li>
								<?php
							}
							?>
							
							<?php
							if (isset($permissions['teaControl']) || isset($permissions['stuControl'])) {
								?>
								<li class="nav-parent">
									<a>
										<i class="fa fa-list-alt" aria-hidden="true"></i><span>师生账户管理</span>
									</a>
									<ul class="nav nav-children">
										<?php
										if (isset($permissions['teaControl'])) {
											?>
											<li><a href="<?= Url::to(['teacher/index']) ?>"><span class="text">教师账户列表</span></a></li>
											<?php
										}
										?>
										<?php
										if (isset($permissions['stuControl'])) {
											?>
											<li><a href="<?= Url::to(['student/index']) ?>"><span class="text">学生账户列表</span></a></li>
											<?php
										}
										?>
									</ul>
								</li>
								<?php
							}
							?>
							
							<!--<li>
								<a href="table.html">
									<i class="fa fa-table" aria-hidden="true"></i><span>Tables</span>
								</a>
							</li>-->
							
							<?php
							if (isset($permissions['authControl'])) {
								?>
								<li class="nav-parent">
									<a>
										<i class="fa fa-random" aria-hidden="true"></i><span>后台权限管理</span>
									</a>
									<ul class="nav nav-children">
										<li><a href="<?= Url::to(['auth/index']) ?>"><span class="text">管理员权限列表</span></a></li>
										<li><a href="<?= Url::to(['auth/add-permission']) ?>"><span class="text">添加权限</span></a></li>
										<li><a href="<?= Url::to(['auth/add-role']) ?>"><span class="text">添加角色</span></a></li>
									</ul>
								</li>
								<?php
							}
							?>
							<!--题库管理-->
							<?php
							if (isset($permissions['subjectControl'])) {
								?>
								<li class="nav-parent">
									<a>
										<i class="fa fa-tasks" aria-hidden="true"></i>
										<span>题库管理</span>
									</a>
									<ul class="nav nav-children">
										<li><a href="<?= Url::to(['grade/index']) ?>"><span class="text">年级管理</span></a></li>
										<li><a href="<?= Url::to(['project/index']) ?>"><span class="text">科目管理</span></a></li>
										<li><a href="<?= Url::to(['subject-select/index']) ?>"><span class="text">选择题/判断题</span></a></li>
										<li><a href="<?= Url::to(['subject-subjective/index']) ?>"><span class="text">主观题</span></a></li>
										<li><a href="<?= Url::to(['subject-more/index']) ?>"><span class="text">大题（包含多项小题）</span></a></li>
									</ul>
								</li>
								<?php
							}
							?>
							<li>
								<a href="<?= Url::to(['spider/index']) ?>">
									<i class="fa fa-bug" aria-hidden="true"></i><span>网络爬虫</span>
								</a>
							</li>
							<!--							<li>-->
							<!--								<a href="typography.html">-->
							<!--									<i class="fa fa-font" aria-hidden="true"></i><span>Typography</span>-->
							<!--								</a>-->
							<!--							</li>-->
							<!--							<li class="nav-parent">-->
							<!--								<a>-->
							<!--									<i class="fa fa-bolt" aria-hidden="true"></i><span>Icons</span>-->
							<!--								</a>-->
							<!--								<ul class="nav nav-children">-->
							<!--									<li><a href="icons-font-awesome.html"><span class="text"> Font Awesome</span></a></li>-->
							<!--									<li><a href="icons-weathericons.html"><span class="text"> Weather Icons</span></a></li>-->
							<!--									<li><a href="icons-glyphicons.html"><span class="text"> Glyphicons</span></a></li>-->
							<!--								</ul>-->
							<!--							</li>-->
							<!--							<li>-->
							<!--								<a href="gallery.html">-->
							<!--									<i class="fa fa-picture-o" aria-hidden="true"></i><span>Gallery</span>-->
							<!--								</a>-->
							<!--							</li>-->
							<!--							<li>-->
							<!--								<a href="calendar.html">-->
							<!--									<i class="fa fa-calendar" aria-hidden="true"></i><span>Calendar</span>-->
							<!--								</a>-->
							<!--							</li>-->
						</ul>
					</nav>
				</div>
				<!-- End Sidebar Menu-->
			</div>
			<!-- Sidebar Footer-->
			<div class="sidebar-footer">
				<div class="copyright text-center" style="margin-top: 60px">
					版权所有 HPU行思网络工作室 <br>&copy;行舟团队 2016
				</div>
			</div>
			<!-- End Sidebar Footer-->
		</div>
		<!-- End Sidebar -->
		
		<!-- Main Page -->
		<div class="main ">
			<!-- Page Header -->
			<div class="page-header">
				<!--				面包屑导航-->
				<div class="pull-left">
					<!--					<ol class="breadcrumb visible-sm visible-md visible-lg">-->
					<!--						<li><a href="index.html"><i class="icon fa fa-home"></i>Home</a></li>-->
					<!--						<li class="active"><i class="fa fa-laptop"></i>Dashboard</li>-->
					<!--					</ol>-->
					<?php
					if (isset($this->params['breadcrumbs'])) {
						$bread = [];
						foreach ($this->params['breadcrumbs'] as $breadcrumb) {
							if (isset($breadcrumb['label'])) {
								$bread[] = $breadcrumb;
							} elseif (is_string($breadcrumb)) {
								$bread[] = $breadcrumb;
							}
						}
						echo Breadcrumbs::widget([
							'homeLink' => ['label' => '首页', 'url' => ['index/index']],
							'links'    => $bread,
							'options'  => [
								'class' => 'breadcrumb visible-sm visible-md visible-lg',
							]
						]);
					} else {
						echo Breadcrumbs::widget([
							'homeLink' => ['label' => '首页', 'url' => ['index/index']],
							'links'    => ['label' => '系统信息'],
							'options'  => [
								'class' => 'breadcrumb visible-sm visible-md visible-lg',
							]
						]);
					}
					?>
				</div>
				<!--				当前页面的标题-->
				<div class="pull-right">
					<h2><?= isset($this->title) ? $this->title : '' ?></h2>
				</div>
			</div>
			<!-- End Page Header -->
			<!--			这里是bootstrap的行row主要内容开始-->
			<div class="row" style="margin-left: 0">
				<?= $content ?>
			</div>
		</div>
		<!--			这里是bootstrap的行row主要内容结束-->
	</div>
	<!-- End Main Page -->
	
	<!-- 系统资源监控 -->
	<div id="usage">
		<ul>
			<li>
				<div class="title">Memory</div>
				<div class="bar">
					<div class="progress progress-md  progress-striped active">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
					</div>
				</div>
				<div class="desc">4GB of 8GB</div>
			</li>
			<li>
				<div class="title">HDD</div>
				<div class="bar">
					<div class="progress progress-md  progress-striped active">
						<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
					</div>
				</div>
				<div class="desc">250GB of 1TB</div>
			</li>
			<li>
				<div class="title">SSD</div>
				<div class="bar">
					<div class="progress progress-md  progress-striped active">
						<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
					</div>
				</div>
				<div class="desc">700GB of 1TB</div>
			</li>
			<li>
				<div class="title">Bandwidth</div>
				<div class="bar">
					<div class="progress progress-md  progress-striped active">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%"></div>
					</div>
				</div>
				<div class="desc">90TB of 100TB</div>
			</li>
		</ul>
	</div>
	<!-- End 系统资源监控 -->

</div>
<!--/container-->

<!-- Modal Dialog -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title bk-fg-primary">Modal title</h4>
			</div>
			<div class="modal-body">
				<p class="bk-fg-danger">Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div><!-- End Modal Dialog -->

<div class="clearfix"></div>

<!-- start: JavaScript-->

<!-- Vendor JS-->

</body>

</html>