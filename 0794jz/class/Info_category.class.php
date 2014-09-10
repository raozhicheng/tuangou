<?php
/*==================================================================*/
	/*		文件名:Info_category.class.php                              */
	/*		概要: 信息分类管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Info_category extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_info_cate";
				$this->fieldList=array("name","status","is_delete","type","sort");
		}
		//==========================================
		// 函数: addInfoCategory($post)
		// 功能: 用于向数据库中添加分类信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addInfoCategory($post) {
			if($this->add($post)){
				$this->messList[] = "添加成功！";
				return true;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modInfoCategory($post)
		// 功能: 用于向数据库中修改分类信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modInfoCategory($post) {
			if($this->mod($post)){
				$this->messList[] = "修改成功！";
				return true;
			}else{
				$this->messList[] = "修改失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delInfoCategory($id)
		// 功能: 将分类放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delInfoCategory($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delInfoCategories($id)
		// 功能: 将分类组放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delInfoCategories($id) {
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
		// 函数: get_infoCategory()
		// 功能: 获取分类列表
		// 参数: is_all:是否是全部列出,status:是否选择开启状态,offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_infoCategory($is_all=true,$status=false,$type="all",$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if($type=="all"){
				$type="";
			} else {
				$type="and type='{$type}'";
			}
			if($status){
				$sql="select * from {$this->tabName} where is_delete!=1 and status=1 ".$type." order by sort asc".$limit;
			} else {
				$sql="select * from {$this->tabName} where is_delete!=1 ".$type." order by sort asc".$limit;
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
		
		
		//==========================================
		// 函数: validateForm()
		// 功能: 对添加的内容或修改的内容进行验证
		// 参数: 无
		// 返回: true或false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['name'])){
				$this->messList[] = "分类名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "分类名称不能超过20个字符!";
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
		
		//获取分类总个数()
		public function get_cate_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>