<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·<{$submitButton}>广告</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_adv" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getAdvs.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getAdvs.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;名称：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="name" id="name" class="input_box" value="<{$getAdvs.name}>"></td>
  </tr>
   
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">&nbsp;所在位置：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="location" class="input_box" value="<{$getAdvs.location}>"></td>
  </tr>
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">开始时间：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="begin_time" id="begin_time" readonly class="input_box" value="<{if $getAdvs.begin_time}><{$getAdvs.begin_time|date_format:"%Y-%m-%d %H:%M:%S"}><{/if}>" onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')">&nbsp;<span class="attention_text">[不设置表示开始无限制]</span></td>
  </tr>
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">结束时间：</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="end_time" id="end_time" readonly class="input_box" value="<{if $getAdvs.end_time}><{$getAdvs.end_time|date_format:"%Y-%m-%d %H:%M:%S"}><{/if}>" onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')">&nbsp;<span class="attention_text">[不设置表示结束无限制]</span></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">状态：</td>
    <td bgcolor="f5f5f5"><lable>有效<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>无效<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
  </tr>
  
 <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">广告内容：</td>
    <td bgcolor="f5f5f5"><{$code}></td>
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
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
