<?php
/*==================================================================*/
	/*		文件名:UserLog.class.php                              */
	/*		概要: 会员日志管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class UserLog extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_user_log";
				$this->fieldList=array("log_info","log_time","log_admin_id","log_user_id","money","score","user_id");
				
		}
		//==========================================
		// 函数: addUserLog($post)
		// 功能: 用于向数据库中添加会员日志
		// 参数: post是用户在表单中提交的全部内容数组
		// 返回: true或false
		//==========================================	
		public function addUserLog($post) {
			if($this->add($post)){
				
				$this->messList[] = "添加成功！";
				return $id;
			}else{
				$this->messList[] = "添加失败！";
				return false;
			}
		}
		
		
		
		
		//==========================================
		// 函数: delUserLog($id)
		// 功能: 将会员日志直接删除
		// 参数: $post
		// 返回: true或false
		//==========================================
		public function delUserLog($post){
			if($this->del($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: modAccount()
		// 功能: 会员资金积分变化操作函数
		// 参数: data=>money,score,user_id msg
		// 返回: 无
		//==========================================
		public function modAccount($data=array(),$msg){
			
			$user_data=TAB_PREFIX."cms_user";
			if(intval($data['score'])!=0){
				$this->mysqli->query("update ".$user_data." set score = score + ".intval($data['score'])." where id =".$data['user_id']);
			}
			if(floatval($data['money'])!=0){
				$this->mysqli->query("update ".$user_data." set money = money + ".floatval($data['money'])." where id =".$data['user_id']);
			}
			
			if(intval($data['score'])!=0||floatval($data['money'])!=0){
				
				$log_info['log_info'] = $msg;
				$log_info['log_time'] = Common::get_gmtime();
				$adm_session = $_SESSION[md5(AUTH_KEY)];
				$adm_id = intval($adm_session['id']);
				if($adm_id!=0){
					$log_info['log_admin_id'] = $adm_id;
				}else{
					$log_info['log_user_id'] = isset($_SESSION['user_id'])?intval($_SESSION['user_id']):0;
				}
				$log_info['money'] = floatval($data['money']);
				$log_info['score'] = intval($data['score']);
				$log_info['user_id'] = $data['user_id'];
				$this->addUserLog($log_info);
				
			}
		}
				
		
		
		//==========================================
		// 函数: get_userLogs()
		// 功能: 获取会员日志
		// 参数: offset:is_all为否的话偏移量,num:个数,is_search为是否查询
		// 返回: false或列表
		//==========================================
		public function get_userLogs($offset=0,$num=0,$user_id=0){
			if($offset!=0 || $num!=0){
				$limit=" LIMIT {$offset}, {$num}";
			} else{
				$limit="";
			}
			if(!$user_id){
				$sql="select * from {$this->tabName} order by log_time desc".$limit;
			} else {
				$sql="SELECT * from {$this->tabName} WHERE user_id={$user_id} order by log_time desc".$limit;
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
		
		
		//获取会员日志个数
		public function get_userLog_num($user_id){
			$sql="select id from {$this->tabName} where user_id={$user_id}";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>