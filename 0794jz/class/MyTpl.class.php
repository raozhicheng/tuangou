<?php
/*==================================================================*/
	/*		文件名:MyTpl.class.php                              */
	/*		概要: 自定义Smarty模板引擎的子类.      	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class MyTpl extends Smarty {
		function __construct(){	
			parent::__construct();						//调用SMARTY构造函数，使之初始化
			$this->setTemplateDir(TEMPLATE_PATH);		//设置所有模板文件存放的目录
			$this->setCompileDir(TEMPLATE_COMPILE_PATH);  	//设置所有编译过的模板文件存放的目录
			$this->setCacheDir(TEMPLATE_CACHE_PATH);         //设置存放Smarty缓存文件的目录
			$this->setCaching(TEMPLATE_CACHE_START);            //设置关闭Smarty缓存模板功能
			$this->addPluginsDir(DEFINE_PLUGINS_PATH);            //设置关闭Smarty缓存模板功能
			$this->cache_lifetime=TEMPLATE_CACHE_LIFETIME;  //设置模板缓存有效时间段的长度为1小时
			$this->setLeftDelimiter('<{');                   //设置模板语言中的左结束符
			$this->setRightDelimiter('}>');       		//设置模板语言中的右结束符
		}
	}
?>