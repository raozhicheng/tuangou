<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div id="location"><strong>·欢迎使用乐尚团购系统管理平台</strong></div>
<div id="detail">
	<table width="100%" border="0" align="center" cellpadding="6" cellspacing="6">
  <tr>
    <td width="200" bgcolor="#EFEFEF"><div align="center">当前版本</div></td>
    <td  bgcolor="#EFEFEF">系统版本：<{$version}>&nbsp;<{$smarty.version}></td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">时间信息</div></td>
    <td bgcolor="#EFEFEF">系统当前时间：<{$smarty.now|date_format:'%Y-%m-%d %H:%M:%S' nocache}></td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">总注册会员数</div></td>
    <td bgcolor="#EFEFEF">共有注册会员：<{$user_info.user_num}>人,验证会员<{$user_info.user_verify_num}>人</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">当前进行中的团购数</div></td>
    <td bgcolor="#EFEFEF">普通团购数：<{$deal_info.deal_num}>个,积分兑换团购数：<{$deal_info.score_num}>个</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">总订单数</div></td>
    <td bgcolor="#EFEFEF"><{$order_info.order_num}>张订单,其中成交过的订单总数：<{$order_info.order_buy_num}>张订单</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">总充值单数</div></td>
    <td bgcolor="#EFEFEF"><{$incharge_info.incharge_num}>张订单,其中付款：<{$incharge_info.incharge_buy_num}>张订单</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">系统信息</div></td>
    <td bgcolor="#EFEFEF">
   
    <table width="540" border="0" cellspacing="1" cellpadding="6" bgcolor="#cccccc">
    
      <tr>
       <{foreach $sysinfo as $key=>$value}>
        <td width="90" bgcolor="#EFEFEF"><div align="center"><{$key}></div></td>
        <td  bgcolor="#EFEFEF"><div align="center"><{$value}></div></td>
         <{if $value@iteration mod 2==0}></tr><{/if}>
       <{/foreach}>
      </tr>
      
       </table>
       
       </td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">更多系统服务：</div></td>
    <td bgcolor="#EFEFEF">请访问官方网站&nbsp;<a href="http://www.leesuntech.com" target="_blank">http://www.leesuntech.com</a></td>
  </tr>
</table>

</div>
</body>
</html>
