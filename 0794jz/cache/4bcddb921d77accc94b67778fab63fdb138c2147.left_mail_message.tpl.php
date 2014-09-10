<?php /*%%SmartyHeaderCode:31972305453fd87805f7dd6-24432482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bcddb921d77accc94b67778fab63fdb138c2147' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/left_menu/left_mail_message.tpl',
      1 => 1348114984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31972305453fd87805f7dd6-24432482',
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_540fa7a1a9fd23_16378524',
  'has_nocache_code' => false,
  'cache_lifetime' => 86400,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540fa7a1a9fd23_16378524')) {function content_540fa7a1a9fd23_16378524($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>left</title>
<link href="css/global.css" rel="stylesheet" type="text/css" />
<link href="css/left.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/jquery.pngfix.js"></script>
</head>

<body>
<div id="bar">短信邮件设置</div>
<div id="sub">
	<ul>
    	<li><a href="main.php?act=msg_template" target="main">消息模版管理</a></li>
  		<li><a href="main.php?act=mail_list" target="main">邮件订阅列表</a></li>
        <li><a href="main.php?act=mail_server" target="main">邮件服务器列表</a></li>
        <li><a href="main.php?act=sms_list&id=1" target="main">短信接口列表</a></li>
        <li><a href="main.php?act=sms_subscription" target="main">短信订阅列表</a></li>
		<li><a href="main.php?act=msg_queue" target="main">业务队列列表</a></li>
        <li><a href="main.php?act=msg_recycle" target="main">回收站</a></li>
    </ul>
</div>
</body>
</html>
<?php }} ?>