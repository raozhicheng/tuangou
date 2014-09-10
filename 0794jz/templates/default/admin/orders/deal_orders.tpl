<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript">
  $(function () { 
	 $("#dels").click(function () {
                 $("form:eq(0)").attr("action", "main.php?act=<{$status}>&edit=delAll").submit();
      });
     $("#search").click(function () {
                $("form:eq(0)").attr("action", "main.php?act=<{$status}>&edit=search").submit();
      });
   });
   
</script>
<body>
<form method="post"  enctype="multipart/form-data" action="">
<div id="location"><div style="float:left"><strong>·<{$title}></strong></div>
	<{if $status!="deal_orders_log"}>
        <div id="search_bar">
        订单号：<input type="text" name="search_text"  class="input_box">
        <{if $status=="deal_orders"}>
            <select name="pay_status">
                    <option value="-1" selected="selected">所有支付</option>
                    <option value="0" >未支付</option>
                    <option value="1" >部份支付</option>
                    <option value="2" >全部支付</option>			
            </select>
            <select name="delivery_status">
                    <option value="-1" selected="selected">所有配送</option>
                    <option value="0" >未发货</option>
                    <option value="1" >部份发货</option>
                    <option value="2" >全部发货</option>
                    <option value="5" >无需发货</option>			
            </select>
            <select name="extra_status">
                    <option value="-1" selected="selected">所有额外</option>
                    <option value="0" >正常</option>
                    <option value="1" >金额超额退款</option>
                    <option value="2" >发货失败退款</option>
            </select>
            <select name="order_status">
                    <option value="-1" selected="selected">结单状态</option>
                    <option value="0" >未结单</option>
                    <option value="1" >正常结单</option>
            </select>
          <{/if}>
            <input name="search" type="submit" id="search" value="搜索"></div>
       <{/if}>
</div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>

<div id="list">
<div id="deal_menu">
    	<ul>
				<li <{if $status=="deal_orders"}>class="deal_current"<{else}>class="deal_menu"<{/if}>><a href="?act=deal_orders">团购订单</a></li>
                <li <{if $status=="recharge_orders"}>class="deal_current"<{else}>class="deal_menu"<{/if}>><a href="?act=recharge_orders">充值订单</a></li>
                <li <{if $status=="deal_orders_log"}>class="deal_current"<{else}>class="deal_menu"<{/if}>><a href="?act=deal_orders_log">操作日志</a></li>
        </ul>
    </div>
 <div class="clear"></div>
<{if $status!="deal_orders_log"}>
<div id="content" class="show"> 
<{if !$deal_orders}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无列表</strong></div></td>
    </tr>
