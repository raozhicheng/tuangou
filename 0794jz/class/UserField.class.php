<?php
/*==================================================================*/
	/*		文件名:UserField.class.php                              */
	/*		概要: 会员扩展管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class UserField extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_user_field";
				$this->fieldList=array("field_name","field_show_name","input_type","value_scope","is_must","sort","is_delete");
		}
		//==========================================
		// 函数: addUserField($post)
		// 功能: 用于向数据库中添加会员扩展
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addUserField($post) {
			if($this->add($post)){
				$this->messList[] = "添加成功！";
				return true;
			}else{
				$this->messList[] = "添加失败,字段名称不能有重复！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modUserField($post)
		// 功能: 用于向数据库中修改会员扩展
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modUserField($post) {
			if($this->mod($post)){
				$this->messList[] = "回复成功！";
				return true;
			}else{
				$this->messList[] = "回复失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delUserField($id)
		// 功能: 将会员扩展放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delUserField($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delUserFields($id)
		// 功能: 将会员扩展放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delUserFields($id) {
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
		// 函数: get_UserFields()
		// 功能: 获取会员扩展
		// 参数: is_all:是否是全部列出,offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_userFields($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where is_delete!=1 order by sort asc".$limit;
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
						$temp[]=$row;
				}
				return $temp;
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
			if(!Validate::required($_POST['field_name'])){
				$this->messList[] = "字段名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['field_name'], 40)) {
				$this->messList[] = "字段名称不能超过20个字符!";
				$result=false;
			}
			if(!Validate::match($_POST['field_name'],"/^\w+$/")) {
				$this->messList[] = "字段名称只能为数字字母等!";
				$result=false;
			}
			if(!Validate::required($_POST['field_show_name'])) {
				$this->messList[] = "字段显示名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['field_show_name'], 40)) {
				$this->messList[] = "字段显示名称不能超过20个字符!";
				$result=false;
			}
			return  $result;
		}	
		
		//获取会员扩展总个数()
		public function get_userField_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>