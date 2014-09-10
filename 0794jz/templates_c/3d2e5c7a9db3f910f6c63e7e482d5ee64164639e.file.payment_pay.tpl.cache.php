<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:41:22
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/payment_pay.tpl" */ ?>
<?php /*%%SmartyHeaderCode:101577112853fd8ba298ee60-29451287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d2e5c7a9db3f910f6c63e7e482d5ee64164639e' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/payment_pay.tpl',
      1 => 1384423712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101577112853fd8ba298ee60-29451287',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Web_info' => 0,
    'stylePath' => 0,
    'appName' => 0,
    'title' => 1,
    'payment_notice' => 1,
    'Web_link' => 1,
    'payCode' => 1,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd8ba2a03334_28734337',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd8ba2a03334_28734337')) {function content_53fd8ba2a03334_28734337($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_set')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.set.php';
?><?php echo '/*%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/<?php $_smarty = $_smarty_tpl->smarty; if (!is_callable(\'smarty_modifier_name\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php\';
?>/*/%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
/css/payment.css" rel="stylesheet" type="text/css" />
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
</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
        	
        	<div class="payment">
          		<div class="tit"><?php echo '/*%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/<?php echo $_smarty_tpl->tpl_vars[\'title\']->value;?>
/*/%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/';?>
</div>
                <div class="notice_sn">支付单号：<strong style="color:red;"><?php echo '/*%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/<?php echo $_smarty_tpl->tpl_vars[\'payment_notice\']->value[\'notice_sn\'];?>
/*/%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/';?>
</strong></div>
                <div class="pay_button"><a href="<?php echo '/*%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars[\'Web_link\']->value,"incharge");?>
/*/%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/';?>
"><span class="return left"><<返回选择</a></span><span class="code left"><?php echo '/*%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/<?php echo $_smarty_tpl->tpl_vars[\'payCode\']->value;?>
/*/%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/';?>
</span><span class="myorder left"><a href="<?php echo '/*%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars[\'Web_link\']->value,"my_order");?>
/*/%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/';?>
">我的订单>></a></span><div class="clear"></div></div>
                <div class="price">支付总额：&yen;<?php echo '/*%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/<?php echo $_smarty_tpl->tpl_vars[\'payment_notice\']->value[\'money\'];?>
/*/%%SmartyNocache:101577112853fd8ba298ee60-29451287%%*/';?>
</div>
          	</div>
            
          
        </div>
        <div class="c_right">
        	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/inc/right_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

        </div>
        <div class="clear"></div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


</body>

</html>
<?php }} ?>