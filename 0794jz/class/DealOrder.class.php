<?php
/*==================================================================*/
	/*		文件名:DealOrder.class.php                              */
	/*		概要: 团购订单管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DealOrder extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal_orders";
				$this->fieldList=array("order_sn","type","user_id","create_time","update_time","pay_status","total_price","pay_amount","delivery_status","order_status","is_delete","return_total_score","refund_amount","admin_memo","memo","region_lv1","region_lv2","region_lv3","region_lv4","address","mobile","zip","consignee","deal_total_price","discount_price","delivery_fee","ecv_money","account_money","delivery_id","payment_id","payment_fee","return_total_money","extra_status","after_sale","refund_money");
		}
		//==========================================
		// 函数: addDealOrder($post)
		// 功能: 用于向数据库中添加团购订单
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addDealOrder($post) {
			if($id=$this->add($post)){
				$this->messList[] = "添加成功！";
				return $id;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modDealOrder($post)
		// 功能: 用于向数据库中修改团购订单
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modDealOrder($post) {
			if($_GET['edit']=="mod_viewOrder"){
				$post['after_sale']=intval($post['after_sale'][0]+$post['after_sale'][1]);
			} elseif($_GET['edit']=="finish_order"){
				$sql="select id from {$this->tabName} where id=".$post['id']." and is_delete = 0 and type = 0 and order_status = 0 and (pay_status = 2 and ((delivery_status = 2 or delivery_status = 5)) or (pay_amount = refund_money))";
				$result=$this->mysqli->query($sql);
				if(!$result){
					$this->messList[] = "非法订单数据！";
					return false;
				}
			} elseif($_GET['edit']=="open_order"){
				$sql="select id from {$this->tabName} where id=".$post['id']." and is_delete = 0 and type = 0 and order_status = 0 and (pay_status = 2 and ((delivery_status = 2 or delivery_status = 5)) or (pay_amount = refund_money))";
				$result=$this->mysqli->query($sql);
				if(!$result){
					$this->messList[] = "非法订单数据！";
					return false;
				}
			}
			
			if($this->mod($post)){
				$this->messList[] = "编辑成功！";
				return true;
			}else{
				$this->messList[] = "编辑失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modOrderIncharge($post)
		// 功能: 管理员收款更新
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modOrderIncharge($post,$infos) {
			if($infos['user_money']<$infos['pay_amount'] && $infos['payment_name']=="Account"){
				
				$this->messList[] = "帐号余额不足！";
				return false;
				
			} else {
				
				if($this->mod($post)){
					$this->messList[] = "收款成功！";
					return true;
				}else{
					$this->messList[] = "收款失败！";
					return false;
				}
			}
		}
		
		
		
		//==========================================
		// 函数: delDealOrder($id)
		// 功能: 将团购订单放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delDealOrder($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delDealOrders($id)
		// 功能: 将团购订单放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delDealOrders($id) {
			if(count($id)==0){
				$this->messList[] = "请选择您要删除的分类！";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1 WHERE id ";
			if(is_array($id)) {
				$sql .= "IN (" . join(",", $id) . ")";

			}else{
				$sql .= "= $id";
			}

			if($this->mysqli->query($sql)){
				$this->messList[] = "批量删除成功！";
				return true;
			}else{
				$this->messList[] = "批量删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: orderPaid($order_id)
		// 功能: 同步订单支付状态
		// 参数: order_id
		// 返回: true或false
		//==========================================		
		public function orderPaid($order_id){
			$order_id  = intval($order_id);
			$deal_orders=$this->get($order_id);
			if($deal_orders['pay_amount']>=$deal_orders['total_price']){
				$result=$this->mysqli->query("update {$this->tabName} set pay_status = 2 where id =".$order_id." and pay_status <> 2");
				if($result){
					$this->messList[] = "同步订单支付成功！";
					$this->orderPaidDone($order_id);
					$orderPaidStatus=true;
				}
			} elseif($deal_orders['pay_amount']<$deal_orders['total_price']&&$deal_orders['pay_amount']!=0){
				$this->mysqli->query("update {$this->tabName} set pay_status = 1 where id =".$order_id);
				$this->messList[] = "订单部分支付！";
				$orderPaidStatus=false;
			} elseif($deal_orders['pay_amount']==0){
				$this->mysqli->query("update {$this->tabName} set pay_status = 0 where id =".$order_id);
				$this->messList[] = "订单未支付！";
				$orderPaidStatus=false;
			}
			return $orderPaidStatus;
		}
		
		//订单付款完毕后执行的操作,充值单也在这处理
		private function orderPaidDone($order_id){
			$order_id = intval($order_id);
			$stock_status = true;  //团购状态
			$order_info = $this->get($order_id);
			if($order_info['type'] == 0){
				$goods_list=$this->get_other_datas("cms_deal_order_item","deal_id,sum(number) as num","order_id",$order_id." group by deal_id");
				foreach($goods_list as $k=>$v)
				{
					$sql = "update ".TAB_PREFIX."cms_deal set buy_count = buy_count + ".$v['num'].
						   ",user_count = user_count + 1 where id=".$v['deal_id'].
						   " and ((buy_count + ".$v['num']."<= max_bought) or max_bought = 0) ".
						   " and time_status = 1 and buy_status <> 2";
			
					$rs=$this->mysqli->query($sql); //增加商品的发货量
					
					if($rs){
						$affect_list[] = $v;  //记录下更新成功的团购商品，用于回滚
					}else{
						//失败成功，即过期支付，超量支付
						$stock_status = false;
						break;
					}
				}
			
			
				if($stock_status){ //发货成功，发券
					foreach($goods_list as $k=>$v){//为相应团购发券
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
										//未发送成功，即无可发放的预设团购券
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
												//未发送成功，即无可发放的预设团购券
												$deal_coupon=new DealCoupon();
												$d_temp=array("is_valid"=>0,"user_id"=>$order_info['user_id'],"deal_id"=>$v['deal_id'],"begin_time"=>0,"end_time"=>0,"order_deal_id"=>$item['id'],"supplier_id"=>$deal_info['supplier_id'],"order_id"=>$order_info['id']);
												$deal_coupon->addDealCoupon($d_temp);
											}
										}
								}
							}
							
						}
					}
					//开始处理返还的积分或现金
					$user_log=new UserLog();
					if($order_info['return_total_money']!=0){
						$msg = sprintf("%s订单返现金",$order_info['order_sn']);
						$user_log->modAccount(array('money'=>$order_info['return_total_money'],'score'=>0,'user_id'=>$order_info['user_id']),$msg);
					}
					
					if($order_info['return_total_score']!=0){
						$msg = sprintf("%s订单返积分",$order_info['order_sn']);
						$user_log->modAccount(array('money'=>0,'score'=>$order_info['return_total_score'],'user_id'=>$order_info['user_id']),$msg);
					}
					//开始处理返利，只创建返利， 发放将与msg_list的自动运行一起执行
					$user_info = $this->get_other_datas("cms_user","*","id",$order_info['user_id']);
					//开始查询所购买的列表中支不支持促销
					$is_referrals = 1; //默认为返利
					foreach($goods_list as $k=>$v){
						$is_referrals = $this->getOne("select is_referral from ".TAB_PREFIX."cms_deal where id = ".$v['deal_id']);
						if(!$is_referrals)
						{
							break;
						}
					}
					
					if($user_info[0]['referral_count']<Common::get_config("REFERRAL_LIMIT")&&$is_referrals == 1){
						//开始返利给推荐人
						$parent_info = $this->get_other_datas("user","*","id",$user_info[0]['pid']);
						
						if($parent_info){
							if((Common::get_config("REFERRAL_IP_LIMIT")&&$parent_info[0]['login_ip']!=Common::get_ip())||Common::get_config("REFERRAL_IP_LIMIT")==0){ //IP限制
							$referral=new Referral();
								if(Common::get_config("REFERRALS_TYPE")==0){ //现金返利
								
									$referral_data['user_id'] = $parent_info[0]['id']; //初返利的会员ID
									$referral_data['rel_user_id'] = $user_info[0]['id'];	 //被推荐且发生购买的会员ID
									$referral_data['create_time'] = Common::get_gmtime();
									$referral_data['money']	=	Common::get_config("INVITE_REFERRALS");
									$referral_data['order_id']	=	$order_info['id'];
									$referral->addReferral($referral_data);
								}else{
									$referral_data['user_id'] = $parent_info[0]['id']; //初返利的会员ID
									$referral_data['rel_user_id'] = $user_info[0]['id'];	 //被推荐且发生购买的会员ID
									$referral_data['create_time'] =  Common::get_gmtime();
									$referral_data['score']	=	Common::get_config("INVITE_REFERRALS");
									$referral_data['order_id']	=	$order_info['id'];
									$referral->addReferral($referral_data); //插入
								}
								$this->mysqli->query("update ".TAB_PREFIX."cms_user set referral_count = referral_count + 1 where id = ".$user_info['id']);
							}				
							
						}
					}
					
					//超出充值
					if($order_info['pay_amount']>$order_info['total_price']){
						if($order_info['total_price']<0)
						$msg = sprintf("%s订单冲值",$order_info['order_sn']);
						else
						$msg = sprintf("%s订单中超额支付，多出部份被转存到会员中心",$order_info['order_sn']);
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
					//开始模拟事务回滚
					foreach($affect_list as $k=>$v){
						$sql = "update ".TAB_PREFIX."cms_deal set buy_count = buy_count - ".$v['num'].
							   ",user_count = user_count - 1 where id=".$v['deal_id'];
						$this->mysqli->query($sql); //回滚已发的货量
					}
					
					//超出充值
					$user_log=new UserLog();
					$deal_orders_log=new DealOrdersLog();
					$msg = sprintf("%s订单中有团购已卖光，订单商品支付到会员中心",$order_info['order_sn']);			
					$user_log->modAccount(array('money'=>$order_info['total_price'],'score'=>0,'user_id'=>$order_info['user_id']),$msg);	
					//将订单的extra_status 状态更新为2，并自动退款，结单
					$this->mysqli->query("update ".TAB_PREFIX."cms_deal_orders set extra_status = 2, after_sale = 1, refund_money = pay_amount, order_status = 1 where id = ".intval($order_info['id']));
					
					//记录退款的订单日志		
					$deal_orders_log->write_log($msg,intval($order_info['id']));
					
				}//end if stock_status 
				//同步所有未过期的团购状态
				$deals=new Deals();
				$deals->syn_dealing();	
					
					
			} else {//end of order type if
				//订单充值
				$user_log=new UserLog();
				$this->mysqli->query("update ".TAB_PREFIX."cms_deal_orders set order_status = 1 where id = ".$order_info['id']); //充值单自动结单
				$msg = sprintf("充值单%s支付成功",$order_info['order_sn']);			
				$user_log->modAccount(array('money'=>$order_info['total_price']-$order_info['payment_fee'],'score'=>0,'user_id'=>$order_info['user_id']),$msg);
			}
		}//end of function
		
		//==========================================
		// 函数: get_dealOrders()
		// 功能: 获取团购订单
		// 参数: is_all:是否是全部列出,offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
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
				return "无需发货";
			}else{
				$delivery_notice =  $this->getAll("select * from ".TAB_PREFIX."cms_delivery_notice where order_item_id = ".intval($id));
				
				if($delivery_notice)
				{
					foreach($delivery_notice as $var){
						$str .= $var['notice_sn'];
						if($var['is_arrival']==0){
							$str.="<br><a href='".Common::rewrite_url(APP_PATH."user.php?act=my_order_arrival&id=".$var['id'])."'>确认收货</a><br>"; 
						}else{
							$str.="<br>已收货";
						}
					}
					return $str;
				}else{
					return "未发货";
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
				$this->messList[] = "请选择要发货的商品！";
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
			//开始同步订单的发货状态
			$order_deal_items = $this->get_other_datas("cms_deal_order_item","deal_id","id",$post['order_id']);
			if($order_deal_items){
				foreach($order_deal_items as $k=>$v){
					$is_delivery=$this->get_other_datas("cms_deal","is_delivery","id",$v['deal_id']);
					if(!$is_delivery[0]['is_delivery']){ //无需发货的商品
						unset($order_deal_items[$k]);
					}				
				}
			}
			$delivery_deal_items = $order_deal_items;
			if($delivery_deal_items){
				foreach($delivery_deal_items as $k=>$v){
					if(!$v['delivery_status']){ //未发货去除
						unset($delivery_deal_items[$k]);
					}				 
				}
			}
			if(!count($delivery_deal_items)&&count($order_deal_items)){
				$this->mysqli->query("update ".TAB_PREFIX."cms_deal_orders set delivery_status = 0 where id = ".$post['order_id']); //未发货
			}elseif(count($delivery_deal_items)>0&&count($order_deal_items)!=0&&count($delivery_deal_items)<count($order_deal_items)){
				$this->mysqli->query("update ".TAB_PREFIX."cms_deal_orders set delivery_status = 1 where id = ".$post['order_id']); //部分发
			}else{
				$this->mysqli->query("update ".TAB_PREFIX."cms_deal_orders set delivery_status = 2 where id = ".$post['order_id']); //全部发
			}
			$tmpUpdateTime=array('update_time'=>Common::get_gmtime(),"id"=>$post['order_id']);
			$this->modDealOrder($tmpUpdateTime);
			$this->messList[] = "发货成功！";
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
					$msg_data['title'] = '发货单';
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
		// 函数: validateForm()
		// 功能: 对添加的内容或修改的内容进行验证
		// 参数: 无
		// 返回: true或false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['field_name'])){
				$this->messList[] = "字段名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['field_name'], 40)) {
				$this->messList[] = "字段名称不能超过20个字符!";
				$result=false;
			}
			if(!Validate::match($_POST['field_name'],"/^\w+$/")) {
				$this->messList[] = "字段名称只能为数字字母等!";
				$result=false;
			}
			if(!Validate::required($_POST['field_show_name'])) {
				$this->messList[] = "字段显示名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['field_show_name'], 40)) {
				$this->messList[] = "字段显示名称不能超过20个字符!";
				$result=false;
			}
			return  $result;
		}	
		
		function validateAfterSale(){
			$result=true;
			if(!Validate::required($_POST['admin_memo'])){
				$this->messList[] = "管理员备注不能全为空!";
				$result=false;
			}
			return  $result;
		}
		
		function validateDelivery(){
			$result=true;
			if(!Validate::checkLength($_POST['delivery_sn'], 20) && Validate::required($_POST['delivery_sn'])) {
				$this->messList[] = "单号不能少于10个字符!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['delivery_sn']) && Validate::required($_POST['delivery_sn'])) {
				$this->messList[] = "单号只能为数字!";
				$result=false;
			}
			return  $result;
		}
		
		//获取团购订单总个数()
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