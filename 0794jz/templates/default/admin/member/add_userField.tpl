<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript">
$(function()
{
	if($("#input_type").get(0).selectedIndex==0){
		$("#scope").hide();
		$("#must").show();
	} else {
		$("#must").hide();
		$("#scope").show();
	}
	$("#input_type").change(function(){
		if($("#input_type").get(0).selectedIndex==0){
			$("#scope").hide();
			$("#must").show();
		} else {
			$("#must").hide();
			$("#scope").show();
		}
	});
})
</script>
<body>
<div id="location"><strong>·<{$submitButton}>会员扩展</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_userField" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getUserField.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getUserField.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;字段名称：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="field_name" id="field_name" class="input_box" value="<{$getUserField.field_name}>"></td>
  </tr>
   <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;字段显示名称：</td>
    <td width="82%" bgcolor="f5f5f5">
       <input type="text" name="field_show_name" id="field_show_name" class="input_box" value="<{$getUserField.field_show_name}>"></td>
  </tr>
 
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">输入类型：</td>
    <td bgcolor="f5f5f5"><select name="input_type"  class="input_box" id="input_type">
    			<{if $act=="add"}>
				<option value="0" selected="selected">手动输入</option>
				<option value="1" >预选下拉</option>
                <{else}>
                <option value="0" <{if $getUserField.input_type==0}>selected="selected"<{/if}>>手动输入</option>
				<option value="1" <{if $getUserField.input_type==1}>selected="selected"<{/if}>>预选下拉</option>
                <{/if}>
			</select></td>
  </tr>
  <tr id="scope">
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">可选值：</td>
    <td width="82%" bgcolor="f5f5f5">
       <textarea class="textarea" name="value_scope" class="input_box"><{$getUserField.value_scope}></textarea>&nbsp;<span class="attention_text">用半角逗号分隔</td>
  </tr>
  <tr id="must">
    <td bgcolor="#EAEAEA" class="table_left_title">是否必填：</td>
    <td bgcolor="f5f5f5"><select name="is_must" class="input_box">
				<option value="0" selected="selected">否</option>
				<option value="1" >是</option>
			</select></td>
  </tr>
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">排序：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="sort" id="sort" class="input_box" value="<{$getUserField.sort}>"></td>
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
