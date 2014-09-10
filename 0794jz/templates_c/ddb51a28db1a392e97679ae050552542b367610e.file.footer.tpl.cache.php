<?php /* Smarty version Smarty-3.1.11, created on 2014-08-20 15:57:44
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165546638453f454f8a14d25-50646179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddb51a28db1a392e97679ae050552542b367610e' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/footer.tpl',
      1 => 1408497067,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165546638453f454f8a14d25-50646179',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'Web_info' => 0,
    'infocate' => 0,
    'info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53f454f8a33127_56208015',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f454f8a33127_56208015')) {function content_53f454f8a33127_56208015($_smarty_tpl) {?><?php if (!is_callable('smarty_block_link')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.link.php';
if (!is_callable('smarty_modifier_set')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.set.php';
if (!is_callable('smarty_block_infoCate')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.infoCate.php';
if (!is_callable('smarty_block_info')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.info.php';
?><div id="links">
	<div class="body_area">
            <fieldset>
            <legend>”—«È¡¥Ω”</legend>
                <div class="content">
                    <ul>
                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('link', array('name'=>"row")); $_block_repeat=true; echo smarty_block_link(array('name'=>"row"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['img'];?>
" width="88" height="31"/></a></li>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_link(array('name'=>"row"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    </ul>
                </div>
                <div class="clear"></div>
            </fieldset>
	</div>
</div>
        
<div id="bottom">
	<div class="body_area">
        <div class="infos">
        	<span class="left" style="padding:15px 10px;">
            	<img src="<?php echo smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"FOOTER_LOGO");?>
">
            </span>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('infoCate', array('name'=>"infocate",'num'=>"4",'type'=>"help")); $_block_repeat=true; echo smarty_block_infoCate(array('name'=>"infocate",'num'=>"4",'type'=>"help"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            	<span class="split_line"></span>
                <dl>
                    <dt><?php echo $_smarty_tpl->tpl_vars['infocate']->value['name'];?>
</dt>
                    <dd class="f12 light_blue_l">
                    	<?php $_smarty_tpl->smarty->_tag_stack[] = array('info', array('name'=>"info",'num'=>"4",'cate_id'=>$_smarty_tpl->tpl_vars['infocate']->value['id'])); $_block_repeat=true; echo smarty_block_info(array('name'=>"info",'num'=>"4",'cate_id'=>$_smarty_tpl->tpl_vars['infocate']->value['id']), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        	<a href="<?php echo $_smarty_tpl->tpl_vars['info']->value['link'];?>
">°§&nbsp;<?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
</a><br />
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_info(array('name'=>"info",'num'=>"4",'cate_id'=>$_smarty_tpl->tpl_vars['infocate']->value['id']), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    </dd>
                    
                </dl>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_infoCate(array('name'=>"infocate",'num'=>"4",'type'=>"help"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </div>
       	<div class="infos_bottom_line"></div>
        <div class="copyright white_l">
        	<?php echo smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"SITE_FOOTER");?>

        </div>
    </div>
</div>
<?php }} ?>