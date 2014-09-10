<?php
/*==================================================================*/
	/*		�ļ���:Infos.class.php                              */
	/*		��Ҫ: ��Ϣ����     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Infos extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_infos";
				$this->fieldList=array("title","content","cate_id","create_time","update_time","add_admin_id","status","rel_url","update_admin_id","is_delete","click_count","sort","seo_title","seo_keyword","seo_description");
		}
		//==========================================
		// ����: addInfos($post)
		// ����: ���������ݿ�����ӷ�����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addInfos($post) {
			$post["content"]=stripslashes($post["content"]);
			$post["add_admin_id"]=$_SESSION[md5(AUTH_KEY)]['id'];
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modInfos($post)
		// ����: ���������ݿ����޸ķ�����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modInfos($post) {
			$post["content"]=stripslashes($post["content"]);
			$post["update_admin_id"]=$_SESSION[md5(AUTH_KEY)]['id'];
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
		// ����: ������������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delInfo($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delInfos($id)
		// ����: ��������������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delInfos($id) {
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
		// ����: get_Infos()
		// ����: ��ȡ�����б�
		// ����: is_all:�Ƿ���ȫ���г�,offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_infos($is_all=true,$status=false,$id=false,$pid=false,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if($id){
				$id="and id='{$id}'";
			} else {
				$id="";
			}
			if($pid){
				$pid=" and cate_id='{$pid}'";
			} else {
				$pid="";
			}
			if($status){
				$sql="select * from {$this->tabName} where is_delete!=1 and status=1 ".$id.$pid." order by sort asc".$limit;
			} else {
				$sql="select * from {$this->tabName} where is_delete!=1 ".$id.$pid." order by sort asc".$limit;
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
			if(!Validate::required($_POST['title'])){
				$this->messList[] = "�������Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['title'], 80)) {
				$this->messList[] = "�������Ʋ��ܳ���40���ַ�!";
				$result=false;
			}
			if(!Validate::required($_POST['sort'])){
				$this->messList[] = "������Ϊ��!";
				$result=false;
			}
			if(!Validate::required($_POST['content'])) {
				$this->messList[] = "��ϸ���ݲ���Ϊ��!";
				$result=false;
			}
			if(!Validate::noZero($_POST['cate_id'])){
				$this->messList[] = "��ѡ�����!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['sort'])){
				$this->messList[] = "�������Ϊ����!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//��ȡδɾ�����ܸ���()
		public function get_infos_num(){
			$sql="select id from {$this->tabName} where is_delete=0";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>