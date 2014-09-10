<?php
/*==================================================================*/
	/*		�ļ���:UserConsignee.class.php                              */
	/*		��Ҫ: �ջ��˹���     	       	    */
	/*		����: ����                                          */
	/*==================================================================*/
	class UserConsignee extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_user_consignee";
				$this->fieldList=array("user_id","region_lv1","region_lv2","region_lv3","address","mobile","zip","consignee");
				
		}
		//==========================================
		// ����: addUserConsignee($post)
		// ����: ���������ݿ�������ջ���
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addUserConsignee($post) {
			if($this->add($post)){
				return true;
			}else{
				return false;
			}
		}
		
		
		
		//==========================================
		// ����: modUserConsignee($post)
		// ����: ���������ݿ����޸��ջ���
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modUserConsignee($post) {
			if($this->mod($post)){
				return true;
			}else{
				return false;
			}
		}
		
		
		public function getUserConsignee($user_id){
			$result=$this->getRow("select * from ".$this->tabName." where user_id = ".$user_id." order by id desc");
			return $result;
		}
		
		
	}
	
?>