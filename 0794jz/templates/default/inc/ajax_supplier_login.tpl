<script type="text/javascript">
$(document).ready(function(){
$("#login-submit").click(function(){
		var account_name = $.trim($("#account_name").val());
		var account_password = $.trim($("#account_password").val());		
		if(account_name.length == 0)
		{
			alert("�������ʻ�����!");
			$("#account_name").focus();
			return false;
		}

		if(account_password.length == 0)
		{
			alert("�������ʻ�����!");
			$("#account_password").focus();
			return false;
		}
		
		var query = new Object();
		query.account_name = account_name;
		query.account_password = account_password;
		query.act = "supplier_dologin";
		var ajaxurl = APP_PATH+"coupon.php"; 
		$.ajax({ 
			url: ajaxurl,
			type: "POST",
			data: query,
			dataType:"json",
			success: function(obj){
				if(obj.status==1)
				{
					location.href = '<{$Web_link|name:"coupon_verify"}>';
				}
				else
				alert(obj.msg);
			},
			error:function(ajaxobj)
			{
				alert(ajaxobj.responseText);
			}
		});	
		
		return false;
	});	
});
</script>
<div class="supplier_login_box">
 <form name="login" id="login" method="post"  enctype="multipart/form-data" action="<{$Web_link|name:"supplier_dologin"}>">
 <ul>
    <li><span class="t"><label for="account_name">�̼��ʻ�:</label></span><span class="i"><input type="text" name="account_name" id="account_name" class="input_box" value="" /></span></li>
    <li><span class="t"><label for="account_password">�̼�����:</label></span><span class="i"><input type="password" name="account_password" id="account_password" class="input_box" value="" /></span></li>
    <li><span class="t"><input type="submit" name="commit" id="login-submit" class="submit_button" value="��½" /></span></li>
 </ul>
 </form>
</div>
