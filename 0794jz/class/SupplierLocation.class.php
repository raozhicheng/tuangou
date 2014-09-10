<?php
/*==================================================================*/
	/*		文件名:SupplierLocation.class.php                              */
	/*		概要: 团购供应商店面管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class SupplierLocation extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_supplier_location";
				$this->fieldList=array("name","route","address","tel","contact","point","supplier_id","open_time","brief","is_main","is_delete","api_address");
		}
		
		
		//==========================================
		// 函数: addSupplierLocation($post)
		// 功能: 用于向数据库中添加供应商店面位置信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addSupplierLocation($post) {
				if($id=$this->add($post)){
					if(!$this->get_s_l($post['supplier_id'],$post['id'])){
						$this->mods($post,"and supplier_id=".intval($post['supplier_id']));
					}
					$this->messList[] = "添加成功！";
					return true;
				}else{
					$this->messList[] = "添加失败！";
					return false;
				}
		}
		
		
		//==========================================
		// 函数: modSupplierLocation($post)
		// 功能: 将提交的内容更新到数据库
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modSupplierLocation($post) {
					if($this->mods($post)){
						$this->messList[] = "修改成功！";
						return true;
					}else{
						$this->messList[] = "修改失败！";
						return false;
					}
			
		}
		
		//==========================================
		// 函数: delSupplierLocation($post)
		// 功能: 将供应商店信信息放入回收站
		// 参数: 提交数据
		// 返回: true或false
		//==========================================
		public function delSupplierLocation($post) {
			if($this->mods($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
				
		//==========================================
		// 函数: delSupplierLocation($xid,$id)
		// 功能: 将组放入回收站内
		// 参数: supplier_id是上级ID $id本身ID
		// 返回: true或false
		//==========================================
		function delSupplierLocations($id,$supplier_id) {
			if(count($id)==0){
				$this->messList[] = "请选择您要删除的店面！";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1,is_main=0 WHERE id ";
			if(is_array($id)) {
				$sql .= "IN (" . join(",", $id) . ")";

			}else{
				$sql .= "= $id and supplier_id=$id";
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
		// 函数: get_supplierLocation()
		// 功能: 获取供应商门店列表
		// 参数: is_delete:是否为已删除 offset:偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_supplierLocation($is_delete=false,$offset=0,$num=0,$id){
			$limit=" LIMIT {$offset}, {$num}";
			if(!$is_delete){
				$sql="select * from {$this->tabName} where is_delete!=1 and supplier_id={$id}  order by id desc".$limit;
			} else {
				$sql="select * from {$this->tabName} where supplier_id={$id}".$limit;
			}
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
		// 函数: get_id($supplier_id,$id)
		// 功能: 获取供应商帐号列表
		// 参数: $supplier_id供应商ID  $id帐号ID
		// 返回: false或列表
		//==========================================
		function get_s_l($supplier_id,$id) {
			$sql = "SELECT * FROM {$this->tabName} WHERE supplier_id={$supplier_id} and id ={$id}";
			
			$result=$this->mysqli->query($sql);

			if($result && $result->num_rows ==1){
				return $result->fetch_assoc();
			}else{
				return false;
			}
	
		}
		
		public function set_location_main($post) {
				$where="and supplier_id=".intval($post['supplier_id']);
				$sql="update {$this->tabName} set is_main=0 where is_main=1 ".$where;
				$result=$this->mysqli->query($sql);
				if($result && $this->mods($post,$where)) {
					$this->messList[] = "更改默认值成功！";
					return true;
				} else {
					$this->messList[] = "更改失败！";
					return false;
				}	
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
				$this->messList[] = "名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "名称不能超过20个字符!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//获取供应商店面总个数
		public function get_supplierLocation_num($is_delete=false,$id){
			if(!$is_delete){
				$sql="select * from {$this->tabName} where is_delete!=1 and supplier_id={$id}";
			} else {
				$sql="select * from {$this->tabName} where supplier_id={$id}";
			}
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>