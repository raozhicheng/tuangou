<?php
/*==================================================================*/
	/*		文件名:Weight.class.php                              */
	/*		概要: 团购重量单位管理    	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Weight extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_weight";
				$this->fieldList=array("name","rate");
		}
		
		
		//==========================================
		// 函数: addWeight($post)
		// 功能: 用于向数据库中添加重量单位信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addWeight($post) {
					
				if($this->add($post)){
					$this->messList[] = "添加重量单位成功！";
					return true;
				}else{
					$this->messList[] = "添加重量单位失败！";
					return false;
				}
		}
		
		//==========================================
		// 函数: modWeight($post)
		// 功能: 用于向数据库中修改重量单位信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modWeight($post) {
				if($this->mod($post)){
					$this->messList[] = "修改重量单位成功！";
					return true;
				}else{
					$this->messList[] = "修改重量单位失败！";
					return false;
				}
			
		}
		
		//==========================================
		// 函数: delWeight($post)
		// 功能: 将重量单位直接删除
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================
		public function delWeight($post){
			if($this->del($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
				
		
		
		//==========================================
		// 函数: get_weight($is_all=true,$offset=0,$num=0)
		// 功能: 获取重量单位列表
		// 参数: is_all:是否是全部列出,offset:偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_weight($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} order by id desc".$limit;
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
				$this->messList[] = "重量单位名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "重量单位名称不能超过20个字符!";
				$result=false;
			}
			if(!Validate::required($_POST['rate'])) {
				$this->messList[] = "重量单位不能为空!";
				$result=false;
			}
			if(!Validate::isFloat($_POST['rate'])){
				$this->messList[] = "重量单位必须为数字!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//获取重量单位总个数
		public function get_Weight_num(){
			$sql="select id from {$this->tabName} order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>