<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·<{$submitButton}>信息</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_infos" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getInfos.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getInfos.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;名称：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="title" id="title" class="input_box" value="<{$getInfos.title}>"></td>
  </tr>
   
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">&nbsp;外链地址：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="rel_url" id="rel_url" class="input_box" value="<{$getInfos.rel_url}>"></td>
  </tr>
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;排序：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="sort" id="sort" class="input_box" value="<{$getInfos.sort}>"></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;分类：</td>
    <td bgcolor="f5f5f5">
      <select name="cate_id" id="cate_id" style="width:130px;">
      <option value="0">未选分类</option>

      <{if $act=="add"}>
      
      <{foreach $info_cate as $var}>
        <option value="<{$var.id}>"><{$var.name}></option>
      <{/foreach}>
      
      <{else if $act=="mod"}>
       <{foreach $info_cate as $var}>
        <option value="<{$var.id}>" <{if $getInfos.cate_id==$var.id}> selected="selected" <{/if}>><{$var.name}></option>
       <{/foreach}>
       
      <{/if}>
      </select>    </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">状态：</td>
    <td bgcolor="f5f5f5"><lable>有效<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>无效<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
  </tr>
  
 <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;详细内容：</td>
    <td bgcolor="f5f5f5"><{$content}></td>
  </tr>
 <tr>
				<td width="15%" bgcolor="#EAEAEA" class="table_left_title">SEO自定义标题:</td>
				<td width="85%" bgcolor="f5f5f5"><textarea class="textarea" name="seo_title" cols="30"><{$getInfos.seo_title}></textarea></td>
			</tr>
            <tr>
				<td width="15%" bgcolor="#EAEAEA" class="table_left_title">SEO自定义关键词:</td>
				<td width="85%" bgcolor="f5f5f5"><textarea class="textarea" name="seo_keyword" cols="30"><{$getInfos.seo_keyword}></textarea></td>
			</tr>
            <tr>
				<td width="15%" bgcolor="#EAEAEA" class="table_left_title">SEO自定义描述:</td>
				<td width="85%" bgcolor="f5f5f5"><textarea class="textarea" name="seo_description" cols="30"><{$getInfos.seo_description}></textarea></td>
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
<{if $act=="add"}>
	<input name="create_time" type="hidden" value="<{$smarty.now}>" />
    <input name="update_time" type="hidden" value="0" />
    <input name="update_admin_id" type="hidden" value="0" />
<{else}>
	<input name="create_time" type="hidden" value="<{$getInfos.create_time}>" />
    <input name="update_time" type="hidden" value="<{$smarty.now}>" />
    <input name="add_admin_id" type="hidden" value="<{$getInfos.add_admin_id}>" />
<{/if}>
<input name="is_delete" type="hidden" value="0" />
<input name="click_count" type="hidden" value="0" />
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
