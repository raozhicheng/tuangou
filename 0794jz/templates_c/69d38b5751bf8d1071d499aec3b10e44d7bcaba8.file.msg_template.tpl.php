<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:23:44
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/mail_mess/msg_template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99400703753fd878053a177-36747635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69d38b5751bf8d1071d499aec3b10e44d7bcaba8' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/mail_mess/msg_template.tpl',
      1 => 1334307728,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99400703753fd878053a177-36747635',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mess' => 0,
    'tmess' => 0,
    'msgTemplates' => 0,
    'var' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd87805cb0e2_10086519',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd87805cb0e2_10086519')) {function content_53fd87805cb0e2_10086519($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.replace.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<div id="location"><strong>·消息模版管理</strong></div>
	<div id="warning" <?php if ($_smarty_tpl->tpl_vars['mess']->value=="error"){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tmess']->value;?>
</font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="?act=msg_template">
<div id="list">
<?php if (!$_smarty_tpl->tpl_vars['msgTemplates']->value){?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无模版</strong></div></td>
    </tr>
</table>
<?php }else{ ?>
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="cdcdcd">
  <tr>
   <td width="20%" bgcolor="#EAEAEA"><div align="center"><strong>模板名称</strong></div></td>
    <td width="20%" bgcolor="#EAEAEA"><div align="center"><strong>英文名称</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>模版类型</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>是否是超文本</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msgTemplates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
  <tr>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['ch_name'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['type'],1,'支持超文本'),0,'不支持超文本');?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['is_html'],1,'是'),0,'否');?>
</div></td>
     <td bgcolor="f5f5f5"><div align="center"><a href="?act=edit_msgTemplate&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">编辑</a></td>
    
  </tr>
  <?php } ?>
  </table>
<?php }?>

</div>
</form>
</body>
</html>
<?php }} ?>