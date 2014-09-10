            	<{nocache}><table cellspacing="1" cellpadding="5" border="0" width="100%" bgcolor="#CCCCCC">
                        <tr>
                            <th width=50% bgcolor="#EEEEEE">项目</th>
                            <th width=10% bgcolor="#EEEEEE">数量</th>
                            <th width=15% bgcolor="#EEEEEE">价格</th>									
                            <th width=13% bgcolor="#EEEEEE">总价</th>
                            <th width=19% bgcolor="#EEEEEE">操作</th>
                        </tr>
                        
                        <{foreach $cart_list as $var}>
                        <tr class="red_l">
                            <td bgcolor="#FFFFFF" align="center"><{$var.name}></td>
                            <td bgcolor="#FFFFFF" align="center"><input type="text" style="ime-mode: disabled;" onblur="modify_cart(<{$var.id}>,this);" id="deal-buy-quantity-input" value="<{$var.number}>" name="quantity" maxlength="4" class="f-input"></td>
                            <td bgcolor="#FFFFFF" align="center"><{if $var.buy_type!=1}>&yen;<{$var.unit_price}><{else}><{$var.return_score}>积分<{/if}></td>									
                            <td bgcolor="#FFFFFF" align="center"><{if $var.buy_type!=1}>&yen;<{$var.total_price}><{else}><{$var.return_total_score}>积分<{/if}></td>
                            <td bgcolor="#FFFFFF" align="center"><{if $Web_info|set:"IS_CART"}><a onClick="del_cart(<{$var.id}>)" href="javascript:void(0);">删除</a><{/if}></td>
                        </tr>
                        <{/foreach}>
                       
                        <tr>
                        	<td bgcolor="#E4E4E4" align="center" colspan="2">支付总额：</td>
                            <td bgcolor="#E4E4E4" align="center" colspan="2">&yen;<{$total_price}></td>
                            <td bgcolor="#E4E4E4" align="center"><input type="button" onClick="submit_cart();" value="购买" name="buy" class="formbutton">
</td>
                        </tr>
                  </table> <{/nocache}>