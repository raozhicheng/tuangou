<?php
	@define('Web_flag', true);
	require "common.php";
	$act = !empty($_REQUEST['act']) ? trim($_REQUEST['act']) : '';
	$user=new User();
	if($act=='check_field'){
		$field_name = $_REQUEST['field_name'];
		$field_data = trim($_REQUEST['field_data']);
		//$field_name="user_name";
		//$field_data="easethink";
		$user_res = $user->check_user($field_name,$field_data);
		$result = array("status"=>1,"info"=>'');
		if($user_res['status']){
			Common::ajax_return($result);
		}else{
			$error = $user_res['data'];		
			
			if($error['error']=='is_exist' && $error['field_name']=="user_name"){
				$error_msg = sprintf("用户名%s已存在",$field_data);
			}
			if($error['error']=='is_exist' && $error['field_name']=="email"){
				$error_msg = sprintf("%s已存在",$field_data);
			}
			if($error['error']=='is_exist' && $error['field_name']=="mobile"){
				$error_msg = "手机号码已存在";
			}
			$result['status'] = 0;
			$result['info'] = $error_msg;
			Common::ajax_return($result);
		}
	}
	if($act=='load_consignee'){
		$consignee_id = intval($_REQUEST['id']);
		$uc=new UserConsignee();
		$consignee_info = $uc->get($consignee_id);
		
		if($consignee_info){
			$region_lv1=$uc->getAll("select * from ".TAB_PREFIX."cms_delivery_area where pid = 0 and is_delete=0"); 
			$region_lv2=$uc->getAll("select * from ".TAB_PREFIX."cms_delivery_area where pid = ".$consignee_info['region_lv1']." and is_delete=0");
			$region_lv2_all=$uc->getAll("select * from ".TAB_PREFIX."cms_delivery_area where level = 2 and is_delete=0");
			$region_lv3=$uc->getAll("select * from ".TAB_PREFIX."cms_delivery_area where pid = ".$consignee_info['region_lv2']." and is_delete=0");
			$region_lv3_all=$uc->getAll("select * from ".TAB_PREFIX."cms_delivery_area where level = 3 and is_delete=0");
			
			foreach($region_lv1 as $k=>$v){
				if($v['id'] == $consignee_info['region_lv1']){
					$region_lv1[$k]['selected'] = 1;
					break;
				}
			}
			foreach($region_lv2 as $k=>$v){
				if($v['id'] == $consignee_info['region_lv2']){
					$region_lv2[$k]['selected'] = 1;
					break;
				}
			}
			foreach($region_lv3 as $k=>$v){
				if($v['id'] == $consignee_info['region_lv3']){
					$region_lv3[$k]['selected'] = 1;
					break;
				}
			}
			$consignee_info['region_lv2_all']=$region_lv2_all;
			$consignee_info['region_lv3_all']=$region_lv3_all;
		}else{
			$region_lv1=$uc->getAll("select * from ".TAB_PREFIX."cms_delivery_area where pid = 0 and is_delete=0"); 
			$consignee_info['region_lv2_all']=$uc->getAll("select * from ".TAB_PREFIX."cms_delivery_area where level = 2 and is_delete=0");
			$consignee_info['region_lv3_all']=$uc->getAll("select * from ".TAB_PREFIX."cms_delivery_area where level = 3 and is_delete=0");
		}
		$consignee_info['region_lv1']=$region_lv1;
		$consignee_info['region_lv2']=$region_lv2;
		$consignee_info['region_lv3']=$region_lv3;
		
		$tpl->assign("consignee_info",$consignee_info);
		$tpl->display($current_template."/inc/cart/cart_consignee.tpl");
	}

	if($act=='load_delivery'){
		$dw=new DeliveryWay();
		$region_id = intval($_REQUEST['id']);
		$delivery_list = $dw->load_support_delivery($region_id);
		$tpl->assign("delivery_list",$delivery_list);
		$tpl->display($current_template."/inc/cart/cart_delivery.tpl");
	}
	
	if($act=='count_buy_total'){
		$user_info=$_SESSION['user_info']?$_SESSION['user_info']:array("id"=>0);
		$region_id = intval($_REQUEST['region_id']); //配送地区
		$delivery_id =  intval($_REQUEST['delivery_id']); //配送方式
		$account_money =  floatval($_REQUEST['account_money']); //余额
		$ecvsn = $_REQUEST['ecvsn']?$_REQUEST['ecvsn']:'';
		$ecvpassword = $_REQUEST['ecvpassword']?$_REQUEST['ecvpassword']:'';
		$payment = intval($_REQUEST['payment']);
		$all_account_money = intval($_REQUEST['all_account_money']);
		
		$user_id = intval($user_info['id']);
		$dc=new DealCart();
		$goods_list = $dc->getCartList($user_info['id']);
		
		$result = $dc->countBuyTotal($region_id,$delivery_id,$payment,$account_money,$all_account_money,$ecvsn,$ecvpassword,$goods_list);
		$tpl->assign("result",$result);
		$html = trim($tpl->fetch($current_template."/inc/cart/cart_total.tpl"));
		$data = $result;
		$data['html'] =Common::compress_html($html);
		Common::ajax_return($data);
	}
	
	if($act=='count_order_total'){
		$order_id = intval($_REQUEST['id']);
		$do=new DealOrder();
		$dc=new DealCart();
		$order_info = $do->get($order_id);
		$region_id = intval($_REQUEST['region_id']); //配送地区
		$delivery_id =  intval($_REQUEST['delivery_id']); //配送方式
		$account_money =  floatval($_REQUEST['account_money']); //余额
		$ecvsn = $_REQUEST['ecvsn']?$_REQUEST['ecvsn']:'';
		$ecvpassword = $_REQUEST['ecvpassword']?$_REQUEST['ecvpassword']:'';
		
		$payment = intval($_REQUEST['payment']);
		$all_account_money = intval($_REQUEST['all_account_money']);
		
		$goods_list = $dc->getAll("select * from ".TAB_PREFIX."cms_deal_order_item where order_id = ".$order_id);
		$result =$dc->countBuyTotal($region_id,$delivery_id,$payment,$account_money,$all_account_money,$ecvsn,$ecvpassword,$goods_list,$order_info['account_money'],$order_info['ecv_money']);
		$tpl->assign("result",$result);
		$html = $tpl->fetch($current_template."/inc/cart/cart_total.tpl");
		$data = $result;
		foreach($data as $key=>$var){
			if(!is_integer($var) && $var==""){
				$data[$key]="";
			}
		}
		$data['html'] = Common::compress_html($html);
		Common::ajax_return($data);
	}
	
?>