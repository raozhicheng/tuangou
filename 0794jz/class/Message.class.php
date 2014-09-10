<?php
/*==================================================================*/
	/*		文件名:Message.class.php                              */
	/*		概要: 留言管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Message extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_message";
				$this->fieldList=array("title","content","create_time","update_time","admin_reply","admin_id","group_id","user_id","is_member","city_id","is_delete");
		}
		//==========================================
		// 函数: addMessage($post)
		// 功能: 用于向数据库中添加留言
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addMessage($post) {
			$post["admin_reply"]=stripslashes($post["admin_reply"]);
			$post["admin_id"]=$_SESSION[md5(AUTH_KEY)]['id'];
			if($this->add($post)){
				$this->messList[] = "添加成功！";
				return true;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modMessage($post)
		// 功能: 用于向数据库中修改留言
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modMessage($post) {
			$post["admin_reply"]=stripslashes($post["admin_reply"]);
			$post["admin_id"]=$_SESSION[md5(AUTH_KEY)]['id'];
			if($this->mod($post)){
				$this->messList[] = "回复成功！";
				return true;
			}else{
				$this->messList[] = "回复失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delMessage($id)
		// 功能: 将留言放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delMessage($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delMessages($id)
		// 功能: 将留言放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delMessages($id) {
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
		// 函数: get_messages()
		// 功能: 获取留言
		// 参数: is_all:是否是全部列出,offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_messages($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where is_delete=0 order by id asc".$limit;
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
		
		
		
		public function get_front_messages($deal_id=0,$city_id=0,$user_id=0,$group_info=array(),$offset=0,$num=0){
			$condition="";
			if($offset!=0 || $num!=0){
				$limit=" LIMIT {$offset}, {$num}";
			} else{
				$limit="";
			}
			if($deal_id){
				$condition.= " and group_id = '".$group_info[0]['id']."' and rel_id = ".$deal_id;
			}else{
				$condition.= " and group_id = '".$group_info[0]['id']."'";
			}
			if($city_id){
				$all=$this->getAll("select id,pid from ".TAB_PREFIX."cms_city where status=1");
				$arr=$this->get_child_datas($city_id,$all);
				$condition.=" and city_id in (".implode(",",$arr).")";
			}
			
			if(!Common::get_config("MSG_AUTO_EFFECT")){
				$condition.= " and user_id = ".$user_id;
			}else {
				if($group_info[0]['is_member']){
					$condition.= " and user_id = ".$user_id;
				}
			}
			$sql="select * from {$this->tabName} where is_delete=0".$condition." order by create_time desc".$limit;
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
		
		
		
		/*取得子集并形成数组*/
		private function get_child_datas($id=0,$datas=array(),$ids=array()){
			$ids[]=$id;
			foreach($datas as $value){
				if($value['pid']==$id){
					return $this->get_child_datas($value['id'],$datas,$ids);
				}
			}
			return $ids;
		}
		
		//==========================================
		// 函数: validateForm()
		// 功能: 对添加的内容或修改的内容进行验证
		// 参数: 无
		// 返回: true或false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['admin_reply'])){
				$this->messList[] = "回复内容不能为空!";
				$result=false;
			}
			
			return  $result;
		}	
		
		//获取留言总个数()
		public function get_message_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>