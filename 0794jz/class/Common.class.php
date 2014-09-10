<?php
	/*==================================================================*/
	/*		文件名:common.class.php                             */
	/*		概要: 通用管理类.                	       	    */
	/*		作者: 李文                                        */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Common {
		static function sizeCount($bytes) {       	 	     //自定义一个文件大小单位转换函数
			if ($bytes >= pow(2,40)) {      		     //如果提供的字节数大于等于2的40次方，则条件成立
				$return = round($bytes / pow(1024,4), 2);    //将字节大小转换为同等的T大小
				$suffix = "TB";                        	     //单位为TB
			} elseif ($bytes >= pow(2,30)) {  		     //如果提供的字节数大于等于2的30次方，则条件成立
				$return = round($bytes / pow(1024,3), 2);    //将字节大小转换为同等的G大小
				$suffix = "GB";                              //单位为GB
			} elseif ($bytes >= pow(2,20)) {  		     //如果提供的字节数大于等于2的20次方，则条件成立
				$return = round($bytes / pow(1024,2), 2);    //将字节大小转换为同等的M大小
				$suffix = "MB";                              //单位为MB
			} elseif ($bytes >= pow(2,10)) {  		     //如果提供的字节数大于等于2的10次方，则条件成立
				$return = round($bytes / pow(1024,1), 2);    //将字节大小转换为同等的K大小
				$suffix = "KB";                              //单位为KB
			} else {                     			     //否则提供的字节数小于2的10次方，则条件成立
				$return = $bytes;                            //字节大小单位不变
				$suffix = "Byte";                            //单位为Byte
			}
			return $return ." " . $suffix;                       //返回合适的文件大小和单位
		}
		
		//==========================================
		// 函数: getTempStr()
		// 功能: 获取模板内容
		// 参数: $tempName=模板显示变量名称,$datas=数据数组,$str=消息模板原始内容;
		// 返回: 消息模板显示内容
		//==========================================
		static function getTempStr($tempName,$datas,$str){
			$tpl=new MyTpl();
			if(!file_exists(CMS_TEMP)){
				mkdir(dirname(CMS_TEMP));
			}
			$filename=CMS_TEMP.md5(AUTH_KEY).".tpl";
			file_put_contents($filename, $str, LOCK_EX);
			$tpl->assign($tempName,$datas);
			$newStr=$tpl->fetch($filename);
			unlink($filename);
			return $newStr;
		}
		
		
		
		
		//==========================================
		// 函数: array_is_null()
		// 功能: 判断一个数组是否为空
		// 参数: 数组
		//==========================================
		static function array_is_null($arr = null){   
			if(is_array($arr)){   
			   foreach($arr as $k=>$v){   
			   	if($v&&!is_array($v)){   
					return false;   
				}   
				$t = self::array_is_null($v);   
				if(!$t){   
					return false;   
					}   
				}   
				return true;   
			}elseif(!$arr){   
				return true;   
					}else{   
				return false;   
			}   
   		 }
		    
 		static function get_gmtime(){
			//return (time() - date('Z'));
			return time();
		}
		
		static function date_to_name(){
			return date("Ymdhis",self::get_gmtime()).rand(100,999);
		}
		
		static function to_date($utc_time, $format = 'Y-m-d H:i:s') {
			if (empty ( $utc_time )) {
				return '';
			}
			$timezone = intval(self::get_config('TIME_ZONE'));
			if($timezone==8){
				$time = $utc_time;
			} else {
				$time = $utc_time - $timezone * 3600; 
			}
			return date ($format, $time);
		}
		
		
		static function get_rand_num($bit){
			$tmpStr = "abcdefghijklmnopqrstuvwxyz0123456789";
			$str = "";
			for ($i=0; $i<$bit; $i++) {
				$num = rand(0, strlen($tmpStr));
				$str .= $tmpStr[$num];
			}
			return $str;
		}
		//==========================================
		// 函数: check_files_num()
		// 功能: 判断提交上传文件不为空的个数
		// 参数: $_FILES
		//==========================================
		static function check_files_num($files){
			$num=0;
			$k=array();
			foreach($files as $key=>$val){
				if(!empty($val['name'])){
					$num++;
					array_push($k,$key);
				}
			}
			$arr=array("num"=>$num,"key"=>$k);
			return $arr;
		}
		
		
		static function get_config($confName){
			$filename=CMS_ROOT."/data/config/config.php";
			if(file_exists($filename)){
				include($filename);
				return stripslashes($sys_config[$confName]);
			} else {
				exit("配置文件意外丢失！");
			}
		}
		
		//页面跳转
		static function redirect($url,$time=0,$msg='')	{
			//多行URL地址支持
			$url = str_replace(array("\n", "\r"), '', $url);
			if(empty($msg))
				$msg    =   "系统将在{$time}秒之后自动跳转到{$url}！";
			if (!headers_sent()) {
				// redirect
				if(0===$time) {
					header("Location: ".$url);
				}else {
					header("refresh:{$time};url={$url}");
					echo($msg);
				}
				exit();
			}else {
				$str    = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
				if($time!=0)
					$str   .=   $msg;
				exit($str);
			}
		}
		/**
		 * 字符串截取
		 *
		 * @author gesion<gesion@163.com>
		 * @param string $str 原始字符串
		 * @param int    $len 截取长度（中文/全角符号默认为 2 个单位，英文/数字为 1。
		 *                    例如：长度 12 表示 6 个中文或全角字符或 12 个英文或数字）
		 * @param bool   $dot 是否加点（若字符串超过 $len 长度，则后面加 "..."）
		 * @return string
		 */
		static function g_substr($str, $len = 12, $dot = true) {
			$i = 0;
			$l = 0;
			$c = 0;
			$a = array();
			while ($l < $len) {
				$t = substr($str, $i, 1);
				if (ord($t) >= 224) {
					$c = 3;
					$t = substr($str, $i, $c);
					$l += 2;
				} elseif (ord($t) >= 192) {
					$c = 2;
					$t = substr($str, $i, $c);
					$l += 2;
				} else {
					$c = 1;
					$l++;
				}
				// $t = substr($str, $i, $c);
				$i += $c;
				if ($l > $len) break;
				$a[] = $t;
			}
			$re = implode('', $a);
			if (substr($str, $i, 1) !== false) {
				array_pop($a);
				($c == 1) and array_pop($a);
				$re = implode('', $a);
				$dot and $re .= '...';
			}
			return $re;
		}
		
		
		
		static function rewrite_url($url){
			
			if(strpos($url,"?")){
				$symbol="&";
			} else {
				$symbol="?";
			}
			if(!isset($_GET['city'])){
				$city_default=$GLOBALS['city']->get_current_city();
				$url.=$symbol."city=".$city_default['uname'];
			} else {
				$url.=$symbol."city=".$_GET['city'];
			}
			
			return $url;
		}
		
		
		
		static function arrayRecursive(&$array, $function, $apply_to_keys_also = false){
			static $recursive_counter = 0;
			if (++$recursive_counter > 1000) {
				die('possible deep recursion attack');
			}
			foreach ($array as $key => $value) {
				if (is_array($value)) {
					self::arrayRecursive($array[$key], $function, $apply_to_keys_also);
				} else {
					$array[$key] = $function($value);
				}
				if ($apply_to_keys_also && is_string($key)) {
					$new_key = $function($key);
					if ($new_key != $key) {
						$array[$new_key] = $array[$key];
						unset($array[$key]);
					}
				}
			}
			$recursive_counter--;
		}
		
		static function ajax_return($data){
			self::arrayRecursive($data, 'urlencode', true);
			echo(urldecode(json_encode($data)));
			exit;
		}
		
		
		static function ajax_msg_return($msg,$status){
			$result['status'] = $status;
			$result['info'] = $msg;
			header("Content-Type:text/html; charset=gb2312");
			self::ajax_return($result);
			exit;
		}
		
		
		
		static function compress_html($string) { 
			$string = str_replace("\r\n", '', $string); //清除换行符 
			$string = str_replace("\n", '', $string); //清除换行符 
			$string = str_replace("\t", '', $string); //清除制表符 
			$string=str_replace("\"","'",$string);//双引号换为单引号
			$pattern = array ( 
			"/> *([^ ]*) *</", //去掉注释标记 
			"/[\s]+/", 
			"/<!--[^!]*-->/", 
			"/\" /", 
			"/ \"/", 
			"'/\*[^*]*\*/'" 
			); 
			$replace = array ( 
			">\\1<", 
			" ", 
			"", 
			"\"", 
			"\"", 
			"" 
			); 
			return preg_replace($pattern, $replace, $string); 
		} 
				/**
		 * 验证访问IP的有效性
		 * @param ip地址 $ip_str
		 * @param 访问页面 $module
		 * @param 时间间隔 $time_span
		 * @param 数据ID $id
		 */
		 static function check_ipop_limit($ip_str,$module,$time_span=0,$id=0){
			if(empty($_SESSION[$module."_".$id."_ip"])){
				$check['ip']	=	 self::get_ip();
				$check['time']	=	self::get_gmtime();
				$_SESSION[$module."_".$id."_ip"] = $check;
				
				return true;  //不存在session时验证通过
			}else {   
				$check['ip']	=	 self::get_ip();
				$check['time']	=	self::get_gmtime();    
				$origin	=	$_SESSION[$module."_".$id."_ip"];
				
				if($check['ip']==$origin['ip']){
					if($check['time'] - $origin['time'] < $time_span){
						return false;
					}else {
						$_SESSION[$module."_".$id."_ip"] = $check;
						return true;  //不存在session时验证通过    				
					}
				}else{
					$_SESSION[$module."_".$id."_ip"] = $check;
					return true;  //不存在session时验证通过
				}
			}
		}
		
		//==========================================
		// 函数: get_ip()
		// 功能: 返回IP地址
		// 参数: 无
		//==========================================
		static function get_ip() 
		{
			if(getenv('HTTP_CLIENT_IP')){
				$onlineip=getenv('HTTP_CLIENT_IP');
			}else if(getenv('HTTP_X_FORWARDED_FOR')){
				$onlineip=getenv('HTTP_X_FORWARDED_FOR');
			}else if(getenv('REMOTE_ADDR')){
				$onlineip=getenv('REMOTE_ADDR');
			}else{
				$onlineip=$_SERVER['REMOTE_ADDR'];
			}
			return $onlineip;
		}
		
		// 判断Cookie是否存在
		static function is_set($name) {
			return isset($_COOKIE[$name]);
		}
	
		// 获取某个Cookie值
		static function get($name) {
			$value   = $_COOKIE[$name];
			//$value   =  unserialize(base64_decode($value));
			return $value;
		}
	
		// 设置某个Cookie值
		static function set($name,$value,$expire='',$path='',$domain='') {   
			$path = CMS_ROOT;    
			$expire =   !empty($expire)?self::get_gmtime()+$expire:0;
			//$value   =  base64_encode(serialize($value));
			setcookie($name, $value,$expire,$path,$domain);
			$_COOKIE[$name]  =   $value;
		}
	
		// 删除某个Cookie值
		static function delete($name) {
			self::set($name,'',time()-3600);
			unset($_COOKIE[$name]);
		}
	
		// 清空Cookie值
		static function clear() {
			unset($_COOKIE);
		}
		
		
		
	}	
	
?>
