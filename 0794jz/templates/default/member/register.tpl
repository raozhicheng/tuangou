<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><{$Web_info|set:"SITE_TITLE"}></title>
<meta name="description" content="<{$Web_info|set:"SITE_DESCRIPTION"}>">
<meta name="keywords" content="<{$Web_info|set:"SITE_KEYWORD"}>">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="<{$stylePath}>/favicon.ico" />
<meta name="author" content="<{$appName}>" />
<meta name="copyright" content="leesuntech.com" />
<link href="<{$stylePath}>/css/global.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/header.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/footer.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/common.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/user.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/font.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<{$stylePath}>/js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="<{$stylePath}>/js/jquery.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/script.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.pngfix.js"></script>
<script type="text/javascript">
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
	
	$("#submit").click(function(){
		if(!$.minLength($("#user_name").val(),3,true)){
			$("#user_name").focus();
			formError($("#user_name"),"<span class='form_err'>����С�������ַ�</span>");
			return false;
		}
		if(!$.maxLength($("#user_name").val(),16,true)){
			$("#user_name").focus();
			formError($("#user_name"),"<span class='form_err'>���ܴ���16���ַ�</span>");		
			return false;
		}
		if($.trim($("#email").val()).length == 0)
		{
			$("#email").focus();
			formError($("#email"),"<span class='form_err'>�ʼ���ַ����Ϊ��</span>");
			return false;
		}
		if(!$.checkEmail($("#email").val())){
			$("#email").focus();
			formError($("#email"),"<span class='form_err'>�ʼ���ַ��ʽ����ȷ</span>");
			return false;
		}
		if(!$.minLength($("#user_pwd").val(),4,false)){
			$("#user_pwd").focus();
			formError($("#user_pwd"),"<span class='form_err'>���벻��С��4λ</span>");
			return false;
		}
		if($("#user_confirm_pwd").val() != $("#user_pwd").val()){
			$("#user_confirm_pwd").focus();
			formError($("#user_confirm_pwd"),"ȷ�����벻һ��");			
			return false;
		}
		if(!$.checkMobilePhone($("#mobile").val())){
			$("#mobile").focus();
			formError($("#mobile"),"�ֻ������ʽ����ȷ");	
			return false;
		}
		if("<{$mobile_must}>"){
			if($.trim($("#mobile").val()).length == 0){			
				$("#mobile").focus();	
				formError($("#mobile"),"�ֻ����벻��Ϊ��");
				return false;
			}
		}
		<{foreach $user_field as $var}>
		<{if $var.is_must}>
			if($("#<{$var.field_name}>").val()==''){
				  $("#<{$var.field_name}>").focus();
				  formError($("#<{$var.field_name}>"),"<span class='form_err'><{$var.field_show_name}>����Ϊ��</span>");	
				  return false;
			}
		<{/if}>
		<{/foreach}>
	});
	
	

	$("#user_name").bind("blur",function(){
		if($.trim($(this).val()).length <= 3){
			$(this).parent().parent().find(".tip").html("<span class='form_err'>����С�������ַ�</span>");
			return false;
		}
			var ajaxurl = "<{$appPath}>ajax.php?act=check_field";
			var query = new Object();
			query.field_name = "user_name";
			query.field_data = $(this).val();
			$.ajax({ 
				url: ajaxurl,
				data:query,
				type: "POST",
				dataType: "json",
				success: function(data){
					if(data.status==1){
						formSuccess($("#user_name"),"<span class='form_success'>�û�������ʹ��</span>");
						//$(this).parent().parent().find(".tip").html("�û�������ʹ��");
						return false;
					}else{
						formError($("#user_name"),data.info);
						return false;
					}
				}
			});	

	});
	
	
	$("#email").bind("blur",function(){
		if($.trim($(this).val()).length == 0){
			$(this).parent().parent().find(".tip").html("<span class='form_err'>�ʼ���ַ����Ϊ��</span>");
			return false;
		}
		if(!$.checkEmail($("#email").val())){
			$(this).parent().parent().find(".tip").html("<span class='form_err'>�ʼ���ַ��ʽ����ȷ</span>");
			return false;
		}
			var ajaxurl = "<{$appPath}>ajax.php?act=check_field";
			var query = new Object();
			query.field_name = "email";
			query.field_data = $(this).val();
			$.ajax({ 
				url: ajaxurl,
				data:query,
				type: "POST",
				dataType: "json",
				success: function(data){
					if(data.status==1){
						formSuccess($("#email"),"<span class='form_success'>�������ʹ��</span>");
						//$(this).parent().parent().find(".tip").html("�û�������ʹ��");
						return false;
					}else{
						formError($("#email"),data.info);
						return false;
					}
				}
			});	

	});
	
	$("#user_pwd").bind("blur",function(){
		if(!$.minLength($(this).val(),4,false))
		{
			formError($(this),"<span class='form_err'>���벻��С��4λ</span>");
			return false;
		}
		formSuccess($(this),"<span class='form_success'>�������ʹ��</span>");
	}); 
	
	$("#user_confirm_pwd").bind("blur",function(){
		if($(this).val() != $("#user_pwd").val())
		{
			formError($(this),"ȷ�����벻һ��");			
			return false;
		}
		if($(this).val()!='' && $("#user_pwd").val()!=''){
			formSuccess($(this),"����һ��");
		}
	}); 
	
	$("#mobile").bind("blur",function(){
		if(!$.checkMobilePhone($(this).val())){
			formError($(this),"�ֻ������ʽ����ȷ");	
			return false;
		}
		if("<{$mobile_must}>"){
			if($.trim($(this).val()).length == 0)
			{				
				formError($(this),"�ֻ����벻��Ϊ��");
				return false;
			}
		}
		var ajaxurl = "<{$appPath}>ajax.php?act=check_field";
			var query = new Object();
			query.field_name = "mobile";
			query.field_data = $(this).val();
			$.ajax({ 
				url: ajaxurl,
				data:query,
				type: "POST",
				dataType: "json",
				success: function(data){
					if(data.status==1){
						formSuccess($("#mobile"),"<span class='form_success'>�ֻ��ſ���ʹ��</span>");
						//$(this).parent().parent().find(".tip").html("�û�������ʹ��");
						return false;
					}else{
						formError($("#mobile"),data.info);
						return false;
					}
				}
			});	
	}); 
	
	<{foreach $user_field as $var}>
		<{if $var.is_must}>
			$("#<{$var.field_name}>").bind("blur",function(){
				if($(this).val()=='')
				{
					formError($(this),"<span class='form_err'><{$var.field_show_name}>����Ϊ��</span>");	
					return false;
				}
				formSuccess($(this),"<span class='form_success'>����ʹ��</span>");
			});
		<{/if}>
	<{/foreach}>

