<?php
	/*==================================================================*/
	/*		�ļ���:cmsinit.inc.php                              */
	/*		��Ҫ: ������ϵͳ��ʹ����Ϣ.                 	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	
	//����Session
	session_start();
	//����ҳ����GB2312�����ı����ʾ
	header("Content-type: text/html;charset=gb2312");
	//������ȫ�ر�
    error_reporting(E_ALL & ~E_NOTICE);
	//����ͨ�õ�ȫ�������ļ�
	require("config.inc.php");
	//����Smarty������ڵ��ļ�
	require CMS_ROOT."libs/Smarty.class.php"; 
	//�����й����ڵĶ���ʱ��	
	date_default_timezone_set('PRC'); 
	//ע���Զ������ຯ���������ͻ
	spl_autoload_register("__autoload");
	//�����Զ���������Ҫ�����ļ�
	 function __autoload($className){
		include(APP_CLASS_PATH.$className.".class.php");
	}
	//����һ��Smarty��Ķ���$tpl
	
	$tpl = new MyTpl();            
?>