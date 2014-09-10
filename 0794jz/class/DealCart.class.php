<?php
/*==================================================================*/
	/*		文件名:DealCart.class.php                              */
	/*		概要:购物车管理    	       	    */
	/*		作者: 李文                                          */
	/*==================================================================*/
	class DealCart extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal_cart";
				$this->fieldList=array("session_id","user_id","deal_id","name","attr","unit_price","number","total_price","verify_code","create_time","update_time","return_money","return_total_money","return_score","return_total_score","buy_type","sub_name");
		}
		
		public function addDealCart($post) {
			if($this->add($post)){
				return true;
			}else{
				return false;
			}
		}
		
		public function modDealCart($post) {
			if($this->mod($post)){
				return true;
			}else{
				return false;
			}
		}
		
		public function delDealCart($user_id){
			$session_id=session_id();
			$sql="delete from {$this->tabName} where session_id='{$session_id}' and user_id={$user_id}";
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				return true;
			}
		}
		
		public function getCartList($user_id){
			$session_id=session_id();
			$sql="select * from {$this->tabName} where session_id='{$session_id}' and user_id={$user_id}";
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
						$temp[]=$row;
				}
				
			}
			if($temp){
			foreach($temp as $key=>$var){
				foreach($var as $k=>$v){
					switch($k){
						case 'unit_price':
						case 'total_price':
						case 'return_money':
						case 'return_total_money':
							$var[$k]=sprintf("%.2f", $v);
						break;
						
						case 'update_time':
						case 'create_time':
							$var[$k]=Common::to_date($v);
						break;
					}
				}
				$temp[$key]=$var;
			}
			}
			return $temp;
		}
		
		
		//计算购买价格
