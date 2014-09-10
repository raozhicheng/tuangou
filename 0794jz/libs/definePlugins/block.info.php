<?php
function smarty_block_info($params,$content,&$smarty,&$repeat){
	
	$fixed_params=array("id","name","title_len","content_len","cate_id","num");
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
	
	if(!isset($cate_id)){
		$cate_id=false;
	}
	
	if(!isset($smarty->block_data)){          
	  $smarty->block_data = array();
	}
	
	$dataindex = md5(__FUNCTION__.md5(serialize($params)));
	$dataindex = substr($dataindex,0,16);
	
	if(!isset($smarty->block_data[$dataindex])){
		$infos=new Infos();
		if($id){
			$smarty->block_data[$dataindex]=$infos->get_infos(true,true,$id);
		} else{
			if(isset($num)){
				$num=intval($num);
				$smarty->block_data[$dataindex]=$infos->get_infos(false,true,$id,$cate_id,0,$num);
			} else {
				$num=count($infos->get_infos(true,true,$id,$cate_id));
				$smarty->assign("info_num", $num);
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($num,$current_page,Common::get_config("PAGE_SIZE"));
				$pageInfo=$page->getPageInfo();
				$smarty->block_data[$dataindex]=$infos->get_infos(false,true,$id,$cate_id,$pageInfo["row_offset"],$pageInfo["row_num"]);
			}
		}
	}
	
	
	
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		if($item['rel_url']){
			$item['link']=$item['rel_url'];
		} else {
			$item['link']=Common::rewrite_url(APP_PATH."info.php?id=".$item['id']);
		}
		if(isset($title_len)){
			$item['title']=Common::g_substr($item['title'],intval($title_len));
		}
		if(isset($content_len)){
			$item['content']=Common::g_substr($item['content'],intval($content_len));
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