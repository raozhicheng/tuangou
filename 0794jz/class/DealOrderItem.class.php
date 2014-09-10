<?php
/*==================================================================*/
	/*		�ļ���:DealOrderItem.class.php                              */
	/*		��Ҫ: ҵ����й���     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DealOrderItem extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal_order_item";
				$this->fieldList=array("deal_id","number","unit_price","total_price","delivery_status","name","return_score","return_total_score","attr","verify_code","order_id","return_money","return_total_money","buy_type","sub_name");
		}
		
		
		
		public function addDealOrderItem($post) {
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		public function modDealOrderItem($post) {
			if($this->mod($post)){
				$this->messList[] = "�޸ĳɹ���";
				return true;
			}else{
				$this->messList[] = "�޸�ʧ�ܣ�";
				return false;
			}
		}
		
		
		public function delDealOrderItem($post){
			if($this->del($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		
		
		
	}
	
?>