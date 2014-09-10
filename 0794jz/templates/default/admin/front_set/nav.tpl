<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·主导航管理</strong></div>
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
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="23%" bgcolor="#EAEAEA"><div align="center"><strong>名称</strong></div></td>
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>状态</strong></div></td>
    <td width="17%" bgcolor="#EAEAEA"><div align="center"><strong>排序</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>新窗口</strong></div></td>
    <td width="25%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <{foreach $nav as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.status|replace:1:'有效'|replace:0:'无效'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.rank}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_newWindow|replace:1:'是'|replace:0:'否'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=mod_nav&id=<{$var.id}>&edit=mod">编辑</a></div></td>
  </tr>
  <{/foreach}>
  </table>


</form>
</div>
</body>
</html>
