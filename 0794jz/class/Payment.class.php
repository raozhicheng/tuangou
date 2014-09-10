<?php
/*==================================================================*/
	/*		文件名:Payment.class.php                              */
	/*		概要: 支付接口管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Payment extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_payment";
				$this->noticeName=TAB_PREFIX."cms_payment_notice";
				$this->fieldList=array("pay_name","status","online_pay","fee_amount","name","description","total_amount","parameters","logo","sort","installed");
		}
				
		private function uploadPic($fileUpload,$file){
			if($fileUpload->uploadFile($file["uploadPic"])<0){
				$this->messList[] = $fileUpload->getErrorMsg();
				return false;
			}else{
				$this->messList[] = "图片上传成功！";
				return true;
			}	
		}
		//==========================================
		// 函数: modPayment($post)
		// 功能: 用于向数据库中修改支付接口
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modPayment($fileUpload,$post,$file) {
			switch($post['pay_name']){
				case 'Alipay':
					$t=array("partner"=>$this->trim_filter($post['partner']),"account"=>$this->trim_filter($post['account']),"key"=>$this->trim_filter($post['key']),"service"=>$post['service']);
					$post['parameters']=serialize($t);
				break;
				case 'Chinabank':
					$t=array("account"=>$this->trim_filter($post['account']),"key"=>$this->trim_filter($post['key']));
					$post['parameters']=serialize($t);
				break;
				case 'Tenpay':
					$t=array("tenpay_id"=>$this->trim_filter($post['tenpay_id']),"key"=>$this->trim_filter($post['key']),"sign"=>$this->trim_filter($post['sign']));
					$post['parameters']=serialize($t);
				break;
				case 'Account':
					$post['parameters']="None";
				break;
			}
			if($file['uploadPic']['tmp_name']){
				if($this->uploadPic($fileUpload,$file)){
					$post["logo"]=$fileUpload->getNewFileName();
					if($this->mod($post)){
						$this->messList[] = "修改支付接口成功！";
						return true;
					}else{
						$this->messList[] = "修改支付接口失败！";
						return false;
					}
				} else {
					$this->messList[] = "图片修改失败！";
					return false;
				} 
			} else {
				if($this->mod($post)){
					$this->messList[] = "修改支付接口成功！";
					return true;
				}else{
					$this->messList[] = "修改支付接口失败！";
					return false;
				}
			}
		}
		
		private function trim_filter($str){
			$str=trim($str);
			$str=trim($str,",");
			return $str;
		}
		//==========================================
		// 函数: getParameters()
		// 功能: 将支付接口参数合并为数组
		// 参数: arr是所得到的记录数组
		// 返回: 返回数组
		//==========================================
		
		public function getParameters($arr){
			switch($arr['pay_name']){
				case 'Alipay':
				case 'Chinabank':
				case 'Tenpay':
					$result=array();
					$result=unserialize($arr['parameters']);
					return $result;
				break;
				
			}
		}
		
		
		
		//==========================================
		// 函数: get_payments()
		// 功能: 获取支付接口
		// 参数: 无
		// 返回: false或列表
		//==========================================
		public function get_payments(){
			$sql="select * from {$this->tabName} where pay_name!='Voucher' order by sort asc";
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
						$temp[]=$row;
				}
				return $temp;
			}
		}
		
		public function get_front_payments(){
			$sql="select * from {$this->tabName} where status = 1 and pay_name <> 'Account' and pay_name <> 'Voucher' and online_pay = 1 order by sort desc";
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
						$temp[]=$row;
				}
				return $temp;
			}
		}
		//选择支付方式，和支付接口进行校验
		public function getPaymentCode($notice_id){
			$paymentNotice=new PaymentNotice();
			$payment_notice = $paymentNotice->get($notice_id);
			$paylist=$this->get($payment_notice['payment_id']);
			switch($paylist['pay_name']){
				case 'Alipay':
					return $this->getAlipayCode($paylist,$payment_notice);
				break;
				case 'Chinabank':
					return $this->getChinabankCode($paylist,$payment_notice);
				break;
				case 'Tenpay':
					return $this->getTenpayCode($paylist,$payment_notice);
				break;
				
			}
		}
		//前往支付宝支付
		public function getAlipayCode($paylist,$payment_notice){
			$agent = 'C4335319945672464113';
			$config=unserialize($paylist['parameters']);
			$money = round($payment_notice['money'],2);
			$real_method = $config['service'];
			switch ($real_method){
				case '0':
					$service = 'trade_create_by_buyer';
					break;
				case '1':
					$service = 'create_partner_trade_by_buyer';
					break;
				case '2':
					$service = 'create_direct_pay_by_user';
					break;
    	    }
			$return_url = SERVER_ROOT.APP_PATH.'payment.php?act=return&pay_name=Alipay';
			$notify_url = SERVER_ROOT.APP_PATH.'payment.php?act=notify&pay_name=Alipay';
			$parameter = array(
				'agent'             => $agent,
				'service'           => $service,
				'partner'           => $config['partner'],
				'_input_charset'    => 'gb2312',
				'notify_url'        => $notify_url,
				'return_url'        => $return_url,
				/* 业务参数 */
				'subject'           => $order_sn,
				'out_trade_no'      => $payment_notice['notice_sn'], 
				'price'             => $money,
				'quantity'          => 1,
				'payment_type'      => 1,
				/* 物流参数 */
				'logistics_type'    => 'EXPRESS',
				'logistics_fee'     => 0,
				'logistics_payment' => 'BUYER_PAY_AFTER_RECEIVE',
				/* 买卖双方信息 */
				'seller_email'      => $config['account']
			);
			ksort($parameter);//按键值对数组进行排序
			reset($parameter);//将数组内部指针指向开始
	
			$param = '';
			$sign  = '';
	
			foreach ($parameter as $key => $val)
			{
				$param .= "$key=" .urlencode($val). "&";
				$sign  .= "$key=$val&";
			}
	
			$param = substr($param, 0, -1);
			$sign  = substr($sign, 0, -1). $config['key'];
			$sign_md5 = md5($sign);
			$button_name="前往支付宝在线支付";
			$payLinks = '<a onclick="window.open(\'https://www.alipay.com/cooperate/gateway.do?'.$param. '&sign='.$sign_md5.'&sign_type=MD5\')" href="javascript:;"><input type="submit" class="paybutton" name="buy" value="'.$button_name.'"/></a>';
			return $payLinks;
		}
		
		public function getChinabankCode($paylist,$payment_notice){
			$config=unserialize($paylist['parameters']);
			$money = round($payment_notice['money'],2);
			$button_name="前往网银在线页面支付";
			$data_vid           = trim($config['account']);
			$data_orderid       = $payment_notice['id'];
			$data_vamount       = $money;
			$data_vmoneytype    = 'CNY';
			$data_vpaykey       = trim($config['key']);
			$data_vreturnurl = SERVER_ROOT.APP_PATH.'/payment.php?act=return&pay_name=Chinabank';
	
			$MD5KEY =$data_vamount.$data_vmoneytype.$data_orderid.$data_vid.$data_vreturnurl.$data_vpaykey;
			$MD5KEY = strtoupper(md5($MD5KEY));
			$payLinks  = '<form style="text-align:center;" method=post action="https://pay3.chinabank.com.cn/PayGate" target="_blank">';
			$payLinks .= "<input type=HIDDEN name='v_mid' value='".$data_vid."'>";
			$payLinks .= "<input type=HIDDEN name='v_oid' value='".$data_orderid."'>";
			$payLinks .= "<input type=HIDDEN name='v_amount' value='".$data_vamount."'>";
			$payLinks .= "<input type=HIDDEN name='v_moneytype'  value='".$data_vmoneytype."'>";
			$payLinks .= "<input type=HIDDEN name='v_url'  value='".$data_vreturnurl."'>";
			$payLinks .= "<input type=HIDDEN name='v_md5info' value='".$MD5KEY."'>";
			$payLinks .= "<input type=HIDDEN name='remark1' value=''>";
			$payLinks .= "<input type='submit' class='paybutton' value='".$button_name."'>";
        	$payLinks .= "</form>";
			return $payLinks;
		}
		
		public function getTenpayCode($paylist,$payment_notice){
			$config=unserialize($paylist['parameters']);
			$money = round($payment_notice['money'],2);
			$button_name="前往财付通页面支付";
			
			$data_return_url = SERVER_ROOT.APP_PATH.'/payment.php?act=return&pay_name=Tenpay';
        	$cmd_no = '1';
			/* 获得订单的流水号，补零到10位 */
        	$sp_billno = $payment_notice['id'];
        	$spbill_create_ip =  $_SERVER['REMOTE_ADDR'];
			/* 交易日期 */
        	$today = Common::to_date($payment_notice['create_time'],'Ymd');
			/* 将商户号+年月日+流水号 */
			$bill_no = str_pad($payment_notice['id'], 10, 0, STR_PAD_LEFT);
			$transaction_id = $config['tenpay_id'].$today.$bill_no;
			/* 银行类型:支持纯网关和财付通 */
			$bank_type = '0';
			$order_sn = $this->getOne("select order_sn from ".TAB_PREFIX."cms_deal_orders where id = ".$payment_notice['order_id']);
			$desc = $order_sn."payment_notice:[".$payment_notice['notice_sn']."]";
			$attach = $payment_info['config']['tencentpay_sign'];
			/* 返回的路径 */
			$return_url = $data_return_url;
			/* 总金额 */
			$total_fee = $money*100;
			/* 货币类型 */
			$fee_type = '1';
			/* 数字签名 */
			$sign_text = "cmdno=" . $cmd_no . "&date=" . $today . "&bargainor_id=" . $config['tenpay_id'] .
			  "&transaction_id=" . $transaction_id . "&sp_billno=" . $sp_billno .
			  "&total_fee=" . $total_fee . "&fee_type=" . $fee_type . "&return_url=" . $return_url .
			  "&attach=" . $attach . "&spbill_create_ip=" . $spbill_create_ip ."&key=" . $config['key'];
			$sign = strtoupper(md5($sign_text));
			 /* 交易参数 */
			$parameter = array(
				'cmdno'             => $cmd_no,                     // 业务代码, 财付通支付支付接口填  1
				'date'              => $today,                      // 商户日期：如20051212
				'bank_type'         => $bank_type,                  // 银行类型:支持纯网关和财付通
				'desc'              => $desc,                       // 交易的商品名称
				'purchaser_id'      => '',                          // 用户(买方)的财付通帐户,可以为空
				'bargainor_id'      => $config['tenpay_id'],        // 商家的财付通商户号
				'transaction_id'    => $transaction_id,             // 交易号(订单号)，由商户网站产生(建议顺序累加)
				'sp_billno'         => $sp_billno,                  // 商户系统内部的定单号,最多10位
				'total_fee'         => $total_fee,                  // 订单金额
				'fee_type'          => $fee_type,                   // 现金支付币种
				'return_url'        => $return_url,                 // 接收财付通返回结果的URL
				'attach'            => $attach,                     // 用户自定义签名
				'spbill_create_ip'  => $spbill_create_ip,           // 安全防范参数
				'sign'              => $sign,                       // MD5签名
				//'sys_id'            => '542554970',                 //ecshop C账号 不参与签名
				//'sp_suggestuser'    => '1202822001'                 //财付通分配的商户号
			);
			// 将参数以表单的形式传给支付接口
			$payLinks = '<form style="text-align:center;" action="https://www.tenpay.com/cgi-bin/v1.0/pay_gate.cgi" target="_blank">';
			foreach ($parameter as $key=>$val){
				$payLinks  .= "<input type='hidden' name='$key' value='$val' />";
			}
			$payLinks .= "<input type='submit' class='paybutton' value='".$button_name."'>";
        	$payLinks .= "</form>";
			return $payLinks;
		}
		// 用于处理支付接口的响应，在act为return时调用
		public function response($request,$type){
			$return_res = array(
				'info'=>'',
				'status'=>false,
			);
			$payment_info = $this->get_other_datas("cms_payment","id,config","pay_name",$type);  
    		$payment['config'] = unserialize($payment_info[0]['config']);
			if($type=="Alipay"){
				ksort($request);
				reset($request);
				
				foreach ($request as $key=>$val)
				{
					if ($key != 'sign' && $key != 'sign_type' && $key != 'code' && $key!='class_name' && $key!='act' )
					{
						$sign .= "$key=$val&";
					}
				}
		
				$sign = substr($sign, 0, -1) . $payment['config']['key'];
		
				if (md5($sign) != $request['sign'])
				{
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="支付验证失败!";
					$tpl->assign("mess",$mess);
					$tpl->assign("default_url",$default_url);
					$tpl->assign("status_class",$status_class);
					$tpl->display($current_template."/inc/information.tpl");
					exit;
				}
				
				$payment_notice_sn = $request['out_trade_no'];
				$money = $request['total_fee'];
				if ($request['trade_status'] == 'TRADE_SUCCESS' || $request['trade_status'] == 'TRADE_FINISHED' || $request['trade_status'] == 'WAIT_SELLER_SEND_GOODS'){
					$payment_notice = $this->get_other_datas("cms_payment_notice"."*","notice_sn",$payment_notice_sn);
					$this->payment_done($payment_notice[0]);
				} else {
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="支付失败!";
					$tpl->assign("mess",$mess);
					$tpl->assign("default_url",$default_url);
					$tpl->assign("status_class",$status_class);
					$tpl->display($current_template."/inc/information.tpl");
					exit;
				}
			}elseif($type=="Chinabank"){
				$v_oid          = trim($request['v_oid']);
				$v_pmode        = trim($request['v_pmode']);
				$v_pstatus      = trim($request['v_pstatus']);
				$v_pstring      = trim($request['v_pstring']);
				$v_amount       = trim($request['v_amount']);
				$v_moneytype    = trim($request['v_moneytype']);
				$remark1        = trim($request['remark1' ]);
				$remark2        = trim($request['remark2' ]);
				$v_md5str       = trim($request['v_md5str' ]);
				/**
				 * 重新计算md5的值
				 */
				$key            = $payment['config']['chinabank_key'];
		
				$md5string=strtoupper(md5($v_oid.$v_pstatus.$v_amount.$v_moneytype.$key));
				
				//开始初始化参数
				$payment_notice_id = $v_oid;
				$money = $v_amount;
				$payment_id = $payment['id'];   
				if($v_md5str==$md5string&&$v_pstatus == '20'){
					$payment_notice = $this->get_other_datas("cms_payment_notice"."*","id",$payment_notice_id);
					$this->payment_done($payment_notice[0]);
				}
			}elseif($type=="Tenpay"){
				 /*取返回参数*/
				$cmd_no         = $request['cmdno'];
				$pay_result     = $request['pay_result'];
				$pay_info       = $request['pay_info'];
				$bill_date      = $request['date'];
				$bargainor_id   = $request['bargainor_id'];
				$transaction_id = $request['transaction_id'];
				$sp_billno      = $request['sp_billno'];
				$total_fee      = $request['total_fee'];
				$fee_type       = $request['fee_type'];
				$attach         = $request['attach'];
				$sign           = $request['sign'];
		
				//开始初始化参数
				$payment_notice_id = intval($sp_billno);
				$payment_id = $payment['id'];
		 
				if ($pay_result > 0){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="支付失败!";
					$tpl->assign("mess",$mess);
					$tpl->assign("default_url",$default_url);
					$tpl->assign("status_class",$status_class);
					$tpl->display($current_template."/inc/information.tpl");
					exit;
				}
				
				$total_price = $total_fee / 100;
		
				/* 检查数字签名是否正确 */
				$sign_text  = "cmdno=" . $cmd_no . "&pay_result=" . $pay_result .
								  "&date=" . $bill_date . "&transaction_id=" . $transaction_id .
									"&sp_billno=" . $sp_billno . "&total_fee=" . $total_fee .
									"&fee_type=" . $fee_type . "&attach=" . $attach .
									"&key=" . $payment['config']['key'];
				$sign_md5 = strtoupper(md5($sign_text));
				if($sign_md5 == $sign){
					$payment_notice = $this->get_other_datas("cms_payment_notice"."*","id",$payment_notice_id);
					$this->payment_done($payment_notice[0]);
				}
			}
		}
		
		// 根据接口的返回情况来判断是否支付成功
		private function payment_done($payment_notice){
			$deal_order=new DealOrder();
			$payment_notice=new PaymentNotice();
			$order_info =$deal_order->get($payment_notice['order_id']);
			$rs = $payment_notice->paymentPaid($payment_notice['id'],array("memo"=>"","order_id"=>$payment_notice['order_id']));						
			if($rs)
			{
				$rs = $deal_order->orderPaid($payment_notice['order_id']);
				if($rs)
				{
					if($order_info['type']==0)
						Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=done&id=".$order[0]['id'])); //支付成功
					else
						Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=incharge_done&id=".$order[0]['id'])); //支付成功
				}else{
					if($order_info['pay_status'] == 2){
						if($order_info['type']==0)
							Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=done&id=".$order[0]['id'])); //支付成功
						else
							Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=incharge_done&id=".$order[0]['id'])); //支付成功
					}
					else
						Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=pay&id=".$order[0]['id']));
				}
			}else{
				Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=pay&id=".$order[0]['id']));
			}
		}
		
		
		public function notify($request,$type){
			if($type=="Alipay"){
				$return_res = array(
					'info'=>'',
					'status'=>false,
				);
				$payment_info = $this->get_other_datas("cms_payment","id,config","pay_name",$type);  
				$payment['config'] = unserialize($payment_info[0]['config']);
				 /* 检查数字签名是否正确 */
				ksort($request);
				reset($request);
			
				foreach ($request as $key=>$val)
				{
					if ($key != 'sign' && $key != 'sign_type' && $key != 'code' && $key!='pay_name' && $key!='act' )
					{
						$sign .= "$key=$val&";
					}
				}
		
				$sign = substr($sign, 0, -1) . $payment['config']['key'];
		
				if (md5($sign) != $request['sign'])
				{
					echo '0';
				}
				
				$payment_notice_sn = $request['out_trade_no'];
				
				$money = $request['total_fee'];
		
				if ($request['trade_status'] == 'TRADE_SUCCESS' || $request['trade_status'] == 'TRADE_FINISHED' || $request['trade_status'] == 'WAIT_SELLER_SEND_GOODS'){
					$deal_order=new DealOrder();
					$payment_notice = $this->get_other_datas("cms_payment_notice"."*","notice_sn",$payment_notice_sn);
					$rs = $payment_notice->paymentPaid($payment_notice[0]['id'],array("memo"=>"","order_id"=>$payment_notice[0]['order_id']));						
					if($rs){				
						$deal_order->orderPaid($payment_notice['order_id']);
						echo '1';
					}else{
						echo '0';
					}
					
				}else{
				   echo '0';
				}
			} else {
				return false;
			}
		}
		
		//==========================================
		// 函数: validateForm()
		// 功能: 对添加的内容或修改的内容进行验证
		// 参数: 无
		// 返回: true或false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['sort'])) {
				$this->messList[] = "排序不能为空!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['sort'])){
				$this->messList[] = "排序必须为数字!";
				$result=false;
			}
			
			return  $result;
		}	
		
		
	}
	
?>