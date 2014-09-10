<?php /* Smarty version Smarty-3.1.11, created on 2014-08-20 16:17:57
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71634282253f459b56138a1-52789648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b1994674bbc1748885b70a8c76f53f65e3da90c' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/message.tpl',
      1 => 1408329203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71634282253f459b56138a1-52789648',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Web_info' => 0,
    'stylePath' => 0,
    'appName' => 0,
    'mg_info' => 1,
    'row' => 1,
    'list' => 1,
    'pages' => 1,
    'message_num' => 1,
    'p' => 1,
    'user' => 1,
    'Web_link' => 1,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53f459b56d9373_19323849',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f459b56d9373_19323849')) {function content_53f459b56d9373_19323849($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_set')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.set.php';
?><?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php $_smarty = $_smarty_tpl->smarty; if (!is_callable(\'smarty_block_messageGroup\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.messageGroup.php\';
if (!is_callable(\'smarty_block_message\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.message.php\';
if (!is_callable(\'smarty_modifier_date_format\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php\';
if (!is_callable(\'smarty_modifier_type\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.type.php\';
if (!is_callable(\'smarty_modifier_name\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php\';
?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
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
/css/message.css" rel="stylesheet" type="text/css" />
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
<script type="text/javascript">
	$(document).ready(function(){
		$("#add_message").bind("submit",function(){
			var msg = $.trim(($("#add_message").find("textarea[name='content']").val()));
			var title = $.trim(($("#add_message").find("input[name='title']").val()));
			if(msg == '' || title=='')
			{
				alert("留言与标题内容不能为空");
				return false;
			}
			
		});
	});
</script>
</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
          <div class="message">
          	<div class="tit">
            	<ul>
                	
                	<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php $_smarty_tpl->smarty->_tag_stack[] = array(\'messageGroup\', array(\'name\'=>"row",\'num\'=>"6",\'preset\'=>$_smarty_tpl->tpl_vars[\'mg_info\']->value[\'preset\'])); $_block_repeat=true; echo smarty_block_messageGroup(array(\'name\'=>"row",\'num\'=>"6",\'preset\'=>$_smarty_tpl->tpl_vars[\'mg_info\']->value[\'preset\']), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                		<li <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php if ($_smarty_tpl->tpl_vars[\'row\']->value[\'current\']==1){?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
class="cur"<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
><a href="<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo $_smarty_tpl->tpl_vars[\'row\']->value[\'link\'];?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
"><?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo $_smarty_tpl->tpl_vars[\'row\']->value[\'show_name\'];?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
</a></li>
                    <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_messageGroup(array(\'name\'=>"row",\'num\'=>"6",\'preset\'=>$_smarty_tpl->tpl_vars[\'mg_info\']->value[\'preset\']), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                    
                </ul>
            </div>
            <div class="content">
            	
                	<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php $_smarty_tpl->smarty->_tag_stack[] = array(\'message\', array(\'name\'=>"list",\'title_len\'=>"30")); $_block_repeat=true; echo smarty_block_message(array(\'name\'=>"list",\'title_len\'=>"30"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                        <div class="mess_box">
                        	<ul>
                            	<li class="title"><b class="grey_n">标题：</b><?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo $_smarty_tpl->tpl_vars[\'list\']->value[\'title\'];?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="grey_n">时间：</b><?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars[\'list\']->value[\'update_time\'],"%Y-%m-%d %H:%M:%S");?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="grey_n">用户：</b><?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo $_smarty_tpl->tpl_vars[\'list\']->value[\'username\'];?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
</li>
                                <li class="con"><b class="grey_n">留言内容：</b><?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo $_smarty_tpl->tpl_vars[\'list\']->value[\'content\'];?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
</li>
                                <li class="reply"><b class="grey_n">回复内容：</b><?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php if ($_smarty_tpl->tpl_vars[\'list\']->value[\'admin_reply\']){?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo preg_replace(\'!<[^>]*?>!\', \' \', $_smarty_tpl->tpl_vars[\'list\']->value[\'admin_reply\']);?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }else{ ?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
暂无回复<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
</li>
                                
                            </ul>
                        </div>
                        <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php $_smarty_tpl->tpl_vars[\'p\'] = new Smarty_variable(smarty_modifier_type($_smarty_tpl->tpl_vars[\'pages\']->value,"other",$_smarty_tpl->tpl_vars[\'message_num\']->value), true, 0);?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                    <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_message(array(\'name\'=>"list",\'title_len\'=>"30"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                    <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value){?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                      <div class="pages">
                                <ul>
                                    <li>共有<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'row_total\'];?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
条记录</li>
                                    <li>
                                        <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'current_page\']==1){?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                                          第一页
                                          <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }else{ ?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                                          <a href="<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'current_page_url\'];?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
">第一页</a>
                                          <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                                    </li>
                                    <li>
                                         <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'prev_page\']){?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                                         <a href="<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'prev_page_url\'];?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
">上一页</a>
                                         <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }else{ ?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
上一页<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                                    </li>
                                    <li>
                                        <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'next_page\']){?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                                        <a href="<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'next_page_url\'];?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
">下一页</a>
                                        <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }else{ ?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
下一页<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                                    </li>
                                    <li>
                                        <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'current_page\']==$_smarty_tpl->tpl_vars[\'p\']->value[\'page_num\']){?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                                        最后一页
                                        <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }else{ ?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                                        <a href="<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'page_end_url\'];?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
">最后一页</a>
                                        <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                                    </li>
                                    <li>当前第<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'current_page\'];?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
页</li>
                                </ul>
                            </div>
                      <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                
            </div>
            <div class="message_form red_l">
            	
            	<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php if ($_smarty_tpl->tpl_vars[\'user\']->value){?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                <form method="post" id="add_message" action="<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars[\'Web_link\']->value,"message");?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
&act=add" name="message" >
                	<ul>
                    	<li>标题：<input type="text" value="" name="title" style="width:200px;"></li>
                    	<li>内容：<textarea name="content" rows="8" cols="80"></textarea></li>
                        <input type="hidden" value="<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo $_smarty_tpl->tpl_vars[\'mg_info\']->value[\'id\'];?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
" name="group_id">
                        <input type="hidden" value="<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo $_smarty_tpl->tpl_vars[\'mg_info\']->value[\'is_member\'];?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
" name="is_member">
                        <li style="margin-left:40px;"><input type="submit" class="formbutton" name="commit" value="提交"></li>
                    </ul>
                 </form>
                <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }else{ ?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                	您还未&nbsp;&nbsp;<a href="<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars[\'Web_link\']->value,"login");?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
">登陆</a>&nbsp;&nbsp;或&nbsp;&nbsp;<a href="<?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars[\'Web_link\']->value,"register");?>
/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>
">注册</a>，不能发表留言！
                <?php echo '/*%%SmartyNocache:71634282253f459b56138a1-52789648%%*/<?php }?>/*/%%SmartyNocache:71634282253f459b56138a1-52789648%%*/';?>

                
            </div>
         </div>
          
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