<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript"> 
$(document).ready(function()
{
	var reg =  /^((\(\d{3}\))|(\d{3}\-))?13[0-9]\d{8}|15[0-9]\d{8}|189\d{8}$/;//��֤�ֻ���������ʽ
	$("#test").click(function () {
		if($("#phone").val()!=""){
			if(reg.test($("#phone").val())){
				$("#send_sms").hide();
				$("#hide").show();	
				return true;
			} else {
				alert("�ֻ������ʽ����ȷ��");
				return false;
			}
		} else {
			alert("����д�����ֻ����룡");
			return false;
		}
	});
});
</script>

<body>
<div id="location"><strong>���༭���Žӿ�</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="sms_list" method="post"  enctype="multipart/form-data" action="main.php?act=sms_list&id=<{$getSmsList.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getSmsList.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;�ӿ����ƣ�</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="name" id="name" class="input_box" value="<{$getSmsList.name}>">
      </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;�ӿ�������</td>
    <td bgcolor="f5f5f5"><input type="text" name="class_name" id="class_name" class="input_box" value="<{$getSmsList.class_name}>">
 </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;�û�����</td>
    <td bgcolor="f5f5f5"><input type="text" name="user_name" id="user_name" class="input_box" value="<{$getSmsList.user_name}>"></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;���룺</td>
    <td bgcolor="f5f5f5"><input type="password" name="password" id="password" class="input_box"></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;������</td>
    <td bgcolor="f5f5f5"><textarea class="textarea" name="description" rows="3" cols="30"><{$getSmsList.description}></textarea></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA">&nbsp;</td>
    <td bgcolor="f5f5f5"><table width="164" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td><input type="submit" name="add" id="add" class="admin_button" value="�޸�" /></td>
        <td><input type="reset" name="reset" class="admin_button" value="����" id="reset" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
<div id="send_sms" style="border:1px #cdcdcd solid; background-color:#f5f5f5;padding:3px;margin-top:5px;">
<form method="post" action="main.php?act=sms_list&id=<{$getSmsList.id}>">
<input name="phone" id="phone" type="text" class="input_box"><input name="test" id="test" type="submit" value="���Ͳ���">
<input type="hidden" name="act" value="sms_sendTest">
</form>
</div>
<span id="hide" style="display: none; color: #009900; padding-left:30px; padding-bottom:80px;margin-top:5px;line-height:30px;">
 ���ڷ��Ͳ��Զ���.......<br />
</span>
</body>
</html>
