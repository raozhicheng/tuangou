<?php
/*==================================================================*/
	/*		�ļ���:Payment.class.php                              */
	/*		��Ҫ: ֧���ӿڹ���     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
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
				$this->messList[] = "ͼƬ�ϴ��ɹ���";
				return true;
			}	
		}
		//==========================================
		// ����: modPayment($post)
		// ����: ���������ݿ����޸�֧���ӿ�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
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
						$this->messList[] = "�޸�֧���ӿڳɹ���";
						return true;
					}else{
						$this->messList[] = "�޸�֧���ӿ�ʧ�ܣ�";
						return false;
					}
				} else {
					$this->messList[] = "ͼƬ�޸�ʧ�ܣ�";
					return false;
				} 
			} else {
				if($this->mod($post)){
					$this->messList[] = "�޸�֧���ӿڳɹ���";
					return true;
				}else{
					$this->messList[] = "�޸�֧���ӿ�ʧ�ܣ�";
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
		// ����: getParameters()
		// ����: ��֧���ӿڲ����ϲ�Ϊ����
		// ����: arr�����õ��ļ�¼����
		// ����: ��������
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
		// ����: get_payments()
		// ����: ��ȡ֧���ӿ�
		// ����: ��
		// ����: false���б�
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
		//ѡ��֧����ʽ����֧���ӿڽ���У��
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
		//ǰ��֧����֧��
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
				/* ҵ����� */
				'subject'           => $order_sn,
				'out_trade_no'      => $payment_notice['notice_sn'], 
				'price'             => $money,
				'quantity'          => 1,
				'payment_type'      => 1,
				/* �������� */
				'logistics_type'    => 'EXPRESS',
				'logistics_fee'     => 0,
				'logistics_payment' => 'BUYER_PAY_AFTER_RECEIVE',
				/* ����˫����Ϣ */
				'seller_email'      => $config['account']
			);
			ksort($parameter);//����ֵ�������������
			reset($parameter);//�������ڲ�ָ��ָ��ʼ
	
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
			$button_name="ǰ��֧��������֧��";
			$payLinks = '<a onclick="window.open(\'https://www.alipay.com/cooperate/gateway.do?'.$param. '&sign='.$sign_md5.'&sign_type=MD5\')" href="javascript:;"><input type="submit" class="paybutton" name="buy" value="'.$button_name.'"/></a>';
			return $payLinks;
		}
		
		public function getChinabankCode($paylist,$payment_notice){
			$config=unserialize($paylist['parameters']);
			$money = round($payment_notice['money'],2);
			$button_name="ǰ����������ҳ��֧��";
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
			$button_name="ǰ���Ƹ�ͨҳ��֧��";
			
			$data_return_url = SERVER_ROOT.APP_PATH.'/payment.php?act=return&pay_name=Tenpay';
        	$cmd_no = '1';
			/* ��ö�������ˮ�ţ����㵽10λ */
        	$sp_billno = $payment_notice['id'];
        	$spbill_create_ip =  $_SERVER['REMOTE_ADDR'];
			/* �������� */
        	$today = Common::to_date($payment_notice['create_time'],'Ymd');
			/* ���̻���+������+��ˮ�� */
			$bill_no = str_pad($payment_notice['id'], 10, 0, STR_PAD_LEFT);
			$transaction_id = $config['tenpay_id'].$today.$bill_no;
			/* ��������:֧�ִ����غͲƸ�ͨ */
			$bank_type = '0';
			$order_sn = $this->getOne("select order_sn from ".TAB_PREFIX."cms_deal_orders where id = ".$payment_notice['order_id']);
			$desc = $order_sn."payment_notice:[".$payment_notice['notice_sn']."]";
			$attach = $payment_info['config']['tencentpay_sign'];
			/* ���ص�·�� */
			$return_url = $data_return_url;
			/* �ܽ�� */
			$total_fee = $money*100;
			/* �������� */
			$fee_type = '1';
			/* ����ǩ�� */
			$sign_text = "cmdno=" . $cmd_no . "&date=" . $today . "&bargainor_id=" . $config['tenpay_id'] .
			  "&transaction_id=" . $transaction_id . "&sp_billno=" . $sp_billno .
			  "&total_fee=" . $total_fee . "&fee_type=" . $fee_type . "&return_url=" . $return_url .
			  "&attach=" . $attach . "&spbill_create_ip=" . $spbill_create_ip ."&key=" . $config['key'];
			$sign = strtoupper(md5($sign_text));
			 /* ���ײ��� */
			$parameter = array(
				'cmdno'             => $cmd_no,                     // ҵ�����, �Ƹ�֧ͨ��֧���ӿ���  1
				'date'              => $today,                      // �̻����ڣ���20051212
				'bank_type'         => $bank_type,                  // ��������:֧�ִ����غͲƸ�ͨ
				'desc'              => $desc,                       // ���׵���Ʒ����
				'purchaser_id'      => '',                          // �û�(��)�ĲƸ�ͨ�ʻ�,����Ϊ��
				'bargainor_id'      => $config['tenpay_id'],        // �̼ҵĲƸ�ͨ�̻���
				'transaction_id'    => $transaction_id,             // ���׺�(������)�����̻���վ����(����˳���ۼ�)
				'sp_billno'         => $sp_billno,                  // �̻�ϵͳ�ڲ��Ķ�����,���10λ
				'total_fee'         => $total_fee,                  // �������
				'fee_type'          => $fee_type,                   // �ֽ�֧������
				'return_url'        => $return_url,                 // ���ղƸ�ͨ���ؽ����URL
				'attach'            => $attach,                     // �û��Զ���ǩ��
				'spbill_create_ip'  => $spbill_create_ip,           // ��ȫ��������
				'sign'              => $sign,                       // MD5ǩ��
				//'sys_id'            => '542554970',                 //ecshop C�˺� ������ǩ��
				//'sp_suggestuser'    => '1202822001'                 //�Ƹ�ͨ������̻���
			);
			// �������Ա�����ʽ����֧���ӿ�
			$payLinks = '<form style="text-align:center;" action="https://www.tenpay.com/cgi-bin/v1.0/pay_gate.cgi" target="_blank">';
			foreach ($parameter as $key=>$val){
				$payLinks  .= "<input type='hidden' name='$key' value='$val' />";
			}
			$payLinks .= "<input type='submit' class='paybutton' value='".$button_name."'>";
        	$payLinks .= "</form>";
			return $payLinks;
		}
		// ���ڴ���֧���ӿڵ���Ӧ����actΪreturnʱ����
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
					$mess="֧����֤ʧ��!";
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
					$mess="֧��ʧ��!";
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
				 * ���¼���md5��ֵ
				 */
				$key            = $payment['config']['chinabank_key'];
		
				$md5string=strtoupper(md5($v_oid.$v_pstatus.$v_amount.$v_moneytype.$key));
				
				//��ʼ��ʼ������
				$payment_notice_id = $v_oid;
				$money = $v_amount;
				$payment_id = $payment['id'];   
				if($v_md5str==$md5string&&$v_pstatus == '20'){
					$payment_notice = $this->get_other_datas("cms_payment_notice"."*","id",$payment_notice_id);
					$this->payment_done($payment_notice[0]);
				}
			}elseif($type=="Tenpay"){
				 /*ȡ���ز���*/
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
		
				//��ʼ��ʼ������
				$payment_notice_id = intval($sp_billno);
				$payment_id = $payment['id'];
		 
				if ($pay_result > 0){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="֧��ʧ��!";
					$tpl->assign("mess",$mess);
					$tpl->assign("default_url",$default_url);
					$tpl->assign("status_class",$status_class);
					$tpl->display($current_template."/inc/information.tpl");
					exit;
				}
				
				$total_price = $total_fee / 100;
		
				/* �������ǩ���Ƿ���ȷ */
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
		
		// ���ݽӿڵķ���������ж��Ƿ�֧���ɹ�
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
						Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=done&id=".$order[0]['id'])); //֧���ɹ�
					else
						Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=incharge_done&id=".$order[0]['id'])); //֧���ɹ�
				}else{
					if($order_info['pay_status'] == 2){
						if($order_info['type']==0)
							Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=done&id=".$order[0]['id'])); //֧���ɹ�
						else
							Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=incharge_done&id=".$order[0]['id'])); //֧���ɹ�
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
				 /* �������ǩ���Ƿ���ȷ */
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
		// ����: validateForm()
		// ����: ����ӵ����ݻ��޸ĵ����ݽ�����֤
		// ����: ��
		// ����: true��false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['sort'])) {
				$this->messList[] = "������Ϊ��!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['sort'])){
				$this->messList[] = "�������Ϊ����!";
				$result=false;
			}
			
			return  $result;
		}	
		
		
	}
	
?>