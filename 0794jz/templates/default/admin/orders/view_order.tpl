<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<link href="css/dialog.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(function()
{
//TABѡ��
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
	
	$(window).resize(function() {//ҳ�洰�ڴ�С�ı��¼�
                if (!$(".dialog").is(":visible")) {
                    return;
                }
                showDialog(); //������ʾ�Ի����Top��Left
            });

            $(".title img").click(function() { //ע��ر�ͼƬ����¼�
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
                var objW = $(window); //��ǰ����
                var objC = $(".dialog"); //�Ի���
                var brsW = objW.width();
                var brsH = objW.height();
                var sclL = objW.scrollLeft();
                var sclT = objW.scrollTop();
                var curW = objC.width();
                var curH = objC.height();
                //����Ի������ʱ����߾�
                var left = sclL + (brsW - curW) / 2;
                //����Ի������ʱ���ϱ߾�
                var top = sclT + (brsH - curH) / 2;
                //���öԻ�����ҳ���е�λ��
                objC.css({ "left": left, "top": top });
            }

            
			
function openDialog(o){
		this.blur();
		$(".mask").show(); //��ʾ����ɫ
        showDialog(); //������ʾ�Ի����Top��Left
        $(".dialog").show(); //��ʾ��ʾ�Ի���
		$("#load").css("display","block");
		$("#frame").css("display","none");
		$("#frame").attr("src","main.php?act=order_incharge&id="+$(o).attr("id"));
}
function openDeliveryDialog(o){
		this.blur();
		$(".mask").show(); //��ʾ����ɫ
        showDialog(); //������ʾ�Ի����Top��Left
        $(".dialog").show(); //��ʾ��ʾ�Ի���
		$("#load").css("display","block");
		$("#frame").css("display","none");
		$("#frame").attr("src","main.php?act=delivery&id="+$(o).attr("id"));
		$(".title span").html("��������");
}

			
</script>
<body>
<div id="location"><strong>��������ϸ����</strong></div>
	 <div class="mask"></div>
     <div class="dialog">
          <div class="title">
               <img src="images/close.gif" alt="������Թر�" /><span>����Ա�տ�</span>
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
        	<li><a href="#" title="content_1">������Ϣ</a></li>
            <li><a href="#" title="content_2">֧����Ϣ</a></li>
            <{if $getDealOrder.delivery_id>0}>
            	<li><a href="#" title="content_3">������Ϣ</a></li>
            <{/if}>
            <li><a href="#" title="content_4">������Ϣ</a></li>
            <li><a href="#" title="content_5">�б���</a></li>
            <li><a href="#" title="content_6">�ۺ����</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    
    <div id="content">
    <div class="show" id="content_1">

<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�����ţ�</td>
    <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.order_sn}></td>
  </tr>
    <tr>
    <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�µ���Ա��</td>
    <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.user_name}></td>
  </tr>
 
  <tr>
    <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">����״̬��</td>
    <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.pay_status|replace:1:'����֧��'|replace:0:'δ֧��'|replace:2:'ȫ��֧��'}>
    <{if $getDealOrder.pay_status!=2}>
    	<input type="button" value="����Ա�տ�" id="<{$getDealOrder.id}>" onClick="openDialog(this)"/>
    <{/if}>
    </td>
  </tr>
   <tr>
    <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">����״̬��</td>
    <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.delivery_status|replace:0:'δ����'|replace:1:'���ݷ���'|replace:2:'ȫ������'|replace:5:'���跢��'}></td>
  </tr>
  <tr>
    <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�ᵥ������</td>
    <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.order_status|replace:1:'�����ᵥ'|replace:0:'δ�ᵥ'}>
    <{if $getDealOrder.pay_status==2 && $getDealOrder.delivery_status==2 || $getDealOrder.delivery_status==5 || $getDealOrder.pay_amount==$getDealOrder.refund_money}>
        <{if $getDealOrder.order_status}>
        	<input type="button" value="���Ŷ���" onClick="window.location.href='main.php?act=view_order&id=<{$getDealOrder.id}>&edit=open_order'"/>
        <{else}>
        	<input type="button" value="�ᵥ" onClick="window.location.href='main.php?act=view_order&id=<{$getDealOrder.id}>&edit=finish_order'"/>
        <{/if}>
    <{/if}></td>
  </tr>
   <tr>
    <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�µ�ʱ�䣺</td>
    <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.create_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
  </tr>

    </table></td>
  </tr>
</table>
</div>

