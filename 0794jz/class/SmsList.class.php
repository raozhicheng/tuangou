<?php
/*==================================================================*/
	/*		�ļ���:SmsList.class.php                              */
	/*		��Ҫ: ���Žӿڹ���     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
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
		// ����: modSmsList($post)
		// ����: ���������ݿ����޸Ķ��Žӿ��б�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modSmsList($post) {
		
			$this->write_config($post);
			$post['password']=md5($post['password']);
			
			if($this->mod($post)){
				$this->messList[] = "�޸ĳɹ���";
				return true;
			}else{
				$this->messList[] = "�޸�ʧ�ܣ�";
				return false;
			}
		}
		
		public function read_config(){
			if (file_exists($this->config_path)){
				include($this->config_path);
				return $sms_config;
			} else {
				exit("�����ļ����ⶪʧ���뵽�����̨���»��棡");
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
				'username'=>$uid,					//�û��˺�
				'password'=>$pwd,	                               //����
				'mobile'=>$mobile,				//����
				'content'=>$content      			//����
				);
			$re= $this->postSMS($http,$data);			//POST��ʽ�ύ
			if(substr($re,0,2) == 'OK') //���ؽ��ΪOK1��ʾ�ɹ�1����OK2 ��ʾ�ɹ��������Դ�����
			{
				$this->messList[] = "���ͳɹ���";
				return true;
			}
			else {
				$this->messList[] = "����ʧ�ܣ�";
				return false;   //���ش������ϸ��ʾ
			}
		}
		
		private function postSMS($url,$data=''){
			$row = parse_url($url);
			$host = $row['host'];
			$port = $row['port'] ? $row['port']:80;
			$file = $row['path'];
			while (list($k,$v) = each($data)) 
			{
				$post .= rawurlencode($k)."=".rawurlencode($v)."&";	//תURL��׼��
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
		// ����: validateForm()
		// ����: ����ӵ����ݻ��޸ĵ����ݽ�����֤
		// ����: ��
		// ����: true��false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['name'])){
				$this->messList[] = "�ӿ����Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::required($_POST['class_name'])){
				$this->messList[] = "�ӿ���������Ϊ��!";
				$result=false;
			}
			if(!Validate::required($_POST['description'])){
				$this->messList[] = "��������Ϊ��!";
				$result=false;
			}
			if(!Validate::required($_POST['user_name'])){
				$this->messList[] = "�û�������Ϊ��!";
				$result=false;
			}
			if(!Validate::required($_POST['password'])){
				$this->messList[] = "���벻��Ϊ��!";
				$result=false;
			}
		
			
			return  $result;
		}	
		
}
?>