<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>��֧���ӿ��б�</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="?act=payment">
<div id="list">
<{if !$payments}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">�����б�</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="cdcdcd">
  <tr>
   
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>֧���ӿ�����</strong></div></td>
     <td width="20%" bgcolor="#EAEAEA"><div align="center"><strong>֧����ʽ�������</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>�Ƿ�����֧��</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>״̬</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>���տ���</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <{foreach $payments as $var}>
  <tr>
    
    <td bgcolor="f5f5f5"><div align="center"><{$var.name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.description}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.online_pay|replace:1:'��'|replace:0:'��'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.status|replace:1:'��Ч'|replace:0:'��Ч'}></div></td>
    <td bgcolor="f5f5f5"><div align="center">��<{$var.total_amount|string_format:"%.2f"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.sort}></div></td>
     <td bgcolor="f5f5f5"><div align="center">
     <{if $var.installed}>
     <a href="?act=edit_payment&edit=mod&id=<{$var.id}>">�༭</a> 
     <{else}>
     <a href="?act=payment&edit=install&id=<{$var.id}>">��װ</a>
     <{/if}>
     </div></td>
    
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
          <a href="?act=receiving&page=1">��һҳ</a>
          <{/if}>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=receiving&page=<{$pageinfo.prev_page}>">��һҳ</a>
          <{else}>��һҳ<{/if}>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=receiving&page=<{$pageinfo.next_page}>">��һҳ</a>
            <{else}>��һҳ<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            ���һҳ
            <{else}>
            <a href="?act=receiving&page=<{$pageinfo.page_num}>">���һҳ</a>
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
