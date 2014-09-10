<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:23:32
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/front_set/nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212252706553fd87743a0921-89249861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '445fc73f17269e0f6faee2be00929572e7973acf' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/front_set/nav.tpl',
      1 => 1323274284,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212252706553fd87743a0921-89249861',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mess' => 0,
    'tmess' => 0,
    'nav' => 0,
    'var' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd87743df992_23912008',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd87743df992_23912008')) {function content_53fd87743df992_23912008($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.replace.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<div id="location"><strong>·主导航管理</strong></div>
	<div id="warning" <?php if ($_smarty_tpl->tpl_vars['mess']->value=="error"){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tmess']->value;?>
</font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="main.php?act=infos&edit=delAll">
<div id="list">
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="23%" bgcolor="#EAEAEA"><div align="center"><strong>名称</strong></div></td>
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>状态</strong></div></td>
    <td width="17%" bgcolor="#EAEAEA"><div align="center"><strong>排序</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>新窗口</strong></div></td>
    <td width="25%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
  <tr>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['status'],1,'有效'),0,'无效');?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['rank'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['is_newWindow'],1,'是'),0,'否');?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=mod_nav&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
&edit=mod">编辑</a></div></td>
  </tr>
  <?php } ?>
  </table>


</form>
</div>
</body>
</html>
<?php }} ?>