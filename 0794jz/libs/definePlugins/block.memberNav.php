<?php
function smarty_block_memberNav($params,$content,&$smarty,&$repeat){
	
	$fixed_params=array("name");
	foreach($params as $key=>$var){
		if(!in_array($key,$fixed_params)){
			$message="错误，无此".$key."参数!";
			$repeat=false;
			return $message;
		}
	}
	
	
	extract($params);
	
	if(!isset($name)){
		$name="row";
	}
	
	if(!isset($smarty->block_data)){          
	  $smarty->block_data = array();
	}
	
	$dataindex = md5(__FUNCTION__.md5(serialize($params)));
	$dataindex = substr($dataindex,0,16);
	
	if(!isset($smarty->block_data[$dataindex])){
		$smarty->block_data[$dataindex]=array(array("key"=>"member_index","name"=>"我的信息"),array("key"=>"my_coupon","name"=>"我的团购券"),array("key"=>"my_order","name"=>"我的订单"),array("key"=>"my_money","name"=>"我的资金"),array("key"=>"my_profile","name"=>"我的帐户"),array("key"=>"my_consignee","name"=>"我的地址"),array("key"=>"my_invite","name"=>"我的邀请"));
	}
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item=array_shift($smarty->block_data[$dataindex]);
		$item['link']=Common::rewrite_url(APP_PATH."user.php?act=".$item['key']);
		$act=trim($_GET['act']);
		if($act==$item['key']){
			$item['current']=1;
		} else {
			$item['current']=0;
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