<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:19:38
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/index/top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103163285453fd868a7a9278-89430493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e894aa990cb0e670aec0044acb5ace25916cfe11' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/index/top.tpl',
      1 => 1408358495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103163285453fd868a7a9278-89430493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Root' => 0,
    'username' => 1,
    'admin_nav' => 1,
    'key' => 1,
    'act' => 1,
    'value' => 1,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd868a88ca68_71526883',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd868a88ca68_71526883')) {function content_53fd868a88ca68_71526883($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    		<li><a href="<?php echo $_smarty_tpl->tpl_vars['Root']->value;?>
" target="_blank">网站首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.leesuntech.com" target="_blank">官方网站</a>&nbsp;&nbsp;|&nbsp;&nbsp;用户手册&nbsp;&nbsp;|&nbsp;&nbsp;帮助</li>
      </ul>
	</div>
    <div id="current_user">用户名：<?php echo '/*%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/<?php echo $_smarty_tpl->tpl_vars[\'username\']->value;?>
/*/%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/';?>
&nbsp;&nbsp;<a href="login.php" target="_top">[退出]</a></div>
    
	<div id="nav">
    	<ul>
         <?php echo '/*%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/<?php  $_smarty_tpl->tpl_vars[\'value\'] = new Smarty_Variable; $_smarty_tpl->tpl_vars[\'value\']->_loop = false;
 $_smarty_tpl->tpl_vars[\'key\'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars[\'admin_nav\']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, \'array\');}
foreach ($_from as $_smarty_tpl->tpl_vars[\'value\']->key => $_smarty_tpl->tpl_vars[\'value\']->value){
$_smarty_tpl->tpl_vars[\'value\']->_loop = true;
 $_smarty_tpl->tpl_vars[\'key\']->value = $_smarty_tpl->tpl_vars[\'value\']->key;
?>/*/%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/';?>

        	<li><a href="main.php<?php echo '/*%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/<?php if ($_smarty_tpl->tpl_vars[\'act\']->value[$_smarty_tpl->tpl_vars[\'key\']->value]){?>/*/%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/';?>
?act=<?php echo '/*%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/<?php echo $_smarty_tpl->tpl_vars[\'act\']->value[$_smarty_tpl->tpl_vars[\'key\']->value];?>
/*/%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/';?>
<?php echo '/*%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/<?php }?>/*/%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/';?>
"  id="menu<?php echo '/*%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/<?php echo $_smarty_tpl->tpl_vars[\'key\']->value;?>
/*/%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/';?>
" target="main"><?php echo '/*%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/<?php echo $_smarty_tpl->tpl_vars[\'value\']->value;?>
/*/%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/';?>
</a></li>
         <?php echo '/*%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/<?php } ?>/*/%%SmartyNocache:103163285453fd868a7a9278-89430493%%*/';?>

         
        </ul>
	</div>
    
</div>
</body>
</html>
<?php }} ?>