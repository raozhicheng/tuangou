<?php
/*==================================================================*/
	/*		�ļ���:DealMsgList.class.php                              */
	/*		��Ҫ: ҵ����й���     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DealMsgList extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal_msg_list";
				$this->fieldList=array("dest","send_type","content","send_time","is_send","create_time","user_id","result","is_success","is_html","title");
		}
		//==========================================
		// ����: addDealMsgList($post)
		// ����: ���������ݿ������ҵ������б�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addDealMsgList($post) {
			if($id=$this->add($post)){
				$this->dmlSend($post['send_type'],$id);
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modDealMsgList($post)
		// ����: ���������ݿ����޸�ҵ������б�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modDealMsgList($post) {
			if($this->mod($post)){
				$this->messList[] = "�޸ĳɹ���";
				return true;
			}else{
				$this->messList[] = "�޸�ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delInfo($id)
		// ����: ��ҵ������б�������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delDealMsgList($post){
			if($this->del($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		
		public function dmlSend($type,$id){
			if($type){  //�ʼ�
				$mail_server=new MailServer();
				$getMailServer=$mail_server->get_default_server();
				if($getMailServer){
					$datas_temp=$this->get($id);
					$datas=array("FromName"=>$datas_temp['title'],"Subject"=>$datas_temp['title'],"Body"=>$datas_temp['content'],"address"=>$datas_temp['dest']);
					$is_success=$mail_server->send($getMailServer,$datas)?1:0;
					
					$result=$mail_server->getMessList();
					$temp=array("is_success"=>$is_success,"result"=>$result,"send_time"=>Common::get_gmtime(),"id"=>$id);
					if($is_success){
						$this->mysqli->query("update ".TAB_PREFIX."cms_mail_server set total_use = total_use + 1 where id =".$getMailServer['id']);
						$temp=array("is_success"=>$is_success,"is_send"=>1,"result"=>$result,"send_time"=>Common::get_gmtime(),"id"=>$id);
					}
					$this->modDealMsgList($temp);
				} else{
							$result="��ǰ������״̬�ر�!";
				}
				
			} else {  //����
				$sms_list=new SmsList();
				$datas_temp=$this->get($id);
				$getSms=$sms_list->read_config();
				$is_success=$sms_list->sendSMS($getSms['user_name'],$getSms['password'],$datas_temp['dest'],$datas_temp['content'])?1:0;;
				$result=$sms_list->getMessList();
				$temp=array("is_success"=>$is_success,"result"=>$result,"send_time"=>Common::get_gmtime(),"id"=>$id);
				if($is_success){
					$temp=array("is_success"=>$is_success,"is_send"=>1,"result"=>$result,"send_time"=>Common::get_gmtime(),"id"=>$id);
				}
				$this->modDealMsgList($temp);
			}
			
			if($is_success){
				$this->messList[] = $result;
				return true;
			} else {
				$this->messList[] = $result;
				return false;
			}
		}
		
		
		//==========================================
		// ����: get_dealMsgList()
		// ����: ��ȡҵ������б�
		// ����: offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_dealMsgList($offset=0,$num=0){
			$limit="LIMIT {$offset}, {$num}";
			$sql="select * from {$this->tabName} order by id desc ".$limit;
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
		
		
		
		//��ȡ�ܸ���()
		public function get_dealMsgList_num(){
			$sql="select id from {$this->tabName}";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>