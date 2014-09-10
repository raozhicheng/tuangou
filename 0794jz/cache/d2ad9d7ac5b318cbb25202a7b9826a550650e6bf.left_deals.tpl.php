<?php /*%%SmartyHeaderCode:117363359753fd876ac623a6-83131692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2ad9d7ac5b318cbb25202a7b9826a550650e6bf' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/left_menu/left_deals.tpl',
      1 => 1348114956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117363359753fd876ac623a6-83131692',
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_540fa79f022703_32270959',
  'has_nocache_code' => false,
  'cache_lifetime' => 86400,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540fa79f022703_32270959')) {function content_540fa79f022703_32270959($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div id="bar">团购管理
</div>
<div id="sub">
	<ul>
		<li><a href="main.php?act=deals" target="main">团购列表</a></li>
    	<li><a href="main.php?act=deals_category" target="main">团购分类列表</a></li>
 		<li><a href="main.php?act=supplier" target="main">供应商列表</a></li>
		<li><a href="main.php?act=city" target="main">团购城市列表</a></li>
        <li><a href="main.php?act=weight" target="main">重量单位</a></li>
 		<li><a href="main.php?act=deals_recycle" target="main">回收站</a></li>
	</ul>
</div>
</body>
</html>
<?php }} ?>