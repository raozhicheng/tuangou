<?php
	/*==================================================================*/
	/*		文件名:top.php                                      */
	/*		概要: 管理平台顶部的处理脚本.          	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	require "../cmsinit.inc.php";	
	require "isLogin.php";
	$nav=array(1=>"管理首页",2=>"团购管理",3=>"前台管理",4=>"会员管理",5=>"订单管理",6=>"短信邮件",7=>"系统工具");
	$act=array(2=>"deals",3=>"info_cate",4=>"user",5=>"deal_orders",6=>"msg_template",7=>"sys_config");
	$tpl->assign("admin_nav",$nav);
	$tpl->assign("act",$act);
	$tpl->assign("username",$_SESSION[md5(AUTH_KEY)]['admin']);
	$tpl->assign("admin_path",STYLE_PATH.APP_STYLE);
	$tpl->assign("Root",SERVER_ROOT);
	$tpl->display(APP_ADMIN_STYLE."/admin/index/top.tpl");
?>
