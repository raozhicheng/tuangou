<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript"> 
$(document).ready(function()
{
	$("#backup").click(function () {
				$("#list").hide();
				$("#hide").show();	
				return true;
	});
	
	$("#restore").click(function () {
				$("#list").hide();
				$("#hide_restore").show();	
				return true;
	});
});
</script>
<body>
<div id="location"><strong>�����ݿ��б�</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post" action="main.php?act=backup&edit=del">
<div id="list">
<{if !$database}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">�������ݿ��б�</strong></div></td>
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
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>�ļ���С</strong></div></td>
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>����ʱ��</strong></div></td>
    <td width="20%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <{foreach $database as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.0}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.0}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.1}></div></td>
     <td bgcolor="f5f5f5"><div align="center"><{$var.2}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=backup&page=<{$pageinfo.current_page}>&id=<{$var.0}>&edit=restore" id="restore">�ָ�</a> | <a href="?act=backup&page=<{$pageinfo.current_page}>&id=<{$var.0}>&edit=del" onClick="return confirm('ȷ��Ҫɾ��<{$var.0}>��')">ɾ��</a></div></td>
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
              <td><input type="button" name="backup" id="backup" class="admin_button" value="����" onClick="window.location.href='main.php?act=do_backup'"/></td>
               <{if $pageinfo.row_total}><td><input type="submit" name="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�е����ݰ���?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">��<{$pageinfo.row_total}>����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          ��һҳ
          <{else}>
          <a href="?act=backup&page=1">��һҳ</a>
          <{/if}>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=backup&page=<{$pageinfo.prev_page}>">��һҳ</a>
          <{else}>
          ��һҳ
          <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=backup&page=<{$pageinfo.next_page}>">��һҳ</a>
            <{else}>
            ��һҳ
           <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            ���һҳ
            <{else}>
            <a href="?act=backup&page=<{$pageinfo.page_num}>">���һҳ</a>
            <{/if}>
            &nbsp;&nbsp;��&nbsp;&nbsp;��ǰ��<{$pageinfo.current_page}>ҳ&nbsp;&nbsp;</div>
            <{/if}>
            </tr>
          </table></td>
         
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
    <td> ���ڱ�������.......</td>
    <td> <img src="images/loading.gif"></td>
  </tr>
</table>
</div>
<div id="hide_restore" style="display: none;" class="waiting">
 <table width="200" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td> ���ڻָ�����.......</td>
    <td> <img src="images/loading.gif"></td>
  </tr>
</table>
</div>
</body>
</html>
