<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:19:42
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/front_set/info_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33345290253fd868e3306e2-68974691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '820ad048dce0a290f79a70eb76cc6d2129a74be7' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/front_set/info_category.tpl',
      1 => 1323873270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33345290253fd868e3306e2-68974691',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mess' => 0,
    'tmess' => 0,
    'infoCate' => 0,
    'var' => 0,
    'pageinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd868e5d7177_02441420',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd868e5d7177_02441420')) {function content_53fd868e5d7177_02441420($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.replace.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<div id="location"><strong>·信息分类</strong></div>
	<div id="warning" <?php if ($_smarty_tpl->tpl_vars['mess']->value=="error"){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tmess']->value;?>
</font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="main.php?act=info_cate&edit=delAll">
<div id="list">
<?php if (!$_smarty_tpl->tpl_vars['infoCate']->value){?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无分类列表</strong></div></td>
    </tr>
</table>
<?php }else{ ?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="15%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="全选"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="反选"></div></td>
          <td><div align="center"><input type="button" id="noall" value="全否"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="23%" bgcolor="#EAEAEA"><div align="center"><strong>分类名称</strong></div></td>
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>信息类型</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>状态</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>排序</strong></div></td>
    <td width="25%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infoCate']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</div></td>
     <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['type'],'normal','普通信息'),'help','帮助信息'),'sys','系统信息');?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['status'],1,'有效'),0,'无效');?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['sort'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=add_infoCate&edit=mod&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">编辑</a> | <a href="?act=info_cate&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
&edit=del" onClick="return confirm('确定要删除<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
吗？')">删除</a></div></td>
  </tr>
  <?php } ?>
  </table>
<?php }?>
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
              <td><input type="button" name="add" class="admin_button" value="新增" onClick="window.location.href='main.php?act=add_infoCate&edit=add'"/></td>
              <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?><td><input type="submit" name="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除选中的分类吗?')" /></td><?php }?>
            </tr>
          </table></td>
          <td width="81%">
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?>
          <div align="right">共<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['row_total'];?>
条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==1){?>
          第一页
          <?php }else{ ?>
          <a href="?act=info_cate&page=1">第一页</a>
          <?php }?>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['prev_page']){?>
		  <a href="?act=info_cate&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['prev_page'];?>
">上一页</a>
          <?php }else{ ?>上一页<?php }?>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['next_page']){?>
            <a href="?act=info_cate&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['next_page'];?>
">下一页</a>
            <?php }else{ ?>下一页<?php }?>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==$_smarty_tpl->tpl_vars['pageinfo']->value['page_num']){?>
            最后一页
            <?php }else{ ?>
            <a href="?act=info_cate&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['page_num'];?>
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
</form>
</div>
</body>
</html>
<?php }} ?>