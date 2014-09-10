<?php
function smarty_block_adv($params,$content,&$smarty,&$repeat){
	
	$fixed_params=array("id","name");//创建数组
	foreach($params as $key=>$var){//遍历数组，每个元素的key和value分别用$key,$var表示
		if(!in_array($key,$fixed_params)){
			$message="错误，无此".$key."参数!";
			$repeat=false;
			return $message;
		}
	}
	
	
	extract($params);//将数组导入当前符号表，数组的key作为变量名，var作为变量值
	
	if(!isset($name)){
		$name="row";//将元素name的值设置为row
	}
	
	if(!isset($smarty->block_data)){          
	  $smarty->block_data = array();
	}
	
	$dataindex = md5(__FUNCTION__.md5(serialize($params)));
	$dataindex = substr($dataindex,0,16);
	
	if(!isset($smarty->block_data[$dataindex])){
		$adv=new Adv();
		$smarty->block_data[$dataindex]=$adv->get_advs(true,false,$id);//利用php获取数据
	}
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);//删除并返回数组中的第一个元素
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