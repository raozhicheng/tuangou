<?php
/*==================================================================*/
	/*		文件名:SmsList.class.php                              */
	/*		概要: 短信接口管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class SmsList extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_sms";
				$this->fieldList=array("name","description","class_name","server_url","user_name","password");
				$this->config_path=CMS_TEMP."/sms.temp.php";
		}
		
		
		//==========================================
		// 函数: modSmsList($post)
		// 功能: 用于向数据库中修改短信接口列表
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modSmsList($post) {
		
			$this->write_config($post);
			$post['password']=md5($post['password']);
			
			if($this->mod($post)){
				$this->messList[] = "修改成功！";
				return true;
			}else{
				$this->messList[] = "修改失败！";
				return false;
			}
		}
		
		public function read_config(){
			if (file_exists($this->config_path)){
				include($this->config_path);
				return $sms_config;
			} else {
				exit("缓存文件意外丢失，请到进入后台更新缓存！");
			}
		}
		
		private function write_config($arr){
			$content = "<?php\r\n";
			$content .= "\$sms_config = " . var_export($arr, true) . ";\r\n";
			$content .= "?>";
			file_put_contents($this->config_path, $content, LOCK_EX);
		}
		
		
		function sendSMS($uid,$pwd,$mobile,$content){
			$http = 'http://www.gysoft.cn/smspost/send.aspx';
			$data = array
				(
				'username'=>$uid,					//用户账号
				'password'=>$pwd,	                               //密码
				'mobile'=>$mobile,				//号码
				'content'=>$content      			//内容
				);
			$re= $this->postSMS($http,$data);			//POST方式提交
			if(substr($re,0,2) == 'OK') //返回结果为OK1表示成功1条，OK2 表示成功二条，以此类推
			{
				$this->messList[] = "发送成功！";
				return true;
			}
			else {
				$this->messList[] = "发送失败！";
				return false;   //返回错误的详细提示
			}
		}
		
		private function postSMS($url,$data=''){
			$row = parse_url($url);
			$host = $row['host'];
			$port = $row['port'] ? $row['port']:80;
			$file = $row['path'];
			while (list($k,$v) = each($data)) 
			{
				$post .= rawurlencode($k)."=".rawurlencode($v)."&";	//转URL标准码
			}
			$post = substr( $post , 0 , -1 );
			$len = strlen($post);
			$fp = @fsockopen( $host ,$port, $errno, $errstr, 10);
			if (!$fp) {
				return "$errstr ($errno)\n";
			} else {
			$receive = '';
			$out = "POST $file HTTP/1.1\r\n";
			$out .= "Host: $host\r\n";
			$out .= "Content-type: application/x-www-form-urlencoded\r\n";
			$out .= "Connection: Close\r\n";
			$out .= "Content-Length: $len\r\n\r\n";
			$out .= $post;		
			fwrite($fp, $out);
			while (!feof($fp)) {
				$receive .= fgets($fp, 128);
			}
			fclose($fp);
			$receive = explode("\r\n\r\n",$receive);
			unset($receive[0]);
			return implode("",$receive);
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
			if(!Validate::required($_POST['name'])){
				$this->messList[] = "接口名称不能为空!";
				$result=false;
			}
			if(!Validate::required($_POST['class_name'])){
				$this->messList[] = "接口类名不能为空!";
				$result=false;
			}
			if(!Validate::required($_POST['description'])){
				$this->messList[] = "描述不能为空!";
				$result=false;
			}
			if(!Validate::required($_POST['user_name'])){
				$this->messList[] = "用户名不能为空!";
				$result=false;
			}
			if(!Validate::required($_POST['password'])){
				$this->messList[] = "密码不能为空!";
				$result=false;
			}
		
			
			return  $result;
		}	
		
}
?>