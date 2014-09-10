<?php
/*==================================================================*/
	/*		�ļ���:Admin.class.php                     */
	/*		��Ҫ: ��̨�û�������.                	       	    */
	/*		����: ����                                        */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Admin extends BaseLogic {
	
		private $code_status;//��֤״̬
		
		public function __construct($showError=TRUE){
			parent:: __construct($showError);
			$this->tabName = TAB_PREFIX."cms_admin";
			$this->fieldList=array("adm_name","adm_password","status","is_delete","role_id","login_time","login_ip","is_default");
			$this->auth_key=md5(AUTH_KEY);
		}
		
		private function checkCode($valicode){
			if(trim($valicode)==$validation->getCheckCode()){
				$this->code_status=1;
			}
			$this->code_status=0;
		}
		
		public function login($admin,$pwd,$valicode){
			$sql = "SELECT id,status,role_id FROM {$this->tabName} WHERE adm_name = '{$admin}' AND adm_password = MD5('{$pwd}')";
			$result=$this->mysqli->query($sql);
			if($result && $result->num_rows>0 && strtolower($_SESSION['validationcode'])==strtolower($valicode)) {	//��¼�ɹ�
					$data=$result->fetch_assoc();
					$_SESSION[$this->auth_key]['isLogin'] = true;
					$_SESSION[$this->auth_key]['status'] = $data['status'];
					$_SESSION[$this->auth_key]['id']=$data['id'];
					$_SESSION[$this->auth_key]['role_id']=$data['role_id'];
					$_SESSION[$this->auth_key]['admin'] = $admin;
					return 1;
			}else{
				return 0;
			}
		}
		
		
		public function logout() {
			$_SESSION = array();
			if (isset($_COOKIE[session_name()])) {
   				setcookie(session_name(), '', time()-42000, '/');
			}
			//session_destroy();
			header("Location:?act=login");
		}

		public function isLogin() {
			if(!empty($_SESSION[$this->auth_key]['isLogin']))
				return 1;	
			else
				return 0;
		}
		
		
		//==========================================
		// ����: addAdmin($post)
		// ����: ���������ݿ�����ӹ���Ա�б�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addAdmin($post) {
			$post['adm_password']=md5(trim($post['adm_password']));
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modAdmin($post)
		// ����: ���������ݿ����޸Ĺ���Ա�б�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modAdmin($post) {
			$post['adm_password']=md5(trim($post['adm_password']));
			if($this->mod($post)){
				$this->messList[] = "�޸ĳɹ���";
				return true;
			}else{
				$this->messList[] = "�޸�ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delAdmin($id)
		// ����: ������Ա�������վ��
		// ����: 
		// ����: true��false
		//==========================================
		public function delAdmin($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delAdmins($id)
		// ����: ��������������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delAdmins($id) {
			if(count($id)==0){
				$this->messList[] = "��ѡ����Ҫɾ�������";
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
		// ����: get_admin()
		// ����: ��ȡ����Ա�б�
		// ����: offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_admin($offset=0,$num=0){
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
		
		public function set_default($post) {
			$sql="update {$this->tabName} set is_default=0 where is_default=1";
			$result=$this->mysqli->query($sql);
			if($result && $this->mod($post)) {
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
			if(!Validate::required($_POST['adm_password'])){
				$this->messList[] = "���벻��Ϊ��!";
				$result=false;
			}
			if(!Validate::noZero($_POST['role_id'])) {
				$this->messList[] = "��ѡ�����Ա��!";
				$result=false;
			}
			return  $result;
		}	
		
		//��ȡ�ܸ���
		public function get_admin_num(){
			$sql="select id from {$this->tabName} where is_delete!=1;";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}

	}
?>