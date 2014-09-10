<?php
/*==================================================================*/
	/*		文件名:City.class.php                              */
	/*		概要: 城市分类      	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class City extends BaseLogic {
		private $city_list=array();
		private $city_num;
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_city";
				$this->fieldList=array("name","uname","pid","status","is_open","description","notice","seo_title","seo_keyword","seo_description","is_delete","is_default");
		}
		//==========================================
		// 函数: addCity($post)
		// 功能: 用于向数据库中添加城市信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addCity($post) {
			$post["description"]=stripslashes($post["description"]);
			$post["notice"]=stripslashes($post["notice"]);
			if($id=$this->add($post)){
				$this->messList[] = "添加成功！";
				return $id;
			}else{
				$this->messList[] = "添加失败,可能城市名称重复！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modCity($post)
		// 功能: 用于向数据库中修改城市信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modCity($post) {
			$post["description"]=stripslashes($post["description"]);
			$post["notice"]=stripslashes($post["notice"]);
			if($this->mod($post)){
				$this->messList[] = "修改成功！";
				return true;
			}else{
				$this->messList[] = "修改失败,可能城市名称重复！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delCity($id)
		// 功能: 将城市放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delCity($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delCities($id)
		// 功能: 将城市组放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delCities($id) {
			if(count($id)==0){
				$this->messList[] = "请选择您要删除的城市！";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1,is_default=0 WHERE id ";
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
		
		public function set_Default($post) {
			$sql="update {$this->tabName} set is_default=0 where is_default=1";
			$result=$this->mysqli->query($sql);
			if($result && $this->mod($post)) {
				$this->messList[] = "更改城市默认值成功！";
				return true;
			} else {
				$this->messList[] = "更改失败！";
				return false;
			}
		}
		
		public function get_current_city(){
			
			/*$ip=Common::get_ip();
			$location=new Location();
			$address=$location->getaddress($ip);
			$city_list=$this->get_city_list("all",$is_open=1);
			foreach($city_list as $city){
				if(strpos($address['area1'],$city['name'])){
					$deal_city = $city;
					break;
				}
			}
			*/
			if(!$deal_city){
			
				if(!$_GET['city']){
					$sql="select * from {$this->tabName} where is_delete!=1 and status=1 and is_open=1 and is_default=1";
				} else {
					$sql="select * from {$this->tabName} where is_delete!=1 and status=1 and is_open=1 and uname='".$_GET['city']."'";
				}
				$result=$this->mysqli->query($sql);
				if($result && $result->num_rows ==1){
					
					return $result->fetch_assoc();;
				}else{
					return false;
				}
			} else {
				return $deal_city;
			}
		}
		//获取城市列表
		public function get_city_list($id,$is_open=1,$is_sort=0){
			if($id=='all'){
				$condition.="";
			} else {
				$condition.=" and pid={$id}";
			}
			$sql="select * from {$this->tabName} where is_delete!=1 and status=1 and is_open={$is_open}".$condition;
			$result=$this->mysqli->query($sql);
			while($row=$result->fetch_assoc()){
				
				$temp[]=$row;
			}
			if($is_sort){
				return $this->sort_cities($temp);
				 
			} else {
				return $temp;
			}
		}
		
		//==========================================
		// 函数: get_cities()
		// 功能: 获取城市列表
		// 参数: is_delete:是否为已删除,is_all:是否是全部列出,offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_cities($is_delete=false,$is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			if(!$is_delete){
				$sql="select * from {$this->tabName} where is_delete!=1 order by id desc".$limit;
			} else {
				$sql="select * from {$this->tabName} order by id desc".$limit;
			}
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
						$temp[]=$row;
				}
				if(count($temp)!=0){
					$this->sort_cities($temp);
					return $this->city_list;
				}
				return $temp;
			}
		}
		
		//按分类排序城市列表
		private function sort_cities($array,$pid=0,$level=0){
			$data=array();
			foreach($array as $value){
				if($value["pid"]==$pid){
					array_push($data,$value);
				}
			}
			if(!empty($data)){
				foreach($data as $value){
					if($value["pid"]!=0){
						$value["name"]=str_repeat('&nbsp;',$level*3).'├'.$value["name"];
					} 
					$this->city_list[]=$value;
					$this->sort_cities($array,$value["id"],$level+1);
				}
		
			}
			return $this->city_list;
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
				$this->messList[] = "城市名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "城市名称不能超过20个字符!";
				$result=false;
			}
			if(!Validate::required($_POST['uname'])){
				$this->messList[] = "URL名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['notice'], 300)) {
				$this->messList[] = "城市公告不能超过300个字符!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['seo_title'], 30)) {
				$this->messList[] = "文章作者不能超过30个字符!";
				$result=false;
			}
			if(!Validate::required($_POST['description'])) {
				$this->messList[] = "城市说明不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['seo_keyword'], 20)){
				$this->messList[] = "关键字不能超过20个字符!";
				$result=false;
			}
			if(!Validate::required($_POST['notice'])) {
				$this->messList[] = "城市公告不能为空!";
				$result=false;
			}
			return  $result;
		}	
		
		//获取城市总个数(false=未删除,true=已删除)
		public function get_city_num($is_delete=false){
			if(!$is_delete){
				$sql="select * from {$this->tabName} where is_delete!=1 order by id desc";
			} else {
				$sql="select * from {$this->tabName} order by id desc";
			}
			$result=$this->mysqli->query($sql);
			$this->city_num=$result->num_rows;
			return $this->city_num;
		}
	}
	
?>