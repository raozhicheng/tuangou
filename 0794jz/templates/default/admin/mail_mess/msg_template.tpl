<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·消息模版管理</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="?act=msg_template">
<div id="list">
<{if !$msgTemplates}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无模版</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="cdcdcd">
  <tr>
   <td width="20%" bgcolor="#EAEAEA"><div align="center"><strong>模板名称</strong></div></td>
    <td width="20%" bgcolor="#EAEAEA"><div align="center"><strong>英文名称</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>模版类型</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>是否是超文本</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <{foreach $msgTemplates as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center"><{$var.ch_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.type|replace:1:'支持超文本'|replace:0:'不支持超文本'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_html|replace:1:'是'|replace:0:'否'}></div></td>
     <td bgcolor="f5f5f5"><div align="center"><a href="?act=edit_msgTemplate&id=<{$var.id}>">编辑</a></td>
    
  </tr>
  <{/foreach}>
  </table>
<{/if}>

</div>
</form>
</body>
</html>
