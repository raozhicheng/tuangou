<?php
/*==================================================================*/
	/*		文件名:MailServer.class.php                              */
	/*		概要: 邮件服务器管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class MailServer extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_mail_server";
				$this->fieldList=array("smtp_server","smtp_name","smtp_pwd","is_ssl","smtp_port","use_limit","is_reset","status","total_use","is_verify","is_delete","is_default");
		}
		//==========================================
		// 函数: addMailServer($post)
		// 功能: 用于向数据库中添加邮件服务器列表
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addMailServer($post) {
			if($this->add($post)){
				$this->messList[] = "添加成功！";
				return true;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modMailServer($post)
		// 功能: 用于向数据库中修改邮件服务器列表
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modMailServer($post) {
			if($this->mod($post)){
				$this->messList[] = "修改成功！";
				return true;
			}else{
				$this->messList[] = "修改失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delMailServer($post)
		// 功能: 将分类放入回收站内
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================
		public function delMailServer($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delMailServers($id)
		// 功能: 将分类组放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delMailServers($id) {
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
		
				
		public function set_default($post) {
			$sql="update {$this->tabName} set is_default=0 where is_default=1";
			$result=$this->mysqli->query($sql);
			if($result && $this->mod($post)) {
				$this->messList[] = "更改服务器成功！";
				return true;
			} else {
				$this->messList[] = "更改失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: get_mailServer()
		// 功能: 获取分类列表
		// 参数: offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_mailServer($offset=0,$num=0){
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
		// 函数: send()
		// 功能: 发送邮件
		// 参数: id为当前服务器ID,address为发件人地址
		// 返回: false
		//==========================================
		public function send($getMailServer,$datas){
			require_once(APP_PATH.'phpmailer/class.phpmailer.php');
			$mail= new PHPMailer();
			$mail->SetLanguage("zh_cn");
    		$mail->CharSet ="GB2312";//设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    		$mail->IsSMTP(); // 设定使用SMTP服务
   			$mail->SMTPDebug  = 0;                     // 启用SMTP调试功能
                                           // 1 = errors and messages
                               // 2 = messages only
   			$mail->SMTPAuth   = $getMailServer['is_verify']?true:false;              // 启用 SMTP 验证功能
  			//$mail->SMTPSecure = "ssl";                 // 安全协议
   			$mail->Host       = $getMailServer['smtp_server'];      // SMTP 服务器
   			$mail->Port       = intval($getMailServer['smtp_port']);                   // SMTP服务器的端口号
   			$mail->Username   = $getMailServer['smtp_name'];  // SMTP服务器用户名
   			$mail->Password   = $getMailServer['smtp_pwd'];             // SMTP服务器密码
			$mail->From = $getMailServer['smtp_name']; //邮件发送者email地址 　　
			$mail->FromName = $datas['FromName']; 
    		$mail->Subject    = $datas['Subject'];
    		$mail->Body    =  $datas['Body']; 
			$mail->Encoding = "base64";
			$mail->AltBody ="text/html";
    		$mail->AddAddress($datas['address'],"");
			if(isset($datas['is_html'])){
				$datas['is_html']=$datas['is_html']?true:false;
			} else {
				$datas['is_html']=false;
			}
			$mail->IsHTML($datas['is_html']);
    		if(!$mail->Send()) {
				$this->messList[] = "邮件发送失败！".$mail->ErrorInfo;
       			return false;
    		} else {
				$this->messList[] = "邮件发送成功！";
       			return true;
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
			if(!Validate::required($_POST['smtp_server'])){
				$this->messList[] = "SMTP服务器地址不能为空!";
				$result=false;
			}
			if(!Validate::required($_POST['smtp_name'])){
				$this->messList[] = "服务器帐号不能为空!";
				$result=false;
			}
			if(!Validate::required($_POST['smtp_pwd'])){
				$this->messList[] = "服务器密码不能为空!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['total_use'])){
				$this->messList[] = "已用次数须为数字!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['use_limit'])){
				$this->messList[] = "可用次数须为数字!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['smtp_port'])){
				$this->messList[] = "端口号须为数字!";
				$result=false;
			}
			return  $result;
		}	
		
		public function get_default_server(){
				$sql_condition= "SELECT * FROM {$this->tabName} WHERE is_default = 1 and status=1 and ((use_limit > total_use and use_limit > 0) or (use_limit = 0))";
				$result=@$this->mysqli->query($sql);
				if(!$result){//把可以清零的默认服务器清零
					$sql_zero = "update {$this->tabName} set total_use = 0 where is_reset = 1 and status = 1 and use_limit <= total_use and use_limit > 0";
					$this->mysqli->query($sql_zero);
					$result=$this->mysqli->query($sql_condition);
				}
			
			

			if($result){
				return $result->fetch_assoc();
			}else{
				
				return $error_num;
			}
		}
		
		//获取总个数
		public function get_mailServer_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>