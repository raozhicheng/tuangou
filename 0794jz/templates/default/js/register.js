$(document).ready(function(){
	$("#user_name").focus(function(){
		if($.trim($(this).val())==$.trim("4-15个字符,一个汉字为两个字符")){
			$(this).val("");
		}
	})
	
	$("#email").focus(function(){
		if($.trim($(this).val())==$.trim("登录及找回密码用,不会公开")){
			$(this).val("");
		}
	})
	
	$("#mobile").focus(function(){
		if($.trim($(this).val())==$.trim("团购券将通过短信发到手机上")){
			$(this).val("");
		}
	})
	

	$("#user_name").bind("blur",function(){
		if($.trim($(this).val()).length <= 3){
			$(this).parent().parent().find(".tip").html("不能小于三个字符");
			return false;
		} else{
			var ajaxurl = CMS_ROOT+"ajax.php?act=check_field";
			var query = new Object();
			query.field_name = "user_name";
			query.field_data = $.trim($(this).val());
			$.ajax({ 
				url: ajaxurl,
				data:query,
				type: "POST",
				dataType: "json",
				success: function(data){
					if(data.status){
						formSuccess($("#user_name"),"{$LANG.CAN_USED}");
						return false;
					}else{
						formError($("#user_name"),data.info);
						return false;
					}
				}
			});	
		}

	});



});


