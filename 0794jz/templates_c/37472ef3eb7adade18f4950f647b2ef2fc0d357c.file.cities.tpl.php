<?php /* Smarty version Smarty-3.1.11, created on 2014-09-10 09:22:30
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/deals/cities.tpl" */ ?>
<?php /*%%SmartyHeaderCode:953789388540fa7d6378ac9-53694138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37472ef3eb7adade18f4950f647b2ef2fc0d357c' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/deals/cities.tpl',
      1 => 1323927580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '953789388540fa7d6378ac9-53694138',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mess' => 0,
    'tmess' => 0,
    'cities' => 0,
    'pageinfo' => 0,
    'var' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_540fa7d64a2e43_48095826',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540fa7d64a2e43_48095826')) {function content_540fa7d64a2e43_48095826($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.replace.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<div id="location"><strong>�����й����б�</strong></div>
	<div id="warning" <?php if ($_smarty_tpl->tpl_vars['mess']->value=="error"){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tmess']->value;?>
</font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="main.php?act=city&edit=delAll">
<div id="list">
<?php if (!$_smarty_tpl->tpl_vars['cities']->value){?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">���޳����б�</strong></div></td>
    </tr>
</table>
<?php }else{ ?>
 
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="13%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="ȫѡ"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="��ѡ"></div></td>
          <td><div align="center"><input type="button" id="noall" value="ȫ��"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="17%" bgcolor="#EAEAEA"><div align="center"><strong>�Ź�����</strong></div></td>
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>��ǰĬ�ϳ���</strong></div></td>
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>�Ƿ�ʼ��Ӫ</strong></div></td>
    <td width="14%" bgcolor="#EAEAEA"><div align="center"><strong>��ǰ״̬</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']==1||$_smarty_tpl->tpl_vars['var']->value['is_default']){?>disabled<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['is_default'],1,'��'),0,'��');?>
<?php if (!$_smarty_tpl->tpl_vars['var']->value['is_default']){?><a href="main.php?act=set_default&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" style="color:red">[����ΪĬ��]</a><?php }?></div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['is_open'],1,'��'),0,'��');?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['status'],1,'��Ч'),0,'��Ч');?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=add_city&edit=mod&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">�༭</a>
     <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']>1&&!$_smarty_tpl->tpl_vars['var']->value['is_default']){?>
     | <a href="?act=city&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
&edit=del" onClick="return confirm('ȷ��Ҫɾ��<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['name'],'��',''),'&nbsp;','');?>
��')">ɾ��</a>
     <?php }?>
     </div></td>
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
              <td><input type="button" name="add" class="admin_button" value="����" onClick="window.location.href='main.php?act=add_city&edit=add'"/></td>
             <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?> <td><input type="submit" name="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�еĳ�����?')" /></td><?php }?>
            </tr>
          </table></td>
          <td width="81%">
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?>
          <div align="right">��<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['row_total'];?>
����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==1){?>
          ��һҳ
          <?php }else{ ?>
          <a href="?act=city&page=1">��һҳ</a>
          <?php }?>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['prev_page']){?>
		  <a href="?act=city&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['prev_page'];?>
">��һҳ</a>
          <?php }else{ ?>
          ��һҳ
          <?php }?>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['next_page']){?>
            <a href="?act=city&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['next_page'];?>
">��һҳ</a>
            <?php }else{ ?>
            ��һҳ
           <?php }?>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==$_smarty_tpl->tpl_vars['pageinfo']->value['page_num']){?>
            ���һҳ
            <?php }else{ ?>
            <a href="?act=city&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['page_num'];?>
">���һҳ</a>
            <?php }?>
            &nbsp;&nbsp;��&nbsp;&nbsp;��ǰ��<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
ҳ&nbsp;&nbsp;</div>
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