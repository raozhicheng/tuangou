<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script language="javascript">
$(function()
{
	$("#uploadPic").change(function(){
		$("#previewPic").attr("src",$('input[type="file"]').val());
	})
});

  function getFullPath(obj)
        {
            if(obj)
            {
  
                //ie
                if (window.navigator.userAgent.indexOf("MSIE")>=1)
                {
                    obj.select();
                    return document.selection.createRange().text;
                }
                //firefox
                else if(window.navigator.userAgent.indexOf("Firefox")>=1)
                {
                    if(obj.files)
                    {
                        return obj.files.item(0).getAsDataURL();
                    }
                    return obj.value;
                }
                return obj.value;
            }
        }

</script>

<body>
<div id="location"><strong>��<{$submitButton}>��Ӧ��</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_supplier" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getSupplier.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getSupplier.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="18%" bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;���ƣ�</td>
    <td width="82%" bgcolor="f5f5f5">
      <input type="text" name="name" id="name" class="input_box" value="<{$getSupplier.name}>"> 
      </td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">��Ӧ�̱�־ͼƬ��</td>
    <td bgcolor="f5f5f5"><input type="file" name="uploadPic" id="uploadPic"></td>
  </tr>
  
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">��־ͼƬԤ����</td>
    <td bgcolor="f5f5f5"><{if $getSupplier.preview}><input type="hidden" name="preview" value="<{$getSupplier.preview}>"><img src="<{$bmpPath}>" alt="ͼƬԤ��" width=100 height="100" id="previewPic"><{else}><input type="hidden" name="preview" value="../images/no_image.gif"><img src="images/no_image.gif" alt="ͼƬԤ��" width=100 height="100" id="previewPic"/><{/if}></td>
  </tr>
  
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title"><span style="color:red;">*</span>&nbsp;����</td>
    <td bgcolor="f5f5f5"><input type="text" name="sort" id="sort" value="<{$getSupplier.sort}>"></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�Ź����ࣺ</td>
    <td bgcolor="f5f5f5"><span style="color:red;">*</span>&nbsp;
      <select name="cate_id" id="cate_id" style="width:130px;">
      <option value="0">δѡ�����</option>

      <{if $act=="add"}>
      
      <{foreach $category as $var}>
        <option value="<{$var.id}>"><{$var.name}></option>
      <{/foreach}>
      
      <{else if $act=="mod"}>
       <{foreach $category as $var}>
       <option value="<{$var.id}>" <{if $getSupplier.cate_id==$var.id}> selected="selected" <{/if}>><{$var.name}></option>
       <{/foreach}>
       
      <{/if}>
      </select>
    </td>
  </tr>
  
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">��Ӧ��������</td>
    <td bgcolor="f5f5f5"><{$content}></td>
  </tr>

  <tr>
    <td bgcolor="#EAEAEA">&nbsp;</td>
    <td bgcolor="f5f5f5"><table width="164" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td><input type="submit" name="add" id="add" class="admin_button" value="<{$submitButton}>" /></td>
        <td><input type="reset" name="reset" class="admin_button" value="����" id="reset" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
</body>
</html>
