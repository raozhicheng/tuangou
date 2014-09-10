<?php
	/*==================================================================*/
	/*		文件名:cmsinit.inc.php                              */
	/*		概要: 公共的系统初使化信息.                 	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	
	//开启Session
	session_start();
	//设置页面以GB2312的中文编号显示
	header("Content-type: text/html;charset=gb2312");
	//错误完全关闭
    error_reporting(E_ALL & ~E_NOTICE);
	//包含通用的全局配置文件
	require("config.inc.php");
	//包含Smarty类库所在的文件
	require CMS_ROOT."libs/Smarty.class.php"; 
	//设置中国所在的东八时区	
	date_default_timezone_set('PRC'); 
	//注册自动调用类函数，否则冲突
	spl_autoload_register("__autoload");
	//设置自动加载所需要的类文件
	 function __autoload($className){
		include(APP_CLASS_PATH.$className.".class.php");
	}
	//创建一个Smarty类的对象$tpl
	
	$tpl = new MyTpl();            
?>