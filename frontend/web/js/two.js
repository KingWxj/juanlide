var project = new Array("语", "数", "英", "物", "化", "生", "历", "地", "政");
$(".projects").click(function () {
	if ($(this).attr("class") == 'project-background') {
		$(this).removeClass("project-background");
	} else {
		$(this).addClass("project-background");
		$(this).siblings(".project-background").removeClass("project-background");
	}
});
$(".projects").on("tap", function () {
	if ($(this).attr("class") == 'project-background') {
		$(this).removeClass("project-background");
	} else {
		$(this).addClass("project-background");
		$(this).siblings(".project-background").removeClass("project-background");
	}
});

var w = 0;
var leng = project.length;
$("#project-left").click(function () {
	var index = 1;
	var q = leng - 1;
	for (i = 0; i < 5; i++) {
		if (index > 5) {
			index = 1;
		}
		var name = "#project" + index;
		index++;
		if (q > project.length - 1)
			q = 0;
		$(name).text(project[q++]);
	}
	leng--;
	if (leng < 1)
		leng = project.length;
});
$("#project-left").on("tap", function () {
	var index = 1;
	var q = leng - 1;
	for (i = 0; i < 5; i++) {
		if (index > 5) {
			index = 1;
		}
		var name = "#project" + index;
		index++;
		if (q > project.length - 1)
			q = 0;
		$(name).text(project[q++]);
	}
	leng--;
	if (leng < 1)
		leng = project.length;
});

$("#project-right").click(function () {
	var index = 1;
	var q = w;
	for (i = 0; i < 5; i++) {
		if (index > 5) {
			index = 1;
		}
		var name = "#project" + index;
		index++;
		if (q > leng - 1)
			q = 0;
		$(name).text(project[q++]);
	}
	w++;
	if (w + 4 > project.length)
		w = 0;
});
$("#project-right").on("tap", function () {
	var index = 1;
	var q = w;
	for (i = 0; i < 5; i++) {
		if (index > 5) {
			index = 1;
		}
		var name = "#project" + index;
		index++;
		if (q > leng - 1)
			q = 0;
		$(name).text(project[q++]);
	}
	w++;
	if (w + 4 > project.length)
		w = 0;
});

