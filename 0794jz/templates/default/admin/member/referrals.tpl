<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>����������</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="main.php?act=referrals&edit=delAll">
<div id="list">
<{if !$referrals}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">���޷����б�</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="15%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="ȫѡ"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="��ѡ"></div></td>
          <td><div align="center"><input type="button" id="noall" value="ȫ��"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>�Ƽ���</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>������</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>�������</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>��������</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>������</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>�µ�ʱ��</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>��������ʱ��</strong></div></td>
    <td width="25%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <{foreach $referrals as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.user_id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.rel_user_id}></div></td>
    <td bgcolor="f5f5f5"><div align="center">��<{$var.money|string_format:"%.2f"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.score}></div></td>
     <td bgcolor="f5f5f5"><div align="center"><{$var.order_id}></div></td>
      <td bgcolor="f5f5f5"><div align="center"><{$var.create_time|date_format:"%Y-%m-%d %H:%M:%S"}></div></td>
       <td bgcolor="f5f5f5"><div align="center"><{$var.pay_time|date_format:"%Y-%m-%d %H:%M:%S"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=referrals&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('ȷ��Ҫɾ��<{$var.name}>��')">����ɾ��</a></div></td>
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
          <a href="?act=referrals&page=1">��һҳ</a>
          <{/if}>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=referrals&page=<{$pageinfo.prev_page}>">��һҳ</a>
          <{else}>��һҳ<{/if}>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=referrals&page=<{$pageinfo.next_page}>">��һҳ</a>
            <{else}>��һҳ<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            ���һҳ
            <{else}>
            <a href="?act=referrals&page=<{$pageinfo.page_num}>">���һҳ</a>
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
</form>
</div>
</body>
</html>