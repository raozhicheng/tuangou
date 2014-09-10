<?php
/*==================================================================*/
	/*		�ļ���:Supplier.class.php                              */
	/*		��Ҫ: �Ź���Ӧ�̹���     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Supplier extends BaseLogic {
		private $category_list=array();
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_supplier";
				$this->fieldList=array("name","preview","content","cate_id","sort");
		}
		
		private function uploadPic($fileUpload,$file){
			if($fileUpload->uploadFile($file["uploadPic"])<0){
				$this->messList[] = $fileUpload->getErrorMsg();
				return false;
			}else{
				$this->messList[] = "ͼƬ�ϴ��ɹ���";
				return true;
			}	
		}
		
		//==========================================
		// ����: addSupplier($fileUpload,$post,$file)
		// ����: ���������ݿ�����ӹ�Ӧ����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������,$fileUpload�ǵ���
		//		 FileUpload��,$file���ύ��ͼƬ
		// ����: true��false
		//==========================================	
		public function addSupplier($fileUpload,$post,$file) {
			$post["content"]=stripslashes($post["content"]);
			if($file['uploadPic']['name']){
				if($this->uploadPic($fileUpload,$file)){
					$post["preview"]=$fileUpload->getNewFileName();
					if($this->add($post)){
						$this->messList[] = "��ӹ�Ӧ�̳ɹ���";
						return true;
					}else{
						$this->messList[] = "��ӹ�Ӧ��ʧ�ܣ�";
						return false;
					}
				} else {
					$this->messList[] = "ͼƬ���ʧ�ܣ�";
					return false;
				}
			} else {
				if($this->add($post)){
					$this->messList[] = "��ӹ�Ӧ�̳ɹ���";
					return true;
				}else{
					$this->messList[] = "��ӹ�Ӧ��ʧ�ܣ�";
					return false;
				}
			}
		}
		
		//==========================================
		// ����: modSupplier($post)
		// ����: ���������ݿ����޸Ĺ�Ӧ����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modSupplier($fileUpload,$post,$file) {
			$post["content"]=stripslashes($post["content"]);
			if($file['uploadPic']['tmp_name']){
				if($this->uploadPic($fileUpload,$file)){
					$post["preview"]=$fileUpload->getNewFileName();
					if($this->mod($post)){
						$this->messList[] = "�޸Ĺ�Ӧ�̳ɹ���";
						return true;
					}else{
						$this->messList[] = "�޸Ĺ�Ӧ��ʧ�ܣ�";
						return false;
					}
				} else {
					$this->messList[] = "ͼƬ�޸�ʧ�ܣ�";
					return false;
				} 
			} else {
				if($this->mod($post)){
					$this->messList[] = "�޸Ĺ�Ӧ�̳ɹ���";
					return true;
				}else{
					$this->messList[] = "�޸Ĺ�Ӧ��ʧ�ܣ�";
					return false;
				}
			}
			
		}
		
		//==========================================
		// ����: delSupplier($id)
		// ����: ����Ӧ�̷������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delSupplier($post){
			if($this->del($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
				
		
		
		//==========================================
		// ����: get_supplier()
		// ����: ��ȡ��Ӧ���б�
		// ����: is_all:�Ƿ���ȫ���г�,offset:ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_supplier($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} order by sort asc".$limit;
			$result=$this->mysqli->query($sql);
			while($row=$result->fetch_assoc()){
				$temp[]=$row;
			}
			if(count($temp)==0){
				return false;
			} else {
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
				$this->messList[] = "��Ӧ�����Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "��Ӧ�����Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::noZero($_POST['cate_id'])) {
				$this->messList[] = "��ѡ�����!";
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
		
		//��ȡ��Ӧ���ܸ���
		public function get_supplier_num(){
			$sql="select id from {$this->tabName} order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>