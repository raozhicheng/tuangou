<?php
/*==================================================================*/
	/*		文件名:Adv.class.php                              */
	/*		概要: 团购广告管理    	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Adv extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_adv";
				$this->fieldList=array("name","location","code","status","begin_time","end_time");
		}
		
		
		//==========================================
		// 函数: addAdv($post)
		// 功能: 用于向数据库中添加广告信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addAdv($post) {
		
			if($post['begin_time']==""){
				$post['begin_time']=0;
			} else {
				$post['begin_time']=strtotime($post['begin_time']);
			}
			
			if($post['end_time']==""){
				$post['end_time']=0;
			} else {
				$post['end_time']=strtotime($post['end_time']);
			}
				
				
				if($this->add($post)){
					$this->messList[] = "添加广告成功！";
					return true;
				}else{
					$this->messList[] = "添加广告失败！";
					return false;
				}
		}
		
		//==========================================
		// 函数: modAdv($post)
		// 功能: 用于向数据库中修改广告信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modAdv($post) {
				if($post['begin_time']==""){
					$post['begin_time']=0;
				} else {
					$post['begin_time']=strtotime($post['begin_time']);
				}
				
				if($post['end_time']==""){
					$post['end_time']=0;
				} else {
					$post['end_time']=strtotime($post['end_time']);
				}
				if($this->mod($post)){
					$this->messList[] = "修改广告成功！";
					return true;
				}else{
					$this->messList[] = "修改广告失败！";
					return false;
				}
			
		}
		
		//==========================================
		// 函数: delAdv($post)
		// 功能: 将广告直接删除
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================
		public function delAdv($post){
			if($this->del($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
				
		
		
		//==========================================
		// 函数: get_advs($is_all=true,$offset=0,$num=0)
		// 功能: 获取广告列表
		// 参数: is_all:是否是全部列出,status:是否选择开启状态,offset:偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_advs($is_all=true,$status=false,$id='all',$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$current_time=Common::get_gmtime();
			if($status){
				$s="where status=1 and (begin_time<{$current_time} and end_time>={$current_time})";
			} else {
				$s="where 1=1";
			}
			if($id=="all"){
				$sql="select * from {$this->tabName} ".$s." order by id desc".$limit;
			} else {
				$sql="select * from {$this->tabName} ".$s." and id='".$id."' order by id desc".$limit;
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
				$this->messList[] = "广告名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "广告名称不能超过20个字符!";
				$result=false;
			}
			
			if(!Validate::checkTime($_POST['begin_time'],$_POST['end_time'])) {
				$this->messList[] = "开始时间不能大于等于结束时间!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//获取广告总个数
		public function get_advs_num(){
			$sql="select id from {$this->tabName} order by id desc";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>