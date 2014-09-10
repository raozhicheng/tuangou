<?php
/*==================================================================*/
	/*		文件名:PaymentNotice.class.php                              */
	/*		概要: 付款单管理（paymentnotice=付款单信息？）     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class PaymentNotice extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_payment_notice";
				$this->fieldList=array("notice_sn","create_time","pay_time","order_id","is_paid","user_id","payment_id","memo","money");
		}
		
		
		
		
		public function addPaymentNotice($notices=array()){
			$notices['create_time']=Common::get_gmtime();
			$notices['notice_sn']=Common::date_to_name();
			if($id=$this->add($notices)){
				
				if($this->paymentPaid($id,$notices)){
					$this->messList[] = "管理员收款成功！";
					return true;
				} else {
					$this->messList[] = "管理员收款失败！";
					return false;
				}
				
			}else{
				$this->messList[] = "付款单填加失败！";
				return false;
			}
		
		}
		
		
		public function paymentPaid($notice_id,$notices){
			$notice_id = intval($notice_id);
			$now = Common::get_gmtime();
			$result=$this->mysqli->query("update {$this->tabName} set pay_time={$now},is_paid=1 where id={$notice_id} and is_paid=0");
			$rs=$result->affected_rows;
			$user_log=new UserLog();
			$logAction=new LogAction();
			$deal_order_log=new DealOrdersLog();
			
			if($result){
				$payment_notice=$this->get($notice_id);
				//支付方式
				$payment_info=$this->get_other_datas("cms_payment","*","id",$payment_notice['payment_id']);
				//订单详情
				$order_info=$this->get_other_datas("cms_deal_orders","is_delete","id",$payment_notice['order_id']);
				switch($payment_info[0]['pay_name']){
					case 'Voucher':
						$sql="update ".TAB_PREFIX."cms_deal_orders set pay_amount=pay_amount+{$payment_notice['money']},ecv_money={$payment_notice['money']} where id={$payment_notice['order_id']} and ((pay_amount+{$payment_notice['money']}<=total_price) or ({$payment_notice['money']}>=total_price))";
					break;
					case 'Account':
						$sql="update ".TAB_PREFIX."cms_deal_orders set pay_amount=pay_amount+{$payment_notice['money']},account_money=account_money+{$payment_notice['money']} where id={$payment_notice['order_id']} and pay_amount+{$payment_notice['money']}<=total_price";
					break;
					default:
						$sql="update ".TAB_PREFIX."cms_deal_orders set pay_amount=pay_amount+{$payment_notice['money']} where id={$payment_notice['order_id']} and pay_amount+{$payment_notice['money']}<=total_price";
					break;
				}
				$rs=$this->mysqli->query($sql);
				
				$this->mysqli->query("update ".TAB_PREFIX."cms_payment set total_amount=total_amount+{$payment_notice['money']} where pay_name={$payment_info[0]['pay_name']}");
				
				if(!$rs){
					
					if($order_info[0]['is_delete']){
						$msg = sprintf("%s付款单相关的订单被用户删除，充值到会员中心",$payment_notice['notice_sn']);
					}else{
						$msg = sprintf("%s付款单重复支付或超额支付，充值到会员中心",$payment_notice['notice_sn']);
					}
					$user_log->modAccount(array('money'=>$payment_notice['money'],'score'=>0,'user_id'=>$payment_notice['user_id']),$msg);
					$this->mysqli->query("update ".TAB_PREFIX."cms_deal_orders set extra_status=1 where id={$payment_notice['order_id']}");
				}
				
				//send_payment_sms($notice_id);
				//send_payment_mail($notice_id);
			}//end if $rs
			
			//余额支付
			if($result&&$payment_info[0]['pay_name']=="Account"){
				$msg=sprintf("%s订单付款,付款单号%s",$order_info[0]['order_sn'],$payment_notice['notice_sn']);
				$user_log->modAccount(array('money'=>"-".$payment_notice['money'],'score'=>0,'user_id'=>$payment_notice['user_id']),$msg);
			}
			if($result){
				$msg=sprintf("%s创建收款单%s收款",$order_info[0]['order_sn'],$payment_notice['notice_sn']);
				$logAction->write_log(1,"do_incharge",$msg);
				$deal_order_log->write_log($msg.$notices['memo'],$notices['order_id']);
			}
			return $rs;
		}
		
		//==========================================
		// 函数: get_paymentNotice()
		// 功能: 获取付款单信息
		// 参数: is_all:是否是全部列出,offset:is_all为否的话偏移量,num:个数,is_search为是否查询
		// 返回: false或列表
		//==========================================
		public function get_paymentNotice($is_all=true,$offset=0,$num=0,$is_search=false){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if(!$is_search){
				$sql="select * from {$this->tabName} order by id asc".$limit;
			} else {
				$payment_id=$_POST['payment_id'];
				$string=$_POST['search_text'];
				if($payment_id){
					$tmpPay="and payment_id={$payment_id}";
				} else {
					$tmpPay="";
				}
				$sql="SELECT * from {$this->tabName} WHERE notice_sn LIKE '%{$string}%' ".$tmpPay." order by id asc".$limit;
			}
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
		
		public function makePaymentNotice($notices=array()){
			if($id=$this->add($notices)){
				return $id;
				
			}else{
				return false;
			}
	
		}
		
		
		//获取付款单总个数()
		public function get_paymentNotice_num(){
			if($_GET['edit']=="search"){
				$string=$_POST['search_text'];
				$payment_id=$_POST['payment_id'];
				if($payment_id){
					$tmpPay="and payment_id={$payment_id}";
				} else {
					$tmpPay="";
				}
				$sql="SELECT id from {$this->tabName} WHERE notice_sn LIKE '%{$string}%' ".$tmpPay;
			} else {
				$sql="select id from {$this->tabName}";
			}
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
		
		
}
	
?>