<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<link href="css/dialog.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(function()
{
//TAB选项
$("#deal_menu ul li:eq(0)").addClass("deal_current");
$("#deal_menu ul li").addClass("deal_menu");
$("#deal_menu>ul>li>a").click(function(){
	$("#deal_menu ul li").removeClass("deal_current");
	$("#deal_menu ul li").addClass("deal_menu");
	$(this).parent().addClass("deal_current");
	$(this).blur();
	$("#content div").removeClass("show");
	$("#content div").addClass("hide");
	var content_show = $(this).attr("title");
	$("#"+content_show).removeClass("hide");
	$("#"+content_show).addClass("show");
})

	/*$("#del").click(function(){ 
            $.ajax({ 
                url:"?act=<{$status}>&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del", 
                type:"POST", 
                async:false, 
                success:function(data,status) 
                { 
                   // $("#con").html(data); 
                   alert(data); 
                } 
            }) 
	 })*/
	 
	 
		$("#refund_money_cbo").bind("click",function(){ bind_refund_money();});
		$("#refund_money_box").bind("keydown keyup blur",function(){ 
			check_max_refund(this);
		});
		 bind_refund_money();
	function check_max_refund(obj)
	{
		var max_refund = $("#refund_money_box").attr("ref");
		
		if(parseFloat($(obj).val())>parseFloat(max_refund))
		{
			$(obj).val(max_refund);
		}
	}
	
	function bind_refund_money()
	{
		var is_refund = $("#refund_money_cbo").attr("checked");;
		if(is_refund)
		{
			if($("#refund_money_box").val() == ''||parseFloat($("#refund_money_box").val())==0)
			{
				$("#refund_money_box").val($("#refund_money_box").attr("ref"));
			}
			$("#refund_money").show();
			
		}
		else
		{			
			$("#refund_money").hide();
			$("#refund_money_box").val("0");
		}
	}
	
	$(window).resize(function() {//页面窗口大小改变事件
                if (!$(".dialog").is(":visible")) {
                    return;
                }
                showDialog(); //设置提示对话框的Top与Left
            });

            $(".title img").click(function() { //注册关闭图片点击事件
                $(".dialog").hide();
                $(".mask").hide();
				window.location.reload();
            })
			$("#frame").load(function(){ 
				$("#load").css("display","none");
				$("#frame").css("display","block");
			}); 
	
})

			function showDialog() {
                var objW = $(window); //当前窗口
                var objC = $(".dialog"); //对话框
                var brsW = objW.width();
                var brsH = objW.height();
                var sclL = objW.scrollLeft();
                var sclT = objW.scrollTop();
                var curW = objC.width();
                var curH = objC.height();
                //计算对话框居中时的左边距
                var left = sclL + (brsW - curW) / 2;
                //计算对话框居中时的上边距
                var top = sclT + (brsH - curH) / 2;
                //设置对话框在页面中的位置
                objC.css({ "left": left, "top": top });
            }

            
			
function openDialog(o){
		this.blur();
		$(".mask").show(); //显示背景色
        showDialog(); //设置提示对话框的Top与Left
        $(".dialog").show(); //显示提示对话框
		$("#load").css("display","block");
		$("#frame").css("display","none");
		$("#frame").attr("src","main.php?act=order_incharge&id="+$(o).attr("id"));
}
function openDeliveryDialog(o){
		this.blur();
		$(".mask").show(); //显示背景色
        showDialog(); //设置提示对话框的Top与Left
        $(".dialog").show(); //显示提示对话框
		$("#load").css("display","block");
		$("#frame").css("display","none");
		$("#frame").attr("src","main.php?act=delivery&id="+$(o).attr("id"));
		$(".title span").html("发货操作");
}

			
</script>
<body>
<div id="location"><strong>·订单详细内容</strong></div>
	 <div class="mask"></div>
     <div class="dialog">
          <div class="title">
               <img src="images/close.gif" alt="点击可以关闭" /><span>管理员收款</span>
          </div>
          <div class="content">
          	  <div id="load"><p><img src="images/loading_circle.gif"></p></div>
              <iframe frameborder="0" height="300px" width="620px" scrolling="auto" id="frame"></iframe>
          </div>
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
        	<li><a href="#" title="content_1">基本信息</a></li>
            <li><a href="#" title="content_2">支付信息</a></li>
            <{if $getDealOrder.delivery_id>0}>
            	<li><a href="#" title="content_3">配送信息</a></li>
            <{/if}>
            <li><a href="#" title="content_4">额外信息</a></li>
            <li><a href="#" title="content_5">列表单据</a></li>
            <li><a href="#" title="content_6">售后操作</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    
    <div id="content">
    <div class="show" id="content_1">

