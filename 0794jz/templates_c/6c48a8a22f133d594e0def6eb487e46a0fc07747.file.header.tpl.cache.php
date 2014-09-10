<?php /* Smarty version Smarty-3.1.11, created on 2014-08-20 15:57:44
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85558526453f454f894c925-66837529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c48a8a22f133d594e0def6eb487e46a0fc07747' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/header.tpl',
      1 => 1405837583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85558526453f454f894c925-66837529',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Web_info' => 0,
    'stylePath' => 0,
    'user' => 1,
    'Web_link' => 0,
    'current_city' => 1,
    'list' => 1,
    'row' => 0,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53f454f89a9d54_60042258',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f454f89a9d54_60042258')) {function content_53f454f89a9d54_60042258($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_set')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.set.php';
if (!is_callable('smarty_modifier_name')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php';
if (!is_callable('smarty_block_city')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.city.php';
if (!is_callable('smarty_block_adv')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.adv.php';
?><?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php $_smarty = $_smarty_tpl->smarty; if (!is_callable(\'smarty_modifier_name\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php\';
if (!is_callable(\'smarty_block_nav\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.nav.php\';
if (!is_callable(\'smarty_block_dealCate\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.dealCate.php\';
?>/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
<div id="top">
	<div id="top_area">
    	<div id="logo"><img src="<?php echo smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"SITE_LOGO");?>
" /></div>
        <!-- <div id="line"><img src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/images/line.png" /></div> -->
        <div id="right">
        	<div id="buttons_area">
            
            <?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php if ($_smarty_tpl->tpl_vars[\'user\']->value){?>/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>

            	欢迎你&nbsp;<?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php echo $_smarty_tpl->tpl_vars[\'user\']->value[\'user_name\'];?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
&nbsp;&nbsp;&nbsp;<span class="white_l"><a href="<?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars[\'Web_link\']->value,"member");?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
">会员中心</a></span>&nbsp;&nbsp;&nbsp;<span class="red_l"><a href="<?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars[\'Web_link\']->value,"logout");?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
">[退出]</a></span>
            <?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php }else{ ?>/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>

            	<div class="button white_l"><a href="<?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars[\'Web_link\']->value,"login");?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
">登陆</a></div>
                <div class="button white_l"><a href="<?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars[\'Web_link\']->value,"register");?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
">注册</a></div>
            <?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php }?>/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>

            
            </div>
            <div class="clear"></div>
<!--             <div id="text_area" class="f12 white_l"><a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"subscribe_mail");?>
">订阅最新团购</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"coupon_verify");?>
">验证消费券</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars[\'Web_link\']->value,"cart");?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
">购物车</a></div>
            <div id="subscription">
            	<div class="box"><input name="subscription" type="text" /></div>
                <div class="sub_button"><input name="subscribe" id="subscribe" type="submit" value="免费订阅"/></div>
            </div>
            <div id="city" class="white_l"><a href="Javascript:void(0)"><?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php echo $_smarty_tpl->tpl_vars[\'current_city\']->value[\'name\'];?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
</a>
            	<div class="city_box white_l">
                	<?php $_smarty_tpl->smarty->_tag_stack[] = array('city', array('name'=>"list")); $_block_repeat=true; echo smarty_block_city(array('name'=>"list"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                       	<li><a href="index.php?city=<?php echo $_smarty_tpl->tpl_vars['list']->value['uname'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</a></li>
					<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_city(array('name'=>"list"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </div>
            </div>
            <div id="tel_logo"></div>
            <div id="tel_num"><?php echo smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"SITE_TEL");?>
</div> -->
            <div id="menu_bg">
                
                <div id="nav">
                <?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php $_smarty_tpl->smarty->_tag_stack[] = array(\'nav\', array(\'name\'=>"list")); $_block_repeat=true; echo smarty_block_nav(array(\'name\'=>"list"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>

                    <li><a href="<?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php echo $_smarty_tpl->tpl_vars[\'list\']->value[\'link\'];?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
" <?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php if ($_smarty_tpl->tpl_vars[\'list\']->value[\'is_newWindow\']){?>/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
target="_blank"<?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php }?>/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
 <?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php if ($_smarty_tpl->tpl_vars[\'list\']->value[\'current\']){?>/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
 class="nav_current" <?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php }else{ ?>/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
class="nav_normal"<?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php }?>/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
><?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php echo $_smarty_tpl->tpl_vars[\'list\']->value[\'name\'];?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
</a></li>
                <?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_nav(array(\'name\'=>"list"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>

                </div>
                
            </div>
        </div> 
    </div>
</div>


<div class="body_area">
<div id="cate_bg">
    	<span><h2 class="black_n">分类：</h2></span>
    	<ul class="f12">
        	
        	<?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php $_smarty_tpl->smarty->_tag_stack[] = array(\'dealCate\', array(\'name\'=>"list",\'num\'=>"8")); $_block_repeat=true; echo smarty_block_dealCate(array(\'name\'=>"list",\'num\'=>"8"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>

                <li <?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php if ($_smarty_tpl->tpl_vars[\'list\']->value[\'current\']){?>/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
class="selected"<?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php }?>/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
><a href="<?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php echo $_smarty_tpl->tpl_vars[\'list\']->value[\'link\'];?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
"><?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php echo $_smarty_tpl->tpl_vars[\'list\']->value[\'name\'];?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>
</a></li>
            <?php echo '/*%%SmartyNocache:85558526453f454f894c925-66837529%%*/<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_dealCate(array(\'name\'=>"list",\'num\'=>"8"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/*/%%SmartyNocache:85558526453f454f894c925-66837529%%*/';?>

            
        </ul>
    </div>
<!--     <div class="ad_box">
    	<?php $_smarty_tpl->smarty->_tag_stack[] = array('adv', array('name'=>"row",'id'=>"6")); $_block_repeat=true; echo smarty_block_adv(array('name'=>"row",'id'=>"6"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        	<?php echo $_smarty_tpl->tpl_vars['row']->value['code'];?>

        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_adv(array('name'=>"row",'id'=>"6"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <div class="clear"></div>
    </div> -->
</div><?php }} ?>