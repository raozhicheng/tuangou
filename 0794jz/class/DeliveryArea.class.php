<?php
/*==================================================================*/
	/*		�ļ���:DeliveryArea.class.php                              */
	/*		��Ҫ: �Ź����͵�������    	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DeliveryArea extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_delivery_area";
				$this->fieldList=array("pid","name","level","sort","is_delete");
		}
		
		
		//==========================================
		// ����: addDeliveryArea($post)
		// ����: ���������ݿ���������͵�����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addDeliveryArea($post) {
					
				if($this->add($post)){
					$this->messList[] = "������͵����ɹ���";
					return true;
				}else{
					$this->messList[] = "������͵���ʧ�ܣ�";
					return false;
				}
		}
		
		//==========================================
		// ����: modDeliveryArea($post)
		// ����: ���������ݿ����޸����͵�����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modDeliveryArea($post) {
				if($this->mod($post)){
					$this->messList[] = "�޸����͵����ɹ���";
					return true;
				}else{
					$this->messList[] = "�޸����͵���ʧ�ܣ�";
					return false;
				}
			
		}
		
		//==========================================
		// ����: delDeliveryArea($post)
		// ����: �����͵���ֱ��ɾ��
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================
		public function delDeliveryArea($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delDeliveryAreas($id)
		// ����: �����͵�����������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delDeliveryAreas($id) {
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
		// ����: get_deliveryAreas($is_all=true,$offset=0,$num=0)
		// ����: ��ȡ���͵����б�
		// ����: is_all:�Ƿ���ȫ���г�,offset:ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_deliveryAreas($is_all=true,$id=0,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where pid={$id} and is_delete=0 order by sort asc".$limit;
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
		
		public function get_deliveryAreas_all($level=0){
			$sql="select * from {$this->tabName} where level={$level} and is_delete=0 order by sort asc".$limit;
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
		
		
		//==========================================
		// ����: validateForm()
		// ����: ����ӵ����ݻ��޸ĵ����ݽ�����֤
		// ����: ��
		// ����: true��false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['name'])){
				$this->messList[] = "���͵������Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "���͵������Ʋ��ܳ���20���ַ�!";
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
			
			return  $result;
		}	
		
		
		//��ȡ���͵����ܸ���
		public function get_deliveryArea_num($id){
			$sql="select id from {$this->tabName} where pid={$id} and is_delete=0 order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>