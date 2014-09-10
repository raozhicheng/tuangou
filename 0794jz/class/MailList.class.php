<?php
/*==================================================================*/
	/*		�ļ���:MailList.class.php                              */
	/*		��Ҫ: ���䶩�Ĺ���     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class MailList extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_mail_list";
				$this->fieldList=array("mail_address","city_id","code","status","is_delete");
		}
		//==========================================
		// ����: addMailList($post)
		// ����: ���������ݿ���������䶩���б�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addMailList($post) {
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modMailList($post)
		// ����: ���������ݿ����޸����䶩���б�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modMailList($post) {
			if($this->mod($post)){
				$this->messList[] = "�޸ĳɹ���";
				return true;
			}else{
				$this->messList[] = "�޸�ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delMailList($id)
		// ����: ������������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delMailList($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delMailLists($id)
		// ����: ��������������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delMailLists($id) {
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
		// ����: get_mailList()
		// ����: ��ȡ�����б�
		// ����: offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_mailList($offset=0,$num=0){
			$limit=" LIMIT {$offset}, {$num}";
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
			if(!Validate::required($_POST['mail_address'])){
				$this->messList[] = "�ʼ���ַ����Ϊ��!";
				$result=false;
			}
			if(!Validate::match($_POST['mail_address'],"/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/")) {
				$this->messList[] = "�����ʽ����ȷ!";
				$result=false;
			} 
			if(!Validate::noZero($_POST['city_id'])){
				$this->messList[] = "δѡ�����!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//��ȡ�����ܸ���
		public function get_mailList_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>