<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script language="javascript">
$(function() {
			$("#add_area").bind("click",function() {
				add_areas();
			});
			
			
			
			$("select[name='allow_default']").bind("change",function(){
				set_default_row();
			});
			
			set_default_row();	
			
			
 
});

function add_areas(){
		var input="首重:<input type='text' class='input_box' name='first_weights[]' style='width:50px;' value='' />&nbsp;"+
				  "价格:<input type='text' class='input_box' name='first_fees[]' style='width:50px;' value='' />&nbsp;"+
				  "续重:<input type='text' class='input_box' name='continue_weights[]' style='width:50px;' value='' />&nbsp;"+
				  "价格:<input type='text' class='input_box' name='continue_fees[]' style='width:50px;' value='' />&nbsp;";
		var tr = "<tr><td bgcolor=\'#EAEAEA\' class=\'table_left_title\'><span style='color:red;'>*</span>&nbsp;新增配送：</td><td bgcolor=\'f5f5f5\'>"+input+" 配送地区 <input type='text' class='input_box' name='area_name[]' style='width:100px;cursor:default' onfocus='openDialog(this)' readonly='true'/> <a href=\'#\' onclick=\'remove(this)\'><img src='images/recycle.gif' alt='删除'/><input type='hidden' name='support_ids[]' value=''/></a></td></tr>";
		
				$("#area_extend").append(tr);
}

function openDialog(o){
	this.blur();
	$.weeboxs.open('?act=delivery_areaTree', {contentType:'ajax',showButton:true,overlay:25,okBtnName:'确定',cancelBtnName:'取消',title:'选择配送地区',width:320,height:270,onok:function(ob){
			select_region_ok(o);
			$.weeboxs.close();
	}});
}


function set_default_row()
{
	var allow_default = $("select[name='allow_default']").val();
	if(allow_default == 0)
	{
		$("input[name='first_weight']").attr("disabled",true);
		$("input[name='first_fee']").attr("disabled",true);
		$("input[name='continue_weight']").attr("disabled",true);
		$("input[name='continue_fee']").attr("disabled",true);
		
	}
	else
	{
		$("input[name='first_weight']").attr("disabled",false);
		$("input[name='first_fee']").attr("disabled",false);
		$("input[name='continue_weight']").attr("disabled",false);
		$("input[name='continue_fee']").attr("disabled",false);		
	}
}

function select_region_ok(o)
{
	var cbo = $("input[name='area[]']:checked");
	var ids = '';
	var names = '';
	for(i=0;i<cbo.length;i++)
	{
		ids += $(cbo[i]).val()+",";
		names += $(cbo[i].parentNode).find("span").html()+",";
	}
	ids = ids.substr(0,ids.length-1);
	names = names.substr(0,names.length-1);
	$(o.parentNode).find("input[name='support_ids[]']").val(ids);
	$(o).val(names);

}

//删除当前对象上上一级内容
 function remove(t){  
 	   $(t).parent().parent().remove();      
  }  


