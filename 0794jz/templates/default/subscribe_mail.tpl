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
<link href="<{$stylePath}>/css/subscribe.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/font.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<{$stylePath}>/js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="<{$stylePath}>/js/jquery.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/script.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.pngfix.js"></script>
</head>

<body>
<{include file="$style/header.tpl"}>
<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
       	  <div class="subscribe">
          	<div class="tit"><{$title}></div>
            <div class="description"><{$current_city.description}></div>
            <div class="content">
            <form method="post" enctype="multipart/form-data" action="<{$Web_link|name:"subscribe_addmail"}>">
            <input type="hidden" name="ajax" value="0" />
            	<div class="mail_box">
                	<div class="black_n">邮件地址：</div>
					<div><input type="text" size="30" name="email" value=""></div>
					<div class="grey_n">请放心，这并不是垃圾邮件!</div>
                </div>
                <div class="cities_box">
                	<div class="black_n">选择您的城市：</div>
					<div>
                    	<select class="f-city" name="city_id">
                        	<{city id="all" is_sort="1"}>
                            	<option value="<{$row.id}>" ><{$row.name}></option>
                            <{/city}>
                        </select>
					</div>
                    <div class="submit_button"><input type="submit" id="submit"  value="订阅" /></div>
                </div>
                <div class="clear"></div>
            </form>
            </div>
          </div>
        </div>
        <div class="c_right">
        	<{include file="$style/inc/right_info.tpl"}>
        </div>
        <div class="clear"></div>
    </div>
</div>
<{include file="$style/footer.tpl"}>

</body>

</html>
