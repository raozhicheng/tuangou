<?php
	/*==================================================================*/
	/*		�ļ���:bottom.php                                      */
	/*		��Ҫ: ����ƽ̨�ײ�����ű�.          	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	require "../cmsinit.inc.php";	
	require "isLogin.php";
	$tpl->assign("APP_NAME",APP_NAME);
	$tpl->assign("VERSION",VERSION);
	$tpl->display(APP_ADMIN_STYLE."/admin/index/bottom.tpl");
?>
