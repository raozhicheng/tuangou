<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:25:03
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/common/information.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175038352153fd87cf368f91-29998318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '932afe2b23d3bf4d380f367b3c9cebd0935be78e' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/common/information.tpl',
      1 => 1354809384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175038352153fd87cf368f91-29998318',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ur_here' => 0,
    'status_class' => 0,
    'msg_detail' => 0,
    'auto_redirect' => 0,
    'seconds' => 0,
    'links' => 0,
    'value' => 0,
    'default_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd87cf427246_76919787',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd87cf427246_76919787')) {function content_53fd87cf427246_76919787($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<div id="location"><strong><span style="color:red">·乐尚管理后台</span>-<?php echo $_smarty_tpl->tpl_vars['ur_here']->value;?>
</strong></div>
<div id="list" <?php if ($_smarty_tpl->tpl_vars['status_class']->value=="mess_status_right"){?>style="background-color:#feffe8;border:solid 1px #ccd23b;height:190px;"<?php }else{ ?>style="background-color:#fff5db;border:solid 1px #ffd05f;height:190px;"<?php }?>>
	<div <?php if ($_smarty_tpl->tpl_vars['status_class']->value=="mess_status_right"){?>id="mess_title_right"<?php }else{ ?>id="mess_title_error"<?php }?>>&nbsp;·<?php echo $_smarty_tpl->tpl_vars['msg_detail']->value;?>
</div>
    <div id="<?php echo $_smarty_tpl->tpl_vars['status_class']->value;?>
"></div>
    <div id="right">
    	<div id="redirection">
    		<?php if ($_smarty_tpl->tpl_vars['auto_redirect']->value){?>
        	·如果您不做出选择，将在
        	<span id="spanSeconds"><?php echo $_smarty_tpl->tpl_vars['seconds']->value;?>
</span>
         	秒后跳转到第一个链接地址。
         	<?php }?>
    	</div>
    	<div id="point_line"></div>
        <div id="links">
        	<ul>
            	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['links']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
				<li><img src="images/return.gif">&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['value']->value['href'];?>
" <?php if ($_smarty_tpl->tpl_vars['value']->value['target']){?> target="<?php echo $_smarty_tpl->tpl_vars['value']->value['target'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value['text'];?>
</a></li>
				<?php } ?>
            </ul>
        </div>
    </div>
</div>
<?php if ($_smarty_tpl->tpl_vars['auto_redirect']->value){?>
<script language="JavaScript">
<!--
var seconds = <?php echo $_smarty_tpl->tpl_vars['seconds']->value;?>
;
var defaultUrl = "<?php echo $_smarty_tpl->tpl_vars['default_url']->value;?>
";


onload = function()
{
  if (defaultUrl == 'javascript:history.go(-1)' && window.history.length == 0)
  {
    document.getElementById('redirectionMsg').innerHTML = '';
    return;
  }

  window.setInterval(redirection, 1000);
}
function redirection()
{
  if (seconds <= 0)
  {
    window.clearInterval();
    return;
  }

  seconds --;
  document.getElementById('spanSeconds').innerHTML = seconds;

  if (seconds == 0)
  {
    window.clearInterval();
    location.href = defaultUrl;
  }
}
//-->
</script>

<?php }?>
</body>
</html><?php }} ?>