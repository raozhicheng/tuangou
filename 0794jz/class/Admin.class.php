<?php
/*==================================================================*/
	/*		文件名:Admin.class.php                     */
	/*		概要: 后台用户管理类.                	       	    */
	/*		作者: 李文                                        */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Admin extends BaseLogic {
	
		private $code_status;//验证状态
		
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
			if($result && $result->num_rows>0 && strtolower($_SESSION['validationcode'])==strtolower($valicode)) {	//登录成功
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
		// 函数: addAdmin($post)
		// 功能: 用于向数据库中添加管理员列表
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addAdmin($post) {
			$post['adm_password']=md5(trim($post['adm_password']));
			if($this->add($post)){
				$this->messList[] = "添加成功！";
				return true;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modAdmin($post)
		// 功能: 用于向数据库中修改管理员列表
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modAdmin($post) {
			$post['adm_password']=md5(trim($post['adm_password']));
			if($this->mod($post)){
				$this->messList[] = "修改成功！";
				return true;
			}else{
				$this->messList[] = "修改失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delAdmin($id)
		// 功能: 将管理员放入回收站内
		// 参数: 
		// 返回: true或false
		//==========================================
		public function delAdmin($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delAdmins($id)
		// 功能: 将分类组放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delAdmins($id) {
			if(count($id)==0){
				$this->messList[] = "请选择您要删除的类别！";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1 WHERE id ";
			if(is_array($id)) {
				$sql .= "IN (" . join(",", $id) . ")";

			}else{
				$sql .= "= $id";
			}

			if($this->mysqli->query($sql)){
				$this->messList[] = "批量删除成功！";
				return true;
			}else{
				$this->messList[] = "批量删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: get_admin()
		// 功能: 获取管理员列表
		// 参数: offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
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
				$this->messList[] = "更改默认值成功！";
				return true;
			} else {
				$this->messList[] = "更改失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: validateForm()
		// 功能: 对添加的内容或修改的内容进行验证
		// 参数: 无
		// 返回: true或false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['adm_password'])){
				$this->messList[] = "密码不能为空!";
				$result=false;
			}
			if(!Validate::noZero($_POST['role_id'])) {
				$this->messList[] = "请选择管理员组!";
				$result=false;
			}
			return  $result;
		}	
		
		//获取总个数
		public function get_admin_num(){
			$sql="select id from {$this->tabName} where is_delete!=1;";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}

	}
?>