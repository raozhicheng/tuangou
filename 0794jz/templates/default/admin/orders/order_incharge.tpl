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
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无信息,请检查数据库!</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>订单号:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5"><{$getOrderIncharge.order_sn}></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>下单时间:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5"><{$getOrderIncharge.create_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
  </tr>
  <tr>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>已收金额:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5">&yen;<{$getOrderIncharge.pay_amount|string_format:"%.2f"}></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>剩余金额:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5">&yen;<{$getOrderIncharge.pay_amount|string_format:"%.2f"}></td>
  </tr>
   <tr>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>收款方式:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5">
    	<select name="payment_id">
        	<{foreach $getPayment as $val}>
				<option value="<{$val.id}>"><{$val.name}><{if $val.fee_amount>0}>[手续费]<{$val.fee_amount|string_format:"%.2f"}><{/if}></option>		
            <{/foreach}>
        </select>
    </td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>用户余额:</strong></div></td>
    <td width="10%" bgcolor="#f5f5f5">&yen;<{$getUserMoney|string_format:"%.2f"}></td>
  </tr>
  <tr>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>应收总额:</strong></div></td>
    <td colspan="3" width="10%" bgcolor="#f5f5f5">
    	商品总额:&yen;<{$getOrderIncharge.deal_total_price|string_format:"%.2f"}>
        <{if $getOrderIncharge.delivery_fee>0}>
        	+ 运费:&yen;<{$getOrderIncharge.delivery_fee|string_format:"%.2f"}>
        <{/if}>
        <{if $getOrderIncharge.account_money>0}>
        	- 已用余额支付:&yen;<{$getOrderIncharge.account_money|string_format:"%.2f"}>
        <{/if}>
        <{if $getOrderIncharge.ecv_money>0}>
        	- 已用代金券支付:&yen;<{$getOrderIncharge.ecv_money|string_format:"%.2f"}>
        <{/if}>
        = &yen;<{$total|string_format:"%.2f"}>
    </td>
  </tr>
  <tr>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>收款备注:</strong></div></td>
    <td colspan="3" width="10%" bgcolor="#f5f5f5"><textarea class="textarea" name="memo" class="input_box" style="width:300px"></textarea></td>
  </tr>
  <tr>
    <td width="6%" bgcolor="#EAEAEA"></td>
    <td colspan="3" width="10%" bgcolor="#f5f5f5"><input type="submit" name="do_incharge" class="admin_button" value="确认" /></td>
  </tr>
</table>
<{/if}>
</form>
</div>
</body>
</html>
