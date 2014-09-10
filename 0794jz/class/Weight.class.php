<?php
/*==================================================================*/
	/*		�ļ���:Weight.class.php                              */
	/*		��Ҫ: �Ź�������λ����    	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Weight extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_weight";
				$this->fieldList=array("name","rate");
		}
		
		
		//==========================================
		// ����: addWeight($post)
		// ����: ���������ݿ������������λ��Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addWeight($post) {
					
				if($this->add($post)){
					$this->messList[] = "���������λ�ɹ���";
					return true;
				}else{
					$this->messList[] = "���������λʧ�ܣ�";
					return false;
				}
		}
		
		//==========================================
		// ����: modWeight($post)
		// ����: ���������ݿ����޸�������λ��Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modWeight($post) {
				if($this->mod($post)){
					$this->messList[] = "�޸�������λ�ɹ���";
					return true;
				}else{
					$this->messList[] = "�޸�������λʧ�ܣ�";
					return false;
				}
			
		}
		
		//==========================================
		// ����: delWeight($post)
		// ����: ��������λֱ��ɾ��
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================
		public function delWeight($post){
			if($this->del($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
				
		
		
		//==========================================
		// ����: get_weight($is_all=true,$offset=0,$num=0)
		// ����: ��ȡ������λ�б�
		// ����: is_all:�Ƿ���ȫ���г�,offset:ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_weight($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} order by id desc".$limit;
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
				$this->messList[] = "������λ���Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "������λ���Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::required($_POST['rate'])) {
				$this->messList[] = "������λ����Ϊ��!";
				$result=false;
			}
			if(!Validate::isFloat($_POST['rate'])){
				$this->messList[] = "������λ����Ϊ����!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//��ȡ������λ�ܸ���
		public function get_Weight_num(){
			$sql="select id from {$this->tabName} order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>