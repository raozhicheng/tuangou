<?php /* Smarty version Smarty-3.1.11, created on 2014-08-20 16:17:55
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/infos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179895991253f459b3306628-20695834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32787a79eec5032d4b57a9d52cdaa78203c4efa0' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/infos.tpl',
      1 => 1377783846,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179895991253f459b3306628-20695834',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Web_info' => 0,
    'stylePath' => 0,
    'appName' => 0,
    'cate_id' => 1,
    'infocate' => 1,
    'info' => 1,
    'pages' => 1,
    'info_num' => 1,
    'p' => 1,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53f459b3383519_24636647',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f459b3383519_24636647')) {function content_53f459b3383519_24636647($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_set')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.set.php';
?><?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php $_smarty = $_smarty_tpl->smarty; if (!is_callable(\'smarty_block_infoCate\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.infoCate.php\';
if (!is_callable(\'smarty_block_info\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.info.php\';
if (!is_callable(\'smarty_modifier_date_format\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php\';
if (!is_callable(\'smarty_modifier_type\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.type.php\';
?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
/css/common.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/info.css" rel="stylesheet" type="text/css" />
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
</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
       	  
          <div class="infos">
          	<ul>
            <li class="tit"><?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php $_smarty_tpl->smarty->_tag_stack[] = array(\'infoCate\', array(\'name\'=>"infocate",\'id\'=>$_smarty_tpl->tpl_vars[\'cate_id\']->value)); $_block_repeat=true; echo smarty_block_infoCate(array(\'name\'=>"infocate",\'id\'=>$_smarty_tpl->tpl_vars[\'cate_id\']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php echo $_smarty_tpl->tpl_vars[\'infocate\']->value[\'name\'];?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_infoCate(array(\'name\'=>"infocate",\'id\'=>$_smarty_tpl->tpl_vars[\'cate_id\']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
</li>
            <?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php $_smarty_tpl->smarty->_tag_stack[] = array(\'info\', array(\'name\'=>"info",\'title_len\'=>"70",\'cate_id\'=>$_smarty_tpl->tpl_vars[\'cate_id\']->value)); $_block_repeat=true; echo smarty_block_info(array(\'name\'=>"info",\'title_len\'=>"70",\'cate_id\'=>$_smarty_tpl->tpl_vars[\'cate_id\']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

            	<li><a href="<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php echo $_smarty_tpl->tpl_vars[\'info\']->value[\'link\'];?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
">·&nbsp;&nbsp;<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php echo $_smarty_tpl->tpl_vars[\'info\']->value[\'title\'];?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars[\'info\']->value[\'update_time\'],"%Y-%m-%d");?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
</a></li>
                <?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php $_smarty_tpl->tpl_vars[\'p\'] = new Smarty_variable(smarty_modifier_type($_smarty_tpl->tpl_vars[\'pages\']->value,"other",$_smarty_tpl->tpl_vars[\'info_num\']->value), true, 0);?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

            <?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_info(array(\'name\'=>"info",\'title_len\'=>"70",\'cate_id\'=>$_smarty_tpl->tpl_vars[\'cate_id\']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

            </ul>
          </div>
          
          <?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value){?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

          <div class="pages">
                	<ul>
                    	<li>共有<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'row_total\'];?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
条记录</li>
                        <li>
                        	<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'current_page\']==1){?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

                              第一页
                              <?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php }else{ ?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

                              <a href="<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'current_page_url\'];?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
">第一页</a>
                              <?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php }?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

                        </li>
                        <li>
                        	 <?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'prev_page\']){?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

                             <a href="<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'prev_page_url\'];?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
">上一页</a>
                             <?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php }else{ ?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
上一页<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php }?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

                        </li>
                        <li>
                        	<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'next_page\']){?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

                            <a href="<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'next_page_url\'];?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
">下一页</a>
                            <?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php }else{ ?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
下一页<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php }?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

                        </li>
                        <li>
                        	<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'current_page\']==$_smarty_tpl->tpl_vars[\'p\']->value[\'page_num\']){?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

                            最后一页
                            <?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php }else{ ?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

                            <a href="<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'page_end_url\'];?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
">最后一页</a>
                            <?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php }?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

                        </li>
                        <li>当前第<?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'current_page\'];?>
/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>
页</li>
                    </ul>
                </div>
          <?php echo '/*%%SmartyNocache:179895991253f459b3306628-20695834%%*/<?php }?>/*/%%SmartyNocache:179895991253f459b3306628-20695834%%*/';?>

          
          
        </div>
        <div class="c_right">
        	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/inc/right_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

        </div>
        <div class="clear"></div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


</body>

</html>
<?php }} ?>