<?php
/*==================================================================*/
	/*		文件名:DeliveryWay.class.php                              */
	/*		概要: 团购配送方式管理    	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DeliveryWay extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_delivery_way";
				$this->fieldList=array("name","description","first_fee","allow_default","sort","first_weight","continue_weight","continue_fee","weight_id","status","is_delete");
		}
		
		
		//==========================================
		// 函数: addDeliveryWay($post)
		// 功能: 用于向数据库中添加配送方式信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addDeliveryWay($post) {
				if(!$post['allow_default']){
					$post['first_fee']=0;
					$post['first_weight']=0;
					$post['continue_fee']=0;
					$post['continue_weight']=0;
				}
				if($id=$this->add($post)){
					$this->messList[] = "添加配送方式成功！";
					return $id;
				}else{
					$this->messList[] = "添加配送方式失败！";
					return false;
				}
		}
		
		//==========================================
		// 函数: modDeliveryWay($post)
		// 功能: 用于向数据库中修改配送方式信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modDeliveryWay($post) {
				if($id=$this->mod($post)){
					$this->messList[] = "修改配送方式成功！";
					return $id;
				}else{
					$this->messList[] = "修改配送方式失败！";
					return false;
				}
			
		}
		
		//==========================================
		// 函数: delDeliveryWay($post)
		// 功能: 将配送方式直接删除
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================
		public function delDeliveryWay($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delDeliveryWays($id)
		// 功能: 将配送方式组放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delDeliveryWays($id) {
			if(count($id)==0){
				$this->messList[] = "请选择您要删除的分类！";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1 WHERE id ";
			if(is_array($id)) {
				$sql .= "IN (" . join(",", $id) . ")";

			}else{
				$sql .= "= $id";
			}

			if($this->mysqli->query($sql)){
				$this->messList[] = "批量删除成功！";
				return true;
			}else{
				$this->messList[] = "批量删除失败！";
				return false;
			}
		}		
		
		
		//==========================================
		// 函数: get_deliveryWays($is_all=true,$offset=0,$num=0)
		// 功能: 获取配送方式列表
		// 参数: is_all:是否是全部列出,offset:偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_deliveryWays($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where is_delete=0 order by sort asc".$limit;
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
		
		
		
		// 读取 指定配送地区的  配送方式
		public function load_support_delivery($region_id){
			$support_delivery_list = array();
			$sql="select * from {$this->tabName} where is_delete=0 and status=1 order by sort asc";
			$delivery_list = $this->getAll($sql);
			$child = new Child("cms_delivery_way");
			
			foreach($delivery_list as $k=>$v)
			{
				//读取相应的支持地区
				$support_ids = array();
				$delivery_items = $this->getAll("select * from ".TAB_PREFIX."cms_delivery_fee where delivery_id = ".$v['id']);
				foreach($delivery_items as $kk=>$vv)
				{
					$sp_ids = $vv['region_ids']; //每条支持地区值
					$sp_ids = explode(",",$sp_ids);
					foreach($sp_ids as $sp_id)
					{
						$tmp_ids = $child->getChildIds($sp_id);
						$tmp_ids[] = $sp_id;
						$support_ids = array_merge($support_ids,$tmp_ids);
					}
				}
				
				if(in_array($region_id,$support_ids)||$v['allow_default'] == 1)
				{				
					$support_delivery_list[] = $v;
				}		
			}
			return $support_delivery_list;
		}
		//==========================================
		// 函数: validateForm()
		// 功能: 对添加的内容或修改的内容进行验证
		// 参数: 无
		// 返回: true或false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['name'])){
				$this->messList[] = "配送方式名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "配送方式名称不能超过20个字符!";
				$result=false;
			}
			if(!Validate::required($_POST['sort'])) {
				$this->messList[] = "排序不能为空!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['sort'])){
				$this->messList[] = "排序必须为数字!";
				$result=false;
			}
			if(count($_POST['support_ids'])){
				for($i=0;$i<count($_POST['support_ids']);$i++){
					if(!Validate::required($_POST['first_fees'][$i]) || !Validate::required($_POST['continue_fees'][$i])){
						$this->messList[] = "价格不能为空!";
						$result=false;
						break;
					}
					if(!Validate::required($_POST['first_weights'][$i]) || !Validate::required($_POST['continue_weights'][$i])){
						$this->messList[] = "重量不能为空!";
						$result=false;
						break;
					}
					if(!Validate::isFloat($_POST['first_fees'][$i]) || !Validate::isFloat($_POST['continue_fees'][$i])){
						$this->messList[] = "价格必须为数字!";
						$result=false;
						break;
					}
					if(!Validate::isFloat($_POST['first_weights'][$i]) || !Validate::isFloat($_POST['continue_weights'][$i])){
						$this->messList[] = "重量必须为数字!";
						$result=false;
						break;
					}
					
					if(!Validate::required($_POST['area_name'][$i])){
						$this->messList[] = "请选择配送地区!";
						$result=false;
					}
				}
			}
			
			return  $result;
		}	
		
		//获取配送方式总个数
		public function get_DeliveryWay_num(){
			$sql="select id from {$this->tabName} where is_delete=0";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>