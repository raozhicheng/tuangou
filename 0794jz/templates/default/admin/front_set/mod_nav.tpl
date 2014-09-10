<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript">
$(function()
{
	var action=new Array("团购列表","团购历史","团购预告");
	var action_key=new Array("list","history","forecast");
	load_define();
	$("select[name='module']").bind("change",function(){ load_define();});
	function load_define(){
		if($("select[name='module']").val()=='define_url')
		{
			$("#config").hide();
			$("#sub").hide();
			$("#url_area").show();
		} else {
			var module = $("select[name='module']").val();
			var current_act = $("input[name='action']").val();
			if($("select[name='module']").val()=='deals'){
				var html="<select name='action'>";
				for(var i=0;i<=2;i++){
					html+="<option value='"+action_key[i]+"' ";
					if(action_key[i]==current_act){
							html+=" selected='selected' ";
					}
					html+=" >"+action[i]+"</option>";
				}
				$("#sub").html(html);
			} else {
				$("#sub").html("");
			}
			/*$.ajax({ 
					url: ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=load_module&module="+module+"&id="+id, 
					data: "ajax=1",
					dataType: "json",
					success: function(obj){
						if(obj.data)
						{
							var html="<select name='u_action'>";
							for(name in obj.data)
							{
								html+="<option value='"+name+"' ";
								if(obj.info==name)
								{
									html+=" selected='selected' ";
								}
								html+=" >"+obj.data[name]+"</option>";
							}
							html+="</select>";
							$("#sub").html(html);
						}
						else
						{
							$("#sub").html("");
						}
					}
			});*/
			$("#config").show();
			$("#sub").show();
			$("#url_area").hide();
		}
	}
});
</script>
<body>
<div id="location"><strong>·修改导航</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="mod_nav" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getNav.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getNav.id}>">
  <input type="hidden" name="action" value="<{$getNav.action}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;名称：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="name" id="name" class="input_box" value="<{$getNav.name}>">
      </td>
  </tr>
   <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">网址：</td>
    <td width="82%" bgcolor="f5f5f5">
       <select name="module" id="module" style="width:130px;">
      <{foreach $get_module as $key=>$var}>
        <option value="<{$key}>" <{if $getNav.module==$key}> selected="selected" <{/if}>><{$var}></option>
       <{/foreach}>
       </select>
       <span id="sub"></span>
       	<span id="config">数据ID：<input type="text" class="textbox" name="u_id" class="input_box" value="<{$getNav.u_id}>" /></span>
          <span id="url_area"><input type="text" name="url" id="url" class="input_box" value="<{$getNav.url}>"></span>
      </td>
   
  </tr>
  
   <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;顺序：</td>
    <td width="82%" bgcolor="f5f5f5">
     <input type="text" name="rank" id="rank" class="input_box" value="<{$getNav.rank}>">
      </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">新窗口：</td>
    <td bgcolor="f5f5f5"><lable>是<input type="radio" name="is_newWindow" value="1" <{$newWindow}> /></lable><lable>否<input type="radio" name="is_newWindow" value="0" <{$noWindow}> /></lable>
 </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">状态：</td>
    <td bgcolor="f5f5f5"><lable>有效<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>无效<input type="radio" name="status" value="0" <{$noStatused}> /></lable>
 </td>
  </tr>
 
  <tr>
    <td bgcolor="#EAEAEA">&nbsp;</td>
    <td bgcolor="f5f5f5"><table width="164" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td><input type="submit" name="mod" id="mod" class="admin_button" value="修改" /></td>
        <td><input type="reset" name="reset" class="admin_button" value="重置" id="reset" /></td>
        <td><input type="button" class="admin_button" value="返回列表" onClick="window.location.href='main.php?act=nav&id=<{$getNav.id}>'"/></td>
      </tr>
    </table></td>
  </tr>
</table>

<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
