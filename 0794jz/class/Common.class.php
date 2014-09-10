<?php
	/*==================================================================*/
	/*		�ļ���:common.class.php                             */
	/*		��Ҫ: ͨ�ù�����.                	       	    */
	/*		����: ����                                        */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Common {
		static function sizeCount($bytes) {       	 	     //�Զ���һ���ļ���С��λת������
			if ($bytes >= pow(2,40)) {      		     //����ṩ���ֽ������ڵ���2��40�η�������������
				$return = round($bytes / pow(1024,4), 2);    //���ֽڴ�Сת��Ϊͬ�ȵ�T��С
				$suffix = "TB";                        	     //��λΪTB
			} elseif ($bytes >= pow(2,30)) {  		     //����ṩ���ֽ������ڵ���2��30�η�������������
				$return = round($bytes / pow(1024,3), 2);    //���ֽڴ�Сת��Ϊͬ�ȵ�G��С
				$suffix = "GB";                              //��λΪGB
			} elseif ($bytes >= pow(2,20)) {  		     //����ṩ���ֽ������ڵ���2��20�η�������������
				$return = round($bytes / pow(1024,2), 2);    //���ֽڴ�Сת��Ϊͬ�ȵ�M��С
				$suffix = "MB";                              //��λΪMB
			} elseif ($bytes >= pow(2,10)) {  		     //����ṩ���ֽ������ڵ���2��10�η�������������
				$return = round($bytes / pow(1024,1), 2);    //���ֽڴ�Сת��Ϊͬ�ȵ�K��С
				$suffix = "KB";                              //��λΪKB
			} else {                     			     //�����ṩ���ֽ���С��2��10�η�������������
				$return = $bytes;                            //�ֽڴ�С��λ����
				$suffix = "Byte";                            //��λΪByte
			}
			return $return ." " . $suffix;                       //���غ��ʵ��ļ���С�͵�λ
		}
		
		//==========================================
		// ����: getTempStr()
		// ����: ��ȡģ������
		// ����: $tempName=ģ����ʾ��������,$datas=��������,$str=��Ϣģ��ԭʼ����;
		// ����: ��Ϣģ����ʾ����
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
		// ����: array_is_null()
		// ����: �ж�һ�������Ƿ�Ϊ��
		// ����: ����
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
		// ����: check_files_num()
		// ����: �ж��ύ�ϴ��ļ���Ϊ�յĸ���
		// ����: $_FILES
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
				exit("�����ļ����ⶪʧ��");
			}
		}
		
		//ҳ����ת
		static function redirect($url,$time=0,$msg='')	{
			//����URL��ַ֧��
			$url = str_replace(array("\n", "\r"), '', $url);
			if(empty($msg))
				$msg    =   "ϵͳ����{$time}��֮���Զ���ת��{$url}��";
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
		 * �ַ�����ȡ
		 *
		 * @author gesion<gesion@163.com>
		 * @param string $str ԭʼ�ַ���
		 * @param int    $len ��ȡ���ȣ�����/ȫ�Ƿ���Ĭ��Ϊ 2 ����λ��Ӣ��/����Ϊ 1��
		 *                    ���磺���� 12 ��ʾ 6 �����Ļ�ȫ���ַ��� 12 ��Ӣ�Ļ����֣�
		 * @param bool   $dot �Ƿ�ӵ㣨���ַ������� $len ���ȣ������� "..."��
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
			$string = str_replace("\r\n", '', $string); //������з� 
			$string = str_replace("\n", '', $string); //������з� 
			$string = str_replace("\t", '', $string); //����Ʊ�� 
			$string=str_replace("\"","'",$string);//˫���Ż�Ϊ������
			$pattern = array ( 
			"/> *([^ ]*) *</", //ȥ��ע�ͱ�� 
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
		 * ��֤����IP����Ч��
		 * @param ip��ַ $ip_str
		 * @param ����ҳ�� $module
		 * @param ʱ���� $time_span
		 * @param ����ID $id
		 */
		 static function check_ipop_limit($ip_str,$module,$time_span=0,$id=0){
			if(empty($_SESSION[$module."_".$id."_ip"])){
				$check['ip']	=	 self::get_ip();
				$check['time']	=	self::get_gmtime();
				$_SESSION[$module."_".$id."_ip"] = $check;
				
				return true;  //������sessionʱ��֤ͨ��
			}else {   
				$check['ip']	=	 self::get_ip();
				$check['time']	=	self::get_gmtime();    
				$origin	=	$_SESSION[$module."_".$id."_ip"];
				
				if($check['ip']==$origin['ip']){
					if($check['time'] - $origin['time'] < $time_span){
						return false;
					}else {
						$_SESSION[$module."_".$id."_ip"] = $check;
						return true;  //������sessionʱ��֤ͨ��    				
					}
				}else{
					$_SESSION[$module."_".$id."_ip"] = $check;
					return true;  //������sessionʱ��֤ͨ��
				}
			}
		}
		
		//==========================================
		// ����: get_ip()
		// ����: ����IP��ַ
		// ����: ��
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
		
		// �ж�Cookie�Ƿ����
		static function is_set($name) {
			return isset($_COOKIE[$name]);
		}
	
		// ��ȡĳ��Cookieֵ
		static function get($name) {
			$value   = $_COOKIE[$name];
			//$value   =  unserialize(base64_decode($value));
			return $value;
		}
	
		// ����ĳ��Cookieֵ
		static function set($name,$value,$expire='',$path='',$domain='') {   
			$path = CMS_ROOT;    
			$expire =   !empty($expire)?self::get_gmtime()+$expire:0;
			//$value   =  base64_encode(serialize($value));
			setcookie($name, $value,$expire,$path,$domain);
			$_COOKIE[$name]  =   $value;
		}
	
		// ɾ��ĳ��Cookieֵ
		static function delete($name) {
			self::set($name,'',time()-3600);
			unset($_COOKIE[$name]);
		}
	
		// ���Cookieֵ
		static function clear() {
			unset($_COOKIE);
		}
		
		
		
	}	
	
?>
