<?php
use yii\helpers\Url;
use yii\bootstrap\Html;

$this->title = '卷立得-老师注册';
?>
<?php $this->beginBlock('head_css_js') ?>
<link rel="stylesheet" href="<?= Url::base(true) ?>/css/register.css"/>
<?php $this->endBlock() ?>
<?php $this->beginBlock('foot_css_js') ?>
<script type="text/javascript" src="<?= Url::base(true) ?>/js/register.js"></script>
<script>
	$().ready(function () {
		$("#home").addClass('active');
	});
</script>
<?php $this->endBlock() ?>

<div class="container" id="form-main">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<div class="page-header">
				<h2>卷立得注册-教师账户</h2>
			</div>
			<?= Html::beginForm('', 'post', ['class' => 'form-horizontal', 'id' => 'defaultForm']) ?>
			<div class="form-group" id="name-group">
				<label class="col-lg-3 control-label"><span class="must-input">* </span>老师姓名</label>
				<div class="col-lg-5">
					<?= Html::activeInput('text', $model, 'tea_name', ['class' => 'form-control', 'placeholder' => '老师姓名', 'id' => 'name']) ?>
					<span id="yhm-error" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
					<span style="color:red;font-size: small"><?=Html::error($model,'tea_name')?></span>
					<!--						<label class="must-input-label" id="label1">用户名不能为空</label>-->
				</div>
			</div>
			
			<div class="form-group" id="user-group">
				<label class="col-lg-3 control-label"><span class="must-input">* </span>账号</label>
				<div class="col-lg-5">
					<?= Html::activeInput('text', $model, 'tea_account', ['class' => 'form-control', 'placeholder' => '6位以上数字或字母', 'id' => 'user']) ?>
					<!--						<input type="text" class="form-control" name="username" id="user"  placeholder="10-12位数字"/>-->
					<span id="zhang-error" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
					<span style="color:red;font-size: small"><?=Html::error($model,'tea_account')?></span>
					<!--						<label class="must-input-label" id="label2">账号不能为空</label>-->
				</div>
			</div>
			
			<div class="form-group" id="pass-group">
				<label class="col-lg-3 control-label"><span class="must-input">* </span>密码</label>
				<div class="col-lg-5">
					<?= Html::activeInput('password', $model, 'tea_password', ['class' => 'form-control', 'placeholder' => '密码', 'id' => 'password']) ?>
					<!--						<input type="password" class="form-control" id="password" name="password"/>-->
					<span id="mi-error" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
					<span style="color:red;font-size: small"><?=Html::error($model,'tea_password')?></span>
					<!--						<label class="must-input-label" id="label4">密码不能为空</label>-->
				</div>
			</div>
			<div class="form-group" id="password-group">
				<label class="col-lg-3 control-label"><span class="must-input">* </span>验证密码</label>
				<div class="col-lg-5">
					<?= Html::activeInput('password', $model, 'rePassword', ['class' => 'form-control', 'placeholder' => '密码', 'id' => 'confirmPassword']) ?>
<!--					<input type="password" class="form-control" id="confirmPassword" name="confirmPassword"/>-->
					<span id="yanz-error" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
					<span style="color:red;font-size: small"><?=Html::error($model,'rePassword')?></span>
					<!--						<label class="must-input-label" id="label5">验证密码不能为空</label>-->
					<!--						<label class="must-input-label" id="label6">验证密码与密码不一致</label>-->
				</div>
			</div>
			<div class="form-group" id="email-group">
				<label class="col-lg-3 control-label"><span class="must-input">* </span>邮箱地址</label>
				<div class="col-lg-5">
					<?= Html::activeInput('text', $model, 'email', [ 'class' => 'form-control', 'placeholder' => '密码', 'id' => 'email']) ?>
<!--					<input type="email" class="form-control" id="email" name="email" pattern="w+([-+.]w+)*@w+([-.]w+)*.w+([-.]w+)*"/>-->
					<span id="email-error" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
					<span style="color:red;font-size: small"><?=Html::error($model,'email')?></span>
					<!--						<label class="must-input-label" id="label3">邮箱不能为空</label>-->
				</div>
			</div>
			
			<!--				-->
			<!--				<div class="form-group">-->
			<!--					<label class="col-lg-3 control-label">喜欢的试卷类型</label>-->
			<!--					<div class="col-lg-5">-->
			<!--						<div class="checkbox">-->
			<!--							<label>-->
			<!--								<input type="checkbox" name="languages1" value="english"/> 英语-->
			<!--							</label>-->
			<!--						</div>-->
			<!--						<div class="checkbox">-->
			<!--							<label>-->
			<!--								<input type="checkbox" name="languages2" value="french"/> 数学-->
			<!--							</label>-->
			<!--						</div>-->
			<!--						<div class="checkbox">-->
			<!--							<label>-->
			<!--								<input type="checkbox" name="languages3" value="german"/> 物理-->
			<!--							</label>-->
			<!--						</div>-->
			<!--						<div class="checkbox">-->
			<!--							<label>-->
			<!--								<input type="checkbox" name="languages4" value="russian"/> 化学-->
			<!--							</label>-->
			<!--						</div>-->
			<!--						<div class="checkbox">-->
			<!--							<label>-->
			<!--								<input type="checkbox" name="languages5" value="other"/> 其他-->
			<!--							</label>-->
			<!--						</div>-->
			<!--					</div>-->
			<!--				</div>-->
			<!--				-->
			<div class="form-group">
				<div class="col-lg-9 col-lg-offset-3">
					<button type="submit" class="btn btn-lg btn-success" name="signup" onclick="return check(this.form)" value="Sign up">立即注册</button>
					<a class="btn btn-primary btn-lg" href="<?= Url::to(['register/student']) ?>">&gt;&gt;&gt;&gt;注册学生账户</a>
				</div>
			</div>
			<?= Html::endForm() ?>
		</div>
	</div>
</div>