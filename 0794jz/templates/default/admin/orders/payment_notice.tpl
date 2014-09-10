<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript">
  $(function () { 
	 $("#dels").click(function () {
                 $("form:eq(0)").attr("action", "main.php?act=paymentNotice&edit=delAll").submit();
      });
     $("#search").click(function () {
                $("form:eq(0)").attr("action", "main.php?act=paymentNotice&edit=search").submit();
      });
   });

</script>
<body>
<form method="post"  enctype="multipart/form-data" action="">
<div id="location"><div style="float:left"><strong>·付款单管理</strong></div>
	<div id="search_bar">付款单号：<input type="text" name="search_text"  class="input_box">
        <select name="payment_id">
				<option value="0" selected="selected">所有收款方式</option>
				<option value="1" >余额支付</option>
                <option value="2" >支付宝支付</option>
                <option value="4" >代金券支付</option>
                <option value="5" >网银在线</option>		
		</select>
       
        <input name="search" type="submit" id="search" value="搜索"></div>
</div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>

<div id="list">
<{if !$getPaymentNotice}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无列表</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
   
    <td width="4%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>付款单号</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>创建时间 </strong></div></td>
     <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>支付时间</strong></div></td>
    <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>是否已支付</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>订单号</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>会员名称</strong></div></td>
     <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>收款方式</strong></div></td>
     <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>付款单金额</strong></div></td>
      <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>付款单备注</strong></div></td>
  </tr>
  <{foreach $getPaymentNotice as $var}>
  <tr>
    
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.notice_sn}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.create_time|date_format:"%Y-%m-%d %H:%M:%S"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.pay_time|date_format:"%Y-%m-%d %H:%M:%S"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_paid|replace:1:'已支付'|replace:0:'未支付'}></div></td>
    <td bgcolor="f5f5f5"><div align="center">
        	<{if $var.deal_order_type==0}>
            	<span class="red">[团购订单]</span>
            <{elseif $var.deal_order_type==1}>
            	<span class="green">[充值订单]</span>
            <{/if}>
        	<{$var.deal_order_sn}>
            
    </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.user_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.payment_id|replace:1:'支付宝支付'|replace:2:'网银在线支付'|replace:3:'财付通支付'|replace:4:'余额支付'|replace:5:'代金券支付'}></div></td>
    <td bgcolor="f5f5f5"><div align="center">&yen;<{$var.money|string_format:"%.2f"}></div></td>
     <td bgcolor="f5f5f5"><div align="center"><{$var.memo}></div></td>
    
  </tr>
  <{/foreach}>
  </table>
<{/if}>
<{if $pageinfo.row_total}>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="5"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#EAEAEA">
  <tr>
          <td width="81%" bgcolor="#F5F5F5" height="35">
          <{if $pageinfo.row_total}>
          <div align="right">共<{$pageinfo.row_total}>条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          第一页
          <{else}>
          <a href="?act=paymentNotice&page=1">第一页</a>
          <{/if}>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=paymentNotice&page=<{$pageinfo.prev_page}>">上一页</a>
          <{else}>上一页<{/if}>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=paymentNotice&page=<{$pageinfo.next_page}>">下一页</a>
            <{else}>下一页<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            最后一页
            <{else}>
            <a href="?act=paymentNotice&page=<{$pageinfo.page_num}>">最后一页</a>
            <{/if}>
            &nbsp;&nbsp;｜&nbsp;&nbsp;当前第<{$pageinfo.current_page}>页&nbsp;&nbsp;</div>
            <{/if}>
            </td>
        </tr>
      </table>
      <div align="center"></div></td>
    </tr>
</table>
<{/if}>
</div>
</form>
</body>
</html>
