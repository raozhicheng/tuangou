<?php
	/*==================================================================*/
	/*		�ļ���:DealOrdersLog.class.php                           */
	/*		��Ҫ: �Ź���־������.                	       	    */
	/*		����: ����                                        */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DealOrdersLog extends BaseLogic{
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal_order_log";
				$this->fieldList=array("log_info","log_time","order_id","log_ip");
		}
		
		//==========================================
		// ����: write_log()
		// ����: д����־
		// ����: ��
		//==========================================
		public function write_log($info,$id){
			$log_time=Common::get_gmtime();
			$log_ip=Common::get_ip();
			$post=array("log_info"=>$info,
						"log_time"=>$log_time,
						"order_id"=>$id,
						"log_ip"=>$log_ip,
						);
			if($this->add($post)){
				return true;
			}else{
				return false;
			}
		}
		
		
		//==========================================
		// ����: delLogs($id)
		// ����: ����־�������վ��
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
			$sql="select * from {$this->tabName} order by id asc".$limit;
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
