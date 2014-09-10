<?php
/*==================================================================*/
	/*		�ļ���:UserGroup.class.php                              */
	/*		��Ҫ: ��Ա�������     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class UserGroup extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_user_group";
				$this->fieldList=array("name","score","discount","is_delete");
		}
		//==========================================
		// ����: addUserGroup($post)
		// ����: ���������ݿ�����ӻ�Ա����
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addUserGroup($post) {
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modUserGroup($post)
		// ����: ���������ݿ����޸Ļ�Ա����
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modUserGroup($post) {
			if($this->mod($post)){
				$this->messList[] = "�ظ��ɹ���";
				return true;
			}else{
				$this->messList[] = "�ظ�ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delUserGroup($id)
		// ����: ����Ա����������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delUserGroup($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delUserGroups($id)
		// ����: ����Ա����������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delUserGroups($id) {
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
		// ����: get_userGroups()
		// ����: ��ȡ��Ա����
		// ����: is_all:�Ƿ���ȫ���г�,offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_userGroups($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where is_delete!=1 order by id asc".$limit;
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
				$this->messList[] = "�������Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "�������Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['score'])) {
				$this->messList[] = "���ֱ���Ϊ����!";
				$result=false;
			}
			if(!Validate::isFloat($_POST['discount'])) {
				$this->messList[] = "�ۿ۱���Ϊ����!";
				$result=false;
			}
			return  $result;
		}	
		
		//��ȡ��Ա�����ܸ���()
		public function get_userGroup_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>