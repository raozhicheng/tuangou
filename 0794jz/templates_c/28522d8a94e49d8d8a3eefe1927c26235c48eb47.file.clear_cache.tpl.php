<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:23:52
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/sys_config/clear_cache.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26988353153fd8788405df7-03871510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28522d8a94e49d8d8a3eefe1927c26235c48eb47' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/sys_config/clear_cache.tpl',
      1 => 1364305630,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26988353153fd8788405df7-03871510',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mess' => 0,
    'tmess' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd878842e442_42313307',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd878842e442_42313307')) {function content_53fd878842e442_42313307($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript"> 
$(document).ready(function()
{
	$("#clear").click(function () {
		if($("input[type='checkbox']").is(':checked')){
				$("#list").hide();
				$("#hide").show();	
				return true;
		} else {
			alert("请选择缓存种类");
			return false;
		}
	});
});
</script>
<body>
<div id="location"><strong>·清除缓存</strong></div>
	<div id="warning" <?php if ($_smarty_tpl->tpl_vars['mess']->value=="error"){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tmess']->value;?>
</font></div>
</div>
<form method="post" action="main.php?act=do_clearCache">
<div id="list">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#EAEAEA">
<tr>
          <td height="45" align="center" bgcolor="#F5F5F5" ><label ><input  type="checkbox" checked="checked" value="datacache" name="type[]" />
        数据缓存</label> <label >
        <input id="tplcache" type="checkbox"   value="tplcache" name="type[]" checked="checked"  />
       模板缓存</label></td>
        </tr>
  </table>
  
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
              <td><input type="submit" name="clear" id="clear" class="admin_button" value="清除"/></td>
            </tr>
          </table></td>
         
        </tr>
      </table>
      <div align="center"></div></td>
    </tr>
</table>
</form>
</div>
<div id="hide" style="display: none;" class="waiting">
 <table width="200" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td> 正在清除缓存.......</td>
    <td> <img src="images/loading.gif"></td>
  </tr>
</table>
</div>
</body>
</html>
<?php }} ?>