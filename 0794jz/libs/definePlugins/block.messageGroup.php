<?php
function smarty_block_messageGroup($params,$content,&$smarty,&$repeat){
	
	$fixed_params=array("id","name","num","preset");
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
	
	if(!isset($preset) || $preset==""){
		$preset=0;
	}
	
	if(!isset($smarty->block_data)){          
	  $smarty->block_data = array();
	}
	
	$dataindex = md5(__FUNCTION__.md5(serialize($params)));
	$dataindex = substr($dataindex,0,16);
	
	if(!isset($smarty->block_data[$dataindex])){
		$message_group=new Message_group();
		if(isset($num)){
			$num=intval($num);
			$smarty->block_data[$dataindex]=$message_group->get_front_messageGroup(0,$num,$preset);
		} else {
			$smarty->block_data[$dataindex]=$message_group->get_front_messageGroup(0,0,$preset);
		}
		$temp=$smarty->block_data[$dataindex];
	}
	
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		$item['link']=Common::rewrite_url(APP_PATH."message.php?group_id=".$item['id']);
		$group_id=intval($_GET['group_id']);
		if(!$group_id){
			$group_id=$temp[0]['id'];
		}
		
		if($item['id']==$group_id){
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