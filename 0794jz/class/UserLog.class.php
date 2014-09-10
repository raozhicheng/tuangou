<?php
/*==================================================================*/
	/*		�ļ���:UserLog.class.php                              */
	/*		��Ҫ: ��Ա��־����     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class UserLog extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_user_log";
				$this->fieldList=array("log_info","log_time","log_admin_id","log_user_id","money","score","user_id");
				
		}
		//==========================================
		// ����: addUserLog($post)
		// ����: ���������ݿ�����ӻ�Ա��־
		// ����: post���û��ڱ����ύ��ȫ����������
		// ����: true��false
		//==========================================	
		public function addUserLog($post) {
			if($this->add($post)){
				
				$this->messList[] = "��ӳɹ���";
				return $id;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		
		
		
		//==========================================
		// ����: delUserLog($id)
		// ����: ����Ա��־ֱ��ɾ��
		// ����: $post
		// ����: true��false
		//==========================================
		public function delUserLog($post){
			if($this->del($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modAccount()
		// ����: ��Ա�ʽ���ֱ仯��������
		// ����: data=>money,score,user_id msg
		// ����: ��
		//==========================================
		public function modAccount($data=array(),$msg){
			
			$user_data=TAB_PREFIX."cms_user";
			if(intval($data['score'])!=0){
				$this->mysqli->query("update ".$user_data." set score = score + ".intval($data['score'])." where id =".$data['user_id']);
			}
			if(floatval($data['money'])!=0){
				$this->mysqli->query("update ".$user_data." set money = money + ".floatval($data['money'])." where id =".$data['user_id']);
			}
			
			if(intval($data['score'])!=0||floatval($data['money'])!=0){
				
				$log_info['log_info'] = $msg;
				$log_info['log_time'] = Common::get_gmtime();
				$adm_session = $_SESSION[md5(AUTH_KEY)];
				$adm_id = intval($adm_session['id']);
				if($adm_id!=0){
					$log_info['log_admin_id'] = $adm_id;
				}else{
					$log_info['log_user_id'] = isset($_SESSION['user_id'])?intval($_SESSION['user_id']):0;
				}
				$log_info['money'] = floatval($data['money']);
				$log_info['score'] = intval($data['score']);
				$log_info['user_id'] = $data['user_id'];
				$this->addUserLog($log_info);
				
			}
		}
				
		
		
		//==========================================
		// ����: get_userLogs()
		// ����: ��ȡ��Ա��־
		// ����: offset:is_allΪ��Ļ�ƫ����,num:����,is_searchΪ�Ƿ��ѯ
		// ����: false���б�
		//==========================================
		public function get_userLogs($offset=0,$num=0,$user_id=0){
			if($offset!=0 || $num!=0){
				$limit=" LIMIT {$offset}, {$num}";
			} else{
				$limit="";
			}
			if(!$user_id){
				$sql="select * from {$this->tabName} order by log_time desc".$limit;
			} else {
				$sql="SELECT * from {$this->tabName} WHERE user_id={$user_id} order by log_time desc".$limit;
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
		
		
		//��ȡ��Ա��־����
		public function get_userLog_num($user_id){
			$sql="select id from {$this->tabName} where user_id={$user_id}";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>