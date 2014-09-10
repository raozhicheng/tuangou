<?php
	/*==================================================================*/
	/*		文件名:login.php                                    */
	/*		概要: 用户登录设置脚本.                	       	    */
	/*		作者: 李文                                        */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
require "../cmsinit.inc.php";
//用户是否登录
$tpl->caching=0;
$admin=new Admin();
$logAction=new LogAction();
if(!$_SESSION[md5(AUTH_KEY)]["isLogin"] && $_SESSION[md5(AUTH_KEY)]["status"]!=1) 
{
	if (isset($_POST['action']) && $_POST['action'] == "login") //已经提交表单
	{
		
		
		$log= $admin->login(trim($_POST['username']),trim($_POST['password']),trim($_POST['verification'])); //检验管理员登录
		if ($log){ //登录成功
			header("Location:index.php");	
			$logAction->write_log(1,"login");
		} else { //登录失败
			$message = "用户名、密码或验证码错误，请重试！";
			$tpl->assign("className", "login-msg");
			$tpl->assign("message", $message);
			$logAction->write_log(0,"login");
		}

	}else{       //没有提交表单.显示登录界面
		$tpl->assign("className", "not-display");
		$tpl->assign("message", "");
	}
}else{
	$admin->logout();
}	
$tpl->display(APP_ADMIN_STYLE."/admin/index/login.tpl");
?>
