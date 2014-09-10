<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:40:51
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/cart/cart_total.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212443400753fd8b83c89650-26956947%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36c74382efa8fe390f96330981415aec8e053075' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/cart/cart_total.tpl',
      1 => 1393411664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212443400753fd8b83c89650-26956947',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 1,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd8b83dd7136_18395315',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd8b83dd7136_18395315')) {function content_53fd8b83dd7136_18395315($_smarty_tpl) {?>
<div class="cart_total_box">
	<p style="text-align: right; line-height: 20px; ">
	商品总价:&yen;<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php echo $_smarty_tpl->tpl_vars[\'result\']->value[\'total_price\'];?>
/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    <?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php if ($_smarty_tpl->tpl_vars[\'result\']->value[\'delivery_fee\']>0){?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

		+ 运费:&yen;<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php echo $_smarty_tpl->tpl_vars[\'result\']->value[\'delivery_fee\'];?>
/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

	<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php }?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    <?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php if ($_smarty_tpl->tpl_vars[\'result\']->value[\'payment_fee\']>0){?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    	+支付手续费:&yen;<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php echo $_smarty_tpl->tpl_vars[\'result\']->value[\'payment_fee\'];?>
/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    <?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php }?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    <?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php if ($_smarty_tpl->tpl_vars[\'result\']->value[\'user_discount\']>0){?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

		- 等级折扣:<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php echo $_smarty_tpl->tpl_vars[\'result\']->value[\'user_discount\'];?>
/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

	<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php }?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    <?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php if ($_smarty_tpl->tpl_vars[\'result\']->value[\'paid_account_money\']>0){?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

		- 已用余额支付:&yen;<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php echo $_smarty_tpl->tpl_vars[\'result\']->value[\'paid_account_money\'];?>
/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

	<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php }?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    <?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php if ($_smarty_tpl->tpl_vars[\'result\']->value[\'paid_ecv_money\']>0){?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

		- 已用代金券支付:&yen;<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php echo $_smarty_tpl->tpl_vars[\'result\']->value[\'paid_ecv_money\'];?>
/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

	<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php }?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    	=
	<span class="red_n">&yen;<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php echo $_smarty_tpl->tpl_vars[\'result\']->value[\'pay_total_price\'];?>
/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>
</span>
    </p>
    <p style="text-align: right; line-height: 20px;">
    <?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php if ($_smarty_tpl->tpl_vars[\'result\']->value[\'account_money\']>0){?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

		- 余额支付:&yen;<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php echo $_smarty_tpl->tpl_vars[\'result\']->value[\'account_money\'];?>
/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

	<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php }?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    <?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php if ($_smarty_tpl->tpl_vars[\'result\']->value[\'ecv_money\']>0){?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

		- 代金券抵扣:&yen;<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php echo $_smarty_tpl->tpl_vars[\'result\']->value[\'ecv_money\'];?>
/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

	<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php }?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    应付款金额:<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php if ($_smarty_tpl->tpl_vars[\'result\']->value[\'payment_info\']){?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>
通过<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php echo $_smarty_tpl->tpl_vars[\'result\']->value[\'payment_info\'][\'name\'];?>
/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>
<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php }?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>
<span class="red_n">&yen;<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php echo $_smarty_tpl->tpl_vars[\'result\']->value[\'pay_price\'];?>
/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>
</span>
    </p>
    <p style="text-align: right; line-height: 20px;">
    <?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php if ($_smarty_tpl->tpl_vars[\'result\']->value[\'return_total_money\']!=0){?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    	购买成功后资金变更:&yen;<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php echo $_smarty_tpl->tpl_vars[\'result\']->value[\'return_total_money\'];?>
/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    <?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php }?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    <?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php if ($_smarty_tpl->tpl_vars[\'result\']->value[\'return_total_score\']!=0){?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    	购买成功后积分变更:<?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php echo $_smarty_tpl->tpl_vars[\'result\']->value[\'return_total_score\'];?>
/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    <?php echo '/*%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/<?php }?>/*/%%SmartyNocache:212443400753fd8b83c89650-26956947%%*/';?>

    </p>
</div>
<?php }} ?>