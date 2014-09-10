<?php
function smarty_block_dealOrder($params,$content,&$smarty,&$repeat){
	
	$fixed_params=array("name","type");
	foreach($params as $key=>$var){
		if(!in_array($key,$fixed_params)){
			$message="错误，无此".$key."参数!";
			$repeat=false;
			return $message;
		}
	}
	
	
	extract($params);
	
	$id=intval($_GET['id']);
	
	if(!isset($name)){
		$name="row";
	}
	if(!isset($id) || $id==0 || $id==""){
		$id=false;
	} 
	if(!isset($type) || $type==""){
		$type="orders";
	}
	
	$status=intval($_GET['status']);
	
	if(!isset($smarty->block_data)){          
	  $smarty->block_data = array();
	}
	
	$dataindex = md5(__FUNCTION__.md5(serialize($params)));
	$dataindex = substr($dataindex,0,16);
	
	$deal_order=new DealOrder();
	if(!isset($smarty->block_data[$dataindex])){
		if($id){
			$smarty->block_data[$dataindex]=$deal_order->get_front_order($id);
		}else{
			$user_id=intval($_SESSION['user_info']['id']);
			$num=count($deal_order->get_front_order(0,$user_id,$type));
			$smarty->assign("order_num", $num);
			$current_page=isset($_GET["page"])?$_GET["page"]:1;
			$page=new Page($num,$current_page,Common::get_config("PAGE_SIZE"));
			$pageInfo=$page->getPageInfo();
			$smarty->block_data[$dataindex]=$deal_order->get_front_order(0,$user_id,$type,$pageInfo["row_offset"],$pageInfo["row_num"]);
		}
	}
	
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		$money_format_arr=array("total_price","pay_amount","delivery_fee","deal_total_price","payment_fee","discount_price","account_money","ecv_money","return_total_money","refund_money");
		if($item){
			$item['create_time']=Common::to_date($item['create_time']);
			while(list($key,$var)=each($item)){
				if(in_array($key,$money_format_arr)){
					$item[$key]=sprintf("%.2f", $item[$key]);
				}
			}
			switch($item['pay_status']){
				case 0:
					$item['pay_status_cn']="未支付";
				break;
				case 1:
					$item['pay_status_cn']="部份支付";
				break;
				case 2:
					$item['pay_status_cn']="全部支付";
				break;
			}
			switch($item['delivery_status']){
				case 0:
					$item['delivery_status_cn']="未发货";
				break;
				case 1:
					$item['delivery_status_cn']="部份发货";
				break;
				case 2:
					$item['delivery_status_cn']="全部发货";
				break;
				case 5:
					$item['delivery_status_cn']="无需发货";
				break;
			}
			switch($item['order_status']){
				case 0:
					$item['order_status_cn']="未结单";
				break;
				case 1:
					$item['order_status_cn']="正常结单";
				break;
			}
			switch($item['after_sale']){
				case 0:
					$item['after_sale_cn']="正常结单";
				break;
				case 1:
					$item['after_sale_cn']="已退款";
				break;
				case 2:
					$item['after_sale_cn']="已退货";
				break;
				case 3:
					$item['after_sale_cn']="已退款,已退货";
				break;
			}
			if(!$id){
				$item_name=$deal_order->get_other_datas("cms_deal_order_item","name","order_id",$item['id']);
				$item['item_name']=$item_name[0]['name'];
				$item['view']="<a href='".Common::rewrite_url(APP_PATH."user.php?act=my_order_view&id=".$item['id'])."' target='_blank'>查看</a>";
				$item['del']="<a href='".Common::rewrite_url(APP_PATH."user.php?act=my_order_del&id=".$item['id'])."'>删除</a>";
				$item['incharge']=$item['total_price']-$item['payment_fee'];
				$t=$deal_order->get_other_datas("cms_payment","name","id",$item['payment_id']);
				$item['payment_name']=$t[0]['name'];
				$item['payable']=$item['total_price']-$item['account_money']-$item['ecv_money'];
			} else {
				$item['continue']="<a href='".Common::rewrite_url(APP_PATH."user.php?act=order_pay&id=".$item['id'])."' target='_blank'>[继续支付]</a>";
				$t=$deal_order->get_other_datas("cms_delivery_area","name","id",$item['region_lv1']);
				$item['province']=$t[0]['name'];
				$t=$deal_order->get_other_datas("cms_delivery_area","name","id",$item['region_lv2']);
				$item['city']=$t[0]['name'];
				$t=$deal_order->get_other_datas("cms_delivery_area","name","id",$item['region_lv3']);
				$item['district']=$t[0]['name'];
				$t=$deal_order->get_other_datas("cms_payment","name","id",$item['payment_id']);
				$item['payment_name']=$t[0]['name'];
				$item['payable']=$item['total_price']-$item['account_money']-$item['ecv_money'];
				
			}
		}
		$smarty->assign($name, $item);
		if(count($smarty->block_data[$dataindex]) == 0){
			$smarty->block_data[$dataindex] = false;
		}
		$repeat = true;
	}else{
		$repeat = false;
	}
	return $content;
}
?>