<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:19:42
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/left_menu/left_front_set.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166371564253fd868e80f4f7-21213945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a860481e84be69631817d3de86c56cfef3c715e' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/left_menu/left_front_set.tpl',
      1 => 1348114970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166371564253fd868e80f4f7-21213945',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd868e9e4868_98054274',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd868e9e4868_98054274')) {function content_53fd868e9e4868_98054274($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div id="bar">前端设置</div>
<div id="sub">
	<ul>
    	<li><a href="main.php?act=info_cate" target="main">信息分类</a></li>
  		<li><a href="main.php?act=infos" target="main">信息列表</a></li>
        <li><a href="main.php?act=nav" target="main">主导航</a></li>
        <li><a href="main.php?act=adv" target="main">广告管理</a></li>
        <li><a href="main.php?act=links" target="main">友情链接</a></li>
		<li><a href="main.php?act=templates" target="main">模版管理</a></li>
        <li><a href="main.php?act=message_group" target="main">留言分组</a></li>
        <li><a href="main.php?act=message" target="main">留言管理</a></li>
        <li><a href="main.php?act=front_recycle" target="main">回收站</a></li>
    </ul>
</div>
</body>
</html>
<?php }} ?>