<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:23:38
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/front_set/message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204405530553fd877a3bb635-49083157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b87093076575647b53b57929207054a9316ae8e' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/front_set/message.tpl',
      1 => 1345280988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204405530553fd877a3bb635-49083157',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mess' => 0,
    'tmess' => 0,
    'messages' => 0,
    'var' => 0,
    'pageinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd877a4bb6f7_76305100',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd877a4bb6f7_76305100')) {function content_53fd877a4bb6f7_76305100($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_replace')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<div id="location"><strong>·留言管理</strong></div>
	<div id="warning" <?php if ($_smarty_tpl->tpl_vars['mess']->value=="error"){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tmess']->value;?>
</font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="main.php?act=message&edit=delAll">
<div id="list">
<?php if (!$_smarty_tpl->tpl_vars['messages']->value){?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无留言列表</strong></div></td>
    </tr>
</table>
<?php }else{ ?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="10%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="全选"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="反选"></div></td>
          <td><div align="center"><input type="button" id="noall" value="全否"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>留言标题</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>会员名称</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>所在城市</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>仅会员可见</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>所在分组</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>留言时间</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>回复时间</strong></div></td>
    <td width="25%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox"value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['var']->value['title'],13,"...",true);?>
</div></td>
     <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['user_name'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['city_name'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['is_member'],1,'是'),0,'否');?>
</div></td>
     <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['group_name'];?>
</div></td>
     <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['var']->value['create_time'],"%Y-%m-%d %H:%M:%S");?>
</div></td>
     <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['var']->value['update_time'],"%Y-%m-%d %H:%M:%S");?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center">
    <a href="?act=reply_message&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">回复</a> | <a href="?act=message&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
&edit=del" onClick="return confirm('确定要删除<?php echo $_smarty_tpl->tpl_vars['var']->value['title'];?>
吗？')">删除</a>
    </div></td>
  </tr>
  <?php } ?>
  </table>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="5"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#EAEAEA">
  <tr>
    <td bgcolor="#F5F5F5" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="19%"><table width="164" border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><input type="submit" name="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除选中的分类吗?')" /></td>
            </tr>
          </table></td>
          <td width="81%">
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?>
          <div align="right">共<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['row_total'];?>
条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==1){?>
          第一页
          <?php }else{ ?>
          <a href="?act=message&page=1">第一页</a>
          <?php }?>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['prev_page']){?>
		  <a href="?act=message&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['prev_page'];?>
">上一页</a>
          <?php }else{ ?>上一页<?php }?>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['next_page']){?>
            <a href="?act=message&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['next_page'];?>
">下一页</a>
            <?php }else{ ?>下一页<?php }?>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==$_smarty_tpl->tpl_vars['pageinfo']->value['page_num']){?>
            最后一页
            <?php }else{ ?>
            <a href="?act=message&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['page_num'];?>
">最后一页</a>
            <?php }?>
            &nbsp;&nbsp;｜&nbsp;&nbsp;当前第<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
页&nbsp;&nbsp;</div>
            <?php }?>
            </td>
        </tr>
      </table>
      <div align="center"></div></td>
    </tr>
</table>
<?php }?>
</form>
</div>
</body>
</html>
<?php }} ?>