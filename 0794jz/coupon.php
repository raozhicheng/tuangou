<?php
/*==================================================================*/
	/*		文件名:coupon.php                                    */
	/*		概要:  团购券处理脚本.    	   	    */
	/*		作者: 李文                                        */
	/*==================================================================*/

	
	@define('Web_flag', true);
	//包含通用的脚本文件
	require "common.php";
	$tpl->caching=0;
	$act=trim($_REQUEST['act']);
	if($act=="verify") {
		$account_id = intval($_SESSION['account_info']['id']);
		$account_data = $template->getRow("select s.name as name,a.account_name as account_name, a.supplier_id as supplier_id from ".TAB_PREFIX."cms_supplier_account as a left join ".TAB_PREFIX."cms_supplier as s on a.supplier_id = s.id where a.id = ".$account_id);
		$tpl->assign("account_data",$account_data);
		$tpl->assign("title","验证团购券");
		$tpl->display($current_template."/coupon_verify.tpl");
	}elseif($act=='check_coupon'){
		$now = Common::get_gmtime();
		$sn = htmlspecialchars(addslashes($_REQUEST['coupon_sn']));
		$coupon_data = $template->getRow("select doi.name as name,c.sn as sn from ".TAB_PREFIX."cms_deal_coupon as c left join ".TAB_PREFIX."cms_deal_order_item as doi on c.order_deal_id = doi.id where c.sn = '".$sn."' and c.is_valid = 1 and c.is_delete = 0 and c.confirm_time = 0 and c.begin_time <".$now." and (c.end_time = 0 or c.end_time>".$now.")");
		if($coupon_data){
			$msg=sprintf("[ %s ] 的团购券 %s 是有效团购券",$coupon_data['name'],$coupon_data['sn']);
		}else{
			$msg="该团购券为无效团购券";
		}
		Common::ajax_msg_return($msg,1);
		
	}elseif($act=='use_coupon'){
		
		if(intval($_SESSION['account_info']['id'])==0){
			$result['status'] = 2;
			Common::ajax_return($result);
		}else{
			$now = Common::get_gmtime();
			$sn = htmlspecialchars(addslashes($_REQUEST['coupon_sn']));
			$pwd = htmlspecialchars(addslashes($_REQUEST['coupon_pwd']));
			$supplier_id = intval($_SESSION['account_info']['supplier_id']);
			$coupon_data = $template->getRow("select c.id as id,doi.name as name,c.sn as sn,c.supplier_id as supplier_id,c.confirm_time as confirm_time from ".TAB_PREFIX."cms_deal_coupon as c left join ".TAB_PREFIX."cms_deal_order_item as doi on c.order_deal_id = doi.id where c.sn = '".$sn."' and c.password = '".$pwd."' and c.is_valid = 1 and c.is_delete = 0  and c.begin_time <".$now." and (c.end_time = 0 or c.end_time>".$now.")"); 
			if($coupon_data)
			{
				if($coupon_data['supplier_id']!=$supplier_id)
				{
					$result['status'] = 0;
					$result['msg'] = "该券为其他团购商户的团购券，不能确认";
					Common::ajax_return($result);
				}
				elseif($coupon_data['confirm_time'] > 0)
				{
					$result['status'] = 0;
					$result['msg'] = sprintf("该券已于%s使用过",to_date($coupon_data['confirm_time']));
					Common::ajax_return($result);
				}else{
					//开始确认
					$template->query("update ".TAB_PREFIX."cms_deal_coupon set confirm_account = ".intval($_SESSION['account_info']['id']).",confirm_time=".$now." where id = ".intval($coupon_data['id']));
					$result['status'] = 1;
					$result['msg'] = sprintf("确认成功，确认时间为%s",to_date($now));
					Common::ajax_return($result);
				}
			}else{				
				$result['status'] = 0;
				$result['msg'] = "该团购券为无效团购券";
				Common::ajax_return($result);
			}
		}
	}elseif($act=='supplier_login'){
			$tpl->assign("title","商家登录");
			$tpl->display($current_template."/supplier_login.tpl");
	}
	elseif($act=='ajax_supplier_login'){
		$tpl->display($current_template."/inc/ajax_supplier_login.tpl");
	}elseif($act=='loginout'){
		unset($_SESSION['account_info']);
		Common::redirect(Common::rewrite_url(APP_PATH."coupon.php?act=verify"));
	}elseif($act == 'supplier_dologin'){
		if(Common::check_ipop_limit(Common::get_ip(),"supplier_dologin",intval(Common::get_config("SUBMIT_DELAY")))){
			$account_name = htmlspecialchars(addslashes($_REQUEST['account_name']));
			$account_password = htmlspecialchars(addslashes($_REQUEST['account_password']));
			$account = $template->getRow("select * from ".TAB_PREFIX."cms_supplier_account where account_name = '".$account_name."' and account_password = '".md5($account_password)."' and status = 1 and is_delete = 0");
			if($account)
			{
				$_SESSION['account_info'] = $account;
				$result['status'] = 1;
				Common::ajax_return($result);
			}
			else
			{
				$result['status'] = 0;
				$result['msg'] = "商户登陆失败";
				Common::ajax_return($result);
			}
		}
		else
		{
			$result['status'] = 0;
			$result['msg'] = "提交太快";
			Common::ajax_return($result);
		}
	}elseif($act=='supplier_modPass'){
		if(intval($_SESSION['account_info']['id'])==0){
			Common::redirect(Common::rewrite_url(APP_PATH."coupon.php?act=verify"));		
		}
		
		$tpl->assign("title","修改商户密码");
		$tpl->display($current_template."/supplier_password.tpl");
	}elseif($act=='supplier_doModPass'){
		$post=array();
		if(intval($_SESSION['account_info']['id'])==0){
			Common::redirect(Common::rewrite_url(APP_PATH."coupon.php?act=verify"));	
		}
		$post['id']=intval($_SESSION['account_info']['id']);
		$post['account_password'] = htmlspecialchars(addslashes(trim($_POST['account_new_password'])));
		$sa=new SupplierAccount();
		if($sa->modSupplierAccount($post)){
			$rs=$sa->showStatus(1,"密码修改成功",0);
		} else {
			$rs=$sa->showStatus(0,"密码修改失败",0);
		}
		$tpl->assign("mess",$rs['mess']);
		$tpl->assign("status_class",$rs['status_class']);
		$tpl->assign("default_url",Common::rewrite_url(APP_PATH."coupon.php?act=verify"));
		$tpl->display($current_template."/inc/information.tpl");
	}
?>