<?php
	/*==================================================================*/
	/*		文件名:config.inc.php                               */
	/*		概要: 整个CMS系统的配置文件,一些参数的设置.         */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                   */
	/*==================================================================*/
	//数据库部分参数设置
	@define("DB_HOST", "localhost");           			//数据库主机名
	@define("DB_USER", "root");		       		//数据库用户名
	@define("DB_PWD", "");			       			//数据库密码
	@define("DB_NAME", "lscms_db");	         				//数据库名称
	@define("TAB_PREFIX", "lstg_");					//前缀
	//应用程序相关设置
	@define("APP_NAME", "乐尚团购CMS");            	//应用程序名称
	@define("VERSION","1.0");
	//框架路径设置
	@define("CMS_ROOT", "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/");					//系统根目录
	@define("CMS_CLASS_PATH", CMS_ROOT."class/");			//系统核心CLASS路径
	@define("CMS_UPLOAD_PATH", CMS_ROOT."uploadFiles/");	        //系统上传文件路径
	@define("CMS_TEMP", CMS_ROOT."temp/");			        //系统临时文件路径
	@define("SERVER_ROOT","http://".$_SERVER['HTTP_HOST']);
	//和Smarty模板相关的设置
	@define("TEMPLATE_PATH", CMS_ROOT."templates/");	        //系统模板路径
	@define("TEMPLATE_COMPILE_PATH", CMS_ROOT."templates_c/");	//系统模板编译后的路径
	@define("TEMPLATE_CACHE_START", 1);                     	//缓存是否开启
	@define("TEMPLATE_CACHE_LIFETIME", 60*60*24);	                //系统模板被缓存的时间
	@define("TEMPLATE_CACHE_PATH", CMS_ROOT."cache/");	        //系统模板缓存文件存放的路径
	@define("DEFINE_PLUGINS_PATH", CMS_ROOT."libs/definePlugins/");	        //SMARTY自定义插件路径
	
	@define("APP_CLASS_PATH", CMS_ROOT."class/");                   //类文件存放的目录
	@define("APP_PATH", "/xampp/0794jz/");   					 //安装路径
	@define("GALLERY_PATH", APP_PATH."admin/uploadFiles/");           	 //图片相册物理路径
	@define("UPLOADPIC_PATH", CMS_ROOT."admin/uploadFiles/");               //上传图片存放目录
 

	@define("APP_ADMIN_STYLE","default");                                 //后台系统当前风格
	@define("ALL_PAGE_SIZE", 12);                                //后台列表显示的数目
	@define("PICTURE_PAGE_SIZE", 10);                                //后台图片每页显示的数目
	@define("PICTURE_SHOW_TYPE", "list");                            //后台图片显示的方式 list 列表 thumb缩略图
	 
	@define("AUTH_KEY","leesun");  //后台验证标识码
	
	$styleList = array("default" => "默认风格");  	//系统风格数组
	$waterText = array('乐尚团购', 'www.leesuntech.com');			//定义加水印的文字
	$pictureSize = array('maxWidth' => 300, 'maxHeight' => 300); 		//定义生成后的大小
	$thumbSize = array('width' => 415, 'height' => 274);   			//定义缩略图的大小

	
?>