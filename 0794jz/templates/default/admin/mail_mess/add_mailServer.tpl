<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>��<{$submitButton}>�ʼ�������</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_mailServer" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getMailServer.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getMailServer.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;SMTP��������ַ��</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="smtp_server" id="smtp_server" class="input_box" value="<{$getMailServer.smtp_server}>">
      </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;�ʺţ�</td>
    <td bgcolor="f5f5f5"> <input type="text" name="smtp_name" id="smtp_name" class="input_box" value="<{$getMailServer.smtp_name}>">
 </td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;���룺</td>
    <td bgcolor="f5f5f5"> <input type="text" name="smtp_pwd" id="smtp_pwd" class="input_box" value="<{$getMailServer.smtp_pwd}>">
 </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�Ƿ���Ҫ�����֤��</td>
    <td bgcolor="f5f5f5"><select name="is_verify">
				<option value="1" <{if $getMailServer.is_verify=="1"}> selected="selected" <{/if}> >��</option>
				<option value="0" <{if $getMailServer.is_verify=="0"}> selected="selected" <{/if}> >��</option>				
			</select>
 </td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�˿ںţ�</td>
    <td bgcolor="f5f5f5"> <input type="text" name="smtp_port" id="smtp_port" class="input_box" value="<{if $act=="add"}>25<{else}><{$getMailServer.smtp_port}><{/if}>">
 </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�Ƿ�SSL���ܣ�</td>
    <td bgcolor="f5f5f5"><select name="is_ssl">
				<option value="1" <{if $getMailServer.is_ssl=="1"}> selected="selected" <{/if}> >��</option>
				<option value="0" <{if $getMailServer.is_ssl=="0"}> selected="selected" <{/if}> >��</option>				
			</select>
 </td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">���ô�����</td>
    <td bgcolor="f5f5f5"> <input type="text" name="total_use" id="total_use" class="input_box" value="<{if $act=="add"}>0<{else}><{$getMailServer.total_use}><{/if}>">
 </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">���ô�����</td>
    <td bgcolor="f5f5f5"> <input type="text" name="use_limit" id="use_limit" class="input_box" value="<{if $act=="add"}>0<{else}><{$getMailServer.use_limit}><{/if}>">&nbsp;<span class="attention_text">[0Ϊ���޴�]</span>
 </td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�Ƿ��Զ����㣺</td>
    <td bgcolor="f5f5f5"><select name="is_reset">
				<option value="0" <{if $getMailServer.is_reset=="0"}> selected="selected" <{/if}> >��</option>
				<option value="1" <{if $getMailServer.is_reset=="1"}> selected="selected" <{/if}> >��</option>			
			</select>
 </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">״̬��</td>
    <td bgcolor="f5f5f5"><lable>��Ч<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>��Ч<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA">&nbsp;</td>
    <td bgcolor="f5f5f5"><table width="164" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td><input type="submit" name="add" id="add" class="admin_button" value="<{$submitButton}>" /></td>
        <td><input type="reset" name="reset" class="admin_button" value="����" id="reset" /></td>
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
