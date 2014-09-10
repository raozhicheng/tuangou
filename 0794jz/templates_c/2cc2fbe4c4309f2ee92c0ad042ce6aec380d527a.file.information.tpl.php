<?php /* Smarty version Smarty-3.1.11, created on 2014-09-10 09:16:25
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/information.tpl" */ ?>
<?php /*%%SmartyHeaderCode:434772351540fa669a94c87-47868185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cc2fbe4c4309f2ee92c0ad042ce6aec380d527a' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/information.tpl',
      1 => 1377784300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '434772351540fa669a94c87-47868185',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Web_info' => 0,
    'stylePath' => 0,
    'appName' => 0,
    'default_url' => 0,
    'status_class' => 0,
    'mess' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_540fa669af22d7_18548313',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540fa669af22d7_18548313')) {function content_540fa669af22d7_18548313($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_set')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.set.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"SITE_TITLE");?>
</title>
<meta name="description" content="<?php echo smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"SITE_DESCRIPTION");?>
">
<meta name="keywords" content="<?php echo smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"SITE_KEYWORD");?>
">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/favicon.ico" />
<meta name="author" content="<?php echo $_smarty_tpl->tpl_vars['appName']->value;?>
" />
<meta name="copyright" content="leesuntech.com" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/global.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/header.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/footer.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/information.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/font.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/script.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/jquery.pngfix.js"></script>
<script language="JavaScript">
<!--
var seconds = 5;
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
</head>

<body>
<div class="body_area">
      <div class="information">
      	  <div class="box_t"></div>
          <div class="box_m">
			  <div class="mess_bg">
              	 <div class="mess">
                 	<div <?php if ($_smarty_tpl->tpl_vars['status_class']->value=="status_success"){?>class="success_sign"<?php }else{ ?>class="error_sign"<?php }?>></div>
                    <div <?php if ($_smarty_tpl->tpl_vars['status_class']->value=="status_success"){?>class="success_content"<?php }else{ ?>class="error_content"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mess']->value;?>
<span id="spanSeconds">5</span></div>
                 </div>
              </div>
          </div>
          <div class="box_b"></div>
      </div>
      <div class="copyright red_l f14">
        	<?php echo smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"SITE_FOOTER");?>

      </div>
</div>

</body>

</html>
<?php }} ?>