<?php
/*==================================================================*/
	/*		�ļ���:Message.class.php                              */
	/*		��Ҫ: ���Թ���     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Message extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_message";
				$this->fieldList=array("title","content","create_time","update_time","admin_reply","admin_id","group_id","user_id","is_member","city_id","is_delete");
		}
		//==========================================
		// ����: addMessage($post)
		// ����: ���������ݿ����������
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addMessage($post) {
			$post["admin_reply"]=stripslashes($post["admin_reply"]);
			$post["admin_id"]=$_SESSION[md5(AUTH_KEY)]['id'];
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modMessage($post)
		// ����: ���������ݿ����޸�����
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modMessage($post) {
			$post["admin_reply"]=stripslashes($post["admin_reply"]);
			$post["admin_id"]=$_SESSION[md5(AUTH_KEY)]['id'];
			if($this->mod($post)){
				$this->messList[] = "�ظ��ɹ���";
				return true;
			}else{
				$this->messList[] = "�ظ�ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delMessage($id)
		// ����: �����Է������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delMessage($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delMessages($id)
		// ����: �����Է������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delMessages($id) {
			if(count($id)==0){
				$this->messList[] = "��ѡ����Ҫɾ���ķ��࣡";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1 WHERE id ";
			if(is_array($id)) {
				$sql .= "IN (" . join(",", $id) . ")";

			}else{
				$sql .= "= $id";
			}

			if($this->mysqli->query($sql)){
				$this->messList[] = "����ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "����ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
				
		
		
		//==========================================
		// ����: get_messages()
		// ����: ��ȡ����
		// ����: is_all:�Ƿ���ȫ���г�,offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_messages($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where is_delete=0 order by id asc".$limit;
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
		
		
		
		public function get_front_messages($deal_id=0,$city_id=0,$user_id=0,$group_info=array(),$offset=0,$num=0){
			$condition="";
			if($offset!=0 || $num!=0){
				$limit=" LIMIT {$offset}, {$num}";
			} else{
				$limit="";
			}
			if($deal_id){
				$condition.= " and group_id = '".$group_info[0]['id']."' and rel_id = ".$deal_id;
			}else{
				$condition.= " and group_id = '".$group_info[0]['id']."'";
			}
			if($city_id){
				$all=$this->getAll("select id,pid from ".TAB_PREFIX."cms_city where status=1");
				$arr=$this->get_child_datas($city_id,$all);
				$condition.=" and city_id in (".implode(",",$arr).")";
			}
			
			if(!Common::get_config("MSG_AUTO_EFFECT")){
				$condition.= " and user_id = ".$user_id;
			}else {
				if($group_info[0]['is_member']){
					$condition.= " and user_id = ".$user_id;
				}
			}
			$sql="select * from {$this->tabName} where is_delete=0".$condition." order by create_time desc".$limit;
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
		
		
		
		/*ȡ���Ӽ����γ�����*/
		private function get_child_datas($id=0,$datas=array(),$ids=array()){
			$ids[]=$id;
			foreach($datas as $value){
				if($value['pid']==$id){
					return $this->get_child_datas($value['id'],$datas,$ids);
				}
			}
			return $ids;
		}
		
		//==========================================
		// ����: validateForm()
		// ����: ����ӵ����ݻ��޸ĵ����ݽ�����֤
		// ����: ��
		// ����: true��false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['admin_reply'])){
				$this->messList[] = "�ظ����ݲ���Ϊ��!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//��ȡ�����ܸ���()
		public function get_message_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>