<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>��<{$submitButton}>����</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_city" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getCities.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getCities.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;���ƣ�</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="name" id="name" class="input_box" value="<{$getCities.name}>"> �����������ظ���
      </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;URL���ƣ�</td>
    <td bgcolor="f5f5f5"><input type="text" name="uname" id="uname" value="<{$getCities.uname}>"> �����������ظ��� 
 </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�ϼ�������</td>
    <td bgcolor="f5f5f5">
      <select name="pid" id="pid" style="width:130px;">
      <option value="0">һ����������</option>

      <{if $act=="add" || $getCities.pid==0}>
      
      <{foreach $cities as $var}>
        <option value="<{$var.id}>"><{$var.name}></option>
      <{/foreach}>
      
      <{else if $act=="mod"}>
       <{foreach $cities as $var}>
        <option value="<{$var.id}>" <{if $getCities.pid==$var.id}> selected="selected" <{/if}>><{$var.name}></option>
       <{/foreach}>
       
      <{/if}>
      </select>
    </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">״̬��</td>
    <td bgcolor="f5f5f5"><lable>��Ч<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>��Ч<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�Ƿ�ʼ��Ӫ��</td>
    <td bgcolor="f5f5f5"><lable>��<input type="radio" name="is_open" value="1" <{$opened}> /></lable>
			<lable>��<input type="radio" name="is_open" value="0" <{$noOpened}> /></lable></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;����˵����</td>
    <td bgcolor="f5f5f5"><{$Description}></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;���й��棺</td>
    <td bgcolor="f5f5f5"><{$Notice}></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">����SEO�Զ�����⣺</td>
    <td bgcolor="f5f5f5"><textarea name="seo_title" cols="50" class="textarea" ><{$getCities.seo_title}></textarea></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">����SEO�Զ���ؼ��ʣ�</td>
    <td bgcolor="f5f5f5"><textarea name="seo_keyword" cols="50" class="textarea" ><{$getCities.seo_keyword}></textarea></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">����SEO�Զ���������</td>
    <td bgcolor="f5f5f5"><textarea name="seo_description" cols="50" class="textarea"><{$getCities.seo_description}></textarea></td>
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
<input name="is_default" type="hidden" value="<{if $act=="mod"}><{$getCities.is_default}><{else}><{if !$Records}>1<{else}>0<{/if}><{/if}>" />
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
