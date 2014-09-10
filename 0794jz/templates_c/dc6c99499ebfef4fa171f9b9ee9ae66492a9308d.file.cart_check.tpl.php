<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:40:51
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/cart_check.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42231453453fd8b8381b0c1-22168996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc6c99499ebfef4fa171f9b9ee9ae66492a9308d' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/cart_check.tpl',
      1 => 1402924153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42231453453fd8b8381b0c1-22168996',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Web_info' => 0,
    'stylePath' => 0,
    'appName' => 0,
    'order_info' => 1,
    'title' => 1,
    'Web_link' => 1,
    'is_delivery' => 1,
    'consignee_id' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd8b8390da56_08981630',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd8b8390da56_08981630')) {function content_53fd8b8390da56_08981630($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_set')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.set.php';
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
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
<META HTTP-EQUIV="expires" CONTENT="0">
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/global.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/header.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/footer.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/common.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/cart.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/login.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/font.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/weebox.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/pngfix.js"></script>
<![endif]-->
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/inc/cart/cart_const.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/jquery.bgiframe.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/script.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/jquery.pngfix.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/jquery.weebox.js"></script>
</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script type="text/javascript">
	var order_id = <?php echo $_smarty_tpl->tpl_vars['order_info']->value['id'];?>
;
	
</script>
<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
          <div class="cart">
          	<div class="tit"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</div>
            <form name="cart_form" id="cart_form" action="<?php if ($_smarty_tpl->tpl_vars['order_info']->value['id']){?><?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"order_done");?>
<?php }else{ ?><?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"done");?>
<?php }?>" method="post" />	
            <div class="content">
            	<div id="cart_list">
            		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/inc/cart/cart_check_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
                <?php if ($_smarty_tpl->tpl_vars['is_delivery']->value){?>
                <div class="cart_tit">配送信息</div>
                	<script type="text/javascript">
						load_consignee('<?php echo $_smarty_tpl->tpl_vars['consignee_id']->value;?>
');
					</script>
                    <div id="cart_consignee"></div>
                <div class="cart_tit">配送方式</div>
                    <div id="cart_delivery"></div>
                <?php }else{ ?>
					<script type="text/javascript">
                         $(document).ready(function(){count_buy_total();});
                    </script>
                <?php }?>
                <div class="cart_tit">订单备注</div>
                <div class="cart_message">
               		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/inc/cart/cart_message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
                <div class="cart_tit">支付方式</div>
                <div class="cart_payment">
                	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/inc/cart/cart_payment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
                <div id="cart_total">
                </div>
                <div id="cart_submit">
                	<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['order_info']->value['id'];?>
" name="id" />
					<input type="button" class="formbutton" value="确认付款" id="order_done">
                    <input type="button" class="formbutton" value="返回修改订单" onClick="window.location.href='<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"cart");?>
'">
                    
                </div>
            </div>
            </form>
          </div>
        </div>
        <div class="c_right">
        	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/inc/right_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <div class="clear"></div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</body>

</html>
<?php }} ?>