<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">订单号：</td>
    <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.order_sn}></td>
  </tr>
    <tr>
    <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">下单会员：</td>
    <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.user_name}></td>
  </tr>
 
  <tr>
    <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">订单状态：</td>
    <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.pay_status|replace:1:'部分支付'|replace:0:'未支付'|replace:2:'全部支付'}>
    <{if $getDealOrder.pay_status!=2}>
    	<input type="button" value="管理员收款" id="<{$getDealOrder.id}>" onClick="openDialog(this)"/>
    <{/if}>
    </td>
  </tr>
   <tr>
    <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">配送状态：</td>
    <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.delivery_status|replace:0:'未发货'|replace:1:'部份发货'|replace:2:'全部发货'|replace:5:'无需发货'}></td>
  </tr>
  <tr>
    <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">结单操作：</td>
    <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.order_status|replace:1:'正常结单'|replace:0:'未结单'}>
    <{if $getDealOrder.pay_status==2 && $getDealOrder.delivery_status==2 || $getDealOrder.delivery_status==5 || $getDealOrder.pay_amount==$getDealOrder.refund_money}>
        <{if $getDealOrder.order_status}>
        	<input type="button" value="开放订单" onClick="window.location.href='main.php?act=view_order&id=<{$getDealOrder.id}>&edit=open_order'"/>
        <{else}>
        	<input type="button" value="结单" onClick="window.location.href='main.php?act=view_order&id=<{$getDealOrder.id}>&edit=finish_order'"/>
        <{/if}>
    <{/if}></td>
  </tr>
   <tr>
    <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">下单时间：</td>
    <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.create_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
  </tr>

    </table></td>
  </tr>
</table>
</div>

<div class="hide" id="content_2">
	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">应收总额：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.total_price|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">已收金额：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.pay_amount|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">商品总额：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.deal_total_price|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">用户折扣：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.discount_price|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">余额支付：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.account_money|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">代金券支付：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.ecv_money|string_format:"%.2f"}></td>
        </tr>
        <{if $getDealOrder.payment_id>0}>
            <tr>
                <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">收款方式：</td>
                <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.payment_name}></td>
            </tr>
            <tr>
                <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">手续费：</td>
                <td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.payment_fee}></td>
            </tr>
        <{/if}>
        
	</table>
</div>
<{if $getDealOrder.delivery_id>0}>
    <div class="hide" id="content_3">
    	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
    	 <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">配送方式：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.delivery_name}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">运费：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.delivery_fee|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">配送地区：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">省：<{$getDealOrder.region_lv1_name}>&nbsp;&nbsp;|&nbsp;&nbsp;市：<{$getDealOrder.region_lv2_name}>&nbsp;&nbsp;|&nbsp;&nbsp;区：<{$getDealOrder.region_lv3_name}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">配送地址：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.address}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">邮编：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.zip}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">收货人：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.consignee}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">收货人手机：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.mobile}></td>
        </tr>
        </table>
    </div>
<{/if}>
<div class="hide" id="content_4">
	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
    	 <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">返还现金：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.return_total_money|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">返还积分：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.return_total_score|string_format:"%.0f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">订单备注：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.memo}></td>
        </tr>
    </table>
</div>

