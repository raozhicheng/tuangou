<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript"> 
$(document).ready(function()
{
	$("#mail").click(function () {
				$("#list").hide();
				$("#hide").show();	
				return true;
	});
	
	$("#sms").click(function () {
				$("#list").hide();
				$("#hide").show();	
				return true;
	});
});
</script>
<body>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="main.php?act=deal_coupon&edit=delAll&id=<{$id}>">
<div id="list">
<{if !$deal_coupons}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">�����Ź�ȯ�б�</strong></div></td>
    </tr>
</table>
<{else}>
 
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="5%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="ȫ" style="margin:0"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="��"  style="margin:0"></div></td>
          <td><div align="center"><input type="button" id="noall" value="��"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="14%" bgcolor="#EAEAEA"><div align="center"><strong>�Ź�ȯ���к�</strong></div></td>
    <td width="12%" bgcolor="#EAEAEA"><div align="center"><strong>������Ա</strong></div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <{foreach $deal_coupons as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox"  value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.sn}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{if $var.user_id}><{$var.user_name}><{else}>δ����<{/if}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_valid|replace:1:'<font color=green>��</font>'|replace:0:'<font color=red>δ</font>'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=add_dealCoupon&edit=mod&id=<{$var.id}>&cid=<{$id}>">�༭</a>&nbsp|&nbsp;<a href="?act=deal_coupon&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('ȷ��Ҫɾ��<{$var.name|replace:'��':''|replace:'&nbsp;':''}>��')">ɾ��</a>&nbsp|&nbsp;<a href="?act=send_coupon_sms&id=<{$var.id}>&cid=<{$id}>" id="sms">����</a>&nbsp|&nbsp;<a href="?act=send_coupon_mail&id=<{$var.id}>&cid=<{$id}>" id="mail">�ʼ�</a>
     </div></td>
  </tr>
  <{/foreach}>
  </table>
<{/if}>
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
              <td><input type="button" name="add" class="admin_button" value="����" onClick="window.location.href='main.php?act=add_dealCoupon&edit=add&cid=<{$id}>'"/></td>
             <{if $pageinfo.row_total}> <td><input type="submit" name="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�е���Ŀ��?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">��<{$pageinfo.row_total}>����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          ��һҳ
          <{else}>
          <a href="?act=deal_coupon&page=1&id=<{$id}>">��һҳ</a>
          <{/if}>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=deal_coupon&page=<{$pageinfo.prev_page}>&id=<{$id}>">��һҳ</a>
          <{else}>
          ��һҳ
          <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=deal_coupon&page=<{$pageinfo.next_page}>&id=<{$id}>">��һҳ</a>
            <{else}>
            ��һҳ
           <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            ���һҳ
            <{else}>
            <a href="?act=deal_coupon&page=<{$pageinfo.page_num}>&id=<{$id}>">���һҳ</a>
            <{/if}>
            &nbsp;&nbsp;��&nbsp;&nbsp;��ǰ��<{$pageinfo.current_page}>ҳ&nbsp;&nbsp;</div>
            <{/if}>
            </td>
        </tr>
      </table>
      <div align="center"></div></td>
    </tr>
</table>
</form>
</div>

<div id="hide" style="display: none;" class="waiting">
 <table width="200" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td> ���ڷ���.......</td>
    <td> <img src="images/loading.gif"></td>
  </tr>
</table>
</div>

</body>
</html>