<div class="hide" id="content_2">
	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">Ӧ���ܶ</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.total_price|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">���ս�</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.pay_amount|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">��Ʒ�ܶ</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.deal_total_price|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�û��ۿۣ�</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.discount_price|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">���֧����</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.account_money|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">����ȯ֧����</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.ecv_money|string_format:"%.2f"}></td>
        </tr>
        <{if $getDealOrder.payment_id>0}>
            <tr>
                <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�տʽ��</td>
                <td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.payment_name}></td>
            </tr>
            <tr>
                <td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�����ѣ�</td>
                <td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.payment_fee}></td>
            </tr>
        <{/if}>
        
	</table>
</div>
<{if $getDealOrder.delivery_id>0}>
    <div class="hide" id="content_3">
    	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
    	 <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">���ͷ�ʽ��</td>
        	<td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.delivery_name}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�˷ѣ�</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.delivery_fee|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">���͵�����</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">ʡ��<{$getDealOrder.region_lv1_name}>&nbsp;&nbsp;|&nbsp;&nbsp;�У�<{$getDealOrder.region_lv2_name}>&nbsp;&nbsp;|&nbsp;&nbsp;����<{$getDealOrder.region_lv3_name}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">���͵�ַ��</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.address}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�ʱࣺ</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.zip}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�ջ��ˣ�</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.consignee}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�ջ����ֻ���</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.mobile}></td>
        </tr>
        </table>
    </div>
<{/if}>
<div class="hide" id="content_4">
	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
    	 <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�����ֽ�</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.return_total_money|string_format:"%.2f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�������֣�</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">&yen;<{$getDealOrder.return_total_score|string_format:"%.0f"}></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">������ע��</td>
        	<td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.memo}></td>
        </tr>
    </table>
</div>