<div class="hide" id="content_5">
	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
    	<tr>
        	<td height="20" bgcolor="#cdcdcd" style="text-align:center;font-weight:bold;" colspan="6"><span class="attention_text">团购商品列表</span></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" style="text-align:center;">团购商品名称</td>
            <td width="12%" bgcolor="#EAEAEA" style="text-align:center;">数量</td>
            <td width="10%" bgcolor="#EAEAEA" style="text-align:center;">单价</td>
            <td width="10%" bgcolor="#EAEAEA" style="text-align:center;">总价</td>
            <td width="20%" bgcolor="#EAEAEA" style="text-align:center;">发货操作</td>
            <td width="20%" bgcolor="#EAEAEA" style="text-align:center;">发货备注</td>
        </tr>
        <{foreach $dealOrderItem as $val}>
        	<tr>
                <td height="20" bgcolor="f5f5f5" style="text-align:center;"><{$val.name}></td>
                <td bgcolor="f5f5f5" style="text-align:center;"><{$val.number}></td>
                <td bgcolor="f5f5f5" style="text-align:center;"><{$val.unit_price|string_format:"%.2f"}></td>
                <td bgcolor="f5f5f5" style="text-align:center;"><{$val.total_price|string_format:"%.2f"}></td>
                <td bgcolor="f5f5f5" style="text-align:center;">
                	<{if !$val.is_delivery}>
                    	无需发货
                    <{else}>
                    	<{if !$val.delivery_status}>
                        	<input type="button" value="发货" id="<{$getDealOrder.id}>" onClick="openDeliveryDialog(this)"/>
                        <{else}>
                        	全部发货<br>
                            发货单号：<{$val.notice_sn}><br>
                            <span class="attention_text"><{$val.is_arrival|replace:"1":"已收到货"|replace:"0":"未收到货"}></span>
                            <{if $val.is_arrival}>
                            &nbsp;到货时间：<{$val.arrival_time|date_format:"%Y-%m-%d %H:%M:%S"}>
                            <{/if}>
                        <{/if}>
                    <{/if}>
                </td>
                <td width="20%" bgcolor="f5f5f5" style="text-align:center;"><{$val.memo}></td>
        	</tr>
        <{/foreach}>
        </table>
        
         <{if $getPaymentNotice}>
        <table width="100%" border="0" height="5"><tr><td></td></tr></table>
            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
            <tr>
                <td height="20" bgcolor="#cdcdcd" style="text-align:center;font-weight:bold;" colspan="5"><span class="attention_text">付款单列表</span></td>
            </tr>
            <tr>
                <td width="15%" height="20" bgcolor="#EAEAEA" style="text-align:center;">付款单号</td>
                <td width="12%" bgcolor="#EAEAEA" style="text-align:center;">支付时间</td>
                <td width="10%" bgcolor="#EAEAEA" style="text-align:center;">付款金额</td>
                <td width="10%" bgcolor="#EAEAEA" style="text-align:center;">收款方式</td>
                <td width="20%" bgcolor="#EAEAEA" style="text-align:center;">付款单备注</td>
            </tr>
            <{foreach $getPaymentNotice as $val}>
                <tr>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.notice_sn}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.pay_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;">&yen;<{$val.money|string_format:"%.2f"}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.payment_name}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.memo}></td>
                </tr>
            <{/foreach}>
        </table>
    <{/if}>
    
    <{if $getDealCoupon}>
    <table width="100%" border="0" height="5"><tr><td></td></tr></table>
         <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
            <tr>
                <td height="20" bgcolor="#cdcdcd" style="text-align:center;font-weight:bold;" colspan="10"><span class="attention_text">本单团购券</span></td>
            </tr>
            <tr>
                <td width="8%" height="20" bgcolor="#EAEAEA" style="text-align:center;">序列号</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">密码</td>
                <td width="10%" bgcolor="#EAEAEA" style="text-align:center;">团购项目</td>
                <td width="10%" bgcolor="#EAEAEA" style="text-align:center;">会员名称</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">发放状态</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">商家</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">生效时间</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">过期时间</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">确认时间</td>
                <td width="15%" bgcolor="#EAEAEA" style="text-align:center;">操作</td>
            </tr>
            <{foreach $getDealCoupon as $val}>
                <tr>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.sn}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.password}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.order_deal_name}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.user_name}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.is_valid|replace:'0':'未发放'|replace:'1':'已发放'}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.supplier_name}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.begin_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.end_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;">
                    	<{if !$val.confirm_time}>
                        	未使用
                        <{else}>
                        	<{$val.confirm_time|date_format:"%Y-%m-%d %H:%M:%S"}>
                        <{/if}>
                    </td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><a href="?act=view_order&edit=mod&id=<{$var.id}>">短信通知</a> | <a href="?act=add_deliveryArea&edit=mod&id=<{$var.id}>">邮件通知</a> | <a href="?act=view_order&id=<{$getDealOrder.id}>&cid=<{$val.id}>&edit=del" id="del" onClick="return confirm('确定要删除<{$var.sn}>吗？')">删除</a></td>
                </tr>
            <{/foreach}>
        </table>
    <{/if}>
    
    <{if $getMessage}>
    <table width="100%" border="0" height="5"><tr><td></td></tr></table>
         <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
            <tr>
                <td height="20" bgcolor="#cdcdcd" style="text-align:center;font-weight:bold;" colspan="10"><span class="attention_text">订单留言<span></td>
            </tr>
            <tr>
                <td width="12%" height="20" bgcolor="#EAEAEA" style="text-align:center;">留言内容</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">留言时间</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">回复时间</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">会员名称</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">城市名称</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">是否仅会员可见</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">类型</td>
            </tr>
            <{foreach $getMessage as $val}>
                <tr>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.title}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.create_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.update_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.user_name}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.city_name}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.is_member|replace:"0":"是"|replace:"1":"否"}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.group_name}></td>
                </tr>
            <{/foreach}>
        </table>
    <{/if}>
    
