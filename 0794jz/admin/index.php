<?php
	/*==================================================================*/
	/*		文件名:index.php                                    */
	/*		概要: 管理平台主索引页面.             	       	    */
	/*		作者: 李文                                        */
	/*		创建时间: 2011-10-1                                */
	/*		最后修改时间:2011-10-1                             */
	/*		copyright (c)2011 15919572@qq.com              */
	/*==================================================================*/
	require "../cmsinit.inc.php";
	require "isLogin.php";
	$tpl->display(APP_ADMIN_STYLE."/admin/index/index.tpl");
?>
