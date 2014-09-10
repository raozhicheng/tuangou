<?php
/*==================================================================*/
	/*		文件名:Supplier.class.php                              */
	/*		概要: 团购供应商管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Supplier extends BaseLogic {
		private $category_list=array();
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_supplier";
				$this->fieldList=array("name","preview","content","cate_id","sort");
		}
		
		private function uploadPic($fileUpload,$file){
			if($fileUpload->uploadFile($file["uploadPic"])<0){
				$this->messList[] = $fileUpload->getErrorMsg();
				return false;
			}else{
				$this->messList[] = "图片上传成功！";
				return true;
			}	
		}
		
		//==========================================
		// 函数: addSupplier($fileUpload,$post,$file)
		// 功能: 用于向数据库中添加供应商信息
		// 参数: post是用户在表单中提交的文章全部内容数组,$fileUpload是调用
		//		 FileUpload类,$file是提交的图片
		// 返回: true或false
		//==========================================	
		public function addSupplier($fileUpload,$post,$file) {
			$post["content"]=stripslashes($post["content"]);
			if($file['uploadPic']['name']){
				if($this->uploadPic($fileUpload,$file)){
					$post["preview"]=$fileUpload->getNewFileName();
					if($this->add($post)){
						$this->messList[] = "添加供应商成功！";
						return true;
					}else{
						$this->messList[] = "添加供应商失败！";
						return false;
					}
				} else {
					$this->messList[] = "图片添加失败！";
					return false;
				}
			} else {
				if($this->add($post)){
					$this->messList[] = "添加供应商成功！";
					return true;
				}else{
					$this->messList[] = "添加供应商失败！";
					return false;
				}
			}
		}
		
		//==========================================
		// 函数: modSupplier($post)
		// 功能: 用于向数据库中修改供应商信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modSupplier($fileUpload,$post,$file) {
			$post["content"]=stripslashes($post["content"]);
			if($file['uploadPic']['tmp_name']){
				if($this->uploadPic($fileUpload,$file)){
					$post["preview"]=$fileUpload->getNewFileName();
					if($this->mod($post)){
						$this->messList[] = "修改供应商成功！";
						return true;
					}else{
						$this->messList[] = "修改供应商失败！";
						return false;
					}
				} else {
					$this->messList[] = "图片修改失败！";
					return false;
				} 
			} else {
				if($this->mod($post)){
					$this->messList[] = "修改供应商成功！";
					return true;
				}else{
					$this->messList[] = "修改供应商失败！";
					return false;
				}
			}
			
		}
		
		//==========================================
		// 函数: delSupplier($id)
		// 功能: 将供应商放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delSupplier($post){
			if($this->del($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
				
		
		
		//==========================================
		// 函数: get_supplier()
		// 功能: 获取供应商列表
		// 参数: is_all:是否是全部列出,offset:偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_supplier($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} order by sort asc".$limit;
			$result=$this->mysqli->query($sql);
			while($row=$result->fetch_assoc()){
				$temp[]=$row;
			}
			if(count($temp)==0){
				return false;
			} else {
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
				$this->messList[] = "供应商名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "供应商名称不能超过20个字符!";
				$result=false;
			}
			if(!Validate::noZero($_POST['cate_id'])) {
				$this->messList[] = "请选择分类!";
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
		
		//获取供应商总个数
		public function get_supplier_num(){
			$sql="select id from {$this->tabName} order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>