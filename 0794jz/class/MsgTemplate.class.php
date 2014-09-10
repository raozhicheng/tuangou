<?php
/*==================================================================*/
	/*		�ļ���:MsgTemplate.class.php                              */
	/*		��Ҫ: ��Ϣģ��      	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class MsgTemplate extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_msg_template";
				$this->fieldList=array("ch_name","name","content","type","is_html");
		}
		
		
		
		//==========================================
		// ����: modMsgTemplate($post)
		// ����: ���������ݿ����޸���Ϣģ��
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================
		public function modMsgTemplate($post){
			if($this->mod($post)){
				$this->messList[] = "���³ɹ���";
				return true;
			}else{
				$this->messList[] = "����ʧ�ܣ�";
				return false;
			}
		}
		
		
				
		//==========================================
		// ����: get_msgTemplates()
		// ����: ��ȡ��Ϣģ���б�
		// ����: ��
		// ����: false���б�
		//==========================================
		public function get_msgTemplates(){
		    $sql="select * from {$this->tabName} order by id desc";
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
			if(!Validate::required($_POST['content'])){
				$this->messList[] = "��Ϣģ�����ݲ���Ϊ��!";
				$result=false;
			}
			
			
			
			return  $result;
		}	
		
	}
	
?>