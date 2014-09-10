<?php
/*==================================================================*/
	/*		文件名:UserConsignee.class.php                              */
	/*		概要: 收货人管理     	       	    */
	/*		作者: 李文                                          */
	/*==================================================================*/
	class UserConsignee extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_user_consignee";
				$this->fieldList=array("user_id","region_lv1","region_lv2","region_lv3","address","mobile","zip","consignee");
				
		}
		//==========================================
		// 函数: addUserConsignee($post)
		// 功能: 用于向数据库中添加收货人
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addUserConsignee($post) {
			if($this->add($post)){
				return true;
			}else{
				return false;
			}
		}
		
		
		
		//==========================================
		// 函数: modUserConsignee($post)
		// 功能: 用于向数据库中修改收货人
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modUserConsignee($post) {
			if($this->mod($post)){
				return true;
			}else{
				return false;
			}
		}
		
		
		public function getUserConsignee($user_id){
			$result=$this->getRow("select * from ".$this->tabName." where user_id = ".$user_id." order by id desc");
			return $result;
		}
		
		
	}
	
?>