<?php
function smarty_block_deal($params,$content,&$smarty,&$repeat){
	
	$fixed_params=array("id","name","cate_id","city_id","num");//创建数组
	foreach($params as $key=>$var){
		if(!in_array($key,$fixed_params)){
			$message="错误，无此".$key."参数!";
			$repeat=false;
			return $message;
		}
	}
	
	
	extract($params);// 将数组导入到当前符号表，数组元素的key作为变量名，var作为变量值
	$act=trim($_GET['act']);//获取get请求中传入的act参数的值
	$cate_id=intval($_GET['cate_id']);
	if(!isset($name)){//是否已经设置过
		$name="row";
	}
	if(!isset($id) || $id==""){
		$id=0;
	}
	switch($act){
		case 'list':
			$type=1;
		break;
		case 'history':
			$type=2;
		break;
		case 'forecast':
			$type=3;
		break;
		
		default:
			$type=1;
		break;
	}
	
	if(!$cate_id){
		$cate_id=0;
	}
	
	//设置city_id
	if(!isset($city_id)){
		$t=$GLOBALS['city']->get_current_city();
		$city_id=$t['id'];
	}
	//在对象$smarty上注册一个数组以供block使用
	if(!isset($smarty->block_data)){          
	  $smarty->block_data = array();
	}
	//获得一个本区块的专属数据存储空间
	$dataindex = md5(__FUNCTION__.md5(serialize($params)));
	$dataindex = substr($dataindex,0,16);
	
	if(!isset($smarty->block_data[$dataindex])){
		$deals=new Deals();//通过class来准备数据
		if($id){//显示详细内容
			$smarty->block_data[$dataindex]=$deals->get_front_deal($id);
		} else {
			if(isset($num)){
				$num=intval($num);
				$smarty->block_data[$dataindex]=$deals->get_front_deal($id,$cate_id,$city_id,$type,0,$num);
			} else {	
				$num=count($deals->get_front_deal($id,$cate_id,$city_id,$type));
				$smarty->assign("deal_num", $num);
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($num,$current_page,Common::get_config("DEAL_PAGE_SIZE"));
				$pageInfo=$page->getPageInfo();
				$smarty->block_data[$dataindex]=$deals->get_front_deal($id,$cate_id,$city_id,$type,$pageInfo["row_offset"],$pageInfo["row_num"]);
			}
		}
		if(!$smarty->block_data[$dataindex]){
			$repeat=false;
			$content="暂时还没有团购信息!";
			return $content;
		}
	}
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		$smarty->assign($name, $item);//把数据装载到模版（模板中的name参数）
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