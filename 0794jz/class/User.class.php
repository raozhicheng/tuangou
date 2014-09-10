<?php
/*==================================================================*/
	/*		文件名:User.class.php                              */
	/*		概要: 会员管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class User extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_user";
				$this->fieldList=array("user_name","user_pwd","create_time","update_time","login_ip","group_id","status","is_delete","email","mobile","score","money","verify","code","pid","login_time","referral_count","password_verify","integrate_id");
				
		}
		//==========================================
		// 函数: addUser($post)
		// 功能: 用于向数据库中添加会员
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addUser($post) {
			$post["user_pwd"]=md5($post["user_pwd"]);
			$post["create_time"]=Common::get_gmtime();
			$post["update_time"]=Common::get_gmtime();
			if($id=$this->add($post)){
				$this->messList[] = "添加成功！";
				return $id;
			}else{
				$this->messList[] = "添加失败，请查看用户名是否重复！";
				return false;
			}
		}
		
		
		
		//==========================================
		// 函数: modUser($post)
		// 功能: 用于向数据库中修改会员
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modUser($post) {
			if($post["user_pwd"]==""){
				unset($post["user_pwd"]);
			} else {
				$post["user_pwd"]=md5($post["user_pwd"]);
			}
			unset($post["create_time"]);
			$post["update_time"]=Common::get_gmtime();
			if($this->mod($post)){
				$this->messList[] = "修改成功！";
				return true;
			}else{
				$this->messList[] = "修改失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delUser($id)
		// 功能: 将会员放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delUser($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delUsers($id)
		// 功能: 将会员放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delUsers($id) {
			if(count($id)==0){
				$this->messList[] = "请选择您要删除的分类！";
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
		
		
		
		function login($uname, $pwd) {	
			$uname=trim($uname);
			$pwd=md5(trim($pwd));
			$sql = "SELECT * FROM {$this->tabName} where (user_name = '{$uname}' or email= '{$uname}') and user_pwd = '{$pwd}' and status=1";	
			$result=$this->mysqli->query($sql);
			if($result && $result->num_rows>0) {	//登录成功
			
				$data=$result->fetch_assoc();
				$user_current_group=$this->get_other_datas("cms_user_group","score","id",$data['group_id']);
				$user_group=$this->get_other_datas("cms_user_group where score<=".$data['score'],"id,score");
				if($user_current_group[0]['score']<$user_group[0]['score']){
					$data['group_id'] = intval($user_group[0]['id']);
				}
				$post_temp=array("login_ip"=>Common::get_ip(),"login_time"=>Common::get_gmtime(),"group_id"=>$data['group_id'],"id"=>$data['id']);
				$this->modUser($post_temp);
				$_SESSION['isLogin'] = 1;
				$_SESSION['user_info'] = $data;
				return 1;
			}else{
				return 0;
			}
		}
		
				
		function logout() {
			$user_info = $_SESSION['user_info'];
			if(!$user_info){
				return 0;
			}else{
				
				$_SESSION['isLogin'] = 0;
				unset($_SESSION['user_info']);
				return 1;
			}
		}
		
		
		
		//==========================================
		// 函数: get_users()
		// 功能: 获取会员
		// 参数: is_all:是否是全部列出,offset:is_all为否的话偏移量,num:个数,is_search为是否查询
		// 返回: false或列表
		//==========================================
		public function get_users($is_all=true,$offset=0,$num=0,$is_search=false){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if(!$is_search){
				$sql="select * from {$this->tabName} where is_delete!=1 order by id asc".$limit;
			} else {
				$string=$_POST['search_text'];
				$sql="SELECT * from {$this->tabName} WHERE user_name LIKE '%{$string}%' and is_delete!=1 order by id asc".$limit;
			}
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
		// 函数: get_userField()
		// 功能: 获取会员扩展字段（主要用于验证）
		// 参数: 无
		// 返回: false或列表
		//==========================================
		
		private function get_userField(){
			$tabName=TAB_PREFIX."cms_user_field";
			$sql="select field_name,field_show_name,is_must from {$tabName} where is_delete!=1";
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
		
		
		public function check_user($name,$data){
			$user_data[$name] = trim($data);
			$res = array('status'=>1,'info'=>'','data'=>'');
			if($name=="user_name"){
				$sql="select count(*) from {$this->tabName} where user_name = '".trim($user_data[$name]."'");
				$user_num=$this->getOne($sql);
				if($user_num){
					$item['field_name'] = 'user_name';
					$item['error']	=	'is_exist';
					$res['status'] = 0;
					$res['data'] = $item;
					return $res;
				}
			}
			if($name=="email"){
				$sql="select count(*) from {$this->tabName} where email = '".trim($user_data[$name]."'");
				$user_num=$this->getOne($sql);
				if($user_num){
					$item['field_name'] = 'email';
					$item['error']	=	'is_exist';
					$res['status'] = 0;
					$res['data'] = $item;
					return $res;
				}
			}
			if($name=="mobile"){
				$sql="select count(*) from {$this->tabName} where mobile = '".trim($user_data[$name]."'");
				$user_num=$this->getOne($sql);
				if($user_num){
					$item['field_name'] = 'mobile';
					$item['error']	=	'is_exist';
					$res['status'] = 0;
					$res['data'] = $item;
					return $res;
				}
			}
			return $res;
		}
		
		public function check_email_exist($email){
			$sql="select count(*) from {$this->tabName} where email = '".$email."'";
			$num=$this->getOne($sql);
			if($num){
				return true;
			} else {
				return false;
			}
		}
		
		public function sendUser_mail_password($user_id){
			if(Common::get_config("MAIL_ON")){
				$verify_code = rand(111111,999999);
				$temp['password_verify']=$verify_code;
				$temp['id']=$user_id;
				$this->mod($temp);
				$user_info = $this->get($user_id);	
				if($user_info){
					$tmpl = $this->getRow("select * from ".TAB_PREFIX."cms_msg_template where name = 'TPL_MAIL_USER_PASSWORD'");
					$tmpl_content=  $tmpl['content'];
					$user_info['password_url'] = SERVER_ROOT.Common::rewrite_url(APP_PATH."user.php?act=modify_password")."&code=".$user_info['password_verify']."&id=".$user_info['id'];
					$msg = Common::getTempStr("user",$user_info,$tmpl_content);
					$msg_data['dest'] = $user_info['email'];
					$msg_data['send_type'] = 1;
					$msg_data['title'] = "重新修改密码";
					$msg_data['content'] = addslashes($msg);
					$msg_data['send_time'] = 0;
					$msg_data['is_send'] = 0;
					$msg_data['create_time'] = Common::get_gmtime();
					$msg_data['user_id'] = $user_info['id'];
					$msg_data['is_html'] = $tmpl['is_html'];
					$msg_data['result'] = "";
					$msg_data['is_success'] = 0;
					$dml=new DealMsgList();
					if($dml->addDealMsgList($msg_data)){
						return true;
					} else {
						return false;
					}
				}
			}
			return false;
		}
		//==========================================
		// 函数: validateForm()
		// 功能: 对添加的内容或修改的内容进行验证
		// 参数: 无
		// 返回: true或false
		//==========================================
		function validateForm(){
			$result=true;
			$tmpField=$this->get_userField();
			
			if(!Validate::required($_POST['user_name'])){
				$this->messList[] = "用户名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['user_name'], 40)) {
				$this->messList[] = "用户名称不能超过20个字符!";
				$result=false;
			}
			if(!Validate::match($_POST['email'],"/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/")) {
				$this->messList[] = "邮箱格式不正确!";
				$result=false;
			}
			if(!Validate::required($_POST['email'])) {
				$this->messList[] = "邮箱地址不能为空!";
				$result=false;
			}
			if(!Validate::required($_POST['score'])){
				$this->messList[] = "会员积分不能为空!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['score'])){
				$this->messList[] = "会员积分只能为整数!";
				$result=false;
			}
			if(!Validate::required($_POST['money'])){
				$this->messList[] = "会员余额不能为空!";
				$result=false;
			}
			if(!Validate::isFloat($_POST['money'])){
				$this->messList[] = "会员积分只能为数字!";
				$result=false;
			}
			if($_GET['edit']=="add"){
				if(!Validate::required($_POST['user_pwd'])){
					$this->messList[] = "密码不能为空!";
					$result=false;
				}
				if(!Validate::required($_POST['user_confirm_pwd'])){
					$this->messList[] = "确认密码不能为空!";
					$result=false;
				}
			}
			if(!Validate::equal($_POST['user_pwd'],$_POST['user_confirm_pwd'])){
				$this->messList[] = "密码与确认密码不一致!";
				$result=false;
			}
			
			if($tmpField){
				foreach($tmpField as $var){
					if($var['is_must']){
						if(!Validate::required($_POST[$var['field_name']])){
							$this->messList[] =$var['field_show_name']."不能为空!";
							$result=false;
						}
					} 
					if(strpos($_POST[$var['field_name']],"|")){
						$this->messList[] ="有非法字符，请换为全角!";
						$result=false;
					}
					
				}
			}
			return  $result;
		}	
		
		//获取会员总个数()
		public function get_user_num(){
			if($_GET['edit']=="search"){
				$string=$_POST['search_text'];
				$sql="SELECT id from {$this->tabName} WHERE user_name LIKE '%{$string}%' and is_delete!=1";
			} else {
				$sql="select id from {$this->tabName} where is_delete!=1";
			}
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>