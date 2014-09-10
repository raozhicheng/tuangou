<script type="text/javascript">
$(document).ready(function(){
	$("input[name='delivery']").bind("click",function(){
		count_buy_total();
	});
});	
</script>
<{if $delivery_list}>
<table cellspacing="1" cellpadding="5" border="0" width="100%" bgcolor="#CCCCCC">
    <{foreach $delivery_list as $delivery_item}>
    <tr>
        <td bgcolor="#EEEEEE" width=10% align="center"><input type="radio" value="<{$delivery_item.id}>" name="delivery"  ></td>
        <td bgcolor="#ffffff" width=50%><{$delivery_item.name}></td>
        <td bgcolor="#ffffff" width=40%>												
            <{$delivery_item.description}>
        </td>
    </tr>
    <{/foreach}>
</table>
<{else}>
<div style="padding:10px;">‘›Œﬁ≈‰ÀÕ!</div>
<{/if}>