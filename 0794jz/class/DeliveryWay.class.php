<?php
/*==================================================================*/
	/*		�ļ���:DeliveryWay.class.php                              */
	/*		��Ҫ: �Ź����ͷ�ʽ����    	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DeliveryWay extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_delivery_way";
				$this->fieldList=array("name","description","first_fee","allow_default","sort","first_weight","continue_weight","continue_fee","weight_id","status","is_delete");
		}
		
		
		//==========================================
		// ����: addDeliveryWay($post)
		// ����: ���������ݿ���������ͷ�ʽ��Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addDeliveryWay($post) {
				if(!$post['allow_default']){
					$post['first_fee']=0;
					$post['first_weight']=0;
					$post['continue_fee']=0;
					$post['continue_weight']=0;
				}
				if($id=$this->add($post)){
					$this->messList[] = "������ͷ�ʽ�ɹ���";
					return $id;
				}else{
					$this->messList[] = "������ͷ�ʽʧ�ܣ�";
					return false;
				}
		}
		
		//==========================================
		// ����: modDeliveryWay($post)
		// ����: ���������ݿ����޸����ͷ�ʽ��Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modDeliveryWay($post) {
				if($id=$this->mod($post)){
					$this->messList[] = "�޸����ͷ�ʽ�ɹ���";
					return $id;
				}else{
					$this->messList[] = "�޸����ͷ�ʽʧ�ܣ�";
					return false;
				}
			
		}
		
		//==========================================
		// ����: delDeliveryWay($post)
		// ����: �����ͷ�ʽֱ��ɾ��
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================
		public function delDeliveryWay($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delDeliveryWays($id)
		// ����: �����ͷ�ʽ��������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delDeliveryWays($id) {
			if(count($id)==0){
				$this->messList[] = "��ѡ����Ҫɾ���ķ��࣡";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1 WHERE id ";
			if(is_array($id)) {
				$sql .= "IN (" . join(",", $id) . ")";

			}else{
				$sql .= "= $id";
			}

			if($this->mysqli->query($sql)){
				$this->messList[] = "����ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "����ɾ��ʧ�ܣ�";
				return false;
			}
		}		
		
		
		//==========================================
		// ����: get_deliveryWays($is_all=true,$offset=0,$num=0)
		// ����: ��ȡ���ͷ�ʽ�б�
		// ����: is_all:�Ƿ���ȫ���г�,offset:ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_deliveryWays($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where is_delete=0 order by sort asc".$limit;
			$result=$this->mysqli->query($sql);
			if($result){
				while($row=$result->fetch_assoc()){
					$temp[]=$row;
				}
				if(count($temp)==0){
					return false;
				} else {
					return $temp;
				}
			}
			return false;
		}
		
		
		
		// ��ȡ ָ�����͵�����  ���ͷ�ʽ
		public function load_support_delivery($region_id){
			$support_delivery_list = array();
			$sql="select * from {$this->tabName} where is_delete=0 and status=1 order by sort asc";
			$delivery_list = $this->getAll($sql);
			$child = new Child("cms_delivery_way");
			
			foreach($delivery_list as $k=>$v)
			{
				//��ȡ��Ӧ��֧�ֵ���
				$support_ids = array();
				$delivery_items = $this->getAll("select * from ".TAB_PREFIX."cms_delivery_fee where delivery_id = ".$v['id']);
				foreach($delivery_items as $kk=>$vv)
				{
					$sp_ids = $vv['region_ids']; //ÿ��֧�ֵ���ֵ
					$sp_ids = explode(",",$sp_ids);
					foreach($sp_ids as $sp_id)
					{
						$tmp_ids = $child->getChildIds($sp_id);
						$tmp_ids[] = $sp_id;
						$support_ids = array_merge($support_ids,$tmp_ids);
					}
				}
				
				if(in_array($region_id,$support_ids)||$v['allow_default'] == 1)
				{				
					$support_delivery_list[] = $v;
				}		
			}
			return $support_delivery_list;
		}
		//==========================================
		// ����: validateForm()
		// ����: ����ӵ����ݻ��޸ĵ����ݽ�����֤
		// ����: ��
		// ����: true��false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['name'])){
				$this->messList[] = "���ͷ�ʽ���Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "���ͷ�ʽ���Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::required($_POST['sort'])) {
				$this->messList[] = "������Ϊ��!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['sort'])){
				$this->messList[] = "�������Ϊ����!";
				$result=false;
			}
			if(count($_POST['support_ids'])){
				for($i=0;$i<count($_POST['support_ids']);$i++){
					if(!Validate::required($_POST['first_fees'][$i]) || !Validate::required($_POST['continue_fees'][$i])){
						$this->messList[] = "�۸���Ϊ��!";
						$result=false;
						break;
					}
					if(!Validate::required($_POST['first_weights'][$i]) || !Validate::required($_POST['continue_weights'][$i])){
						$this->messList[] = "��������Ϊ��!";
						$result=false;
						break;
					}
					if(!Validate::isFloat($_POST['first_fees'][$i]) || !Validate::isFloat($_POST['continue_fees'][$i])){
						$this->messList[] = "�۸����Ϊ����!";
						$result=false;
						break;
					}
					if(!Validate::isFloat($_POST['first_weights'][$i]) || !Validate::isFloat($_POST['continue_weights'][$i])){
						$this->messList[] = "��������Ϊ����!";
						$result=false;
						break;
					}
					
					if(!Validate::required($_POST['area_name'][$i])){
						$this->messList[] = "��ѡ�����͵���!";
						$result=false;
					}
				}
			}
			
			return  $result;
		}	
		
		//��ȡ���ͷ�ʽ�ܸ���
		public function get_DeliveryWay_num(){
			$sql="select id from {$this->tabName} where is_delete=0";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>