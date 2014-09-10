<?php /*%%SmartyHeaderCode:209168939753fd8761c38906-25492289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '384adde430386420700a0ca7e8d4913e801be6fb' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/left_menu/left_orders.tpl',
      1 => 1348114994,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209168939753fd8761c38906-25492289',
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_540fa7a128a029_46422135',
  'has_nocache_code' => false,
  'cache_lifetime' => 86400,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540fa7a128a029_46422135')) {function content_540fa7a128a029_46422135($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div id="bar">订单管理</div>
<div id="sub">
	<ul>
    	<li><a href="main.php?act=deal_orders" target="main">团购订单</a></li>
  		<li><a href="main.php?act=paymentNotice" target="main">付款单</a></li>
        <li><a href="main.php?act=payment" target="main">支付接口</a></li>
        <li><a href="main.php?act=delivery_area" target="main">配送地区</a></li>
        <li><a href="main.php?act=delivery_way" target="main">配送方式</a></li>
        <li><a href="main.php?act=orders_recycle" target="main">回收站</a></li>
    </ul>
</div>
</body>
</html>
<?php }} ?>