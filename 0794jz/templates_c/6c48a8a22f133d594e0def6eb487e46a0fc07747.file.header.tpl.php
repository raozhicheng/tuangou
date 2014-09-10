<?php /* Smarty version Smarty-3.1.11, created on 2014-08-20 16:18:21
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194492874653f459cd4a60f3-59094282%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '194492874653f459cd4a60f3-59094282',
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
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53f459cd4fed69_61527825',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f459cd4fed69_61527825')) {function content_53f459cd4fed69_61527825($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_set')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.set.php';
if (!is_callable('smarty_modifier_name')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php';
if (!is_callable('smarty_block_city')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.city.php';
if (!is_callable('smarty_block_nav')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.nav.php';
if (!is_callable('smarty_block_dealCate')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.dealCate.php';
if (!is_callable('smarty_block_adv')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.adv.php';
?><div id="top">
	<div id="top_area">
    	<div id="logo"><img src="<?php echo smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"SITE_LOGO");?>
" /></div>
        <!-- <div id="line"><img src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/images/line.png" /></div> -->
        <div id="right">
        	<div id="buttons_area">
            
            <?php if ($_smarty_tpl->tpl_vars['user']->value){?>
            	欢迎你&nbsp;<?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
&nbsp;&nbsp;&nbsp;<span class="white_l"><a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"member");?>
">会员中心</a></span>&nbsp;&nbsp;&nbsp;<span class="red_l"><a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"logout");?>
">[退出]</a></span>
            <?php }else{ ?>
            	<div class="button white_l"><a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"login");?>
">登陆</a></div>
                <div class="button white_l"><a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"register");?>
">注册</a></div>
            <?php }?>
            
            </div>
            <div class="clear"></div>
<!--             <div id="text_area" class="f12 white_l"><a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"subscribe_mail");?>
">订阅最新团购</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"coupon_verify");?>
">验证消费券</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"cart");?>
">购物车</a></div>
            <div id="subscription">
            	<div class="box"><input name="subscription" type="text" /></div>
                <div class="sub_button"><input name="subscribe" id="subscribe" type="submit" value="免费订阅"/></div>
            </div>
            <div id="city" class="white_l"><a href="Javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['current_city']->value['name'];?>
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
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('nav', array('name'=>"list")); $_block_repeat=true; echo smarty_block_nav(array('name'=>"list"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['list']->value['link'];?>
" <?php if ($_smarty_tpl->tpl_vars['list']->value['is_newWindow']){?>target="_blank"<?php }?> <?php if ($_smarty_tpl->tpl_vars['list']->value['current']){?> class="nav_current" <?php }else{ ?>class="nav_normal"<?php }?>><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</a></li>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_nav(array('name'=>"list"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </div>
                
            </div>
        </div> 
    </div>
</div>


<div class="body_area">
<div id="cate_bg">
    	<span><h2 class="black_n">分类：</h2></span>
    	<ul class="f12">
        	
        	<?php $_smarty_tpl->smarty->_tag_stack[] = array('dealCate', array('name'=>"list",'num'=>"8")); $_block_repeat=true; echo smarty_block_dealCate(array('name'=>"list",'num'=>"8"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <li <?php if ($_smarty_tpl->tpl_vars['list']->value['current']){?>class="selected"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['list']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</a></li>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_dealCate(array('name'=>"list",'num'=>"8"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            
        </ul>
    </div>
<!--     <div class="ad_box">
    	<?php $_smarty_tpl->smarty->_tag_stack[] = array('adv', array('name'=>"row",'id'=>"6")); $_block_repeat=true; echo smarty_block_adv(array('name'=>"row",'id'=>"6"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        	<?php echo $_smarty_tpl->tpl_vars['row']->value['code'];?>

        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_adv(array('name'=>"row",'id'=>"6"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <div class="clear"></div>
    </div> -->
</div><?php }} ?>