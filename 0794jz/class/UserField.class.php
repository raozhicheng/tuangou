<?php
/*==================================================================*/
	/*		�ļ���:UserField.class.php                              */
	/*		��Ҫ: ��Ա��չ����     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class UserField extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_user_field";
				$this->fieldList=array("field_name","field_show_name","input_type","value_scope","is_must","sort","is_delete");
		}
		//==========================================
		// ����: addUserField($post)
		// ����: ���������ݿ�����ӻ�Ա��չ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addUserField($post) {
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ��,�ֶ����Ʋ������ظ���";
				return false;
			}
		}
		
		//==========================================
		// ����: modUserField($post)
		// ����: ���������ݿ����޸Ļ�Ա��չ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modUserField($post) {
			if($this->mod($post)){
				$this->messList[] = "�ظ��ɹ���";
				return true;
			}else{
				$this->messList[] = "�ظ�ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delUserField($id)
		// ����: ����Ա��չ�������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delUserField($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delUserFields($id)
		// ����: ����Ա��չ�������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delUserFields($id) {
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
		// ����: get_UserFields()
		// ����: ��ȡ��Ա��չ
		// ����: is_all:�Ƿ���ȫ���г�,offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_userFields($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where is_delete!=1 order by sort asc".$limit;
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
			if(!Validate::required($_POST['field_name'])){
				$this->messList[] = "�ֶ����Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['field_name'], 40)) {
				$this->messList[] = "�ֶ����Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::match($_POST['field_name'],"/^\w+$/")) {
				$this->messList[] = "�ֶ�����ֻ��Ϊ������ĸ��!";
				$result=false;
			}
			if(!Validate::required($_POST['field_show_name'])) {
				$this->messList[] = "�ֶ���ʾ���Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['field_show_name'], 40)) {
				$this->messList[] = "�ֶ���ʾ���Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			return  $result;
		}	
		
		//��ȡ��Ա��չ�ܸ���()
		public function get_userField_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>