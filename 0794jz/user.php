<?php
/*==================================================================*/
	/*		�ļ���:user.php                                    */
	/*		��Ҫ: ��Ա���ܴ���ű�.    	   	    */
	/*		����: ����                                        */
	/*==================================================================*/

	
	@define('Web_flag', true);
	require "common.php";
	$tpl->caching=0;
	//����ͨ�õĽű��ļ�
	$act=trim($_GET['act']);
	foreach($_POST as $key=>$var){
		$_POST[$key]=trim($var);
	}
	$no_login_act=array("register","do_register","login","do_login","getPassword","logout");
	if(!$tpl->isCached($act.".tpl")) {
		if($act=="register"){
			$user_field=new UserField();
			$userExt=new UserExt();
			$city=new City();
			$uf=$user_field->get_userFields();
			$getUserExt=$userExt->get_userExt($id);
			$tpl->assign("user_field", $uf);
			$tpl->assign("getUserExt", $getUserExt);
			$tpl->assign("mobile_must", Common::get_config("MOBILE_MUST"));
			$tpl->display($current_template."/member/register.tpl");
		}
		if($act=="do_register"){
			$user=new User();
			$_POST['pid']=$GLOBALS['ref_uid'];
			$_POST['login_ip']=Common::get_ip();
			$_POST['status']=Common::get_config("USER_VERIFY");
			$_POST['is_delete']=0;
			$_POST['score']=0;
			$_POST['money']=0;
			$_POST['login_time']=0;
			$_POST['referral_count']=0;
			$_POST['integrate_id']=0;
			$_POST['group_id'] = $user->getOne("select id from ".TAB_PREFIX."cms_user_group order by score asc limit 1");
			
			if($user_id=$user->addUser($_POST)){
				
				$userExt=new UserExt();
				$getUserField=$user->get_other_datas("cms_user_field where is_delete=0","*");
				$field_id_arr=array();
				$value_arr=array();
				foreach($getUserField as $var){
					$tmpName=$var["field_name"];
					array_push($field_id_arr,$var["id"]);
					array_push($value_arr,$_POST[$tmpName]);
				}
				$tmpFieldStr=join("|",$field_id_arr);
				$tmpValueStr=join("|",$value_arr);
				$post_temp=array("field_id"=>$tmpFieldStr,"user_id"=>$user_id,"value"=>$tmpValueStr);
				$userExt->addUserExt($post_temp);
				$user->login(trim($_POST['user_name']),trim($_POST['user_pwd']));
				$status_class="status_success";
				if(Common::get_config("USER_VERIFY")){
					$default_url=Common::rewrite_url(APP_PATH."user.php?act=member_index");
					$mess="ע��ɹ�!";
				} else {
					$default_url=Common::rewrite_url(APP_PATH."index.php");
					$mess="ע��ɹ�,��ȴ�����Ա��֤!";
				}
			} else{
				$status_class="status_error";
				$default_url="javascript:history.go(-1)";
				$mess="ע��ʧ��,������!";
			}
			$tpl->assign("mess",$mess);
			$tpl->assign("default_url",$default_url);
			$tpl->assign("status_class",$status_class);
			$tpl->display($current_template."/inc/information.tpl");
		}
		if($act=="login"){
			$tpl->assign("ajax",0);
			$tpl->display($current_template."/member/login.tpl");
		}
		
		
		if($act=="do_login"){
			$u_name=trim($_POST['user_name']);
			$u_pwd=trim($_POST['user_pwd']);
			$ajax=intval($_POST['ajax']);
			$user=new User();
			$user->login($u_name,$u_pwd);
			if($_SESSION['isLogin']){//��½�ɹ�
				if(intval($_POST['auto_login'])){
				//�Զ���¼������cookie
					$user_data = $_SESSION['user_info'];
					Common::set("user_name",$user_data['email'],3600*24*30);			
					Common::set("user_pwd",md5($user_data['user_pwd']."_EASE_COOKIE"),3600*24*30);
				}
				if(!$ajax){
					$status_class="status_success";
					$default_url=Common::rewrite_url(APP_PATH."user.php?act=member_index");
					$mess="��½�ɹ�!";
				} else{
					$redirect= $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:Common::rewrite_url(APP_PATH."index.php");
					Common::redirect($redirect);
				}
			}else{//��½ʧ��
				$status_class="status_error";
				$default_url="javascript:history.go(-1)";
				$mess="��½ʧ��,������!";
			}
			$tpl->assign("mess",$mess);
			$tpl->assign("user_data",$user_data);
			$tpl->assign("default_url",$default_url);
			$tpl->assign("status_class",$status_class);
			$tpl->display($current_template."/inc/information.tpl");
		}
		if($act=="logout"){
			$user=new User();
			$user->logout();
			if(!$_SESSION['isLogin']){
				$status_class="status_success";
				$default_url=Common::rewrite_url(APP_PATH."user.php?act=login");
				$mess="�˳��ɹ�!";
			} else {
				$status_class="status_error";
				$default_url="javascript:history.go(-1)";
				$mess="�˳�ʧ��!";
			}
			
			$tpl->assign("mess",$mess);
			$tpl->assign("default_url",$default_url);
			$tpl->assign("status_class",$status_class);
			$tpl->display($current_template."/inc/information.tpl");
		}
		if($act=="getPassword"){
			$tpl->display($current_template."/member/get_password.tpl");
		}
		if($act=="sendPassword"){
			$email=trim($_REQUEST['email']);
			$user=new User();
			if(!Validate::check_email($email)){
				$user->showStatus(0,"�����ַ����,��������д!",1);
			} elseif(!$user->check_email_exist($email)){
				$user->showStatus(0,"�޴�����",1);
			} else {
				$user_info = $user->getRow('select * from '.TAB_PREFIX."cms_user where email='".$email."'");
				if($user->sendUser_mail_password($user_info['id'])){
					$result=$user->showStatus(1,"�ʼ����ͳɹ�,�����",1);
				} else {
					$result=$user->showStatus(0,"�ʼ�����ʧ��",1);
				}
			}
			$tpl->display($current_template."/member/get_password.tpl");
		}
		if($act=="modify_password"){
			$id = intval($_GET['id']);
			$user=new User();
			$user_info = $user->get($id);
			if(!$user_info)
			{
				$status_class="status_error";
				$default_url=SERVER_ROOT.APP_PATH;
				$mess="�޴��û�!";
				$tpl->assign("mess",$mess);
				$tpl->assign("default_url",$default_url);
				$tpl->assign("status_class",$status_class);
				$tpl->display($current_template."/inc/information.tpl");
				exit;
			}
			$verify = trim($_GET['code']);
			if($user_info['password_verify'] == $verify&&$user_info['password_verify']!=''){
				//�ɹ�	
				$tpl->assign("user_info",$user_info);
				$tpl->display($current_template."/member/modify_password.tpl");
			}else{
				$status_class="status_error";
				$default_url=SERVER_ROOT.APP_PATH;
				$mess="��֤��ʧЧ!";
				$tpl->assign("mess",$mess);
				$tpl->assign("default_url",$default_url);
				$tpl->assign("status_class",$status_class);
				$tpl->display($current_template."/inc/information.tpl");
				exit;
			}	
		}
		if($act=="do_modify_password"){
			$id = intval($_POST['id']);
			$user=new User();
			$user_info = $user->get($id);
			if(!$user_info)
			{
				$status_class="status_error";
				$default_url=SERVER_ROOT.APP_PATH;
				$mess="�޴��û�!";
				$tpl->assign("mess",$mess);
				$tpl->assign("default_url",$default_url);
				$tpl->assign("status_class",$status_class);
				$tpl->display($current_template."/inc/information.tpl");
				exit;
			}
			$verify = trim($_POST['code']);
			if($user_info['password_verify'] == $verify&&$user_info['password_verify']!=''){
				if(trim($_POST['user_pwd'])!=trim($_POST['user_pwd_confirm'])){
					$status_class="status_error";
					$default_url="javascript:history.go(-1);";
					$mess="�������벻һ��!";
					$tpl->assign("mess",$mess);
					$tpl->assign("default_url",$default_url);
					$tpl->assign("status_class",$status_class);
					$tpl->display($current_template."/inc/information.tpl");
					exit;
				} else{
					$temp['id']=$id;
					$temp['user_pwd']=trim($_POST['user_pwd']);
					if($user->modUser($temp)){
						$status_class="status_success";
						$default_url="javascript:history.go(-1)";
						$mess="�����޸ĳɹ�!";
					} else {
						$status_class="status_error";
						$default_url="javascript:history.go(-1);";
						$mess="�����޸�ʧ��!";
					}
					$tpl->assign("mess",$mess);
					$tpl->assign("default_url",$default_url);
					$tpl->assign("status_class",$status_class);
					$tpl->display($current_template."/inc/information.tpl");
					exit;
					
				}
				$tpl->assign("user_info",$user_info);
				$tpl->display($current_template."/member/modify_password.tpl");
			}else{
				$status_class="status_error";
				$default_url=SERVER_ROOT.APP_PATH;
				$mess="��֤��ʧЧ!";
				$tpl->assign("mess",$mess);
				$tpl->assign("default_url",$default_url);
				$tpl->assign("status_class",$status_class);
				$tpl->display($current_template."/inc/information.tpl");
				exit;
			}	
		}
		
		if($_SESSION['isLogin'] && $_SESSION['user_info']){
			$user_data = $_SESSION['user_info'];
			if($act=="member_index"){
				$title="��Ա����";
				$user_data['money']=sprintf("%.2f",$user_data['money']);
				$g_n=$template->get_other_datas("cms_user_group","name","id",$user_data['group_id']);
				$user_data['group']=$g_n[0]['name'];
				$user_data['ref_total']=$template->getCount("select id from ".TAB_PREFIX."cms_user where pid=".intval($user_data['id']));
				$tpl->assign("title",$title);
				$tpl->assign("user_data",$user_data);
				$tpl->display($current_template."/member/index.tpl");
			} 
			
			if($act=="my_coupon"){
					$title="�ҵ��Ź�ȯ";
					if(!isset($_GET['status'])){
						$_GET['status']=0;
					}
					$status=array(array("name"=>"����","link"=>Common::rewrite_url(APP_PATH."user.php?act=my_coupon&status=0")),array("name"=>"δʹ��","link"=>Common::rewrite_url(APP_PATH."user.php?act=my_coupon&status=1")),array("name"=>"��ʹ��","link"=>Common::rewrite_url(APP_PATH."user.php?act=my_coupon&status=2")));
					foreach($status as $key=>$var){
						if(intval($_GET['status']==$key)){
							$status[$key]['current']=1;
						}else {
							$status[$key]['current']=0;
						}
					}
					$tpl->assign("title",$title);
					$tpl->assign("status",$status);
					$tpl->display($current_template."/member/my_coupon.tpl");
			}
			
			if($act=="send_sms_coupon"){
				if(Common::get_config("SMS_ON")&&Common::get_config("COUPON_SMS_NOTICE")){
					$id=intval($_GET['id']);
					$t=$template->get_other_datas("cms_deal_coupon","sms_count","id",$id);
					$sms_count=$t[0]['sms_count'];
					if(Common::get_config("COUPON_SMS_LIMIT")>$sms_count){
						$deal_coupon=new DealCoupon();
						if($deal_coupon->send_deal_coupon("sms",$id)){
							$sms_count++;
							$temp_post=array("sms_count"=>$sms_count,"id"=>$id);
							$deal_coupon->modDealCoupon($temp_post);
							$status_class="status_success";
							$default_url="javascript:history.go(-1)";
							$mess="���Ͷ��ųɹ�!";
						} else{
							$status_class="status_error";
							$default_url="javascript:history.go(-1)";
							$mess="���Ͷ���ʧ��!";
						}
					} else {
						$status_class="status_error";
						$default_url="javascript:history.go(-1)";
						$mess="���ʹ�������!";
					}
				} else {
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="�ݲ�֧�ֶ��ŵķ���!";
				}
				$tpl->assign("mess",$mess);
				$tpl->assign("default_url",$default_url);
				$tpl->assign("status_class",$status_class);
				$tpl->display($current_template."/inc/information.tpl");
			}
			
			if($act=="send_mail_coupon"){
				if(Common::get_config("MAIL_ON")&&Common::get_config("COUPON_MAIL_NOTICE")){
					$id=intval($_GET['id']);
					$t=$template->get_other_datas("cms_deal_coupon","mail_count","id",$id);
					$mail_count=$t[0]['mail_count'];
					if(Common::get_config("COUPON_MAIL_LIMIT")>$mail_count){
						$deal_coupon=new DealCoupon();
						if($deal_coupon->send_deal_coupon("mail",$id)){
							$mail_count++;
							$temp_post=array("mail_count"=>$mail_count,"id"=>$id);
							$deal_coupon->modDealCoupon($temp_post);
							$status_class="status_success";
							$default_url="javascript:history.go(-1)";
							$mess="�����ʼ��ɹ�!";
						} else{
							$status_class="status_error";
							$default_url="javascript:history.go(-1)";
							$mess="�����ʼ�ʧ��!";
						}
					} else {
						$status_class="status_error";
						$default_url="javascript:history.go(-1)";
						$mess="���ʹ�������!";
					}
				} else {
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="�ݲ�֧���ʼ��ķ���!";
				}
				$tpl->assign("mess",$mess);
				$tpl->assign("default_url",$default_url);
				$tpl->assign("status_class",$status_class);
				$tpl->display($current_template."/inc/information.tpl");
			}
			
			if($act=="coupon_view"){
				$id=intval($_GET['id']);
				$location_id = intval($_GET['location_id']);
				$coupon_data=$template->get_other_datas("cms_deal_coupon","*","id",$id." and is_valid = 1 and is_delete = 0 and user_id = ".intval($user_data['id']));
				if($coupon_data[0]){
					$template->query("update ".TAB_PREFIX."cms_deal_coupon set is_new=1 where id=".$coupon_data[0]['id']);
					
					$deal_data = $template->getAll("select * from ".TAB_PREFIX."cms_deal_order_item where id = ".intval($coupon_data[0]['order_deal_id']));
					$locations =  $template->getAll("select * from ".TAB_PREFIX."cms_supplier_location where supplier_id = ".intval($coupon_data[0]['supplier_id']));
					
					if($location_id==0){
						$location_id = intval($locations[0]['id']);
					}
					if($location_id==0 || $template->getOne("select count(*) from ".TAB_PREFIX."cms_supplier_location where id = ".$location_id)==0){
						$location_info=0;
					}else{
						$location_info = $template->getAll("select * from ".TAB_PREFIX."cms_supplier_location where id=".$location_id);
					}
					if($location_info){
						foreach($locations as $key=>$var){
							$locations[$var["id"]]=$var;
							unset($locations[$key]);
						}
						
						$coupon_data[0]['logo']=GALLERY_PATH.Common::get_config("SITE_LOGO");
						if($coupon_data[0]['begin_time']){
							$coupon_data[0]['begin_time']=Common::to_date($coupon_data[0]['begin_time']);
						} else{
							$coupon_data[0]['begin_time']="ʵʱ��Ч";
						}
						if($coupon_data[0]['end_time']){
							$coupon_data[0]['end_time']=Common::to_date($coupon_data[0]['end_time']);
						} else {
							$coupon_data[0]['end_time']="��������";
						}
						$d_n=$template->get_other_datas("cms_deal","name","id",$coupon_data[0]['deal_id']);
						$coupon_data[0]['deal_name']=$d_n[0]['name'];
						$coupon_data[0]['user_name']=$user_data['user_name'];
						$locations[$location_id]['tel']?$coupon_data[0]['tel']=$locations[$location_id]['tel']:$coupon_data[0]['tel']="����";
						$locations[$location_id]['address']?$coupon_data[0]['address']=$locations[$location_id]['address']:$coupon_data[0]['address']="����";
						$locations[$location_id]['route']?$coupon_data[0]['route']=$locations[$location_id]['route']:$coupon_data[0]['route']="����";
						$locations[$location_id]['open_time']?$coupon_data[0]['open_time']=$locations[$location_id]['open_time']:$coupon_data[0]['open_time']="����";
						$coupon_content=Common::get_config("COUPON_PRT_TPL");
						$coupon_content=str_replace("&lt;","<",$coupon_content);
						$coupon_content=str_replace("&gt;",">",$coupon_content);
						$content=Common::getTempStr("coupon",$coupon_data[0],$coupon_content);
						$tpl->assign("content",$content);
						$tpl->assign("url",Common::rewrite_url(APP_PATH."user.php?act=coupon_view&id={$id}"));
						$tpl->assign("location",$location_info[0]);
						$tpl->assign("GOOGLE_API_KEY",Common::get_config("GOOGLE_API_KEY"));
						$tpl->assign("supplier_location",$locations);
						$tpl->display($current_template."/member/coupon_view.tpl");
					} else {
						$status_class="status_error";
						$default_url="javascript:window.close();";
						$mess="��Ӧ��λ�ô���,�޷���ӡ�Ź�ȯ";
						$tpl->assign("mess",$mess);
						$tpl->assign("default_url",$default_url);
						$tpl->assign("status_class",$status_class);
						$tpl->display($current_template."/inc/information.tpl");
					}
					
				}
				
			}
			
			
			if($act=="my_order"){
				$title="�ҵĶ���";
				$tpl->assign("title",$title);
				$tpl->display($current_template."/member/my_order.tpl");
			}
			if($act=="my_order_del"){
				$id = intval($_GET['id']);
				$deal_order=new DealOrder();
				if($deal_order->del_front_order($id,$user_data['id'])){
					$status_class="status_success";
					$default_url="javascript:history.go(-1)";
					$mess="����ɾ���ɹ�!";
				}else{
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="ֻ��ɾ��δ֧������!";
				}
				$tpl->assign("mess",$mess);
				$tpl->assign("default_url",$default_url);
				$tpl->assign("status_class",$status_class);
				$tpl->display($current_template."/inc/information.tpl");
			}
			if($act=="my_order_view"){
				$title="��������";
				$deal_order=new DealOrder();
				$order_id=intval($_GET['id']);
				$money_format_arr=array("unit_price","total_price","return_money","return_total_money");
				$deal_order_item=$deal_order->get_other_datas("cms_deal_order_item","*","order_id",$order_id);
				if($deal_order_item){
					foreach($deal_order_item as $key=>$var){
						foreach($var as $k=>$v){
							if(in_array($k,$money_format_arr)){
								$deal_order_item[$key][$k]=sprintf("%.2f", $v);
							}
						}
						$deal_order_item[$key]['delivery_status_cn']=$deal_order->get_delivery_sn($var['id']);
					}
				}
				
				$tpl->assign("title",$title);
				$tpl->assign("deal_order_item",$deal_order_item);
				$tpl->display($current_template."/member/my_order_view.tpl");
			}
			if($act=="my_order_arrival"){
				$id = intval($_GET['id']);
				$delivery_notice=$template->get_other_datas("cms_delivery_notice","id","id",$id);
				if($delivery_notice[0]['id']){
					$template->query("update ".TAB_PREFIX."cms_delivery_notice set is_arrival=1,arrival_time=".Common::get_gmtime()." where id = ".$id);
					$status_class="status_success";
					$default_url="javascript:history.go(-1)";
					$mess="ȷ���ջ��ɹ�!";
				} else {
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="�Ƿ�����ID!";
				}
				$tpl->assign("mess",$mess);
				$tpl->assign("default_url",$default_url);
				$tpl->assign("status_class",$status_class);
				$tpl->display($current_template."/inc/information.tpl");
			}
			//����֧��ҳ��
			if($act=="order_pay"){
				$id = intval($_GET['id']);
				$order_info=$template->getRow("select * from ".TAB_PREFIX."cms_deal_orders where id = ".$id." and is_delete = 0 and pay_status <> 2 and order_status <> 1");
				if($order_info){
					if($order_info['type']==1){
						$tpl->display($current_template."/member/money_incharge.tpl");
					} else {
						$title="����֧��";
						$is_delivery = 0;
						//�ö����е���Ʒһ����templateΪģ�棩
						$cart_list = $template->getAll("select * from ".TAB_PREFIX."cms_deal_order_item where order_id = ".$order_info['id']);
						foreach($cart_list as $k=>$v){
							if($template->getOne("select is_delivery from ".TAB_PREFIX."cms_deal where id = ".$v['deal_id'])==1){
								$is_delivery = 1;
								break;
							}
						}
						$cart_list[0]['unit_price']=sprintf("%.2f", $cart_list[0]['unit_price']);
						$cart_list[0]['total_price']=sprintf("%.2f", $cart_list[0]['total_price']);
						if($is_delivery){
							$consignee_id = $template->getOne("select id from ".TAB_PREFIX."cms_user_consignee where user_id = ".$user_data['id']);
							$tpl->assign("consignee_id",intval($consignee_id));
						}
						$payment=new Payment();
						// ֧����ʽ
						$payment_list = $payment->get_front_payments();
						$ud=$payment->getAll("select * from ".TAB_PREFIX."cms_user where id = ".$user_data['id']." and status = 1 and is_delete = 0");
						if($ud[0]&&$ud[0]['money']>0){
							$account_html="�ʻ���"."<strong style='color:red'>&yen;".round($ud[0]['money'],2)."</strong>&nbsp;&nbsp;ʹ�����֧����<input type='text' style='width: 50px;' value='' name='account_money' class='f-input' id='account_money'>&nbsp;&nbsp;<label><input type='checkbox' checked='checked' id='check-all-money' name='all_account_money'>ȫ��֧��</label>";
						}
						
						$tpl->assign("title",$title);
						$tpl->assign("payment_list",$payment_list);
						$tpl->assign("account_html",$account_html);
						$tpl->assign('order_info',$order_info);	
						$tpl->assign("cart_list",$cart_list);
						$tpl->assign('total_price',sprintf("%.2f", $order_info['deal_total_price']));
						$tpl->assign("is_delivery",$is_delivery);
						$tpl->display($current_template."/cart_check.tpl");
					}
					
				} else {
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="�Ƿ���������ID!";
					$tpl->assign("mess",$mess);
					$tpl->assign("default_url",$default_url);
					$tpl->assign("status_class",$status_class);
					$tpl->display($current_template."/inc/information.tpl");
				}
			}
			
			if($act=="my_money"){
				$title="�ʽ����";
				$total_money=sprintf("%.2f",$user_data['money']);
				$total_score=$user_data['score'];
				$tpl->assign("title",$title);
				$tpl->assign("total_money",$total_money);
				$tpl->assign("total_score",$total_score);
				$tpl->display($current_template."/member/my_money.tpl");
			}
			
			if($act=="incharge"){
				$title="��Ա��ֵ";
				$payment=new Payment();
				$payment_list=$payment->get_front_payments();
				$total_money=sprintf("%.2f",$user_data['money']);
				$total_score=$user_data['score'];
				$tpl->assign("title",$title);
				$tpl->assign("total_money",$total_money);
				$tpl->assign("total_score",$total_score);
				$tpl->assign("payment_list",$payment_list);
				$tpl->display($current_template."/member/incharge.tpl");
			}
			if($act=="incharge_done"){
				$payment_id = intval($_POST['payment']);
				$money = floatval($_POST['money']);
				$payment=new Payment();
				$payment_info = $payment->get($payment_id);
				if($money<=0){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="��������ȷ���!";
					$tpl->assign("mess",$mess);
					$tpl->assign("default_url",$default_url);
					$tpl->assign("status_class",$status_class);
					$tpl->display($current_template."/inc/information.tpl");
				}elseif(!$payment_info){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="��ѡ��֧����ʽ!";
					$tpl->assign("mess",$mess);
					$tpl->assign("default_url",$default_url);
					$tpl->assign("status_class",$status_class);
					$tpl->display($current_template."/inc/information.tpl");
				}else{
					//��ʼ���ɶ���
					$deal_order=new DealOrder();
					$temp=array("update_time","pay_status","pay_amount","order_status","is_delete","return_total_score","refund_amount","region_lv1","region_lv2","region_lv3","region_lv4","discount_price","delivery_fee","ecv_money","account_money","delivery_id","return_total_money","extra_status","after_sale","refund_money");
					$order['type'] = 1; //��ֵ��
					$order['user_id'] = $user_data['id'];
					$order['create_time'] = Common::get_gmtime();
					$order['total_price'] = $money + $payment_info['fee_amount'];
					$order['deal_total_price'] = $money;
					$order['delivery_status'] = 5;  
					$order['payment_id'] = $payment_id;
					$order['payment_fee'] = $payment_info['fee_amount'];
					$order['admin_memo']='';
					$order['memo']='';
					$order['address']='';
					$order['mobile']='';
					$order['zip']='';
					$order['consignee']='';
					foreach($temp as $var){
						$order[$var]=0;
					}
					do{
						$order['order_sn'] = Common::date_to_name();
						$order_id=$deal_order->addDealOrder($order); 
					}while($order_id==0);
					
					//���ɸ��
					$notice['notice_sn']=Common::date_to_name();
					$notice['create_time']=Common::get_gmtime();
					$notice['pay_time']=0;
					$notice['order_id']=$order_id;
					$notice['is_paid']=0;
					$t=$template->get_other_datas("cms_deal_orders","user_id","id",$order_id);
					$notice['user_id']=$t[0]['user_id'];
					$notice['payment_id']=$payment_id;
					$notice['memo']='';
					$notice['money']=$order['total_price'];
					$paymentNotice=new PaymentNotice();
					$payment_notice_id = $paymentNotice->makePaymentNotice($notice);
					
					if($deal_order->orderPaid($order_id)){
						$status_class="status_success";
						$default_url="javascript:history.go(-1)";
						$mess="��ֵ֧���ɹ�!";
						$tpl->assign("mess",$mess);
						$tpl->assign("default_url",$default_url);
						$tpl->assign("status_class",$status_class);
						$tpl->display($current_template."/inc/information.tpl");
					} else{
						Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=pay&id=".$payment_notice_id));
					}
				}
				
			}
			
			if($act=="my_profile"){
				$title="�ʻ��༭";
				$user_field=new UserField();
				$userExt=new UserExt();
				$uf=$user_field->get_userFields();
				$getUserExt=$userExt->get_userExt($user_data['id']);
				$tpl->assign("title",$title);
				$tpl->assign("user_field", $uf);
				$tpl->assign("getUserExt", $getUserExt);
				$tpl->assign("user_data",$user_data);
				$tpl->assign("ext_id",$getUserExt['id']);
				$tpl->display($current_template."/member/my_profile.tpl");
			}
			if($act=="mod_profile"){
				$user_field=new UserField();
				$uf=$user_field->get_userFields();
				$user=new User();
				foreach($uf as $var){
					if($var['type']==0 && $var['is_must']){
						if(!Validate::required($_POST[$var['field_name']])){
							$ext_status=0;
							$status_class="status_error";
							$default_url="javascript:history.go(-1)";
							$mess="����д".$var['field_show_name'];
							$tpl->assign("mess",$mess);
							$tpl->assign("default_url",$default_url);
							$tpl->assign("status_class",$status_class);
							$tpl->display($current_template."/inc/information.tpl");
							exit;
						} 
					}
					
				}
				if(!Validate::required($_POST['email'])){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="����д����!";
				} elseif(!Validate::match($_POST['email'],"/([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?/i")){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="�����ʽ����ȷ!";
				}else{
					$_POST['id']=$user_data['id'];
					if($user->modUser($_POST)){
						$userExt=new UserExt();
						$getUserField=$user->get_other_datas("cms_user_field where is_delete=0","*");
						$field_id_arr=array();
						$value_arr=array();
						foreach($getUserField as $var){
							$tmpName=$var["field_name"];
							array_push($field_id_arr,$var["id"]);
							array_push($value_arr,$_POST[$tmpName]);
						}
						$tmpFieldStr=join("|",$field_id_arr);
						$tmpValueStr=join("|",$value_arr);
						$post_temp=array("id"=>intval($_POST['ext_id']),"field_id"=>$tmpFieldStr,"user_id"=>$user_data['id'],"value"=>$tmpValueStr);
						$userExt->modUserExt($post_temp);
						$status_class="status_success";
						$default_url="javascript:history.go(-1)";
						$mess="�༭�ɹ�!";
					} else{
						$status_class="status_error";
						$default_url="javascript:history.go(-1)";
						$mess="�༭ʧ��!";
					}
				}
				$tpl->assign("mess",$mess);
				$tpl->assign("default_url",$default_url);
				$tpl->assign("status_class",$status_class);
				$tpl->display($current_template."/inc/information.tpl");
			}
			
			if($act=="my_consignee"){
				$title="���͵�ַ";
				$consignee_info = $template->getAll("select * from ".TAB_PREFIX."cms_user_consignee where user_id = ".$user_data['id']);
				if($consignee_info){
					$region_lv1=$template->getAll("select * from ".TAB_PREFIX."cms_delivery_area where pid = 0 and is_delete=0"); 
					$region_lv2=$template->getAll("select * from ".TAB_PREFIX."cms_delivery_area where pid = ".$consignee_info[0]['region_lv1']." and is_delete=0");
					$region_lv2_all=$template->getAll("select * from ".TAB_PREFIX."cms_delivery_area where level = 2 and is_delete=0");
					$region_lv3=$template->getAll("select * from ".TAB_PREFIX."cms_delivery_area where pid = ".$consignee_info[0]['region_lv2']." and is_delete=0");
					$region_lv3_all=$template->getAll("select * from ".TAB_PREFIX."cms_delivery_area where level = 3 and is_delete=0");
					foreach($region_lv1 as $k=>$v){
						if($v['id'] == $consignee_info[0]['region_lv1']){
							$region_lv1[$k]['selected'] = 1;
							break;
						}
					}
					foreach($region_lv2 as $k=>$v){
						if($v['id'] == $consignee_info[0]['region_lv2']){
							$region_lv2[$k]['selected'] = 1;
							break;
						}
					}
					foreach($region_lv3 as $k=>$v){
						if($v['id'] == $consignee_info[0]['region_lv3']){
							$region_lv3[$k]['selected'] = 1;
							break;
						}
					}
					$consignee_info[0]['region_lv2_all']=$region_lv2_all;
					$consignee_info[0]['region_lv3_all']=$region_lv3_all;
				}else{
					$region_lv1=$template->getAll("select * from ".TAB_PREFIX."cms_delivery_area where pid = 0 and is_delete=0"); 
					$consignee_info[0]['region_lv2_all']=$template->getAll("select * from ".TAB_PREFIX."cms_delivery_area where level = 2 and is_delete=0");
					$consignee_info[0]['region_lv3_all']=$template->getAll("select * from ".TAB_PREFIX."cms_delivery_area where level = 3 and is_delete=0");
				}
				$consignee_info[0]['region_lv1']=$region_lv1;
				$consignee_info[0]['region_lv2']=$region_lv2;
				$consignee_info[0]['region_lv3']=$region_lv3;
				
				$tpl->assign("title",$title);
				
				$tpl->assign("consignee_info",$consignee_info[0]);
				$tpl->display($current_template."/member/my_consignee.tpl");
			}
			if($act=="mod_consignee"){
				$id=intval($_POST['id']);
				$_POST['user_id']=$user_data['id'];
				if(!Validate::noZero($_POST['region_lv3'])){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="����д���ڵ���!";
				} elseif(!Validate::required($_POST['consignee'])){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="����д�ջ���!";
				} elseif(!Validate::required($_POST['address'])){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="����д��ַ!";
				} elseif(!Validate::required($_POST['zip'])){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="����д�ʱ�!";
				} elseif(!Validate::required($_POST['mobile'])){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="����д�ֻ���!";
				} elseif(!Validate::match($_POST['mobile'],"/^(13\d{9}|14\d{9}|15\d{9}|18\d{9})|(0\d{9}|9\d{8})$/")){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess="�ֻ��Ų���ȷ!";
				} else{
					$uc=new UserConsignee();
					if($id){
						if($uc->modUserConsignee($_POST)){
							$status_class="status_success";
							$default_url="javascript:history.go(-1)";
							$mess="���͵�ַ�޸ĳɹ�!";
						}
					} else{
						if($uc->addUserConsignee($_POST)){
							$status_class="status_success";
							$default_url="javascript:history.go(-1)";
							$mess="���͵�ַ��ӳɹ�!";
						}
					}
				}
				$tpl->assign("mess",$mess);
				$tpl->assign("default_url",$default_url);
				$tpl->assign("status_class",$status_class);
				$tpl->display($current_template."/inc/information.tpl");
			}
			if($act=="my_invite"){
				$title="�ҵ�����";
				$total_referral_money =$template->getOne("select sum(money) from ".TAB_PREFIX."cms_referrals where user_id = ".$user_data['id']." and pay_time > 0");
				$total_referral_score =$template->getOne("select sum(score) from ".TAB_PREFIX."cms_referrals where user_id = ".$user_data['id']." and pay_time > 0");
				$total_referral_money=sprintf("%.2f", $total_referral_money);
				$tpl->assign("title",$title);
				$tpl->assign("total_referral_money",$total_referral_money);
				$tpl->assign("total_referral_score",$total_referral_score);
				$tpl->display($current_template."/member/my_invite.tpl");
			}
		}else{
			if(!in_array($act,$no_login_act)){
				$tpl->display($current_template."/member/login.tpl");
			}
			
		}
		
	}	
?>