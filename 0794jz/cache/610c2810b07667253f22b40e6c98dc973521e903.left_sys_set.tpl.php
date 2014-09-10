<?php /*%%SmartyHeaderCode:102092267253fd8782ea1b33-23822118%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '610c2810b07667253f22b40e6c98dc973521e903' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/left_menu/left_sys_set.tpl',
      1 => 1364291942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102092267253fd8782ea1b33-23822118',
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_540fa7a23dde54_74474099',
  'has_nocache_code' => false,
  'cache_lifetime' => 86400,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540fa7a23dde54_74474099')) {function content_540fa7a23dde54_74474099($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div id="bar">系统设置</div>
<div id="sub">
	<ul>
    	<li><a href="main.php?act=sys_config" target="main">系统配置</a></li>
  		<li><a href="main.php?act=role" target="main">管理员分组</a></li>
        <li><a href="main.php?act=admin" target="main">管理员列表</a></li>
        <li><a href="main.php?act=backup" target="main">数据备份列表</a></li>
        <li><a href="main.php?act=clear_cache" target="main">清理缓存</a></li>
        <li><a href="main.php?act=log" target="main">系统日志</a></li>
        <li><a href="main.php?act=sys_recycle" target="main">回收站</a></li>
    </ul>
</div>
</body>
</html>
<?php }} ?>