</div>

<div class="hide" id="content_6">
<{if $getDealOrder.order_status!=1}>
<form name="mod_viewOrder" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getDealOrder.id}>&edit=mod_viewOrder">
	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
        <tr>
        	<td width="18%" height="25" bgcolor="#EAEAEA" class="table_left_title">管理员操作：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">
            <label>已退款:<input type="checkbox" id="refund_money_cbo" name="after_sale[]" value="1"  <{if $getDealOrder.after_sale==1 || $getDealOrder.after_sale==3}> checked="checked" <{/if}> /></label>
			<label>已退货:<input type="checkbox" name="after_sale[]" value="2"  <{if $getDealOrder.after_sale==2 || $getDealOrder.after_sale==3}> checked="checked" <{/if}> /></label>
            <label id="refund_money">退款金额:<input type="text" class="textbox" name="refund_money" size=8 value="<{$getDealOrder.refund_money}>" id="refund_money_box" ref="<{$getDealOrder.pay_amount}>" /></label>
            </td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">管理员备注：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5"><textarea class="textarea" name="admin_memo" ><{$getDealOrder.admin_memo}></textarea></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title"></td>
           <td width="82%" height="20" bgcolor="f5f5f5"><input type="submit" name="mod" class="admin_button" value="提交"/></td>
    </table>
    <input type="hidden" name="id" value="<{$getDealOrder.id}>">
 </form>
<{else}>
	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">售后操作：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.after_sale|replace:0:'正常结单'|replace:1:'已退款'|replace:2:'已退货'|replace:3:'已退款,已退货'}></td>
        </tr>
         <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">管理员备注：</td>
        	<td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.admin_memo}></td>
        </tr>
    </table>
<{/if}>
</div>
</div>
<div style="border:solid 1px #CDCDCD;padding:5px;margin-top:5px;">
    	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  			<tr>
    			<td width="18%" bgcolor="#EAEAEA"></td>
    			<td width="82%" bgcolor="f5f5f5">
                <table width="164" border="0" cellspacing="3" cellpadding="0">
      				<tr>
        				<td><input type="button" class="admin_button" value="返回列表" onClick="window.location.href='main.php?act=deal_orders'"/></td>
      				</tr>
    			</table>
                </td>
 			 </tr>
    	 </table>
 </div>
<input type="hidden" name="act" value="<{$act}>">
</body>
</html>
