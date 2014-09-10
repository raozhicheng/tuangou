<?php
/*==================================================================*/
	/*		文件名:MsgTemplate.class.php                              */
	/*		概要: 消息模版      	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class MsgTemplate extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_msg_template";
				$this->fieldList=array("ch_name","name","content","type","is_html");
		}
		
		
		
		//==========================================
		// 函数: modMsgTemplate($post)
		// 功能: 用于向数据库中修改消息模版
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================
		public function modMsgTemplate($post){
			if($this->mod($post)){
				$this->messList[] = "更新成功！";
				return true;
			}else{
				$this->messList[] = "更新失败！";
				return false;
			}
		}
		
		
				
		//==========================================
		// 函数: get_msgTemplates()
		// 功能: 获取消息模版列表
		// 参数: 无
		// 返回: false或列表
		//==========================================
		public function get_msgTemplates(){
		    $sql="select * from {$this->tabName} order by id desc";
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
			if(!Validate::required($_POST['content'])){
				$this->messList[] = "消息模版内容不能为空!";
				$result=false;
			}
			
			
			
			return  $result;
		}	
		
	}
	
?>