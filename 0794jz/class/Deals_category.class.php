<?php
/*==================================================================*/
	/*		�ļ���:Deals_category.class.php                              */
	/*		��Ҫ: �Ź��������     	       	    */
	/*		����: ����                                          */
	/*==================================================================*/
	class Deals_category extends BaseLogic {
		private $category_list=array();
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal_category";
				$this->fieldList=array("name","brief","pid","is_delete","status","sort");
		}
		//==========================================
		// ����: addCategory($post)
		// ����: ���������ݿ�����ӷ�����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addCategory($post) {
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modCategory($post)
		// ����: ���������ݿ����޸ķ�����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modCategory($post) {
			if($this->mod($post)){
				$this->messList[] = "�޸ĳɹ���";
				return true;
			}else{
				$this->messList[] = "�޸�ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delCategory($id)
		// ����: ������������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delCategory($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delCategories($id)
		// ����: ��������������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delCategories($id) {
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
		// ����: get_category()
		// ����: ��ȡ�����б�
		// ����: is_delete:�Ƿ�Ϊ��ɾ��,is_all:�Ƿ���ȫ���г�,offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_category($is_all=true,$sort=true,$id="all",$status=false,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if($status){
				$s="and status=1";
			} else {
				$s="";
			}
			if($id=="all"){
				$sql="select * from {$this->tabName} where is_delete=0 ".$s." order by sort asc".$limit;
			} else {
				$sql="select * from {$this->tabName} where is_delete=0 ".$s." and pid='".$id."' order by sort asc".$limit;
			}
			$result=$this->mysqli->query($sql);
			while($row=$result->fetch_assoc()){
					$temp[]=$row;
			}
			if(count($temp)==0){
				return false;
			} else {
				if($sort){
					return $this->sort_cate($temp);
					
				} else {
					return $temp;
				}
			}
		}
		
		//�����������б�
		private function sort_cate($array,$pid=0,$level=0){
			$data=array();
			foreach($array as $value){
				if($value["pid"]==$pid){
					array_push($data,$value);
				}
			}
			if(!empty($data)){
				foreach($data as $value){
					if($value["pid"]!=0){
						$value["name"]=str_repeat('&nbsp;',$level*3).'��'.$value["name"];
					} 
					$this->category_list[]=$value;
					$this->sort_cate($array,$value["id"],$level+1);
				}
		
			}
			return $this->category_list;
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
		
		//��ȡ�����ܸ���
		public function get_cate_num(){
			$sql="select * from {$this->tabName} where is_delete=0 order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>