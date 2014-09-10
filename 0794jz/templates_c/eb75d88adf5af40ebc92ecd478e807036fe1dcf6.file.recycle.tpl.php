<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:23:39
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/common/recycle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23782899953fd877b7fa6c0-48579692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb75d88adf5af40ebc92ecd478e807036fe1dcf6' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/common/recycle.tpl',
      1 => 1330940926,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23782899953fd877b7fa6c0-48579692',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'status' => 0,
    'current_table' => 0,
    'mess' => 0,
    'tmess' => 0,
    'tables' => 0,
    'key' => 0,
    'value' => 0,
    'recycle' => 0,
    'var' => 0,
    'name' => 0,
    'pageinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd877b898305_98175944',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd877b898305_98175944')) {function content_53fd877b898305_98175944($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
  $(function () { 
	 $("#restore").click(function () {
                 $("form:eq(0)").attr("action", "main.php?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&current=<?php echo $_smarty_tpl->tpl_vars['current_table']->value;?>
&edit=restore").submit();
      });
     $("#dels").click(function () {
                $("form:eq(0)").attr("action", "main.php?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&current=<?php echo $_smarty_tpl->tpl_vars['current_table']->value;?>
&edit=del").submit();
      });
   });

</script>

<body>
<div id="location"><strong>·回收站</strong></div>
	<div id="warning" <?php if ($_smarty_tpl->tpl_vars['mess']->value=="error"){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tmess']->value;?>
</font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="">
 <div id="list">
 <div id="deal_menu">
    	<ul>
        	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tables']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
            
				<li <?php if ($_smarty_tpl->tpl_vars['current_table']->value==$_smarty_tpl->tpl_vars['key']->value){?>class="deal_current"<?php }else{ ?>class="deal_menu"<?php }?>><a href="?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&current=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['value']->value[0];?>
</a></li>
            
			<?php } ?>
        </ul>
    </div>
 <div class="clear"></div>
<div id="content" class="show"> 
<?php if (!$_smarty_tpl->tpl_vars['recycle']->value){?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#cdcdcd">
  <tr>
	<td bgcolor="#F2F2F2"><div align="center"><strong  style="color:red">空回收站</strong></div></td>
    </tr>
</table>
<?php }else{ ?>

	
    	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#cdcdcd">
  <tr>
    <td width="5%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="全选"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="反选"></div></td>
          <td><div align="center"><input type="button" id="noall" value="全否"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="45%" bgcolor="#EAEAEA"><div align="center"><strong>名称</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['recycle']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['var']->key;
?>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php $_smarty_tpl->tpl_vars['name'] = new Smarty_variable($_smarty_tpl->tpl_vars['tables']->value[$_smarty_tpl->tpl_vars['current_table']->value][1], null, 0);?><?php echo $_smarty_tpl->tpl_vars['var']->value[$_smarty_tpl->tpl_vars['name']->value];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&current=<?php echo $_smarty_tpl->tpl_vars['current_table']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
&edit=restore">还原</a> | <a href="?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
&current=<?php echo $_smarty_tpl->tpl_vars['current_table']->value;?>
&edit=del" onClick="return confirm('确定要删除<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
吗？')">删除</a></div></td>
  </tr>
  <?php } ?>
  </table>
<?php }?>
</div>
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
          <td width="19%"> <table width="164" border="0" cellspacing="3" cellpadding="0">
            <tr>
           <td><input type="button" name="restore" id="restore" class="admin_button" value="还原"/></td>
              <td><input type="submit" name="dels" id="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除吗?')" /></td>
            </tr>
          </table></td>
          <td width="81%">
          <div align="right">共<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['row_total'];?>
条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==1){?>
          第一页
          <?php }else{ ?>
          <a href="?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&page=1&current=<?php echo $_smarty_tpl->tpl_vars['current_table']->value;?>
">第一页</a>
          <?php }?>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['prev_page']){?>
		  <a href="?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['prev_page'];?>
&current=<?php echo $_smarty_tpl->tpl_vars['current_table']->value;?>
">上一页</a>
          <?php }else{ ?>
          上一页
          <?php }?>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['next_page']){?>
            <a href="?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['next_page'];?>
&current=<?php echo $_smarty_tpl->tpl_vars['current_table']->value;?>
">下一页</a>
            <?php }else{ ?>
            下一页
           <?php }?>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==$_smarty_tpl->tpl_vars['pageinfo']->value['page_num']){?>
            最后一页
            <?php }else{ ?>
            <a href="?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['page_num'];?>
&current=<?php echo $_smarty_tpl->tpl_vars['current_table']->value;?>
">最后一页</a>
            <?php }?>
            &nbsp;&nbsp;｜&nbsp;&nbsp;当前第<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
页&nbsp;&nbsp;</div>
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