<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·<{$submitButton}>配送地区</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_deliveryArea" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getDeliveryArea.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getDeliveryArea.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;配送地区名称：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="name" id="name" class="input_box" value="<{$getDeliveryArea.name}>"></td>
  </tr>
   
 
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;排序：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="sort" id="sort" class="input_box" value="<{$getDeliveryArea.sort}>"></td>
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
	<{if $smarty.get.id}>
		<{assign var="level" value=$smarty.get.level+1}>
    	<input type="hidden" name="level" value="<{$level}>">
        <input type="hidden" name="pid" value="<{$smarty.get.id}>">
	<{else}>
		<input type="hidden" name="level" value="1">
        <input type="hidden" name="pid" value="0">
	<{/if}>
    
<{else}>
	<input type="hidden" name="level" value="<{$getDeliveryArea.level}>">
    <input type="hidden" name="pid" value="<{$getDeliveryArea.pid}>">
<{/if}>

<input name="is_delete" type="hidden" value="0" />
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
