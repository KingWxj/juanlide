var blur=0;
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
						$("#user-group").addClass("has-error");
						$("#zhang-error").show();
					}else{
						$("#user-group").removeClass("has-error");
						$("#zhang-error").hide();
					}
				});
				$("#name").bind("blur",function(){
					var name=document.getElementById("name");
					if(name.value==""){
						$("#label1").show();
						blur=0;
					}else{
						$("#label1").hide();
						blur=1;
					}
					if(blur==0){
						$("#name-group").addClass("has-error");
						$("#yhm-error").show();
					}else{
						$("#name-group").removeClass("has-error");
						$("#yhm-error").hide();
					}
				});
				$("#email").bind("blur",function(){
					var email=document.getElementById("email");
					if(email.value==""){
						$("#label3").show();
						blur=0;
					}else{
						$("#label3").hide();
						blur=1;
					}
					if(blur==0){
						$("#email-group").addClass("has-error");
						$("#email-error").show();
					}else{
						$("#email-group").removeClass("has-error");
						$("#email-error").hide();
					}
				});
				$("#confirmPassword").bind("blur",function(){
					var confirmPassword=document.getElementById("confirmPassword");
					var passwords=document.getElementById("password");
					if(confirmPassword.value==""){
						$("#label5").show();
						blur=0;
					}else{
						$("#label5").hide();
						if(confirmPassword.value==passwords.value)
						{
							$("#label6").hide();
							blur=1;
						}else{
							$("#label6").show();
							blur=0;
						}
					}
					
					if(blur==0){
						$("#password-group").addClass("has-error");
						$("#yanz-error").show();
					}else{
						$("#password-group").removeClass("has-error");
						$("#yanz-error").hide();
					}
				});
				$("#password").bind("blur",function(){
						var passwords=document.getElementById("password");
					if(passwords.value==""){
						$("#label4").show();
						blur=0;
					}else{
						$("#label4").hide();
						blur=1;
					}
					if(blur==0){
						$("#pass-group").addClass("has-error");
						$("#mi-error").show();
					}else{
						$("#pass-group").removeClass("has-error");
						$("#mi-error").hide();
					}
				})
				function check(form){
					if(blur==0){
						return false;
					}else{
						return true;
					}
				}