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
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
<META HTTP-EQUIV="expires" CONTENT="0">
<link href="<{$stylePath}>/css/global.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/header.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/footer.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/common.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/cart.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/login.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/font.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/weebox.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<{$stylePath}>/js/pngfix.js"></script>
<![endif]-->
<{include file="$style/inc/cart/cart_const.tpl"}>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.bgiframe.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/script.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.pngfix.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.weebox.js"></script>
</head>

<body>
<{include file="$style/header.tpl"}>
<{nocache}>
<script type="text/javascript">
	var order_id = <{$order_info.id}>;
	
</script>
<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
          <div class="cart">
          	<div class="tit"><{$title}></div>
            <form name="cart_form" id="cart_form" action="<{if $order_info.id}><{$Web_link|name:"order_done"}><{else}><{$Web_link|name:"done"}><{/if}>" method="post" />	
            <div class="content">
            	<div id="cart_list">
            		<{include file="$style/inc/cart/cart_check_list.tpl"}>
                </div>
                <{if $is_delivery}>
                <div class="cart_tit">配送信息</div>
                	<script type="text/javascript">
						load_consignee('<{$consignee_id}>');
					</script>
                    <div id="cart_consignee"></div>
                <div class="cart_tit">配送方式</div>
                    <div id="cart_delivery"></div>
                <{else}>
					<script type="text/javascript">
                         $(document).ready(function(){count_buy_total();});
                    </script>
                <{/if}>
                <div class="cart_tit">订单备注</div>
                <div class="cart_message">
               		<{include file="$style/inc/cart/cart_message.tpl"}>
                </div>
                <div class="cart_tit">支付方式</div>
                <div class="cart_payment">
                	<{include file="$style/inc/cart/cart_payment.tpl"}>
                </div>
                <div id="cart_total">
                </div>
                <div id="cart_submit">
                	<input type="hidden" value="<{$order_info.id}>" name="id" />
					<input type="button" class="formbutton" value="确认付款" id="order_done">
                    <input type="button" class="formbutton" value="返回修改订单" onClick="window.location.href='<{$Web_link|name:"cart"}>'">
                    
                </div>
            </div>
            </form>
          </div>
        </div>
        <div class="c_right">
        	<{include file="$style/inc/right_info.tpl"}>
        </div>
        <div class="clear"></div>
    </div>
</div>
<{/nocache}>
<{include file="$style/footer.tpl"}>

</body>

</html>
