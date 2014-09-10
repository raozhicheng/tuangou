<?php
	/*==================================================================*/
	/*		文件名:main.php                                      */
	/*		概要: 管理平台正文处理脚本.          	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	require "../cmsinit.inc.php";	
	require "isLogin.php";
	$tpl->caching=0;
	if(!empty($_GET['act']))
	{
		$mc=new Maincontrol($tpl,$_GET['act']);	
	}else{
		$mc=new Maincontrol($tpl);
	}
?>
