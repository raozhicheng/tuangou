<?php
/*==================================================================*/
	/*		文件名:Recycle.class.php                              */
	/*		概要: 回收站      	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Recycle extends BaseLogic {
		
		private $name;
		
		public function __construct($tables,$current,$showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX.$current;
				$this->fieldList=array($tables[$current][1],"is_delete");
				$this->name="id".",".$tables[$current][1];
		}
		
		//==========================================
		// 函数: modRecycle($post)
		// 功能: 用于向数据库中还原信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modRecycle($post) {
			if($this->restore($post)){
				$this->messList[] = "还原成功！";
				return true;
			}else{
				$this->messList[] = "还原失败！";
				return false;
			}
		}
		
		
		function restore($id) {
			if(is_array($id))
				$tmp = "IN (" . join(",", $id) . ")";
			else 
				$tmp = "= $id";
			
			$sql = "UPDATE {$this->tabName} SET is_delete=0  WHERE id " . $tmp ;
			return $this->mysqli->query($sql);	
		
		}
		//==========================================
		// 函数: delRecycle($id)
		// 功能: 将回收站内容真正删除
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delRecycle($post){
			if($this->del($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
	
		
		//==========================================
		// 函数: get_recycle()
		// 功能: 获取回收站列表
		// 参数:  offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_recycle($offset=0,$num=0){
			
			$limit=" LIMIT {$offset}, {$num}";
		    $sql="select {$this->name} from {$this->tabName} where is_delete=1 order by id desc".$limit;
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
		
		//获取总个数(
		public function get_recycle_num(){
			$sql="select id from {$this->tabName} where is_delete=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>