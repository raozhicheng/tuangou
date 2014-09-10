<?php
/*==================================================================*/
	/*		文件名:DeliveryNotice.class.php                              */
	/*		概要: 团购配送通知管理    	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DeliveryNotice extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_delivery_notice";
				$this->fieldList=array("notice_sn","delivery_time","is_arrival","arrival_time","order_item_id","user_id","memo");
		}
		
		
		//==========================================
		// 函数: addDeliveryNotice($post)
		// 功能: 用于向数据库中添加配送方式通知
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addDeliveryNotice($post) {
				if($id=$this->add($post)){
					return $id;
				}else{
					return false;
				}
		}
		
		//==========================================
		// 函数: modDeliveryNotice($post)
		// 功能: 用于向数据库中修改配送方式通知
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modDeliveryNotice($post) {
			$sql='';
			foreach ($post as $k=>$v) {
				$id=$v["mod_id"];
				$value='';
				foreach($v as $key=>$val){
					if(in_array($key, $this->fieldList)){
						if (!get_magic_quotes_gpc())
							$value .= $key." = '".addslashes($val)."',";
						else
							$value .= $key." = '".$val."',";
					}
				}
				
			$value=rtrim($value, ",");
			$sql.= "UPDATE {$this->tabName} SET {$value} WHERE id={$id};";
			}
			if(count($post)>1){
				return $this->mysqli->multi_query($sql);	
			} else {
				return $this->mysqli->query($sql);	
			}
				
			
		}
		
		
		//==========================================
		// 函数: delDeliveryNotice($id)
		// 功能: 直接删除
		// 参数: id是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================
		public function delDeliveryNotice($id){
			if(is_array($id))
				$tmp = "IN (" . join(",", $id) . ")";
			else 
				$tmp = "= $id";
			
			$sql = "DELETE FROM {$this->tabName} WHERE delivery_id " . $tmp ;
			return $this->mysqli->query($sql);	
		}
		
		
		
		
		//==========================================
		// 函数: get_DeliveryNotices($id)
		// 功能: 获取配送方式扩展列表
		// 参数: id:当前ID
		// 返回: false或列表
		//==========================================
		public function get_DeliveryNotices($id){
			$sql="select * from {$this->tabName} where delivery_id={$id} order by id asc";
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
		
		
		
		
		
		
	}
	
?>