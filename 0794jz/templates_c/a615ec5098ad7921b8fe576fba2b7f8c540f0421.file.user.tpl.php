<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:19:44
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/member/user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177424281753fd8690549d63-66220183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a615ec5098ad7921b8fe576fba2b7f8c540f0421' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/member/user.tpl',
      1 => 1378646744,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177424281753fd8690549d63-66220183',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mess' => 0,
    'tmess' => 0,
    'users' => 0,
    'var' => 0,
    'tmp' => 0,
    'pageinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd86905ff3b1_03672791',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd86905ff3b1_03672791')) {function content_53fd86905ff3b1_03672791($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
  $(function () { 
	 $("#dels").click(function () {
                 $("form:eq(0)").attr("action", "main.php?act=user&edit=delAll").submit();
      });
     $("#search").click(function () {
                $("form:eq(0)").attr("action", "main.php?act=user&edit=search").submit();
      });
   });

</script>
<body>
<form method="post"  enctype="multipart/form-data" action="">
<div id="location"><div style="float:left"><strong>����Ա����</strong></div>
	<div id="search_bar"><input type="text" name="search_text"  class="input_box">&nbsp;<input name="search" type="submit" id="search" value="����"></div>
</div>
	<div id="warning" <?php if ($_smarty_tpl->tpl_vars['mess']->value=="error"){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tmess']->value;?>
</font></div>
</div>

<div id="list">
<?php if (!$_smarty_tpl->tpl_vars['users']->value){?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">���޻�Ա�б�</strong></div></td>
    </tr>
</table>
<?php }else{ ?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="8%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="ȫѡ"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="��ѡ"></div></td>
          <td><div align="center"><input type="button" id="noall" value="ȫ��"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="13%" bgcolor="#EAEAEA"><div align="center"><strong>��Ա����</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
     <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>״̬</strong></div></td>
    <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>��Ա����</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>�Ƽ���</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>����½</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>����½ʱ��</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['user_name'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['score'];?>
����</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['status'],1,'��Ч'),0,'��Ч');?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center">&yen;<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['var']->value['money']);?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['group_name'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center">
    <?php if ($_smarty_tpl->tpl_vars['var']->value['pid']==0){?>
    	����
    <?php }else{ ?>
    <?php  $_smarty_tpl->tpl_vars['tmp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tmp']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tmp']->key => $_smarty_tpl->tpl_vars['tmp']->value){
$_smarty_tpl->tpl_vars['tmp']->_loop = true;
?>
         <?php if ($_smarty_tpl->tpl_vars['var']->value['pid']==$_smarty_tpl->tpl_vars['tmp']->value['id']){?>
    		<?php echo $_smarty_tpl->tpl_vars['tmp']->value['user_name'];?>

    	 <?php }?>
    <?php } ?>
    <?php }?>
    </div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['login_ip'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php if ($_smarty_tpl->tpl_vars['var']->value['login_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['var']->value['login_time'],"%Y-%m-%d %H:%M:%S");?>
<?php }else{ ?>����<?php }?></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=add_user&edit=mod&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">�༭</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?act=user&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
&edit=del" onClick="return confirm('ȷ��Ҫɾ��<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
��')">ɾ��</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?act=user_log&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">��־</a></div></td>
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
              <td><input type="button" name="add" class="admin_button" value="����" onClick="window.location.href='main.php?act=add_user&edit=add'"/></td>
              <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?><td><input type="submit" name="dels" id="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�еķ�����?')" /></td><?php }?>
            </tr>
          </table></td>
          <td width="81%">
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?>
          <div align="right">��<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['row_total'];?>
����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==1){?>
          ��һҳ
          <?php }else{ ?>
          <a href="?act=user&page=1">��һҳ</a>
          <?php }?>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['prev_page']){?>
		  <a href="?act=user&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['prev_page'];?>
">��һҳ</a>
          <?php }else{ ?>��һҳ<?php }?>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['next_page']){?>
            <a href="?act=user&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['next_page'];?>
">��һҳ</a>
            <?php }else{ ?>��һҳ<?php }?>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==$_smarty_tpl->tpl_vars['pageinfo']->value['page_num']){?>
            ���һҳ
            <?php }else{ ?>
            <a href="?act=user&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['page_num'];?>
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

</div>
</form>
</body>
</html>
<?php }} ?>