<?php /* Smarty version Smarty-3.1.11, created on 2014-08-20 16:18:21
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/cart/cart_const.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36917802553f459cd48de42-38399428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eaa9ac199fdd1b40775ab1502b1f54dcbd9448d1' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/cart/cart_const.tpl',
      1 => 1387729032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36917802553f459cd48de42-38399428',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'appPath' => 1,
    'Web_link' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53f459cd4a2f01_91489480',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f459cd4a2f01_91489480')) {function content_53f459cd4a2f01_91489480($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_name')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php';
?>
<script type="text/javascript">
var APP_PATH = '<?php echo $_smarty_tpl->tpl_vars['appPath']->value;?>
';
var CART_URL = '<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"cart");?>
';
var CART_CHECK_URL = '<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"cart_check");?>
';
var ADD_CART_URL='<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"add_cart");?>
';
var DEL_CART_URL='<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"del_cart");?>
';
var MOD_CART_URL='<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"modify_cart");?>
';
</script>
<?php }} ?>