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
    '6c48a8a22f133d594e0def6eb487e46a0fc07747' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/header.tpl',
      1 => 1405837583,
      2 => 'file',
    ),
    '1efa38444351d67f13bd67a3c0a2321a38292359' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/right_info.tpl',
      1 => 1394374906,
      2 => 'file',
    ),
    'ddb51a28db1a392e97679ae050552542b367610e' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/footer.tpl',
      1 => 1408497067,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189836426353f459aba0fee4-76001651',
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_540fa671df4bd0_14326002',
  'has_nocache_code' => true,
  'cache_lifetime' => 86400,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540fa671df4bd0_14326002')) {function content_540fa671df4bd0_14326002($_smarty_tpl) {?><?php $_smarty = $_smarty_tpl->smarty; if (!is_callable('smarty_block_deal')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.deal.php';
if (!is_callable('smarty_modifier_date_format')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_name')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php';
if (!is_callable('smarty_modifier_truncate')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_type')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.type.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>乐尚团购系统,国内最优秀的PHP开源团购系统</title>
<meta name="description" content="aa">
<meta name="keywords" content="aa">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="/xampp/0794jz/templates/default/favicon.ico" />
<meta name="author" content="乐尚团购CMS" />
<meta name="copyright" content="leesuntech.com" />
<link href="/xampp/0794jz/templates/default/css/global.css" rel="stylesheet" type="text/css" />
<link href="/xampp/0794jz/templates/default/css/header.css" rel="stylesheet" type="text/css" />
<link href="/xampp/0794jz/templates/default/css/footer.css" rel="stylesheet" type="text/css" />
<link href="/xampp/0794jz/templates/default/css/common.css" rel="stylesheet" type="text/css" />
<link href="/xampp/0794jz/templates/default/css/deal.css" rel="stylesheet" type="text/css" />
<link href="/xampp/0794jz/templates/default/css/font.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="/xampp/0794jz/templates/default/js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="/xampp/0794jz/templates/default/js/jquery.js"></script>
<script type="text/javascript" src="/xampp/0794jz/templates/default/js/script.js"></script>
<script type="text/javascript" src="/xampp/0794jz/templates/default/js/jquery.pngfix.js"></script>
</head>

<body>
<?php $_smarty = $_smarty_tpl->smarty; if (!is_callable('smarty_modifier_name')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php';
if (!is_callable('smarty_block_nav')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.nav.php';
if (!is_callable('smarty_block_dealCate')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.dealCate.php';
?><div id="top">
	<div id="top_area">
    	<div id="logo"><img src="/xampp/0794jz/admin/uploadFiles/ae2032bbda6523589c4b5adc8da1541a.png" /></div>
        <!-- <div id="line"><img src="/xampp/0794jz/templates/default/images/line.png" /></div> -->
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
<!--             <div id="text_area" class="f12 white_l"><a href="/xampp/0794jz/subscribe.php?act=mail&city=xdfsda">订阅最新团购</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="/xampp/0794jz/coupon.php?act=verify&city=xdfsda">验证消费券</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"cart");?>
">购物车</a></div>
            <div id="subscription">
            	<div class="box"><input name="subscription" type="text" /></div>
                <div class="sub_button"><input name="subscribe" id="subscribe" type="submit" value="免费订阅"/></div>
            </div>
            <div id="city" class="white_l"><a href="Javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['current_city']->value['name'];?>
</a>
            	<div class="city_box white_l">
                	
                       	<li><a href="index.php?city=xdfsda">石家庄</a></li>
					
                       	<li><a href="index.php?city=kobe">河北</a></li>
					
                       	<li><a href="index.php?city=taiyuan">太原市</a></li>
					
                       	<li><a href="index.php?city=xiaodian">小店</a></li>
					
                </div>
            </div>
            <div id="tel_logo"></div>
            <div id="tel_num">0351-3378551</div> -->
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
    	
        	<div><img border="0" alt="" src="http://localhost/admin/uploadFiles/40dd2729de930b06c0a5b192a0293d9f.jpg" /></div>
        
        <div class="clear"></div>
    </div> -->
</div>
<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
        
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('deal', array('name'=>"deal_info")); $_block_repeat=true; echo smarty_block_deal(array('name'=>"deal_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        	<div class="deal_list_box">
            	<div class="calendar_box">
                	<div class="calendar">
                        <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['time_status']==0){?>
                            <?php $_smarty_tpl->tpl_vars['t'] = new Smarty_variable($_smarty_tpl->tpl_vars['deal_info']->value['begin_time'], true, 0);?>
                        <?php }else{ ?>
                            <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['end_time']>0){?>
                                <?php $_smarty_tpl->tpl_vars['t'] = new Smarty_variable($_smarty_tpl->tpl_vars['deal_info']->value['end_time'], true, 0);?>
                            <?php }else{ ?>
                                <?php $_smarty_tpl->tpl_vars['t'] = new Smarty_variable("永不过期", true, 0);?>
                            <?php }?>
                        <?php }?>
                        <div class="date"><?php if ($_smarty_tpl->tpl_vars['t']->value>0){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['t']->value,'%Y-%m-%d');?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['t']->value;?>
<?php }?></div>
                        <div class="day"><?php if ($_smarty_tpl->tpl_vars['t']->value>0){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['t']->value,'%d');?>
<?php }?></div>
                        <div class="week"><?php if ($_smarty_tpl->tpl_vars['t']->value>0){?><?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_date_format($_smarty_tpl->tpl_vars['t']->value,'%A'),"Monday","星期一"),"Tuesday","星期二"),"Wednesday","星期三"),"Thursday","星期四"),"Friday","星期五"),"Saturday","星期六"),"Sunday","星期日");?>
