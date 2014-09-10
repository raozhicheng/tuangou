<?php
function smarty_block_deal($params,$content,&$smarty,&$repeat){
	
	$fixed_params=array("id","name","cate_id","city_id","num");//��������
	foreach($params as $key=>$var){
		if(!in_array($key,$fixed_params)){
			$message="�����޴�".$key."����!";
			$repeat=false;
			return $message;
		}
	}
	
	
	extract($params);// �����鵼�뵽��ǰ���ű�����Ԫ�ص�key��Ϊ��������var��Ϊ����ֵ
	$act=trim($_GET['act']);//��ȡget�����д����act������ֵ
	$cate_id=intval($_GET['cate_id']);
	if(!isset($name)){//�Ƿ��Ѿ����ù�
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
	
	//����city_id
	if(!isset($city_id)){
		$t=$GLOBALS['city']->get_current_city();
		$city_id=$t['id'];
	}
	//�ڶ���$smarty��ע��һ�������Թ�blockʹ��
	if(!isset($smarty->block_data)){          
	  $smarty->block_data = array();
	}
	//���һ���������ר�����ݴ洢�ռ�
	$dataindex = md5(__FUNCTION__.md5(serialize($params)));
	$dataindex = substr($dataindex,0,16);
	
	if(!isset($smarty->block_data[$dataindex])){
		$deals=new Deals();//ͨ��class��׼������
		if($id){//��ʾ��ϸ����
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
			$content="��ʱ��û���Ź���Ϣ!";
			return $content;
		}
	}
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		$smarty->assign($name, $item);//������װ�ص�ģ�棨ģ���е�name������
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