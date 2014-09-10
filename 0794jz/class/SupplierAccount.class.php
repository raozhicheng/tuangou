<?php
/*==================================================================*/
	/*		文件名:SupplierAccount.class.php                              */
	/*		概要: 团购供应商帐户管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class SupplierAccount extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_supplier_account";
				$this->fieldList=array("account_name","account_password","supplier_id","status","is_delete","description","login_ip","login_time","update_time");
		}
		
		
		//==========================================
		// 函数: addSupplierAccount($post)
		// 功能: 用于向数据库中添加供应商账号信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addSupplierAccount($post) {
			$post["account_password"]=md5($post["account_password"]);
				if($this->add($post)){
					$this->messList[] = "添加帐号成功！";
					return true;
				}else{
					$this->messList[] = "添加帐号失败,帐号不能重复！";
					return false;
				}
		}
		
		
		//==========================================
		// 函数: modSupplierAccount($post)
		// 功能: 将提交的内容更新到数据库
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modSupplierAccount($post) {
			$post["account_password"]=md5($post["account_password"]);
					if($this->mods($post)){
						$this->messList[] = "修改成功！";
						return true;
					}else{
						$this->messList[] = "修改失败！";
						return false;
					}
			
		}
		
		//==========================================
		// 函数: delSupplierAccount($post)
		// 功能: 将供应商帐号放入回收站
		// 参数: 提交数据
		// 返回: true或false
		//==========================================
		public function delSupplierAccount($post) {
			if($this->mods($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
				
		//==========================================
		// 函数: delSupplierAccount($xid,$id)
		// 功能: 将组放入回收站内
		// 参数: supplier_id是上级ID $id本身ID
		// 返回: true或false
		//==========================================
		function delSupplierAccounts($id,$supplier_id) {
			if(count($id)==0){
				$this->messList[] = "请选择您要删除的帐号！";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1 WHERE id ";
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
		// 函数: get_supplierAccount()
		// 功能: 获取供应商帐号列表
		// 参数: is_delete:是否为已删除 offset:偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_supplierAccount($is_delete=false,$offset=0,$num=0,$id){
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
		// 函数: get_s_a($supplier_id,$id)
		// 功能: 获取供应商帐号列表
		// 参数: $supplier_id供应商ID  $id帐号ID
		// 返回: false或列表
		//==========================================
		function get_s_a($supplier_id,$id) {
			$sql = "SELECT * FROM {$this->tabName} WHERE supplier_id={$supplier_id} and id ={$id}";
			
			$result=$this->mysqli->query($sql);

			if($result && $result->num_rows ==1){
				return $result->fetch_assoc();
			}else{
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
			if(!Validate::required($_POST['account_name'])){
				$this->messList[] = "帐号不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['account_name'], 40)) {
				$this->messList[] = "帐号不能超过20个字符!";
				$result=false;
			}
			if(!Validate::required($_POST['account_password'])) {
				$this->messList[] = "密码不能为空!";
				$result=false;
			}
			if(!Validate::required($_POST['confirm_pass'])){
				$this->messList[] = "确认密码不能为空!";
				$result=false;
			}
			if(!Validate::equal($_POST['account_password'],$_POST['confirm_pass'])){
				$this->messList[] = "密码与确认密码不一致!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//获取供应商帐号总个数
		public function get_supplierAccount_num($is_delete=false,$id){
			if(!$is_delete){
				$sql="select id from {$this->tabName} where is_delete!=1 and supplier_id={$id}";
			} else {
				$sql="select id from {$this->tabName} where supplier_id={$id}";
			}
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>