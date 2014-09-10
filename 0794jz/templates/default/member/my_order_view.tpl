<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><{$Web_info|set:"SITE_TITLE"}></title>
<meta name="description" content="<{$Web_info|set:"SITE_DESCRIPTION"}>">
<meta name="keywords" content="<{$Web_info|set:"SITE_KEYWORD"}>">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="<{$stylePath}>/favicon.ico" />
<meta name="author" content="<{$appName}>" />
<meta name="copyright" content="leesuntech.com" />
<link href="<{$stylePath}>/css/global.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/header.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/footer.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/common.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/user.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/font.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<{$stylePath}>/js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="<{$stylePath}>/js/jquery.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/script.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/register.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.pngfix.js"></script>
</head>

<body>
<{include file="$style/header.tpl"}>
<div class="body_area">
	
    <div id="content_box">
    	<div class="c_left">
        	<div class="user_f">
            	<div class="tit"><{$title}></div>
                <div class="member_box">
                	<div class="data_list red_l">
                    	<{dealOrder name="order_info"}>
                        <table cellspacing="1" cellpadding="6" border="0" width="100%" bgcolor="#CCCCCC">
								<tbody>
                                <tr>
									<td width=25% bgcolor="#ebebeb" align="right">订单号：</td>
									<td bgcolor="#fff" ><{$order_info.order_sn}></td>
								</tr>
                                <tr>
									<td bgcolor="#ebebeb" align="right">支付状态：</td>
									<td bgcolor="#fff" ><{$order_info.pay_status_cn}>&nbsp;&nbsp;
                                    	<{if $order_info.pay_status!=2 && $order_info.order_status!=1}>
											<{$order_info.continue}>
										<{/if}>
                                    </td>
								</tr>
                                <tr>
									<td bgcolor="#ebebeb" align="right">配送状态：</td>
									<td bgcolor="#fff" ><{$order_info.delivery_status_cn}>&nbsp;&nbsp;
                                    	<{if $order_info.delivery_fee>0}>
                                        	<span class="red_n">运费：&yen;<{$order_info.delivery_fee}></span>
                                        <{/if}>
                                    </td>
								</tr>
                                <tr>
									<td bgcolor="#ebebeb" align="right">下单时间：</td>
									<td bgcolor="#fff" ><{$order_info.create_time}></td>
								</tr>
                                <tr>
									<td bgcolor="#ebebeb" align="right">管理员最后操作时间：</td>
									<td bgcolor="#fff" ><{$order_info.update_time}></td>
								</tr>
                                
								<{if $order_info.delivery_id!=0}>
                                <tr>
									<td bgcolor="#ebebeb" align="right">收货人：</td>
									<td bgcolor="#fff" ><{$order_info.consignee}></td>
								</tr>
                                <tr>
									<td bgcolor="#ebebeb" align="right">手机：</td>
									<td bgcolor="#fff" ><{$order_info.mobile}></td>
								</tr>
                                <tr>
									<td bgcolor="#ebebeb" align="right">所在地区：</td>
									<td bgcolor="#fff" >省：<{$order_info.province}>&nbsp;|&nbsp;市：<{$order_info.city}>&nbsp;|&nbsp;区：<{$order_info.district}></td>
								</tr>
                                <tr>
									<td bgcolor="#ebebeb" align="right">地址：</td>
									<td bgcolor="#fff" ><{$order_info.address}></td>
								</tr>
                                <tr>
									<td bgcolor="#ebebeb" align="right">邮编：</td>
									<td bgcolor="#fff" ><{$order_info.zip}></td>
								</tr>
                                <{/if}>
                                <tr>
									<td bgcolor="#ebebeb" align="right">订单备注：</td>
									<td bgcolor="#fff" ><{$order_info.memo}></td>
								</tr>
                                <tr>
									<td bgcolor="#ebebeb" align="right">售后处理：</td>
									<td bgcolor="#fff" ><{$order_info.after_sale_cn}></td>
								</tr>
                                <tr>
									<td bgcolor="#ebebeb" align="right">管理员备注：</td>
									<td bgcolor="#fff" ><{$order_info.admin_memo}></td>
								</tr>
                                <tr>
									<td bgcolor="#ebebeb" align="right"><span class="red_n">总价：</span></td>
									<td bgcolor="#fff" ><span class="red_n">&yen;<{$order_info.deal_total_price}></span>
                                    	<{if $order_info.delivery_fee>0}>
                                    	加运费：<span class="red_n">&yen;<{$order_info.delivery_fee}></span>
                                        <{/if}>
                                        <{if $order_info.payment_fee>0}>
                                        加手续费：<span class="red_n">&yen;<{$order_info.payment_fee}></span>
                                        <{/if}>
                                        <{if $order_info.discount_price>0}>
                                        减等级折扣：<span class="red_n">&yen;<{$order_info.discount_price}></span>
                                        <{/if}>
                                        等于：<span class="red_n">&yen;<{$order_info.total_price}></span>
                                    </td>
								</tr>
                                <{if $order_info.account_money>0}>
                                <tr>
									<td bgcolor="#ebebeb" align="right"><span class="red_n">余额：</span></td>
									<td bgcolor="#fff" ><span class="red_n">&yen;<{$order_info.account_money}></span></td>
								</tr>
                                <{/if}>
                                <{if $order_info.ecv_money>0}>
                                <tr>
									<td bgcolor="#ebebeb" align="right"><span class="red_n">代金券：</span></td>
									<td bgcolor="#fff" ><span class="red_n">&yen;<{$order_info.ecv_money}></span></td>
								</tr>
                                <{/if}>
                                <tr>
									<td bgcolor="#ebebeb" align="right"><strong class="red_n">应付金额：</strong></td>
									<td bgcolor="#fff" ><span class="red_n">&yen;<{$order_info.payable}></span></td>
								</tr>
                                <{if $order_info.payment_id>0}>
                                <tr>
									<td bgcolor="#ebebeb" align="right"><strong class="red_n">支付方式：</strong></td>
									<td bgcolor="#fff" ><span class="red_n"><{$order_info.payment_name}></span></td>
								</tr>
								<{/if}>
                                <{if $order_info.return_total_money!=0}>
                                <tr>
									<td bgcolor="#ebebeb" align="right"><strong class="red_n">购买成功后资金：</strong></td>
									<td bgcolor="#fff" ><span class="red_n">&yen;<{$order_info.return_total_money}></span></td>
								</tr>
								<{/if}>
                                <{if $order_info.return_total_score!=0}>
                                <tr>
									<td bgcolor="#ebebeb" align="right"><strong class="red_n">购买成功后积分：</strong></td>
									<td bgcolor="#fff" ><span class="red_n"><{$order_info.return_total_score}></span></td>
								</tr>
								<{/if}>
                                
                         </tbody>
                         </table>
                         <{/dealOrder}>
                         <br />
                         <table cellspacing="1" cellpadding="5" border="0" width="100%" bgcolor="#CCCCCC">
                              <tr>
                                  <th width=15% bgcolor="#EEEEEE">项目</th>
                                  <th width=15% bgcolor="#EEEEEE">单价</th>
                                  <th width=15% bgcolor="#EEEEEE">积分</th>									
                                  <th width=10% bgcolor="#EEEEEE">数量</th>
                                  <th width=15% bgcolor="#EEEEEE">总价</th>
                                  <th width=15% bgcolor="#EEEEEE">积分总计</th>
                                  <th width=15% bgcolor="#EEEEEE">发货通知</th>
                              </tr>
                              <{foreach $deal_order_item as $var}>
                              <tr class="red_l">
                                  <td bgcolor="#FFFFFF" align="center"><{$var.name}></td>
                                  <td bgcolor="#FFFFFF" align="center">&yen;<{$var.unit_price}></td>
                                  <td bgcolor="#FFFFFF" align="center"><{$var.return_score}></td>
                                  <td bgcolor="#FFFFFF" align="center"><{$var.number}></td>
                                  <td bgcolor="#FFFFFF" align="center"><{$var.total_price}></td>
                                  <td bgcolor="#FFFFFF" align="center"><{$var.return_total_score}></td>
                                  <td bgcolor="#FFFFFF" align="center"><{$var.delivery_status_cn}></td>
                              </tr>
                              <{/foreach}>
                        </table>
                    </div>
                    
                </div>
            </div>
        	<div class="clear"></div>
        </div>
        <div class="c_right">
        	<div class="member_right_box">
            	<div class="top"></div>
                <div class="mid">
                	<ul>
                       	<li><a href="<{$Web_link|name:"deal_order"}>" target="_blank">订单留言</a></li>
                    </ul>
                </div>
                <div class="bottom"></div>
            </div>
        </div>
            
        <div class="clear"></div>
    	</div>
     </div>
        
</div>
<{include file="$style/footer.tpl"}>

</body>

</html>