<div class="hide" id="content_5">
	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
    	<tr>
        	<td height="20" bgcolor="#cdcdcd" style="text-align:center;font-weight:bold;" colspan="6"><span class="attention_text">�Ź���Ʒ�б�</span></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" style="text-align:center;">�Ź���Ʒ����</td>
            <td width="12%" bgcolor="#EAEAEA" style="text-align:center;">����</td>
            <td width="10%" bgcolor="#EAEAEA" style="text-align:center;">����</td>
            <td width="10%" bgcolor="#EAEAEA" style="text-align:center;">�ܼ�</td>
            <td width="20%" bgcolor="#EAEAEA" style="text-align:center;">��������</td>
            <td width="20%" bgcolor="#EAEAEA" style="text-align:center;">������ע</td>
        </tr>
        <{foreach $dealOrderItem as $val}>
        	<tr>
                <td height="20" bgcolor="f5f5f5" style="text-align:center;"><{$val.name}></td>
                <td bgcolor="f5f5f5" style="text-align:center;"><{$val.number}></td>
                <td bgcolor="f5f5f5" style="text-align:center;"><{$val.unit_price|string_format:"%.2f"}></td>
                <td bgcolor="f5f5f5" style="text-align:center;"><{$val.total_price|string_format:"%.2f"}></td>
                <td bgcolor="f5f5f5" style="text-align:center;">
                	<{if !$val.is_delivery}>
                    	���跢��
                    <{else}>
                    	<{if !$val.delivery_status}>
                        	<input type="button" value="����" id="<{$getDealOrder.id}>" onClick="openDeliveryDialog(this)"/>
                        <{else}>
                        	ȫ������<br>
                            �������ţ�<{$val.notice_sn}><br>
                            <span class="attention_text"><{$val.is_arrival|replace:"1":"���յ���"|replace:"0":"δ�յ���"}></span>
                            <{if $val.is_arrival}>
                            &nbsp;����ʱ�䣺<{$val.arrival_time|date_format:"%Y-%m-%d %H:%M:%S"}>
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
                <td height="20" bgcolor="#cdcdcd" style="text-align:center;font-weight:bold;" colspan="5"><span class="attention_text">����б�</span></td>
            </tr>
            <tr>
                <td width="15%" height="20" bgcolor="#EAEAEA" style="text-align:center;">�����</td>
                <td width="12%" bgcolor="#EAEAEA" style="text-align:center;">֧��ʱ��</td>
                <td width="10%" bgcolor="#EAEAEA" style="text-align:center;">������</td>
                <td width="10%" bgcolor="#EAEAEA" style="text-align:center;">�տʽ</td>
                <td width="20%" bgcolor="#EAEAEA" style="text-align:center;">�����ע</td>
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
                <td height="20" bgcolor="#cdcdcd" style="text-align:center;font-weight:bold;" colspan="10"><span class="attention_text">�����Ź�ȯ</span></td>
            </tr>
            <tr>
                <td width="8%" height="20" bgcolor="#EAEAEA" style="text-align:center;">���к�</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">����</td>
                <td width="10%" bgcolor="#EAEAEA" style="text-align:center;">�Ź���Ŀ</td>
                <td width="10%" bgcolor="#EAEAEA" style="text-align:center;">��Ա����</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">����״̬</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">�̼�</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">��Чʱ��</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">����ʱ��</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">ȷ��ʱ��</td>
                <td width="15%" bgcolor="#EAEAEA" style="text-align:center;">����</td>
            </tr>
            <{foreach $getDealCoupon as $val}>
                <tr>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.sn}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.password}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.order_deal_name}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.user_name}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.is_valid|replace:'0':'δ����'|replace:'1':'�ѷ���'}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.supplier_name}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.begin_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.end_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;">
                    	<{if !$val.confirm_time}>
                        	δʹ��
                        <{else}>
                        	<{$val.confirm_time|date_format:"%Y-%m-%d %H:%M:%S"}>
                        <{/if}>
                    </td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><a href="?act=view_order&edit=mod&id=<{$var.id}>">����֪ͨ</a> | <a href="?act=add_deliveryArea&edit=mod&id=<{$var.id}>">�ʼ�֪ͨ</a> | <a href="?act=view_order&id=<{$getDealOrder.id}>&cid=<{$val.id}>&edit=del" id="del" onClick="return confirm('ȷ��Ҫɾ��<{$var.sn}>��')">ɾ��</a></td>
                </tr>
            <{/foreach}>
        </table>
    <{/if}>
    
    <{if $getMessage}>
    <table width="100%" border="0" height="5"><tr><td></td></tr></table>
         <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
            <tr>
                <td height="20" bgcolor="#cdcdcd" style="text-align:center;font-weight:bold;" colspan="10"><span class="attention_text">��������<span></td>
            </tr>
            <tr>
                <td width="12%" height="20" bgcolor="#EAEAEA" style="text-align:center;">��������</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">����ʱ��</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">�ظ�ʱ��</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">��Ա����</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">��������</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">�Ƿ����Ա�ɼ�</td>
                <td width="8%" bgcolor="#EAEAEA" style="text-align:center;">����</td>
            </tr>
            <{foreach $getMessage as $val}>
                <tr>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.title}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.create_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.update_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.user_name}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.city_name}></td>
                    <td bgcolor="#f5f5f5" style="text-align:center;"><{$val.is_member|replace:"0":"��"|replace:"1":"��"}></td>
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
        	<td width="18%" height="25" bgcolor="#EAEAEA" class="table_left_title">����Ա������</td>
        	<td width="82%" height="20" bgcolor="f5f5f5">
            <label>���˿�:<input type="checkbox" id="refund_money_cbo" name="after_sale[]" value="1"  <{if $getDealOrder.after_sale==1 || $getDealOrder.after_sale==3}> checked="checked" <{/if}> /></label>
			<label>���˻�:<input type="checkbox" name="after_sale[]" value="2"  <{if $getDealOrder.after_sale==2 || $getDealOrder.after_sale==3}> checked="checked" <{/if}> /></label>
            <label id="refund_money">�˿���:<input type="text" class="textbox" name="refund_money" size=8 value="<{$getDealOrder.refund_money}>" id="refund_money_box" ref="<{$getDealOrder.pay_amount}>" /></label>
            </td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">����Ա��ע��</td>
        	<td width="82%" height="20" bgcolor="f5f5f5"><textarea class="textarea" name="admin_memo" ><{$getDealOrder.admin_memo}></textarea></td>
        </tr>
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title"></td>
           <td width="82%" height="20" bgcolor="f5f5f5"><input type="submit" name="mod" class="admin_button" value="�ύ"/></td>
    </table>
    <input type="hidden" name="id" value="<{$getDealOrder.id}>">
 </form>
<{else}>
	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
        <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">�ۺ������</td>
        	<td width="82%" height="20" bgcolor="f5f5f5"><{$getDealOrder.after_sale|replace:0:'�����ᵥ'|replace:1:'���˿�'|replace:2:'���˻�'|replace:3:'���˿�,���˻�'}></td>
        </tr>
         <tr>
        	<td width="18%" height="20" bgcolor="#EAEAEA" class="table_left_title">����Ա��ע��</td>
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
        				<td><input type="button" class="admin_button" value="�����б�" onClick="window.location.href='main.php?act=deal_orders'"/></td>
      				</tr>
    			</table>
                </td>
 			 </tr>
    	 </table>
 </div>
<input type="hidden" name="act" value="<{$act}>">
</body>
</html>
