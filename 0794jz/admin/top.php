<?php
	/*==================================================================*/
	/*		�ļ���:top.php                                      */
	/*		��Ҫ: ����ƽ̨�����Ĵ���ű�.          	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	require "../cmsinit.inc.php";	
	require "isLogin.php";
	$nav=array(1=>"������ҳ",2=>"�Ź�����",3=>"ǰ̨����",4=>"��Ա����",5=>"��������",6=>"�����ʼ�",7=>"ϵͳ����");
	$act=array(2=>"deals",3=>"info_cate",4=>"user",5=>"deal_orders",6=>"msg_template",7=>"sys_config");
	$tpl->assign("admin_nav",$nav);
	$tpl->assign("act",$act);
	$tpl->assign("username",$_SESSION[md5(AUTH_KEY)]['admin']);
	$tpl->assign("admin_path",STYLE_PATH.APP_STYLE);
	$tpl->assign("Root",SERVER_ROOT);
	$tpl->display(APP_ADMIN_STYLE."/admin/index/top.tpl");
?>
