<?php
/*==================================================================*/
	/*		文件名:ResultInfo.class.php                              */
	/*		概要: 后台首页信息管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class ResultInfo extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
		}
		//==========================================
		// 函数: getUserInfo()
		// 功能: 获取会员信息
		// 参数: 无
		// 返回: 会员信息数组
		//==========================================	
		public function getUserInfo() {
			$user_info=array("user_num"=>0,"user_verify_num"=>0);
			$u_temp=$this->get_other_datas("cms_user","id");
			$v_temp=$this->get_other_datas("cms_user where status=1","id");
			$user_info['user_num']=count($u_temp);
			$user_info['user_verify_num']=count($v_temp);
			return $user_info;
		}
		
		//==========================================
		// 函数: getDealInfo()
		// 功能: 获取团购信息
		// 参数: 无
		// 返回: 团购信息数组
		//==========================================	
		public function getDealInfo() {
			$deal_info=array("deal_num"=>0,"score_num"=>0);
			$condition_deal="time_status = 1 and buy_status <> 2 and is_delete = 0 and status = 1 and buy_type = 0";
			$condition_score="time_status = 1 and buy_status <> 2 and is_delete = 0 and status = 1 and buy_type = 1";
			$d_temp=$this->get_other_datas("cms_deal where ".$condition_deal,"id");
			$s_temp=$this->get_other_datas("cms_deal where ".$condition_score,"id");
			$deal_info['deal_num']=count($d_temp);
			$deal_info['score_num']=count($s_temp);
			return $deal_info;
		}
		
		//==========================================
		// 函数: getOrderInfo()
		// 功能: 获取订单信息
		// 参数: 无
		// 返回: 订单信息数组
		//==========================================	
		public function getOrderInfo() {
			$order_info=array("order_num"=>0,"order_buy_num"=>0);
			$condition_order="type = 0";
			$condition_buy="pay_status = 2 and type = 0";
			$o_temp=$this->get_other_datas("cms_deal_orders where ".$condition_order,"id");
			$b_temp=$this->get_other_datas("cms_deal_orders where ".$condition_buy,"id");
			$order_info['order_num']=count($o_temp);
			$order_info['order_buy_num']=count($b_temp);
			return $order_info;
		}
		
		//==========================================
		// 函数: getInchargeInfo()
		// 功能: 获取充值订单信息
		// 参数: 无
		// 返回: 充值订单信息数组
		//==========================================	
		public function getInchargeInfo() {
			$Incharge_info=array("incharge_num"=>0,"incharge_buy_num"=>0);
			$condition_incharge="type = 1";
			$condition_buy="pay_status = 2 and type = 1";
			$i_temp=$this->get_other_datas("cms_deal_orders where ".$condition_incharge,"id");
			$b_temp=$this->get_other_datas("cms_deal_orders where ".$condition_buy,"id");
			$Incharge_info['incharge_num']=count($i_temp);
			$Incharge_info['incharge_buy_num']=count($b_temp);
			return $Incharge_info;
		}
		
	}
	
?>