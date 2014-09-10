<?php
/*==================================================================*/
	/*		�ļ���:Location.class.php                     */
	/*		��Ҫ: �Ź����ж�λ.                	       	    */
	/*		����: ����                                        */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Location{
		var $fp;
		var $firstip;  //��һ��ip������ƫ�Ƶ�ַ
		var $lastip;   //���һ��ip������ƫ�Ƶ�ַ
		var $totalip;  //��ip��
		//*
		//���캯��,��ʼ��һЩ����
		//$datfile ��ֵΪ����IP���ݿ������,�������޸�.
		//*
		function iplocate(){
		  $datfile = CMS_ROOT."data/config/ip.dat";
		  $this->fp=fopen($datfile,'rb');   //���Ʒ�ʽ��
		  $this->firstip = $this->get4b(); //��һ��ip�����ľ���ƫ�Ƶ�ַ
		  $this->lastip = $this->get4b();  //���һ��ip�����ľ���ƫ�Ƶ�ַ
		  $this->totalip =($this->lastip - $this->firstip)/7 ; //ip���� �������Ƕ�����7���ֽ�,�ڴ�Ҫ����7,
		  register_shutdown_function(array($this,"closefp"));  //Ϊ�˼���php5���°汾,����û������������,�Զ��ر�ip��.
		}
		//*
		//�ر�ip��
		//*
		function closefp(){
		fclose($this->fp);
		}
		//*
		//��ȡ4���ֽڲ�����ѹ��long�ĳ�ģʽ
		//*
		function get4b(){
		  $str=@unpack("V",fread($this->fp,4));
		  return $str[1];
		}
		//*
		//��ȡ�ض����˵�ƫ�Ƶ�ַ
		//*
		function getoffset(){
		  $str=@unpack("V",fread($this->fp,3).chr(0));
		  return $str[1];
		}
		//*
		//��ȡip����ϸ��ַ��Ϣ
		//*
		function getstr(){
		  $split=fread($this->fp,1);
		  while (ord($split)!=0) {
			$str .=$split;
			$split=fread($this->fp,1);
		  }
		  return $str;
		}
		//*
		//��ipͨ��ip2longת��ipv4�Ļ�������ַ,�ٽ���ѹ����big-endian�ֽ���
		//�������������ڵ�ip��ַ���Ƚ�
		//*
		function iptoint($ip){
		  return pack("N",intval(ip2long($ip)));
		}
		//*
		//��ȡ�ͻ���ip��ַ
		//ע��:�������Ҫ��ip��¼����������,����д��ʱ�ȼ��һ��ip�������Ƿ�ȫ.
		//*
		function getIP() {
				if (getenv('HTTP_CLIENT_IP')) {
						$ip = getenv('HTTP_CLIENT_IP'); 
				}
				elseif (getenv('HTTP_X_FORWARDED_FOR')) { //��ȡ�ͻ����ô������������ʱ����ʵip ��ַ
						$ip = getenv('HTTP_X_FORWARDED_FOR');
				}
				elseif (getenv('HTTP_X_FORWARDED')) { 
						$ip = getenv('HTTP_X_FORWARDED');
				}
				elseif (getenv('HTTP_FORWARDED_FOR')) {
						$ip = getenv('HTTP_FORWARDED_FOR'); 
				}
				elseif (getenv('HTTP_FORWARDED')) {
						$ip = getenv('HTTP_FORWARDED');
				}
				else { 
						$ip = $_SERVER['REMOTE_ADDR'];
				}
				return $ip;
		}
		//*
		//��ȡ��ַ��Ϣ
		//*
		function readaddress(){
		  $now_offset=ftell($this->fp); //�õ���ǰ��ָ��λַ
		  $flag=$this->getflag();
		  switch (ord($flag)){
				 case 0:
					 $address="";
				 break;
				 case 1:
				 case 2:
					 fseek($this->fp,$this->getoffset());
					 $address=$this->getstr();
				 break;
				 default:
					 fseek($this->fp,$now_offset);
					 $address=$this->getstr();
				 break;
		  }
		  return $address;
		}
		//*
		//��ȡ��־1��2
		//����ȷ����ַ�Ƿ��ض�����.
		//*
		function getflag(){
		  return fread($this->fp,1);
		}
		//*
		//�ö��ֲ��ҷ���������������ip
		//*
		function searchip($ip){
		  $ip=gethostbyname($ip);     //������ת��ip
		  $ip_offset["ip"]=$ip;
		  $ip=$this->iptoint($ip);    //��ipת���ɳ�����
		  $firstip=0;                 //�������ϱ߽�
		  $lastip=$this->totalip;     //�������±߽�
		  $ipoffset=$this->lastip;    //��ʼ��Ϊ���һ��ip��ַ��ƫ�Ƶ�ַ
		  while ($firstip <= $lastip){
			$i=floor(($firstip + $lastip) / 2);          //��������м��¼ floor�����������������С���������,˵���˾���������Ҳ��
			fseek($this->fp,$this->firstip + $i * 7);    //��λָ�뵽�м��¼
			$startip=strrev(fread($this->fp,4));         //��ȡ��ǰ�������ڵĿ�ʼip��ַ,������little-endian���ֽ���ת����big-endian���ֽ���
			if ($ip < $startip) {
			   $lastip=$i - 1;
			}
			else {
			   fseek($this->fp,$this->getoffset());
			   $endip=strrev(fread($this->fp,4));
			   if ($ip > $endip){
				  $firstip=$i + 1;
			   }
			   else {
				  $ip_offset["offset"]=$this->firstip + $i * 7;
				  break;
			   }
			}
		  }
		  return $ip_offset;
		}
		//*
		//��ȡip��ַ��ϸ��Ϣ
		//*
		function getaddress($ip){
		  $ip_offset=$this->searchip($ip);  //��ȡip ���������ڵľ��Ա��Ƶ�ַ
		  $ipoffset=$ip_offset["offset"];
		  $address["ip"]=$ip_offset["ip"];
		  fseek($this->fp,$ipoffset);      //��λ��������
		  $address["startip"]=long2ip($this->get4b()); //�������ڵĿ�ʼip ��ַ
		  $address_offset=$this->getoffset();            //��ȡ��������ip��ip��¼���ڵ�ƫ�Ƶ�ַ
		  fseek($this->fp,$address_offset);            //��λ����¼����
		  $address["endip"]=long2ip($this->get4b());   //��¼���ڵĽ���ip ��ַ
		  $flag=$this->getflag();                      //��ȡ��־�ֽ�
		  switch (ord($flag)) {
				 case 1:  //����1����2���ض���
				 $address_offset=$this->getoffset();   //��ȡ�ض����ַ
				 fseek($this->fp,$address_offset);     //��λָ�뵽�ض���ĵ�ַ
				 $flag=$this->getflag();               //��ȡ��־�ֽ�
				 switch (ord($flag)) {
						case 2:  //����1��һ���ض���,
						fseek($this->fp,$this->getoffset());
						$address["area1"]=$this->getstr();
						fseek($this->fp,$address_offset+4);      //��4���ֽ�
						$address["area2"]=$this->readaddress();  //����2�п����ض���,�п���û��
						break;
						default: //����1,����2��û���ض���
						fseek($this->fp,$address_offset);        //��λָ�뵽�ض���ĵ�ַ
						$address["area1"]=$this->getstr();
						$address["area2"]=$this->readaddress();
						break;
				 }
				 break;
				 case 2: //����1�ض��� ����2û���ض���
				 $address1_offset=$this->getoffset();   //��ȡ�ض����ַ
				 fseek($this->fp,$address1_offset);  
				 $address["area1"]=$this->getstr();
				 fseek($this->fp,$address_offset+8);
				 $address["area2"]=$this->readaddress();
				 break;
				 default: //����1����2��û���ض���
				 fseek($this->fp,$address_offset+4);
				 $address["area1"]=$this->getstr();
				 $address["area2"]=$this->readaddress();
				 break;
		  }
		  //*����һЩ��������
		  if (strpos($address["area1"],"CZ88.NET")!=false){
			  $address["area1"]="δ֪";
		  }
		  if (strpos($address["area2"],"CZ88.NET")!=false){
			  $address["area2"]=" ";
		  }
		  foreach($address as $k=>$item)
		  {
			if(!$this->is_utf8($address[$k]))
			{
				$address[$k] = iconv('gbk','utf-8',$item);
			}
		  }
		  return $address;
		 }
		
			function is_utf8($string)
			{
				return preg_match('%^(?:
					 [\x09\x0A\x0D\x20-\x7E]            # ASCII
				   | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
				   |  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs
				   | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
				   |  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates
				   |  \xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3
				   | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
				   |  \xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16
			   )*$%xs', $string);
			}
}
?>