</table>
<{else}>
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
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="13%" bgcolor="#EAEAEA"><div align="center"><strong>订单号</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>会员名称</strong></div></td>
    <{if $status=="deal_orders"}>
     <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>应付总额</strong></div></td>
    <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>已付金额</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>下单时间</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>支付状态</strong></div></td>
     <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>配送状态</strong></div></td>
     <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>订单额外状态</strong></div></td>
      <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>售后操作</strong></div></td>
      <{else}>
       <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>已收金额</strong></div></td>
   	   <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>应付总额</strong></div></td>
       <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>支付方式</strong></div></td>
       <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>支付状态</strong></div></td>
      <{/if}>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <{foreach $deal_orders as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" <{if $var.order_status!=1 && $status=="deal_orders"}>disabled<{/if}> value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.order_sn}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.user_name}></div></td>
     <{if $status=="deal_orders"}>
    <td bgcolor="f5f5f5"><div align="center">&yen;<{$var.total_price|string_format:"%.2f"}></div></td>
    <td bgcolor="f5f5f5"><div align="center">&yen;<{$var.pay_amount|string_format:"%.2f"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.create_time|date_format:"%Y-%m-%d %H:%M:%S"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.pay_status|replace:1:'部分支付'|replace:0:'未支付'|replace:2:'全部支付'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.delivery_status|replace:0:'未发货'|replace:1:'部分发货'|replace:2:'全部发货'|replace:5:'无需发货'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.extra_status|replace:0:'正常'|replace:1:'金额超额退款'|replace:2:'发货失败退款'}></div></td>
     <td bgcolor="f5f5f5"><div align="center">
     	<{if $var.order_status}>
        	<{$var.after_sale|replace:0:'正常结单'|replace:1:'已退款'|replace:2:'已退货'|replace:3:'已退款,已退货'}>
        <{else}>
     		未结单
        <{/if}>
     </div>
     </td>
      <td bgcolor="f5f5f5"><div align="center"><{if $var.order_status==0}><a href="?act=view_order&id=<{$var.id}>">处理订单</a><{elseif $var.order_status==1}><a href="?act=view_order&id=<{$var.id}>">查看</a> | <a href="?act=deal_orders&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('确定要删除<{$var.order_sn}>吗？')">删除</a><{/if}></div></td>
      <{else}>
      <td bgcolor="f5f5f5"><div align="center">&yen;<{$var.deal_total_price|string_format:"%.2f"}></div></td>
       <td bgcolor="f5f5f5"><div align="center">&yen;<{$var.total_price|string_format:"%.2f"}></div></td>
        <td bgcolor="f5f5f5"><div align="center"><{$var.payment_id|replace:1:'余额支付'|replace:2:'支付宝支付'|replace:3:'财付通'|replace:4:'代金券支付'|replace:5:'网银在线'}></div></td>
         <td bgcolor="f5f5f5"><div align="center"><{$var.pay_status|replace:1:'部分支付'|replace:0:'未支付'|replace:2:'全部支付'}></div></td>
         <td bgcolor="f5f5f5"><div align="center"><{if $var.pay_status!=2}><a href="?act=recharge_orders&edit=pay_incharge&id=<{$var.id}>">管理员收款</a>&nbsp;&nbsp;|&nbsp;&nbsp;<{/if}><a href="?act=recharge_orders&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('确定要删除订单<{$var.order_sn}>吗？')">删除</a></div></td>
      <{/if}>
   
  </tr>
  <{/foreach}>
  </table>
<{/if}>
</div>
<{if $pageinfo.row_total}>
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
              <td><input type="submit" name="dels" id="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除选中的分类吗?')" /></td>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">共<{$pageinfo.row_total}>条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          第一页
          <{else}>
          <a href="?act=<{$status}>&page=1">第一页</a>
          <{/if}>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=<{$status}>&page=<{$pageinfo.prev_page}>">上一页</a>
          <{else}>上一页<{/if}>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=<{$status}>&page=<{$pageinfo.next_page}>">下一页</a>
            <{else}>下一页<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            最后一页
            <{else}>
            <a href="?act=<{$status}>&page=<{$pageinfo.page_num}>">最后一页</a>
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

<{else}>
    <div id="list">
    <{if !$deal_orders_log}>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
      <tr>
        <td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无日志列表</strong></div></td>
        </tr>
    </table>
    <{else}>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
      <tr>
        <td width="5%" bgcolor="#EAEAEA"><div align="center">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><div align="center"><input type="button" id="all" value="全选"></div></td>
              <td><div align="center"><input type="button" id="reverse" value="反选"></div></td>
              <td><div align="center"><input type="button" id="noall" value="全否"></div></td>
            </tr>
          </table>
        </div></td>
        <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
        <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>日志信息</strong></div></td>
        <td width="13%" bgcolor="#EAEAEA"><div align="center"><strong>操作时间</strong></div></td>
        <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>操作IP</strong></div></td>
        <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
      </tr>
      <{foreach $deal_orders_log as $var}>
      <tr>
        <td bgcolor="f5f5f5"><div align="center">
            <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
          </div></td>
        <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
        <td bgcolor="f5f5f5"><div align="center"><{$var.log_info}></div></td>
        <td bgcolor="f5f5f5"><div align="center"><{$var.log_time|date_format:"%Y-%m-%d %H:%M:%S"}></div></td>
        <td bgcolor="f5f5f5"><div align="center"><{$var.log_ip}></div></td>
        <td bgcolor="f5f5f5"><div align="center"><a href="?act=deal_orders_log&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('确定要删除吗？')">彻底删除</a></div></td>
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
        <td bgcolor="#F5F5F5" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="19%"><table width="164" border="0" cellspacing="3" cellpadding="0">
                <tr>
                  <td><input type="submit" name="dels" class="admin_button" value="彻底删除" onClick="return confirm('你确定要删除选中的分类吗?')" /></td>
                </tr>
              </table></td>
              <td width="81%">
              <{if $pageinfo.row_total}>
              <div align="right">共<{$pageinfo.row_total}>条记录&nbsp;&nbsp;|&nbsp;&nbsp;
              <{if $pageinfo.current_page==1}>
              第一页
              <{else}>
              <a href="?act=deal_orders_log&page=1">第一页</a>
              <{/if}>
    &nbsp;&nbsp;｜&nbsp;&nbsp;
              <{if $pageinfo.prev_page}>
              <a href="?act=deal_orders_log&page=<{$pageinfo.prev_page}>">上一页</a>
              <{else}>上一页<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
                <{if $pageinfo.next_page}>
                <a href="?act=deal_orders_log&page=<{$pageinfo.next_page}>">下一页</a>
                <{else}>下一页<{/if}>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <{if $pageinfo.current_page==$pageinfo.page_num}>
                最后一页
                <{else}>
                <a href="?act=deal_orders_log&page=<{$pageinfo.page_num}>">最后一页</a>
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
<{/if}> 
</div>
</form>
</body>
</html>
