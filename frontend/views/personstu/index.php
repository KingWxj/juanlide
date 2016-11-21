<?php
$this->beginBlock("head_css_js");
?>
<style>
	.navbar-brand img {
		width: 3em;
		height: 3em;
	}
	
	#page {
		margin: auto;
		list-style: none;
		
	}
	
	#project {
		margin-top: 0px;
		width: 100%;
		background: white;
	}
	
	#page li {
		float: left;
		margin-left: 1em;
		margin-right: 1em;
		text-align: center;
		font-weight: bolder;
		padding: 5px 10px;
		border-radius: 5px;
		margin-bottom: 2em;
	}
	
	#page .next {
		padding: 5px 20px;
		background: green;
	}
	
	#page .active {
		background: green;
	}
	
	.text-paper .col-lg-2 img {
		margin-bottom: 2em;
	}
	
	.actives {
		background: green;
	}
	
	@media only screen and (max-width: 600px ) {
		#page li {
			margin-left: 5px;
			margin-right: 5px;
			padding: 3px 5px;
		}
		
		#page .next {
			padding: 3px 10px;
		}
	}
	
	.list-group-item img {
		width: 1em;
		height: 1em;
	}
	
	#nav-list {
		
		box-shadow: 0 0 5px #b2b2b1;
	}
	
	#paper-content, #love-content, #collect-content, #warehouse-content, #error-content {
		box-shadow: 5px 5px 10px #b4b4b3;
		border-radius: 5px;
		padding-top: 1em;
		
	}
	
	#user-head {
		width: 5em;
		height: 5em;
		border-radius: 5px;
	}
	
	#love-content, #collect-content, #warehouse-content, #error-content {
		display: none;
	}
</style>
<?php
$this->endBlock("head_css_js");
$this->beginBlock("foot_css_js");
?>
<script>
	window.onload = function () {
		var yourpaper = [];
		yourpaper = document.getElementsByClassName("your-paper");
		for (i = 0; i < yourpaper.length; i++) {
			yourpaper[i].innerHTML = (i + 1) + ".";
		}
	};
	$("#paper").click(function () {
		$("#paper-content").show();
		$("#collect-content").hide();
		$("#love-content").hide();
		$("#error-content").hide();
		$("#warehouse-content").hide();
		if (!(document.getElementById("paper").style.background == 'green')) {
			$("#paper").css("background", "green");
			$("#error").css("background", "white");
			$("#warehouse").css("background", "white");
			$("#collect").css("background", "white");
			$("#love").css("background", "white");
		}
	});
	$("#love").click(function () {
		$("#paper-content").hide();
		$("#collect-content").hide();
		$("#love-content").show();
		$("#error-content").hide();
		$("#warehouse-content").hide();
		if (!(document.getElementById("love").style.background == 'green')) {
			$("#love").css("background", "green");
			$("#error").css("background", "white");
			$("#warehouse").css("background", "white");
			$("#collect").css("background", "white");
			$("#paper").css("background", "white");
		}
	});
	$("#collect").click(function () {
		$("#paper-content").hide();
		$("#collect-content").show();
		$("#love-content").hide();
		$("#error-content").hide();
		$("#warehouse-content").hide();
		if (!(document.getElementById("collect").style.background == 'green')) {
			$("#collect").css("background", "green");
			$("#error").css("background", "white");
			$("#warehouse").css("background", "white");
			$("#paper").css("background", "white");
			$("#love").css("background", "#FFFFFF");
		}
	});
	$("#error").click(function () {
		$("#error-content").show();
		$("#collect-content").hide();
		$("#love-content").hide();
		$("#paper-content").hide();
		$("#warehouse-content").hide();
		if (!(document.getElementById("error").style.background == 'green')) {
			$("#error").css("background", "green");
			$("#paper").css("background", "white");
			$("#warehouse").css("background", "white");
			$("#collect").css("background", "white");
			$("#love").css("background", "white");
		}
	});
	$("#warehouse").click(function () {
		$("#warehouse-content").show();
		$("#collect-content").hide();
		$("#love-content").hide();
		$("#error-content").hide();
		$("#paper-content").hide();
		if (!(document.getElementById("warehouse").style.background == 'green')) {
			$("#warehouse").css("background", "green");
			$("#error").css("background", "white");
			$("#paper").css("background", "white");
			$("#collect").css("background", "white");
			$("#love").css("background", "white");
		}
	});
