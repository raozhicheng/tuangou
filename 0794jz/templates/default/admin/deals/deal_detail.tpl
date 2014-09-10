<{include file="$APP_STYLE/admin/common/main_header.tpl"}>

<body>
<{if !$getDetails}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无信息,请检查数据库!</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>团购名称:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5"><{$getDetails.deal_info.name}></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>显示人数:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5"><{$getDetails.deal_info.buy_count}></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA"><div align="center"><strong>总销售数:</strong></div></td>
    <td bgcolor="#f5f5f5"><{$getDetails.real_buy_count}></td>
    <td bgcolor="#EAEAEA"><div align="center"><strong>总销售单:</strong></div></td>
    <td bgcolor="#f5f5f5"><{$getDetails.real_user_count}></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA"><div align="center"><strong>有效团购券数量:</strong></div></td>
    <td colspan="3" bgcolor="#f5f5f5"><{$getDetails.real_coupon_count}></td>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#FEF8E2" height="25"><span class="attention_text"><marquee direction="left" scrollamount="1" scrolldelay="1">当购物车开启时有可能因多团购同时购买导致数据有误差！</marquee></span></td>
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
    <td bgcolor="#EAEAEA"><div align="center"><strong>总收款[不含退款]:</strong></div></td>
    <td bgcolor="#f5f5f5">&yen;&nbsp;<{$getDetails.pay_total|string_format:"%.2f"}></td>
    <td bgcolor="#EAEAEA"><div align="center"><strong>订单实收:</strong></div></td>
    <td bgcolor="#f5f5f5">&yen;&nbsp;<{$getDetails.order_total|string_format:"%.2f"}></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA"><div align="center"><strong>额外退款订单:</strong></div></td>
    <td bgcolor="#f5f5f5"><{$getDetails.extra_count}></td>
    <td bgcolor="#EAEAEA"><div align="center"><strong>售后退款退货[券]订单:</strong></div></td>
    <td bgcolor="#f5f5f5"><{$getDetails.aftersale_count}>&nbsp;退款总额:&yen;&nbsp;<{$getDetails.refund_money|string_format:"%.2f"}></td>
  </tr>
</table>
<{/if}>
</body>
</html>
