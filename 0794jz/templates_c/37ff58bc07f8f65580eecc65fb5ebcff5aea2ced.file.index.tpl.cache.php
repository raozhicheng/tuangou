<?php /* Smarty version Smarty-3.1.11, created on 2014-08-20 16:17:12
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105515407253f454f88238b9-06574837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37ff58bc07f8f65580eecc65fb5ebcff5aea2ced' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/index.tpl',
      1 => 1408522530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105515407253f454f88238b9-06574837',
  'function' => 
  array (
  ),
  'cache_lifetime' => 86400,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53f454f8931194_29256400',
  'variables' => 
  array (
    'Web_info' => 0,
    'stylePath' => 0,
    'appName' => 0,
    'cate_id' => 1,
    'deal_info' => 1,
    'bar_width' => 1,
    'less_num' => 1,
    'pages' => 1,
    'deal_num' => 1,
    'p' => 1,
  ),
  'has_nocache_code' => true,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f454f8931194_29256400')) {function content_53f454f8931194_29256400($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_set')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.set.php';
?><?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php $_smarty = $_smarty_tpl->smarty; if (!is_callable(\'smarty_block_deal\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.deal.php\';
if (!is_callable(\'smarty_modifier_date_format\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php\';
if (!is_callable(\'smarty_modifier_type\')) include \'/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.type.php\';
?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
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
/css/home.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/css/common.css" rel="stylesheet" type="text/css" />
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
$(document).ready(function()
{
  $("#links .content ul li:nth-child(10n)").css("margin-right","0");
  
});

</script>
</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
        
        	<div class="deal_info">
            	
                <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php $_smarty_tpl->smarty->_tag_stack[] = array(\'deal\', array(\'name\'=>"deal_info",\'cate_id\'=>$_smarty_tpl->tpl_vars[\'cate_id\']->value)); $_block_repeat=true; echo smarty_block_deal(array(\'name\'=>"deal_info",\'cate_id\'=>$_smarty_tpl->tpl_vars[\'cate_id\']->value), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

            	<dl>
                    <dt><h1 class="grey_n"><?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'name\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</h1></dt>
                    <dd>
                        <div class="deal_left left">
                            <div class="mark_box">
                            	<div class="mark_bg">
                                	<div class="price left"><strong>&yen;<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'current_price\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</strong></div>
                                    <div class="deal_button_box white_l f25b">
                                        <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==0){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                        	<a href="javascript:void(0);"><strong>未开始</strong></a>								
                                        <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                        <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==1){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==2){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                            	<a href="javascript:void(0);"><strong>已卖光</strong></a>	
                                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }else{ ?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                            	<a href="javascript:void(0);" onClick="add_cart(<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'id\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
)"><strong>购买</strong></a>
                                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                        <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                        <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==2){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==2){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                            	<a href="javascript:void(0);"><strong>已卖光</strong></a>	
                                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }else{ ?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                            	<a href="javascript:void(0);"><strong>已结束</strong></a>
                                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                        <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                    	
                            		</div>
                                </div>
                            </div>
                            <div class="price_box">
                           	  <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
                                  <tr>
                                    <!-- <td height="5" align="center" bgcolor="#f1efeb">应付订金</td>-->
                                     <td align="center" bgcolor="#f1efeb">市场价</td>
                                    <!-- <td align="center"  bgcolor="#f1efeb">官方指导价</td>-->
                                    <td align="center"  bgcolor="#f1efeb">节省</td>
                                 </tr>
                                  <tr>
                                    <!--<td height="32"  align="center"  bgcolor="#f7f3ec">&yen;<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'current_price\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</td>-->
                                    <td align="center"  bgcolor="#f7f3ec">&yen;<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'origin_price\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</td>
                                    <!--<td align="center"  bgcolor="#f7f3ec"><?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'discount\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
折</td>-->
                                    <td align="center"  bgcolor="#f7f3ec">&yen;<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'save_price\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</td>
                                  </tr>
                                  </table>

                            </div>
                            
                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if (($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'begin_time\']!=0&&$_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==0)||($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'end_time\']!=0&&$_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==1)){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                            <div class="counter_box">
                            	<div class="time_logo"></div>
                                <div class="time_text">剩余时间:<br />
                                	<ul id="counter"><?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'end_time\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</ul>
                                   
										<script type="text/javascript">
											<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==1){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

											var endTime = <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'end_time\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
000;
											var nowTime = <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo time();?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
000;
											var sysSecond = (endTime - nowTime) / 1000;
											<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

											<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==0){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

											var beginTime = <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'begin_time\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
000;
											var nowTime = <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo time();?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
000;
											var sysSecond = (beginTime - nowTime) / 1000;
											<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

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
                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                            
                            <div class="mess_box">
                            	<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==0){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                            	<span class="not_start">团购未开始&nbsp;&nbsp;&nbsp;开始时间为<br /><?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'begin_time\'],"%Y-%m-%d %H:%M:%S");?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</span>
                                <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                
                                <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==1){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
 
                                	<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==0){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
 
                                    	<div class="deal_buy_tip_top"><span style="color:red"><?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_count\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</span>人已购买</div>
                                        <div class="deal_buy_tip_notice f12">数量有限，先购先得</div>
                                        <div class="progress_box">
                                        	<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'min_bought\']){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                        		<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php $_smarty_tpl->tpl_vars[\'bar_width\'] = new Smarty_variable($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_count\']/$_smarty_tpl->tpl_vars[\'deal_info\']->value[\'min_bought\']*198, true, 0);?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }else{ ?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                            	<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php $_smarty_tpl->tpl_vars[\'bar_width\'] = new Smarty_variable(0, true, 0);?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                        	<div class="bar" style="width:<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'bar_width\']->value;?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
px"></div>
                                            <div class="range clear">
                                            	<div class="left">0</div>
                                                <div class="right"><?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'min_bought\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                	<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                    
                                    <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==1){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                    	<div class="deal_buy_tip_top"><span style="color:red"><?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_count\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</span>人已购买</div>
                                        <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php $_smarty_tpl->tpl_vars[\'less_num\'] = new Smarty_variable($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'max_bought\']-$_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_count\'], true, 0);?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                        <div class="deal_buy_tip_notice f12">
                                        	<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'max_bought\']!=0&&$_smarty_tpl->tpl_vars[\'deal_info\']->value[\'max_bought\']-$_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_count\']<=10){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                        	仅剩<span style="color:red;"><?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'less_num\']->value;?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</span>单<br />
                                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                        	数量有限，先购先得
                                        </div>
                                        <div class="deal_buy_on">团购已成功，<br />可继续购买…</div>
                                        <div class="deal_buy_time_tip"><?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'success_time\'],"%Y-%m-%d %H:%M:%S");?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
<br>达到最低团购数<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'min_bought\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</div>
                                    <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                    
                                    <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==2){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
 
                                    	<div class="deal_buy_tip_top"><span style="color:red"><?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_count\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</span>人已购买</div>
                                        <div class="deal_buy_tip_notice f14b"><span style="color:red;">不好意思，已经卖光了!</span></div>
                                    <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'time_status\']==2){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                	<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==0){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                    	<div class="deal_buy_tip_notice f14b"><span style="color:red;">团购未成功!</span></div>
                                    <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                    <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==1){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                    	<div class="deal_buy_tip_notice f14b"><span style="color:red;">团购成功!</span></div>
                                    <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                    <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'deal_info\']->value[\'buy_status\']==2){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                    	<div class="deal_buy_tip_notice f14b"><span style="color:red;">不好意思，已经卖光了!</span></div>
                                    <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                                
                            </div>
                            
                        </div>
                        <div class="deal_right right">
                            <div class="img"><a href="<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'link\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
"><img src="<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'img\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
"/></a></div>
                            <span class="brief"><?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'deal_info\']->value[\'brief\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
</span>
                        </div>
                    </dd>
                    <div class="clear"></div>
                </dl>
                <!-- modifier.type.php插件 -->
                 <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php $_smarty_tpl->tpl_vars[\'p\'] = new Smarty_variable(smarty_modifier_type($_smarty_tpl->tpl_vars[\'pages\']->value,"deal",$_smarty_tpl->tpl_vars[\'deal_num\']->value), true, 0);?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_deal(array(\'name\'=>"deal_info",\'cate_id\'=>$_smarty_tpl->tpl_vars[\'cate_id\']->value), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

               <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                <div class="pages">
                	<ul>
                    	<li>共有<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'row_total\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
条记录</li>
                        <li>
                        	<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'current_page\']==1){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                              第一页
                              <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }else{ ?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                              <a href="<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'current_page_url\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
">第一页</a>
                              <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                        </li>
                        <li>
                        	 <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'prev_page\']){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                             <a href="<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'prev_page_url\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
">上一页</a>
                             <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }else{ ?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
上一页<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                        </li>
                        <li>
                        	<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'next_page\']){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                            <a href="<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'next_page_url\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
">下一页</a>
                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }else{ ?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
下一页<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                        </li>
                        <li>
                        	<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php if ($_smarty_tpl->tpl_vars[\'p\']->value[\'current_page\']==$_smarty_tpl->tpl_vars[\'p\']->value[\'page_num\']){?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                            最后一页
                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }else{ ?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                            <a href="<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'page_end_url\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
">最后一页</a>
                            <?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                        </li>
                        <li>当前第<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php echo $_smarty_tpl->tpl_vars[\'p\']->value[\'current_page\'];?>
/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>
页</li>
                    </ul>
                </div>
				<?php echo '/*%%SmartyNocache:105515407253f454f88238b9-06574837%%*/<?php }?>/*/%%SmartyNocache:105515407253f454f88238b9-06574837%%*/';?>

                
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