<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:19:38
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/index/bottom.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72384475953fd868adbd499-70713783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7401d7a1d8de46d75b81ae9957b8e8173753acf0' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/index/bottom.tpl',
      1 => 1337272480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72384475953fd868adbd499-70713783',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'APP_NAME' => 0,
    'VERSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd868ae17803_03589483',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd868ae17803_03589483')) {function content_53fd868ae17803_03589483($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>bottom</title>
<link href="css/global.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
 [开源版] leesuntech.com 管理平台 系统版本:<?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>

</body>
</html>
<?php }} ?>