<?php }?></div>
                    </div>
                    <div class="deal_success_num">
                		共<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['buy_count'];?>
人购买
                	</div>
                </div>
                
                <div class="imgs">
                	<div class="preview">
                    	<?php if ($_smarty_tpl->tpl_vars['deal_info']->value['img']){?>
                    	<a href="<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['link'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['img'];?>
"/></a>
                        <?php }else{ ?>
                        <div class="no_pic"></div>
                        <?php }?>
                        <div <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['buy_status']==2){?>class="sold_out"<?php }elseif($_smarty_tpl->tpl_vars['deal_info']->value['time_status']==1){?>class="in_sale"<?php }?>></div>
                    </div>
                    <div class="buttons">
                    	<div class="shade">
                        	<ul>
                            	<li class="txt"><a href="<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['link'];?>
">查看详情</a></li>
                                <li class="split_line"></li>
                                <li class="txt"><a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"deal_order");?>
">查看评论</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="intro">
                	<div class="tit red_l"><a href="<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['link'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['deal_info']->value['name'],22,"...",true);?>
</a></div>
                    <div class="content"><?php echo $_smarty_tpl->tpl_vars['deal_info']->value['brief'];?>
</div>
                    <div class="price">原价：&yen;<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['origin_price'];?>
&nbsp;&nbsp;&nbsp;&nbsp;现价：&yen;<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['current_price'];?>
&nbsp;&nbsp;&nbsp;&nbsp;折扣：<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['discount'];?>
折
                    </div>
                    <div class="save">节省：&yen;<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['save_price'];?>
