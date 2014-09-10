<?php
/*==================================================================*/
	/*		�ļ���:Info_category.class.php                              */
	/*		��Ҫ: ��Ϣ�������     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Info_category extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_info_cate";
				$this->fieldList=array("name","status","is_delete","type","sort");
		}
		//==========================================
		// ����: addInfoCategory($post)
		// ����: ���������ݿ�����ӷ�����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addInfoCategory($post) {
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modInfoCategory($post)
		// ����: ���������ݿ����޸ķ�����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modInfoCategory($post) {
			if($this->mod($post)){
				$this->messList[] = "�޸ĳɹ���";
				return true;
			}else{
				$this->messList[] = "�޸�ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delInfoCategory($id)
		// ����: ������������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delInfoCategory($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delInfoCategories($id)
		// ����: ��������������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delInfoCategories($id) {
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
		// ����: get_infoCategory()
		// ����: ��ȡ�����б�
		// ����: is_all:�Ƿ���ȫ���г�,status:�Ƿ�ѡ����״̬,offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_infoCategory($is_all=true,$status=false,$type="all",$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if($type=="all"){
				$type="";
			} else {
				$type="and type='{$type}'";
			}
			if($status){
				$sql="select * from {$this->tabName} where is_delete!=1 and status=1 ".$type." order by sort asc".$limit;
			} else {
				$sql="select * from {$this->tabName} where is_delete!=1 ".$type." order by sort asc".$limit;
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
		
		
		//==========================================
		// ����: validateForm()
		// ����: ����ӵ����ݻ��޸ĵ����ݽ�����֤
		// ����: ��
		// ����: true��false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['name'])){
				$this->messList[] = "�������Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "�������Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::required($_POST['sort'])){
				$this->messList[] = "������Ϊ��!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['sort'])){
				$this->messList[] = "�������Ϊ����!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//��ȡ�����ܸ���()
		public function get_cate_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>