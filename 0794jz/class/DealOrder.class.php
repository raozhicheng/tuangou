<?php
/*==================================================================*/
	/*		�ļ���:DealOrder.class.php                              */
	/*		��Ҫ: �Ź���������     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DealOrder extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal_orders";
				$this->fieldList=array("order_sn","type","user_id","create_time","update_time","pay_status","total_price","pay_amount","delivery_status","order_status","is_delete","return_total_score","refund_amount","admin_memo","memo","region_lv1","region_lv2","region_lv3","region_lv4","address","mobile","zip","consignee","deal_total_price","discount_price","delivery_fee","ecv_money","account_money","delivery_id","payment_id","payment_fee","return_total_money","extra_status","after_sale","refund_money");
		}
		//==========================================
		// ����: addDealOrder($post)
		// ����: ���������ݿ�������Ź�����
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addDealOrder($post) {
			if($id=$this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return $id;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modDealOrder($post)
		// ����: ���������ݿ����޸��Ź�����
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modDealOrder($post) {
			if($_GET['edit']=="mod_viewOrder"){
				$post['after_sale']=intval($post['after_sale'][0]+$post['after_sale'][1]);
			} elseif($_GET['edit']=="finish_order"){
				$sql="select id from {$this->tabName} where id=".$post['id']." and is_delete = 0 and type = 0 and order_status = 0 and (pay_status = 2 and ((delivery_status = 2 or delivery_status = 5)) or (pay_amount = refund_money))";
				$result=$this->mysqli->query($sql);
				if(!$result){
					$this->messList[] = "�Ƿ��������ݣ�";
					return false;
				}
			} elseif($_GET['edit']=="open_order"){
				$sql="select id from {$this->tabName} where id=".$post['id']." and is_delete = 0 and type = 0 and order_status = 0 and (pay_status = 2 and ((delivery_status = 2 or delivery_status = 5)) or (pay_amount = refund_money))";
				$result=$this->mysqli->query($sql);
				if(!$result){
					$this->messList[] = "�Ƿ��������ݣ�";
					return false;
				}
			}
			
			if($this->mod($post)){
				$this->messList[] = "�༭�ɹ���";
				return true;
			}else{
				$this->messList[] = "�༭ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modOrderIncharge($post)
		// ����: ����Ա�տ����
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modOrderIncharge($post,$infos) {
			if($infos['user_money']<$infos['pay_amount'] && $infos['payment_name']=="Account"){
				
				$this->messList[] = "�ʺ����㣡";
				return false;
				
			} else {
				
				if($this->mod($post)){
					$this->messList[] = "�տ�ɹ���";
					return true;
				}else{
					$this->messList[] = "�տ�ʧ�ܣ�";
					return false;
				}
			}
		}
		
		
		
		//==========================================
		// ����: delDealOrder($id)
		// ����: ���Ź������������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delDealOrder($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delDealOrders($id)
		// ����: ���Ź������������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delDealOrders($id) {
			if(count($id)==0){
				$this->messList[] = "��ѡ����Ҫɾ���ķ��࣡";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1 WHERE id ";
			if(is_array($id)) {
				$sql .= "IN (" . join(",", $id) . ")";

			}else{
				$sql .= "= $id";
			}

			if($this->mysqli->query($sql)){
				$this->messList[] = "����ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "����ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: orderPaid($order_id)
		// ����: ͬ������֧��״̬
		// ����: order_id
		// ����: true��false
		//==========================================		
		public function orderPaid($order_id){
			$order_id  = intval($order_id);
			$deal_orders=$this->get($order_id);
			if($deal_orders['pay_amount']>=$deal_orders['total_price']){
				$result=$this->mysqli->query("update {$this->tabName} set pay_status = 2 where id =".$order_id." and pay_status <> 2");
				if($result){
					$this->messList[] = "ͬ������֧���ɹ���";
					$this->orderPaidDone($order_id);
					$orderPaidStatus=true;
				}
			} elseif($deal_orders['pay_amount']<$deal_orders['total_price']&&$deal_orders['pay_amount']!=0){
				$this->mysqli->query("update {$this->tabName} set pay_status = 1 where id =".$order_id);
				$this->messList[] = "��������֧����";
				$orderPaidStatus=false;
			} elseif($deal_orders['pay_amount']==0){
				$this->mysqli->query("update {$this->tabName} set pay_status = 0 where id =".$order_id);
				$this->messList[] = "����δ֧����";
				$orderPaidStatus=false;
			}
			return $orderPaidStatus;
		}
		
		//����������Ϻ�ִ�еĲ���,��ֵ��Ҳ���⴦��
		private function orderPaidDone($order_id){
			$order_id = intval($order_id);
			$stock_status = true;  //�Ź�״̬
			$order_info = $this->get($order_id);
			if($order_info['type'] == 0){
				$goods_list=$this->get_other_datas("cms_deal_order_item","deal_id,sum(number) as num","order_id",$order_id." group by deal_id");
				foreach($goods_list as $k=>$v)
				{
					$sql = "update ".TAB_PREFIX."cms_deal set buy_count = buy_count + ".$v['num'].
						   ",user_count = user_count + 1 where id=".$v['deal_id'].
						   " and ((buy_count + ".$v['num']."<= max_bought) or max_bought = 0) ".
						   " and time_status = 1 and buy_status <> 2";
			
					$rs=$this->mysqli->query($sql); //������Ʒ�ķ�����
					
					if($rs){
						$affect_list[] = $v;  //��¼�¸��³ɹ����Ź���Ʒ�����ڻع�
					}else{
						//ʧ�ܳɹ���������֧��������֧��
						$stock_status = false;
						break;
					}
				}
			
			
				if($stock_status){ //�����ɹ�����ȯ
					foreach($goods_list as $k=>$v){//Ϊ��Ӧ�Ź���ȯ
						$deal_info = $this->get_other_datas("cms_deal","*","id",intval($v['deal_id']));
						if($deal_info[0]['is_coupon']){
							
							if($deal_info[0]['deal_type']){
								$deal_order_item_list = $this->get_other_datas("cms_deal_order_item","*","order_id",$order_info['id']." and deal_id = ".$v['deal_id']);
								foreach($deal_order_item_list as $item){
									$sql = "update ".TAB_PREFIX."cms_deal_coupon set user_id=".$order_info['user_id'].
										   ",order_id = ".$order_info['id'].
										   ",order_deal_id = ".$item['id'].
										   " where deal_id = ".$v['deal_id'].
										   " and user_id = 0 ".
										   " and is_delete = 0";
									$exist_coupon=$this->mysqli->query($sql);
									if(!$exist_coupon)
									{
										//δ���ͳɹ������޿ɷ��ŵ�Ԥ���Ź�ȯ
										$deal_coupon=new DealCoupon();
										$d_temp=array("is_valid"=>0,"user_id"=>$order_info['user_id'],"deal_id"=>$v['deal_id'],"begin_time"=>0,"end_time"=>0,"order_deal_id"=>$item['id'],"supplier_id"=>$deal_info['supplier_id'],"order_id"=>$order_info['id']);
										$deal_coupon->addDealCoupon($d_temp);
									}
								}
							} else {
								$deal_order_item_list = $this->get_other_datas("cms_deal_order_item","*","order_id",$order_info['id']." and deal_id = ".$v['deal_id']);
								foreach($deal_order_item_list as $item){
										for($i=0;$i<$item['number'];$i++) {
											$sql = "update ".TAB_PREFIX."cms_deal_coupon set user_id=".$order_info['user_id'].
												   ",order_id = ".$order_info['id'].
												   ",order_deal_id = ".$item['id'].
												   " where deal_id = ".$v['deal_id'].
												   " and user_id = 0 ".
												   " and is_delete = 0 limit 1";
											$exist_coupon=$this->mysqli->query($sql);
											if(!$exist_coupon)
											{
												//δ���ͳɹ������޿ɷ��ŵ�Ԥ���Ź�ȯ
												$deal_coupon=new DealCoupon();
												$d_temp=array("is_valid"=>0,"user_id"=>$order_info['user_id'],"deal_id"=>$v['deal_id'],"begin_time"=>0,"end_time"=>0,"order_deal_id"=>$item['id'],"supplier_id"=>$deal_info['supplier_id'],"order_id"=>$order_info['id']);
												$deal_coupon->addDealCoupon($d_temp);
											}
										}
								}
							}
							
						}
					}
					//��ʼ�������Ļ��ֻ��ֽ�
					$user_log=new UserLog();
					if($order_info['return_total_money']!=0){
						$msg = sprintf("%s�������ֽ�",$order_info['order_sn']);
						$user_log->modAccount(array('money'=>$order_info['return_total_money'],'score'=>0,'user_id'=>$order_info['user_id']),$msg);
					}
					
					if($order_info['return_total_score']!=0){
						$msg = sprintf("%s����������",$order_info['order_sn']);
						$user_log->modAccount(array('money'=>0,'score'=>$order_info['return_total_score'],'user_id'=>$order_info['user_id']),$msg);
					}
					//��ʼ��������ֻ���������� ���Ž���msg_list���Զ�����һ��ִ��
					$user_info = $this->get_other_datas("cms_user","*","id",$order_info['user_id']);
					//��ʼ��ѯ��������б���֧��֧�ִ���
					$is_referrals = 1; //Ĭ��Ϊ����
					foreach($goods_list as $k=>$v){
						$is_referrals = $this->getOne("select is_referral from ".TAB_PREFIX."cms_deal where id = ".$v['deal_id']);
						if(!$is_referrals)
						{
							break;
						}
					}
					
					if($user_info[0]['referral_count']<Common::get_config("REFERRAL_LIMIT")&&$is_referrals == 1){
						//��ʼ�������Ƽ���
						$parent_info = $this->get_other_datas("user","*","id",$user_info[0]['pid']);
						
						if($parent_info){
							if((Common::get_config("REFERRAL_IP_LIMIT")&&$parent_info[0]['login_ip']!=Common::get_ip())||Common::get_config("REFERRAL_IP_LIMIT")==0){ //IP����
							$referral=new Referral();
								if(Common::get_config("REFERRALS_TYPE")==0){ //�ֽ���
								
									$referral_data['user_id'] = $parent_info[0]['id']; //�������Ļ�ԱID
									$referral_data['rel_user_id'] = $user_info[0]['id'];	 //���Ƽ��ҷ�������Ļ�ԱID
									$referral_data['create_time'] = Common::get_gmtime();
									$referral_data['money']	=	Common::get_config("INVITE_REFERRALS");
									$referral_data['order_id']	=	$order_info['id'];
									$referral->addReferral($referral_data);
								}else{
									$referral_data['user_id'] = $parent_info[0]['id']; //�������Ļ�ԱID
									$referral_data['rel_user_id'] = $user_info[0]['id'];	 //���Ƽ��ҷ�������Ļ�ԱID
									$referral_data['create_time'] =  Common::get_gmtime();
									$referral_data['score']	=	Common::get_config("INVITE_REFERRALS");
									$referral_data['order_id']	=	$order_info['id'];
									$referral->addReferral($referral_data); //����
								}
								$this->mysqli->query("update ".TAB_PREFIX."cms_user set referral_count = referral_count + 1 where id = ".$user_info['id']);
							}				
							
						}
					}
					
					//������ֵ
					if($order_info['pay_amount']>$order_info['total_price']){
						if($order_info['total_price']<0)
						$msg = sprintf("%s������ֵ",$order_info['order_sn']);
						else
						$msg = sprintf("%s�����г���֧����������ݱ�ת�浽��Ա����",$order_info['order_sn']);
						$refund_money = $order_info['pay_amount']-$order_info['total_price'];
						
						if($order_info['account_money']>$refund_money){
							$account_money_now = $order_info['account_money'] - $refund_money; 
						}else{ 
							$account_money_now = 0;
						}
						$this->mysqli->query("update ".TAB_PREFIX."cms_deal_orders set account_money = ".$account_money_now." where id = ".$order_info['id']);	
						
						if($order_info['ecv_money']>$refund_money){
							$ecv_money_now = $order_info['ecv_money'] - $refund_money;
						}else{
							$ecv_money_now = 0;
						}
						$this->mysqli->query("update ".TAB_PREFIX."cms_deal_orders set ecv_money = ".$ecv_money_now." where id = ".$order_info['id']);	
						
						$user_log->modAccount(array('money'=>($order_info['pay_amount']-$order_info['total_price']),'score'=>0,'user_id'=>$order_info['user_id']),$msg);
					}
					
				}else {
					//��ʼģ������ع�
					foreach($affect_list as $k=>$v){
						$sql = "update ".TAB_PREFIX."cms_deal set buy_count = buy_count - ".$v['num'].
							   ",user_count = user_count - 1 where id=".$v['deal_id'];
						$this->mysqli->query($sql); //�ع��ѷ��Ļ���
					}
					
					//������ֵ
					$user_log=new UserLog();
					$deal_orders_log=new DealOrdersLog();
					$msg = sprintf("%s���������Ź������⣬������Ʒ֧������Ա����",$order_info['order_sn']);			
					$user_log->modAccount(array('money'=>$order_info['total_price'],'score'=>0,'user_id'=>$order_info['user_id']),$msg);	
					//��������extra_status ״̬����Ϊ2�����Զ��˿�ᵥ
					$this->mysqli->query("update ".TAB_PREFIX."cms_deal_orders set extra_status = 2, after_sale = 1, refund_money = pay_amount, order_status = 1 where id = ".intval($order_info['id']));
					
					//��¼�˿�Ķ�����־		
					$deal_orders_log->write_log($msg,intval($order_info['id']));
					
				}//end if stock_status 
				//ͬ������δ���ڵ��Ź�״̬
				$deals=new Deals();
				$deals->syn_dealing();	
					
					
			} else {//end of order type if
				//������ֵ
				$user_log=new UserLog();
				$this->mysqli->query("update ".TAB_PREFIX."cms_deal_orders set order_status = 1 where id = ".$order_info['id']); //��ֵ���Զ��ᵥ
				$msg = sprintf("��ֵ��%s֧���ɹ�",$order_info['order_sn']);			
				$user_log->modAccount(array('money'=>$order_info['total_price']-$order_info['payment_fee'],'score'=>0,'user_id'=>$order_info['user_id']),$msg);
			}
		}//end of function
		
		//==========================================
		// ����: get_dealOrders()
		// ����: ��ȡ�Ź�����
		// ����: is_all:�Ƿ���ȫ���г�,offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_dealOrders($is_all=true,$type="orders",$offset=0,$num=0,$is_search=false){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if($type=="orders"){
				$tmpType=" and type=0";
			}else if($type=="recharge"){
				$tmpType=" and type=1";
			}
			if(!$is_search){
				$sql="select * from {$this->tabName} where is_delete!=1".$tmpType." order by id desc".$limit;
			} else {
				$string=$_POST['search_text'];
				$pay_status=$_POST['pay_status'];
				$extra_status=$_POST['extra_status'];
				$delivery_status=$_POST['delivery_status'];
				$order_status=$_POST['order_status'];
				if($pay_status!=-1){
					$tmpPay="and pay_status={$pay_status}";
				} else {
					$tmpPay="";
				}
				if($delivery_status!=-1){
					$tmpDeli=" and delivery_status={$delivery_status}";
				} else {
					$tmpDeli="";
				}
				if($extra_status!=-1){
					$tmpExt=" and extra_status={$extra_status}";
				} else {
					$tmpExt="";
				}
				if($order_status!=-1){
					$tmpOrder=" and order_status={$order_status}";
				} else {
					$tmpOrder="";
				}
				$sql="SELECT * from {$this->tabName} WHERE order_sn LIKE '%{$string}%' and is_delete!=1 ".$tmpPay.$tmpDeli.$tmpExt.$tmpOrder.$tmpType." order by id desc".$limit;
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
		
		public function get_front_order($id=0,$user_id=0,$type="orders",$offset=0,$num=0){
			if($id){
				$sql="select * from {$this->tabName} where id = ".$id." and is_delete = 0";
				$list = $this->getAll($sql);
			}else {
				if($offset!=0 || $num!=0){
					$limit=" LIMIT {$offset}, {$num}";
				} else{
					$limit="";
				}
				if($type=="orders"){
					$tmpType=" and type=0";
				}else if($type=="recharge"){
					$tmpType=" and type=1";
				}
				
				$sql="select * from {$this->tabName} where user_id = ".$user_id." and is_delete = 0 ".$tmpType." order by create_time desc".$limit;
				$list = $this->getAll($sql);
				foreach($list as $k=>$v){
					$sql="select * from ".TAB_PREFIX."cms_payment_notice where order_id = ".$v['id'];
					$t=$this->getAll($sql);
					$list[$k]['payment_notice'] =$t[0] ;
					$list[$k]['payment_notice']['pay_time']=Common::to_date($list[$k]['payment_notice']['pay_time']);
				}
				
			}
			return $list;
		}
		
		public function get_delivery_sn($id){
			$is_delivery = $this->getOne("select d.is_delivery from ".TAB_PREFIX."cms_deal_order_item as doi left join ".TAB_PREFIX."cms_deal as d on doi.deal_id = d.id where doi.id = ".intval($id));
			
			if($is_delivery==0){
				return "���跢��";
			}else{
				$delivery_notice =  $this->getAll("select * from ".TAB_PREFIX."cms_delivery_notice where order_item_id = ".intval($id));
				
				if($delivery_notice)
				{
					foreach($delivery_notice as $var){
						$str .= $var['notice_sn'];
						if($var['is_arrival']==0){
							$str.="<br><a href='".Common::rewrite_url(APP_PATH."user.php?act=my_order_arrival&id=".$var['id'])."'>ȷ���ջ�</a><br>"; 
						}else{
							$str.="<br>���ջ�";
						}
					}
					return $str;
				}else{
					return "δ����";
				}
			}
		}
		
		public function del_front_order($id,$user_id){
			$sql = "update {$this->tabName} set is_delete = 1,order_status = 1 where id = ".$id." and user_id = ".intval($user_id)." and pay_status = 0";
			
			$result=$this->mysqli->query($sql);
			if($result && $this->mysqli->affected_rows){
				return true;
			}else{
				return false;
			}
		}
		
		
		
		public function get_delivery($id){
			$id=intval($id);
			$order_info=$this->get_other_datas("{$this->tabName}","id,order_sn,order_status","id",$id." and is_delete=0 and type=0");
			$order_deal_items=$this->get_other_datas("cms_deal_order_item","*","order_id",$order_info[0]['id']." and delivery_status=0");
			if($order_deal_items){
				foreach($order_deal_items as $k=>$v){
					$is_delivery=$this->get_other_datas("cms_deal","is_delivery","id",$v['deal_id']);
					if(!$is_delivery[0]['is_delivery']){
						unset($order_deal_items[$k]);
					}
				}
			}
			$infos=array("order_info"=>$order_info[0],"order_deal_items"=>$order_deal_items);
			return $infos;
		}
		
		public function doDelivery($post){
			if(count($post['item'])==0){
				$this->messList[] = "��ѡ��Ҫ��������Ʒ��";
				return false;
			}
			$deliveryNotice=new DeliveryNotice();
			$order_info=$this->get($post['order_id']);
			$post['user_id']=$order_info['user_id'];
			$deal_names = array();
			$post['notice_sn']=$post['notice_sn']== ''?Common::to_date(Common::get_gmtime(),"Ymdhis".rand(111,999)):$post['notice_sn'];
			$post['delivery_time']=Common::get_gmtime();
			foreach($post['item'] as $order_deal_id){
				$deal_name =$this->getOne("select d.sub_name from ".TAB_PREFIX."cms_deal as d left join ".TAB_PREFIX."cms_deal_order_item as doi on doi.deal_id = d.id where doi.id = ".$order_deal_id);
				array_push($deal_names,$deal_name);
				$post['order_item_id']=$order_deal_id;
				$notice_id = $deliveryNotice->addDeliveryNotice($post);
				if($notice_id){
					$this->mysqli->query("update ".TAB_PREFIX."cms_deal_order_item set delivery_status = 1 where id = ".$order_deal_id);
				}
			}
			
			$deal_names = implode(",",$deal_names);
			$this->send_delivery_mail($deliveryNotice->get($notice_id),$deal_names);
			//send_delivery_sms($delivery_sn,$deal_names);
			//��ʼͬ�������ķ���״̬
			$order_deal_items = $this->get_other_datas("cms_deal_order_item","deal_id","id",$post['order_id']);
			if($order_deal_items){
				foreach($order_deal_items as $k=>$v){
					$is_delivery=$this->get_other_datas("cms_deal","is_delivery","id",$v['deal_id']);
					if(!$is_delivery[0]['is_delivery']){ //���跢������Ʒ
						unset($order_deal_items[$k]);
					}				
				}
			}
			$delivery_deal_items = $order_deal_items;
			if($delivery_deal_items){
				foreach($delivery_deal_items as $k=>$v){
					if(!$v['delivery_status']){ //δ����ȥ��
						unset($delivery_deal_items[$k]);
					}				 
				}
			}
			if(!count($delivery_deal_items)&&count($order_deal_items)){
				$this->mysqli->query("update ".TAB_PREFIX."cms_deal_orders set delivery_status = 0 where id = ".$post['order_id']); //δ����
			}elseif(count($delivery_deal_items)>0&&count($order_deal_items)!=0&&count($delivery_deal_items)<count($order_deal_items)){
				$this->mysqli->query("update ".TAB_PREFIX."cms_deal_orders set delivery_status = 1 where id = ".$post['order_id']); //���ַ�
			}else{
				$this->mysqli->query("update ".TAB_PREFIX."cms_deal_orders set delivery_status = 2 where id = ".$post['order_id']); //ȫ����
			}
			$tmpUpdateTime=array('update_time'=>Common::get_gmtime(),"id"=>$post['order_id']);
			$this->modDealOrder($tmpUpdateTime);
			$this->messList[] = "�����ɹ���";
			return true;
		}
		
		private function send_delivery_mail($notice_data,$deal_names){
			
			if(Common::get_config('MAIL_ON')&&Common::get_config('DELIVERY_MAIL_NOTICE')){
				$user_info = $this->get_other_datas("cms_user","*","id",$notice_data['user_id']);
				if($user_info[0]['email']!=''){
					$tmpl = $this->get_other_datas("cms_msg_template","*","id",8);
					$tmpl_content = $tmpl[0]['content'];
					
					$nd['user_name'] = $user_info[0]['user_name'];
					$nd['order_sn'] = $this->getOne("select do.order_sn from ".TAB_PREFIX."cms_deal_order_item as doi left join ".TAB_PREFIX."cms_deal_orders as do on doi.order_id = do.id where doi.id = ".$notice_data[0]['order_item_id']);			
					$nd['delivery_time_format'] = Common::to_date($notice_data['delivery_time']);
					$nd['deal_names'] = $deal_names;
					$nd['notice_sn']=$notice_data['notice_sn'];
					$msg=Common::getTempStr("delivery_notice",$nd,$tmpl_content);
					$msg_data['dest'] = $user_info[0]['email'];
					$msg_data['send_type'] = 1;
					$msg_data['title'] = '������';
					$msg_data['content'] = addslashes($msg);;
					$msg_data['send_time'] = 0;
					$msg_data['is_send'] = 0;
					$msg_data['create_time'] = Common::get_gmtime();
					$msg_data['user_id'] = $user_info[0]['id'];
					$msg_data['is_html'] = $tmpl[0]['is_html'];
					
					$this->addDealMsgList($msg_data);
				}
			}
		}
		
		
		
		
		
		public function addDealMsgList($postList) {
			$tabName=TAB_PREFIX.'cms_deal_msg_list';
			$fields=array("dest","send_type","content","send_time","is_send","create_time","user_id","result","is_success","is_html","title");
			$fieldList='';
			$value='';
			foreach ($postList as $k=>$v) {
				if(in_array($k, $fields)){
					$fieldList.=$k.",";
					if (!get_magic_quotes_gpc())
						$value .= "'".addslashes($v)."',";
					else
						$value .= "'".$v."',";
				}
			}

			$fieldList=rtrim($fieldList, ",");
			$value=rtrim($value, ",");

			$sql="INSERT INTO {$tabName} (".$fieldList.") VALUES (".$value.")";
			$result=$this->mysqli->query($sql);

			if($result && $this->mysqli->affected_rows>0) 
				return $this->mysqli->insert_id;
			else
				return false;
		}
		
		//==========================================
		// ����: validateForm()
		// ����: ����ӵ����ݻ��޸ĵ����ݽ�����֤
		// ����: ��
		// ����: true��false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['field_name'])){
				$this->messList[] = "�ֶ����Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['field_name'], 40)) {
				$this->messList[] = "�ֶ����Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::match($_POST['field_name'],"/^\w+$/")) {
				$this->messList[] = "�ֶ�����ֻ��Ϊ������ĸ��!";
				$result=false;
			}
			if(!Validate::required($_POST['field_show_name'])) {
				$this->messList[] = "�ֶ���ʾ���Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['field_show_name'], 40)) {
				$this->messList[] = "�ֶ���ʾ���Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			return  $result;
		}	
		
		function validateAfterSale(){
			$result=true;
			if(!Validate::required($_POST['admin_memo'])){
				$this->messList[] = "����Ա��ע����ȫΪ��!";
				$result=false;
			}
			return  $result;
		}
		
		function validateDelivery(){
			$result=true;
			if(!Validate::checkLength($_POST['delivery_sn'], 20) && Validate::required($_POST['delivery_sn'])) {
				$this->messList[] = "���Ų�������10���ַ�!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['delivery_sn']) && Validate::required($_POST['delivery_sn'])) {
				$this->messList[] = "����ֻ��Ϊ����!";
				$result=false;
			}
			return  $result;
		}
		
		//��ȡ�Ź������ܸ���()
		public function get_dealOrder_num($is_recharge=false){
			if($is_recharge){
				$tmpRecharge=" and type=1";
			} else {
				$tmpRecharge=" and type=0";
			}
			if($_GET['edit']!="search"){
				$sql="select id from {$this->tabName} where is_delete!=1".$tmpRecharge;
			} else {
				$string=$_POST['search_text'];
				$pay_status=$_POST['pay_status'];
				$extra_status=$_POST['extra_status'];
				$delivery_status=$_POST['delivery_status'];
				$order_status=$_POST['order_status'];
				if($pay_status!=-1){
					$tmpPay="and pay_status={$pay_status}";
				} else {
					$tmpPay="";
				}
				if($delivery_status!=-1){
					$tmpDeli=" and delivery_status={$delivery_status}";
				} else {
					$tmpDeli="";
				}
				if($extra_status!=-1){
					$tmpExt=" and extra_status={$extra_status}";
				} else {
					$tmpExt="";
				}
				if($order_status!=-1){
					$tmpOrder=" and order_status={$order_status}";
				} else {
					$tmpOrder="";
				}
				$sql="SELECT id from {$this->tabName} WHERE order_sn LIKE '%{$string}%' and is_delete!=1 ".$tmpPay.$tmpDeli.$tmpExt.$tmpRecharge.$tmpOrder;
			}
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>