<?php
/*==================================================================*/
	/*		文件名:Role.class.php                              */
	/*		概要: 管理员分组管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Role extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_role";
				$this->fieldList=array("name","status","is_delete","access");
		}
		//==========================================
		// 函数: addRole($post)
		// 功能: 用于向数据库中添加管理员分组列表
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addRole($post) {
			if(count($post['node'])){
				$post['access']=implode(",",$post['node']);
			} else {
				$post['access']="0";
			}
			
			if($this->add($post)){
				$this->messList[] = "添加成功！";
				return true;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modRole($post)
		// 功能: 用于向数据库中修改管理员分组列表
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modRole($post) {
			if(count($post['node'])){
				$post['access']=implode(",",$post['node']);
			} else {
				$post['access']="0";
			}
			if($this->mod($post)){
				$this->messList[] = "修改成功！";
				return true;
			}else{
				$this->messList[] = "修改失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delRole($id)
		// 功能: 将分类放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delRole($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delRoles($id)
		// 功能: 将分类组放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delRoles($id) {
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
		// 函数: get_role()
		// 功能: 获取分类列表
		// 参数: offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_role($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where is_delete!=1 order by id asc".$limit;
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
		// 函数: get_module()
		// 功能: 获取模型列表
		// 参数: 无
		// 返回: false或列表
		//==========================================
		public function get_module(){
			$module_tabName=TAB_PREFIX."cms_role_module";
			$sql="select id,name from {$module_tabName} where is_delete!=1 order by id asc";
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
		// 函数: get_node()
		// 功能: 获取节点列表
		// 参数: 无
		// 返回: false或列表
		//==========================================
		public function get_node(){
			$node_tabName=TAB_PREFIX."cms_role_node";
			$sql="select * from {$node_tabName} order by id asc";
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
				$this->messList[] = "名称不能为空!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//获取分类总个数
		public function get_role_num(){
			$sql="select id from {$this->tabName} where is_delete!=1;";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>