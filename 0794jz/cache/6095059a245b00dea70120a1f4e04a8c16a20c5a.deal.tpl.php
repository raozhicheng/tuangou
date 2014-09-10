<?php /*%%SmartyHeaderCode:9950255353fde3315830d1-04407880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6095059a245b00dea70120a1f4e04a8c16a20c5a' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/deal.tpl',
      1 => 1394286932,
      2 => 'file',
    ),
    'eaa9ac199fdd1b40775ab1502b1f54dcbd9448d1' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/inc/cart/cart_const.tpl',
      1 => 1387729032,
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
  'nocache_hash' => '9950255353fde3315830d1-04407880',
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_540fa81f3e7b76_15573893',
  'has_nocache_code' => true,
  'cache_lifetime' => 86400,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540fa81f3e7b76_15573893')) {function content_540fa81f3e7b76_15573893($_smarty_tpl) {?><?php $_smarty = $_smarty_tpl->smarty; if (!is_callable('smarty_block_deal')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.deal.php';
if (!is_callable('smarty_modifier_date_format')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $_smarty_tpl->tpl_vars['seo_title']->value;?>
</title>
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['seo_description']->value;?>
">
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['seo_keyword']->value;?>
">
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
<?php $_smarty = $_smarty_tpl->smarty; if (!is_callable('smarty_modifier_name')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php';
?>
<script type="text/javascript">
var APP_PATH = '<?php echo $_smarty_tpl->tpl_vars['appPath']->value;?>
';
var CART_URL = '<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"cart");?>
';
var CART_CHECK_URL = '<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"cart_check");?>
';
var ADD_CART_URL='<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"add_cart");?>
';
var DEL_CART_URL='<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"del_cart");?>
';
var MOD_CART_URL='<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"modify_cart");?>
';
</script>


<script type="text/javascript" src="/xampp/0794jz/templates/default/js/jquery.js"></script>
<script type="text/javascript" src="/xampp/0794jz/templates/default/js/script.js"></script>
<script type="text/javascript" src="/xampp/0794jz/templates/default/js/jquery.pngfix.js"></script>
<script type="text/javascript">
$(function(){
	  var _wrap=$('#side_deal');
	  var _interval=2000;
	  var _moving;
	  _wrap.hover(function(){
	  clearInterval(_moving);
	  },function(){
	  _moving=setInterval(function(){
	  var _field=_wrap.find('dl:first');
	  var _h=_field.height();
	  _field.animate({marginTop:-_h+'px'},800,function(){
	  _field.css('marginTop',0).appendTo(_wrap);
	  })
	  },_interval)
	  }).trigger('mouseleave');
});
</script>
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
        
        	<div class="deal_info">
            	
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('deal', array('id'=>$_GET['id'],'name'=>"deal_info")); $_block_repeat=true; echo smarty_block_deal(array('id'=>$_GET['id'],'name'=>"deal_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            	<dl>
                    <dt><h1 class="grey_n"><?php echo $_smarty_tpl->tpl_vars['deal_info']->value['name'];?>
</h1></dt>
                    <dd>
                        <div class="deal_left left">
                            <div class="mark_box">
                            	<div class="mark_bg">
                                	<div class="price left"><strong>&yen;<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['current_price'];?>
</strong></div>
                                    <div class="deal_button_box white_l f25b">
                                        <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['time_status']==0){?>
                                        	<a href="javascript:void(0);"><strong>未开始</strong></a>								
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['time_status']==1){?>
                                            <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['buy_status']==2){?>
                                            	<a href="javascript:void(0);"><strong>已卖光</strong></a>	
                                            <?php }else{ ?>
                                            	<a href="javascript:void(0);" onClick="add_cart(<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['id'];?>
)"><strong>购买</strong></a>
                                            <?php }?>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['time_status']==2){?>
                                            <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['buy_status']==2){?>
                                            	<a href="javascript:void(0);"><strong>已卖光</strong></a>	
                                            <?php }else{ ?>
                                            	<a href="javascript:void(0);"><strong>已结束</strong></a>
                                            <?php }?>
                                        <?php }?>
                                    	
                            		</div>
                                </div>
                            </div>
                            <div class="price_box">
                           	  <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
                                  <tr>
                                    <td height="5" align="center" bgcolor="#f1efeb">现价</td>
                                    <td align="center" bgcolor="#f1efeb">原价</td>
                                    <td align="center"  bgcolor="#f1efeb">折扣</td>
                                    <td align="center"  bgcolor="#f1efeb">节省</td>
                                </tr>
                                  <tr>
                                    <td height="32"  align="center"  bgcolor="#f7f3ec">&yen;<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['current_price'];?>
</td>
                                    <td align="center"  bgcolor="#f7f3ec">&yen;<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['origin_price'];?>
</td>
                                    <td align="center"  bgcolor="#f7f3ec"><?php echo $_smarty_tpl->tpl_vars['deal_info']->value['discount'];?>
折</td>
                                    <td align="center"  bgcolor="#f7f3ec">&yen;<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['save_price'];?>
</td>
                                  </tr>
                                  </table>

                            </div>
                            
                            <?php if (($_smarty_tpl->tpl_vars['deal_info']->value['begin_time']!=0&&$_smarty_tpl->tpl_vars['deal_info']->value['time_status']==0)||($_smarty_tpl->tpl_vars['deal_info']->value['end_time']!=0&&$_smarty_tpl->tpl_vars['deal_info']->value['time_status']==1)){?>
                            <div class="counter_box">
                            	<div class="time_logo"></div>
                                <div class="time_text">剩余时间:<br />
                                	<ul id="counter"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['deal_info']->value['end_time'],"%Y-%m-%d %H:%M:%S");?>
</ul>
                                   
										<script type="text/javascript">
											<?php if ($_smarty_tpl->tpl_vars['deal_info']->value['time_status']==1){?>
											var endTime = <?php echo $_smarty_tpl->tpl_vars['deal_info']->value['end_time'];?>
000;
											var nowTime = <?php echo time();?>
000;
											var sysSecond = (endTime - nowTime) / 1000;
											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['deal_info']->value['time_status']==0){?>
											var beginTime = <?php echo $_smarty_tpl->tpl_vars['deal_info']->value['begin_time'];?>
000;
											var nowTime = <?php echo time();?>
000;
											var sysSecond = (beginTime - nowTime) / 1000;
											<?php }?>
											var interValObj;
											setRemainTime();
											function setRemainTime()
											{	
												if (sysSecond > 0)
												{
													var second = Math.floor(sysSecond % 60);               
													var minite = Math.floor((sysSecond / 60) % 60);       
													var hour = Math.floor((sysSecond / 3600) % 24);      
													var day = Math.floor((sysSecond / 3600) / 24);        
													var timeHtml = "<span>"+hour+"</span>"+"小时"+"<span>"+minite+"</span>"+"分钟"+"";
													if(day > 0)
														timeHtml ="<span>"+day+"</span>"+"天"+"" + timeHtml;
													
													timeHtml+="<span>"+second+"</span>"+"秒"+"";
													
													try
													{
														$("#counter").html(timeHtml);
														sysSecond--;
													}
													catch(e){}}
												else
												{window.clearTimeout(interValObj);}
												interValObj = window.setTimeout("setRemainTime()", 1000); 	
											}
											</script>
                                </div>
                            </div>
                            <?php }?>
                            
                            <div class="mess_box">
                            	<?php if ($_smarty_tpl->tpl_vars['deal_info']->value['time_status']==0){?>
                            	<span class="not_start">团购未开始&nbsp;&nbsp;&nbsp;开始时间为<br /><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['deal_info']->value['begin_time'],"%Y-%m-%d %H:%M:%S");?>
</span>
                                <?php }?>
                                
                                <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['time_status']==1){?> 
                                	<?php if ($_smarty_tpl->tpl_vars['deal_info']->value['buy_status']==0){?> 
                                    	<div class="deal_buy_tip_top"><span style="color:red"><?php echo $_smarty_tpl->tpl_vars['deal_info']->value['buy_count'];?>
</span>人已购买</div>
                                        <div class="deal_buy_tip_notice f12">数量有限，先购先得</div>
                                        <div class="progress_box">
                                        	<?php if ($_smarty_tpl->tpl_vars['deal_info']->value['min_bought']){?>
                                        		<?php $_smarty_tpl->tpl_vars['bar_width'] = new Smarty_variable($_smarty_tpl->tpl_vars['deal_info']->value['buy_count']/$_smarty_tpl->tpl_vars['deal_info']->value['min_bought']*198, true, 0);?>
                                            <?php }else{ ?>
                                            	<?php $_smarty_tpl->tpl_vars['bar_width'] = new Smarty_variable(0, true, 0);?>
                                            <?php }?>
                                        	<div class="bar" style="width:<?php echo $_smarty_tpl->tpl_vars['bar_width']->value;?>
px"></div>
                                            <div class="range clear">
                                            	<div class="left">0</div>
                                                <div class="right"><?php echo $_smarty_tpl->tpl_vars['deal_info']->value['min_bought'];?>
</div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                	<?php }?>
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['buy_status']==1){?>
                                    	<div class="deal_buy_tip_top"><span style="color:red"><?php echo $_smarty_tpl->tpl_vars['deal_info']->value['buy_count'];?>
</span>人已购买</div>
                                        <?php $_smarty_tpl->tpl_vars['less_num'] = new Smarty_variable($_smarty_tpl->tpl_vars['deal_info']->value['max_bought']-$_smarty_tpl->tpl_vars['deal_info']->value['buy_count'], true, 0);?>
                                        <div class="deal_buy_tip_notice f12">
                                        	<?php if ($_smarty_tpl->tpl_vars['deal_info']->value['max_bought']!=0&&$_smarty_tpl->tpl_vars['deal_info']->value['max_bought']-$_smarty_tpl->tpl_vars['deal_info']->value['buy_count']<=10){?>
                                        	仅剩<span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['less_num']->value;?>
</span>单<br />
                                            <?php }?>
                                        	数量有限，先购先得
                                        </div>
                                        <div class="deal_buy_on">团购已成功，<br />可继续购买…</div>
                                        <div class="deal_buy_time_tip"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['deal_info']->value['success_time'],"%Y-%m-%d %H:%M:%S");?>
<br>达到最低团购数<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['min_bought'];?>
</div>
                                    <?php }?>
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['buy_status']==2){?> 
                                    	<div class="deal_buy_tip_top"><span style="color:red"><?php echo $_smarty_tpl->tpl_vars['deal_info']->value['buy_count'];?>
</span>人已购买</div>
                                        <div class="deal_buy_tip_notice f14b"><span style="color:red;">不好意思，已经卖光了!</span></div>
                                    <?php }?>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['time_status']==2){?>
                                	<?php if ($_smarty_tpl->tpl_vars['deal_info']->value['buy_status']==0){?>
                                    	<div class="deal_buy_tip_notice f14b"><span style="color:red;">团购未成功!</span></div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['buy_status']==1){?>
                                    	<div class="deal_buy_tip_notice f14b"><span style="color:red;">团购成功!</span></div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['buy_status']==2){?>
                                    	<div class="deal_buy_tip_notice f14b"><span style="color:red;">不好意思，已经卖光了!</span></div>
                                    <?php }?>
                                <?php }?>
                                
                            </div>
                            
                        </div>
                        <div class="deal_right right">
                            <div class="img">
                                <?php if ($_smarty_tpl->tpl_vars['deal_info']->value['img_list']){?>
                                <script language='javascript'> 
									linkarr = new Array();
									picarr = new Array();
									textarr = new Array();
									var swf_width=417;
									var swf_height=274;
									//文字颜色|文字位置|文字背景颜色|文字背景透明度|按键文字颜色|按键默认颜色|按键当前颜色|自动播放时间|图片过渡效果|是否显示按钮|打开方式
									var configtg='0xffffff|2|0xfffffF|1|0xffffff|0xC5DDBC|0x000033|2|3|1|_blank';
									var files = "";
									var links = "";
									var texts = "";
									//这里设置调用标记
									<?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deal_info']->value['img_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['var']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
 $_smarty_tpl->tpl_vars['var']->iteration++;
?>
                                        picarr[<?php echo $_smarty_tpl->tpl_vars['var']->iteration;?>
]  = "<?php echo $_smarty_tpl->tpl_vars['var']->value['img'];?>
";
									<?php } ?>
									 
									for(i=1;i<picarr.length;i++){
									if(files=="") files = picarr[i];
									else files += "|"+picarr[i];
									}
									for(i=1;i<linkarr.length;i++){
									if(links=="") links = linkarr[i];
									else links += "|"+linkarr[i];
									}
									for(i=1;i<textarr.length;i++){
									if(texts=="") texts = textarr[i];
									else texts += "|"+textarr[i];
									}
									document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');
									document.write('<param name="movie" value="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/images/bcastr3.swf"><param name="quality" value="high">');
									document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
									document.write('<param name="FlashVars" value="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'">');
									document.write('<embed src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/images/bcastr3.swf" wmode="opaque" FlashVars="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'& menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); document.write('</object>'); 
								</script>
                                <?php }else{ ?>
                                	<img src="<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['img'];?>
" width=415 height=274/>
                                <?php }?>
                            </div>
                            <span class="brief"><?php echo $_smarty_tpl->tpl_vars['deal_info']->value['brief'];?>
</span>
                        </div>
                    </dd>
                    <div class="clear"></div>
                </dl>
                <div class="deal_detail_box">
                	<div class="d_left">
                    	<div class="detail">
                        	<div class="t">本单详情</div>
                            <div class="c"><?php echo $_smarty_tpl->tpl_vars['deal_info']->value['description'];?>
</div>
                        </div>
                        <div class="supplier">
                        	<div class="t">商户详情</div>
                            <div class="c"><?php echo $_smarty_tpl->tpl_vars['deal_info']->value['supplier_info'][0]['content'];?>
</div>
                        </div>
                    </div>
                    <div class="d_right">
                    	<div class="supplier_info">
                        	<div class="t"><?php echo $_smarty_tpl->tpl_vars['deal_info']->value['supplier_info'][0]['name'];?>
</div>
                            <div class="c">
                            	<div class="s_select">
                                    <select name="locations" id="locations_select">
                                          <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['deal_info']->value['supplier_address_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['var']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['var']->key;
 $_smarty_tpl->tpl_vars['var']->iteration++;
?>
                                          <option title="supperliers_card<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==0){?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</option>
                                          <?php } ?>
                                     </select>
                                 </div>
                                 
                                 <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['deal_info']->value['supplier_address_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['var']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['var']->key;
 $_smarty_tpl->tpl_vars['var']->iteration++;
?>
                                 <ul id="supperliers_card<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" class="supperliers_card">
                                 	<li class="black_l"><a href='http://ditu.google.cn/maps?f=q&source=s_q&hl=zh-CN&geocode=&q=<?php echo $_smarty_tpl->tpl_vars['var']->value['api_address'];?>
' target="_blank"><img src="http://ditu.google.cn/maps/api/staticmap?zoom=13&size=260x210&maptype=roadmap&mobile=true&markers=<?php echo $_smarty_tpl->tpl_vars['var']->value['point'];?>
&sensor=false&language=zh_CN" /></a>
									</li>
                                    <li>地址：<?php if ($_smarty_tpl->tpl_vars['var']->value['address']){?><?php echo $_smarty_tpl->tpl_vars['var']->value['address'];?>
<?php }else{ ?>暂无<?php }?></li>
                                    <li>电话：<?php if ($_smarty_tpl->tpl_vars['var']->value['tel']){?><?php echo $_smarty_tpl->tpl_vars['var']->value['tel'];?>
<?php }else{ ?>暂无<?php }?></li>
                                    <li>交通线路：<?php if ($_smarty_tpl->tpl_vars['var']->value['route']){?><?php echo $_smarty_tpl->tpl_vars['var']->value['route'];?>
<?php }else{ ?>暂无<?php }?></li>
                                    <li>营业时间：<?php if ($_smarty_tpl->tpl_vars['var']->value['open_time']){?><?php echo $_smarty_tpl->tpl_vars['var']->value['open_time'];?>
<?php }else{ ?>暂无<?php }?></li>
                                    
                                 </ul>
                                 <?php } ?>
                                 <ul>
                                 	<li><img src="<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['supplier_info'][0]['preview'];?>
" width="100" height="100"></li>
                                 </ul>
                                 
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_deal(array('id'=>$_GET['id'],'name'=>"deal_info"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

               	
                
            </div>
            
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
                	<span class="right_icon_pay left"></span>
                    <span class="f12b red_n left">您还可以团购</span>
                </div>
                <div class="content" id="side_deal">
                   
                       <dl class="black_l"><dt><a href="/xampp/0794jz/deal.php?id=5&city=xdfsda"><img src="/xampp/0794jz/admin/uploadFiles/5ea522bca7b89b5d98d2fddb73b86065_new.jpg"/></a></dt><dd><a href="/xampp/0794jz/deal.php?id=5&city=xdfsda">湘菜公主</a></dd></dl>
                   
                       <dl class="black_l"><dt><a href="/xampp/0794jz/deal.php?id=4&city=xdfsda"><img src="/xampp/0794jz/admin/uploadFiles/7681568c0d46384091ec0c46bfb17719_new.jpg"/></a></dt><dd><a href="/xampp/0794jz/deal.php?id=4&city=xdfsda">【广外大街】砂锅家厨</a></dd></dl>
                   
                       <dl class="black_l"><dt><a href="/xampp/0794jz/deal.php?id=3&city=xdfsda"><img src="/xampp/0794jz/admin/uploadFiles/3cfd1a96b2967154331ba47985eb0a58_new.jpg"/></a></dt><dd><a href="/xampp/0794jz/deal.php?id=3&city=xdfsda">觉品壹号</a></dd></dl>
                   
                       <dl class="black_l"><dt><a href="/xampp/0794jz/deal.php?id=2&city=xdfsda"><img src="/xampp/0794jz/admin/uploadFiles/7f56cf5e6ffea5ec21b3de62c7961759_new.jpg"/></a></dt><dd><a href="/xampp/0794jz/deal.php?id=2&city=xdfsda">魏家凉皮</a></dd></dl>
                   
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