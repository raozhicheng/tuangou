<?php
/*==================================================================*/
	/*		�ļ���:SupplierAccount.class.php                              */
	/*		��Ҫ: �Ź���Ӧ���ʻ�����     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class SupplierAccount extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_supplier_account";
				$this->fieldList=array("account_name","account_password","supplier_id","status","is_delete","description","login_ip","login_time","update_time");
		}
		
		
		//==========================================
		// ����: addSupplierAccount($post)
		// ����: ���������ݿ�����ӹ�Ӧ���˺���Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addSupplierAccount($post) {
			$post["account_password"]=md5($post["account_password"]);
				if($this->add($post)){
					$this->messList[] = "����ʺųɹ���";
					return true;
				}else{
					$this->messList[] = "����ʺ�ʧ��,�ʺŲ����ظ���";
					return false;
				}
		}
		
		
		//==========================================
		// ����: modSupplierAccount($post)
		// ����: ���ύ�����ݸ��µ����ݿ�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modSupplierAccount($post) {
			$post["account_password"]=md5($post["account_password"]);
					if($this->mods($post)){
						$this->messList[] = "�޸ĳɹ���";
						return true;
					}else{
						$this->messList[] = "�޸�ʧ�ܣ�";
						return false;
					}
			
		}
		
		//==========================================
		// ����: delSupplierAccount($post)
		// ����: ����Ӧ���ʺŷ������վ
		// ����: �ύ����
		// ����: true��false
		//==========================================
		public function delSupplierAccount($post) {
			if($this->mods($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
				
		//==========================================
		// ����: delSupplierAccount($xid,$id)
		// ����: ����������վ��
		// ����: supplier_id���ϼ�ID $id����ID
		// ����: true��false
		//==========================================
		function delSupplierAccounts($id,$supplier_id) {
			if(count($id)==0){
				$this->messList[] = "��ѡ����Ҫɾ�����ʺţ�";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1 WHERE id ";
			if(is_array($id)) {
				$sql .= "IN (" . join(",", $id) . ")";

			}else{
				$sql .= "= $id and supplier_id=$id";
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
		// ����: get_supplierAccount()
		// ����: ��ȡ��Ӧ���ʺ��б�
		// ����: is_delete:�Ƿ�Ϊ��ɾ�� offset:ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_supplierAccount($is_delete=false,$offset=0,$num=0,$id){
			$limit=" LIMIT {$offset}, {$num}";
			if(!$is_delete){
				$sql="select * from {$this->tabName} where is_delete!=1 and supplier_id={$id}  order by id desc".$limit;
			} else {
				$sql="select * from {$this->tabName} where supplier_id={$id}".$limit;
			}
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
		// ����: get_s_a($supplier_id,$id)
		// ����: ��ȡ��Ӧ���ʺ��б�
		// ����: $supplier_id��Ӧ��ID  $id�ʺ�ID
		// ����: false���б�
		//==========================================
		function get_s_a($supplier_id,$id) {
			$sql = "SELECT * FROM {$this->tabName} WHERE supplier_id={$supplier_id} and id ={$id}";
			
			$result=$this->mysqli->query($sql);

			if($result && $result->num_rows ==1){
				return $result->fetch_assoc();
			}else{
				return false;
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
			if(!Validate::required($_POST['account_name'])){
				$this->messList[] = "�ʺŲ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['account_name'], 40)) {
				$this->messList[] = "�ʺŲ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::required($_POST['account_password'])) {
				$this->messList[] = "���벻��Ϊ��!";
				$result=false;
			}
			if(!Validate::required($_POST['confirm_pass'])){
				$this->messList[] = "ȷ�����벻��Ϊ��!";
				$result=false;
			}
			if(!Validate::equal($_POST['account_password'],$_POST['confirm_pass'])){
				$this->messList[] = "������ȷ�����벻һ��!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//��ȡ��Ӧ���ʺ��ܸ���
		public function get_supplierAccount_num($is_delete=false,$id){
			if(!$is_delete){
				$sql="select id from {$this->tabName} where is_delete!=1 and supplier_id={$id}";
			} else {
				$sql="select id from {$this->tabName} where supplier_id={$id}";
			}
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>