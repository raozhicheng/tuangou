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
		$("#email").focus(function(){
			if($.trim($(this).val())==$.trim("������½��EMAIL")){
				$(this).val("");
			}
		})
		$("#reset_pass").click(function(){
			if($.trim($("#email").val())==$.trim("������½��EMAIL")){
				$("#email").val("");
			}
			var email=$("#email").val();
			if(email==''){
				alert("����Ϊ��!");
				return false;
			}
			var ajaxurl = '<{$Web_link|name:"sendPassword"}>&email='+email;
			$.ajax({ 
				url: ajaxurl,
				dataType: "json",
				success: function(data){
					alert(data.info);
				},
				error:function(ajaxobj)
				{
					if(ajaxobj.responseText!='')
					alert(ajaxobj.responseText);
				}
			});
		});
	});
</script>
</head>

<body>
<{include file="$style/header.tpl"}>
<div class="body_area">
	
    <div id="content_box">
    	<div class="c_left">
        	<div class="user_f">
            	<div class="tit">�һ�����</div>
                	 <div class="reg_box">
                        	<ul>
    <li><span class="t"><label for="email">����Email:</label></span><span class="i"><input type="text" name="email" id="email" class="input_box" value="������½��EMAIL" /></span></li>
     <li><span class="t"></span><span class="i"><input type="submit" name="find" id="reset_pass" class="submit_button" value="����" /></span></li>
 </ul>
                     </div>
            </div>
        	<div class="clear"></div>
        </div>
        <div class="c_right">
                <div class="right_box">
                    <div class="title">
                    	<span class="right_icon_attention left"></span>
                        <span class="f14b red_n left" style="text-align:center">��û���ʻ���</span>
                    </div>
                    <div class="content f14b grey_n black_l">
                       ������&nbsp;<a href="<{$Web_link|name:"register"}>">ע��</a>
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
