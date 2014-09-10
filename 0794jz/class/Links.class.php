<?php
/*==================================================================*/
	/*		�ļ���:Links.class.php                              */
	/*		��Ҫ:�������ӹ���    	       	    */
	/*		����: ����                                          */
	/*==================================================================*/
	class Links extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_links";
				$this->fieldList=array("name","address","status","img","sort");
		}
		
		private function uploadPic($fileUpload,$file){
			if($fileUpload->uploadFile($file["img"])<0){
				$this->messList[] = $fileUpload->getErrorMsg();
				return false;
			}else{
				$this->messList[] = "ͼƬ�ϴ��ɹ���";
				return true;
			}	
		}
		//==========================================
		// ����: addLinks($fileUpload,$post,$file)
		// ����: ���������ݿ����������������Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������,$fileUpload�ǵ���
		//		 FileUpload��,$file���ύ��ͼƬ
		// ����: true��false
		//==========================================	
		public function addLinks($fileUpload,$post,$file) {
				if($this->uploadPic($fileUpload,$file)){
					$post["img"]=$fileUpload->getNewFileName();
					if($this->add($post)){
						$this->messList[] = "����������ӳɹ���";
						return true;
					}else{
						$this->messList[] = "�����������ʧ�ܣ�";
						return false;
					}
				} else {
					$this->messList[] = "ͼƬ���ʧ�ܣ�";
					return false;
				}
			
		}
		
		//==========================================
		// ����: modLinks($fileUpload,$post,$file)
		// ����: ���������ݿ����޸�����������Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������,$fileUpload�ǵ���
		//		 FileUpload��,$file���ύ��ͼƬ
		// ����: true��false
		//==========================================	
		public function modLinks($fileUpload,$post,$file) {
			if($file['img']['name']){
				if($this->uploadPic($fileUpload,$file)){
					$post["img"]=$fileUpload->getNewFileName();
					if($this->mod($post)){
						$this->messList[] = "�޸��������ӳɹ���";
						return true;
					}else{
						$this->messList[] = "�޸���������ʧ�ܣ�";
						return false;
					}
				} else {
					$this->messList[] = "ͼƬ�޸�ʧ�ܣ�";
					return false;
				}
				
			} else {
				if($this->mod($post)){
					$this->messList[] = "�޸��������ӳɹ���";
					return true;
				}else{
					$this->messList[] = "�޸���������ʧ�ܣ�";
					return false;
				}
			}
			
		}
		
		//==========================================
		// ����: delLinks($post)
		// ����: ����������ֱ��ɾ��
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================
		public function delLinks($post){
			if($this->del($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
				
		
		
		//==========================================
		// ����: get_links($is_all=true,$offset=0,$num=0)
		// ����: ��ȡ���������б�
		// ����: is_all:�Ƿ���ȫ���г�,status:�Ƿ�ѡ����״̬,offset:ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_links($is_all=true,$status=false,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if($status){
				$sql="select * from {$this->tabName} where status=1 order by sort asc".$limit;
			} else {
				$sql="select * from {$this->tabName} order by sort asc".$limit;
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
				$this->messList[] = "�����������Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "�����������Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::required($_POST['address'])){
				$this->messList[] = "���ӵ�ַ����Ϊ��!";
				$result=false;
			}
			if($_POST['act']=="add"){
				if(!$_FILES['img']['size']){
					$this->messList[] = "ͼƬ����Ϊ��!";
					$result=false;
				}
			}
			
			if(!Validate::isNumber($_POST['sort'])){
				$this->messList[] = "�������Ϊ����!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//��ȡ���������ܸ���
		public function get_links_num(){
			$sql="select id from {$this->tabName} order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>