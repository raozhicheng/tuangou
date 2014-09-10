<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div style="border:1px solid #ccc; background:#EBEBEB;line-height:25px;text-indent:5px;"><strong>·&nbsp;<{if $delivery_info.order_info.order_status}>查看订单<{else}>处理订单<{/if}><{$delivery_info.order_info.order_sn}></strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post" enctype="multipart/form-data" action="main.php?act=delivery&edit=do_delivery&id=<{$id}>">
<input type="hidden" name="order_id" value="<{$id}>">
<input type="hidden" name="is_arrival" value="0">
<input type="hidden" name="arrival_time" value="0">
<div id="list">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="8%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="全选"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="反选"></div></td>
          <td><div align="center"><input type="button" id="noall" value="全否"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="27%" bgcolor="#EAEAEA"><div align="center"><strong>名称</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>数量</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>单价</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>总价</strong></div></td>
  </tr>
  <{foreach $delivery_info.order_deal_items as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="item[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.number}></div></td>
    <td bgcolor="f5f5f5"><div align="center">&yen;&nbsp;<{$var.unit_price|string_format:"%.2f"}></div></td>
    <td bgcolor="f5f5f5"><div align="center">&yen;&nbsp;<{$var.total_price|string_format:"%.2f"}></div></td>
  </tr>
  <tr>
    <td bgcolor="f5f5f5" align="center">发货单号:</td>
      <td bgcolor="f5f5f5" colspan="4">
        <input type="text" class="textbox" class="input_box" name="notice_sn" />&nbsp;&nbsp;<span class="attention_text">如不填写将自动生成！</span>
      </td>
  </tr>
  <tr>
    <td bgcolor="f5f5f5" align="center">发货备注:</td>
      <td bgcolor="f5f5f5" colspan="4">
        <textarea class="textarea" name="memo" style="width:250px;"></textarea>
      </td>
  </tr>
  <{/foreach}>
  
  </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="5"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#EAEAEA">
  <tr>
    <td bgcolor="#F5F5F5" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="19%"><table width="164" border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><input type="submit" name="do_delivery" class="admin_button" value="发货"/></td>
            </tr>
          </table></td>
          
        </tr>
      </table>
      <div align="center"></div></td>
    </tr>
</table>
</form>
</div>
</body>
</html>
