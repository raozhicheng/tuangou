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
  'variables' => 
  array (
    'result' => 1,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd8b83ddbc42_02248523',
  'cache_lifetime' => 86400,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd8b83ddbc42_02248523')) {function content_53fd8b83ddbc42_02248523($_smarty_tpl) {?><div class="cart_total_box">
	<p style="text-align: right; line-height: 20px; ">
	��Ʒ�ܼ�:&yen;<?php echo $_smarty_tpl->tpl_vars['result']->value['total_price'];?>

    <?php if ($_smarty_tpl->tpl_vars['result']->value['delivery_fee']>0){?>
		+ �˷�:&yen;<?php echo $_smarty_tpl->tpl_vars['result']->value['delivery_fee'];?>

	<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['result']->value['payment_fee']>0){?>
    	+֧��������:&yen;<?php echo $_smarty_tpl->tpl_vars['result']->value['payment_fee'];?>

    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['result']->value['user_discount']>0){?>
		- �ȼ��ۿ�:<?php echo $_smarty_tpl->tpl_vars['result']->value['user_discount'];?>

	<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['result']->value['paid_account_money']>0){?>
		- �������֧��:&yen;<?php echo $_smarty_tpl->tpl_vars['result']->value['paid_account_money'];?>

	<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['result']->value['paid_ecv_money']>0){?>
		- ���ô���ȯ֧��:&yen;<?php echo $_smarty_tpl->tpl_vars['result']->value['paid_ecv_money'];?>

	<?php }?>
    	=
	<span class="red_n">&yen;<?php echo $_smarty_tpl->tpl_vars['result']->value['pay_total_price'];?>
</span>
    </p>
    <p style="text-align: right; line-height: 20px;">
    <?php if ($_smarty_tpl->tpl_vars['result']->value['account_money']>0){?>
		- ���֧��:&yen;<?php echo $_smarty_tpl->tpl_vars['result']->value['account_money'];?>

	<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['result']->value['ecv_money']>0){?>
		- ����ȯ�ֿ�:&yen;<?php echo $_smarty_tpl->tpl_vars['result']->value['ecv_money'];?>

	<?php }?>
    Ӧ������:<?php if ($_smarty_tpl->tpl_vars['result']->value['payment_info']){?>ͨ��<?php echo $_smarty_tpl->tpl_vars['result']->value['payment_info']['name'];?>
<?php }?><span class="red_n">&yen;<?php echo $_smarty_tpl->tpl_vars['result']->value['pay_price'];?>
</span>
    </p>
    <p style="text-align: right; line-height: 20px;">
    <?php if ($_smarty_tpl->tpl_vars['result']->value['return_total_money']!=0){?>
    	����ɹ����ʽ���:&yen;<?php echo $_smarty_tpl->tpl_vars['result']->value['return_total_money'];?>

    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['result']->value['return_total_score']!=0){?>
    	����ɹ�����ֱ��:<?php echo $_smarty_tpl->tpl_vars['result']->value['return_total_score'];?>

    <?php }?>
    </p>
</div>
<?php }} ?>