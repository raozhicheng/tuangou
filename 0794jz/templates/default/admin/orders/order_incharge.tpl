<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post" enctype="multipart/form-data" action="main.php?act=order_incharge&id=<{$getOrderIncharge.id}>&edit=do_incharge">
 <input type="hidden" name="id" value="<{$getOrderIncharge.id}>">
<div id="list">
<{if !$getOrderIncharge}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">������Ϣ,�������ݿ�!</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>������:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5"><{$getOrderIncharge.order_sn}></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>�µ�ʱ��:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5"><{$getOrderIncharge.create_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
  </tr>
  <tr>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>���ս��:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5">&yen;<{$getOrderIncharge.pay_amount|string_format:"%.2f"}></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>ʣ����:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5">&yen;<{$getOrderIncharge.pay_amount|string_format:"%.2f"}></td>
  </tr>
   <tr>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>�տʽ:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5">
    	<select name="payment_id">
        	<{foreach $getPayment as $val}>
				<option value="<{$val.id}>"><{$val.name}><{if $val.fee_amount>0}>[������]<{$val.fee_amount|string_format:"%.2f"}><{/if}></option>		
            <{/foreach}>
        </select>
    </td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>�û����:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5">&yen;<{$getUserMoney|string_format:"%.2f"}></td>
  </tr>
  <tr>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>Ӧ���ܶ�:</strong></div></td>
    <td colspan="3" width="10%" bgcolor="#f5f5f5">
    	��Ʒ�ܶ�:&yen;<{$getOrderIncharge.deal_total_price|string_format:"%.2f"}>
        <{if $getOrderIncharge.delivery_fee>0}>
        	+ �˷�:&yen;<{$getOrderIncharge.delivery_fee|string_format:"%.2f"}>
        <{/if}>
        <{if $getOrderIncharge.account_money>0}>
        	- �������֧��:&yen;<{$getOrderIncharge.account_money|string_format:"%.2f"}>
        <{/if}>
        <{if $getOrderIncharge.ecv_money>0}>
        	- ���ô���ȯ֧��:&yen;<{$getOrderIncharge.ecv_money|string_format:"%.2f"}>
        <{/if}>
        = &yen;<{$total|string_format:"%.2f"}>
    </td>
  </tr>
  <tr>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>�տע:</strong></div></td>
    <td colspan="3" width="10%" bgcolor="#f5f5f5"><textarea class="textarea" name="memo" class="input_box" style="width:300px"></textarea></td>
  </tr>
  <tr>
    <td width="6%" bgcolor="#EAEAEA"></td>
    <td colspan="3" width="10%" bgcolor="#f5f5f5"><input type="submit" name="do_incharge" class="admin_button" value="ȷ��" /></td>
  </tr>
</table>
<{/if}>
</form>
</div>
</body>
</html>
