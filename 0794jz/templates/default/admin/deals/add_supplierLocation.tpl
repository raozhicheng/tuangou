<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script src="http://ditu.google.cn/maps?file=api&v=2&key=&sensor=true" type="text/javascript"></script>
<script type="text/javascript">
function loadGeoInfo()
{
	var address = $("input[name='api_address']").val();
    var geocoder = new GClientGeocoder();
    geocoder.getLatLng(
    address,
    function(point)
    {	
    	if(!point)
    	{
    		alert("api定位地址无法解析，请更换");
    	}
    	else
    	{
			$("input[name='point']").val(point);
    		return;
    	}				
    });
}
</script>
<body>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}>>
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_supplierLocation" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&supplier_id=<{$supplier_id}>&id=<{$getSupplierLocation.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getSupplierLocation.id}>">
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;名称：</td>
    <td width="30%" bgcolor="f5f5f5"><input type="text" name="name" id="name" class="input_box" value="<{$getSupplierLocation.name}>"></td>
    <td width="20%" bgcolor="#EAEAEA" class="table_left_title">地址：</td>
    <td width="32%" bgcolor="f5f5f5"><input type="text" name="address" id="address" class="input_box" value="<{$getSupplierLocation.address}>"></td>
  </tr>
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">交通路线：</td>
    <td bgcolor="f5f5f5"><input type="text" name="route" id="route" class="input_box" value="<{$getSupplierLocation.route}>"></td>
    <td bgcolor="#EAEAEA" class="table_left_title">联系电话：</td>
    <td bgcolor="f5f5f5"><input type="text" name="tel" id="tel" class="input_box" value="<{$getSupplierLocation.tel}>"></td>
  </tr>
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">联系人：</td>
    <td bgcolor="f5f5f5"><input type="text" name="contact" id="contact" class="input_box"  value="<{$getSupplierLocation.contact}>"></td>
    <td bgcolor="#EAEAEA" class="table_left_title">营业时间：</td>
    <td bgcolor="f5f5f5"><input type="text" name="open_time" id="open_time" class="input_box" value="<{$getSupplierLocation.open_time}>"></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">定位地址：</td>
    <td colspan="3" bgcolor="f5f5f5"><input type="text" name="api_address" id="api_address" class="input_box" value="<{$getSupplierLocation.api_address}>">
    <input type="button" class="button" value="自动定位" onClick="loadGeoInfo();" />
    位置:
    <input name="point" type="text" class="textbox" size="30" value="<{$getSupplierLocation.point}>" readonly />
</td>
  </tr>
  
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">部门简介：</td>
    <td colspan="3" bgcolor="f5f5f5"><textarea name="brief" cols="40" class="textarea" ><{$getSupplierLocation.brief}></textarea></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA">&nbsp;</td>
    <td colspan="3" bgcolor="f5f5f5"><table width="200" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td><input type="submit" name="add" id="add" class="admin_button" value="<{$submitButton}>" /></td>
        <td><input type="reset" name="reset" class="admin_button" value="重置" id="reset" /></td>
        <td><input type="button" class="admin_button" value="返回列表" onClick="window.location.href='main.php?act=supplier_location&id=<{$supplier_id}>'"/></td>
      </tr>
    </table></td>
  </tr>
</table>
<input name="is_delete" type="hidden" value="0" />
<input name="is_main" type="hidden" value="<{if $act=="mod"}><{$getSupplierLocation.is_main}><{else}><{if !$Records}>1<{else}>0<{/if}><{/if}>" />
<input name="supplier_id" type="hidden" value="<{$supplier_id}>" />
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
