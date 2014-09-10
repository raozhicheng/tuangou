<?php
/*==================================================================*/
	/*		文件名:SysConfig.class.php                              */
	/*		概要: 系统设置管理     	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class SysConfig extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_config";
				$this->fieldList=array("name","value");
				$this->config_path=CMS_ROOT."data/config/config.php";
		}
		
		
		//==========================================
		// 函数: modSysConfig($post)
		// 功能: 用于向数据库中修改系统设置列表
		// 参数: post是用户在表单中提交的文章全部内容数组,$fileUpload是调用
		//		 FileUpload类,$file是提交的图片
		// 返回: true或false
		//==========================================	
		public function modSysConfig($fileUpload,$post,$file) {
			
			$content_arr=array("SITE_CLOSE_HTML","SITE_FOOTER","REFERRAL_HELP","REFERRAL_SIDE_HELP","COUPON_PRT_TPL");
			$file_arr=Common::check_files_num($file);
			foreach($content_arr as $val){
				$post[$val]=stripslashes($post[$val]);
			}
			
			foreach($file as $key=>$val){
				if(!$file[$key]['name']){
					unset($file[$key]);
				}
			}
			
			if(!$file_arr['num']){
				if($this->mod_config($post)){
					$this->write_config($post);
					$this->messList[] = "修改成功！";
					return true;
				}else{
					$this->messList[] = "修改失败！";
					return false;
				}
			} else{
				if($this->uploadPics($fileUpload,$file_arr,$file)){
					
					$fileMultiNames=$fileUpload->getNewFileMultiName();
					if($file_arr['num']>1){
						foreach($file_arr['key'] as $val){
							$post[$val]=$fileMultiNames[$val];
						}
					} else {
						$post[$file_arr['key'][0]]=$fileUpload->getNewFileName();
					}
					if($this->mod_config($post)){
						$this->write_config($post);
						$this->messList[] = "修改成功！";
						return true;
					}else{
						$this->messList[] = "修改失败！";
						return false;
					}
					
				}else {
					$this->messList[] = "图片添加失败！";
					return false;
				}

			}
			
			
		}
		
		
		
		public function getSysConfig(){
			$arr=array("base_config"=>array(),"img_config"=>array(),"member_config"=>array(),"site_config"=>array(),"mail_config"=>array());
			$sql="select * from {$this->tabName} order by id asc";
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
					$temp[]=$row;
					if($row['id']>=1 && $row['id']<=15){
						array_push($arr['base_config'],$row);
					} elseif($row['id']>=16 && $row['id']<=26){
						array_push($arr['img_config'],$row);
					} elseif($row['id']>=27 && $row['id']<=33){
						array_push($arr['member_config'],$row);
					} elseif($row['id']>=33 && $row['id']<=58){
						array_push($arr['site_config'],$row);
					} elseif($row['id']>=59 && $row['id']<=69){
						array_push($arr['mail_config'],$row);
					}
				}
			}
			return $arr;
		}
		
		private function mod_config($arr){
			$value='';
			$sql='';
			$tabNames=$this->getConfigNames();
			foreach ($arr as $k=>$v) {
				if(in_array($k, $tabNames)){
					if (!get_magic_quotes_gpc()){
						$value="'".addslashes($v)."'";
					}else{
						$value="'".$v."'";
					}
					$sql.="update {$this->tabName} set value={$value} where name='{$k}';";
				}
				
			}
			return $this->mysqli->multi_query($sql);
		}
		
		
		private function getConfigNames(){
			$sql="select name from {$this->tabName}";
			$result=$this->mysqli->query($sql);
			while($row=$result->fetch_assoc()){
				$temp[]=$row['name'];
			}
			return $temp;
		}
		
		private function write_config($arr){
			if(!file_exists($this->config_path)){
				mkdir(dirname($this->config_path));
			}
			$content = "<?php\r\n";
			$content .= "\$sys_config = " . var_export($arr, true) . ";\r\n";
			$content .= "?>";
			file_put_contents($this->config_path, $content, LOCK_EX);
		}
		
		
		private function uploadPics($fileUpload,$file_arr,$file){
			if($file_arr['num']>1){
				$fun=$fileUpload->uploadFiles($file);
			} else {
				$fun=$fileUpload->uploadFile($file[$file_arr['key'][0]]);
			}
			if($fun<0){
				$this->messList[] = $fileUpload->getErrorMsg();
				return false;
			}else{
				$this->messList[] = "图片上传成功！";
				return true;
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
			if(!Validate::isNumber($_POST['FILE_MAXSIZE'])){
				$this->messList[] = "文件上传大小须为数字!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['SUBMIT_DELAY'])){
				$this->messList[] = "表单防刷间隔须为数字!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['EXPIRED_TIME'])){
				$this->messList[] = "后台超时时间须为数字!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['BIG_WIDTH']) || !Validate::isNumber($_POST['BIG_HEIGHT']) || !Validate::isNumber($_POST['SMALL_WIDTH']) || !Validate::isNumber($_POST['SMALL_HEIGHT'])){
				$this->messList[] = "图片尺寸须为数字!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['MARK_ALPHA'])){
				$this->messList[] = "水印透明度须为数字!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['IMG_MAXSIZE'])){
				$this->messList[] = "上传图片大小须为字节!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['INVITE_REFERRALS'])){
				$this->messList[] = "邀请返利须为数字!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['REFERRAL_LIMIT'])){
				$this->messList[] = "购买返利次数须为数字!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['REFERRAL_DELAY'])){
				$this->messList[] = "返利延时须为数字!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['DEAL_PAGE_SIZE']) || !Validate::isNumber($_POST['PAGE_SIZE'])){
				$this->messList[] = "分页须为数字!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['HELP_CATE_NUM']) || !Validate::isNumber($_POST['HELP_ITEM_NUM'])){
				$this->messList[] = "帮助分类须为数字!";
				$result=false;
			}
			if(!Validate::match($_POST['REPLY_MAIL_ADD'],"/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/")) {
				$this->messList[] = "邮箱格式不正确!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['COUPON_MAIL_LIMIT']) || !Validate::isNumber($_POST['COUPON_SMS_LIMIT'])){
				$this->messList[] = "通知次数须为数字!";
				$result=false;
			}
			return  $result;
		}	
		
}
?>