<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:41:39
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/member/incharge.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96253137953fd8bb3c96723-69607855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '658032fc7f5cd796f7037fd7322bd411ea0355f3' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/member/incharge.tpl',
      1 => 1384426972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96253137953fd8bb3c96723-69607855',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Web_info' => 0,
    'stylePath' => 0,
    'appName' => 0,
    'title' => 0,
    'Web_link' => 0,
    'total_money' => 0,
    'total_score' => 0,
    'list' => 1,
    'pages' => 1,
    'order_num' => 1,
    'p' => 1,
    'payment_list' => 0,
    'var' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd8bb3e3d606_50707907',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd8bb3e3d606_50707907')) {function content_53fd8bb3e3d606_50707907($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_set')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.set.php';
if (!is_callable('smarty_modifier_name')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.name.php';
if (!is_callable('smarty_block_dealOrder')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/block.dealOrder.php';
if (!is_callable('smarty_modifier_type')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/definePlugins/modifier.type.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
/css/user.css" rel="stylesheet" type="text/css" />
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
/js/register.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylePath']->value;?>
/js/jquery.pngfix.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#incharge_done").click(function(){
			if(!($("input[name='money']").val()!=''&&!isNaN($("input[name='money']").val())&&$("input[name='money']").val()>0))			
			{
				alert("请输入正确金额");
				return false;
			}
			else if(!$("input[name='payment']:checked").val())
			{
				alert("请选择支付方式");
				return false;
			}
		});
	});
</script>
</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="body_area">
	
    <div id="content_box">
    	<div class="c_left">
        	<div class="user_f">
            	<div class="tit"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</div>
                <div class="member_box">
               		<div class="money">
                    	<b><a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"incharge");?>
">会员充值</a></b>&nbsp;&nbsp;|&nbsp;&nbsp;<b><a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"extracts_cash");?>
" target="_blank">会员提现</a></b>
                    </div>
                    <div class="m_s">
                    	帐户金额：&yen;&nbsp;<?php echo $_smarty_tpl->tpl_vars['total_money']->value;?>
&nbsp;&nbsp;&nbsp;当前积分：<?php echo $_smarty_tpl->tpl_vars['total_score']->value;?>

                  	</div>
                	<div class="data_list">
                        <table cellspacing="1" cellpadding="5" border="0" width="100%" bgcolor="#CCCCCC">
                              <tr>
                                  <th width=21% bgcolor="#EEEEEE">单号</th>
                                  <th width=10% bgcolor="#EEEEEE">充值金额</th>
                                  <th width=10% bgcolor="#EEEEEE">支付手续费</th>	
                                  <th width=11% bgcolor="#EEEEEE">支付方式</th>									
                                  <th width=11% bgcolor="#EEEEEE">支付状态</th>
                                  <th width=13% bgcolor="#EEEEEE">创建时间</th>
                                  <th width=13% bgcolor="#EEEEEE">支付时间</th>
                                  <th width=23% bgcolor="#EEEEEE">操作</th>
                              </tr>
                              
                              <?php $_smarty_tpl->smarty->_tag_stack[] = array('dealOrder', array('name'=>"list",'type'=>"recharge")); $_block_repeat=true; echo smarty_block_dealOrder(array('name'=>"list",'type'=>"recharge"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                              <tr class="red_l">
                                  <td bgcolor="#FFFFFF" align="center">订单：<?php echo $_smarty_tpl->tpl_vars['list']->value['order_sn'];?>
<br />付款单：<?php echo $_smarty_tpl->tpl_vars['list']->value['payment_notice']['notice_sn'];?>
</td>
                                  <td bgcolor="#FFFFFF" align="center">&yen;<?php echo $_smarty_tpl->tpl_vars['list']->value['incharge'];?>
</td>
                                  <td bgcolor="#FFFFFF" align="center">&yen;<?php echo $_smarty_tpl->tpl_vars['list']->value['payment_fee'];?>
</td>									
                                  <td bgcolor="#FFFFFF" align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value['payment_name'];?>
</td>
                                  <td bgcolor="#FFFFFF" align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value['pay_status_cn'];?>
</td>									
                                  <td bgcolor="#FFFFFF" align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value['create_time'];?>
</td>
                                  <td bgcolor="#FFFFFF" align="center"><?php echo $_smarty_tpl->tpl_vars['list']->value['payment_notice']['pay_time'];?>
</td>									
                                  <td bgcolor="#FFFFFF" align="center"><?php if ($_smarty_tpl->tpl_vars['list']->value['pay_status']==2){?>充值完成<?php }else{ ?><a href="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"pay",$_smarty_tpl->tpl_vars['list']->value['payment_notice']['id']);?>
">支付</a><?php }?></td>
                              </tr>
                              <?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable(smarty_modifier_type($_smarty_tpl->tpl_vars['pages']->value,"other",$_smarty_tpl->tpl_vars['order_num']->value), true, 0);?>
                              <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_dealOrder(array('name'=>"list",'type'=>"recharge"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                              
                        </table>
                    </div>
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
                      <form name="incharge_form" id="incharge_form" action="<?php echo smarty_modifier_name($_smarty_tpl->tpl_vars['Web_link']->value,"incharge_done");?>
" method="post">
                      <div class="payment_list">
                      	<ul>
                            <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
                                <li><img src="admin/uploadfiles/<?php echo $_smarty_tpl->tpl_vars['var']->value['logo'];?>
" width=88 height=31/><input type='radio' name='payment' value='<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
' /><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
&nbsp;&nbsp;<span style="font-size:12px;color:#666;"><?php echo $_smarty_tpl->tpl_vars['var']->value['description'];?>
</span></li>
                            <?php } ?>
                            <li><span class="right">金额：<input type="text" class="input" id="money" name="money"> 
							<input type="submit" id="incharge_done" value="充值" class="formbutton"></span></li>
                        </ul>
                      </div>
                      </form>
                </div>
            </div>
        	<div class="clear"></div>
        </div>
        <div class="c_right">
        	<div class="member_right_box">
            	<div class="top"></div>
                <div class="mid">
                	<ul>
                        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/inc/member_nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    </ul>
                </div>
                <div class="bottom"></div>
            </div>
        </div>
            
        <div class="clear"></div>
    	</div>
     </div>
        
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['style']->value)."/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</body>

</html>
<?php }} ?>