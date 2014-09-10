<?php
/*==================================================================*/
	/*		�ļ���:User.class.php                              */
	/*		��Ҫ: ��Ա����     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class User extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_user";
				$this->fieldList=array("user_name","user_pwd","create_time","update_time","login_ip","group_id","status","is_delete","email","mobile","score","money","verify","code","pid","login_time","referral_count","password_verify","integrate_id");
				
		}
		//==========================================
		// ����: addUser($post)
		// ����: ���������ݿ�����ӻ�Ա
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addUser($post) {
			$post["user_pwd"]=md5($post["user_pwd"]);
			$post["create_time"]=Common::get_gmtime();
			$post["update_time"]=Common::get_gmtime();
			if($id=$this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return $id;
			}else{
				$this->messList[] = "���ʧ�ܣ���鿴�û����Ƿ��ظ���";
				return false;
			}
		}
		
		
		
		//==========================================
		// ����: modUser($post)
		// ����: ���������ݿ����޸Ļ�Ա
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
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
				$this->messList[] = "�޸ĳɹ���";
				return true;
			}else{
				$this->messList[] = "�޸�ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delUser($id)
		// ����: ����Ա�������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delUser($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delUsers($id)
		// ����: ����Ա�������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delUsers($id) {
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
		
		
		
		function login($uname, $pwd) {	
			$uname=trim($uname);
			$pwd=md5(trim($pwd));
			$sql = "SELECT * FROM {$this->tabName} where (user_name = '{$uname}' or email= '{$uname}') and user_pwd = '{$pwd}' and status=1";	
			$result=$this->mysqli->query($sql);
			if($result && $result->num_rows>0) {	//��¼�ɹ�
			
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
		// ����: get_users()
		// ����: ��ȡ��Ա
		// ����: is_all:�Ƿ���ȫ���г�,offset:is_allΪ��Ļ�ƫ����,num:����,is_searchΪ�Ƿ��ѯ
		// ����: false���б�
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
		// ����: get_userField()
		// ����: ��ȡ��Ա��չ�ֶΣ���Ҫ������֤��
		// ����: ��
		// ����: false���б�
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
					$msg_data['title'] = "�����޸�����";
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
		// ����: validateForm()
		// ����: ����ӵ����ݻ��޸ĵ����ݽ�����֤
		// ����: ��
		// ����: true��false
		//==========================================
		function validateForm(){
			$result=true;
			$tmpField=$this->get_userField();
			
			if(!Validate::required($_POST['user_name'])){
				$this->messList[] = "�û����Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['user_name'], 40)) {
				$this->messList[] = "�û����Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::match($_POST['email'],"/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/")) {
				$this->messList[] = "�����ʽ����ȷ!";
				$result=false;
			}
			if(!Validate::required($_POST['email'])) {
				$this->messList[] = "�����ַ����Ϊ��!";
				$result=false;
			}
			if(!Validate::required($_POST['score'])){
				$this->messList[] = "��Ա���ֲ���Ϊ��!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['score'])){
				$this->messList[] = "��Ա����ֻ��Ϊ����!";
				$result=false;
			}
			if(!Validate::required($_POST['money'])){
				$this->messList[] = "��Ա����Ϊ��!";
				$result=false;
			}
			if(!Validate::isFloat($_POST['money'])){
				$this->messList[] = "��Ա����ֻ��Ϊ����!";
				$result=false;
			}
			if($_GET['edit']=="add"){
				if(!Validate::required($_POST['user_pwd'])){
					$this->messList[] = "���벻��Ϊ��!";
					$result=false;
				}
				if(!Validate::required($_POST['user_confirm_pwd'])){
					$this->messList[] = "ȷ�����벻��Ϊ��!";
					$result=false;
				}
			}
			if(!Validate::equal($_POST['user_pwd'],$_POST['user_confirm_pwd'])){
				$this->messList[] = "������ȷ�����벻һ��!";
				$result=false;
			}
			
			if($tmpField){
				foreach($tmpField as $var){
					if($var['is_must']){
						if(!Validate::required($_POST[$var['field_name']])){
							$this->messList[] =$var['field_show_name']."����Ϊ��!";
							$result=false;
						}
					} 
					if(strpos($_POST[$var['field_name']],"|")){
						$this->messList[] ="�зǷ��ַ����뻻Ϊȫ��!";
						$result=false;
					}
					
				}
			}
			return  $result;
		}	
		
		//��ȡ��Ա�ܸ���()
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