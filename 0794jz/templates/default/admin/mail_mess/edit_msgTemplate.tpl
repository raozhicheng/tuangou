<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>���༭��Ϣģ��</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="edit_msgTemplate" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getMsgTemplate.id}>">
 <input type="hidden" name="id" value="<{$getMsgTemplate.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">ģ�����ƣ�</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="ch_name" id="ch_name" class="input_box" value="<{$getMsgTemplate.ch_name}>" readOnly>
      </td>
  </tr>
  <{if $getMsgTemplate.type}>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">���ı���ʽ��</td>
    <td bgcolor="f5f5f5">
   			<select name="is_html" class="input_box">
				<option value="0" <{if !$getMsgTemplate.is_html}> selected="selected" <{/if}> >��</option>
				<option value="1" <{if $getMsgTemplate.is_html}> selected="selected" <{/if}> >��</option>
			</select>
 </td>
  </tr>
  <{/if}>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;���ݣ�</td>
    <td bgcolor="f5f5f5">
    <textarea class="textarea" name="content" style="width:600px; height:250px;" ><{$getMsgTemplate.content}></textarea>
 </td>
  </tr>
 
  <tr>
    <td bgcolor="#EAEAEA">&nbsp;</td>
    <td bgcolor="f5f5f5"><table width="164" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td><input type="submit" name="mod" id="mod" class="admin_button" value="�༭" /></td>
        <td><input type="reset" name="reset" class="admin_button" value="����" id="reset" /></td>
      </tr>
    </table></td>
  </tr>
</table>

<input type="hidden" name="act" value="mod">
</form>
</div>
</body>
</html>
