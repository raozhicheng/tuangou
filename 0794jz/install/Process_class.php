<?php
	/*==================================================================*/
	/*		文件名:Process_class.php                            */
	/*		概要: 安装处理类，用于改写配置文章创建数据库和数据表*/
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-01                                */
	/*		最后修改时间:2009-05-01                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class  Process {
		private $configFile;
		private $sqlFile;
		private $info;
		//==========================================
		// 函数: __construct($configFile="../config.inc.php", $sqlFile="lscms_db.sql")
		// 功能: 构造方法用于初使化对象的成员属性
		// 参数: configFile是指定需要修改的配置文件，sqlFile是需要安装数据表的SQL语句文件 
		// 返回: 无
		//==========================================	
		function __construct($configFile="../config.inc.php", $sqlFile="lscms_db.sql"){
			$this->configFile=$configFile;
			$this->sqlFile=$sqlFile;
			$this->info="";
		}
		//==========================================
		// 函数: configSYS($configArray)
		// 功能: 用于修改指定配置文件中的内容
		// 参数: configArray需要在配置文件中修改的内容数组
		// 返回: true或false
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
		// 函数: getRoot()
		// 功能: 用于获取系统的根所在的绝对路径
		// 参数: 无
		// 返回: 根所在的绝对路径
		//==========================================	
		private function getRoot(){
			$rootPath=strtolower(str_replace('install/Process_class.php', '', str_replace('\\', '/', __FILE__)));
			return $rootPath;

		}
		//==========================================
		// 函数: getAppPath()
		// 功能: 用于获取系统的应用路径
		// 参数: 无
		// 返回: 系统的应用路径
		//==========================================	
		private function getAppPath(){
			return str_replace(strtolower(str_replace('\\', '/', $_SERVER["DOCUMENT_ROOT"])),"",$this->getRoot());
		}
		//==========================================
		// 函数:  createDb($user)
		// 功能: 用于创建系统所需要的数据库、数表表，以及添加管理员用户和一些分类的默认记录
		// 参数: user是在安装界面中指定的管理员用户信息
		// 返回: true或false
		//==========================================			
		function createDb($user){
			$mysqli=new mysqli(DB_HOST, DB_USER, DB_PWD);	
			$ret=array();
			if(mysqli_connect_errno()) {
				$this->info.='<font color="red">连接失败，原因为：'.mysqli_connect_error().'</font>';
				$mysqli=false;
				return false;
			}

			if($mysqli->query('create database if not exists '.DB_NAME)){
				$this->info.='创建数据库<b>'.DB_NAME.'</b>成功！<br>';
			}else{
				$this->info.='<font color="red">创建数据库<b>'.DB_NAME.'</b>失败！<font>';
				$mysqli->close();
				return false;
			}

			if($mysqli->select_db(DB_NAME)){
				$this->info.='数据库<b>'.DB_NAME.'</b>选择成功<br>';
			}else{
				$this->info.='<font color="red">选择数据库<b>'.DB_NAME.'</b>失败！<font>';
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
					$this->info.='<font color="red">查询语句'.$query.'执行失败！</font>';
					$mysqli->close();
					return false;
				} else{
					$this->info='建立数据库成功！！<br>';
				}
			}
			
			require "../class/Common.class.php";
			
			$insert="INSERT INTO ".TAB_PREFIX."cms_admin(adm_name, adm_password, status,is_delete,role_id,login_time,login_ip,is_default) VALUES('".$user["ADMIN_USER"]."', '".md5($user["ADMIN_PWD"])."','1','0','1','".Common::get_gmtime()."','".Common::get_ip()."','1')";
			
			if($mysqli->query($insert)){
				$this->info.='添加管理员用户<b>'.$user["ADMIN_USER"].'</b>成功！<br>';
			}else{
				$this->info.='<font color="red">添加管理员用户<b>'.$user["ADMIN_USER"].'</b>失败！<font>';
				$mysqli->close();
				return false;
			}
			
			$mysqli->close();
			return true;		
		}
		//==========================================
		// 函数: getInstallInfo()
		// 功能: 用于安装过程中的提示信息
		// 参数: 无
		// 返回: 返回安装过程中的提示信息字符串
		//==========================================		
		function getInstallInfo(){
			return $this->info;
		}
	}
?>
