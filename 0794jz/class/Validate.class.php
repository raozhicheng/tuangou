<?php
	/*==================================================================*/
	/*		�ļ���:Validate.class.php                           */
	/*		��Ҫ: ������֤��.                	       	    */
	/*		����: ����                                        */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Validate
	{
		//==========================================
		// ����: required($data)
		// ����: �������ݲ���Ϊ��
		// ����: $data ����
		//==========================================
		static function required($data) 
		{
			if(trim($data) == "")
			{
				return false;
			}
			else
			{
				return true;
			}
		}

		//==========================================
		// ����: required($data)
		// ����: �������ݲ���Ϊ��
		// ����: $data ����
		//==========================================
		static function noZero($data) 
		{
			if(trim($data) == 0)
			{
				return false;
			}
			else
			{
				return true;
			}
		}

		//==========================================
		// ����: checkLength($data)
		// ����: �������ݲ��ܳ���ָ������
		// ����: $data ����
		// ����: $len ָ������
		//==========================================
		static function checkLength($data, $len)
		{
			if(!is_int($len))
				exit("���Ȳ�����������");
			if(strlen($data) > $len)
			{
				return false;
			}	
			else
			{
				return true;
			}
		}
		//==========================================
		// ����: isNumber($data)
		// ����: ��������Ƿ�Ϊ���֣�������
		// ����: $data ����
		//==========================================
		static function isNumber($data)
		{
			$re = "/^\d+$/";
			if(preg_match($re, $data))
				return true;
			else
				return false;
		
		}
		
		//==========================================
		// ����: isFloat($data)
		// ����: ��������Ƿ�Ϊ����(��������)
		// ����: $data ����
		//==========================================
		static function isFloat($data)
		{
			if(is_numeric($data))
				return true;
			else
				return false;
		
		}
		
		//==========================================
		// ����: match($data, $re)
		// ����: ��������Ƿ�ƥ�������ģʽ
		// ����: $data ����
		// ����: $re ����ʹ�õ�������ʽ
		//==========================================
		static function match($data, $re)
		{
			if(preg_match($re, $data))
				return true;
			else
				return false;
		}
		//==========================================
		// ����: equal($data1, $data2)
		// ����: ���������������Ƿ����
		// ����: $data1,$data2 ����
		//==========================================
		static function equal($data1, $data2)
		{
			if($data1 === $data2)
				return true;
			else
				return false;
		}
		
		//==========================================
		// ����: checkTime($begin, $end)
		// ����: �����ʼ�����Ƿ�С����ֹ����
		// ����: $begin, $end ����
		//==========================================
		static function checkTime($begin, $end)
		{
			if($begin!=""  && $end!=""){
				if($begin < $end)
					return true;
				else
					return false;
			} else {
				return true;
			}
		}
		
		
		static function check_mobile($mobile){
			if(!empty($mobile) && !preg_match("/^(13\d{9}|14\d{9}|15\d{9}|18\d{9})|(0\d{9}|9\d{8})$/",$mobile)){
				return false;
			}
			else
			return true;
		}
		
		static function check_email($email){
			if(!empty($email) && !preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/",$email)){
				return false;
			}
			else
			return true;
		}
	}
?>
