<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·<{$submitButton}>管理员</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_weight" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getAdmin.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getAdmin.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">管理员帐号：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="adm_name" id="adm_name" class="input_box" value="<{$getAdmin.adm_name}>" <{if $act!="add"}> readOnly <{/if}>></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;管理员密码：</td>
    <td bgcolor="f5f5f5"><input type="password" name="adm_password" id="adm_password"  class="input_box" value="">
 </td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;管理员组：</td>
    <td bgcolor="f5f5f5">
    <select name="role_id" id="role_id" style="width:130px;">
      <option value="0">请选择管理员组</option>

      <{if $act=="add"}>
      
      <{foreach $role as $var}>
        <option value="<{$var.id}>"><{$var.name}></option>
      <{/foreach}>
      
      <{else if $act=="mod"}>
       <{foreach $role as $var}>
        <option value="<{$var.id}>" <{if $getAdmin.role_id==$var.id}> selected="selected" <{/if}>><{$var.name}></option>
       <{/foreach}>
       
      <{/if}>
      </select>
 </td>
  </tr>
 <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">状态：</td>
    <td bgcolor="f5f5f5"><lable>有效<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>无效<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
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
<input name="login_time" type="hidden" value="<{if !$getAdmin.login_time}>0<{else}><{$getAdmin.login_time}><{/if}>" />
<input name="login_ip" type="hidden" value="<{$getAdmin.login_ip}>" />
<input name="is_delete" type="hidden" value="0" />
<input name="is_default" type="hidden" value="<{if $act=="add"}>0<{else}><{$getAdmin.is_default}><{/if}>" />
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
