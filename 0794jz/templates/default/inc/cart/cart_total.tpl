<{nocache}>
<div class="cart_total_box">
	<p style="text-align: right; line-height: 20px; ">
	商品总价:&yen;<{$result.total_price}>
    <{if $result.delivery_fee>0}>
		+ 运费:&yen;<{$result.delivery_fee}>
	<{/if}>
    <{if $result.payment_fee>0}>
    	+支付手续费:&yen;<{$result.payment_fee}>
    <{/if}>
    <{if $result.user_discount>0}>
		- 等级折扣:<{$result.user_discount}>
	<{/if}>
    <{if $result.paid_account_money>0}>
		- 已用余额支付:&yen;<{$result.paid_account_money}>
	<{/if}>
    <{if $result.paid_ecv_money>0}>
		- 已用代金券支付:&yen;<{$result.paid_ecv_money}>
	<{/if}>
    	=
	<span class="red_n">&yen;<{$result.pay_total_price}></span>
    </p>
    <p style="text-align: right; line-height: 20px;">
    <{if $result.account_money>0}>
		- 余额支付:&yen;<{$result.account_money}>
	<{/if}>
    <{if $result.ecv_money>0}>
		- 代金券抵扣:&yen;<{$result.ecv_money}>
	<{/if}>
    应付款金额:<{if $result.payment_info}>通过<{$result.payment_info.name}><{/if}><span class="red_n">&yen;<{$result.pay_price}></span>
    </p>
    <p style="text-align: right; line-height: 20px;">
    <{if $result.return_total_money!=0}>
    	购买成功后资金变更:&yen;<{$result.return_total_money}>
    <{/if}>
    <{if $result.return_total_score!=0}>
    	购买成功后积分变更:<{$result.return_total_score}>
    <{/if}>
    </p>
</div>
<{/nocache}>