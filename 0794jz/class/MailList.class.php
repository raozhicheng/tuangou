<?php
/*==================================================================*/
	/*		文件名:MailList.class.php                              */
	/*		概要: 邮箱订阅管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class MailList extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_mail_list";
				$this->fieldList=array("mail_address","city_id","code","status","is_delete");
		}
		//==========================================
		// 函数: addMailList($post)
		// 功能: 用于向数据库中添加邮箱订阅列表
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addMailList($post) {
			if($this->add($post)){
				$this->messList[] = "添加成功！";
				return true;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modMailList($post)
		// 功能: 用于向数据库中修改邮箱订阅列表
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modMailList($post) {
			if($this->mod($post)){
				$this->messList[] = "修改成功！";
				return true;
			}else{
				$this->messList[] = "修改失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delMailList($id)
		// 功能: 将分类放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delMailList($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delMailLists($id)
		// 功能: 将分类组放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delMailLists($id) {
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
		// 函数: get_mailList()
		// 功能: 获取分类列表
		// 参数: offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_mailList($offset=0,$num=0){
			$limit=" LIMIT {$offset}, {$num}";
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
		// 函数: validateForm()
		// 功能: 对添加的内容或修改的内容进行验证
		// 参数: 无
		// 返回: true或false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['mail_address'])){
				$this->messList[] = "邮件地址不能为空!";
				$result=false;
			}
			if(!Validate::match($_POST['mail_address'],"/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/")) {
				$this->messList[] = "邮箱格式不正确!";
				$result=false;
			} 
			if(!Validate::noZero($_POST['city_id'])){
				$this->messList[] = "未选择城市!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//获取分类总个数
		public function get_mailList_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>