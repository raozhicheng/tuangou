<script type="text/javascript">
$(document).ready(function(){
	$("input[name='account_money'],input[name='ecvsn'],input[name='ecvpassword']").bind("blur",function(){
		count_buy_total();
	});
	$("input[name='payment']").bind("click",function(){
		count_buy_total();
	});
	$("#check-all-money").bind("click",function(){
		if($(this).attr("checked"))
		{
			count_buy_total();
		}
		else
		{
			$("#account_money").val("0");
			count_buy_total();
		}
	});
});	
</script>
<table cellspacing="1" cellpadding="5" border="0" width="100%" bgcolor="#CCCCCC">
                        <{foreach $payment_list as $var}>
                        <tr>
                            <td bgcolor="#FFFFFF" align="left"><input type='radio' name='payment' value='<{$var.id}>' /><{$var.name}></td>
                            <td bgcolor="#FFFFFF" align="center"><{$var.description}></td>
                        </tr>
                        <{/foreach}>
                       <tr>
                       		<td bgcolor="#FFFFFF" colspan="2"><{$account_html}></td>
                       </tr>
                  </table> 