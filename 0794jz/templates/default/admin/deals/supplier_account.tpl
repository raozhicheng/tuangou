<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}>>
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="main.php?act=supplier_account&page=<{$pageinfo.current_page}>&id=<{$supplier_id}>&edit=delAll">
<div id="list">
<{if !$getAccount}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">�����ʺ��б�</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%"  border="0" cellpadding="4" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="10" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="checkbox" name="" id="all_or_no" ></div></td>
        </tr>
      </table>
    </div></td>
    <td width="35" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="75" bgcolor="#EAEAEA"><div align="center"><strong>�ʺ�</strong></div></td>
    <td width="100" bgcolor="#EAEAEA"><div align="center"><strong>˵��</strong></div></td>
    <td width="45" bgcolor="#EAEAEA"><div align="center"><strong>״̬</strong></div></td>
     <td width="85" bgcolor="#EAEAEA"><div align="center"><strong>��¼IP</strong></div></td>
      <td width="80" bgcolor="#EAEAEA"><div align="center"><strong>��¼ʱ��</strong></div></td>
      <td width="90" bgcolor="#EAEAEA"><div align="center"><strong>����ʱ��</strong></div></td>
    <td width="90" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <{foreach $getAccount as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><span style="cursor:default"><{$var.id}></span></div></td>
    <td bgcolor="f5f5f5"><div align="center"><span title="<{$var.account_name}>" style="cursor:default"><{$var.account_name|truncate:9:"...":true}></span></div></td>
    <td bgcolor="f5f5f5"><div align="center"><span title="<{$var.description}>" style="cursor:default"><{$var.description|truncate:13:"...":true}></span></div></td>
    <td bgcolor="f5f5f5"><div align="center"><span style="cursor:default"><{$var.status|replace:0:'��Ч'|replace:1:'��Ч'}></span></div></td>
    <td bgcolor="f5f5f5"><div align="center"><span style="cursor:default"><{$var.login_ip}></span></div></td>
     <td bgcolor="f5f5f5"><div align="center"><span style="cursor:default"><{$var.login_time|replace:0:'����'}></span></div></td>
     <td bgcolor="f5f5f5"><div align="center"><span  title="<{$var.update_time|date_format:"%Y-%m-%d %H:%M:%S"}>" style="cursor:default"><{$var.update_time|date_format:"%Y-%m-%d %H:%M"|truncate:11:"":true}></span></div></td>
    
    <td bgcolor="f5f5f5"><div align="center">
      <a href="?act=add_supplierAccount&edit=mod&supplier_id=<{$supplier_id}>&id=<{$var.id}>">�༭</a> | <a href="?act=supplier_account&page=<{$pageinfo.current_page}>&supplier_id=<{$supplier_id}>&id=<{$var.id}>&edit=del" onClick="return confirm('ȷ��Ҫɾ��<{$var.account_name}>��')">ɾ��</a>
     
     </td>
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
              <td><input type="button" name="add" class="admin_button" value="����" onClick="window.location.href='main.php?act=add_supplierAccount&edit=add&id=<{$supplier_id}>'"/></td>
           <{if $pageinfo.row_total}><td><input type="submit" id="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�е��ʺ���?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">��<{$pageinfo.row_total}>����¼&nbsp;|&nbsp;
          <{if $pageinfo.current_page==1}>
          ��һҳ
          <{else}>
          <a href="?act=supplier_account&page=1&id=<{$id}>">��һҳ</a>
          <{/if}>
&nbsp;��&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=supplier_account&page=<{$pageinfo.prev_page}>&id=<{$id}>">��һҳ</a>
          <{else}>��һҳ<{/if}>
        &nbsp;|&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=supplier_account&page=<{$pageinfo.next_page}>&id=<{$id}>">��һҳ</a>
            <{else}>��һҳ<{/if}>
            &nbsp;|&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            ���һҳ
            <{else}>
            <a href="?act=supplier_account&page=<{$pageinfo.page_num}>&id=<{$id}>">���һҳ</a>
            <{/if}>
           &nbsp;��&nbsp;��ǰ��<{$pageinfo.current_page}>ҳ&nbsp;</div>
            <{/if}>
            </td>
        </tr>
      </table>
      <div align="center"></div></td>
    </tr>
</table>
<input name="supplier_id" type="hidden" value="<{$supplier_id}>" />
</form>
</div>
</body>
</html>
