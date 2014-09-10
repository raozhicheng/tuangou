<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript"> 
$(document).ready(function()
{
	$("#clear").click(function () {
		if($("input[type='checkbox']").is(':checked')){
				$("#list").hide();
				$("#hide").show();	
				return true;
		} else {
			alert("请选择缓存种类");
			return false;
		}
	});
});
</script>
<body>
<div id="location"><strong>·清除缓存</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post" action="main.php?act=do_clearCache">
<div id="list">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#EAEAEA">
<tr>
          <td height="45" align="center" bgcolor="#F5F5F5" ><label ><input  type="checkbox" checked="checked" value="datacache" name="type[]" />
        数据缓存</label> <label >
        <input id="tplcache" type="checkbox"   value="tplcache" name="type[]" checked="checked"  />
       模板缓存</label></td>
        </tr>
  </table>
  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="5"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#EAEAEA">
  <tr>
    <td bgcolor="#F5F5F5" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="19%"><table width="164" border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><input type="submit" name="clear" id="clear" class="admin_button" value="清除"/></td>
            </tr>
          </table></td>
         
        </tr>
      </table>
      <div align="center"></div></td>
    </tr>
</table>
</form>
</div>
<div id="hide" style="display: none;" class="waiting">
 <table width="200" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td> 正在清除缓存.......</td>
    <td> <img src="images/loading.gif"></td>
  </tr>
</table>
</div>
</body>
</html>
