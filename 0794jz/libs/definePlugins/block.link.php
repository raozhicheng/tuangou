<?php
function smarty_block_link($params,$content,&$smarty,&$repeat){
	
	$fixed_params=array("id","name","num");
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
		$links=new Links();
		if(isset($num)){
			$num=intval($num);
			$smarty->block_data[$dataindex]=$links->get_links(false,true,0,$num);
		} else {
			$smarty->block_data[$dataindex]=$links->get_links(true,true);
		}
	}
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		$item['img']=GALLERY_PATH.$item['img'];
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