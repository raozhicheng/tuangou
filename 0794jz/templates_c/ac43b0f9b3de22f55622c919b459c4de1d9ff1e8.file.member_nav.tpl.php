<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:41:39
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/member_nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85655264853fd8bb3e67111-99568328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac43b0f9b3de22f55622c919b459c4de1d9ff1e8' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/member_nav.tpl',
      1 => 1380115822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85655264853fd8bb3e67111-99568328',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd8bb3f00f58_32806926',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd8bb3f00f58_32806926')) {function content_53fd8bb3f00f58_32806926($_smarty_tpl) {?><?php if (!is_callable('smarty_block_memberNav')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.memberNav.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('memberNav', array('name'=>"list")); $_block_repeat=true; echo smarty_block_memberNav(array('name'=>"list"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

     <li <?php if ($_smarty_tpl->tpl_vars['list']->value['current']){?>class="selected"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['list']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</a></li>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_memberNav(array('name'=>"list"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>