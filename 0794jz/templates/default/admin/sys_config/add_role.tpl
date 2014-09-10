<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·<{$submitButton}>管理员分组</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_role" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getRole.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getRole.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;名称：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="name" id="name" class="input_box" value="<{$getRole.name}>">
      </td>
  </tr>
  
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">状态：</td>
    <td bgcolor="f5f5f5"><lable>有效<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>无效<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title" valign="top">权限：<br><input type="button" id="role_all" value="全选"><br><input type="button" id="role_noall" value="全否"></td>
    <td bgcolor="f5f5f5">
    <{foreach $module as $m_val}>
    
    	<div id="module" style="border:1px #ff7200 solid; background-color:#ffeee1;padding:5px;margin-top:5px;color:red;font-weight:bold;">
        		<{$m_val.name}>
        </div>
        
    	<{foreach $node as $n_val}>
    		<{if $n_val.module_id==$m_val.id}>
            	<div id="node" style="padding:5px;margin-top:5px;margin-right:2px;width:23%;float:left;">
        			<{$n_val.name}>&nbsp;<input type="checkbox" name="node[]" id="checkbox" value="<{$n_val.id}>" <{if $n_val.id|in_array:$getNode}>checked <{/if}>>
        		</div>
            <{/if}>
        <{/foreach}>
        <div class="clear"></div>
     <{/foreach}>
    </td>
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
