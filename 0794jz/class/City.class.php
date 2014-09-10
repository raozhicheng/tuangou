<?php
/*==================================================================*/
	/*		�ļ���:City.class.php                              */
	/*		��Ҫ: ���з���      	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class City extends BaseLogic {
		private $city_list=array();
		private $city_num;
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_city";
				$this->fieldList=array("name","uname","pid","status","is_open","description","notice","seo_title","seo_keyword","seo_description","is_delete","is_default");
		}
		//==========================================
		// ����: addCity($post)
		// ����: ���������ݿ�����ӳ�����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addCity($post) {
			$post["description"]=stripslashes($post["description"]);
			$post["notice"]=stripslashes($post["notice"]);
			if($id=$this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return $id;
			}else{
				$this->messList[] = "���ʧ��,���ܳ��������ظ���";
				return false;
			}
		}
		
		//==========================================
		// ����: modCity($post)
		// ����: ���������ݿ����޸ĳ�����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modCity($post) {
			$post["description"]=stripslashes($post["description"]);
			$post["notice"]=stripslashes($post["notice"]);
			if($this->mod($post)){
				$this->messList[] = "�޸ĳɹ���";
				return true;
			}else{
				$this->messList[] = "�޸�ʧ��,���ܳ��������ظ���";
				return false;
			}
		}
		
		//==========================================
		// ����: delCity($id)
		// ����: �����з������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delCity($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delCities($id)
		// ����: ��������������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delCities($id) {
			if(count($id)==0){
				$this->messList[] = "��ѡ����Ҫɾ���ĳ��У�";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1,is_default=0 WHERE id ";
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
		
		public function set_Default($post) {
			$sql="update {$this->tabName} set is_default=0 where is_default=1";
			$result=$this->mysqli->query($sql);
			if($result && $this->mod($post)) {
				$this->messList[] = "���ĳ���Ĭ��ֵ�ɹ���";
				return true;
			} else {
				$this->messList[] = "����ʧ�ܣ�";
				return false;
			}
		}
		
		public function get_current_city(){
			
			/*$ip=Common::get_ip();
			$location=new Location();
			$address=$location->getaddress($ip);
			$city_list=$this->get_city_list("all",$is_open=1);
			foreach($city_list as $city){
				if(strpos($address['area1'],$city['name'])){
					$deal_city = $city;
					break;
				}
			}
			*/
			if(!$deal_city){
			
				if(!$_GET['city']){
					$sql="select * from {$this->tabName} where is_delete!=1 and status=1 and is_open=1 and is_default=1";
				} else {
					$sql="select * from {$this->tabName} where is_delete!=1 and status=1 and is_open=1 and uname='".$_GET['city']."'";
				}
				$result=$this->mysqli->query($sql);
				if($result && $result->num_rows ==1){
					
					return $result->fetch_assoc();;
				}else{
					return false;
				}
			} else {
				return $deal_city;
			}
		}
		//��ȡ�����б�
		public function get_city_list($id,$is_open=1,$is_sort=0){
			if($id=='all'){
				$condition.="";
			} else {
				$condition.=" and pid={$id}";
			}
			$sql="select * from {$this->tabName} where is_delete!=1 and status=1 and is_open={$is_open}".$condition;
			$result=$this->mysqli->query($sql);
			while($row=$result->fetch_assoc()){
				
				$temp[]=$row;
			}
			if($is_sort){
				return $this->sort_cities($temp);
				 
			} else {
				return $temp;
			}
		}
		
		//==========================================
		// ����: get_cities()
		// ����: ��ȡ�����б�
		// ����: is_delete:�Ƿ�Ϊ��ɾ��,is_all:�Ƿ���ȫ���г�,offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_cities($is_delete=false,$is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if(!$is_delete){
				$sql="select * from {$this->tabName} where is_delete!=1 order by id desc".$limit;
			} else {
				$sql="select * from {$this->tabName} order by id desc".$limit;
			}
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
						$temp[]=$row;
				}
				if(count($temp)!=0){
					$this->sort_cities($temp);
					return $this->city_list;
				}
				return $temp;
			}
		}
		
		//��������������б�
		private function sort_cities($array,$pid=0,$level=0){
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
					$this->city_list[]=$value;
					$this->sort_cities($array,$value["id"],$level+1);
				}
		
			}
			return $this->city_list;
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
			if(!Validate::required($_POST['uname'])){
				$this->messList[] = "URL���Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['notice'], 300)) {
				$this->messList[] = "���й��治�ܳ���300���ַ�!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['seo_title'], 30)) {
				$this->messList[] = "�������߲��ܳ���30���ַ�!";
				$result=false;
			}
			if(!Validate::required($_POST['description'])) {
				$this->messList[] = "����˵������Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['seo_keyword'], 20)){
				$this->messList[] = "�ؼ��ֲ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::required($_POST['notice'])) {
				$this->messList[] = "���й��治��Ϊ��!";
				$result=false;
			}
			return  $result;
		}	
		
		//��ȡ�����ܸ���(false=δɾ��,true=��ɾ��)
		public function get_city_num($is_delete=false){
			if(!$is_delete){
				$sql="select * from {$this->tabName} where is_delete!=1 order by id desc";
			} else {
				$sql="select * from {$this->tabName} order by id desc";
			}
			$result=$this->mysqli->query($sql);
			$this->city_num=$result->num_rows;
			return $this->city_num;
		}
	}
	
?>