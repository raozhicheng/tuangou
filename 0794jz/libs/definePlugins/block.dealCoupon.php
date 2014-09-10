<?php
function smarty_block_dealCoupon($params,$content,&$smarty,&$repeat){
	
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
	
	
	$status=intval($_GET['status']);
	
	if(!isset($smarty->block_data)){          
	  $smarty->block_data = array();
	}
	
	$dataindex = md5(__FUNCTION__.md5(serialize($params)));
	$dataindex = substr($dataindex,0,16);
	
	if(!isset($smarty->block_data[$dataindex])){
		$deal_coupon=new DealCoupon();
		$user_id=intval($_SESSION['user_info']['id']);
		$num=count($deal_coupon->get_front_coupon($user_id,$status));
		$smarty->assign("coupon_num", $num);
		$current_page=isset($_GET["page"])?$_GET["page"]:1;
		$page=new Page($num,$current_page,Common::get_config("PAGE_SIZE"));
		$pageInfo=$page->getPageInfo();
		$smarty->block_data[$dataindex]=$deal_coupon->get_front_coupon($user_id,$status,$pageInfo["row_offset"],$pageInfo["row_num"]);
	}
	
	
	
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		if($item){
			if($item['end_time']==0){
				$item['end_time']="永不过期";
			} else {
				$item['end_time']=Common::to_date($item['end_time']);
			}
			if($item['confirm_time']==0){
				$item['confirm_time']="未使用";
			} else {
				$item['confirm_time']=Common::to_date($item['confirm_time']);
			}
			if($item['sms_count']<Common::get_config("COUPON_SMS_LIMIT")){
				$item['sms']="<a href='".Common::rewrite_url(APP_PATH."user.php?act=send_sms_coupon&id=".$item['id'])."'>发短信</a>";
			}
			if($item['mail_count']<Common::get_config("COUPON_MAIL_LIMIT")){
				$item['mail']="<a href='".Common::rewrite_url(APP_PATH."user.php?act=send_mail_coupon&id=".$item['id'])."'>发邮件</a>";
			}
			$item['view']="<a href='".Common::rewrite_url(APP_PATH."user.php?act=coupon_view&id=".$item['id'])."' target='_blank'>查看</a>";
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