</script>
<?php
$this->endblock("foot_css_js");
?>
<div class="container" style="margin-top: 80px;margin-bottom: 100px">
	<div class="col-lg-3">
		<ul class="list-group" id="nav-list">
			<li class="list-group-item actives" id="paper"><img src="img/书.png"/>我的试卷</li>
			<li class="list-group-item" id="collect"><img src="img/收藏夹-).png"/> 我的收藏</li>
			<li class="list-group-item" id="warehouse"><img src="img/试卷库.png"/>我的题库</li>
			<li class="list-group-item" id="error"><img src="img/错题.png"/>我的错题记录</li>
			<li class="list-group-item" id="love"><img src="img/心.png"/>我的喜好</li>
		</ul>
	</div>
	<div class="col-lg-9" id="paper-content">
		<div class="row">
			<div class="col-lg-1 col-md-1"></div>
			<label for="project" class="col-lg-2 col-md-2">试卷类型：</label>
			<div class="col-lg-2 col-md-2 form-group">
				<select id="project" class="form-control">
					<option>语文</option>
					<option>数学</option>
					<option>英语</option>
					<option>物理</option>
				</select>
			</div>
			<label for="grade" class="col-lg-2 col-md-2">年纪：</label>
			<div class="col-lg-2 col-md-2 form-group">
				<select id="grade" class="form-control">
					<option>一年级</option>
					<option>二年级</option>
					<option>三年级</option>
					<option>四年级</option>
				</select>
			</div>
		</div>
		<div class="row text-paper">
			<ul class="list-group">
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
			</ul>
			<ul id="page">
				<li class="next">上一页</li>
				<li class="active">1</li>
				<li>2</li>
				<li>3</li>
				<li>...</li>
				<li class="next">下一页</li>
			</ul>
		</div>
	</div>
	
	<div class="col-lg-9" id="collect-content">
		<div class="row">
			<div class="col-lg-1 col-md-1"></div>
			<label for="project" class="col-lg-2 col-md-2">试卷类型：</label>
			<div class="col-lg-2 col-md-2 form-group">
				<select id="project" class="form-control">
					<option>语文</option>
					<option>数学</option>
					<option>英语</option>
					<option>物理</option>
				</select>
			</div>
			<label for="grade" class="col-lg-2 col-md-2">年纪：</label>
			<div class="col-lg-2 col-md-2 form-group">
				<select id="grade" class="form-control">
					<option>一年级</option>
					<option>二年级</option>
					<option>三年级</option>
					<option>四年级</option>
				</select>
			</div>
		</div>
		<div class="row text-paper">
			<ul class="list-group">
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
			</ul>
			<ul id="page">
				<li class="next">上一页</li>
				<li class="active">1</li>
				<li>2</li>
				<li>3</li>
				<li>...</li>
				<li class="next">下一页</li>
			</ul>
		</div>
	</div>
	
	<div class="col-lg-9" id="warehouse-content">
		<div class="row">
			<div class="col-lg-1 col-md-1"></div>
			<label for="project" class="col-lg-2 col-md-2">试卷类型：</label>
			<div class="col-lg-2 col-md-2 form-group">
				<select id="project" class="form-control">
					<option>语文</option>
					<option>数学</option>
					<option>英语</option>
					<option>物理</option>
				</select>
			</div>
			<label for="grade" class="col-lg-2 col-md-2">年纪：</label>
			<div class="col-lg-2 col-md-2 form-group">
				<select id="grade" class="form-control">
					<option>一年级</option>
					<option>二年级</option>
					<option>三年级</option>
					<option>四年级</option>
				</select>
			</div>
		</div>
		<div class="row text-paper">
			<ul class="list-group">
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
			</ul>
			<ul id="page">
				<li class="next">上一页</li>
				<li class="active">1</li>
				<li>2</li>
				<li>3</li>
				<li>...</li>
				<li class="next">下一页</li>
			</ul>
		</div>
	</div>
	
	<div class="col-lg-9" id="error-content">
		<div class="row">
			<div class="col-lg-1 col-md-1"></div>
			<label for="project" class="col-lg-2 col-md-2">试卷类型：</label>
			<div class="col-lg-2 col-md-2 form-group">
				<select id="project" class="form-control">
					<option>语文</option>
					<option>数学</option>
					<option>英语</option>
					<option>物理</option>
				</select>
			</div>
			<label for="grade" class="col-lg-2 col-md-2">年纪：</label>
			<div class="col-lg-2 col-md-2 form-group">
				<select id="grade" class="form-control">
					<option>一年级</option>
					<option>二年级</option>
					<option>三年级</option>
					<option>四年级</option>
				</select>
			</div>
		</div>
		<div class="row text-paper">
			<ul class="list-group">
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
			</ul>
			<ul id="page">
				<li class="next">上一页</li>
				<li class="active">1</li>
				<li>2</li>
				<li>3</li>
				<li>...</li>
				<li class="next">下一页</li>
			</ul>
		</div>
	</div>
	<div class="col-lg-9" id="love-content">
		<div class="row">
			<div class="col-lg-1 col-md-1"></div>
			<label for="project" class="col-lg-2 col-md-2">试卷类型：</label>
			<div class="col-lg-2 col-md-2 form-group">
				<select id="project" class="form-control">
					<option>语文</option>
					<option>数学</option>
					<option>英语</option>
					<option>物理</option>
				</select>
			</div>
			<label for="grade" class="col-lg-2 col-md-2">年纪：</label>
			<div class="col-lg-2 col-md-2 form-group">
				<select id="grade" class="form-control">
					<option>一年级</option>
					<option>二年级</option>
					<option>三年级</option>
					<option>四年级</option>
				</select>
			</div>
		</div>
		<div class="row text-paper">
			<ul class="list-group">
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
				<li class="list-group-item your-paper"></li>
			</ul>
			<ul id="page">
				<li class="next">上一页</li>
				<li class="active">1</li>
				<li>2</li>
				<li>3</li>
				<li>...</li>
				<li class="next">下一页</li>
			</ul>
		</div>
	
	</div>
</div>