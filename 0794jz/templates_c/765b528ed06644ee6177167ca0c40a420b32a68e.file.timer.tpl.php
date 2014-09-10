<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:19:38
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/index/timer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81621553fd868ac2efc5-23891069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '765b528ed06644ee6177167ca0c40a420b32a68e' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/index/timer.tpl',
      1 => 1319191936,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81621553fd868ac2efc5-23891069',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'timer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd868accb490_93866552',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd868accb490_93866552')) {function content_53fd868accb490_93866552($_smarty_tpl) {?><div id="timer">
	<span class="exetime">当前脚本执行用时</span><span class="red_font"><?php echo $_smarty_tpl->tpl_vars['timer']->value;?>
</span>秒&nbsp;	
</div>
<?php }} ?>