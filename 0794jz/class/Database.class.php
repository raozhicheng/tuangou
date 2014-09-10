<?php
	/*==================================================================*/
	/*		�ļ���:Database.class.php                             */
	/*		��Ҫ: ���ݿ������.                	       	    */
	/*		����: ����                                        */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Database extends BaseLogic{
		
		const BACKUP_PATH="../data/backup/";
		private $files_arr=array();
		private $tablesName=array();
		
		public function __construct(){
			parent:: __construct($showError);
		}
		
		public function get_backup_files($start=0,$num=0){
			if(!file_exists(self::BACKUP_PATH)){
				mkdir(self::BACKUP_PATH);
				return false;
			}
			if($dir_handle=@opendir(self::BACKUP_PATH)){
				while($filename=readdir($dir_handle)){
					$filePath=self::BACKUP_PATH.$filename;
					$time=filemtime($filePath);
					$filesize=Common::sizeCount(filesize($filePath));
					if(is_file($filePath)){
						$temp=array($filename,$filesize,date("Y-m-d H:i:s",$time));
						array_push($this->files_arr,$temp);
					}
				}
				return array_slice($this->files_arr,$start,$num);
			} else {
				return false;
			}
		}
		
		
		
		public function delDatabase($id){
			if(count($id)==0){
					$this->messList[] = "��ѡ����Ҫɾ�����ļ���";
					return false;
			} else{
				if(!is_array($id)){
					$filename=self::BACKUP_PATH.$id;
					if(@unlink($filename)){
						$this->messList[] = "ɾ���ɹ���";
						return true;
					}else{
						$this->messList[] = "ɾ��ʧ�ܣ�";
						return false;
					}
				} else {
					if($this->groupDel($id)){
						$this->messList[] = "����ɾ���ɹ���";
						return true;
					}else{
						$this->messList[] = "����ɾ��ʧ�ܣ�";
						return false;
					}
				}
			}
		}
		
		public function backup_database(){
			$add_time = date("Y-m-d H:i:s");
			$sql="";
			$sql.="--".APP_NAME.",Version��".VERSION."\r\n".
				  "--Mysql VERSION��".$this->getVersion()."\r\n".
				  "--Create time��".$add_time."\r\n";
			$this->getTablesName();
			
			
			foreach($this->tablesName as $var){
				$sql.= "DROP TABLE IF EXISTS `".TAB_PREFIX.$var."`;\r\n";
				$result=$this->mysqli->query("show create table {$var}"); 
				$row_struct=$result->fetch_assoc();
				$sql.= $row_struct['Create Table'].";\r\n";
				$row_data=$this->getTablesData($var);
				if(!$row_data){
					$this->messList[] = "���ݿ��ʧ�ܣ�";
					return false;
				} else {
					foreach((array)$row_data[1] as $var_data){
						$sql_data= "INSERT INTO `{$var}` VALUES (";
						foreach($var_data as $row){
							$sql_data.="'".addslashes($row)."',";
						}
						$sql_data=substr($sql_data,0,-1);  //ɾ�����һ������
						$sql_data.= ");\r\n";
						$sql.=$sql_data;
					}
					
				}
					
			}

			if($this->saveSqltoFile($sql)){
				$this->messList[] = "���ݳɹ���";
				return true;
			}else{
				$this->messList[] = "����ʧ�ܣ�";
				return false;
			}
		}
		
		public function restore($id){
			$mydb=new MyDB();
			$filename=self::BACKUP_PATH.$id;
			$handle=@fopen($filename,"rb");
			$head=@fread($handle,97);
			fclose($handle);
			$arr=$this->getSqlInfo($head);
			
			$sql=$this->removeComments(file_get_contents($filename));
			$sql = trim($sql);
			$sql = str_replace("\r", '', $sql);
       		$segmentSql = explode(";\n", $sql);
			foreach($segmentSql as $var){
				if($var!=''){
					$result=$this->mysqli->query($var);
				}
				if(!$result){
					$this->messList[] = "�ָ�����ʧ�ܣ�";
					return false;
				}
			}
			
			if($arr['cms_ver']!=VERSION){
				$this->messList[] = "�ָ�����ʧ�ܣ�ϵͳ�汾��һ�£�";
				return false;
			}elseif($arr['mysql_ver']!=$mydb->getVersion()){
				$this->messList[] = "�ָ�����ʧ�ܣ����ݿ�汾��һ�£�";
				return false;
			}else{
				$this->messList[] = "�ָ����ݳɹ���";
				return true;
			}
		}
		
		 private function removeComments($sql){
			/* ɾ��SQL��ע�ͣ���ע�Ͳ�ƥ�任�з� */
			$sql = preg_replace('/^\s*(?:--|#).*/m', '', $sql);
	
			/* ɾ��SQL��ע�ͣ�ƥ�任�з�����Ϊ��̰��ƥ�� */
			//$sql = preg_replace('/^\s*\/\*(?:.|\n)*\*\//m', '', $sql);
			$sql = preg_replace('/^\s*\/\*.*?\*\//ms', '', $sql);
	
			return $sql;
   		 }
		
		private function getSqlInfo($head){
			$file_info = array('cms_ver'=>'', 'mysql_ver'=> '', 'add_time'=>'');
			$head=str_replace("--","",$head);
			$arr = explode("\n", $head);
			foreach($arr as $var){
				$temp = explode("��", $var);
				switch($temp[0]){
					case '�����Ź�CMS,Version':
						$file_info['cms_ver']=trim($temp[1]);
					break;
					case 'Mysql VERSION':
						$file_info['mysql_ver']=trim($temp[1]);
					break;
					case 'Create time':
						$file_info['add_time']=trim($temp[1]);
					break;
				}
			}
			return $file_info;
		}
		private function getTablesData($tabName){
			$allData=array();
			$sql="select * from {$tabName}";
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
						$temp[]=$row;
						
				}
				
			}
			//$num=$result->num_rows;
			array_push($allData,$num,$temp);
			return $allData;
		}
		
		private function getTablesName(){ 
         	$result=$this->mysqli->query("show table status"); 
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){ 
	             $this->tablesName[]=$row["Name"]; 
           		} 
				 return $this->tablesName; 
			}
        } 
		
		private function saveSqltoFile($sql_text){
			 $fileName=self::BACKUP_PATH.time().".sql"; 
			 if(file_exists($fileName)) { 
             	unlink($fileName); 
             } 
             $fp=fopen($fileName,"w+"); 
             if(fwrite($fp,$sql_text)){
				 return true;
			 } else {
				 return false;
			 }

		}
		
		private function groupDel($arr){
			foreach($arr as $var){
				$tmp=self::BACKUP_PATH.$var;
				if(!@unlink($tmp)){
					return false;
				}
			}
			return true;
		}
		
		public function get_database_num(){
			$arr = scandir(self::BACKUP_PATH); 
			$all = count($arr)-2;//�����ļ�������./��../ 
			$sql = count(preg_grep("/\.sql$/", $arr));
			return $sql;
		}
		
	}
?>