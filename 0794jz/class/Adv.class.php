<?php
/*==================================================================*/
	/*		�ļ���:Adv.class.php                              */
	/*		��Ҫ: �Ź�������    	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Adv extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_adv";
				$this->fieldList=array("name","location","code","status","begin_time","end_time");
		}
		
		
		//==========================================
		// ����: addAdv($post)
		// ����: ���������ݿ�����ӹ����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addAdv($post) {
		
			if($post['begin_time']==""){
				$post['begin_time']=0;
			} else {
				$post['begin_time']=strtotime($post['begin_time']);
			}
			
			if($post['end_time']==""){
				$post['end_time']=0;
			} else {
				$post['end_time']=strtotime($post['end_time']);
			}
				
				
				if($this->add($post)){
					$this->messList[] = "��ӹ��ɹ���";
					return true;
				}else{
					$this->messList[] = "��ӹ��ʧ�ܣ�";
					return false;
				}
		}
		
		//==========================================
		// ����: modAdv($post)
		// ����: ���������ݿ����޸Ĺ����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modAdv($post) {
				if($post['begin_time']==""){
					$post['begin_time']=0;
				} else {
					$post['begin_time']=strtotime($post['begin_time']);
				}
				
				if($post['end_time']==""){
					$post['end_time']=0;
				} else {
					$post['end_time']=strtotime($post['end_time']);
				}
				if($this->mod($post)){
					$this->messList[] = "�޸Ĺ��ɹ���";
					return true;
				}else{
					$this->messList[] = "�޸Ĺ��ʧ�ܣ�";
					return false;
				}
			
		}
		
		//==========================================
		// ����: delAdv($post)
		// ����: �����ֱ��ɾ��
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================
		public function delAdv($post){
			if($this->del($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
				
		
		
		//==========================================
		// ����: get_advs($is_all=true,$offset=0,$num=0)
		// ����: ��ȡ����б�
		// ����: is_all:�Ƿ���ȫ���г�,status:�Ƿ�ѡ����״̬,offset:ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_advs($is_all=true,$status=false,$id='all',$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$current_time=Common::get_gmtime();
			if($status){
				$s="where status=1 and (begin_time<{$current_time} and end_time>={$current_time})";
			} else {
				$s="where 1=1";
			}
			if($id=="all"){
				$sql="select * from {$this->tabName} ".$s." order by id desc".$limit;
			} else {
				$sql="select * from {$this->tabName} ".$s." and id='".$id."' order by id desc".$limit;
			}
			$result=$this->mysqli->query($sql);
			if($result){
				while($row=$result->fetch_assoc()){
					$temp[]=$row;
				}
				if(count($temp)==0){
					return false;
				} else {
					return $temp;
				}
			}
			return false;
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
				$this->messList[] = "������Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "������Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			
			if(!Validate::checkTime($_POST['begin_time'],$_POST['end_time'])) {
				$this->messList[] = "��ʼʱ�䲻�ܴ��ڵ��ڽ���ʱ��!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//��ȡ����ܸ���
		public function get_advs_num(){
			$sql="select id from {$this->tabName} order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>