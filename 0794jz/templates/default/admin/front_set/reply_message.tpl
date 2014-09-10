<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·回复留言</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="reply_message" method="post"  action="main.php?act=<{$status}>&id=<{$getMessages.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getMessages.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">留言标题：</td>
    <td width="82%" bgcolor="f5f5f5"><{$getMessages.title}></td>
  </tr>
   <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">留言内容：</td>
    <td width="82%" bgcolor="f5f5f5"><{$getMessages.content}></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;回复内容：</td>
    <td bgcolor="f5f5f5"><{$admin_reply}></td>
  </tr>
  
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">回复时间：</td>
    <td bgcolor="f5f5f5"><{$getMessages.update_time|date_format:"%Y-%m-%d %H:%M:%S"}></td>
  </tr>
    <tr>
    <td bgcolor="#EAEAEA">&nbsp;</td>
    <td bgcolor="f5f5f5"><table width="164" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td><input type="submit" name="reply" id="reply" class="admin_button" value="回复" /></td>
        <td><input type="reset" name="reset" class="admin_button" value="重置" id="reset" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<input name="is_delete" type="hidden" value="0" />
<input name="update_time" type="hidden" value="<{$smarty.now}>" />
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
