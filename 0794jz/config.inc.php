<?php
	/*==================================================================*/
	/*		�ļ���:config.inc.php                               */
	/*		��Ҫ: ����CMSϵͳ�������ļ�,һЩ����������.         */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                   */
	/*==================================================================*/
	//���ݿⲿ�ֲ�������
	@define("DB_HOST", "localhost");           			//���ݿ�������
	@define("DB_USER", "root");		       		//���ݿ��û���
	@define("DB_PWD", "");			       			//���ݿ�����
	@define("DB_NAME", "lscms_db");	         				//���ݿ�����
	@define("TAB_PREFIX", "lstg_");					//ǰ׺
	//Ӧ�ó����������
	@define("APP_NAME", "�����Ź�CMS");            	//Ӧ�ó�������
	@define("VERSION","1.0");
	//���·������
	@define("CMS_ROOT", "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/");					//ϵͳ��Ŀ¼
	@define("CMS_CLASS_PATH", CMS_ROOT."class/");			//ϵͳ����CLASS·��
	@define("CMS_UPLOAD_PATH", CMS_ROOT."uploadFiles/");	        //ϵͳ�ϴ��ļ�·��
	@define("CMS_TEMP", CMS_ROOT."temp/");			        //ϵͳ��ʱ�ļ�·��
	@define("SERVER_ROOT","http://".$_SERVER['HTTP_HOST']);
	//��Smartyģ����ص�����
	@define("TEMPLATE_PATH", CMS_ROOT."templates/");	        //ϵͳģ��·��
	@define("TEMPLATE_COMPILE_PATH", CMS_ROOT."templates_c/");	//ϵͳģ�������·��
	@define("TEMPLATE_CACHE_START", 1);                     	//�����Ƿ���
	@define("TEMPLATE_CACHE_LIFETIME", 60*60*24);	                //ϵͳģ�屻�����ʱ��
	@define("TEMPLATE_CACHE_PATH", CMS_ROOT."cache/");	        //ϵͳģ�建���ļ���ŵ�·��
	@define("DEFINE_PLUGINS_PATH", CMS_ROOT."libs/definePlugins/");	        //SMARTY�Զ�����·��
	
	@define("APP_CLASS_PATH", CMS_ROOT."class/");                   //���ļ���ŵ�Ŀ¼
	@define("APP_PATH", "/xampp/0794jz/");   					 //��װ·��
	@define("GALLERY_PATH", APP_PATH."admin/uploadFiles/");           	 //ͼƬ�������·��
	@define("UPLOADPIC_PATH", CMS_ROOT."admin/uploadFiles/");               //�ϴ�ͼƬ���Ŀ¼
 

	@define("APP_ADMIN_STYLE","default");                                 //��̨ϵͳ��ǰ���
	@define("ALL_PAGE_SIZE", 12);                                //��̨�б���ʾ����Ŀ
	@define("PICTURE_PAGE_SIZE", 10);                                //��̨ͼƬÿҳ��ʾ����Ŀ
	@define("PICTURE_SHOW_TYPE", "list");                            //��̨ͼƬ��ʾ�ķ�ʽ list �б� thumb����ͼ
	 
	@define("AUTH_KEY","leesun");  //��̨��֤��ʶ��
	
	$styleList = array("default" => "Ĭ�Ϸ��");  	//ϵͳ�������
	$waterText = array('�����Ź�', 'www.leesuntech.com');			//�����ˮӡ������
	$pictureSize = array('maxWidth' => 300, 'maxHeight' => 300); 		//�������ɺ�Ĵ�С
	$thumbSize = array('width' => 415, 'height' => 274);   			//��������ͼ�Ĵ�С

	
?>