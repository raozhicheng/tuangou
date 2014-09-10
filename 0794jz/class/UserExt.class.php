<?php
/*==================================================================*/
	/*		�ļ���:UserExt.class.php                              */
	/*		��Ҫ: ��Ա��չ����     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class UserExt extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_user_extend";
				$this->fieldList=array("field_id","user_id","value");
				
		}
		//==========================================
		// ����: addUserExt($post)
		// ����: ���������ݿ�����ӻ�Ա��չ����
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addUserExt($post) {
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		
		
		//==========================================
		// ����: modUserExt($post)
		// ����: ���������ݿ����޸Ļ�Ա
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modUserExt($post) {
			if($this->mod($post)){
				return true;
			}else{
				return false;
			}
		}
		
		//==========================================
		// ����: delUserExt($id)
		// ����: ����Ա�������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		public function delUserExt($post){
			if($this->mod($post)){
				return true;
			}else{
				return false;
			}
		}
		
		//==========================================
		// ����: delUserExts($id)
		// ����: ����Ա�������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delUserExts($id) {
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
		// ����: get_userExt($id)
		// ����: ��ȡ��Ա��չ����
		// ����: id�ǻ�ԱID
		// ����: false���б�
		//==========================================
		public function get_userExt($id){
			$sql = "SELECT * FROM {$this->tabName} WHERE user_id ={$id}";
			
			$result=$this->mysqli->query($sql);

			if($result && $result->num_rows ==1){
				return $result->fetch_assoc();
			}else{
				return false;
			}
	
		}		
		
		
		
	}
	
?>