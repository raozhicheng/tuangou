<?php
/*==================================================================*/
	/*		�ļ���:Role.class.php                              */
	/*		��Ҫ: ����Ա�������     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Role extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_role";
				$this->fieldList=array("name","status","is_delete","access");
		}
		//==========================================
		// ����: addRole($post)
		// ����: ���������ݿ�����ӹ���Ա�����б�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addRole($post) {
			if(count($post['node'])){
				$post['access']=implode(",",$post['node']);
			} else {
				$post['access']="0";
			}
			
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modRole($post)
		// ����: ���������ݿ����޸Ĺ���Ա�����б�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modRole($post) {
			if(count($post['node'])){
				$post['access']=implode(",",$post['node']);
			} else {
				$post['access']="0";
			}
			if($this->mod($post)){
				$this->messList[] = "�޸ĳɹ���";
				return true;
			}else{
				$this->messList[] = "�޸�ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delRole($id)
		// ����: ������������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delRole($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delRoles($id)
		// ����: ��������������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delRoles($id) {
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
		// ����: get_role()
		// ����: ��ȡ�����б�
		// ����: offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_role($is_all=true,$offset=0,$num=0){
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
		// ����: get_module()
		// ����: ��ȡģ���б�
		// ����: ��
		// ����: false���б�
		//==========================================
		public function get_module(){
			$module_tabName=TAB_PREFIX."cms_role_module";
			$sql="select id,name from {$module_tabName} where is_delete!=1 order by id asc";
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
		// ����: get_node()
		// ����: ��ȡ�ڵ��б�
		// ����: ��
		// ����: false���б�
		//==========================================
		public function get_node(){
			$node_tabName=TAB_PREFIX."cms_role_node";
			$sql="select * from {$node_tabName} order by id asc";
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
				$this->messList[] = "���Ʋ���Ϊ��!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//��ȡ�����ܸ���
		public function get_role_num(){
			$sql="select id from {$this->tabName} where is_delete!=1;";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>