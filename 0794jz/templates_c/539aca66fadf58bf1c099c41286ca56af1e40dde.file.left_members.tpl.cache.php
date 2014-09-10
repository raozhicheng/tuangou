<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:19:44
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/left_menu/left_members.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12552653853fd869062aba1-30476676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '539aca66fadf58bf1c099c41286ca56af1e40dde' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/left_menu/left_members.tpl',
      1 => 1348114990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12552653853fd869062aba1-30476676',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd8690654941_86689653',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd8690654941_86689653')) {function content_53fd8690654941_86689653($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div id="bar">会员管理</div>
<div id="sub">
	<ul>
    	<li><a href="main.php?act=user" target="main">会员列表</a></li>
  		<li><a href="main.php?act=user_group" target="main">会员分组</a></li>
        <li><a href="main.php?act=user_field" target="main">会员扩展</a></li>
        <li><a href="main.php?act=referrals" target="main">邀请返利</a></li>
        <li><a href="main.php?act=member_recycle" target="main">回收站</a></li>
    </ul>
</div>
</body>
</html>
<?php }} ?>