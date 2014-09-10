<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:40:51
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/cart/cart_payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18202389353fd8b83986c81-56471372%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0326f0d831bbf7025c29ec369e4604774e1c6263' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/cart/cart_payment.tpl',
      1 => 1392218726,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18202389353fd8b83986c81-56471372',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'payment_list' => 0,
    'var' => 0,
    'account_html' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd8b83996f38_02573352',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd8b83996f38_02573352')) {function content_53fd8b83996f38_02573352($_smarty_tpl) {?><script type="text/javascript">
$(document).ready(function(){
	$("input[name='account_money'],input[name='ecvsn'],input[name='ecvpassword']").bind("blur",function(){
		count_buy_total();
	});
	$("input[name='payment']").bind("click",function(){
		count_buy_total();
	});
	$("#check-all-money").bind("click",function(){
		if($(this).attr("checked"))
		{
			count_buy_total();
		}
		else
		{
			$("#account_money").val("0");
			count_buy_total();
		}
	});
});	
</script>
<table cellspacing="1" cellpadding="5" border="0" width="100%" bgcolor="#CCCCCC">
                        <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
                        <tr>
                            <td bgcolor="#FFFFFF" align="left"><input type='radio' name='payment' value='<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
' /><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</td>
                            <td bgcolor="#FFFFFF" align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['description'];?>
</td>
                        </tr>
                        <?php } ?>
                       <tr>
                       		<td bgcolor="#FFFFFF" colspan="2"><?php echo $_smarty_tpl->tpl_vars['account_html']->value;?>
</td>
                       </tr>
                  </table> <?php }} ?>