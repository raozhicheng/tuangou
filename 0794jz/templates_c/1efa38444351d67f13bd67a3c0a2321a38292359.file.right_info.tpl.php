<?php /* Smarty version Smarty-3.1.11, created on 2014-08-20 16:18:21
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/right_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197923183053f459cd539909-44552614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1efa38444351d67f13bd67a3c0a2321a38292359' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/right_info.tpl',
      1 => 1394374906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197923183053f459cd539909-44552614',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current_city' => 1,
    'Web_link' => 0,
    'info' => 1,
    'side_deal_tag' => 0,
    'side_deal_num' => 0,
    'deal_info' => 0,
    'list' => 1,
    'message_num' => 1,
    'Web_info' => 1,
    'qq' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53f459cd5954b2_01412823',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f459cd5954b2_01412823')) {function content_53f459cd5954b2_01412823($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_name')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php';
if (!is_callable('smarty_block_info')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.info.php';
if (!is_callable('smarty_modifier_date_format')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_block_deal')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.deal.php';
if (!is_callable('smarty_modifier_truncate')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_block_message')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.message.php';
if (!is_callable('smarty_modifier_set')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.set.php';
?>		<div class="right_box">
        	<div class="city_notice">
        		<?php echo $_smarty_tpl->tpl_vars['current_city']->value['notice'];?>

            </div>
        </div>
        <div class="line"></div>
        <div class="right_box">
            	<div class="title">
                	<span class="right_icon_info left"></span>
                    <span class="f12b red_n left">公告信息</span>
                    <span class="f12 red_l right"><a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"infos",21);?>
">更多...</a></span>
                </div>
                <div class="content">
                	<ul>
                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('info', array('name'=>"info",'num'=>"6",'cate_id'=>"21",'title_len'=>"20")); $_block_repeat=true; echo smarty_block_info(array('name'=>"info",'num'=>"6",'cate_id'=>"21",'title_len'=>"20"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        	<li class="f12 red_l"><a href="<?php echo $_smarty_tpl->tpl_vars['info']->value['link'];?>
">&middot;&nbsp;<?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
&nbsp;&nbsp;&nbsp;&nbsp;</a><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['info']->value['update_time'],"%Y-%m-%d");?>
</li>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_info(array('name'=>"info",'num'=>"6",'cate_id'=>"21",'title_len'=>"20"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    </ul>
                </div>
            	<div class="clear"></div>
            </div>
            
            <div class="line"></div>
            
           
            
            <?php if ($_smarty_tpl->tpl_vars['side_deal_tag']->value){?>
            <div class="right_box">
            	<div class="title">
                	<span class="right_icon_pay left"></span>
                    <span class="f12b red_n left">您还可以团购</span>
                </div>
                <div class="content" id="side_deal">
                   <?php $_smarty_tpl->smarty->_tag_stack[] = array('deal', array('name'=>"deal_info",'num'=>$_smarty_tpl->tpl_vars['side_deal_num']->value)); $_block_repeat=true; echo smarty_block_deal(array('name'=>"deal_info",'num'=>$_smarty_tpl->tpl_vars['side_deal_num']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                       <dl class="black_l"><dt><a href="<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['link'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['img'];?>
"/></a></dt><dd><a href="<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['link'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['deal_info']->value['name'],18,"...");?>
</a></dd></dl>
                   <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_deal(array('name'=>"deal_info",'num'=>$_smarty_tpl->tpl_vars['side_deal_num']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </div>
            	<div class="clear"></div>
            </div>
            <div class="line"></div>
            <?php }?>
            
             <div class="right_box">
            	<div class="title">
                	<span class="right_icon_qa left"></span>
                    <span class="f12b red_n left">问题答疑</span>
                </div>
                
                <div class="content">
                	<ul class="f12">
                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('message', array('name'=>"list",'title_len'=>"18",'group_id'=>"5",'num'=>"5")); $_block_repeat=true; echo smarty_block_message(array('name'=>"list",'title_len'=>"18",'group_id'=>"5",'num'=>"5"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        	<li class="grey_n">&middot;&nbsp;<?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['update_time'],"%Y-%m-%d");?>
</li>
                            <?php $_smarty_tpl->tpl_vars['message_num'] = new Smarty_variable($_smarty_tpl->tpl_vars['message_num']->value, true, 0);?>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_message(array('name'=>"list",'title_len'=>"18",'group_id'=>"5",'num'=>"5"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                        <li class="red_l"><a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"question",5);?>
">所有答疑(<?php echo $_smarty_tpl->tpl_vars['message_num']->value;?>
)</a></li>
                        <?php $_smarty_tpl->tpl_vars['qq'] = new Smarty_variable(smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"ONLINE_QQ"), true, 0);?>
                        <li style="border-top:1px dotted #ccc;line-height:36px;">在线客服：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $_smarty_tpl->tpl_vars['qq']->value[0];?>
&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $_smarty_tpl->tpl_vars['qq']->value[0];?>
:51" alt="在线客服" title="在线客服"/></a><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $_smarty_tpl->tpl_vars['qq']->value[1];?>
&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $_smarty_tpl->tpl_vars['qq']->value[1];?>
:51" alt="在线客服" title="在线客服"/></a></li>
                        <li style="border-top:1px dotted #ccc;line-height:36px;">工作时间：<span class="red_n"><?php echo smarty_modifier_set($_smarty_tpl->tpl_vars['Web_info']->value,"ONLINE_TIME");?>
</span></li>
                    </ul>
                </div>
                
            	<div class="clear"></div>
            </div>
            
            <div class="line"></div>
            
            
			<div class="right_box">
            	<div class="title">
                	<span class="right_icon_user left"></span>
                    <span class="f12b red_n left">商务合作</span>
                </div>
                <div class="content f14 grey_n red_l">
                	如果您希望组织团购，请<a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"business");?>
">点击这里</a>提供相关信息！ 
                </div>
                <div class="clear"></div>
            </div><?php }} ?>