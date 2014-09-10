<?php
function smarty_block_dealCate($params,$content,&$smarty,&$repeat){
	
	if(!Common::get_config("SHOW_DEAL_CATE")){
		$repeat=false;
		return;
	}
	
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
	
	if(!isset($id)){
		$id='all';
	}
	
	if(!isset($smarty->block_data)){          
	  $smarty->block_data = array();
	}
	
	$dataindex = md5(__FUNCTION__.md5(serialize($params)));
	$dataindex = substr($dataindex,0,16);
	
	if(!isset($smarty->block_data[$dataindex])){
		$deals_cate=new Deals_category();
		if(isset($num)){
			$num=intval($num);
			$smarty->block_data[$dataindex]=$deals_cate->get_category(false,false,$id,true,0,$num);
		} else {
			$smarty->block_data[$dataindex]=$deals_cate->get_category(true,false);
		}
	}
	
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		$deal_act=array("list","history","forecast");
		$filename=explode("?",$_ENV['uri']);
		switch($filename[0]){
			case 'index.php':
			case 'deals.php':
				$file_str=$filename[0];
			break;
			default:
				$file_str='index.php';		
		}
		$act=trim($_GET['act']);
		if(in_array($act,$deal_act)){
			$act="?act=".trim($_GET['act']);
		} else {
			$act="";
		}
		$cate_str="&cate_id=".$item['id'];
		$item['link']=Common::rewrite_url(APP_PATH.$file_str.$act).$cate_str;
		$cate_id=intval($_GET['cate_id']);
		if($item['id']==$cate_id){
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