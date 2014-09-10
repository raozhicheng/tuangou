<?php
function smarty_block_userLog($params,$content,&$smarty,&$repeat){
	
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
		$userlog=new UserLog();
		$user_id=intval($_SESSION['user_info']['id']);
		$num=$userlog->get_userLog_num($user_id);
		$smarty->assign("userlog_num", $num);
		$current_page=isset($_GET["page"])?$_GET["page"]:1;
		$page=new Page($num,$current_page,Common::get_config("PAGE_SIZE"));
		$pageInfo=$page->getPageInfo();
		$smarty->block_data[$dataindex]=$userlog->get_userLogs($pageInfo["row_offset"],$pageInfo["row_num"],$user_id);
	}
	
	
	
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		if($item){
			$item['money']=sprintf("%.2f", $item['money']);
			if($item['log_time']==0){
				$item['log_time']="无";
			} else {
				$item['log_time']=Common::to_date($item['log_time']);
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