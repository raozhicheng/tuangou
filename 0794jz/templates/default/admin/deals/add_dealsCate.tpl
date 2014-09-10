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
 <form name="add_category" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getCate.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getCate.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;名称：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="name" id="name" class="input_box" value="<{$getCate.name}>"></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">分类：</td>
    <td bgcolor="f5f5f5">
      <select name="pid" id="pid" style="width:130px;">
      <option value="0">一级分类</option>

      <{if $act=="add" || $getCate.pid==0}>
      
      <{foreach $category as $var}>
        <option value="<{$var.id}>"><{$var.name}></option>
      <{/foreach}>
      
      <{else if $act=="mod"}>
       <{foreach $category as $var}>
        <{if $getCate.pid==$var.id}> selected="selected" <{/if}>><{$var.name}><option value="<{$var.id}>" <{if $getCate.pid==$var.id}> selected="selected" <{/if}>><{$var.name}></option>
       <{/foreach}>
       
      <{/if}>
      </select>    </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">状态：</td>
    <td bgcolor="f5f5f5"><lable>有效<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>无效<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
  </tr>
  
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">分类描述：</td>
    <td bgcolor="f5f5f5"><textarea name="brief" cols="50" class="textarea" ><{$getCate.brief}></textarea></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;排序：</td>
    <td bgcolor="f5f5f5"><input type="text" name="sort" id="sort" value="<{$getCate.sort}>"></td>
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
