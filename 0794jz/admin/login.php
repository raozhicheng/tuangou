<?php
	/*==================================================================*/
	/*		�ļ���:login.php                                    */
	/*		��Ҫ: �û���¼���ýű�.                	       	    */
	/*		����: ����                                        */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
require "../cmsinit.inc.php";
//�û��Ƿ��¼
$tpl->caching=0;
$admin=new Admin();
$logAction=new LogAction();
if(!$_SESSION[md5(AUTH_KEY)]["isLogin"] && $_SESSION[md5(AUTH_KEY)]["status"]!=1) 
{
	if (isset($_POST['action']) && $_POST['action'] == "login") //�Ѿ��ύ��
	{
		
		
		$log= $admin->login(trim($_POST['username']),trim($_POST['password']),trim($_POST['verification'])); //�������Ա��¼
		if ($log){ //��¼�ɹ�
			header("Location:index.php");	
			$logAction->write_log(1,"login");
		} else { //��¼ʧ��
			$message = "�û������������֤����������ԣ�";
			$tpl->assign("className", "login-msg");
			$tpl->assign("message", $message);
			$logAction->write_log(0,"login");
		}

	}else{       //û���ύ��.��ʾ��¼����
		$tpl->assign("className", "not-display");
		$tpl->assign("message", "");
	}
}else{
	$admin->logout();
}	
$tpl->display(APP_ADMIN_STYLE."/admin/index/login.tpl");
?>
