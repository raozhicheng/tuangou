<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript"> 
$(document).ready(function()
{
	var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/; //��֤�����������ʽ
	$("#test").click(function () {
		if($("#address").val()!=""){
			if(reg.test($("#address").val())){
				$("#list").hide();
				$("#hide").show();	
				return true;
			} else {
				alert("�����ʽ����ȷ��");
				return false;
			}
		} else {
			alert("����д�����ʼ���ַ��");
			return false;
		}
	});
});
</script>
<body>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
	</div>
<div id="list">
<form method="post" action="main.php?act=send_test&id=<{$getMailServer.id}>">
<input name="address" id="address" type="text" class="input_box"><input name="test" id="test" type="submit" value="���Ͳ���">
<input type="hidden" name="act" value="<{$act}>">
</form>
</div>
<span id="hide" style="display: none; color: #009900; padding-left:30px; padding-bottom:80px;">
 ���ڷ��Ͳ����ʼ�.......<br />
</span>

</body>
</html>
