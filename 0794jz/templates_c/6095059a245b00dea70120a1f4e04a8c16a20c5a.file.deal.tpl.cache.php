<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 21:54:57
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/deal.tpl" */ ?>
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
  ),
  'nocache_hash' => '9950255353fde3315830d1-04407880',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'seo_title' => 0,
    'seo_description' => 0,
    'seo_keyword' => 0,
    'stylePath' => 1,
    'appName' => 0,
    'deal_info' => 1,
    'bar_width' => 1,
    'less_num' => 1,
    'var' => 1,
    'key' => 1,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fde33177b134_19129819',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fde33177b134_19129819')) {function content_53fde33177b134_19129819($_smarty_tpl) {?><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php $_smarty = $_smarty_tpl->smarty; if (!is_callable(\'smarty_block_deal\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.deal.php\';
if (!is_callable(\'smarty_modifier_date_format\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php\';
?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'seo_title\']->value;?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</title>
<meta name="description" content="<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'seo_description\']->value;?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
">
<meta name="keywords" content="<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'seo_keyword\']->value;?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
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
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/inc/cart/cart_const.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/script.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/jquery.pngfix.js"></script>
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
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
        
        	<div class="deal_info">
            	
                <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php $_smarty_tpl->smarty->_tag_stack[] = array(\'deal\', array(\'id\'=>$_GET[\'id\'],\'name\'=>"deal_info")); $_block_repeat=true; echo smarty_block_deal(array(\'id\'=>$_GET[\'id\'],\'name\'=>"deal_info"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

            	<dl>
                    <dt><h1 class="grey_n"><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'name\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</h1></dt>
                    <dd>
                        <div class="deal_left left">
                            <div class="mark_box">
                            	<div class="mark_bg">
                                	<div class="price left"><strong>&yen;<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'current_price\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</strong></div>
                                    <div class="deal_button_box white_l f25b">
                                        <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==0){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                        	<a href="javascript:void(0);"><strong>未开始</strong></a>								
                                        <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                        <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==1){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                            <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==2){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                            	<a href="javascript:void(0);"><strong>已卖光</strong></a>	
                                            <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }else{ ?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                            	<a href="javascript:void(0);" onClick="add_cart(<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'id\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
)"><strong>购买</strong></a>
                                            <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                        <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                        <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==2){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                            <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==2){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                            	<a href="javascript:void(0);"><strong>已卖光</strong></a>	
                                            <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }else{ ?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                            	<a href="javascript:void(0);"><strong>已结束</strong></a>
                                            <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                        <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                    	
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
                                    <td height="32"  align="center"  bgcolor="#f7f3ec">&yen;<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'current_price\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</td>
                                    <td align="center"  bgcolor="#f7f3ec">&yen;<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'origin_price\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</td>
                                    <td align="center"  bgcolor="#f7f3ec"><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'discount\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
折</td>
                                    <td align="center"  bgcolor="#f7f3ec">&yen;<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'save_price\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</td>
                                  </tr>
                                  </table>

                            </div>
                            
                            <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if (($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'begin_time\']!=0&&$_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==0)||($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'end_time\']!=0&&$_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==1)){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                            <div class="counter_box">
                            	<div class="time_logo"></div>
                                <div class="time_text">剩余时间:<br />
                                	<ul id="counter"><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'end_time\'],"%Y-%m-%d %H:%M:%S");?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</ul>
                                   
										<script type="text/javascript">
											<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==1){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

											var endTime = <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'end_time\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
000;
											var nowTime = <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo time();?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
000;
											var sysSecond = (endTime - nowTime) / 1000;
											<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

											<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==0){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

											var beginTime = <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'begin_time\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
000;
											var nowTime = <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo time();?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
000;
											var sysSecond = (beginTime - nowTime) / 1000;
											<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

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
                            <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                            
                            <div class="mess_box">
                            	<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==0){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                            	<span class="not_start">团购未开始&nbsp;&nbsp;&nbsp;开始时间为<br /><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'begin_time\'],"%Y-%m-%d %H:%M:%S");?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</span>
                                <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                
                                <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==1){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
 
                                	<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==0){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
 
                                    	<div class="deal_buy_tip_top"><span style="color:red"><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_count\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</span>人已购买</div>
                                        <div class="deal_buy_tip_notice f12">数量有限，先购先得</div>
                                        <div class="progress_box">
                                        	<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'min_bought\']){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                        		<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php $_smarty_tpl->tpl_vars[\'bar_width\'] = new Smarty_variable($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_count\']/$_smarty_tpl->tpl_vars[\'deal_info\']->value[\'min_bought\']*198, true, 0);?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                            <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }else{ ?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                            	<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php $_smarty_tpl->tpl_vars[\'bar_width\'] = new Smarty_variable(0, true, 0);?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                            <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                        	<div class="bar" style="width:<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'bar_width\']->value;?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
px"></div>
                                            <div class="range clear">
                                            	<div class="left">0</div>
                                                <div class="right"><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'min_bought\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                	<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                    
                                    <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==1){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                    	<div class="deal_buy_tip_top"><span style="color:red"><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_count\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</span>人已购买</div>
                                        <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php $_smarty_tpl->tpl_vars[\'less_num\'] = new Smarty_variable($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'max_bought\']-$_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_count\'], true, 0);?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                        <div class="deal_buy_tip_notice f12">
                                        	<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'max_bought\']!=0&&$_smarty_tpl->tpl_vars[\'deal_info\']->value[\'max_bought\']-$_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_count\']<=10){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                        	仅剩<span style="color:red;"><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'less_num\']->value;?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</span>单<br />
                                            <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                        	数量有限，先购先得
                                        </div>
                                        <div class="deal_buy_on">团购已成功，<br />可继续购买…</div>
                                        <div class="deal_buy_time_tip"><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'success_time\'],"%Y-%m-%d %H:%M:%S");?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
<br>达到最低团购数<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'min_bought\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</div>
                                    <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                    
                                    <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==2){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
 
                                    	<div class="deal_buy_tip_top"><span style="color:red"><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_count\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</span>人已购买</div>
                                        <div class="deal_buy_tip_notice f14b"><span style="color:red;">不好意思，已经卖光了!</span></div>
                                    <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==2){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                	<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==0){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                    	<div class="deal_buy_tip_notice f14b"><span style="color:red;">团购未成功!</span></div>
                                    <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                    <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==1){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                    	<div class="deal_buy_tip_notice f14b"><span style="color:red;">团购成功!</span></div>
                                    <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                    <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==2){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                    	<div class="deal_buy_tip_notice f14b"><span style="color:red;">不好意思，已经卖光了!</span></div>
                                    <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                
                            </div>
                            
                        </div>
                        <div class="deal_right right">
                            <div class="img">
                                <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'img_list\']){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

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
									<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php  $_smarty_tpl->tpl_vars[\'var\'] = new Smarty_Variable; $_smarty_tpl->tpl_vars[\'var\']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'img_list\']; if (!is_array($_from) && !is_object($_from)) { settype($_from, \'array\');}
 $_smarty_tpl->tpl_vars[\'var\']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars[\'var\']->key => $_smarty_tpl->tpl_vars[\'var\']->value){
$_smarty_tpl->tpl_vars[\'var\']->_loop = true;
 $_smarty_tpl->tpl_vars[\'var\']->iteration++;
?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                        picarr[<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'var\']->iteration;?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
]  = "<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'var\']->value[\'img\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
";
									<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php } ?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

									 
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
									document.write('<param name="movie" value="<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'stylePath\']->value;?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
/images/bcastr3.swf"><param name="quality" value="high">');
									document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
									document.write('<param name="FlashVars" value="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'">');
									document.write('<embed src="<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'stylePath\']->value;?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
/images/bcastr3.swf" wmode="opaque" FlashVars="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'& menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); document.write('</object>'); 
								</script>
                                <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }else{ ?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                	<img src="<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'img\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
" width=415 height=274/>
                                <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                            </div>
                            <span class="brief"><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'brief\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</span>
                        </div>
                    </dd>
                    <div class="clear"></div>
                </dl>
                <div class="deal_detail_box">
                	<div class="d_left">
                    	<div class="detail">
                        	<div class="t">本单详情</div>
                            <div class="c"><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'description\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</div>
                        </div>
                        <div class="supplier">
                        	<div class="t">商户详情</div>
                            <div class="c"><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'supplier_info\'][0][\'content\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</div>
                        </div>
                    </div>
                    <div class="d_right">
                    	<div class="supplier_info">
                        	<div class="t"><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'supplier_info\'][0][\'name\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</div>
                            <div class="c">
                            	<div class="s_select">
                                    <select name="locations" id="locations_select">
                                          <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php  $_smarty_tpl->tpl_vars[\'var\'] = new Smarty_Variable; $_smarty_tpl->tpl_vars[\'var\']->_loop = false;
 $_smarty_tpl->tpl_vars[\'key\'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'supplier_address_info\']; if (!is_array($_from) && !is_object($_from)) { settype($_from, \'array\');}
 $_smarty_tpl->tpl_vars[\'var\']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars[\'var\']->key => $_smarty_tpl->tpl_vars[\'var\']->value){
$_smarty_tpl->tpl_vars[\'var\']->_loop = true;
 $_smarty_tpl->tpl_vars[\'key\']->value = $_smarty_tpl->tpl_vars[\'var\']->key;
 $_smarty_tpl->tpl_vars[\'var\']->iteration++;
?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                          <option title="supperliers_card<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'var\']->value[\'id\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
" value="<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'var\']->value[\'id\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
" <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'key\']->value==0){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
selected<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
 ><?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'var\']->value[\'name\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</option>
                                          <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php } ?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                     </select>
                                 </div>
                                 
                                 <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php  $_smarty_tpl->tpl_vars[\'var\'] = new Smarty_Variable; $_smarty_tpl->tpl_vars[\'var\']->_loop = false;
 $_smarty_tpl->tpl_vars[\'key\'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'supplier_address_info\']; if (!is_array($_from) && !is_object($_from)) { settype($_from, \'array\');}
 $_smarty_tpl->tpl_vars[\'var\']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars[\'var\']->key => $_smarty_tpl->tpl_vars[\'var\']->value){
$_smarty_tpl->tpl_vars[\'var\']->_loop = true;
 $_smarty_tpl->tpl_vars[\'key\']->value = $_smarty_tpl->tpl_vars[\'var\']->key;
 $_smarty_tpl->tpl_vars[\'var\']->iteration++;
?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                 <ul id="supperliers_card<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'var\']->value[\'id\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
" class="supperliers_card">
                                 	<li class="black_l"><a href='http://ditu.google.cn/maps?f=q&source=s_q&hl=zh-CN&geocode=&q=<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'var\']->value[\'api_address\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
' target="_blank"><img src="http://ditu.google.cn/maps/api/staticmap?zoom=13&size=260x210&maptype=roadmap&mobile=true&markers=<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'var\']->value[\'point\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
&sensor=false&language=zh_CN" /></a>
									</li>
                                    <li>地址：<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'var\']->value[\'address\']){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'var\']->value[\'address\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }else{ ?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
暂无<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</li>
                                    <li>电话：<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'var\']->value[\'tel\']){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'var\']->value[\'tel\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }else{ ?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
暂无<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</li>
                                    <li>交通线路：<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'var\']->value[\'route\']){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'var\']->value[\'route\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }else{ ?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
暂无<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</li>
                                    <li>营业时间：<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php if ($_smarty_tpl->tpl_vars[\'var\']->value[\'open_time\']){?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'var\']->value[\'open_time\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }else{ ?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
暂无<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php }?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
</li>
                                    
                                 </ul>
                                 <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php } ?>/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

                                 <ul>
                                 	<li><img src="<?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'supplier_info\'][0][\'preview\'];?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>
" width="100" height="100"></li>
                                 </ul>
                                 
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <?php echo '/*%%SmartyNocache:9950255353fde3315830d1-04407880%%*/<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_deal(array(\'id\'=>$_GET[\'id\'],\'name\'=>"deal_info"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/*/%%SmartyNocache:9950255353fde3315830d1-04407880%%*/';?>

               	
                
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