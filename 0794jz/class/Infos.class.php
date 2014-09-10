<?php
/*==================================================================*/
	/*		文件名:Infos.class.php                              */
	/*		概要: 信息管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Infos extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_infos";
				$this->fieldList=array("title","content","cate_id","create_time","update_time","add_admin_id","status","rel_url","update_admin_id","is_delete","click_count","sort","seo_title","seo_keyword","seo_description");
		}
		//==========================================
		// 函数: addInfos($post)
		// 功能: 用于向数据库中添加分类信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addInfos($post) {
			$post["content"]=stripslashes($post["content"]);
			$post["add_admin_id"]=$_SESSION[md5(AUTH_KEY)]['id'];
			if($this->add($post)){
				$this->messList[] = "添加成功！";
				return true;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modInfos($post)
		// 功能: 用于向数据库中修改分类信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modInfos($post) {
			$post["content"]=stripslashes($post["content"]);
			$post["update_admin_id"]=$_SESSION[md5(AUTH_KEY)]['id'];
			if($this->mod($post)){
				$this->messList[] = "修改成功！";
				return true;
			}else{
				$this->messList[] = "修改失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delInfo($id)
		// 功能: 将分类放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delInfo($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delInfos($id)
		// 功能: 将分类组放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delInfos($id) {
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
		// 函数: get_Infos()
		// 功能: 获取分类列表
		// 参数: is_all:是否是全部列出,offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_infos($is_all=true,$status=false,$id=false,$pid=false,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if($id){
				$id="and id='{$id}'";
			} else {
				$id="";
			}
			if($pid){
				$pid=" and cate_id='{$pid}'";
			} else {
				$pid="";
			}
			if($status){
				$sql="select * from {$this->tabName} where is_delete!=1 and status=1 ".$id.$pid." order by sort asc".$limit;
			} else {
				$sql="select * from {$this->tabName} where is_delete!=1 ".$id.$pid." order by sort asc".$limit;
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
			if(!Validate::required($_POST['title'])){
				$this->messList[] = "标题名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['title'], 80)) {
				$this->messList[] = "标题名称不能超过40个字符!";
				$result=false;
			}
			if(!Validate::required($_POST['sort'])){
				$this->messList[] = "排序不能为空!";
				$result=false;
			}
			if(!Validate::required($_POST['content'])) {
				$this->messList[] = "详细内容不能为空!";
				$result=false;
			}
			if(!Validate::noZero($_POST['cate_id'])){
				$this->messList[] = "请选择分类!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['sort'])){
				$this->messList[] = "排序必须为数字!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//获取未删除的总个数()
		public function get_infos_num(){
			$sql="select id from {$this->tabName} where is_delete=0";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>