<?php
$this->beginBlock('head_css_js');
?>
<style>
	.main-gap {
		color: #005aa7;
		border-bottom: 1px solid #005aa7; /* 下划线效果 */
		border-top: 0px;
		border-left: 0px;
		border-right: 0px;
		background-color: transparent; /* 背景色透明 */
	}
	
	.write {
		margin-right: 10%;
	}
	
	#look {
		-webkit-box-shadow: 0 0 10px 12px rgba(181, 181, 181, 0.3);
		-moz-box-shadow: 0 0 10px 12px rgba(181, 181, 181, 0.3);
		box-shadow: 0 0 10px 12px rgba(181, 181, 181, 0.3);
		border-radius: 20px;
		padding-bottom: 3em;
		padding-top: 3em;
		margin-top: 70px;
		margin-bottom: 50px;
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
</script>
<?php
$this->endBlock('foot_css_js');
?>
<div class="container" id="look">
	<div class="row">
		<div class="col-lg-3 col-xs-3"></div>
		<div class="col-lg-2 col-xs-2">试卷类型：<span><?= $exam['subject'] ?></span></div>
		<div class="col-lg-3 col-xs-2">所属阶段：<span><?= $exam['grade'] ?></span></div>
		<div class="col-lg-2 col-xs-3"></div>
		<div class="col-lg-2 col-xs-2">
			<!--			<input type="button" class="btn btn-success write" value="编辑试卷"/>-->
			<a class="btn btn-success" href="<?=\yii\helpers\Url::to(['addexam/download'])?>&examid=<?=$exam['examid']?>">导出word试卷</a>
		</div>
	</div>
	<div class="row four-content">
		<div class="select">
			<div class="form-group">
				<ol>
				<!--题目开始-->
				<?php
				$i=0;
				foreach ($exam['questions']['select'] as $key => $select) {
					$i++;
					?>
					<li class="col-lg-12 col-xs-12 ">
						<?php
						echo str_replace('<img src="', '<img src="http://www.jldback.com', $select->content)
						?>
					</li>
					<?php
				}
				?>
				</ol>
				<!--					题目结束-->
<!--				<div class="gap">-->
<!--					<div class="col-lg-12"><span class="number">2.</span><span class="main-gap-content">jhjasdkjhjkhadskjh</span></div>-->
<!--				</div>-->
			</div>
		</div>
	</div>
</div>