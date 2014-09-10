<?php
function smarty_block_nav($params,$content,&$smarty,&$repeat){
	
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
		$nav=new Nav();
		$smarty->block_data[$dataindex]=$nav->get_nav(1);
	}
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		$id=$item['u_id']?"&id=".$item['u_id']:"";
		$act=trim($_GET['act']);
		if($_ENV['uri']!=""){
			if(strpos($_ENV['uri'],"?")){
				if($act){
					$m=explode("?",$_ENV['uri']);
					$i=$item['module'].".php";
					if($m[0]==$i && $act==$item['action']) $item['current']=1;
				} else {
					$m=explode("?",$_ENV['uri']);
					$i=$item['module'].".php";
					if($m[0]==$i) $item['current']=1;
				}
			} 
		} else {
			if($item['module']=="index") $item['current']=1;
		}
		
		if($item['module']=='define_url'){
			$item['link']=$item['url'];
		} else if($item['action']) {
			$item['link']=Common::rewrite_url(APP_PATH.$item['module'].".php?act=".$item['action']).$id;
		} else {
			$item['link']=Common::rewrite_url(APP_PATH.$item['module'].".php").$id;
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