function formSuccess(obj,msg)
{
	if(msg!='')
	$(obj).parent().parent().find(".tip").html("<span class='form_success'>"+msg+"</span>");
	else
	$(obj).parent().parent().find(".tip").html("");
}
function formError(obj,msg)
{
	$(obj).parent().parent().find(".tip").html("<span class='form_err'>"+msg+"</span>");
}

});

</script>

</head>

<body>
<{include file="$style/header.tpl"}>
<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
        	<div class="user_f">
            	<div class="tit">��Աע��</div>
                <div class="reg_box">
                	 <form name="add_user" method="post"  enctype="multipart/form-data" action="<{$Web_link|name:"do_register"}>">
                     <ul>
                     	<li><span class="t"><label for="user_name">�û���:</label></span><span class="i"><input type="text" name="user_name" id="user_name" class="input_box" value="4-15���ַ�,һ������Ϊ�����ַ�" /></span><span class="tip"></span></li>
                        <li><span class="t"><label for="email">Email:</label></span><span class="i"><input type="text" name="email" id="email" class="input_box" value="��¼���һ�������,���ṫ��" /></span><span class="tip"></span></li>
                        <li><span class="t"><label for="user_pwd">����:</label></span><span class="i"><input type="password" name="user_pwd" id="user_pwd" class="input_box" value="" /></span><span class="tip"></span></li>
                        <li><span class="t"><label for="user_confirm_pwd">ȷ������:</label></span><span class="i"><input type="password" name="user_confirm_pwd" id="user_confirm_pwd" class="input_box" value="" /></span><span class="tip"></span></li>
                        <li><span class="t"><label for="mobile">�ֻ�����:</label></span><span class="i"><input type="text" name="mobile" id="mobile" class="input_box" value="�Ź�ȯ��ͨ�����ŷ����ֻ���" /></span><span class="tip"></span></li>
                        <{assign var='ext_values' value='|'|explode:$getUserExt.value}>
                        <{foreach $user_field as $var}>
                        <{assign var='options' value=','|explode:$var.value_scope}>
                        <{assign var='times' value=$var@iteration-1}>
                        <li><span class="t"><label for="<{$var.field_name}>"><{$var.field_show_name}>:</label></span>
                        	<span class="i">
                            <{if $var.input_type==0}>
                              <input type="text" name="<{$var.field_name}>" id="<{$var.field_name}>" class="input_box" value="<{$ext_values.$times}>">
                              <{else if $var.input_type==1}>
                              <select name="<{$var.field_name}>" id="<{$var.field_name}>">
                              <{foreach $options as $var_option}>
                              <option value="<{$var_option}>" <{if $ext_values.$times==$var_option}>selected="selected" <{/if}> ><{$var_option}></option>
                              <{/foreach}>
                              </select>
                             <{/if}>
                             </span>
                             <span class="tip red_n f14b"><{if $var.is_must}>*<{/if}></span>
                         </li>
                        <{/foreach}>
                        <li><span class="t"><label for="in_city">���ڳ���:</label></span>
                        	<span class="i">
                        	<select id="in_city" class="city" autocomplete="off" name="city_id">
                            <{city name="list"}>
                                <option value="<{$list.id}>" <{if $current_city.id==$list.id}>selected="selected"<{/if}>><{$list.name}></option>
                            <{/city}>
                            </select>
                            </span>
                        </li>
                        <li><span class="t"><label for="subscribe">�����Ź�:</label></span><span class="i"><input type="checkbox" checked="checked" id="subscribe" name="subscribe" value="1" tabindex="3"></span></li>
                        <li><span class="t"></span><span class="i"><input type="submit" name="commit" id="submit" class="submit_button" value="ע��" /></span></li>
                     </ul>
                     </form>
                </div>
            </div>
        	<div class="clear"></div>
        </div>
        <div class="c_right">
                <div class="right_box">
                    <div class="title">
                    	<span class="right_icon_user left"></span>
                        <span class="f14b red_n left" style="text-align:center">���л�Ա�ʻ���</span>
                    </div>
                    <div class="content f14b grey_n black_l">
                       ��ֱ��&nbsp;<a href="<{$Web_link|name:"login"}>">��¼</a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            
        	<div class="clear"></div>
    	</div>
     </div>
        
</div>
<{include file="$style/footer.tpl"}>

</body>

</html>
