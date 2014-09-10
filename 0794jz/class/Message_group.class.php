<?php
/*==================================================================*/
	/*		文件名:Message_group.class.php                              */
	/*		概要: 留言分组管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Message_group extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_message_group";
				$this->fieldList=array("name","preset","show_name","is_member","sort","is_delete");
		}
		//==========================================
		// 函数: addMessageGroup($post)
		// 功能: 用于向数据库中添加留言分组
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addMessageGroup($post) {
			if($this->add($post)){
				$this->messList[] = "添加成功！";
				return true;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modMessageGroup($post)
		// 功能: 用于向数据库中修改留言分组
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modMessageGroup($post) {
			if($this->mod($post)){
				$this->messList[] = "修改成功！";
				return true;
			}else{
				$this->messList[] = "修改失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delMessageGroup($id)
		// 功能: 将留言分组放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delMessageGroup($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delMessageGroups($id)
		// 功能: 将留言分组放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delMessageGroups($id) {
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
		// 函数: get_messageGroup()
		// 功能: 获取留言分组
		// 参数: is_all:是否是全部列出,offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_messageGroup($is_all=true,$offset=0,$num=0,$preset=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if($preset){
				$sql="select * from {$this->tabName} where is_delete!=1 and preset=0 order by sort asc".$limit;
			} else {
				$sql="select * from {$this->tabName} where is_delete!=1 order by sort asc".$limit;
			}
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
		
		// 功能：用于前台显示的消息分组
		// 参数：preset：过滤该显示哪些消息分组
		public function get_front_messageGroup($offset=0,$num=0,$preset=0){
			if(!$offset && !$num){
				$limit="";
			} else {
				$limit=" LIMIT {$offset}, {$num}";//起始行号，返回行数
			}
			$sql="select * from {$this->tabName} where is_delete!=1 and preset=".$preset." order by sort asc".$limit;
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
		
		//读取单个留言分组信息
		public function get_mg_single($id=0){
			$sql="select * from {$this->tabName} where is_delete=0 and id=".$id." order by sort asc";
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
			if(!Validate::required($_POST['name'])){
				$this->messList[] = "URL名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "URL名称不能超过20个字符!";
				$result=false;
			}
			if(!Validate::required($_POST['show_name'])){
				$this->messList[] = "名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['show_name'], 40)) {
				$this->messList[] = "名称不能超过20个字符!";
				$result=false;
			}
			if(!Validate::required($_POST['sort'])){
				$this->messList[] = "排序不能为空!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['sort'])){
				$this->messList[] = "排序必须为数字!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//获取留言分组总个数()
		public function get_group_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>