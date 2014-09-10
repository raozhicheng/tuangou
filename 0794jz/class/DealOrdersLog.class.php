<?php
	/*==================================================================*/
	/*		文件名:DealOrdersLog.class.php                           */
	/*		概要: 团购日志操作类.                	       	    */
	/*		作者: 李文                                        */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DealOrdersLog extends BaseLogic{
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal_order_log";
				$this->fieldList=array("log_info","log_time","order_id","log_ip");
		}
		
		//==========================================
		// 函数: write_log()
		// 功能: 写入日志
		// 参数: 无
		//==========================================
		public function write_log($info,$id){
			$log_time=Common::get_gmtime();
			$log_ip=Common::get_ip();
			$post=array("log_info"=>$info,
						"log_time"=>$log_time,
						"order_id"=>$id,
						"log_ip"=>$log_ip,
						);
			if($this->add($post)){
				return true;
			}else{
				return false;
			}
		}
		
		
		//==========================================
		// 函数: delLogs($id)
		// 功能: 将日志放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delLogs($post){
			if($this->del($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		
		//==========================================
		// 函数: get_logs()
		// 功能: 获取日志列表
		// 参数: offset:偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_logs($offset=0,$num=0){
			$limit=" LIMIT {$offset}, {$num}";
			$sql="select * from {$this->tabName} order by id asc".$limit;
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
		
		

		//获取日志总个数
		public function get_logs_num(){
			$sql="select id from {$this->tabName}";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
?>
