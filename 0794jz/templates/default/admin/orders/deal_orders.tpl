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
<div id="location"><div style="float:left"><strong>��<{$title}></strong></div>
	<{if $status!="deal_orders_log"}>
        <div id="search_bar">
        �����ţ�<input type="text" name="search_text"  class="input_box">
        <{if $status=="deal_orders"}>
            <select name="pay_status">
                    <option value="-1" selected="selected">����֧��</option>
                    <option value="0" >δ֧��</option>
                    <option value="1" >����֧��</option>
                    <option value="2" >ȫ��֧��</option>			
            </select>
            <select name="delivery_status">
                    <option value="-1" selected="selected">��������</option>
                    <option value="0" >δ����</option>
                    <option value="1" >���ݷ���</option>
                    <option value="2" >ȫ������</option>
                    <option value="5" >���跢��</option>			
            </select>
            <select name="extra_status">
                    <option value="-1" selected="selected">���ж���</option>
                    <option value="0" >����</option>
                    <option value="1" >�����˿�</option>
                    <option value="2" >����ʧ���˿�</option>
            </select>
            <select name="order_status">
                    <option value="-1" selected="selected">�ᵥ״̬</option>
                    <option value="0" >δ�ᵥ</option>
                    <option value="1" >�����ᵥ</option>
            </select>
          <{/if}>
            <input name="search" type="submit" id="search" value="����"></div>
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
				<li <{if $status=="deal_orders"}>class="deal_current"<{else}>class="deal_menu"<{/if}>><a href="?act=deal_orders">�Ź�����</a></li>
                <li <{if $status=="recharge_orders"}>class="deal_current"<{else}>class="deal_menu"<{/if}>><a href="?act=recharge_orders">��ֵ����</a></li>
                <li <{if $status=="deal_orders_log"}>class="deal_current"<{else}>class="deal_menu"<{/if}>><a href="?act=deal_orders_log">������־</a></li>
        </ul>
    </div>
 <div class="clear"></div>
<{if $status!="deal_orders_log"}>
<div id="content" class="show"> 
<{if !$deal_orders}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">�����б�</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="8%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="ȫѡ"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="��ѡ"></div></td>
          <td><div align="center"><input type="button" id="noall" value="ȫ��"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="13%" bgcolor="#EAEAEA"><div align="center"><strong>������</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>��Ա����</strong></div></td>
    <{if $status=="deal_orders"}>
     <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>Ӧ���ܶ�</strong></div></td>
    <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>�Ѹ����</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>�µ�ʱ��</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>֧��״̬</strong></div></td>
     <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>����״̬</strong></div></td>
     <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>��������״̬</strong></div></td>
      <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>�ۺ����</strong></div></td>
      <{else}>
       <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>���ս��</strong></div></td>
   	   <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>Ӧ���ܶ�</strong></div></td>
       <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>֧����ʽ</strong></div></td>
       <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>֧��״̬</strong></div></td>
      <{/if}>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
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
    <td bgcolor="f5f5f5"><div align="center"><{$var.pay_status|replace:1:'����֧��'|replace:0:'δ֧��'|replace:2:'ȫ��֧��'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.delivery_status|replace:0:'δ����'|replace:1:'���ַ���'|replace:2:'ȫ������'|replace:5:'���跢��'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.extra_status|replace:0:'����'|replace:1:'�����˿�'|replace:2:'����ʧ���˿�'}></div></td>
     <td bgcolor="f5f5f5"><div align="center">
     	<{if $var.order_status}>
        	<{$var.after_sale|replace:0:'�����ᵥ'|replace:1:'���˿�'|replace:2:'���˻�'|replace:3:'���˿�,���˻�'}>
        <{else}>
     		δ�ᵥ
        <{/if}>
     </div>
     </td>
      <td bgcolor="f5f5f5"><div align="center"><{if $var.order_status==0}><a href="?act=view_order&id=<{$var.id}>">������</a><{elseif $var.order_status==1}><a href="?act=view_order&id=<{$var.id}>">�鿴</a> | <a href="?act=deal_orders&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('ȷ��Ҫɾ��<{$var.order_sn}>��')">ɾ��</a><{/if}></div></td>
      <{else}>
      <td bgcolor="f5f5f5"><div align="center">&yen;<{$var.deal_total_price|string_format:"%.2f"}></div></td>
       <td bgcolor="f5f5f5"><div align="center">&yen;<{$var.total_price|string_format:"%.2f"}></div></td>
        <td bgcolor="f5f5f5"><div align="center"><{$var.payment_id|replace:1:'���֧��'|replace:2:'֧����֧��'|replace:3:'�Ƹ�ͨ'|replace:4:'����ȯ֧��'|replace:5:'��������'}></div></td>
         <td bgcolor="f5f5f5"><div align="center"><{$var.pay_status|replace:1:'����֧��'|replace:0:'δ֧��'|replace:2:'ȫ��֧��'}></div></td>
         <td bgcolor="f5f5f5"><div align="center"><{if $var.pay_status!=2}><a href="?act=recharge_orders&edit=pay_incharge&id=<{$var.id}>">����Ա�տ�</a>&nbsp;&nbsp;|&nbsp;&nbsp;<{/if}><a href="?act=recharge_orders&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('ȷ��Ҫɾ������<{$var.order_sn}>��')">ɾ��</a></div></td>
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
              <td><input type="submit" name="dels" id="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�еķ�����?')" /></td>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">��<{$pageinfo.row_total}>����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          ��һҳ
          <{else}>
          <a href="?act=<{$status}>&page=1">��һҳ</a>
          <{/if}>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=<{$status}>&page=<{$pageinfo.prev_page}>">��һҳ</a>
          <{else}>��һҳ<{/if}>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=<{$status}>&page=<{$pageinfo.next_page}>">��һҳ</a>
            <{else}>��һҳ<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            ���һҳ
            <{else}>
            <a href="?act=<{$status}>&page=<{$pageinfo.page_num}>">���һҳ</a>
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

