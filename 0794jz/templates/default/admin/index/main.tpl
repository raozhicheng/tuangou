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
<div id="location"><strong>����ӭʹ�������Ź�ϵͳ����ƽ̨</strong></div>
<div id="detail">
	<table width="100%" border="0" align="center" cellpadding="6" cellspacing="6">
  <tr>
    <td width="200" bgcolor="#EFEFEF"><div align="center">��ǰ�汾</div></td>
    <td  bgcolor="#EFEFEF">ϵͳ�汾��<{$version}>&nbsp;<{$smarty.version}></td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">ʱ����Ϣ</div></td>
    <td bgcolor="#EFEFEF">ϵͳ��ǰʱ�䣺<{$smarty.now|date_format:'%Y-%m-%d %H:%M:%S' nocache}></td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">��ע���Ա��</div></td>
    <td bgcolor="#EFEFEF">����ע���Ա��<{$user_info.user_num}>��,��֤��Ա<{$user_info.user_verify_num}>��</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">��ǰ�����е��Ź���</div></td>
    <td bgcolor="#EFEFEF">��ͨ�Ź�����<{$deal_info.deal_num}>��,���ֶһ��Ź�����<{$deal_info.score_num}>��</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">�ܶ�����</div></td>
    <td bgcolor="#EFEFEF"><{$order_info.order_num}>�Ŷ���,���гɽ����Ķ���������<{$order_info.order_buy_num}>�Ŷ���</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">�ܳ�ֵ����</div></td>
    <td bgcolor="#EFEFEF"><{$incharge_info.incharge_num}>�Ŷ���,���и��<{$incharge_info.incharge_buy_num}>�Ŷ���</td>
  </tr>
  <tr>
    <td bgcolor="#EFEFEF"><div align="center">ϵͳ��Ϣ</div></td>
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
    <td bgcolor="#EFEFEF"><div align="center">����ϵͳ����</div></td>
    <td bgcolor="#EFEFEF">����ʹٷ���վ&nbsp;<a href="http://www.leesuntech.com" target="_blank">http://www.leesuntech.com</a></td>
  </tr>
</table>

</div>
</body>
</html>
