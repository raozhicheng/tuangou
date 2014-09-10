<?php /* Smarty version Smarty-3.1.11, created on 2014-08-20 16:17:47
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/deals.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189836426353f459aba0fee4-76001651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5236017c5f8cd48c3abe3a9df009e872dad2f992' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/deals.tpl',
      1 => 1394020244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189836426353f459aba0fee4-76001651',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Web_info' => 0,
    'stylePath' => 0,
    'appName' => 0,
    'deal_info' => 1,
    't' => 1,
    'Web_link' => 1,
    'pages' => 1,
    'deal_num' => 1,
    'p' => 1,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53f459abae7c79_36331051',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f459abae7c79_36331051')) {function content_53f459abae7c79_36331051($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_set')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.set.php';
?><?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php $_smarty = $_smarty_tpl->smarty; if (!is_callable(\'smarty_block_deal\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.deal.php\';
if (!is_callable(\'smarty_modifier_date_format\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php\';
if (!is_callable(\'smarty_modifier_replace\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.replace.php\';
if (!is_callable(\'smarty_modifier_name\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php\';
if (!is_callable(\'smarty_modifier_truncate\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.truncate.php\';
if (!is_callable(\'smarty_modifier_type\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.type.php\';
?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
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
/css/deal.css" rel="stylesheet" type="text/css" />
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
        
        <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php $_smarty_tpl->smarty->_tag_stack[] = array(\'deal\', array(\'name\'=>"deal_info")); $_block_repeat=true; echo smarty_block_deal(array(\'name\'=>"deal_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

        	<div class="deal_list_box">
            	<div class="calendar_box">
                	<div class="calendar">
                        <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==0){?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                            <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php $_smarty_tpl->tpl_vars[\'t\'] = new Smarty_variable($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'begin_time\'], true, 0);?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                        <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }else{ ?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                            <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'end_time\']>0){?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                                <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php $_smarty_tpl->tpl_vars[\'t\'] = new Smarty_variable($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'end_time\'], true, 0);?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                            <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }else{ ?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                                <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php $_smarty_tpl->tpl_vars[\'t\'] = new Smarty_variable("永不过期", true, 0);?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                            <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                        <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                        <div class="date"><?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php if ($_smarty_tpl->tpl_vars[\'t\']->value>0){?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars[\'t\']->value,\'%Y-%m-%d\');?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }else{ ?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'t\']->value;?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
</div>
                        <div class="day"><?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php if ($_smarty_tpl->tpl_vars[\'t\']->value>0){?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars[\'t\']->value,\'%d\');?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
</div>
                        <div class="week"><?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php if ($_smarty_tpl->tpl_vars[\'t\']->value>0){?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_date_format($_smarty_tpl->tpl_vars[\'t\']->value,\'%A\'),"Monday","星期一"),"Tuesday","星期二"),"Wednesday","星期三"),"Thursday","星期四"),"Friday","星期五"),"Saturday","星期六"),"Sunday","星期日");?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
</div>
                    </div>
                    <div class="deal_success_num">
                		共<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_count\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
人购买
                	</div>
                </div>
                
                <div class="imgs">
                	<div class="preview">
                    	<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'img\']){?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                    	<a href="<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'link\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
"><img src="<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'img\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
"/></a>
                        <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }else{ ?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                        <div class="no_pic"></div>
                        <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                        <div <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==2){?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
class="sold_out"<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }elseif($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==1){?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
class="in_sale"<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
></div>
                    </div>
                    <div class="buttons">
                    	<div class="shade">
                        	<ul>
                            	<li class="txt"><a href="<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'link\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
">查看详情</a></li>
                                <li class="split_line"></li>
                                <li class="txt"><a href="<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars[\'Web_link\']->value,"deal_order");?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
">查看评论</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="intro">
                	<div class="tit red_l"><a href="<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'link\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
"><?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'name\'],22,"...",true);?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
</a></div>
                    <div class="content"><?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'brief\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
</div>
                    <div class="price">原价：&yen;<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'origin_price\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
&nbsp;&nbsp;&nbsp;&nbsp;现价：&yen;<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'current_price\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
&nbsp;&nbsp;&nbsp;&nbsp;折扣：<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'discount\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
折
                    </div>
                    <div class="save">节省：&yen;<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'save_price\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
</div>
                </div>
            </div>
            <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php $_smarty_tpl->tpl_vars[\'p\'] = new Smarty_variable(smarty_modifier_type($_smarty_tpl->tpl_vars[\'pages\']->value,"deal",$_smarty_tpl->tpl_vars[\'deal_num\']->value), true, 0);?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

          <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_deal(array(\'name\'=>"deal_info"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

          
          <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value){?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

          <div class="pages">
                	<ul>
                    	<li>共有<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'row_total\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
条记录</li>
                        <li>
                        	<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'current_page\']==1){?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                              第一页
                              <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }else{ ?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                              <a href="<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'current_page_url\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
">第一页</a>
                              <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                        </li>
                        <li>
                        	 <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'prev_page\']){?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                             <a href="<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'prev_page_url\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
">上一页</a>
                             <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }else{ ?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
上一页<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                        </li>
                        <li>
                        	<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'next_page\']){?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                            <a href="<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'next_page_url\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
">下一页</a>
                            <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }else{ ?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
下一页<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                        </li>
                        <li>
                        	<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'current_page\']==$_smarty_tpl->tpl_vars[\'p\']->value[\'page_num\']){?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                            最后一页
                            <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }else{ ?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                            <a href="<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'page_end_url\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
">最后一页</a>
                            <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

                        </li>
                        <li>当前第<?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'current_page\'];?>
/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>
页</li>
                    </ul>
                </div>
          <?php echo '/*%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/<?php }?>/*/%%SmartyNocache:189836426353f459aba0fee4-76001651%%*/';?>

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