<?php
/*==================================================================*/
	/*		�ļ���:Templates.class.php                              */
	/*		��Ҫ:ģ�����    	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Templates extends BaseLogic {
		
		private $tempDir="../templates/";
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_templates";
				$this->fieldList=array("name","style","is_default","preview","is_delete");
		}
		
		private function uploadPic($fileUpload,$file){
			if($fileUpload->uploadFile($file["preview"])<0){
				$this->messList[] = $fileUpload->getErrorMsg();
				return false;
			}else{
				$this->messList[] = "ͼƬ�ϴ��ɹ���";
				return true;
			}	
		}
		//==========================================
		// ����: addTemplates($fileUpload,$post,$file)
		// ����: ���������ݿ������ģ����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������,$fileUpload�ǵ���
		//		 FileUpload��,$file���ύ��ͼƬ
		// ����: true��false
		//==========================================	
		public function addTemplates($fileUpload,$post,$file) {
				if($this->uploadPic($fileUpload,$file)){
					$post["preview"]=$fileUpload->getNewFileName();
					if($this->add($post)){
						$this->messList[] = "���ģ��ɹ���";
						return true;
					}else{
						$this->messList[] = "���ģ��ʧ�ܣ�";
						return false;
					}
				} else {
					$this->messList[] = "ͼƬ���ʧ�ܣ�";
					return false;
				}
			
		}
		
		//==========================================
		// ����: modTemplates($fileUpload,$post,$file)
		// ����: ���������ݿ����޸�ģ����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������,$fileUpload�ǵ���
		//		 FileUpload��,$file���ύ��ͼƬ
		// ����: true��false
		//==========================================	
		public function modTemplates($fileUpload,$post,$file) {
			if($file['preview']['name']){
				if($this->uploadPic($fileUpload,$file)){
					$post["preview"]=$fileUpload->getNewFileName();
					if($this->mod($post)){
						$this->messList[] = "�޸�ģ��ɹ���";
						return true;
					}else{
						$this->messList[] = "�޸�ģ��ʧ�ܣ�";
						return false;
					}
				} else {
					$this->messList[] = "ͼƬ�޸�ʧ�ܣ�";
					return false;
				}
				
			} else {
				if($this->mod($post)){
					$this->messList[] = "�޸�ģ��ɹ���";
					return true;
				}else{
					$this->messList[] = "�޸�ģ��ʧ�ܣ�";
					return false;
				}
			}
			
		}
		
		//==========================================
		// ����: delTemplates($post)
		// ����: ��ģ���������վ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================
		public function delTemplate($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		
		//==========================================
		// ����: delTemplates($id)
		// ����: ��ģ����������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delTemplates($id) {
			if(count($id)==0){
				$this->messList[] = "��ѡ����Ҫɾ���ĳ��У�";
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
		// ����: set_Default($post)
		// ����: ����ģ��Ϊ��ǰģ��
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function set_Default($post) {
			$sql="update {$this->tabName} set is_default=0 where is_default=1";
			$result=$this->mysqli->query($sql);
			if($result && $this->mod($post)) {
				$this->messList[] = "����ģ��Ĭ��ֵ�ɹ���";
				return true;
			} else {
				$this->messList[] = "����ģ��Ĭ��ֵʧ�ܣ�";
				return false;
			}
		}
		
		public function get_default() {
			$temp=$this->get_other_datas("cms_templates","style","is_default",1);
			return $temp[0]['style'];
		}
		
		
		//==========================================
		// ����: get_Templates($is_all=true,$offset=0,$num=0)
		// ����: ��ȡģ���б�
		// ����: is_all:�Ƿ���ȫ���г�,offset:ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_Templates($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where is_delete=0 order by id desc".$limit;
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
		// ����: hasDir($dir)
		// ����: �Ƿ����ģ��Ŀ¼
		// ����: $dirĿ¼����
		// ����: false��true
		//==========================================
		
		public function hasDir($dir){
			$fullPath=$this->tempDir.$dir;
			if(file_exists($fullPath)){
				return true;
			} else {
				return false;
			}
		}
		
		//==========================================
		// ����: createDir($dir)
		// ����: �½�ģ��Ŀ¼
		// ����: $dirĿ¼����
		// ����: false��true
		//==========================================
		
		public function createDir($dir){
			$fullPath=$this->tempDir.$dir;
			if(mkdir($fullPath)){
				$this->messList[] = "����ģ��Ŀ¼�ɹ���";
				return true;
			} else {
				$this->messList[] = "����ģ��Ŀ¼ʧ�ܣ�";
				return false;
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
				$this->messList[] = "ģ�����Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "ģ�����Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			if($_POST['act']=="add"){
				if(!$_FILES['preview']['size']){
					$this->messList[] = "ͼƬ����Ϊ��!";
					$result=false;
				}
			}
			
			
			return  $result;
		}	
		
		//��ȡģ���ܸ���
		public function get_templates_num(){
			$sql="select id from {$this->tabName} where is_delete=0 order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>