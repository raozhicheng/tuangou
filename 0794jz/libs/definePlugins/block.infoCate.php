<?php
function smarty_block_infoCate($params,$content,&$smarty,&$repeat){
	
	$fixed_params=array("id","name","num","type");
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
	if(!isset($id) || $id==0 || $id==""){
		$id=false;
	} 
	
	if(!isset($type)){
		$type='all';
	}
	
	if(!isset($smarty->block_data)){          
	  $smarty->block_data = array();
	}
	
	$dataindex = md5(__FUNCTION__.md5(serialize($params)));
	$dataindex = substr($dataindex,0,16);
	
	if(!isset($smarty->block_data[$dataindex])){
		$info_cate=new Info_category();
		if($id){
			$smarty->block_data[$dataindex]=array($info_cate->get($id));
		} else {
			if(isset($num)){
				$num=intval($num);
				$smarty->block_data[$dataindex]=$info_cate->get_infoCategory(false,true,$type,0,$num);
			} else {
				$smarty->block_data[$dataindex]=$info_cate->get_infoCategory(true,true);
			}
		}
	}
	
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
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