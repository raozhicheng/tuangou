<{nocache}>
<div class="cart_total_box">
	<p style="text-align: right; line-height: 20px; ">
	��Ʒ�ܼ�:&yen;<{$result.total_price}>
    <{if $result.delivery_fee>0}>
		+ �˷�:&yen;<{$result.delivery_fee}>
	<{/if}>
    <{if $result.payment_fee>0}>
    	+֧��������:&yen;<{$result.payment_fee}>
    <{/if}>
    <{if $result.user_discount>0}>
		- �ȼ��ۿ�:<{$result.user_discount}>
	<{/if}>
    <{if $result.paid_account_money>0}>
		- �������֧��:&yen;<{$result.paid_account_money}>
	<{/if}>
    <{if $result.paid_ecv_money>0}>
		- ���ô���ȯ֧��:&yen;<{$result.paid_ecv_money}>
	<{/if}>
    	=
	<span class="red_n">&yen;<{$result.pay_total_price}></span>
    </p>
    <p style="text-align: right; line-height: 20px;">
    <{if $result.account_money>0}>
		- ���֧��:&yen;<{$result.account_money}>
	<{/if}>
    <{if $result.ecv_money>0}>
		- ����ȯ�ֿ�:&yen;<{$result.ecv_money}>
	<{/if}>
    Ӧ������:<{if $result.payment_info}>ͨ��<{$result.payment_info.name}><{/if}><span class="red_n">&yen;<{$result.pay_price}></span>
    </p>
    <p style="text-align: right; line-height: 20px;">
    <{if $result.return_total_money!=0}>
    	����ɹ����ʽ���:&yen;<{$result.return_total_money}>
    <{/if}>
    <{if $result.return_total_score!=0}>
    	����ɹ�����ֱ��:<{$result.return_total_score}>
    <{/if}>
    </p>
</div>
<{/nocache}>