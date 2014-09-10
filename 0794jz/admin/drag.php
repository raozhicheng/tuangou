<?php
	/*==================================================================*/
	/*		文件名:drag.php                                      */
	/*		概要: 管理平台中间栏按钮页处理脚本.          	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	require "../cmsinit.inc.php";	
	require "isLogin.php";
	$tpl->assign("admin_path",STYLE_PATH.APP_STYLE);
	$tpl->display(APP_ADMIN_STYLE."/admin/index/drag.tpl");
?>
