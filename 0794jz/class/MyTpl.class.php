<?php
/*==================================================================*/
	/*		�ļ���:MyTpl.class.php                              */
	/*		��Ҫ: �Զ���Smartyģ�����������.      	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class MyTpl extends Smarty {
		function __construct(){	
			parent::__construct();						//����SMARTY���캯����ʹ֮��ʼ��
			$this->setTemplateDir(TEMPLATE_PATH);		//��������ģ���ļ���ŵ�Ŀ¼
			$this->setCompileDir(TEMPLATE_COMPILE_PATH);  	//�������б������ģ���ļ���ŵ�Ŀ¼
			$this->setCacheDir(TEMPLATE_CACHE_PATH);         //���ô��Smarty�����ļ���Ŀ¼
			$this->setCaching(TEMPLATE_CACHE_START);            //���ùر�Smarty����ģ�幦��
			$this->addPluginsDir(DEFINE_PLUGINS_PATH);            //���ùر�Smarty����ģ�幦��
			$this->cache_lifetime=TEMPLATE_CACHE_LIFETIME;  //����ģ�建����Чʱ��εĳ���Ϊ1Сʱ
			$this->setLeftDelimiter('<{');                   //����ģ�������е��������
			$this->setRightDelimiter('}>');       		//����ģ�������е��ҽ�����
		}
	}
?>