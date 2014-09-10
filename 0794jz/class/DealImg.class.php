<?php
/*==================================================================*/
	/*		�ļ���:DealImg.class.php                              */
	/*		��Ҫ: �Ź�ͼƬ����     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DealImg extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal_imgs";
				$this->fieldList=array("img","deal_id","sort");
		}
		
		
		//==========================================
		// ����: addDealImg($post)
		// ����: ���������ݿ�������Ź�ͼƬ��Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addDealImg($post) {
				if($this->add($post)){
					return true;
				}else{
					return false;
				}
		}
		
		
		//==========================================
		// ����: modDealImg($post)
		// ����: ���ύ�����ݸ��µ����ݿ�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modDealImg($post) {
					if($this->mod($post)){
						return true;
					}else{
						return false;
					}
			
		}
		
		//==========================================
		// ����: delDealImg($post)
		// ����: ���Ź�ͼƬɾ��
		// ����: �ύ����
		// ����: true��false
		//==========================================
		public function delDealImg($post) {
			if($this->del($post)){
				return true;
			}else{
				return false;
			}
		}
		
				
		
		//==========================================
		// ����: get_dealImg()
		// ����: ��ȡ�Ź�ͼƬ�б�
		// ����: id
		// ����: false���б�
		//==========================================
		public function get_dealImg($id){
			$sql="select * from {$this->tabName} where deal_id={$id} order by sort";
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
					$row['img']=GALLERY_PATH.$row['img'];
					$temp[]=$row;
				}
				return $temp;
			}
			
		}
		
		
		
		
	}
	
?>