<?php /* Smarty version Smarty-3.1.11, created on 2014-09-10 09:16:23
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/member/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1003079510540fa667e33e43-16969404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '034aaeeb563fef7ab8c7b954c816c42281e2feb0' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/member/login.tpl',
      1 => 1387202088,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1003079510540fa667e33e43-16969404',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Web_info' => 0,
    'stylePath' => 0,
    'appName' => 0,
    'Web_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_540fa668009d73_08504435',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540fa668009d73_08504435')) {function content_540fa668009d73_08504435($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_set')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.set.php';
if (!is_callable('smarty_modifier_name')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"SITE_TITLE");?>
</title>
<meta name="description" content="<?php echo smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"SITE_DESCRIPTION");?>
">
<meta name="keywords" content="<?php echo smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"SITE_KEYWORD");?>
">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/favicon.ico" />
<meta name="author" content="<?php echo $_smarty_tpl->tpl_vars['appName']->value;?>
" />
<meta name="copyright" content="leesuntech.com" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/global.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/header.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/footer.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/common.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/user.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/font.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/script.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/jquery.pngfix.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#login").bind("submit",function(){
			var user_name = $.trim(($("#login").find("input[name='user_name']").val()));
			var user_pwd = $.trim(($("#login").find("input[name='user_pwd']").val()));
			if(user_name == '' || user_pwd=='')
			{
				alert("用户名与密码不能为空!");
				return false;
			}
			
		});
	});
</script>
</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="body_area">
	
    <div id="content_box">
    	<div class="c_left">
        	<div class="user_f">
            	<div class="tit">会员登陆</div>
                	 <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/member/login_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div>
        	<div class="clear"></div>
        </div>
        <div class="c_right">
                <div class="right_box">
                    <div class="title">
                    	<span class="right_icon_attention left"></span>
                        <span class="f14b red_n left" style="text-align:center">还没有帐户？</span>
                    </div>
                    <div class="content f14b grey_n black_l">
                       请立即&nbsp;<a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"register");?>
">注册</a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            
        	<div class="clear"></div>
    	</div>
     </div>
        
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</body>

</html>
<?php }} ?>