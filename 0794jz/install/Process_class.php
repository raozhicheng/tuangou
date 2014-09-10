<?php
	/*==================================================================*/
	/*		�ļ���:Process_class.php                            */
	/*		��Ҫ: ��װ�����࣬���ڸ�д�������´������ݿ�����ݱ�*/
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-01                                */
	/*		����޸�ʱ��:2009-05-01                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class  Process {
		private $configFile;
		private $sqlFile;
		private $info;
		//==========================================
		// ����: __construct($configFile="../config.inc.php", $sqlFile="lscms_db.sql")
		// ����: ���췽�����ڳ�ʹ������ĳ�Ա����
		// ����: configFile��ָ����Ҫ�޸ĵ������ļ���sqlFile����Ҫ��װ���ݱ��SQL����ļ� 
		// ����: ��
		//==========================================	
		function __construct($configFile="../config.inc.php", $sqlFile="lscms_db.sql"){
			$this->configFile=$configFile;
			$this->sqlFile=$sqlFile;
			$this->info="";
		}
		//==========================================
		// ����: configSYS($configArray)
		// ����: �����޸�ָ�������ļ��е�����
		// ����: configArray��Ҫ�������ļ����޸ĵ���������
		// ����: true��false
		//==========================================	
		function configSYS($configArray) {
			$configText = file_get_contents($this->configFile);
			$configArray["CMS_ROOT"]=$this->getRoot();
			$configArray["APP_PATH"]=$this->getAppPath();
			foreach($configArray as $key => $val) {
				$pattern[]='/define\(\"'.$key.'\",\s*.+\);/';
				$repContent[]='define("'.$key.'", "'.$val.'");';
			}
			$configText = preg_replace($pattern, $repContent, $configText);
			return file_put_contents($this->configFile, $configText);
		}
		//==========================================
		// ����: getRoot()
		// ����: ���ڻ�ȡϵͳ�ĸ����ڵľ���·��
		// ����: ��
		// ����: �����ڵľ���·��
		//==========================================	
		private function getRoot(){
			$rootPath=strtolower(str_replace('install/Process_class.php', '', str_replace('\\', '/', __FILE__)));
			return $rootPath;

		}
		//==========================================
		// ����: getAppPath()
		// ����: ���ڻ�ȡϵͳ��Ӧ��·��
		// ����: ��
		// ����: ϵͳ��Ӧ��·��
		//==========================================	
		private function getAppPath(){
			return str_replace(strtolower(str_replace('\\', '/', $_SERVER["DOCUMENT_ROOT"])),"",$this->getRoot());
		}
		//==========================================
		// ����:  createDb($user)
		// ����: ���ڴ���ϵͳ����Ҫ�����ݿ⡢������Լ���ӹ���Ա�û���һЩ�����Ĭ�ϼ�¼
		// ����: user���ڰ�װ������ָ���Ĺ���Ա�û���Ϣ
		// ����: true��false
		//==========================================			
		function createDb($user){
			$mysqli=new mysqli(DB_HOST, DB_USER, DB_PWD);	
			$ret=array();
			if(mysqli_connect_errno()) {
				$this->info.='<font color="red">����ʧ�ܣ�ԭ��Ϊ��'.mysqli_connect_error().'</font>';
				$mysqli=false;
				return false;
			}

			if($mysqli->query('create database if not exists '.DB_NAME)){
				$this->info.='�������ݿ�<b>'.DB_NAME.'</b>�ɹ���<br>';
			}else{
				$this->info.='<font color="red">�������ݿ�<b>'.DB_NAME.'</b>ʧ�ܣ�<font>';
				$mysqli->close();
				return false;
			}

			if($mysqli->select_db(DB_NAME)){
				$this->info.='���ݿ�<b>'.DB_NAME.'</b>ѡ��ɹ�<br>';
			}else{
				$this->info.='<font color="red">ѡ�����ݿ�<b>'.DB_NAME.'</b>ʧ�ܣ�<font>';
				$mysqli->close();
				return false;
			}
			$mysqli->query("SET NAMES 'GBK'");
			$sql=file_get_contents($this->sqlFile);
			$sql=str_replace("\r", "\n", str_replace('cms_', TAB_PREFIX.'cms_', $sql));
			$sql = preg_replace('/^\s*(?:--|#).*/m', '', $sql);
			$sql = preg_replace('/^\s*\/\*.*?\*\//ms', '', $sql);
			foreach(explode(";\n", trim($sql)) as $query) {
				if($query!=''){
					$result=$mysqli->query($query);
				}
				if(!$result){
					$this->info.='<font color="red">��ѯ���'.$query.'ִ��ʧ�ܣ�</font>';
					$mysqli->close();
					return false;
				} else{
					$this->info='�������ݿ�ɹ�����<br>';
				}
			}
			
			require "../class/Common.class.php";
			
			$insert="INSERT INTO ".TAB_PREFIX."cms_admin(adm_name, adm_password, status,is_delete,role_id,login_time,login_ip,is_default) VALUES('".$user["ADMIN_USER"]."', '".md5($user["ADMIN_PWD"])."','1','0','1','".Common::get_gmtime()."','".Common::get_ip()."','1')";
			
			if($mysqli->query($insert)){
				$this->info.='��ӹ���Ա�û�<b>'.$user["ADMIN_USER"].'</b>�ɹ���<br>';
			}else{
				$this->info.='<font color="red">��ӹ���Ա�û�<b>'.$user["ADMIN_USER"].'</b>ʧ�ܣ�<font>';
				$mysqli->close();
				return false;
			}
			
			$mysqli->close();
			return true;		
		}
		//==========================================
		// ����: getInstallInfo()
		// ����: ���ڰ�װ�����е���ʾ��Ϣ
		// ����: ��
		// ����: ���ذ�װ�����е���ʾ��Ϣ�ַ���
		//==========================================		
		function getInstallInfo(){
			return $this->info;
		}
	}
?>
