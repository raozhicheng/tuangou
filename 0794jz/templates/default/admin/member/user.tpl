<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript">
  $(function () { 
	 $("#dels").click(function () {
                 $("form:eq(0)").attr("action", "main.php?act=user&edit=delAll").submit();
      });
     $("#search").click(function () {
                $("form:eq(0)").attr("action", "main.php?act=user&edit=search").submit();
      });
   });

</script>
<body>
<form method="post"  enctype="multipart/form-data" action="">
<div id="location"><div style="float:left"><strong>����Ա����</strong></div>
	<div id="search_bar"><input type="text" name="search_text"  class="input_box">&nbsp;<input name="search" type="submit" id="search" value="����"></div>
</div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>

<div id="list">
<{if !$users}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">���޻�Ա�б�</strong></div></td>
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
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="13%" bgcolor="#EAEAEA"><div align="center"><strong>��Ա����</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
     <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>״̬</strong></div></td>
    <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>��Ա����</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>�Ƽ���</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>����½</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>����½ʱ��</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <{foreach $users as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.user_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.score}>����</div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.status|replace:1:'��Ч'|replace:0:'��Ч'}></div></td>
    <td bgcolor="f5f5f5"><div align="center">&yen;<{$var.money|string_format:"%.2f"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.group_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center">
    <{if $var.pid==0}>
    	����
    <{else}>
    <{foreach $users as $tmp}>
         <{if $var.pid==$tmp.id}>
    		<{$tmp.user_name}>
    	 <{/if}>
    <{/foreach}>
    <{/if}>
    </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.login_ip}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{if $var.login_time}><{$var.login_time|date_format:"%Y-%m-%d %H:%M:%S"}><{else}>����<{/if}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=add_user&edit=mod&id=<{$var.id}>">�༭</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?act=user&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('ȷ��Ҫɾ��<{$var.name}>��')">ɾ��</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?act=user_log&id=<{$var.id}>">��־</a></div></td>
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
              <td><input type="button" name="add" class="admin_button" value="����" onClick="window.location.href='main.php?act=add_user&edit=add'"/></td>
              <{if $pageinfo.row_total}><td><input type="submit" name="dels" id="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�еķ�����?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">��<{$pageinfo.row_total}>����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          ��һҳ
          <{else}>
          <a href="?act=user&page=1">��һҳ</a>
          <{/if}>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=user&page=<{$pageinfo.prev_page}>">��һҳ</a>
          <{else}>��һҳ<{/if}>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=user&page=<{$pageinfo.next_page}>">��һҳ</a>
            <{else}>��һҳ<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            ���һҳ
            <{else}>
            <a href="?act=user&page=<{$pageinfo.page_num}>">���һҳ</a>
            <{/if}>
            &nbsp;&nbsp;��&nbsp;&nbsp;��ǰ��<{$pageinfo.current_page}>ҳ&nbsp;&nbsp;</div>
            <{/if}>
            </td>
        </tr>
      </table>
      <div align="center"></div></td>
    </tr>
</table>

</div>
</form>
</body>
</html>
