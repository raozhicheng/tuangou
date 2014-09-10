<?php
/*==================================================================*/
	/*		�ļ���:Message_group.class.php                              */
	/*		��Ҫ: ���Է������     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Message_group extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_message_group";
				$this->fieldList=array("name","preset","show_name","is_member","sort","is_delete");
		}
		//==========================================
		// ����: addMessageGroup($post)
		// ����: ���������ݿ���������Է���
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addMessageGroup($post) {
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modMessageGroup($post)
		// ����: ���������ݿ����޸����Է���
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modMessageGroup($post) {
			if($this->mod($post)){
				$this->messList[] = "�޸ĳɹ���";
				return true;
			}else{
				$this->messList[] = "�޸�ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delMessageGroup($id)
		// ����: �����Է���������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delMessageGroup($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delMessageGroups($id)
		// ����: �����Է���������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delMessageGroups($id) {
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
		// ����: get_messageGroup()
		// ����: ��ȡ���Է���
		// ����: is_all:�Ƿ���ȫ���г�,offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_messageGroup($is_all=true,$offset=0,$num=0,$preset=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if($preset){
				$sql="select * from {$this->tabName} where is_delete!=1 and preset=0 order by sort asc".$limit;
			} else {
				$sql="select * from {$this->tabName} where is_delete!=1 order by sort asc".$limit;
			}
			$result=$this->mysqli->query($sql);
			
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
						$temp[]=$row;
				}
				return $temp;
			}
			
		}
		
		// ���ܣ�����ǰ̨��ʾ����Ϣ����
		// ������preset�����˸���ʾ��Щ��Ϣ����
		public function get_front_messageGroup($offset=0,$num=0,$preset=0){
			if(!$offset && !$num){
				$limit="";
			} else {
				$limit=" LIMIT {$offset}, {$num}";//��ʼ�кţ���������
			}
			$sql="select * from {$this->tabName} where is_delete!=1 and preset=".$preset." order by sort asc".$limit;
			$result=$this->mysqli->query($sql);
			
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
						$temp[]=$row;
				}
				return $temp;
			}
			
		}
		
		//��ȡ�������Է�����Ϣ
		public function get_mg_single($id=0){
			$sql="select * from {$this->tabName} where is_delete=0 and id=".$id." order by sort asc";
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
						$temp[]=$row;
				}
				return $temp;
			}
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
				$this->messList[] = "URL���Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "URL���Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::required($_POST['show_name'])){
				$this->messList[] = "���Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['show_name'], 40)) {
				$this->messList[] = "���Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::required($_POST['sort'])){
				$this->messList[] = "������Ϊ��!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['sort'])){
				$this->messList[] = "�������Ϊ����!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//��ȡ���Է����ܸ���()
		public function get_group_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>