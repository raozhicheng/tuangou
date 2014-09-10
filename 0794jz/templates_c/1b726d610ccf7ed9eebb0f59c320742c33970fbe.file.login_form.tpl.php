<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:40:33
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/member/login_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:122718035953fd8b710a3832-97112843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b726d610ccf7ed9eebb0f59c320742c33970fbe' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/member/login_form.tpl',
      1 => 1387202078,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122718035953fd8b710a3832-97112843',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Web_link' => 0,
    'ajax' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd8b7116c219_84551558',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd8b7116c219_84551558')) {function content_53fd8b7116c219_84551558($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_name')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php';
?><div class="reg_box">
 <form name="login" id="login" method="post"  enctype="multipart/form-data" action="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"do_login");?>
">
 <ul>
    <li><span class="t"><label for="user_name">用户名/邮箱:</label></span><span class="i"><input type="text" name="user_name" id="user_name" class="input_box" value="" /></span></li>
    <li><span class="t"><label for="user_pwd">密码:</label></span><span class="i"><input type="password" name="user_pwd" id="user_pwd" class="input_box" value="" /></span>&nbsp;&nbsp;&nbsp;<a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"getPassword");?>
">忘记密码？</a></li>
    <li><span class="t"><label for="auto_login">直接登陆:</label></span><span class="i"><input type="checkbox" checked="checked" id="auto_login" name="auto_login" value="1" tabindex="3"></span></li>
    <li><span class="t"></span><span class="i"><input type="submit" name="commit" id="submit" class="submit_button" value="登陆" /></span></li>
 </ul>
 <input type="hidden" name="ajax" value="<?php echo $_smarty_tpl->tpl_vars['ajax']->value;?>
">
 </form>
</div><?php }} ?>