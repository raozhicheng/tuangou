<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:19:38
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/index/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17800661053fd868ab98dc8-68050124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fd52752b4dc63e3737cb3f319736ec298de1d69' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/index/main.tpl',
      1 => 1346987732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17800661053fd868ab98dc8-68050124',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'version' => 0,
    'user_info' => 0,
    'deal_info' => 0,
    'order_info' => 0,
    'incharge_info' => 0,
    'sysinfo' => 0,
    'key' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd868ac29467_08964092',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd868ac29467_08964092')) {function content_53fd868ac29467_08964092($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>main</title>
<link href="css/global.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/jquery.pngfix.js"></script>
</head>
<body>
<div id="location"><strong>����ӭʹ�������Ź�ϵͳ����ƽ̨</strong></div>
<div id="detail">
	<table width="100%" border="0" align="center" cellpadding="6" cellspacing="6">
  <tr>
    <td width="200" bgcolor="#EFEFEF"><div align="center">��ǰ�汾</div></td>
    <td  bgcolor="#EFEFEF">ϵͳ�汾��<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
&nbsp;<?php echo 'Smarty-3.1.11';?>
</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">ʱ����Ϣ</div></td>
    <td bgcolor="#EFEFEF">ϵͳ��ǰʱ�䣺<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M:%S');?>
</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">��ע���Ա��</div></td>
    <td bgcolor="#EFEFEF">����ע���Ա��<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_num'];?>
��,��֤��Ա<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_verify_num'];?>
��</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">��ǰ�����е��Ź���</div></td>
    <td bgcolor="#EFEFEF">��ͨ�Ź�����<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['deal_num'];?>
��,���ֶһ��Ź�����<?php echo $_smarty_tpl->tpl_vars['deal_info']->value['score_num'];?>
��</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">�ܶ�����</div></td>
    <td bgcolor="#EFEFEF"><?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_num'];?>
�Ŷ���,���гɽ����Ķ���������<?php echo $_smarty_tpl->tpl_vars['order_info']->value['order_buy_num'];?>
�Ŷ���</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">�ܳ�ֵ����</div></td>
    <td bgcolor="#EFEFEF"><?php echo $_smarty_tpl->tpl_vars['incharge_info']->value['incharge_num'];?>
�Ŷ���,���и��<?php echo $_smarty_tpl->tpl_vars['incharge_info']->value['incharge_buy_num'];?>
�Ŷ���</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">ϵͳ��Ϣ</div></td>
    <td bgcolor="#EFEFEF">
   
    <table width="540" border="0" cellspacing="1" cellpadding="6" bgcolor="#cccccc">
    
      <tr>
       <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sysinfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['value']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
 $_smarty_tpl->tpl_vars['value']->iteration++;
?>
        <td width="90" bgcolor="#EFEFEF"><div align="center"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</div></td>
        <td  bgcolor="#EFEFEF"><div align="center"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</div></td>
         <?php if ($_smarty_tpl->tpl_vars['value']->iteration%2==0){?></tr><?php }?>
       <?php } ?>
      </tr>
      
       </table>
       
       </td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">����ϵͳ����</div></td>
    <td bgcolor="#EFEFEF">����ʹٷ���վ&nbsp;<a href="http://www.leesuntech.com" target="_blank">http://www.leesuntech.com</a></td>
  </tr>
</table>

</div>
</body>
</html>
<?php }} ?>