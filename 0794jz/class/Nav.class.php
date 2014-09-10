<?php
/*==================================================================*/
	/*		�ļ���:Nav.class.php                              */
	/*		��Ҫ: PHPϵͳ������      	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
class Nav extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_nav";
				$this->fieldList=array("name","status","rank","is_newWindow","url","module","action","u_id");
		}
		
		//==========================================
		// ����: get_module()
		// ����: ��ȡģ���б�
		// ����: ��
		// ����: false���б�
		//==========================================
		public function get_module(){
		    $module=array("index"=>"��վ��ҳ","deals"=>"�Ź�ģ��","infos"=>"��Ϣģ��","message"=>"����ģ��","define_url"=>"�Զ���URL");
			return $module;
		}
		
		
		//==========================================
		// ����: get_nav()
		// ����: ��ȡ�����б�
		// ����: ��
		// ����: false���б�
		//==========================================
		public function get_nav($nav_status=1){
			if($nav_status){
		    	$sql="select * from {$this->tabName} where status={$nav_status} order by rank";
			} else {
				$sql="select * from {$this->tabName} order by rank";
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
		// ����: modNav($post)
		// ����: ���������ݿ����޸ĵ�����Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modNav($post){
			$post=$this->filter($post);
				if($this->mod($post)){
					$this->messList[] = "�޸ĳɹ���";
					return true;
				}else{
					$this->messList[] = "�޸�ʧ�ܣ�";
					return false;
				}
			
		}
		
		private function filter($post){
			switch($post['module']){
				case 'index':
				case 'infos':
				case 'message':
					$post['action']="";
					$post['url']="";
				break;
			}
			return $post;
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
				$this->messList[] = "���Ʋ���Ϊ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "���Ʋ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::required($_POST['rank'])){
				$this->messList[] = "˳����Ϊ��!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['rank'])){
				$this->messList[] = "˳�����Ϊ����!";
				$result=false;
			}
			
			return  $result;
		}	

}

?>