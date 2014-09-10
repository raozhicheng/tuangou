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
<link href="<{$stylePath}>/css/coupon.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/font.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/weebox.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<{$stylePath}>/js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="<{$stylePath}>/js/jquery.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/script.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.bgiframe.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.pngfix.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.weebox.js"></script>
<script type="text/javascript">
var APP_PATH = '<{$appPath}>';
$(document).ready(function(){
$("#do-modify").click(function(){
		
		if($.trim($("#account_new_password").val()).length == 0)
		{
			alert("������������!");
			$("#account_new_password").focus();
			return false;
		}

		if($.trim($("#account_new_password").val())!=$.trim($("#account_confirm_password").val()))
		{
			alert("�������벻һ��!");
			$("#account_confirm_password").focus();
			return false;
		}
	});	
});
</script>
</head>

<body>
<{include file="$style/header.tpl"}>
<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
       	  <div class="coupon">
          	<div class="tit"><span class="f18 red_n"><{$title}></span></div>
            <div class="content">
            <form method="post" action="<{$Web_link|name:'supplier_doModPass'}>" >
            	<ul>
                    <li>�̻������룺<input value="" type="password" name="account_new_password" id="account_new_password"></li>
                    <li>ȷ�������룺<input value="" type="password"  name="account_confirm_password" id="account_confirm_password"></li>
                    <li><input type="submit"  id="do-modify" name="commit" value="�޸�"></li>
                </ul>
            </form>
            </div>
          </div>
        </div>
        <div class="c_right">
        	 <div class="right_box">
                    <div class="title">
                    	<span class="right_icon_attention left"></span>
                        <span class="f14b red_n left" style="text-align:center">�̼ҵ�½</span>
                    </div>
                    <div class="coupon_content red_n black_l">
                       <{if $account_data}>
                       	   <ul>
                               <li>��Ӧ��:<{$account_data.name}></li>
                               <li>�ʻ�:<{$account_data.account_name}></li>
                               <li><a href="<{$Web_link|name:'supplier_modPass'}>">�޸�����</a></li>
                               <li><a href="<{$Web_link|name:"supplier_loginout"}>">�˳�</a></li>
                           </ul>
                           <{else}>
                           <a href="<{$Web_link|name:'supplier_login'}>">��¼�������!</a>
                       <{/if}>
                    </div>
                    <div class="clear"></div>
                </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<{include file="$style/footer.tpl"}>

</body>

</html>
