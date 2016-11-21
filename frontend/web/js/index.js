			var index=1;
			var blur=1;
				$("#right").click(function(){
					 clas='#class'+index;
					 grade='#grade'+index;
					$(grade).hide();
					$(clas).hide();
					index++;
					if(index>4)
					index=1;
					clas='#class'+index;
					grade='#grade'+index;
					$(grade).show();
					$(clas).show();
					replace();
				});
				$("#right").on("tap",function(){
				  	clas='#class'+index;
					 grade='#grade'+index;
					$(grade).hide();
					$(clas).hide();
					index++;
					if(index>4)
					index=1;
					clas='#class'+index;
					grade='#grade'+index;
					$(grade).show();
					$(clas).show();
					replace();
				});

				$("#left").click(function(){
					 clas='#class'+index;
					 grade='#grade'+index;
					$(grade).hide();
					$(clas).hide();
					index--;
					if(index<=0)
					index=4;
					clas='#class'+index;
					grade='#grade'+index;
					$(grade).show();
					$(clas).show();
					replace();
				});
				$("#left").on("tap",function(){
					 clas='#class'+index;
					 grade='#grade'+index;
					$(grade).hide();
					$(clas).hide();
					index--;
					if(index<=0)
					index=4;
					clas='#class'+index;
					grade='#grade'+index;
					$(grade).show();
					$(clas).show();
					replace();
					});

				function replace(){
					if(index==1){
						$("#class h2 span").text("小学课程");
					}else if(index==2){
						$("#class h2 span").text("初中课程");
					}else if(index==3){
						$("#class h2 span").text("高中课程");
					}else if(index==4){
						$("#class h2 span").text("大学课程");
					}
				}
				$("#user").bind("blur",function(){
					var user=document.getElementById("user");
					if(user.value==""){
						$("#label2").show();
						blur=0;
					}else{
						$("#label2").hide();
						blur=1;
					}
					if(blur==0){
						$("#zhanggroup").addClass("has-error");
						$("#zhangerror").show();
					}else{
						$("#zhanggroup").removeClass("has-error");
						$("#zhangerror").hide();
					}
				});
				$("#pass").bind("blur",function(){
						var pass=document.getElementById("pass")
					if(pass.value==""){
						$("#label4").show();
						blur=0;
					}else{
						$("#label4").hide();
						blur=1;
					}
					if(blur==0){
						$("#migroup").addClass("has-error");
						$("#mierror").show();
					}else{
						$("#migroup").removeClass("has-error");
						$("#mierror").hide();
					}
				})
				function check(form){
					if(blur==0){
						return false;
					}else{
						return true;
					}
				}