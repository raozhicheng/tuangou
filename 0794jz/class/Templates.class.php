<?php
/*==================================================================*/
	/*		文件名:Templates.class.php                              */
	/*		概要:模版管理    	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Templates extends BaseLogic {
		
		private $tempDir="../templates/";
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_templates";
				$this->fieldList=array("name","style","is_default","preview","is_delete");
		}
		
		private function uploadPic($fileUpload,$file){
			if($fileUpload->uploadFile($file["preview"])<0){
				$this->messList[] = $fileUpload->getErrorMsg();
				return false;
			}else{
				$this->messList[] = "图片上传成功！";
				return true;
			}	
		}
		//==========================================
		// 函数: addTemplates($fileUpload,$post,$file)
		// 功能: 用于向数据库中添加模版信息
		// 参数: post是用户在表单中提交的文章全部内容数组,$fileUpload是调用
		//		 FileUpload类,$file是提交的图片
		// 返回: true或false
		//==========================================	
		public function addTemplates($fileUpload,$post,$file) {
				if($this->uploadPic($fileUpload,$file)){
					$post["preview"]=$fileUpload->getNewFileName();
					if($this->add($post)){
						$this->messList[] = "添加模版成功！";
						return true;
					}else{
						$this->messList[] = "添加模版失败！";
						return false;
					}
				} else {
					$this->messList[] = "图片添加失败！";
					return false;
				}
			
		}
		
		//==========================================
		// 函数: modTemplates($fileUpload,$post,$file)
		// 功能: 用于向数据库中修改模版信息
		// 参数: post是用户在表单中提交的文章全部内容数组,$fileUpload是调用
		//		 FileUpload类,$file是提交的图片
		// 返回: true或false
		//==========================================	
		public function modTemplates($fileUpload,$post,$file) {
			if($file['preview']['name']){
				if($this->uploadPic($fileUpload,$file)){
					$post["preview"]=$fileUpload->getNewFileName();
					if($this->mod($post)){
						$this->messList[] = "修改模版成功！";
						return true;
					}else{
						$this->messList[] = "修改模版失败！";
						return false;
					}
				} else {
					$this->messList[] = "图片修改失败！";
					return false;
				}
				
			} else {
				if($this->mod($post)){
					$this->messList[] = "修改模版成功！";
					return true;
				}else{
					$this->messList[] = "修改模版失败！";
					return false;
				}
			}
			
		}
		
		//==========================================
		// 函数: delTemplates($post)
		// 功能: 将模版放至回收站
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================
		public function delTemplate($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		
		//==========================================
		// 函数: delTemplates($id)
		// 功能: 将模版组放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delTemplates($id) {
			if(count($id)==0){
				$this->messList[] = "请选择您要删除的城市！";
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
		// 函数: set_Default($post)
		// 功能: 设置模版为当前模版
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function set_Default($post) {
			$sql="update {$this->tabName} set is_default=0 where is_default=1";
			$result=$this->mysqli->query($sql);
			if($result && $this->mod($post)) {
				$this->messList[] = "更改模版默认值成功！";
				return true;
			} else {
				$this->messList[] = "更改模版默认值失败！";
				return false;
			}
		}
		
		public function get_default() {
			$temp=$this->get_other_datas("cms_templates","style","is_default",1);
			return $temp[0]['style'];
		}
		
		
		//==========================================
		// 函数: get_Templates($is_all=true,$offset=0,$num=0)
		// 功能: 获取模版列表
		// 参数: is_all:是否是全部列出,offset:偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_Templates($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where is_delete=0 order by id desc".$limit;
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
		// 函数: hasDir($dir)
		// 功能: 是否存在模版目录
		// 参数: $dir目录名称
		// 返回: false或true
		//==========================================
		
		public function hasDir($dir){
			$fullPath=$this->tempDir.$dir;
			if(file_exists($fullPath)){
				return true;
			} else {
				return false;
			}
		}
		
		//==========================================
		// 函数: createDir($dir)
		// 功能: 新建模版目录
		// 参数: $dir目录名称
		// 返回: false或true
		//==========================================
		
		public function createDir($dir){
			$fullPath=$this->tempDir.$dir;
			if(mkdir($fullPath)){
				$this->messList[] = "创建模版目录成功！";
				return true;
			} else {
				$this->messList[] = "创建模版目录失败！";
				return false;
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
				$this->messList[] = "模版名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "模版名称不能超过20个字符!";
				$result=false;
			}
			if($_POST['act']=="add"){
				if(!$_FILES['preview']['size']){
					$this->messList[] = "图片不能为空!";
					$result=false;
				}
			}
			
			
			return  $result;
		}	
		
		//获取模版总个数
		public function get_templates_num(){
			$sql="select id from {$this->tabName} where is_delete=0 order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>