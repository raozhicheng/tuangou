<{include file="$APP_STYLE/admin/common/main_header.tpl"}>

<body>
<div id="location"><strong>·<{$submitButton}>会员</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_user" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getUser.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getUser.id}>">
 <input type="hidden" name="xid" value="<{$getUserExt.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;用户名称：</td>
    <td width="82%" bgcolor="f5f5f5"><input type="text" name="user_name" id="user_name" class="input_box" value="<{$getUser.user_name}>" <{$readOnly}>></td>
  </tr>
   <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;邮箱地址：</td>
    <td width="82%" bgcolor="f5f5f5"><input type="text" name="email" id="email" class="input_box" value="<{$getUser.email}>" <{$readOnly}>></td>
  </tr>
 <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">手机号：</td>
    <td width="82%" bgcolor="f5f5f5"><input type="text" name="mobile" id="mobile" class="input_box" value="<{$getUser.mobile}>" <{$readOnly}>></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;会员密码：</td>
    <td bgcolor="f5f5f5"><input type="password" name="user_pwd" id="user_pwd" class="input_box"></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;确认密码：</td>
    <td bgcolor="f5f5f5"><input type="password" name="user_confirm_pwd" id="user_confirm_pwd" class="input_box"></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;会员积分：</td>
    <td bgcolor="f5f5f5"><input type="text" name="score" id="score" class="input_box" value="<{if $act=="add"}>0<{else}><{$getUser.score}><{/if}>"></td>
  </tr>
    <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;会员余额：</td>
    <td bgcolor="f5f5f5"><input type="text" name="money" id="money" class="input_box" value="<{if $act=="add"}>0<{else}><{$getUser.money}><{/if}>"></td>
  </tr>
  <tr id="scope">
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">会员组：</td>
    <td width="82%" bgcolor="f5f5f5"><select name="group_id">
               <{if $act=="add"}>
      
      <{foreach $user_group as $var}>
        <option value="<{$var.id}>"><{$var.name}></option>
      <{/foreach}>
      
      <{else if $act=="mod"}>
       <{foreach $user_group as $var}>
        <{if $getUser.group_id==$var.id}> selected="selected" <{/if}>><{$var.name}><option value="<{$var.id}>" <{if $getUser.group_id==$var.id}> selected="selected" <{/if}>><{$var.name}></option>
       <{/foreach}>
       
      <{/if}>
            </select></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">状态：</td>
    <td bgcolor="f5f5f5"><lable>有效<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>无效<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
  </tr>

   <{assign var='ext_values' value='|'|explode:$getUserExt.value}>
   <{foreach $user_field as $var}>
   <{assign var='options' value=','|explode:$var.value_scope}>
   <{assign var='times' value=$var@iteration-1}>
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><{if $var.is_must}><span style="color:red;">*</span>&nbsp;<{/if}><{$var.field_show_name}>：</td>
    <td width="82%" bgcolor="f5f5f5">
    <{if $var.input_type==0}>
      <input type="text" name="<{$var.field_name}>" id="<{$var.field_name}>" class="input_box" value="<{$ext_values.$times}>">
    <{else if $var.input_type==1}>
      <select name="<{$var.field_name}>"  class="input_box" id="<{$var.field_name}>">
      <{foreach $options as $var_option}>
      <option value="<{$var_option}>" <{if $ext_values.$times==$var_option}>selected="selected" <{/if}> ><{$var_option}></option>
      <{/foreach}>
      </select>
    <{/if}>
      </td>
  </tr>
  <{/foreach}>
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
<input name="pid" type="hidden" value="0" />
<input name="login_time" type="hidden" value="0" />
<input name="referral_count" type="hidden" value="0" />
<input name="integrate_id" type="hidden" value="0" />
<input name="is_delete" type="hidden" value="0" />
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
