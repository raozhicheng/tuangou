<?php
	/*==================================================================*/
	/*		文件名:left.php                                      */
	/*		概要: 管理平台左侧的处理脚本.          	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	require "../cmsinit.inc.php";	
	require "isLogin.php";
	$tpl->assign("admin_path",STYLE_PATH.APP_STYLE);
	$page_array=array("menu1"=>"left_index.tpl","menu2"=>"left_deals.tpl","menu3"=>"left_front_set.tpl","menu4"=>"left_members.tpl","menu5"=>"left_orders.tpl","menu6"=>"left_mail_message.tpl","menu7"=>"left_sys_set.tpl");
	$act=!empty($_REQUEST['act']) ? trim($_REQUEST['act']) : 'menu1';
	$key=array_search($page_array[$act],$page_array);
	$tpl->display(APP_ADMIN_STYLE."/admin/left_menu/".$page_array[$key]);
?>
