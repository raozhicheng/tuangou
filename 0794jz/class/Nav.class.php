<?php
/*==================================================================*/
	/*		文件名:Nav.class.php                              */
	/*		概要: PHP系统导航类      	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
class Nav extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_nav";
				$this->fieldList=array("name","status","rank","is_newWindow","url","module","action","u_id");
		}
		
		//==========================================
		// 函数: get_module()
		// 功能: 获取模型列表
		// 参数: 无
		// 返回: false或列表
		//==========================================
		public function get_module(){
		    $module=array("index"=>"网站首页","deals"=>"团购模型","infos"=>"信息模型","message"=>"留言模型","define_url"=>"自定义URL");
			return $module;
		}
		
		
		//==========================================
		// 函数: get_nav()
		// 功能: 获取导航列表
		// 参数: 无
		// 返回: false或列表
		//==========================================
		public function get_nav($nav_status=1){
			if($nav_status){
		    	$sql="select * from {$this->tabName} where status={$nav_status} order by rank";
			} else {
				$sql="select * from {$this->tabName} order by rank";
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
		// 函数: modNav($post)
		// 功能: 用于向数据库中修改导航信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modNav($post){
			$post=$this->filter($post);
				if($this->mod($post)){
					$this->messList[] = "修改成功！";
					return true;
				}else{
					$this->messList[] = "修改失败！";
					return false;
				}
			
		}
		
		private function filter($post){
			switch($post['module']){
				case 'index':
				case 'infos':
				case 'message':
					$post['action']="";
					$post['url']="";
				break;
			}
			return $post;
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
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "名称不能超过20个字符!";
				$result=false;
			}
			if(!Validate::required($_POST['rank'])){
				$this->messList[] = "顺序不能为空!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['rank'])){
				$this->messList[] = "顺序必须为数字!";
				$result=false;
			}
			
			return  $result;
		}	

}

?>