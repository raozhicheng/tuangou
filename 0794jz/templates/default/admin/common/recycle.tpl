<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript">
  $(function () { 
	 $("#restore").click(function () {
                 $("form:eq(0)").attr("action", "main.php?act=<{$status}>&current=<{$current_table}>&edit=restore").submit();
      });
     $("#dels").click(function () {
                $("form:eq(0)").attr("action", "main.php?act=<{$status}>&current=<{$current_table}>&edit=del").submit();
      });
   });

</script>

<body>
<div id="location"><strong>������վ</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="">
 <div id="list">
 <div id="deal_menu">
    	<ul>
        	<{foreach $tables as $key=>$value}>
            
				<li <{if $current_table==$key}>class="deal_current"<{else}>class="deal_menu"<{/if}>><a href="?act=<{$status}>&current=<{$key}>" ><{$value.0}></a></li>
            
			<{/foreach}>
        </ul>
    </div>
 <div class="clear"></div>
<div id="content" class="show"> 
<{if !$recycle}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#cdcdcd">
  <tr>
	<td bgcolor="#F2F2F2"><div align="center"><strong  style="color:red">�ջ���վ</strong></div></td>
    </tr>
</table>
<{else}>

	
    	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#cdcdcd">
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
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="45%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <{foreach $recycle as $key=>$var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$name=$tables.$current_table.1}><{$var.$name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=<{$status}>&current=<{$current_table}>&id=<{$var.id}>&edit=restore">��ԭ</a> | <a href="?act=<{$status}>&page=<{$pageinfo.current_page}>&id=<{$var.id}>&current=<{$current_table}>&edit=del" onClick="return confirm('ȷ��Ҫɾ��<{$var.name}>��')">ɾ��</a></div></td>
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
          <td width="19%"> <table width="164" border="0" cellspacing="3" cellpadding="0">
            <tr>
           <td><input type="button" name="restore" id="restore" class="admin_button" value="��ԭ"/></td>
              <td><input type="submit" name="dels" id="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ����?')" /></td>
            </tr>
          </table></td>
          <td width="81%">
          <div align="right">��<{$pageinfo.row_total}>����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          ��һҳ
          <{else}>
          <a href="?act=<{$status}>&page=1&current=<{$current_table}>">��һҳ</a>
          <{/if}>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=<{$status}>&page=<{$pageinfo.prev_page}>&current=<{$current_table}>">��һҳ</a>
          <{else}>
          ��һҳ
          <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=<{$status}>&page=<{$pageinfo.next_page}>&current=<{$current_table}>">��һҳ</a>
            <{else}>
            ��һҳ
           <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            ���һҳ
            <{else}>
            <a href="?act=<{$status}>&page=<{$pageinfo.page_num}>&current=<{$current_table}>">���һҳ</a>
            <{/if}>
            &nbsp;&nbsp;��&nbsp;&nbsp;��ǰ��<{$pageinfo.current_page}>ҳ&nbsp;&nbsp;</div>
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
