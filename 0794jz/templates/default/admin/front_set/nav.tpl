<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>������������</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="main.php?act=infos&edit=delAll">
<div id="list">
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="23%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>״̬</strong></div></td>
    <td width="17%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>�´���</strong></div></td>
    <td width="25%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <{foreach $nav as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.status|replace:1:'��Ч'|replace:0:'��Ч'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.rank}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_newWindow|replace:1:'��'|replace:0:'��'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=mod_nav&id=<{$var.id}>&edit=mod">�༭</a></div></td>
  </tr>
  <{/foreach}>
  </table>


</form>
</div>
</body>
</html>
