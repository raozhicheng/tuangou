<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}>>
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_supplierAccount" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&supplier_id=<{$supplier_id}>&id=<{$getSupplierAccount.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getSupplierAccount.id}>">
<table width="610" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;帐号：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="account_name" id="account_name" class="input_box" value="<{$getSupplierAccount.account_name}>" style="width:150px;height:17px"></td>
  </tr>
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;密码：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="password" name="account_password" id="account_password" class="input_box" style="width:150px;height:17px"></td>
  </tr>
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;确认密码：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="password" name="confirm_pass" id="confirm_pass" class="input_box" style="width:150px;height:17px"></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA"><div align="right"><strong>状态：</strong></div></td>
    <td bgcolor="f5f5f5"><lable>有效<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>无效<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
  </tr>
  
 
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">帐号说明：</td>
    <td bgcolor="f5f5f5"><input name="description" type="text" class="input_box" id="description" value="<{$getSupplierAccount.description}>" ></td>
  </tr>
    <tr>
    <td bgcolor="#EAEAEA">&nbsp;</td>
    <td bgcolor="f5f5f5"><table width="200" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td><input type="submit" name="add" id="add" class="admin_button" value="<{$submitButton}>" /></td>
        <td><input type="reset" name="reset" class="admin_button" value="重置" id="reset" /></td>
         <td><input type="button" class="admin_button" value="返回列表" onClick="window.location.href='main.php?act=supplier_account&id=<{$supplier_id}>'"/></td>
      </tr>
    </table></td>
  </tr>
</table>
<input name="is_delete" type="hidden" value="0" />
<input name="supplier_id" type="hidden" value="<{$supplier_id}>" />
<input name="update_time" type="hidden" value="<{$update_time}>" />
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
