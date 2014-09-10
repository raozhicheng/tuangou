<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>top</title>
<link href="css/global.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.pngfix.js"></script>
<script type="text/javascript">
$(function()
{
	// 更新左侧显示
window.parent.frames["menu"].location.href =  "left.php";
$("#nav ul li:first").addClass("nav_current");//第一行的点击结果为显示当前
// 其他行的点击结果
$("#nav ul li a").click(function(){
	$("#nav ul li").removeClass("nav_current");
	$(this).parent().addClass("nav_current");
	$(this).blur();
	window.parent.frames["menu"].location.href =  "left.php?act="+$(this).attr("id");
	})
})
</script>
</head>
<body>

<div id="outer">
	<div id="logo"><img src="images/logo.png" /></div>
	<div id="right_tool">
		<ul>
    		<li><a href="<{$Root}>" target="_blank">网站首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.leesuntech.com" target="_blank">官方网站</a>&nbsp;&nbsp;|&nbsp;&nbsp;用户手册&nbsp;&nbsp;|&nbsp;&nbsp;帮助</li>
      </ul>
	</div>
    <div id="current_user">用户名：<{nocache}><{$username}><{/nocache}>&nbsp;&nbsp;<a href="login.php" target="_top">[退出]</a></div>
    <{nocache}>
	<div id="nav">
    	<ul>
         <{foreach $admin_nav as $key=>$value}>
        	<li><a href="main.php<{if $act[$key]}>?act=<{$act[$key]}><{/if}>"  id="menu<{$key}>" target="main"><{$value}></a></li>
         <{/foreach}>
         
        </ul>
	</div>
    <{/nocache}>
</div>
</body>
</html>
