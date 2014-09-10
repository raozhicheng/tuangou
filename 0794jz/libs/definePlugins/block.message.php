<?php
function smarty_block_message($params,$content,&$smarty,&$repeat){
	
	$fixed_params=array("name","title_len","group_id","num");
	foreach($params as $key=>$var){
		if(!in_array($key,$fixed_params)){
			$message="错误，无此".$key."参数!";
			$repeat=false;
			return $message;
		}
	}
	
	
	extract($params);
	if(!isset($group_id) || $group_id=="" || $group_id==0){
		$group_id=intval($_GET['group_id']);
	}
	$deal_id=intval($_GET['deal_id']);
	$mg=new Message_group();
	if(!$group_id){
		$temp=$mg->get_messageGroup(true,0,0,1);
		$group_id=$temp[0]['id'];
	}
	$group_info=$mg->get_mg_single($group_id);
	
	if(!isset($name)){
		$name="row";
	}
	if(!$deal_id){
		$deal_id=0;
	}
	if($_SESSION['user_info']){
		$user_id=$_SESSION['user_info']['id'];
	}
	$t=$GLOBALS['city']->get_current_city();
	$city_id=$t['id'];
	
	if(!isset($smarty->block_data)){          
	  $smarty->block_data = array();
	}
	
	$dataindex = md5(__FUNCTION__.md5(serialize($params)));
	$dataindex = substr($dataindex,0,16);
	$message=new Message();
	if(!isset($smarty->block_data[$dataindex])){
		
		if(isset($num)){
			$num=intval($num);
			$smarty->block_data[$dataindex]=$message->get_front_messages($deal_id,$city_id,$user_id,$group_info,0,$num);
			$num=count($message->get_front_messages($deal_id,$city_id,$user_id,$group_info,0,$num));
			$smarty->assign("message_num", $num);
		} else {
			$num=count($message->get_front_messages($deal_id,$city_id,$user_id,$group_info));
			$smarty->assign("message_num", $num);
			$current_page=isset($_GET["page"])?$_GET["page"]:1;
			$page=new Page($num,$current_page,Common::get_config("PAGE_SIZE"));
			$pageInfo=$page->getPageInfo();
			$smarty->block_data[$dataindex]=$message->get_front_messages($deal_id,$city_id,$user_id,$group_info,$pageInfo["row_offset"],$pageInfo["row_num"]);
		}
			
		if(!$smarty->block_data[$dataindex]){
			$repeat=false;
			$content="对不起,暂无留言信息!";
			return $content;
		}
	}
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		if(isset($title_len)){
			$item['title']=Common::g_substr($item['title'],intval($title_len));
		}
		
		$user_info=$message->get_other_datas("cms_user","user_name","id",$item['user_id']);
		$item['username']=$user_info[0]['user_name'];
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