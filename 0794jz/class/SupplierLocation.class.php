<?php
/*==================================================================*/
	/*		�ļ���:SupplierLocation.class.php                              */
	/*		��Ҫ: �Ź���Ӧ�̵������     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class SupplierLocation extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_supplier_location";
				$this->fieldList=array("name","route","address","tel","contact","point","supplier_id","open_time","brief","is_main","is_delete","api_address");
		}
		
		
		//==========================================
		// ����: addSupplierLocation($post)
		// ����: ���������ݿ�����ӹ�Ӧ�̵���λ����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addSupplierLocation($post) {
				if($id=$this->add($post)){
					if(!$this->get_s_l($post['supplier_id'],$post['id'])){
						$this->mods($post,"and supplier_id=".intval($post['supplier_id']));
					}
					$this->messList[] = "��ӳɹ���";
					return true;
				}else{
					$this->messList[] = "���ʧ�ܣ�";
					return false;
				}
		}
		
		
		//==========================================
		// ����: modSupplierLocation($post)
		// ����: ���ύ�����ݸ��µ����ݿ�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modSupplierLocation($post) {
					if($this->mods($post)){
						$this->messList[] = "�޸ĳɹ���";
						return true;
					}else{
						$this->messList[] = "�޸�ʧ�ܣ�";
						return false;
					}
			
		}
		
		//==========================================
		// ����: delSupplierLocation($post)
		// ����: ����Ӧ�̵�����Ϣ�������վ
		// ����: �ύ����
		// ����: true��false
		//==========================================
		public function delSupplierLocation($post) {
			if($this->mods($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
				
		//==========================================
		// ����: delSupplierLocation($xid,$id)
		// ����: ����������վ��
		// ����: supplier_id���ϼ�ID $id����ID
		// ����: true��false
		//==========================================
		function delSupplierLocations($id,$supplier_id) {
			if(count($id)==0){
				$this->messList[] = "��ѡ����Ҫɾ���ĵ��棡";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1,is_main=0 WHERE id ";
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
		// ����: get_supplierLocation()
		// ����: ��ȡ��Ӧ���ŵ��б�
		// ����: is_delete:�Ƿ�Ϊ��ɾ�� offset:ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_supplierLocation($is_delete=false,$offset=0,$num=0,$id){
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
		// ����: get_id($supplier_id,$id)
		// ����: ��ȡ��Ӧ���ʺ��б�
		// ����: $supplier_id��Ӧ��ID  $id�ʺ�ID
		// ����: false���б�
		//==========================================
		function get_s_l($supplier_id,$id) {
			$sql = "SELECT * FROM {$this->tabName} WHERE supplier_id={$supplier_id} and id ={$id}";
			
			$result=$this->mysqli->query($sql);

			if($result && $result->num_rows ==1){
				return $result->fetch_assoc();
			}else{
				return false;
			}
	
		}
		
		public function set_location_main($post) {
				$where="and supplier_id=".intval($post['supplier_id']);
				$sql="update {$this->tabName} set is_main=0 where is_main=1 ".$where;
				$result=$this->mysqli->query($sql);
				if($result && $this->mods($post,$where)) {
					$this->messList[] = "����Ĭ��ֵ�ɹ���";
					return true;
				} else {
					$this->messList[] = "����ʧ�ܣ�";
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
			if(!Validate::required($_POST['name'])){
				$this->messList[] = "���Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "���Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//��ȡ��Ӧ�̵����ܸ���
		public function get_supplierLocation_num($is_delete=false,$id){
			if(!$is_delete){
				$sql="select * from {$this->tabName} where is_delete!=1 and supplier_id={$id}";
			} else {
				$sql="select * from {$this->tabName} where supplier_id={$id}";
			}
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>