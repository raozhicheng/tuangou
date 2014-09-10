<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·<{$submitButton}>城市</strong></div>
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
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;名称：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="name" id="name" class="input_box" value="<{$getCities.name}>"> （此名不能重复）
      </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;URL名称：</td>
    <td bgcolor="f5f5f5"><input type="text" name="uname" id="uname" value="<{$getCities.uname}>"> （此名不能重复） 
 </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">上级地区：</td>
    <td bgcolor="f5f5f5">
      <select name="pid" id="pid" style="width:130px;">
      <option value="0">一级城市名称</option>

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
    <td bgcolor="#EAEAEA" class="table_left_title">状态：</td>
    <td bgcolor="f5f5f5"><lable>有效<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>无效<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">是否开始运营：</td>
    <td bgcolor="f5f5f5"><lable>是<input type="radio" name="is_open" value="1" <{$opened}> /></lable>
			<lable>否<input type="radio" name="is_open" value="0" <{$noOpened}> /></lable></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;城市说明：</td>
    <td bgcolor="f5f5f5"><{$Description}></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;城市公告：</td>
    <td bgcolor="f5f5f5"><{$Notice}></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">城市SEO自定义标题：</td>
    <td bgcolor="f5f5f5"><textarea name="seo_title" cols="50" class="textarea" ><{$getCities.seo_title}></textarea></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">城市SEO自定义关键词：</td>
    <td bgcolor="f5f5f5"><textarea name="seo_keyword" cols="50" class="textarea" ><{$getCities.seo_keyword}></textarea></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">城市SEO自定义描述：</td>
    <td bgcolor="f5f5f5"><textarea name="seo_description" cols="50" class="textarea"><{$getCities.seo_description}></textarea></td>
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
<input name="is_default" type="hidden" value="<{if $act=="mod"}><{$getCities.is_default}><{else}><{if !$Records}>1<{else}>0<{/if}><{/if}>" />
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
