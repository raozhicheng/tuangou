<?php
function smarty_block_adv($params,$content,&$smarty,&$repeat){
	
	$fixed_params=array("id","name");//��������
	foreach($params as $key=>$var){//�������飬ÿ��Ԫ�ص�key��value�ֱ���$key,$var��ʾ
		if(!in_array($key,$fixed_params)){
			$message="�����޴�".$key."����!";
			$repeat=false;
			return $message;
		}
	}
	
	
	extract($params);//�����鵼�뵱ǰ���ű������key��Ϊ��������var��Ϊ����ֵ
	
	if(!isset($name)){
		$name="row";//��Ԫ��name��ֵ����Ϊrow
	}
	
	if(!isset($smarty->block_data)){          
	  $smarty->block_data = array();
	}
	
	$dataindex = md5(__FUNCTION__.md5(serialize($params)));
	$dataindex = substr($dataindex,0,16);
	
	if(!isset($smarty->block_data[$dataindex])){
		$adv=new Adv();
		$smarty->block_data[$dataindex]=$adv->get_advs(true,false,$id);//����php��ȡ����
	}
	
	
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);//ɾ�������������еĵ�һ��Ԫ��
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