<?php
/*==================================================================*/
	/*		文件名:DeliveryArea.class.php                              */
	/*		概要: 团购配送地区管理    	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DeliveryArea extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_delivery_area";
				$this->fieldList=array("pid","name","level","sort","is_delete");
		}
		
		
		//==========================================
		// 函数: addDeliveryArea($post)
		// 功能: 用于向数据库中添加配送地区信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addDeliveryArea($post) {
					
				if($this->add($post)){
					$this->messList[] = "添加配送地区成功！";
					return true;
				}else{
					$this->messList[] = "添加配送地区失败！";
					return false;
				}
		}
		
		//==========================================
		// 函数: modDeliveryArea($post)
		// 功能: 用于向数据库中修改配送地区信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modDeliveryArea($post) {
				if($this->mod($post)){
					$this->messList[] = "修改配送地区成功！";
					return true;
				}else{
					$this->messList[] = "修改配送地区失败！";
					return false;
				}
			
		}
		
		//==========================================
		// 函数: delDeliveryArea($post)
		// 功能: 将配送地区直接删除
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================
		public function delDeliveryArea($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delDeliveryAreas($id)
		// 功能: 将配送地区组放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delDeliveryAreas($id) {
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
		// 函数: get_deliveryAreas($is_all=true,$offset=0,$num=0)
		// 功能: 获取配送地区列表
		// 参数: is_all:是否是全部列出,offset:偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_deliveryAreas($is_all=true,$id=0,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where pid={$id} and is_delete=0 order by sort asc".$limit;
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
		
		public function get_deliveryAreas_all($level=0){
			$sql="select * from {$this->tabName} where level={$level} and is_delete=0 order by sort asc".$limit;
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
		
		
		//==========================================
		// 函数: validateForm()
		// 功能: 对添加的内容或修改的内容进行验证
		// 参数: 无
		// 返回: true或false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['name'])){
				$this->messList[] = "配送地区名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "配送地区名称不能超过20个字符!";
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
			
			return  $result;
		}	
		
		
		//获取配送地区总个数
		public function get_deliveryArea_num($id){
			$sql="select id from {$this->tabName} where pid={$id} and is_delete=0 order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>