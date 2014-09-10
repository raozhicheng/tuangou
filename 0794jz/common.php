<?php
	/*==================================================================*/
	/*		文件名:common.php                                   */
	/*		概要: 前台页面公用的一些功能处理.       	    */
	/*		作者: 李文                                        */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.co             */
	/*==================================================================*/
	
	//判断系统是否已经安装，如果没有安装则任何一个页面都不可以访问
	if(!file_exists("install_lock.txt")){
		echo "对不起！本系统没有安装不能使用. &nbsp;&nbsp;&nbsp;&nbsp; 请点击 <a href='install/index.php'>安装</a>";

		exit();		
	}
	//加载公用的初使化文件
	require "cmsinit.inc.php";
	
	//将网站的标题分配给模板，在文章页面的标题栏中显示
	$tpl->assign("appName", APP_NAME);
	//将网站的应用路径分配到模板中
	$tpl->assign("appPath",APP_PATH);
	
	if(!defined('Web_flag')) exit('Access Denied!');
	
	//获取用户访问页面的URL
	$_ENV['uri']=str_replace('/','',basename($_SERVER["REQUEST_URI"]));
	
	//获取当前城市
	$city=new City();
	$current_city=$city->get_current_city();
	//获取当前模板
	$template=new Templates();
	$current_template=$template->get_default();
	
	//保存返利的cookie
	if($_REQUEST['r']){
		$rid = intval(base64_decode($_REQUEST['r']));
		$ref_uid = intval($city->getOne("select id from ".TAB_PREFIX."user where id = ".intval($rid)));
		Common::set("REFERRAL_USER",intval($ref_uid));
	}else{
	//获取存在的推荐人ID
		$ref_uid = intval($city->getOne("select id from ".TAB_PREFIX."user where id = ".intval(Common::get("REFERRAL_USER"))));
	}
	
	//会员自动登录及输出
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
