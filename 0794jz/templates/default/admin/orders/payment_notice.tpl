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
<div id="location"><div style="float:left"><strong>���������</strong></div>
	<div id="search_bar">����ţ�<input type="text" name="search_text"  class="input_box">
        <select name="payment_id">
				<option value="0" selected="selected">�����տʽ</option>
				<option value="1" >���֧��</option>
                <option value="2" >֧����֧��</option>
                <option value="4" >����ȯ֧��</option>
                <option value="5" >��������</option>		
		</select>
       
        <input name="search" type="submit" id="search" value="����"></div>
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
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">�����б�</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
   
    <td width="4%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>�����</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>����ʱ�� </strong></div></td>
     <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>֧��ʱ��</strong></div></td>
    <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>�Ƿ���֧��</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>������</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>��Ա����</strong></div></td>
     <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>�տʽ</strong></div></td>
     <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>������</strong></div></td>
      <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>�����ע</strong></div></td>
  </tr>
  <{foreach $getPaymentNotice as $var}>
  <tr>
    
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.notice_sn}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.create_time|date_format:"%Y-%m-%d %H:%M:%S"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.pay_time|date_format:"%Y-%m-%d %H:%M:%S"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_paid|replace:1:'��֧��'|replace:0:'δ֧��'}></div></td>
    <td bgcolor="f5f5f5"><div align="center">
        	<{if $var.deal_order_type==0}>
            	<span class="red">[�Ź�����]</span>
            <{elseif $var.deal_order_type==1}>
            	<span class="green">[��ֵ����]</span>
            <{/if}>
        	<{$var.deal_order_sn}>
            
    </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.user_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.payment_id|replace:1:'֧����֧��'|replace:2:'��������֧��'|replace:3:'�Ƹ�֧ͨ��'|replace:4:'���֧��'|replace:5:'����ȯ֧��'}></div></td>
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
          <div align="right">��<{$pageinfo.row_total}>����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          ��һҳ
          <{else}>
          <a href="?act=paymentNotice&page=1">��һҳ</a>
          <{/if}>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=paymentNotice&page=<{$pageinfo.prev_page}>">��һҳ</a>
          <{else}>��һҳ<{/if}>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=paymentNotice&page=<{$pageinfo.next_page}>">��һҳ</a>
            <{else}>��һҳ<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            ���һҳ
            <{else}>
            <a href="?act=paymentNotice&page=<{$pageinfo.page_num}>">���һҳ</a>
            <{/if}>
            &nbsp;&nbsp;��&nbsp;&nbsp;��ǰ��<{$pageinfo.current_page}>ҳ&nbsp;&nbsp;</div>
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
