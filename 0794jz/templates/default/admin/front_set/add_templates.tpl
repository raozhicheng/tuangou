<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>��<{$submitButton}>ģ��</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_templates" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getTemplates.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getTemplates.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;���ƣ�</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="name" id="name" class="input_box" value="<{$getTemplates.name}>"> 
      </td>
  </tr>
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">��ʽ���ƣ�</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="style" id="style" class="input_box" value="<{$getTemplates.style}>"> 
      </td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;Ԥ��ͼƬ��</td>
    <td bgcolor="f5f5f5"><input type="file" name="preview" id="preview"></td>
  </tr>
  <{if $act=='mod'}>
 <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">Ŀ¼������</td>
    <td bgcolor="f5f5f5"><{if $hasDir}>ģ��Ŀ¼�ѽ���<{else}><a href="main.php?act=<{$status}>&id=<{$getTemplates.id}>&edit=new">�½�Ŀ¼</a><{/if}>&nbsp;<span class="attention_text">[��ʾ�������½���Ŀ¼�з���ģ������ļ�]</span></td>
  </tr>
  <{/if}>

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
<input name="is_default" type="hidden" value="<{if $act=="mod"}><{$getTemplates.is_default}><{else}><{if !$Records}>1<{else}>0<{/if}><{/if}>" />
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
