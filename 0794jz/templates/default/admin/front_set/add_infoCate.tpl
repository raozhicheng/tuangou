<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·<{$submitButton}>分类</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_infoCate" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getInfoCate.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getInfoCate.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;名称：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="name" id="name" class="input_box" value="<{$getInfoCate.name}>"></td>
  </tr>
   <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">信息类别：</td>
    <td width="82%" bgcolor="f5f5f5">
       <select name="type" id="type" style="width:50px;">
       <option value="normal" <{if $getInfoCate.type=="normal"}>selected<{/if}> >普通</option>
       <option value="help"  <{if $getInfoCate.type=="help"}>selected<{/if}>>帮助</option>
       <option value="sys"  <{if $getInfoCate.type=="sys"}>selected<{/if}>>系统</option>
       </select></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">状态：</td>
    <td bgcolor="f5f5f5"><lable>有效<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>无效<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
  </tr>
  
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;排序：</td>
    <td bgcolor="f5f5f5"><input type="text" name="sort" id="sort" value="<{$getInfoCate.sort}>"></td>
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