</div>
                </div>
            </div>
            <?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable(smarty_modifier_type($_smarty_tpl->tpl_vars['pages']->value,"deal",$_smarty_tpl->tpl_vars['deal_num']->value), true, 0);?>
          <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_deal(array('name'=>"deal_info"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

          
          <?php if ($_smarty_tpl->tpl_vars['p']->value){?>
          <div class="pages">
                	<ul>
                    	<li>共有<?php echo $_smarty_tpl->tpl_vars['p']->value['row_total'];?>
条记录</li>
                        <li>
                        	<?php if ($_smarty_tpl->tpl_vars['p']->value['current_page']==1){?>
                              第一页
                              <?php }else{ ?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['p']->value['current_page_url'];?>
">第一页</a>
                              <?php }?>
                        </li>
                        <li>
                        	 <?php if ($_smarty_tpl->tpl_vars['p']->value['prev_page']){?>
                             <a href="<?php echo $_smarty_tpl->tpl_vars['p']->value['prev_page_url'];?>
">上一页</a>
                             <?php }else{ ?>上一页<?php }?>
                        </li>
                        <li>
                        	<?php if ($_smarty_tpl->tpl_vars['p']->value['next_page']){?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['p']->value['next_page_url'];?>
">下一页</a>
                            <?php }else{ ?>下一页<?php }?>
                        </li>
                        <li>
                        	<?php if ($_smarty_tpl->tpl_vars['p']->value['current_page']==$_smarty_tpl->tpl_vars['p']->value['page_num']){?>
                            最后一页
                            <?php }else{ ?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['p']->value['page_end_url'];?>
">最后一页</a>
                            <?php }?>
                        </li>
                        <li>当前第<?php echo $_smarty_tpl->tpl_vars['p']->value['current_page'];?>
页</li>
                    </ul>
                </div>
          <?php }?>
        </div>
        
        <div class="c_right">
        	<?php $_smarty = $_smarty_tpl->smarty; if (!is_callable('smarty_block_info')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.info.php';
if (!is_callable('smarty_modifier_date_format')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_block_message')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.message.php';
if (!is_callable('smarty_modifier_name')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php';
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
                    <span class="f12 red_l right"><a href="/xampp/0794jz/infos.php?id=21&city=xdfsda">更多...</a></span>
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
                	如果您希望组织团购，请<a href="/xampp/0794jz/message.php?group_id=2&city=xdfsda">点击这里</a>提供相关信息！ 
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
        
    </div>
</div>
<div id="links">
	<div class="body_area">
            <fieldset>
            <legend>友情链接</legend>
                <div class="content">
                    <ul>
                        
                            <li><a href="http://www.baidu.com" target="_blank"><img src="/xampp/0794jz/admin/uploadFiles/4a0789303c368d63e33decb649261ac8.jpg" width="88" height="31"/></a></li>
                        
                            <li><a href="http://www.google.com" target="_blank"><img src="/xampp/0794jz/admin/uploadFiles/d4513e6cec0b28227ac75ffc49f1790b.jpg" width="88" height="31"/></a></li>
                        
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
            	<img src="/xampp/0794jz/admin/uploadFiles/2750be3d2a7649e27e2baac04e6e7c76.png">
            </span>
            
            	<span class="split_line"></span>
                <dl>
                    <dt>公司信息</dt>
                    <dd class="f12 light_blue_l">
                    	
                        	<a href="/xampp/0794jz/info.php?id=45&city=xdfsda">·&nbsp;关于我们</a><br />
                        
                    </dd>
                    
                </dl>
            
            	<span class="split_line"></span>
                <dl>
                    <dt>获取更新</dt>
                    <dd class="f12 light_blue_l">
                    	
                        	<a href="/xampp/0794jz/info.php?id=43&city=xdfsda">·&nbsp;更新内容</a><br />
                        
                        	<a href="/xampp/0794jz/info.php?id=44&city=xdfsda">·&nbsp;更新内容</a><br />
                        
                    </dd>
                    
                </dl>
            
            	<span class="split_line"></span>
                <dl>
                    <dt>商务合作</dt>
                    <dd class="f12 light_blue_l">
                    	
                        	<a href="/xampp/0794jz/info.php?id=41&city=xdfsda">·&nbsp;合作信息</a><br />
                        
                        	<a href="/xampp/0794jz/info.php?id=42&city=xdfsda">·&nbsp;合作信息</a><br />
                        
                    </dd>
                    
                </dl>
            
            	<span class="split_line"></span>
                <dl>
                    <dt>用户帮助</dt>
                    <dd class="f12 light_blue_l">
                    	
                        	<a href="/xampp/0794jz/info.php?id=39&city=xdfsda">·&nbsp;帮助问题</a><br />
                        
                        	<a href="/xampp/0794jz/info.php?id=40&city=xdfsda">·&nbsp;帮助问题</a><br />
                        
                        	<a href="/xampp/0794jz/info.php?id=46&city=xdfsda">·&nbsp;加入我们</a><br />
                        
                    </dd>
                    
                </dl>
            
        </div>
       	<div class="infos_bottom_line"></div>
        <div class="copyright white_l">
        	版权所有 &copy;&nbsp; 2013&nbsp; 乐尚科技&nbsp;&nbsp; 订购电话：15903467483&nbsp; <a target="_blank" href="http://www.miibeian.gov.cn/">晋ICP备09007422号</a>
        </div>
    </div>
</div>


</body>

</html>
<?php }} ?>