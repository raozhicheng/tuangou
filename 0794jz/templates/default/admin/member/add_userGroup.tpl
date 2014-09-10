<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·<{$submitButton}>会员分组</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_userGroup" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getUserGroup.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getUserGroup.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;会员分组名称：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="name" id="name" class="input_box" value="<{$getUserGroup.name}>"></td>
  </tr>
   <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">等级积分：</td>
    <td width="82%" bgcolor="f5f5f5">
       <input type="text" name="score" id="score" class="input_box" value="<{$getUserGroup.score}>"></td>
  </tr>
 
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">折扣率：</td>
    <td bgcolor="f5f5f5"><input type="text" name="discount" id="discount" class="input_box" <{if $act=="add"}>value=1<{else}>value="<{$getUserGroup.discount}>" <{/if}>></td>
  </tr>
    <tr>
    <td bgcolor="#EAEAEA">&nbsp;</td>
    <td bgcolor="f5f5f5"><table width="164" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td><input type="submit" name="add" id="add" class="admin_button" value="<{$submitButton}>" /></td>
        <td><input type="reset" name="reset" class="admin_button" value="重置" id="reset" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<input name="is_delete" type="hidden" value="0" />
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
