$(document).ready(function(){
	$("#user_name").focus(function(){
		if($.trim($(this).val())==$.trim("4-15���ַ�,һ������Ϊ�����ַ�")){
			$(this).val("");
		}
	})
	
	$("#email").focus(function(){
		if($.trim($(this).val())==$.trim("��¼���һ�������,���ṫ��")){
			$(this).val("");
		}
	})
	
	$("#mobile").focus(function(){
		if($.trim($(this).val())==$.trim("�Ź�ȯ��ͨ�����ŷ����ֻ���")){
			$(this).val("");
		}
	})
	

	$("#user_name").bind("blur",function(){
		if($.trim($(this).val()).length <= 3){
			$(this).parent().parent().find(".tip").html("����С�������ַ�");
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


