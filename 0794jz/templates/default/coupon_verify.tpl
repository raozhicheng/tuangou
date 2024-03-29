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
            	<ul>
                	<li>请您输入团购券编号和密码 进行操作（查询免输密码）</li>
                    <li>团购券编号：<input value="" type="text" class="f-input" name="coupon_sn" id="coupon_sn"> <input type="button" value="查询"  class="formbutton" onclick="check_coupon();" /><-查询编号是否有效</li>
                    <li>团购券密码：<input value="" type="password" class="f-input" name="coupon_pwd" id="coupon_pwd"> <input type="button" value="确认消费" class="formbutton" onclick="use_coupon();"><-商家使用</li>
                </ul>
            </div>
          </div>
        </div>
        <div class="c_right">
        	 <div class="right_box">
                    <div class="title">
                    	<span class="right_icon_attention left"></span>
                        <span class="f14b red_n left" style="text-align:center">商家登陆</span>
                    </div>
                    <div class="coupon_content red_n black_l">
                       <{if $account_data}>
                       	   <ul>
                               <li>供应商:<{$account_data.name}></li>
                               <li>帐户:<{$account_data.account_name}></li>
                               <li><a href="<{$Web_link|name:'supplier_modPass'}>">修改密码</a></li>
                               <li><a href="<{$Web_link|name:"supplier_loginout"}>">退出</a></li>
                           </ul>
                           <{else}>
                           <a href="<{$Web_link|name:'supplier_login'}>">登录请点这里!</a>
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