<{else}>
    <div id="list">
    <{if !$deal_orders_log}>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
      <tr>
        <td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">������־�б�</strong></div></td>
        </tr>
    </table>
    <{else}>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
      <tr>
        <td width="5%" bgcolor="#EAEAEA"><div align="center">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><div align="center"><input type="button" id="all" value="ȫѡ"></div></td>
              <td><div align="center"><input type="button" id="reverse" value="��ѡ"></div></td>
              <td><div align="center"><input type="button" id="noall" value="ȫ��"></div></td>
            </tr>
          </table>
        </div></td>
        <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
        <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>��־��Ϣ</strong></div></td>
        <td width="13%" bgcolor="#EAEAEA"><div align="center"><strong>����ʱ��</strong></div></td>
        <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>����IP</strong></div></td>
        <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
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
        <td bgcolor="f5f5f5"><div align="center"><a href="?act=deal_orders_log&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('ȷ��Ҫɾ����')">����ɾ��</a></div></td>
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
                  <td><input type="submit" name="dels" class="admin_button" value="����ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�еķ�����?')" /></td>
                </tr>
              </table></td>
              <td width="81%">
              <{if $pageinfo.row_total}>
              <div align="right">��<{$pageinfo.row_total}>����¼&nbsp;&nbsp;|&nbsp;&nbsp;
              <{if $pageinfo.current_page==1}>
              ��һҳ
              <{else}>
              <a href="?act=deal_orders_log&page=1">��һҳ</a>
              <{/if}>
    &nbsp;&nbsp;��&nbsp;&nbsp;
              <{if $pageinfo.prev_page}>
              <a href="?act=deal_orders_log&page=<{$pageinfo.prev_page}>">��һҳ</a>
              <{else}>��һҳ<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
                <{if $pageinfo.next_page}>
                <a href="?act=deal_orders_log&page=<{$pageinfo.next_page}>">��һҳ</a>
                <{else}>��һҳ<{/if}>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <{if $pageinfo.current_page==$pageinfo.page_num}>
                ���һҳ
                <{else}>
                <a href="?act=deal_orders_log&page=<{$pageinfo.page_num}>">���һҳ</a>
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
<{/if}> 
</div>
</form>
</body>
</html>