/**
 * region_id      //配送最终地区
 * delivery_id    //配送方式
 * payment        //支付ID
 * account_money  //支付余额
 * all_account_money  //是否全额支付
 * ecvsn  //代金券帐号
 * ecvpassword  //代金券密码
 * goods_list   //统计的商品列表
 * $paid_account_money 已支付过的余额
 * $paid_ecv_money 已支付过的代金券
 * 
 * 返回 array(
		'total_price'	=>	$total_price,	商品总价
		'pay_price'		=>	$pay_price,     支付费用
		'pay_total_price'		=>	$total_price+$delivery_fee+$payment_fee-$user_discount,  应付总费用
		'delivery_fee'	=>	$delivery_fee,  运费
		'delivery_info' =>  $delivery_info, 配送方式
		'payment_fee'	=>	$payment_fee,   支付手续费
		'payment_info'  =>	$payment_info,  支付方式
		'user_discount'	=>	$user_discount, 会员折扣
		'account_money'	=>	$account_money, 余额支付	
		'ecv_money'		=>	$ecv_money,		代金券金额
		'ecv_data'		=>	$ecv_data,      代金券数据
		'region_info'	=>	$region_info,	地区数据
		'is_delivery'	=>	$is_delivery,   是否要配送
		'return_total_score'	=>	$return_total_score,   购买返积分
		'return_total_money'	=>	$return_total_money    购买返现
		
 */
		public function countBuyTotal($region_id,$delivery_id,$payment,$account_money,$all_account_money,$ecvsn,$ecvpassword,$goods_list,$paid_account_money = 0,$paid_ecv_money = 0)
		{
			//获取商品总价
			//计算运费
			$pay_price = 0;   //支付总价
			$total_price = 0;
			$total_weight = 0;
			$return_total_score = 0;
			$return_total_money = 0;
			$is_delivery = 0;
			$deal=new Deals();
			$weight=new Weight();
			$delivery_area=new DeliveryArea();
			$delivery=new DeliveryWay();
			$delivery_fee=new DeliveryFee();
			foreach($goods_list as $k=>$v)
			{
				$total_price += $v['total_price'];
				
				$deal_info = $deal->get($v['deal_id']);
				
				if($deal_info['is_delivery'] == 1) //需要配送叠加重量
				{
					$deal_weight = floatval($deal_info['weight']); //团购商品的单位重量
					
					$deal_weight_unit = $weight->get($deal_info['weight_id']);  //团购的重单单价
					
					$deal_weight = $deal_weight * $deal_weight_unit['rate'];  //转换为为1的重量
					
					$total_weight += ($deal_weight*$v['number']);
					
					$is_delivery = 1;
				}
				
				$return_total_money = $return_total_money + $deal_info['return_money'] * $v['number'];
				$return_total_score = $return_total_score + $deal_info['return_score'] * $v['number'];
			}
			
			$region_info = $delivery_area->get(intval($region_id));
			$delivery_info = $delivery->get(intval($delivery_id));
			$delivery_fee = $delivery_fee->countDeliveryFee($total_weight,$region_id, intval($delivery_info['id']));
			$pay_price = $total_price + $delivery_fee; //加上运费
			
			$pay_price = $pay_price - $paid_account_money - $paid_ecv_money;
			
			//先计算用户等级折扣
			$user_id = intval($_SESSION['user_info']['id']);
			$group_info = $this->getRow("select g.* from ".TAB_PREFIX."cms_user as u left join ".TAB_PREFIX."cms_user_group as g on u.group_id = g.id where u.id = ".$user_id);
			if($group_info&&$total_price>0)
			$user_discount = $total_price * (1-floatval($group_info['discount']));	
			else
			$user_discount = 0;
			$pay_price = $pay_price - $user_discount; //扣除用户折扣
			
			//余额支付
			$user_money = $this->getOne("select money from ".TAB_PREFIX."cms_user where id = ".$user_id);
			if($all_account_money == 1)
			{
				$account_money = $user_money;
			}
		
			if($account_money>$user_money)
			$account_money = $user_money;  //余额支付量不能超过帐户余额
			
			//开始计算代金券
			$now = Common::get_gmtime();
			$ecv_sql = "select e.* from ".TAB_PREFIX."ecv as e left join ".
						TAB_PREFIX."ecv_type as et on e.ecv_type_id = et.id where e.sn = '".
						$ecvsn."' and e.password = '".
						$ecvpassword."' and ((e.begin_time <> 0 and e.begin_time < ".$now.") or e.begin_time = 0) and ".
						"((e.end_time <> 0 and e.end_time > ".$now.") or e.end_time = 0) and ((e.use_limit <> 0 and e.use_limit > e.use_count) or (e.use_limit = 0)) ".
						"and (e.user_id = ".$user_id." or e.user_id = 0)";
			$ecv_data = $this->getRow($ecv_sql);
			$ecv_money = $ecv_data['money'];
			
			// 当余额 + 代金券 > 支付总额时优先用代金券付款  ,代金券不够付，余额为扣除代金券后的余额
			if($ecv_money + $account_money > $pay_price)
			{
				if($ecv_money >= $pay_price)
				{
					$ecv_use_money = $pay_price;
					$account_money = 0;
				}
				else
				{
					$ecv_use_money = $ecv_money;
					$account_money = $pay_price - $ecv_use_money;
				}
			}else{
				$ecv_use_money = $ecv_money;
			}
		
				
			$pay_price = $pay_price - $ecv_use_money - $account_money;
			//支付手续费
			if($payment)
			{
				if($pay_price>0)
				{
					$payment_info = $this->getRow("select * from ".TAB_PREFIX."cms_payment where id = ".$payment);
					$payment_fee = sprintf("%.2f", $payment_info['fee_amount']);	
					$pay_price = $pay_price + $payment_fee;
					$payment_info['parameters']=unserialize($payment_info['parameters']);
				}
			}
			else
			{
				if($all_account_money){
					$payment_info =  $this->getRow("select * from ".TAB_PREFIX."cms_payment where id = 4");
					$payment_info['parameters']=unserialize($payment_info['parameters']);
				}
				$payment_fee = 0;
			}
			
			//if($account_money<0)$account_money = 0;
			$result = array(
				'total_price'	=>	$total_price,
				'pay_price'		=>	$pay_price,
				'pay_total_price'		=>	$total_price+$delivery_fee+$payment_fee-$user_discount,
				'delivery_fee'	=>	$delivery_fee,
				'delivery_info' =>  $delivery_info,
				'payment_fee'	=>	$payment_fee,
				'payment_info'  =>	$payment_info,
				'user_discount'	=>	$user_discount,
				'account_money'	=>	$account_money,
				'ecv_money'		=>	$ecv_money,
				'ecv_data'		=>	$ecv_data,
				'region_info'	=>	$region_info,
				'is_delivery'	=>	$is_delivery,
				'return_total_score'	=>	$return_total_score,
				'return_total_money'	=>	$return_total_money,
				'paid_account_money'	=>	$paid_account_money,
				'paid_ecv_money'	=>	$paid_ecv_money,
			);
			
			//以下对促销接口进行实现
			
			/*$allow_promote = 1; //默认为支持促销接口
				foreach($goods_list as $k=>$v)
				{
					$allow_promote = $this->getOne("select allow_promote from ".TAB_PREFIX."cms_deal where id = ".$v['deal_id']);
					if($allow_promote == 0)
					{
						break;
					}
				}
			if($allow_promote==1)
			{
				$promote_list = $this->getAll("select * from ".TAB_PREFIX."cms_promote order by sort desc");
						
				foreach($promote_list as $k=>$v)
				{
							$directory = APP_ROOT_PATH."system/promote/";
							$file = $directory. '/' .$v['class_name']."_promote.php";
							if(file_exists($file))
							{
								require_once($file);
								$promote_class = $v['class_name']."_promote";
								$promote_object = new $promote_class();
								$result = $promote_object->count_buy_total($region_id,
												$delivery_id,
												$payment,
												$account_money,
												$all_account_money,
												$ecvsn,
												$ecvpassword,
												$goods_list,
												$result,
												$paid_account_money,
												$paid_ecv_money);
								
							}
			
				}
			}*/
			if(is_array($data)){
				foreach($data as $key=>$var){
					if(is_numeric($var)){
						$data[$key]=sprintf("%.2f",$var);
					}
				}
			}
			return $result;
		}
		
		
		
	}
	
?>