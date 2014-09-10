<?php
/*==================================================================*/
	/*		文件名:DealImg.class.php                              */
	/*		概要: 团购图片管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DealImg extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal_imgs";
				$this->fieldList=array("img","deal_id","sort");
		}
		
		
		//==========================================
		// 函数: addDealImg($post)
		// 功能: 用于向数据库中添加团购图片信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addDealImg($post) {
				if($this->add($post)){
					return true;
				}else{
					return false;
				}
		}
		
		
		//==========================================
		// 函数: modDealImg($post)
		// 功能: 将提交的内容更新到数据库
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modDealImg($post) {
					if($this->mod($post)){
						return true;
					}else{
						return false;
					}
			
		}
		
		//==========================================
		// 函数: delDealImg($post)
		// 功能: 将团购图片删除
		// 参数: 提交数据
		// 返回: true或false
		//==========================================
		public function delDealImg($post) {
			if($this->del($post)){
				return true;
			}else{
				return false;
			}
		}
		
				
		
		//==========================================
		// 函数: get_dealImg()
		// 功能: 获取团购图片列表
		// 参数: id
		// 返回: false或列表
		//==========================================
		public function get_dealImg($id){
			$sql="select * from {$this->tabName} where deal_id={$id} order by sort";
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
					$row['img']=GALLERY_PATH.$row['img'];
					$temp[]=$row;
				}
				return $temp;
			}
			
		}
		
		
		
		
	}
	
?>