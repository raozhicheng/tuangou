<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>�����й����б�</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="main.php?act=city&edit=delAll">
<div id="list">
<{if !$cities}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">���޳����б�</strong></div></td>
    </tr>
</table>
<{else}>
 
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="13%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="ȫѡ"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="��ѡ"></div></td>
          <td><div align="center"><input type="button" id="noall" value="ȫ��"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="17%" bgcolor="#EAEAEA"><div align="center"><strong>�Ź�����</strong></div></td>
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>��ǰĬ�ϳ���</strong></div></td>
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>�Ƿ�ʼ��Ӫ</strong></div></td>
    <td width="14%" bgcolor="#EAEAEA"><div align="center"><strong>��ǰ״̬</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <{foreach $cities as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" <{if $pageinfo.row_total==1 || $var.is_default}>disabled<{/if}> value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_default|replace:1:'��'|replace:0:'��'}><{if !$var.is_default}><a href="main.php?act=set_default&id=<{$var.id}>" style="color:red">[����ΪĬ��]</a><{/if}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_open|replace:1:'��'|replace:0:'��'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.status|replace:1:'��Ч'|replace:0:'��Ч'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=add_city&edit=mod&id=<{$var.id}>">�༭</a>
     <{if $pageinfo.row_total>1 && !$var.is_default}>
     | <a href="?act=city&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('ȷ��Ҫɾ��<{$var.name|replace:'��':''|replace:'&nbsp;':''}>��')">ɾ��</a>
     <{/if}>
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
              <td><input type="button" name="add" class="admin_button" value="����" onClick="window.location.href='main.php?act=add_city&edit=add'"/></td>
             <{if $pageinfo.row_total}> <td><input type="submit" name="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�еĳ�����?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">��<{$pageinfo.row_total}>����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          ��һҳ
          <{else}>
          <a href="?act=city&page=1">��һҳ</a>
          <{/if}>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=city&page=<{$pageinfo.prev_page}>">��һҳ</a>
          <{else}>
          ��һҳ
          <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=city&page=<{$pageinfo.next_page}>">��һҳ</a>
            <{else}>
            ��һҳ
           <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            ���һҳ
            <{else}>
            <a href="?act=city&page=<{$pageinfo.page_num}>">���һҳ</a>
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
</body>
</html>