</script>
<body>
<div id="location"><strong>·<{$submitButton}>配送方式</strong></div>

	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_deliveryWay" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getDeliveryWay.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getDeliveryWay.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="15%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;配送方式名称：</td>
    <td width="85%" bgcolor="f5f5f5">
      <input type="text" name="name" id="name" class="input_box" value="<{$getDeliveryWay.name}>"></td>
  </tr>
   
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">&nbsp;重量单位：</td>
    <td bgcolor="f5f5f5">
       <select name="weight_id" id="weight_id" style="width:60px;">

      <{if $act=="add"}>
      
      <{foreach $weight as $var}>
        <option value="<{$var.id}>"><{$var.name}></option>
      <{/foreach}>
      
      <{else if $act=="mod"}>
       <{foreach $weight as $var}>
     <option value="<{$var.id}>" <{if $getDeliveryWay.weight_id==$var.id}> selected="selected" <{/if}>><{$var.name}></option>
       <{/foreach}>
       
      <{/if}>
      </select></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">&nbsp;详细介绍：</td>
    <td bgcolor="f5f5f5"><textarea class="textarea" name="description" cols="60" rows="5"><{$getDeliveryWay.description}></textarea></td>
  </tr>
  <tr>
    <td  bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;排序：</td>
    <td  bgcolor="f5f5f5">
      <input type="text" name="sort" id="sort" class="input_box" value="<{$getDeliveryWay.sort}>"></td>
  </tr>
  
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">状态：</td>
    <td bgcolor="f5f5f5"><lable>有效<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>无效<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">首重：</td>
    <td bgcolor="f5f5f5">重量:<input type="text" class="input_box" name="first_weight" style="width:100px;" <{if $act=="add"}>value="0"<{else}> value="<{$getDeliveryWay.first_weight}>"<{/if}> />
		价格:<input type="text" class="input_box" name="first_fee" style="width:100px;" <{if $act=="add"}>value="0"<{else}>value="<{$getDeliveryWay.first_fee}>"<{/if}> /></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">续重：</td>
    <td bgcolor="f5f5f5">重量:<input type="text" class="input_box" name="continue_weight" style="width:100px;" <{if $act=="add"}>value="0"<{else}>value="<{$getDeliveryWay.continue_weight}>"<{/if}> />
		价格:<input type="text" class="input_box" name="continue_fee" style="width:100px;" <{if $act=="add"}>value="0"<{else}>value="<{$getDeliveryWay.continue_fee}>"<{/if}> /></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">是否为默认：</td>
    <td bgcolor="f5f5f5"><select name="allow_default">
    		<{if $act=="add"}>
            <option value="1" selected="selected">是</option>
			<option value="0">否</option>
            <{else}>
			<option value="1" <{if $getDeliveryWay.allow_default}>selected="selected"<{/if}>>是</option>
			<option value="0" <{if !$getDeliveryWay.allow_default}>selected="selected"<{/if}>>否</option>
            <{/if}>
		</select></td>
  </tr>
  <tbody id="area_extend">
  	<{if $getDeliveryFees}>
    	<{foreach $getDeliveryFees as $var}>
        	<tr>
			<td bgcolor='#EAEAEA' class='table_left_title'><span style='color:red;'>*</span>&nbsp;新增配送：</td>
			<td bgcolor='f5f5f5'>首重:<input type='text' class='input_box' name='first_weights[]' style='width:50px;' value='<{$var.first_weight}>' />&nbsp;
			价格:<input type='text' class='input_box' name='first_fees[]' style='width:50px;' value='<{$var.first_fee}>' />&nbsp;
			续重:<input type='text' class='input_box' name='continue_weights[]' style='width:50px;' value='<{$var.continue_weight}>' />&nbsp;
			价格:<input type='text' class='input_box' name='continue_fees[]' style='width:50px;' value='<{$var.continue_fee}>' />&nbsp;
			配送地区 <input type='text' class='input_box' name='area_name[]' style='width:100px;cursor:default' onfocus='openDialog(this)' readonly='true' value='<{$var.area_name}>'/> <a href='#' onclick='remove(this)'><img src='images/recycle.gif' alt='删除'/><input type='hidden' name='support_ids[]' value='<{$var.area_ids}>'/><input type='hidden' name='mod_ids[]' value='<{$var.id}>'/></a>
			</td>
			</tr>
        <{/foreach}>
    <{/if}>
  </tbody>
    <tr>
    <td bgcolor="#EAEAEA">&nbsp;</td>
    <td bgcolor="f5f5f5"><table width="164" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td><input type="submit" name="add" id="add" class="admin_button" value="<{$submitButton}>" /></td>
        <td><input type="reset" name="reset" class="admin_button" value="重置" id="reset" /></td>
        <td><input type="button" name="add_area" class="admin_button" value="+填加配送" id="add_area" /></td>
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
