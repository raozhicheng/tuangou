<?php
/*==================================================================*/
	/*		文件名:subscribe.php                                    */
	/*		概要:  邮件订阅处理脚本.    	   	    */
	/*		作者: 李文                                        */
	/*==================================================================*/

	
	@define('Web_flag', true);
	//包含通用的脚本文件
	require "common.php";
	$tpl->caching=0;
	$act=trim($_REQUEST['act']);
	if($act=="mail") {
		$tpl->assign("$title","邮件订阅最新团购");
		$tpl->display($current_template."/subscribe_mail.tpl");
	} elseif($act=='addmail') {
		$ajax = intval($_REQUEST['ajax']);
		if(!Common::check_ipop_limit(Common::get_ip(),"subscribe#addmail",Common::get_config("SUBMIT_DELAY"),0)){
			$rs=$template->showStatus(0,"提交太快 ",$ajax);
		}elseif(trim($_REQUEST['email'])==''){
			$rs=$template->showStatus(0,"邮箱地址不能为空",$ajax);
		}elseif(!Validate::check_email($_REQUEST['email'])){
			$rs=$template->showStatus(0,"邮箱格式不正确",$ajax);
		}else{
			if($_POST['othercity']&&trim($_POST['othercity'])!=''){
				//提交其他城市		
				$other_city = htmlspecialchars(addslashes($_REQUEST['othercity']));
				$other_city_item = $current_template->getRow("select * from ".TAB_PREFIX."cms_city where name = '".$other_city."'");
				if($other_city_item){
					$city_id = $other_city_item['id'];
				}else{
					$city=new City();
					$new_city['name'] =  $other_city;
					$new_city['uname']="";
					$new_city['status']=1;
					$new_city['is_delete']=0;
					$new_city['pid']=0;
					$new_city['is_open']=1;
					$new_city['is_default']=0;
					$new_city['description']="";
					$new_city['notice']="";
					$new_city['seo_title']=$other_city;
					$new_city['seo_keyword']="";
					$new_city['seo_description']="";
					$city_id=$city->addCity($new_city);
				}
			}elseif(intval($_POST['city_id'])!=0){
				$city_id = intval($_POST['city_id']);
			}else{
				$city_item = $current_city;
				$city_id = $city_item['id'];
			}
			
			$mail_item['mail_address'] = trim($_REQUEST['email']);
			$mail_item['city_id'] = $city_id;
			$mail_item['code'] = "";
			$mail_item['status'] = 1;
			$mail_item['is_delete'] = 0;
			
			$mail_list=new MailList();
			if($mail_list->getOne("select count(*) from ".TAB_PREFIX."cms_mail_list where mail_address='".$mail_item['mail_address']."'")==0){
				$result=$mail_list->addMailList($mail_item);
				if($result){
					$rs=$mail_list->showStatus(1,"订阅邮件成功",$ajax);
				} else {
					$rs=$mail_list->showStatus(0,"订阅邮件失败",$ajax);
				}
			} else {
				$rs=$mail_list->showStatus(0,"此邮箱已订阅",$ajax);
			}
			
		}
		if(!$ajax){
		  $tpl->assign("mess",$rs['mess']);
		  $tpl->assign("status_class",$rs['status_class']);
		  $tpl->assign("default_url",Common::rewrite_url(APP_PATH."subscribe.php?act=mail"));
		  $tpl->display($current_template."/inc/information.tpl");
		  exit;
		}

		
	}
		
?>