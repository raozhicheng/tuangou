<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript"> 
$(document).ready(function()
{
	$(".send").click(function () {
				$("#list").hide();
				$("#hide").show();	
				return true;
	});
});
</script>
<link href="css/dialog.css" rel="stylesheet" type="text/css" />
<body>
<div id="location"><strong>��ҵ������б�</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post" action="main.php?act=msg_queue&edit=del">
<div id="list">
<{if !$deal_msg_list}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">����ҵ������б�</strong></div></td>
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
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>������</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>��Ա����</strong></div></td>
     <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>����ʱ��</strong></div></td>
     <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>����ʱ��</strong></div></td>
     <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>����״̬</strong></div></td>
     <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>�Ƿ�ɹ�</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>��Ϣ</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <{foreach $deal_msg_list as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.send_type|replace:1:"�ʼ�"|replace:0:"����"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.dest}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.user_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.create_time|date_format:"%Y-%m-%d %H:%M:%S"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.send_time|date_format:"%Y-%m-%d %H:%M:%S"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_send|replace:1:"��"|replace:0:"��"}></div></td>
   <td bgcolor="f5f5f5"><div align="center"><{$var.is_success|replace:1:"�ɹ�"|replace:0:"ʧ��"}></div></td>
   <td bgcolor="f5f5f5"><div align="center"><span title="<{$var.result}>" style="cursor:default"><{$var.result|truncate:29:"...":true}></span></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=msg_queue&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('ȷ��Ҫɾ��<{$var.name}>��')">ɾ��</a> | <a href="?act=send_deal_msg&id=<{$var.id}>&st=<{$var.send_type}>" class="send">����</a> | <span title="���⣺<{$var.title}>&#10;���ݣ�<{$var.content|strip_tags}>" style="cursor:default">�鿴</span></td>
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
              <{if $pageinfo.row_total}><td><input type="submit" name="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�е��б���?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">��<{$pageinfo.row_total}>����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          ��һҳ
          <{else}>
          <a href="?act=mail_server&page=1">��һҳ</a>
          <{/if}>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=mail_server&page=<{$pageinfo.prev_page}>">��һҳ</a>
          <{else}>
          ��һҳ
          <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=mail_server&page=<{$pageinfo.next_page}>">��һҳ</a>
            <{else}>
            ��һҳ
           <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            ���һҳ
            <{else}>
            <a href="?act=mail_server&page=<{$pageinfo.page_num}>">���һҳ</a>
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
    <td>���ڷ���.......</td>
    <td> <img src="images/loading.gif"></td>
  </tr>
</table>
</div>
</body>
</html>
