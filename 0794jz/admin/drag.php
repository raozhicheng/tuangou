<?php
	/*==================================================================*/
	/*		�ļ���:drag.php                                      */
	/*		��Ҫ: ����ƽ̨�м�����ťҳ����ű�.          	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	require "../cmsinit.inc.php";	
	require "isLogin.php";
	$tpl->assign("admin_path",STYLE_PATH.APP_STYLE);
	$tpl->display(APP_ADMIN_STYLE."/admin/index/drag.tpl");
?>
