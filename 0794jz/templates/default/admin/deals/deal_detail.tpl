<{include file="$APP_STYLE/admin/common/main_header.tpl"}>

<body>
<{if !$getDetails}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">������Ϣ,�������ݿ�!</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>�Ź�����:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5"><{$getDetails.deal_info.name}></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>��ʾ����:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5"><{$getDetails.deal_info.buy_count}></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA"><div align="center"><strong>��������:</strong></div></td>
    <td bgcolor="#f5f5f5"><{$getDetails.real_buy_count}></td>
    <td bgcolor="#EAEAEA"><div align="center"><strong>�����۵�:</strong></div></td>
    <td bgcolor="#f5f5f5"><{$getDetails.real_user_count}></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA"><div align="center"><strong>��Ч�Ź�ȯ����:</strong></div></td>
    <td colspan="3" bgcolor="#f5f5f5"><{$getDetails.real_coupon_count}></td>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#FEF8E2" height="25"><span class="attention_text"><marquee direction="left" scrollamount="1" scrolldelay="1">�����ﳵ����ʱ�п�������Ź�ͬʱ��������������</marquee></span></td>
  </tr>
  <{foreach $getDetails.payment_list as $val}>
  <{if $val.pay_total>0}>
  <tr>
    <td bgcolor="#EAEAEA"><div align="center"><strong><{$val.name}>:</strong></div></td>
    <td colspan="3" bgcolor="#f5f5f5"><{$val.pay_total|string_format:"%.2f"}></td>
  </tr>
  <{/if}>
  <{/foreach}>
  <tr>
    <td bgcolor="#EAEAEA"><div align="center"><strong>���տ�[�����˿�]:</strong></div></td>
    <td bgcolor="#f5f5f5">&yen;&nbsp;<{$getDetails.pay_total|string_format:"%.2f"}></td>
    <td bgcolor="#EAEAEA"><div align="center"><strong>����ʵ��:</strong></div></td>
    <td bgcolor="#f5f5f5">&yen;&nbsp;<{$getDetails.order_total|string_format:"%.2f"}></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA"><div align="center"><strong>�����˿��:</strong></div></td>
    <td bgcolor="#f5f5f5"><{$getDetails.extra_count}></td>
    <td bgcolor="#EAEAEA"><div align="center"><strong>�ۺ��˿��˻�[ȯ]����:</strong></div></td>
    <td bgcolor="#f5f5f5"><{$getDetails.aftersale_count}>&nbsp;�˿��ܶ�:&yen;&nbsp;<{$getDetails.refund_money|string_format:"%.2f"}></td>
  </tr>
</table>
<{/if}>
</body>
</html>
