<?php
	/*==================================================================*/
	/*		�ļ���:common.php                                   */
	/*		��Ҫ: ǰ̨ҳ�湫�õ�һЩ���ܴ���.       	    */
	/*		����: ����                                        */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.co             */
	/*==================================================================*/
	
	//�ж�ϵͳ�Ƿ��Ѿ���װ�����û�а�װ���κ�һ��ҳ�涼�����Է���
	if(!file_exists("install_lock.txt")){
		echo "�Բ��𣡱�ϵͳû�а�װ����ʹ��. &nbsp;&nbsp;&nbsp;&nbsp; ���� <a href='install/index.php'>��װ</a>";

		exit();		
	}
	//���ع��õĳ�ʹ���ļ�
	require "cmsinit.inc.php";
	
	//����վ�ı�������ģ�壬������ҳ��ı���������ʾ
	$tpl->assign("appName", APP_NAME);
	//����վ��Ӧ��·�����䵽ģ����
	$tpl->assign("appPath",APP_PATH);
	
	if(!defined('Web_flag')) exit('Access Denied!');
	
	//��ȡ�û�����ҳ���URL
	$_ENV['uri']=str_replace('/','',basename($_SERVER["REQUEST_URI"]));
	
	//��ȡ��ǰ����
	$city=new City();
	$current_city=$city->get_current_city();
	//��ȡ��ǰģ��
	$template=new Templates();
	$current_template=$template->get_default();
	
	//���淵����cookie
	if($_REQUEST['r']){
		$rid = intval(base64_decode($_REQUEST['r']));
		$ref_uid = intval($city->getOne("select id from ".TAB_PREFIX."user where id = ".intval($rid)));
		Common::set("REFERRAL_USER",intval($ref_uid));
	}else{
	//��ȡ���ڵ��Ƽ���ID
		$ref_uid = intval($city->getOne("select id from ".TAB_PREFIX."user where id = ".intval(Common::get("REFERRAL_USER"))));
	}
	
	//��Ա�Զ���¼�����
	$cookie_uname = Common::get("user_name")?Common::get("user_name"):'';
	$cookie_upwd = Common::get("user_name")?Common::get("user_pwd"):'';
	if($cookie_uname!=''&&$cookie_upwd!=''&&!$_SESSION['user_info']){
		$user=new User();
		$user->login($cookie_uname,$cookie_upwd);
	}
	
	$tpl->assign("user", $_SESSION['user_info']);
	$tpl->assign("style",$current_template);
	$tpl->assign("stylePath", APP_PATH."templates/".$current_template);
	$tpl->assign("current_city", $current_city);
	
	
?>
