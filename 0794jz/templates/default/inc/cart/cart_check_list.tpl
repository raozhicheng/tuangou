<{nocache}><table cellspacing="1" cellpadding="5" border="0" width="100%" bgcolor="#CCCCCC">
                        <tr>
                            <th width=50% bgcolor="#EEEEEE">��Ŀ</th>
                            <th width=10% bgcolor="#EEEEEE">����</th>
                            <th width=15% bgcolor="#EEEEEE">�۸�</th>									
                            <th width=13% bgcolor="#EEEEEE">�ܼ�</th>
                        </tr>
                        
                        <{foreach $cart_list as $var}>
                        <tr class="red_l">
                            <td bgcolor="#FFFFFF" align="center"><{$var.name}></td>
                            <td bgcolor="#FFFFFF" align="center"><{$var.number}></td>
                            <td bgcolor="#FFFFFF" align="center"><{if $var.buy_type==0}>&yen;<{$var.unit_price}><{else}><{$var.return_score}>����<{/if}></td>									
                            <td bgcolor="#FFFFFF" align="center"><{if $var.buy_type==0}>&yen;<{$var.total_price}><{else}><{$var.return_total_score}>����<{/if}></td>
                        </tr>
                        <{/foreach}>
                       
                        <tr>
                        	<td bgcolor="#E4E4E4" align="center" >֧���ܶ</td>
                            <td bgcolor="#E4E4E4" align="center" colspan="4">&yen;<{$total_price}></td>
                        </tr>
                  </table> <{/nocache}>