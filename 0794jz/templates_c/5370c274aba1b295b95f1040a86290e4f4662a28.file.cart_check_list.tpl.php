<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:40:51
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/cart/cart_check_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109154980453fd8b8392c846-39372441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5370c274aba1b295b95f1040a86290e4f4662a28' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/cart/cart_check_list.tpl',
      1 => 1387458906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109154980453fd8b8392c846-39372441',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart_list' => 1,
    'var' => 1,
    'total_price' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd8b8394e113_85073735',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd8b8394e113_85073735')) {function content_53fd8b8394e113_85073735($_smarty_tpl) {?><table cellspacing="1" cellpadding="5" border="0" width="100%" bgcolor="#CCCCCC">
                        <tr>
                            <th width=50% bgcolor="#EEEEEE">项目</th>
                            <th width=10% bgcolor="#EEEEEE">数量</th>
                            <th width=15% bgcolor="#EEEEEE">价格</th>									
                            <th width=13% bgcolor="#EEEEEE">总价</th>
                        </tr>
                        
                        <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
                        <tr class="red_l">
                            <td bgcolor="#FFFFFF" align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</td>
                            <td bgcolor="#FFFFFF" align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['number'];?>
</td>
                            <td bgcolor="#FFFFFF" align="center"><?php if ($_smarty_tpl->tpl_vars['var']->value['buy_type']==0){?>&yen;<?php echo $_smarty_tpl->tpl_vars['var']->value['unit_price'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['var']->value['return_score'];?>
积分<?php }?></td>									
                            <td bgcolor="#FFFFFF" align="center"><?php if ($_smarty_tpl->tpl_vars['var']->value['buy_type']==0){?>&yen;<?php echo $_smarty_tpl->tpl_vars['var']->value['total_price'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['var']->value['return_total_score'];?>
积分<?php }?></td>
                        </tr>
                        <?php } ?>
                       
                        <tr>
                        	<td bgcolor="#E4E4E4" align="center" >支付总额：</td>
                            <td bgcolor="#E4E4E4" align="center" colspan="4">&yen;<?php echo $_smarty_tpl->tpl_vars['total_price']->value;?>
</td>
                        </tr>
                  </table> <?php }} ?>