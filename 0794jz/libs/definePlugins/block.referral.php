<?php
function smarty_block_referral($params,$content,&$smarty,&$repeat){
	
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
		$referral=new Referral();
		$user_id=intval($_SESSION['user_info']['id']);
		$data=$referral->get_front_referral($user_id);
		$num=$data['count'];
		$smarty->assign("referral_num", $num);
		$current_page=isset($_GET["page"])?$_GET["page"]:1;
		$page=new Page($num,$current_page,Common::get_config("PAGE_SIZE"));
		$pageInfo=$page->getPageInfo();
		$data=$referral->get_front_referral($user_id,$pageInfo["row_offset"],$pageInfo["row_num"]);
		$smarty->block_data[$dataindex]=$data['list'];
	}
	
	
	
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		if($item){
			$item['i_money']=sprintf("%.2f", $item['i_money']);
			if($item['i_reg_time']==0){
				$item['i_reg_time']="无";
			} else {
				$item['i_reg_time']=Common::to_date($item['i_reg_time']);
			}
			if($item['i_referral_time']==0){
				$item['i_referral_time']="无";
			} else {
				$item['i_referral_time']=Common::to_date($item['i_referral_time']);
			}
			if($item['i_pay_time']==0){
				$item['i_pay_status']="未发放";
			} else {
				$item['i_pay_time']=Common::to_date($item['i_pay_time']);
				$item['i_pay_status']="已发放";
			}
			if($item['i_referral_count']>0){
				$item['i_referral_status']="已返利";
			} else {
				$item['i_referral_status']="未返利";
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