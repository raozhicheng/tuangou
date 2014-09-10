<?php
	/*==================================================================*/
	/*		�ļ���:LogAction.class.php                           */
	/*		��Ҫ: ��־������.                	       	    */
	/*		����: ����                                        */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class LogAction extends BaseLogic{
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_log";
				$this->fieldList=array("log_info","log_time","admin_id","admin_name","log_ip","status","module");
		}
		
		//==========================================
		// ����: write_log()
		// ����: д����־
		// ����: ��
		//==========================================
		public function write_log($status,$module,$action=""){
			if(Common::get_config("ADMIN_LOG")){
				$status_str=$status?"�ɹ�":"ʧ��";
				$adm_session = $_SESSION[md5(AUTH_KEY)];
				$log_info=$this->get_module($module);
				$log_info=$log_info["name"].$action.$status_str;
				$log_time=Common::get_gmtime();
				$admin_id=intval($adm_session['id']);
				$admin_name=$adm_session['admin'];
				$log_ip=Common::get_ip();
				$post=array("log_info"=>$log_info,
							"log_time"=>$log_time,
							"admin_id"=>$admin_id,
							"admin_name"=>$admin_name,
							"log_ip"=>$log_ip,
							"status"=>$status,
							"module"=>$module
							);
				if($this->add($post)){
					return true;
				}else{
					return false;
				}
			}
		}
		
		private function get_module($module){
			$moduleDB=TAB_PREFIX."cms_role_module";
			$sql = "SELECT name FROM {$moduleDB} WHERE module='{$module}'";
			$result=$this->mysqli->query($sql);
			if($result && $result->num_rows ==1){
				return $result->fetch_assoc();
			}else{
				return false;
			}
		}
		
		//==========================================
		// ����: delLogs($id)
		// ����: ����Ӧ�̷������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delLogs($post){
			if($this->del($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		
		//==========================================
		// ����: get_logs()
		// ����: ��ȡ��־�б�
		// ����: offset:ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_logs($offset=0,$num=0){
			$limit=" LIMIT {$offset}, {$num}";
			$sql="select * from {$this->tabName} order by id desc".$limit;
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
		
		

		//��ȡ��־�ܸ���
		public function get_logs_num(){
			$sql="select id from {$this->tabName}";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
?>
