<?php
/*==================================================================*/
	/*		文件名:DealMsgList.class.php                              */
	/*		概要: 业务队列管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DealMsgList extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal_msg_list";
				$this->fieldList=array("dest","send_type","content","send_time","is_send","create_time","user_id","result","is_success","is_html","title");
		}
		//==========================================
		// 函数: addDealMsgList($post)
		// 功能: 用于向数据库中添加业务队列列表
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function addDealMsgList($post) {
			if($id=$this->add($post)){
				$this->dmlSend($post['send_type'],$id);
				$this->messList[] = "添加成功！";
				return true;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modDealMsgList($post)
		// 功能: 用于向数据库中修改业务队列列表
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modDealMsgList($post) {
			if($this->mod($post)){
				$this->messList[] = "修改成功！";
				return true;
			}else{
				$this->messList[] = "修改失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delInfo($id)
		// 功能: 将业务队列列表放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delDealMsgList($post){
			if($this->del($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		
		public function dmlSend($type,$id){
			if($type){  //邮件
				$mail_server=new MailServer();
				$getMailServer=$mail_server->get_default_server();
				if($getMailServer){
					$datas_temp=$this->get($id);
					$datas=array("FromName"=>$datas_temp['title'],"Subject"=>$datas_temp['title'],"Body"=>$datas_temp['content'],"address"=>$datas_temp['dest']);
					$is_success=$mail_server->send($getMailServer,$datas)?1:0;
					
					$result=$mail_server->getMessList();
					$temp=array("is_success"=>$is_success,"result"=>$result,"send_time"=>Common::get_gmtime(),"id"=>$id);
					if($is_success){
						$this->mysqli->query("update ".TAB_PREFIX."cms_mail_server set total_use = total_use + 1 where id =".$getMailServer['id']);
						$temp=array("is_success"=>$is_success,"is_send"=>1,"result"=>$result,"send_time"=>Common::get_gmtime(),"id"=>$id);
					}
					$this->modDealMsgList($temp);
				} else{
							$result="当前服务器状态关闭!";
				}
				
			} else {  //短信
				$sms_list=new SmsList();
				$datas_temp=$this->get($id);
				$getSms=$sms_list->read_config();
				$is_success=$sms_list->sendSMS($getSms['user_name'],$getSms['password'],$datas_temp['dest'],$datas_temp['content'])?1:0;;
				$result=$sms_list->getMessList();
				$temp=array("is_success"=>$is_success,"result"=>$result,"send_time"=>Common::get_gmtime(),"id"=>$id);
				if($is_success){
					$temp=array("is_success"=>$is_success,"is_send"=>1,"result"=>$result,"send_time"=>Common::get_gmtime(),"id"=>$id);
				}
				$this->modDealMsgList($temp);
			}
			
			if($is_success){
				$this->messList[] = $result;
				return true;
			} else {
				$this->messList[] = $result;
				return false;
			}
		}
		
		
		//==========================================
		// 函数: get_dealMsgList()
		// 功能: 获取业务队列列表
		// 参数: offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_dealMsgList($offset=0,$num=0){
			$limit="LIMIT {$offset}, {$num}";
			$sql="select * from {$this->tabName} order by id desc ".$limit;
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
		
		
		
		//获取总个数()
		public function get_dealMsgList_num(){
			$sql="select id from {$this->tabName}";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>