<?php
/*==================================================================*/
	/*		文件名:UserExt.class.php                              */
	/*		概要: 会员扩展管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class UserExt extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_user_extend";
				$this->fieldList=array("field_id","user_id","value");
				
		}
		//==========================================
		// 函数: addUserExt($post)
		// 功能: 用于向数据库中添加会员扩展内容
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addUserExt($post) {
			if($this->add($post)){
				$this->messList[] = "添加成功！";
				return true;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		
		
		//==========================================
		// 函数: modUserExt($post)
		// 功能: 用于向数据库中修改会员
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modUserExt($post) {
			if($this->mod($post)){
				return true;
			}else{
				return false;
			}
		}
		
		//==========================================
		// 函数: delUserExt($id)
		// 功能: 将会员放入回收站内
		// 参数: id是数据ID
		// 返回: true或false
		//==========================================
		public function delUserExt($post){
			if($this->mod($post)){
				return true;
			}else{
				return false;
			}
		}
		
		//==========================================
		// 函数: delUserExts($id)
		// 功能: 将会员放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delUserExts($id) {
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
		// 函数: get_userExt($id)
		// 功能: 获取会员扩展内容
		// 参数: id是会员ID
		// 返回: false或列表
		//==========================================
		public function get_userExt($id){
			$sql = "SELECT * FROM {$this->tabName} WHERE user_id ={$id}";
			
			$result=$this->mysqli->query($sql);

			if($result && $result->num_rows ==1){
				return $result->fetch_assoc();
			}else{
				return false;
			}
	
		}		
		
		
		
	}
	
?>