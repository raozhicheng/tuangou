<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript">
$(function()
{
	//ͼƬԤ�����Ŵ�
 xOffset = 10;
 yOffset = 30;
	$("#previewPic").hover(function(e){
                $("<img id='imgshow' src='" + this.src + "' width='150' height='150'/>").appendTo("body");
                $("#imgshow")
                    .css("top", (e.pageY - xOffset) + "px")
                 .css("left", (e.pageX + yOffset) + "px")
           .fadeIn("fast");
            }, function() {
                $("#imgshow").remove();
    });
	$("#previewPic").mousemove(function(e) {
                $("#imgshow")
                   .css("top", (e.pageY - xOffset) + "px")
             .css("left", (e.pageX + yOffset) + "px")
            });
});
</script>
<body>
<div id="location"><strong>��<{$submitButton}>�༭֧���ӿ�</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="edit_payment" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getPayment.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getPayment.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">֧���ӿ����ƣ�</td>
    <td width="82%" bgcolor="f5f5f5"><input type="text" class="input_box" value="<{$getPayment.name}>" disabled></td>
  </tr>
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title">�ӿ�������</td>
    <td width="82%" bgcolor="f5f5f5"><input type="text"  class="input_box" value="<{$getPayment.pay_name}>" disabled></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">״̬��</td>
    <td bgcolor="f5f5f5"><lable>��Ч<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>��Ч<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;����</td>
    <td bgcolor="f5f5f5"><input type="text" name="sort" id="sort" value="<{$getPayment.sort}>"></td>
  </tr>
  <{if $getPayment.pay_name!="Account"}>
<tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�����ѣ�</td>
    <td bgcolor="f5f5f5"><input type="text" name="fee_amount" id="fee_amount" class="input_box" value="<{$getPayment.fee_amount}>"></td>
  </tr>
<tr>
    <td bgcolor="#EAEAEA" class="table_left_title">֧����ʽ���������</td>
    <td bgcolor="f5f5f5"><textarea class="textarea" name="description" cols="50" rows="4"><{$getPayment.description}></textarea></td>
  </tr>
   
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">LOGO��</td>
    <td bgcolor="f5f5f5">
    
    <table cellpadding="0" cellspacing="2" border="0">
    <tr>
    <td>
    <input type="file" name="uploadPic" id="uploadPic">
    </td>
    <td>
    <{if $getPayment.logo}><input type="hidden" name="logo" value="<{$getPayment.logo}>"><img src="<{$bmpPath}>" alt="ͼƬԤ��" width=30 height="30" id="previewPic"><{else}><input type="hidden" name="logo" value="../images/no_image.gif"><img src="images/no_image.gif" alt="ͼƬԤ��" width=30 height="30" id="previewPic"/><{/if}>
    </td>
    </tr>
    </table>
    
    </td>
  </tr>
  <{/if}>
  <{if $getPayment.pay_name=="Alipay"}>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�������ID��</td>
    <td bgcolor="f5f5f5"><input type="text" name="partner" id="partner" class="input_box" value="<{$parameters.partner}>"></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">֧�����ʺţ�</td>
    <td bgcolor="f5f5f5"><input type="text" name="account" id="account" class="input_box" value="<{$parameters.account}>"></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">У���룺</td>
    <td bgcolor="f5f5f5"><input type="text" name="key" id="key" class="input_box" value="<{$parameters.key}>"></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�ӿڷ�ʽ��</td>
    <td bgcolor="f5f5f5"><select name="service">
					<option value="0" <{if $parameters.service=="0"}> selected="selected" <{/if}> >ʹ�ñ�׼˫�ӿ�</option>
                    <option value="1" <{if $parameters.service=="1"}> selected="selected" <{/if}> >�������׽ӿ�</option>
                    <option value="2" <{if $parameters.service=="2"}> selected="selected" <{/if}> >��ʱ���ʽӿ�</option>				
                    </select>
    </td>
  </tr>
  <{elseif $getPayment.pay_name=="Chinabank"}>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�̻���ţ�</td>
    <td bgcolor="f5f5f5"><input type="text" name="account" id="account" class="input_box" value="<{$parameters.account}>"></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�̻���Կ��</td>
    <td bgcolor="f5f5f5"><input type="text" name="key" id="key" class="input_box" value="<{$parameters.key}>"></td>
  </tr>
  <{elseif $getPayment.pay_name=="Tenpay"}>
    <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�̻�ID��</td>
    <td bgcolor="f5f5f5"><input type="text" name="tenpay_id" id="tenpay_id" class="input_box" value="<{$parameters.tenpay_id}>"></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�̻���Կ��</td>
    <td bgcolor="f5f5f5"><input type="text" name="key" id="key" class="input_box" value="<{$parameters.key}>"></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�Զ���ǩ����</td>
    <td bgcolor="f5f5f5"><input type="text" name="sign" id="sign" class="input_box" value="<{$parameters.sign}>"></td>
  </tr>
  <{/if}>
    <tr>
    <td bgcolor="#EAEAEA">&nbsp;</td>
    <td bgcolor="f5f5f5"><table width="164" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td><input type="submit" name="mod" id="mod" class="admin_button" value="�޸�" /></td>
        <td><input type="reset" name="reset" class="admin_button" value="����" id="reset" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<input type="hidden" name="pay_name" value="<{$getPayment.pay_name}>">
<input type="hidden" name="parameters" value="">
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
