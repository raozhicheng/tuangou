<?php
/*==================================================================*/
	/*		文件名:Links.class.php                              */
	/*		概要:友情链接管理    	       	    */
	/*		作者: 李文                                          */
	/*==================================================================*/
	class Links extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_links";
				$this->fieldList=array("name","address","status","img","sort");
		}
		
		private function uploadPic($fileUpload,$file){
			if($fileUpload->uploadFile($file["img"])<0){
				$this->messList[] = $fileUpload->getErrorMsg();
				return false;
			}else{
				$this->messList[] = "图片上传成功！";
				return true;
			}	
		}
		//==========================================
		// 函数: addLinks($fileUpload,$post,$file)
		// 功能: 用于向数据库中添加友情链接信息
		// 参数: post是用户在表单中提交的文章全部内容数组,$fileUpload是调用
		//		 FileUpload类,$file是提交的图片
		// 返回: true或false
		//==========================================	
		public function addLinks($fileUpload,$post,$file) {
				if($this->uploadPic($fileUpload,$file)){
					$post["img"]=$fileUpload->getNewFileName();
					if($this->add($post)){
						$this->messList[] = "添加友情链接成功！";
						return true;
					}else{
						$this->messList[] = "添加友情链接失败！";
						return false;
					}
				} else {
					$this->messList[] = "图片添加失败！";
					return false;
				}
			
		}
		
		//==========================================
		// 函数: modLinks($fileUpload,$post,$file)
		// 功能: 用于向数据库中修改友情链接信息
		// 参数: post是用户在表单中提交的文章全部内容数组,$fileUpload是调用
		//		 FileUpload类,$file是提交的图片
		// 返回: true或false
		//==========================================	
		public function modLinks($fileUpload,$post,$file) {
			if($file['img']['name']){
				if($this->uploadPic($fileUpload,$file)){
					$post["img"]=$fileUpload->getNewFileName();
					if($this->mod($post)){
						$this->messList[] = "修改友情链接成功！";
						return true;
					}else{
						$this->messList[] = "修改友情链接失败！";
						return false;
					}
				} else {
					$this->messList[] = "图片修改失败！";
					return false;
				}
				
			} else {
				if($this->mod($post)){
					$this->messList[] = "修改友情链接成功！";
					return true;
				}else{
					$this->messList[] = "修改友情链接失败！";
					return false;
				}
			}
			
		}
		
		//==========================================
		// 函数: delLinks($post)
		// 功能: 将友情链接直接删除
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================
		public function delLinks($post){
			if($this->del($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
				
		
		
		//==========================================
		// 函数: get_links($is_all=true,$offset=0,$num=0)
		// 功能: 获取友情链接列表
		// 参数: is_all:是否是全部列出,status:是否选择开启状态,offset:偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_links($is_all=true,$status=false,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if($status){
				$sql="select * from {$this->tabName} where status=1 order by sort asc".$limit;
			} else {
				$sql="select * from {$this->tabName} order by sort asc".$limit;
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
		// 函数: validateForm()
		// 功能: 对添加的内容或修改的内容进行验证
		// 参数: 无
		// 返回: true或false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['name'])){
				$this->messList[] = "友情链接名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "友情链接名称不能超过20个字符!";
				$result=false;
			}
			if(!Validate::required($_POST['address'])){
				$this->messList[] = "链接地址不能为空!";
				$result=false;
			}
			if($_POST['act']=="add"){
				if(!$_FILES['img']['size']){
					$this->messList[] = "图片不能为空!";
					$result=false;
				}
			}
			
			if(!Validate::isNumber($_POST['sort'])){
				$this->messList[] = "排序必须为数字!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//获取友情链接总个数
		public function get_links_num(){
			$sql="select id from {$this->tabName} order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>