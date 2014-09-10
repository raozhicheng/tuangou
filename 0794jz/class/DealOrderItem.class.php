<?php
/*==================================================================*/
	/*		文件名:DealOrderItem.class.php                              */
	/*		概要: 业务队列管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
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
				$this->messList[] = "添加成功！";
				return true;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		public function modDealOrderItem($post) {
			if($this->mod($post)){
				$this->messList[] = "修改成功！";
				return true;
			}else{
				$this->messList[] = "修改失败！";
				return false;
			}
		}
		
		
		public function delDealOrderItem($post){
			if($this->del($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		
		
		
	}
	
?>