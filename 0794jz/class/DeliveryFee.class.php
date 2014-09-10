<?php
/*==================================================================*/
	/*		文件名:DeliveryFee.class.php                              */
	/*		概要: 团购配送方式扩展扩展管理    	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DeliveryFee extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_delivery_fee";
				$this->fieldList=array("delivery_id","area_ids","area_name","first_fee","first_weight","continue_fee","continue_weight");
		}
		
		
		//==========================================
		// 函数: addDeliveryFee($post)
		// 功能: 用于向数据库中添加配送方式扩展信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addDeliveryFee($post) {
				if($this->adds($post)){
					return true;
				}else{
					return false;
				}
		}
		
		//==========================================
		// 函数: modDeliveryFee($post)
		// 功能: 用于向数据库中修改配送方式扩展信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modDeliveryFee($post) {
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
		
		public function multiModDeliveryFee($post,$id){
			if($this->delDeliveryFee($id)&&$this->adds($post)){
				return true;
			} else {
				return false;
			}
		}
		
		
		//==========================================
		// 函数: delDeliveryFee($id)
		// 功能: 直接删除
		// 参数: id是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================
		public function delDeliveryFee($id){
			if(is_array($id))
				$tmp = "IN (" . join(",", $id) . ")";
			else 
				$tmp = "= $id";
			
			$sql = "DELETE FROM {$this->tabName} WHERE delivery_id " . $tmp ;
			return $this->mysqli->query($sql);	
		}
		
		
		
		
		//==========================================
		// 函数: get_DeliveryFees($id)
		// 功能: 获取配送方式扩展列表
		// 参数: id:当前ID
		// 返回: false或列表
		//==========================================
		public function get_DeliveryFees($id){
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
		
		/**
		 * 
		 * @param $weight  重量
		 * @param $region_id  配送地区ID
		 * @param $delivery_id  配送方式ID
		 * 
		 * return delivery_fee  运费
		 */
		public function countDeliveryFee($weight,$region_id,$delivery_id)
		{
				$region_id = intval($region_id);
				$delivery_id = intval($delivery_id);
				$delivery=new DeliveryWay();
				$weight=new Weight();
				$delivery_info = $delivery->get($delivery_id);
				$delivery_weight_unit = $weight->get(intval($delivery_info['weight_id']));  //配送方式的重单单价
				
				//开始读取相应地区对该配送方式的重量支持
				$child = new Child("delivery_area");
				
				$delivery_items = $this->get_DeliveryFees(intval($delivery_info['id']));
				foreach(array($delivery_items) as $k=>$v)
				{
							$support_ids = array();
							$sp_ids = $v['region_ids']; //每条支持地区值
							$sp_ids = explode(",",$sp_ids);
							foreach($sp_ids as $sp_id)
							{
								$tmp_ids = $child->getChildIds($sp_id);
								$tmp_ids[] = $sp_id;
								$support_ids = array_merge($support_ids,$tmp_ids);
							}
							if(in_array($region_id,$support_ids))
							{				
								//支持该配送地区
								$delivery_weight_conf = $v;
								break;
							}
				}
				
				//当没有子地区支持时，查看是否支持配送
				if(!$delivery_weight_conf)
				{
					if($delivery_info['allow_default'] == 1)
					{
						$delivery_weight_conf = $delivery_info;
					}	
				}
				
				if($delivery_weight_conf)
				{
					
					$delivery_weight_conf['first_weight'] = $delivery_weight_conf['first_weight'] * $delivery_weight_unit['rate'];
					$delivery_weight_conf['continue_weight'] = $delivery_weight_conf['continue_weight'] * $delivery_weight_unit['rate'];
					
					if($weight <= $delivery_weight_conf['first_weight']) //未超过首重
					{
						$delivery_fee = $delivery_weight_conf['first_fee'];
					}
					else
					{
						//超重
						if($delivery_weight_conf['continue_weight']!=0)
						$continue_fee = (($weight - $delivery_weight_conf['first_weight']) / $delivery_weight_conf['continue_weight']) * $delivery_weight_conf['continue_fee'];
						else
						$continue_fee = 0;
						$delivery_fee = $delivery_weight_conf['first_fee'] + $continue_fee;
					}
				}
				else
				{
					$delivery_fee = 0;
				}
			return $delivery_fee;
			
		}
		
		
		
		
	}
	
?>