<?php
/*==================================================================*/
	/*		文件名:Referral.class.php                              */
	/*		概要: 返利管理      	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Referral extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_referrals";
				$this->fieldList=array("user_id","rel_user_id","money","create_time","pay_time","order_id","score","is_delete");
		}
		
		
		
		
		
		
		public function addReferral($post) {
			if($this->add($post)){
				return true;
			}else{
				return false;
			}
		}
		
		//==========================================
		// 函数: delReferral($id)
		// 功能: 将回返利内容移动到回收站
		// 参数: id是返利ID
		// 返回: true或false
		//==========================================
		public function delReferral($post){
			if($this->del($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delReferrals($id)
		// 功能: 将返利内容放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delReferrals($id) {
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
		// 函数: get_referrals()
		// 功能: 获取回收站列表
		// 参数:  offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_referrals($offset=0,$num=0){
			$limit=" LIMIT {$offset}, {$num}";
		    $sql="select * from {$this->tabName} where is_delete!=1 order by id desc".$limit;
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
		
		public function get_front_referral($user_id=0,$offset=0,$num=0){
			$sql = "select u.user_name as i_user_name,u.referral_count as i_referral_count,u.create_time as i_reg_time,o.order_sn as i_order_sn,r.create_time as i_referral_time, r.pay_time as i_pay_time,r.money as i_money,r.score as i_score from ".TAB_PREFIX."cms_user as u left join {$this->tabName} as r on u.id = r.rel_user_id and u.pid = r.user_id left join ".TAB_PREFIX."cms_deal_orders as o on r.order_id = o.id where u.pid = ".$user_id.$limit;
			$sql_count = "select count(*) from ".TAB_PREFIX."cms_user where pid = ".$user_id;
			$count = $this->getOne($sql_count);
			if($user_id){
				$list = $this->getAll($sql);
				
			}else{
				if($offset!=0 || $num!=0){
					$limit=" LIMIT {$offset}, {$num}";
				} else{
					$limit="";
				}
				$result=$this->mysqli->query($sql);
				if(!$result){
					return false;
				} else {
					while($row=$result->fetch_assoc()){
							$list[]=$row;
					}
				}
			}
			return array("list"=>$list,'count'=>$count);
		}
		
		//获取总个数(
		public function get_referrals_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>