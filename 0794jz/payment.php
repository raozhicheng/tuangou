<?php
/*==================================================================*/
	/*		文件名:payment.php                                    */
	/*		概要: 支付页处理脚本.    	   	    */
	/*		作者: 李文                                        */
	/*==================================================================*/

	
	@define('Web_flag', true);
	//包含通用的脚本文件
	require "common.php";
	$act=trim($_REQUEST['act']);
	if($act=="pay"){//前往支付网站支付
		$paymentNotice=new PaymentNotice();
		$payment_notice = $paymentNotice->get(intval($_GET['id']));//baselogic类中的方法
		if($payment_notice){
			if($payment_notice['is_paid'] == 0){
				$payment_info = $paymentNotice->get_other_datas("cms_payment","*","id",$payment_notice['payment_id']);
				$order = $paymentNotice->get_other_datas("cms_deal_orders","*","id",$payment_notice['order_id']);
				if($order[0]['pay_status']==2){
					Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=done&id=".$order[0]['id']));
					exit;
				}
				$payment=new Payment();
				$payCode=$payment->getPaymentCode(intval($_GET['id']));
				$payment_notice['money']=round($payment_notice['money'],2);
				$tpl->assign("title","立即支付");
				$tpl->assign("order",$order);
				$tpl->assign("payCode",$payCode);
				$tpl->assign("payment_notice",$payment_notice);
				$tpl->display($current_template."/payment_pay.tpl");
			} else {
				$order = $paymentNotice->get_other_datas("cms_deal_orders","*","id",$payment_notice['order_id']);
				if($order[0]['pay_status']==2){
					Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=done&id=".$order[0]['id']));
				} else {
					$status_class="status_success";
					$default_url="javascript:history.go(-1)";
					$mess="订单支付成功!";
					$tpl->assign("mess",$mess);
					$tpl->assign("default_url",$default_url);
					$tpl->assign("status_class",$status_class);
					$tpl->display($current_template."/inc/information.tpl");
					exit;
				}
			}
		} else {
			$status_class="status_error";
			$default_url="javascript:history.go(-1)";
			$mess="单号不存在!";
			$tpl->assign("mess",$mess);
			$tpl->assign("default_url",$default_url);
			$tpl->assign("status_class",$status_class);
			$tpl->display($current_template."/inc/information.tpl");
			exit;
		}
	//支付成功时调用	
	}elseif($act=='done' || $act=="incharge_done"){
		$deal_order=new DealOrder();
		$order_id = intval($_GET['id']);
		$order_info=$deal_order->get($order_id);
		if($act=='done'){
			$order_deals = $deal_order->getAll("select d.* from ".TAB_PREFIX."cms_deal as d where id in (select distinct deal_id from ".TAB_PREFIX."cms_deal_order_item where order_id = ".$order_id.")");
			foreach($order_deals as $k=>$v){
				$order_deals[$k]['link']=Common::rewrite_url(APP_PATH."deal.php?id=".$v['id']);
			}
			$tpl->assign("order_deals",$order_deals);
		}
		$is_coupon = 0;
		foreach($order_deals as $k=>$v)
		{
			if($v['is_coupon'] == 1&&$v['buy_status']>0)
			{
				$is_coupon = 1;
				break;
			}
		}
		$tpl->assign("is_coupon",$is_coupon);
		$tpl->assign("order_info",$order_info);
		$tpl->assign("title","恭喜您，支付成功!");
		$tpl->display($current_template."/payment_done.tpl");
	//	和支付接口交互后调用该段脚本
	} elseif($act=="return"){
		//支付方式
		$pay_name = trim($_GET['pay_name']);
		$payment=new Payment();
		$payment_info = $payment->get_other_datas("cms_payment","*","pay_name",$pay_name);
		if($payment_info[0]){
			$payment_code = $payment->response($_REQUEST,$pay_name);
		}else{
			$status_class="status_error";
			$default_url="javascript:history.go(-1)";
			$mess="支付方式不存在!";
			$tpl->assign("mess",$mess);
			$tpl->assign("default_url",$default_url);
			$tpl->assign("status_class",$status_class);
			$tpl->display($current_template."/inc/information.tpl");
		}
	} elseif($act=="notify"){
		$pay_name = trim($_GET['pay_name']);
		$payment=new Payment();
		$payment_info = $payment->get_other_datas("cms_payment","*","pay_name",$pay_name);
		if($payment_info[0]){
			$payment_code = $payment->notify($_REQUEST);
		}else{
			$status_class="status_error";
			$default_url="javascript:history.go(-1)";
			$mess="支付方式不存在!";
			$tpl->assign("mess",$mess);
			$tpl->assign("default_url",$default_url);
			$tpl->assign("status_class",$status_class);
			$tpl->display($current_template."/inc/information.tpl");
		}
	}
?>