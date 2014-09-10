<?php
/*==================================================================*/
	/*		文件名:Deals_category.class.php                              */
	/*		概要: 团购分类管理     	       	    */
	/*		作者: 李文                                          */
	/*==================================================================*/
	class Deals_category extends BaseLogic {
		private $category_list=array();
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal_category";
				$this->fieldList=array("name","brief","pid","is_delete","status","sort");
		}
		//==========================================
		// 函数: addCategory($post)
		// 功能: 用于向数据库中添加分类信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addCategory($post) {
			if($this->add($post)){
				$this->messList[] = "添加成功！";
				return true;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modCategory($post)
		// 功能: 用于向数据库中修改分类信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modCategory($post) {
			if($this->mod($post)){
				$this->messList[] = "修改成功！";
				return true;
			}else{
				$this->messList[] = "修改失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delCategory($id)
		// 功能: 将分类放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delCategory($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delCategories($id)
		// 功能: 将分类组放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delCategories($id) {
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
		// 函数: get_category()
		// 功能: 获取分类列表
		// 参数: is_delete:是否为已删除,is_all:是否是全部列出,offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_category($is_all=true,$sort=true,$id="all",$status=false,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if($status){
				$s="and status=1";
			} else {
				$s="";
			}
			if($id=="all"){
				$sql="select * from {$this->tabName} where is_delete=0 ".$s." order by sort asc".$limit;
			} else {
				$sql="select * from {$this->tabName} where is_delete=0 ".$s." and pid='".$id."' order by sort asc".$limit;
			}
			$result=$this->mysqli->query($sql);
			while($row=$result->fetch_assoc()){
					$temp[]=$row;
			}
			if(count($temp)==0){
				return false;
			} else {
				if($sort){
					return $this->sort_cate($temp);
					
				} else {
					return $temp;
				}
			}
		}
		
		//按分类排序列表
		private function sort_cate($array,$pid=0,$level=0){
			$data=array();
			foreach($array as $value){
				if($value["pid"]==$pid){
					array_push($data,$value);
				}
			}
			if(!empty($data)){
				foreach($data as $value){
					if($value["pid"]!=0){
						$value["name"]=str_repeat('&nbsp;',$level*3).'└'.$value["name"];
					} 
					$this->category_list[]=$value;
					$this->sort_cate($array,$value["id"],$level+1);
				}
		
			}
			return $this->category_list;
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
		
		//获取分类总个数
		public function get_cate_num(){
			$sql="select * from {$this->tabName} where is_delete=0 order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>