<?php
	/*==================================================================*/
	/*		文件名:MainControl.class.php                        */
	/*		概要: 主控制器类.                	       	    */
	/*		作者: 李文                                        */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	require "../FCKeditor/fckeditor.php"; // 用于载入FCKeditor类文件
	class MainControl {
		private $tpl;
		private $timer;
		private $logAction;

		function __construct($tpl,$action=null){
			$this->timer=new Timer();
			$this->logAction=new LogAction();
			$this->tpl=$tpl;
			$this->tpl->assign("APP_STYLE",APP_ADMIN_STYLE);
			$id=isset($_GET["id"])?$_GET["id"]:0;
			if(!$this->access()){
				$action="no_access";
			}
			switch($action) {
				//系统信息
				case 'sysinfo':
					$this->sysInfo();
				break;
				//团购管理
				case 'deals':
					$this->deals("",$id);
				break;
				case 'add_deals':
					$this->deals($action,$id);
				break;
				case 'deal_detail':
					$this->deals($action,$id);
				break;
				case 'deal_coupon':
					$this->deal_coupon("",$id);
				break;
				case 'add_dealCoupon':
					$this->deal_coupon($action,$id);
				break;
				case 'send_coupon_sms':
					$this->deal_coupon($action,$id);
				break;
				case 'send_coupon_mail':
					$this->deal_coupon($action,$id);
				break;
				//重量管理
				case 'weight':
					$this->weight("",$id);
				break;
				case 'add_weight':
					$this->weight($action,$id);
				break;
				//团购分类
				case 'deals_category':
					$this->deals_category("",$id);
				break;
				case 'add_dealsCate':
					$this->deals_category($action,$id);
				break;
				//供应商管理
				case 'supplier':
					$this->supplier("",$id);
				break;
				case 'add_supplier':
					$this->supplier($action,$id);
				break;
				case 'supplier_account':
					$this->supplierAccount("",$id);
				break;
				case 'add_supplierAccount':
					$this->supplierAccount($action,$id);
				break;
				case 'supplier_location':
					$this->supplierLocation("",$id);
				break;
				case 'add_supplierLocation':
					$this->supplierLocation($action,$id);
				break;
				case 'set_location_main':
					$this->supplierLocation($action,$id);
				break;
				//城市管理
				case 'city':
					$this->cities("",$id);
				break;
				case 'add_city':
					$this->cities($action,$id);
				break;
				case 'set_default':
					$this->cities($action,$id);
				break;
				//网站前端设置
				case 'info_cate':
					$this->info_cate("",$id);
				break;
				case 'add_infoCate':
					$this->info_cate($action,$id);
				break;
				case 'infos':
					$this->infos("",$id);
				break;
				case 'add_infos':
					$this->infos($action,$id);
				break;
				case 'nav':
					$this->nav("",$id);
				break;
				case 'mod_nav':
					$this->nav($action,$id);
				break;
				case 'adv':
					$this->adv("",$id);
				break;
				case 'add_adv':
					$this->adv($action,$id);
				break;
				case 'links':
					$this->links("",$id);
				break;
				case 'add_links':
					$this->links($action,$id);
				break;
				case 'templates':
					$this->templates("",$id);
				break;
				case 'add_templates':
					$this->templates($action,$id);
				break;
				case 'set_temp_default':
					$this->templates($action,$id);
				break;
				case 'message_group':
					$this->message_group("",$id);
				break;
				case 'add_messageGroup':
					$this->message_group($action,$id);
				break;
				case 'message':
					$this->messages("",$id);
				break;
				case 'reply_message':
					$this->messages($action,$id);
				break;
				//会员管理
				case 'user_group':
					$this->user_group("",$id);
				break;
				case 'add_userGroup':
					$this->user_group($action,$id);
				break;
				case 'user_field':
					$this->user_field("",$id);
				break;
				case 'add_userField':
					$this->user_field($action,$id);
				break;
				case 'user':
					$this->user("",$id);
				break;
				case 'add_user':
					$this->user($action,$id);
				break;
				case 'user_log':
					$this->user_log("",$id);
				break;
				case 'referrals':
					$this->referrals("",$id);
				break;
				//订单管理
				case 'deal_orders':
					$this->deal_orders($action,$id);
				break;
				case 'recharge_orders':
					$this->deal_orders($action,$id);
				break;
				case 'deal_orders_log':
					$this->deal_orders($action,$id);
				break;
				case 'view_order':
					$this->deal_orders($action,$id);
				break;
				case 'order_incharge':
					$this->deal_orders($action,$id);
				break;
				case 'pay_incharge':
					$this->deal_orders($action,$id);
				break;
				case 'delivery':
					$this->deal_orders($action,$id);
				break;
				case 'paymentNotice':
					$this->paymentNotice("",$id);
				break;
				case 'payment':
					$this->payment("",$id);
				break;
				case 'edit_payment':
					$this->payment($action,$id);
				break;
				case 'delivery_area':
					$this->delivery_area("",$id);
				break;
				case 'delivery_areaTree':
					$this->delivery_area($action,$id);
				break;
				case 'add_deliveryArea':
					$this->delivery_area($action,$id);
				break;
				case 'delivery_way':
					$this->delivery_way("",$id);
				break;
				case 'add_deliveryWay':
					$this->delivery_way($action,$id);
				break;
				//短信邮件
				case 'msg_template':
					$this->msg_template("",$id);
				break;
				case 'edit_msgTemplate':
					$this->msg_template($action,$id);
				break;
				case 'mail_list':
					$this->mail_list("",$id);
				break;
				case 'add_mailList':
					$this->mail_list($action,$id);
				break;
				case 'mail_server':
					$this->mail_server("",$id);
				break;
				case 'add_mailServer':
					$this->mail_server($action,$id);
				break;
				case 'send_test':
					$this->mail_server($action,$id);
				break;
				case 'set_mailServer_default':
					$this->mail_server($action,$id);
				break;
				case 'sms_list':
					$this->sms_list("",$id);
				break;
				case 'sms_subscription':
					$this->sms_subscription("",$id);
				break;
				case 'add_smsSubscription':
					$this->sms_subscription($action,$id);
				break;
				case 'msg_queue':
					$this->deal_msg_list("",$id);
				break;
				case 'send_deal_msg':
					$this->deal_msg_list($action,$id);
				break;
				//系统设置
				case 'sys_config':
					$this->sys_config("");
				break;
				case 'role':
					$this->role("",$id);
				break;
				case 'add_role':
					$this->role($action,$id);
				break;
				case 'admin':
					$this->admin("",$id);
				break;
				case 'add_admin':
					$this->admin($action,$id);
				break;
				case 'set_admin_default':
					$this->admin($action,$id);
				break;
				case 'backup':
					$this->backup("",$id);
				break;
				case 'clear_cache':
					$this->clear_cache("",$id);
				break;
				case 'do_clearCache':
					$this->clear_cache($action,$id);
				break;
				case 'do_backup':
					$this->backup($action,$id);
				break;
				case 'log':
					$this->logs("",$id);
				break;
				//团购回收站
				case 'deals_recycle':
					$this->recycle($action,$id);
				break;
				case 'front_recycle':
					$this->recycle($action,$id);
				break;
				case 'member_recycle':
					$this->recycle($action,$id);
				break;
				case 'orders_recycle':
					$this->recycle($action,$id);
				break;
				case 'msg_recycle':
					$this->recycle($action,$id);
				break;
				case 'sys_recycle':
					$this->recycle($action,$id);
				break;
				case 'restore':
					$this->recycle($action,$id);
				break;
				//权限
				case 'no_access':
					$this->no_access();
				break;
				default:
					$this->sysInfo();
			}
		}
		//------------------------系统信息-----------------------------//
		private function sysInfo(){
			$mydb=new MyDB();
			$sysinfo=new SysInfo($mydb);
			$result_info=new ResultInfo();
			/*信息*/
			$this->tpl->assign("sysinfo", $sysinfo->getSysInfos());	
			$this->tpl->assign("version",VERSION);
			/*会员*/
			$this->tpl->assign("user_info",$result_info->getUserInfo());
			/*团购*/
			$this->tpl->assign("deal_info",$result_info->getDealInfo());
			/*订单*/
			$this->tpl->assign("order_info",$result_info->getOrderInfo());
			/*充值订单*/
			$this->tpl->assign("incharge_info",$result_info->getInchargeInfo());
			/*模板*/
			$this->tpl->display(APP_ADMIN_STYLE."/admin/index/main.tpl");
		}
		//------------------------回收站-----------------------------//
		private function recycle($status="",$id=0){
			switch($status){
				case 'deals_recycle':
					$tables=array("cms_deal"=>array("团购列表","name"),
								  "cms_deal_coupon"=>array("团购券列表","sn"),
								  "cms_city"=>array("团购城市","name"),
								  "cms_deal_category"=>array("团购分类","name"),
						 		  "cms_supplier_account"=>array("供应商帐号","account_name"),
						 		  "cms_supplier_location"=>array("团购分店位置","name")
						  );
					$current_table=isset($_GET['current'])?$_GET['current']:"cms_deal";
				break;
				case 'front_recycle':
					$tables=array("cms_info_cate"=>array("信息分类","name"),
								  "cms_infos"=>array("信息列表","title"),
								  "cms_templates"=>array("模版管理","name"),
								  "cms_message_group"=>array("留言分组","show_name"),
								  "cms_message"=>array("留言管理","title")
						  );
					$current_table=isset($_GET['current'])?$_GET['current']:"cms_info_cate";
				break;
				case 'member_recycle':
					$tables=array("cms_user"=>array("会员管理","user_name"),
								  "cms_user_field"=>array("会员扩展","field_show_name"),
								  "cms_user_group"=>array("会员分组","name")
						  );
					$current_table=isset($_GET['current'])?$_GET['current']:"cms_user";
				break;
				case 'orders_recycle':
					$tables=array("cms_deal_orders"=>array("订单管理","order_sn"),
								  "cms_delivery_area"=>array("配送地区","name"),
								  "cms_delivery_way"=>array("配送方式","name")
						  );
					$current_table=isset($_GET['current'])?$_GET['current']:"cms_deal_orders";
				break;
				case 'msg_recycle':
					$tables=array("cms_mail_list"=>array("邮件订阅","mail_address"),
								  "cms_mail_server"=>array("邮件服务器","smtp_server"),
								  "cms_sms_subscription"=>array("短信订阅列表","phone")
						  );
					$current_table=isset($_GET['current'])?$_GET['current']:"cms_mail_list";
				break;
				case 'sys_recycle':
					$tables=array("cms_role"=>array("管理员分组","name"),
								  "cms_admin"=>array("管理员","adm_name")
						  );
					$current_table=isset($_GET['current'])?$_GET['current']:"cms_role";
				break;
			}
			$recycle=new Recycle($tables,$current_table);
			
			if($_GET['edit']=="restore"){
					if(isset($_POST["del"])){
							$id=$_POST["del"];
						}else{
							$id=$_GET["id"];
						}
				if($recycle->modRecycle($id)){
					$this->logAction->write_log(1,$status,"还原");
					$this->message(1, $recycle->getMessList());
					$this->mess_page($recycle->getMessList());
				} else {
					$this->logAction->write_log(0,$status,"还原");
					$this->message(0, $recycle->getMessList());
				}
			} else {
				$this->tpl->assign("tables",$tables);
				$this->tpl->assign("current_table",TAB_PREFIX.$current_table);

				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($recycle->get_recycle_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				
					if($_GET['edit']=="del") {
						if(isset($_POST["del"])){
							$id=$_POST["del"];
						}else{
							$id=$_GET["id"];
						}
						if($recycle->delRecycle($id)){
							$this->logAction->write_log(1,$status,"删除");
							$this->message(1, $recycle->getMessList());
							$this->mess_page($recycle->getMessList());
						} else {
							$this->logAction->write_log(0,$status,"删除");
							$this->message(0, $recycle->getMessList());
						}
					}
				$this->tpl->assign("recycle",$recycle->get_recycle($pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->assign("status",$status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/common/recycle.tpl");
			}
			
		}
		
		//------------------------信息分类设置-----------------------------//
		
		private function info_cate($status="",$id=0){
			$info_cate=new Info_category();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($info_cate->get_cate_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($info_cate->delInfoCategory($post_temp)){
						$this->logAction->write_log(1,"info_cate","放入回收站");
						$this->message(1, $info_cate->getMessList());
						$this->mess_page($info_cate->getMessList());
					} else {
						$this->logAction->write_log(0,"info_cate","放入回收站");
						$this->message(0, $info_cate->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($info_cate->delInfoCategories($_POST["del"])){
						$this->logAction->write_log(1,"info_cate","批量放入回收站");
						$this->message(1, $info_cate->getMessList());
						$this->mess_page($info_cate->getMessList());
					} else {
						$this->logAction->write_log(0,"info_cate","批量放入回收站");
						$this->message(0, $info_cate->getMessList());
					}
				} 
				$this->tpl->assign("infoCate",$info_cate->get_infoCategory(false,false,"all",$pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/info_category.tpl");
			}
			if($status=="add_infoCate"){
			
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
				}
				
				if($_GET['edit']=="mod"){
					$getInfoCate=$info_cate->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getInfoCate", $getInfoCate);
					if($getInfoCate["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
				}
				
				if($_POST['act']=="add"){
					if($info_cate->validateForm($_POST)){
						if($info_cate->addInfoCategory($_POST)){
							$this->logAction->write_log(1,"info_cate","添加");
							$this->message(1, $info_cate->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_infoCate&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=info_cate';
							$this->mess_page($info_cate->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"info_cate","添加");
							$this->message(0, $info_cate->getMessList());
						}
					} else {
						$this->message(0, $info_cate->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($info_cate->validateForm($_POST)){
						if($info_cate->modInfoCategory($_POST)){
							$this->logAction->write_log(1,"info_cate","编辑");
							$this->message(1, $info_cate->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=info_cate';
							$this->mess_page($info_cate->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"info_cate","编辑");
							$this->message(0, $info_cate->getMessList());
						}
					} else {
						$this->message(0, $info_cate->getMessList());
					}
				}
				
				
				$this->tpl->assign("status",$status);
				$this->tpl->assign("info_cate",$info_cate->get_infoCategory());
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/add_infoCate.tpl");
			}
		}
		
		//------------------------信息管理-----------------------------//
		
		private function infos($status="",$id=0){
			$infos=new Infos();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($infos->get_infos_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($infos->delInfo($post_temp)){
						$this->logAction->write_log(1,"infos","放入回收站");
						$this->message(1, $infos->getMessList());
						$this->mess_page($infos->getMessList());
					} else {
						$this->logAction->write_log(0,"infos","放入回收站");
						$this->message(0, $infos->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($infos->delInfos($_POST["del"])){
						$this->logAction->write_log(1,"infos","批量放入回收站");
						$this->message(1, $infos->getMessList());
						$this->mess_page($infos->getMessList());
					} else {
						$this->logAction->write_log(0,"infos","批量放入回收站");
						$this->message(0, $infos->getMessList());
					}
				}
				$infos_info=$infos->get_infos(true,false,false,false,$pageInfo["row_offset"],$pageInfo["row_num"]);
				$this->tpl->assign("infos",$infos_info);
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/infos.tpl");
			}
			
			if($status=="add_infos"){
				$content= new FCKeditor("content");
				$content->BasePath = '../FCKeditor/';
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
				}
				
				if($_GET['edit']=="mod"){
					$getInfos=$infos->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getInfos", $getInfos);
					if($getInfos["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
					$content->Value=$getInfos["content"];
				}
				
				if($_POST['act']=="add"){
					if($infos->validateForm($_POST)){
						if($infos->addInfos($_POST)){
							$this->logAction->write_log(1,"infos","添加");
							$this->message(1, $infos->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_infos&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=infos';
							$this->mess_page($infos->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"infos","添加");
							$this->message(0, $infos->getMessList());
						}
					} else {
						$this->message(0, $infos->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($infos->validateForm($_POST)){
						if($infos->modInfos($_POST)){
							$this->logAction->write_log(1,"infos","编辑");
							$this->message(1, $infos->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=infos';
							$this->mess_page($infos->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"infos","编辑");
							$this->message(0, $infos->getMessList());
						}
					} else {
						$this->message(0, $infos->getMessList());
					}
				}
				
				
				$this->tpl->assign("status",$status);
				$this->tpl->assign("content",$content->Create());
				$this->tpl->assign("info_cate",$infos->get_other_datas("cms_info_cate where is_delete=0","id,name"));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/add_infos.tpl");
			}
		}
		
		//------------------------主导航管理-----------------------------//
		
		private function nav($status="",$id=0){
			$nav=new Nav();
			if($status==""){
				$this->tpl->assign("nav",$nav->get_nav(0));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/nav.tpl");
			}
			if($status=="mod_nav"){
				if($_GET['edit']=="mod"){
					$getNav=$nav->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("getNav",$getNav);
					$this->tpl->assign("get_module",$nav->get_module());
					if($getNav["is_newWindow"]){
						$this->tpl->assign("newWindow", "checked='checked'");
					} else {
						$this->tpl->assign("noWindow", "checked='checked'");
					}
					if($getNav["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
				}
				if($_POST['act']=="mod"){
					if($nav->validateForm($_POST)){
						if($nav->modNav($_POST)){
							$this->logAction->write_log(1,"nav","编辑");
							$this->message(1, $nav->getMessList());
							$link[0]['text'] = "返回导航列表";
							$link[0]['href'] = '?act=nav';
							$this->mess_page($nav->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"nav","编辑");
							$this->message(0, $nav->getMessList());
						}
					} else {
						$this->message(0, $nav->getMessList());
					}
				}
				$this->tpl->assign("status",$status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/mod_nav.tpl");
			}
		}
		
		//------------------------广告管理-----------------------------//
		
		private function adv($status="",$id=0){
			$adv=new Adv();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($adv->get_advs_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del") {
					if(isset($_POST["del"])){
						$id=$_POST["del"];
					}else{
						$id=$_GET["id"];
					}
					if($adv->delAdv($id)){
						$this->logAction->write_log(1,"adv","删除");
						$this->message(1, $adv->getMessList());
						$this->mess_page($adv->getMessList());
					} else {
						$this->logAction->write_log(0,"adv","删除");
						$this->message(0, $adv->getMessList());
					}
				}
				$this->tpl->assign("advs",$adv->get_advs(false,false,'all',$pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/adv.tpl");
			}
			if($status=="add_adv"){
				$code= new FCKeditor("code");
				$code->BasePath = '../FCKeditor/';
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
				}
				
				if($_GET['edit']=="mod"){
					$getAdvs=$adv->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getAdvs", $getAdvs);
					if($getAdvs["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
					$code->Value=$getAdvs["code"];
				}
				
				if($_POST['act']=="add"){
					if($adv->validateForm($_POST)){
						if($adv->addAdv($_POST)){
							$this->logAction->write_log(1,"adv","添加");
							$this->message(1, $adv->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_adv&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=adv';
							$this->mess_page($adv->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"adv","添加");
							$this->message(0, $adv->getMessList());
						}
					} else {
						$this->message(0, $adv->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($adv->validateForm($_POST)){
						if($adv->modAdv($_POST)){
							$this->logAction->write_log(1,"adv","编辑");
							$this->message(1, $adv->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=adv';
							$this->mess_page($adv->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"adv","编辑");
							$this->message(0, $adv->getMessList());
						}
					} else {
						$this->message(0, $adv->getMessList());
					}
				}
				
				
				$this->tpl->assign("status",$status);
				$this->tpl->assign("code",$code->Create());
				$this->tpl->assign("advs",$adv->get_advs());
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/add_adv.tpl");
			}
		}
		
		//------------------------友情链接管理-----------------------------//
		
		private function links($status="",$id=0){
			$links=new Links();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($links->get_links_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del") {
					if(isset($_POST["del"])){
						$id=$_POST["del"];
					}else{
						$id=$_GET["id"];
					}
					if($links->delLinks($id)){
						$this->logAction->write_log(1,"links","删除");
						$this->message(1, $links->getMessList());
						$this->mess_page($links->getMessList());
					} else {
						$this->logAction->write_log(0,"links","删除");
						$this->message(0, $links->getMessList());
					}
				}
				$this->tpl->assign("links",$links->get_links(false,false,$pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/links.tpl");
			}
			
			if($status=="add_links"){
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
				}
				if($_GET['edit']=="mod"){
					$getLinks=$links->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getLinks", $getLinks);
					if($getLinks["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
				}
				
				if($_POST['act']=="add"){
					if($links->validateForm($_POST)){
						if($links->addLinks(new FileUpload(array("filePath"=>UPLOADPIC_PATH)),$_POST,$_FILES)){
							$this->logAction->write_log(1,"links","添加");
							$this->message(1, $links->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_links&edit=add';
							$link[1]['text'] = "返回友情链接列表";
							$link[1]['href'] = '?act=links';
							$this->mess_page($links->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"links","添加");
							$this->message(0, $links->getMessList());
						}
					} else {
						$this->message(0, $links->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($links->validateForm($_POST)){
						if($links->modLinks(new FileUpload(array("filePath"=>UPLOADPIC_PATH)),$_POST,$_FILES)){
							$this->logAction->write_log(1,"links","编辑");
							$this->message(1, $links->getMessList());
							$link[0]['text'] = "返回友情链接列表";
							$link[0]['href'] = '?act=links';
							$this->mess_page($links->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"links","编辑");
							$this->message(0, $links->getMessList());
						}
					} else {
						$this->message(0, $links->getMessList());
					}
				}
				
				$this->tpl->assign("status",$status);
				$this->tpl->assign("links",$links->get_links());
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/add_links.tpl");
			}
		}
		//------------------------模版管理-----------------------------//
		private function templates($status="",$id=0){
			$templates=new Templates();
			$this->tpl->assign("Records",$templates->get_templates_num());
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($templates->get_templates_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"is_default"=>0,"id"=>$id);
					if($templates->delTemplate($post_temp)){
						$this->logAction->write_log(1,"templates","放入回收站");
						$this->message(1, $templates->getMessList());
						$this->mess_page($templates->getMessList());
					} else {
						$this->logAction->write_log(0,"templates","放入回收站");
						$this->message(0, $templates->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($templates->delTemplates($_POST["del"])){
						$this->logAction->write_log(1,"templates","批量放入回收站");
						$this->message(1, $templates->getMessList());
						$this->mess_page($templates->getMessList());
					} else {
						$this->logAction->write_log(0,"templates","批量放入回收站");
						$this->message(0, $templates->getMessList());
					}
				} 
				$this->tpl->assign("templates",$templates->get_templates(false,$pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/templates.tpl");
			}
			if($status=="add_templates"){
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
				}
				if($_GET['edit']=="mod"){
					$getTemplates=$templates->get($id);
					$hasDir=$templates->hasDir($getTemplates['style']);
					$this->tpl->assign("hasDir", $hasDir);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getTemplates", $getTemplates);
				}
				if($_GET['edit']=="new"){
					$getTemplates=$templates->get($id);
					if($templates->createDir($getTemplates['style'])){
						$this->message(1, $templates->getMessList());
						$this->mess_page($templates->getMessList(),$link);
					} else {
						$this->message(0, $templates->getMessList());
					}
				}
				
				if($_POST['act']=="add"){
					if($templates->validateForm($_POST)){
						if($templates->addTemplates(new FileUpload(array("filePath"=>UPLOADPIC_PATH)),$_POST,$_FILES)){
							$this->logAction->write_log(1,"templates","添加");
							$this->message(1, $templates->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_templates&edit=add';
							$link[1]['text'] = "返回模版列表";
							$link[1]['href'] = '?act=templates';
							$this->mess_page($templates->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"templates","添加");
							$this->message(0, $templates->getMessList());
						}
					} else {
						$this->message(0, $templates->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($templates->validateForm($_POST)){
						if($templates->modTemplates(new FileUpload(array("filePath"=>UPLOADPIC_PATH)),$_POST,$_FILES)){
							$this->logAction->write_log(1,"templates","编辑");
							$this->message(1, $templates->getMessList());
							$link[0]['text'] = "返回模版列表";
							$link[0]['href'] = '?act=templates';
							$this->mess_page($templates->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"templates","编辑");
							$this->message(0, $templates->getMessList());
						}
					} else {
						$this->message(0, $templates->getMessList());
					}
				}
				
				$this->tpl->assign("status",$status);
				$this->tpl->assign("templates",$templates->get_templates(true));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/add_templates.tpl");
			}
			if($status=="set_temp_default"){
				$post_temp=array("is_default"=>1,"id"=>$id);
				if($templates->set_Default($post_temp)){
					$this->logAction->write_log(1,"templates","换网站风格");
					$this->message(1, $templates->getMessList());
					$this->mess_page($templates->getMessList());
				} else {
					$this->logAction->write_log(0,"templates","换网站风格");
					$this->message(0, $templates->getMessList());
				}
			}
		}
		//------------------------留言分组管理-----------------------------//
		
		private function message_group($status="",$id=0){
			$message_group=new Message_group();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($message_group->get_group_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($message_group->delMessageGroup($post_temp)){
						$this->logAction->write_log(1,"message_group","放入回收站");
						$this->message(1, $message_group->getMessList());
						$this->mess_page($message_group->getMessList());
					} else {
						$this->logAction->write_log(0,"message_group","放入回收站");
						$this->message(0, $message_group->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($message_group->delMessageGroups($_POST["del"])){
						$this->logAction->write_log(1,"message_group","批量放入回收站");
						$this->message(1, $message_group->getMessList());
						$this->mess_page($message_group->getMessList());
					} else {
						$this->logAction->write_log(0,"message_group","批量放入回收站");
						$this->message(0, $message_group->getMessList());
					}
				} 
				$this->tpl->assign("messageGroup",$message_group->get_messageGroup(false,$pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/message_group.tpl");
			}
			if($status=="add_messageGroup"){
			
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
				}
				
				if($_GET['edit']=="mod"){
					$getMessageGroup=$message_group->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getMessageGroup", $getMessageGroup);
					if($getMessageGroup["is_member"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
				}
				
				if($_POST['act']=="add"){
					if($message_group->validateForm($_POST)){
						if($message_group->addMessageGroup($_POST)){
							$this->logAction->write_log(1,"message_group","添加");
							$this->message(1, $message_group->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_messageGroup&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=message_group';
							$this->mess_page($message_group->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"message_group","添加");
							$this->message(0, $message_group->getMessList());
						}
					} else {
						$this->message(0, $message_group->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($message_group->validateForm($_POST)){
						if($message_group->modMessageGroup($_POST)){
							$this->logAction->write_log(1,"message_group","编辑");
							$this->message(1, $message_group->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=message_group';
							$this->mess_page($message_group->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"message_group","编辑");
							$this->message(0, $message_group->getMessList());
						}
					} else {
						$this->message(0, $message_group->getMessList());
					}
				}
				
				
				$this->tpl->assign("status",$status);
				$this->tpl->assign("message_group",$message_group->get_messageGroup(true));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/add_messageGroup.tpl");
			}
		}
		
		//------------------------留言管理-----------------------------//
		
		private function messages($status="",$id=0){
			$message=new Message();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($message->get_message_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($message->delMessage($post_temp)){
						$this->logAction->write_log(1,"message","放入回收站");
						$this->message(1, $message->getMessList());
						$this->mess_page($message->getMessList());
					} else {
						$this->logAction->write_log(0,"message","放入回收站");
						$this->message(0, $message->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($message->delMessages($_POST["del"])){
						$this->logAction->write_log(1,"message","批量放入回收站");
						$this->message(1, $message->getMessList());
						$this->mess_page($message->getMessList());
					} else {
						$this->logAction->write_log(1,"message","批量放入回收站");
						$this->message(0, $message->getMessList());
					}
				} 
				$message_info=$message->get_messages(false,$pageInfo["row_offset"],$pageInfo["row_num"]);
				if($message_info){
					foreach($message_info as $key=>$val){
						$m_temp=$message->get_other_datas("cms_message_group","id,show_name","id",$val['group_id']);
						$c_temp=$message->get_other_datas("cms_city","id,name","id",$val['city_id']);
						$u_temp=$message->get_other_datas("cms_user","user_name","id",$val['user_id']);
						$message_info[$key]['group_name']=$m_temp[0]['show_name'];
						$message_info[$key]['city_name']=$c_temp[0]['name'];
						$message_info[$key]['user_name']=$u_temp[0]['user_name'];
					}
				}
				$this->tpl->assign("messages",$message_info);
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/message.tpl");
			}
			
			if($status=="reply_message"){
				$admin_reply=new FCKeditor("admin_reply");
				$admin_reply->BasePath = '../FCKeditor/';
				$getMessages=$message->get($id);
				$this->tpl->assign("act", "reply");
				$this->tpl->assign("getMessages", $getMessages);
				$admin_reply->Value=$getMessages["admin_reply"];
				if($_POST['act']=="reply"){
					if($message->validateForm($_POST)){
						if($message->modMessage($_POST)){
							$this->logAction->write_log(1,"message","回复");
							$this->message(1, $message->getMessList());
							$link[0]['text'] = "返回留言列表";
							$link[0]['href'] = '?act=message';
							$this->mess_page($message->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"message","回复");
							$this->message(0, $message->getMessList());
						}
					} else {
						$this->message(0, $message->getMessList());
					}
				}
				$this->tpl->assign("status",$status);
				$this->tpl->assign("admin_reply",$admin_reply->Create());
				$this->tpl->assign("message",$message->get_messages(true));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/front_set/reply_message.tpl");
			}
			
		}
		
		//------------------------会员分组管理-----------------------------//
		
		private function user_group($status="",$id=0){
			$user_group=new UserGroup();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($user_group->get_userGroup_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($user_group->delUserGroup($post_temp)){
						$this->logAction->write_log(1,"user_group","放入回收站");
						$this->message(1, $user_group->getMessList());
						$this->mess_page($user_group->getMessList());
					} else {
						$this->logAction->write_log(0,"user_group","放入回收站");
						$this->message(0, $user_group->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($user_group->delUserGroups($_POST["del"])){
						$this->logAction->write_log(1,"user_group","批量放入回收站");
						$this->message(1, $user_group->getMessList());
						$this->mess_page($user_group->getMessList());
					} else {
						$this->logAction->write_log(0,"user_group","批量放入回收站");
						$this->message(0, $user_group->getMessList());
					}
				} 
				$this->tpl->assign("user_group",$user_group->get_userGroups(false,$pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/member/user_group.tpl");
			}
			if($status=="add_userGroup"){
			
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
				}
				
				if($_GET['edit']=="mod"){
					$getUserGroup=$user_group->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getUserGroup", $getUserGroup);
				}
				
				if($_POST['act']=="add"){
					if($user_group->validateForm($_POST)){
						if($user_group->addUserGroup($_POST)){
							$this->logAction->write_log(1,"user_group","添加");
							$this->message(1, $user_group->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_userGroup&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=user_group';
							$this->mess_page($user_group->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"user_group","添加");
							$this->message(0, $user_group->getMessList());
						}
					} else {
						$this->message(0, $user_group->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($user_group->validateForm($_POST)){
						if($user_group->modUserGroup($_POST)){
							$this->logAction->write_log(1,"user_group","编辑");
							$this->message(1, $user_group->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=user_group';
							$this->mess_page($user_group->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"user_group","编辑");
							$this->message(0, $user_group->getMessList());
						}
					} else {
						$this->message(0, $user_group->getMessList());
					}
				}
				
				
				$this->tpl->assign("status",$status);
				$this->tpl->assign("user_group",$user_group->get_userGroups(true));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/member/add_userGroup.tpl");
			}
		}
		
		//------------------------会员扩展管理-----------------------------//
		
		private function user_field($status="",$id=0){
			$user_field=new UserField();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($user_field->get_userField_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($user_field->delUserField($post_temp)){
						$this->logAction->write_log(1,"user_field","放入回收站");
						$this->message(1, $user_field->getMessList());
						$this->mess_page($user_field->getMessList());
					} else {
						$this->logAction->write_log(0,"user_field","放入回收站");
						$this->message(0, $user_field->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($user_field->delUserFields($_POST["del"])){
						$this->logAction->write_log(1,"user_field","批量放入回收站");
						$this->message(1, $user_field->getMessList());
						$this->mess_page($user_field->getMessList());
					} else {
						$this->logAction->write_log(0,"user_field","批量放入回收站");
						$this->message(0, $user_field->getMessList());
					}
				} 
				$this->tpl->assign("user_field",$user_field->get_userFields(false,$pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/member/user_field.tpl");
			}
			if($status=="add_userField"){
			
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
				}
				
				if($_GET['edit']=="mod"){
					$getUserField=$user_field->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getUserField", $getUserField);
				}
				
				if($_POST['act']=="add"){
					if($user_field->validateForm($_POST)){
						if($user_field->addUserField($_POST)){
							$this->logAction->write_log(1,"user_field","添加");
							$this->message(1, $user_field->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_userField&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=user_field';
							$this->mess_page($user_field->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"user_field","添加");
							$this->message(0, $user_field->getMessList());
						}
					} else {
						$this->message(0, $user_field->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($user_field->validateForm($_POST)){
						if($user_field->modUserField($_POST)){
							$this->logAction->write_log(1,"user_field","编辑");
							$this->message(1, $user_field->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=user_field';
							$this->mess_page($user_field->getMessList(),$link);
						} else {
							$this->logAction->write_log(1,"user_field","编辑");
							$this->message(0, $user_field->getMessList());
						}
					} else {
						$this->message(0, $user_field->getMessList());
					}
				}
				
				
				$this->tpl->assign("status",$status);
				$this->tpl->assign("user_field",$user_field->get_userFields(true));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/member/add_UserField.tpl");
			}
		}
		
		
		//------------------------会员管理-----------------------------//
		
		private function user($status="",$id=0){
			$user=new User();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($user->get_user_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($user->delUser($post_temp)){
						$this->logAction->write_log(1,"user","放入回收站");
						$this->message(1, $user->getMessList());
						$this->mess_page($user->getMessList());
					} else {
						$this->logAction->write_log(0,"user","放入回收站");
						$this->message(0, $user->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($user->delUsers($_POST["del"])){
						$this->logAction->write_log(1,"user","批量放入回收站");
						$this->message(1, $user->getMessList());
						$this->mess_page($user->getMessList());
					} else {
						$this->logAction->write_log(0,"user","批量放入回收站");
						$this->message(0, $user->getMessList());
					}
				}
				
				if($_GET['edit']=="search"){
					$user_info=$user->get_users(false,$pageInfo["row_offset"],$pageInfo["row_num"],true);					
				} else {
					$user_info=$user->get_users(false,$pageInfo["row_offset"],$pageInfo["row_num"]);
				}
				if($user_info){
					foreach($user_info as $key=>$val){
						$u_temp=$user->get_other_datas("cms_user_group","id,name","id",$val['group_id']);
						$user_info[$key]['group_name']=$u_temp[0]['name'];
					}
				}
				$this->tpl->assign("users",$user_info);
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/member/user.tpl");
			}
			
			if($status=="add_user"){
			
				$userExt=new UserExt();
				$getUserField=$user->get_other_datas("cms_user_field where is_delete=0","*");
				
				
				
				$field_id_arr=array();
				$value_arr=array();
				
				
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
				}
				
				if($_GET['edit']=="mod"){
					$getUser=$user->get($id);
					$getUserExt=$userExt->get_userExt($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("readOnly", "readonly");
					$this->tpl->assign("getUser", $getUser);
					$this->tpl->assign("getUserExt",$getUserExt);
					if($getUser["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
				}
				
				if($_POST['act']=="add"){
					if($user->validateForm($_POST)){
						if($user_id=$user->addUser($_POST)){
							
							foreach($getUserField as $var){
								$tmpName=$var["field_name"];
								array_push($field_id_arr,$var["id"]);
								array_push($value_arr,$_POST[$tmpName]);
							}
							$tmpFieldStr=join("|",$field_id_arr);
							$tmpValueStr=join("|",$value_arr);
							$post_temp=array("field_id"=>$tmpFieldStr,"user_id"=>$user_id,"value"=>$tmpValueStr);
							
								$userExt->addUserExt($post_temp);
								$this->logAction->write_log(1,"user","添加");
								$this->message(1, $user->getMessList());
								$link[0]['text'] = "继续添加";
								$link[0]['href'] = '?act=add_user&edit=add';
								$link[1]['text'] = "返回分类列表";
								$link[1]['href'] = '?act=user';
								$this->mess_page($user->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"user","添加");
							$this->message(0, $user->getMessList());
						}
					} else {
						$this->message(0, $user->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($user->validateForm($_POST)){
						if($user->modUser($_POST)){
							$xid=$_POST['xid'];
							foreach($getUserField as $var){
								$tmpName=$var["field_name"];
								array_push($field_id_arr,$var["id"]);
								array_push($value_arr,$_POST[$tmpName]);
							}
							$tmpFieldStr=join("|",$field_id_arr);
							$tmpValueStr=join("|",$value_arr);
							$post_temp=array("id"=>$xid,"field_id"=>$tmpFieldStr,"user_id"=>$id,"value"=>$tmpValueStr);
							$userExt->modUserExt($post_temp);
							$this->logAction->write_log(1,"user","编辑");
							$this->message(1, $user->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=user';
							$this->mess_page($user->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"user","编辑");
							$this->message(0, $user->getMessList());
						}
					} else {
						$this->message(0, $user->getMessList());
					}
				}
				
				
				$this->tpl->assign("status",$status);
				//$this->tpl->assign("user",$user->get_users(true));
				$this->tpl->assign("user_field",$getUserField);
				$this->tpl->assign("user_group",$user->get_other_datas("cms_user_group where is_delete=0","id,name"));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/member/add_user.tpl");
			}
		}
		
		//------------------------会员日志管理-----------------------------//
		private function user_log($status="",$id=0){
			$user_log=new UserLog();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($user_log->get_userLog_num($id),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del") {
					if(isset($_POST["del"])){
						$id=$_POST["del"];
					}else{
						$id=$_GET["id"];
					}
					if($user_log->delUserLog($id)){
						$this->logAction->write_log(1,"user_log","删除");
						$this->message(1, $user_log->getMessList());
						$this->mess_page($user_log->getMessList());
					} else {
						$this->logAction->write_log(0,"user_log","删除");
						$this->message(0, $user_log->getMessList());
					}
				}
				$user_logs=$user_log->get_userLogs($pageInfo["row_offset"],$pageInfo["row_num"],$id);
				$user_name=$user_log->get_other_datas("cms_user","user_name","id",$id);
				if($user_logs){
					foreach($user_logs as $key=>$val){
						$u_temp=$user_log->get_other_datas("cms_admin","adm_name","id",$val['log_admin_id']);
						$user_logs[$key]['admin_name']=$u_temp[0]['adm_name'];
					}
				}
				
				$this->tpl->assign("user_name",$user_name[0]['user_name']);
				$this->tpl->assign("user_logs",$user_logs);
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/member/user_log.tpl");
			}
		}
		
		
		//------------------------返利管理-----------------------------//
		private function referrals($status="",$id=0){
			$referrals=new Referral();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($referrals->get_referrals_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($referrals->delReferral($post_temp)){
						$this->logAction->write_log(1,"referrals","放入回收站");
						$this->message(1, $referrals->getMessList());
						$this->mess_page($referrals->getMessList());
					} else {
						$this->logAction->write_log(0,"referrals","放入回收站");
						$this->message(0, $referrals->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($referrals->delReferrals($_POST["del"])){
						$this->logAction->write_log(1,"referrals","批量放入回收站");
						$this->message(1, $referrals->getMessList());
						$this->mess_page($referrals->getMessList());
					} else {
						$this->logAction->write_log(1,"referrals","批量放入回收站");
						$this->message(0, $referrals->getMessList());
					}
				} 
				$this->tpl->assign("referrals",$referrals->get_referrals($pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/member/referrals.tpl");
			}
		}
		//------------------------订单管理-----------------------------//
		private function deal_orders($status="",$id=0){
			$deal_orders=new DealOrder();
			if($status=="view_order"){
				$deal_orders_log=new DealOrdersLog();
				$getDealOrder=$deal_orders->get($id);
				$username=$deal_orders->get_other_datas("cms_user","user_name","id",$getDealOrder['user_id']);
				$deliveryName=$deal_orders->get_other_datas("cms_delivery_way","name","id",$getDealOrder['delivery_id']);
				$paymentName=$deal_orders->get_other_datas("cms_payment","name","id",$getDealOrder['payment_id']);
				$getDealOrder['user_name']=$username[0]['user_name'];
				$getDealOrder['delivery_name']=$deliveryName[0]['name'];
				$getDealOrder['payment_name']=$paymentName[0]['name'];
				for($i=1;$i<=3;$i++){
					$deliveryArea=$deal_orders->get_other_datas("cms_delivery_area","name","id",$getDealOrder['region_lv'.$i]);
					$getDealOrder['region_lv'.$i."_name"]=$deliveryArea[0]['name'];
				}
				$dealOrderItem=$deal_orders->get_other_datas("cms_deal_order_item","*","order_id",$id);
				$getPaymentNotice=$deal_orders->get_other_datas("cms_payment_notice","*","order_id",$id." and is_paid=1","pay_time");
				$getDealCoupon=$deal_orders->get_other_datas("cms_deal_coupon","*","order_id",$id." and is_delete=0");
				$getMessage=$deal_orders->get_other_datas("cms_message","*","rel_id",$id." and is_delete=0");
				
				if($dealOrderItem){
					foreach($dealOrderItem as $key=>$val){
						$d_temp=$deal_orders->get_other_datas("cms_deal","is_delivery","id",$val['deal_id']);
						$n_temp=$deal_orders->get_other_datas("cms_delivery_notice","notice_sn,is_arrival,arrival_time,memo","order_item_id",$val['id'],"arrival_time");
						
						$dealOrderItem[$key]['is_delivery']=$d_temp[0]['is_delivery'];
						$dealOrderItem[$key]['notice_sn']=$n_temp[0]['notice_sn'];
						$dealOrderItem[$key]['is_arrival']=$n_temp[0]['is_arrival'];
						$dealOrderItem[$key]['arrival_time']=$n_temp[0]['arrival_time'];
						$dealOrderItem[$key]['memo']=$n_temp[0]['memo'];
					}
				}
				if($getPaymentNotice){
					foreach($getPaymentNotice as $key=>$val){
						$p_temp=$deal_orders->get_other_datas("cms_payment","name","id",$val['payment_id']);
						$getPaymentNotice[$key]['payment_name']=$p_temp[0]['name'];
					}
				}
				if($getDealCoupon){
					foreach($getDealCoupon as $key=>$val){
						$d_temp=$deal_orders->get_other_datas("cms_deal","name","id",$val['order_deal_id']);
						$u_temp=$deal_orders->get_other_datas("cms_user","user_name","id",$val['user_id']);
						$s_temp=$deal_orders->get_other_datas("cms_supplier","name","id",$val['supplier_id']);
						$getDealCoupon[$key]['order_deal_name']=$d_temp[0]['name'];
						$getDealCoupon[$key]['user_name']=$u_temp[0]['user_name'];
						$getDealCoupon[$key]['supplier_name']=$s_temp[0]['name'];
					}
				}
				if($getMessage){
					foreach($getMessage as $key=>$val){
						$m_temp=$deal_orders->get_other_datas("cms_user","user_name","id",$val['user_id']);
						$c_temp=$deal_orders->get_other_datas("cms_city","name","id",$val['city_id']);
						$g_temp=$deal_orders->get_other_datas("cms_message_group","show_name","id",$val['group_id']);
						$getMessage[$key]['user_name']=$m_temp[0]['user_name'];
						$getMessage[$key]['city_name']=$c_temp[0]['name'];
						$getMessage[$key]['group_name']=$g_temp[0]['show_name'];
					}
				}
				
				if($_GET['edit']=='del'){
					$deal_coupon=new DealCoupon();
					$cid=$_GET["cid"];
					if($deal_coupon->delDealCoupon($cid)){
						$this->message(1, $deal_coupon->getMessList());
						$link[0]['text'] = "返回";
						$link[0]['href'] = '?act=view_order&id='.$id;
						$this->mess_page($deal_coupon->getMessList(),$link);
					} else {
						$this->message(0, $deal_coupon->getMessList());
					}
				}
				
				if($_GET['edit']=="mod_viewOrder"){
					if($deal_orders->validateAfterSale($_POST)){
						if($deal_orders->modDealOrder($_POST)){
							$this->message(1, $deal_orders->getMessList());
							$link[0]['text'] = "返回";
							$link[0]['href'] = '?act=view_order&id='.$id;
							$this->mess_page($deal_orders->getMessList(),$link);
						} else {
							$this->message(0, $deal_orders->getMessList());
						}
					} else {
						$this->message(0, $deal_orders->getMessList());
					}
				}
				
				if($_GET['edit']=="open_order"){
					$post_temp=array("order_status"=>0,"update_time"=>Common::get_gmtime(),"id"=>$id);
					if($deal_orders->modDealOrder($post_temp)){
						$deal_orders_log->write_log($getDealOrder['order_sn']."开放结单成功!",$id);
						$this->message(1, $deal_orders->getMessList());
						$link[0]['text'] = "返回";
						$link[0]['href'] = '?act=view_order&id='.$id;
						$this->mess_page($deal_orders->getMessList(),$link);
					} else {
						$this->message(0, $deal_orders->getMessList());
					}
				}
				
				if($_GET['edit']=="finish_order"){
					$post_temp=array("order_status"=>1,"update_time"=>Common::get_gmtime(),"id"=>$id);
					if($deal_orders->modDealOrder($post_temp)){
						$deal_orders_log->write_log($getDealOrder['order_sn']."结单成功!",$id);
						$this->message(1, $deal_orders->getMessList());
						$link[0]['text'] = "返回";
						$link[0]['href'] = '?act=view_order&id='.$id;
						$this->mess_page($deal_orders->getMessList(),$link);
					} else {
						$this->message(0, $deal_orders->getMessList());
					}
				}
								
				$this->tpl->assign("getDealCoupon", $getDealCoupon);
				$this->tpl->assign("getDealOrder", $getDealOrder);
				$this->tpl->assign("getPaymentNotice", $getPaymentNotice);
				$this->tpl->assign("dealOrderItem", $dealOrderItem);
				$this->tpl->assign("getMessage", $getMessage);
				$this->tpl->assign("status", $status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/orders/view_order.tpl");
				
			} else if($status=="deal_orders" || $status=="recharge_orders" || $status=="deal_orders_log"){
				$deal_orders_log=new DealOrdersLog();
				$title=array("deal_orders"=>"团购订单管理","recharge_orders"=>"充值订单管理","deal_orders_log"=>"操作日志");
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				if($status=="deal_orders"){
					$page=new Page($deal_orders->get_dealOrder_num(),$current_page,ALL_PAGE_SIZE);
				} else if($status=="recharge_orders") {
					$page=new Page($deal_orders->get_dealOrder_num(true),$current_page,ALL_PAGE_SIZE);
				} else {
					$page=new Page($deal_orders_log->get_logs_num(),$current_page,ALL_PAGE_SIZE);
				}
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					
					if($status=="deal_orders_log"){
						if(isset($_POST["del"])){
							$id=$_POST["del"];
						}else{
							$id=$_GET["id"];
						}
						if($deal_orders_log->delLogs($id)){
							$this->logAction->write_log(1,$status,"删除");
							$this->message(1, $deal_orders_log->getMessList());
							$this->mess_page($deal_orders_log->getMessList());
						} else {
							$this->logAction->write_log(0,$status,"删除");
							$this->message(0, $deal_orders_log->getMessList());
						}
					} else {
						$post_temp=array("is_delete"=>1,"id"=>$id);
						if($deal_orders->delDealOrder($post_temp)){
							$this->logAction->write_log(1,$status,"放入回收站");
							$this->message(1, $deal_orders->getMessList());
							$this->mess_page($deal_orders->getMessList());
						} else {
							$this->logAction->write_log(0,$status,"放入回收站");
							$this->message(0, $deal_orders->getMessList());
						}
					}
					
					
				} else if($_GET['edit']=="delAll") {
					if($deal_orders->delDealOrders($_POST["del"])){
						$this->logAction->write_log(1,$status,"批量放入回收站");
						$this->message(1, $deal_orders->getMessList());
						$this->mess_page($deal_orders->getMessList());
					} else {
						$this->logAction->write_log(0,$status,"批量放入回收站");
						$this->message(0, $deal_orders->getMessList());
					}
				} 
				
				if($_GET['edit']=="pay_incharge"){
					$notice=array();
					$order_info=$deal_orders->get($id);
					
					if($order_info['pay_status'] != 2){
						$paymentNotice=new PaymentNotice();
						$payment_notice=$paymentNotice->get_other_datas("cms_payment_notice","*","order_id",$order_info['id']." and payment_id =".$order_info['payment_id']." and is_paid = 0");
						if(!$payment_notice[0]){
							$notice["notice_sn"]=Common::date_to_name();
							$notice["create_time"]=Common::get_gmtime();
							$notice["pay_time"]=0;
							$notice["order_id"]=$order_info['id'];
							$notice["user_id"]=$order_info['user_id'];
							$notice["is_paid"]=0;
							$notice["payment_id"]=$order_info['payment_id'];
							$notice["memo"]='';
							$notice["money"]=$order_info['total_price'];
							$paymentNotice->makePaymentNotice($notice);
							$payment_notice = $paymentNotice->get_other_datas("cms_payment_notice","*","order_id",$order_info['id']." and payment_id =".$order_info['payment_id']." and is_paid = 0");
						}
						$notice=array("memo"=>"","order_id"=>$order_info['id']);
						$paymentNotice->paymentPaid($payment_notice[0]['id'],$notice);
						$msg= sprintf("由管理员对收款单%s收款",$payment_notice[0]['notice_sn']);
						$this->logAction->write_log(1,"payment",$msg);
						if($deal_orders->orderPaid($order_info['id'])){
							$msg=sprintf("由管理员对订单%s收款",$order_info['order_sn']);
							$this->logAction->write_log(1,"recharge_orders",$msg);
							$this->message(1, "订单支付成功");
							$link[0]['text'] = "返回";
							$link[0]['href'] = '?act=recharge_orders';
							$this->mess_page($deal_orders->getMessList(),$link);
						} else {
							$this->message(0, "订单支付失败");
						}
					} else {
						$this->message(0, "已支付!");
					}
				}
				if($_GET['edit']=="search"){
					if($status=="deal_orders"){
						$getDealOrders=$deal_orders->get_dealOrders(false,"orders",$pageInfo["row_offset"],$pageInfo["row_num"],true);
					}else if($status=="recharge_orders") {	
						$getDealOrders=$deal_orders->get_dealOrders(false,"recharge",$pageInfo["row_offset"],$pageInfo["row_num"],true);
					}			
				} else {
					if($status=="deal_orders"){
						$getDealOrders=$deal_orders->get_dealOrders(false,"orders",$pageInfo["row_offset"],$pageInfo["row_num"]);
					}else if($status=="recharge_orders") {
						$getDealOrders=$deal_orders->get_dealOrders(false,"recharge",$pageInfo["row_offset"],$pageInfo["row_num"]);
					}else if($status=="deal_orders_log"){
						$this->tpl->assign("deal_orders_log",$deal_orders_log->get_logs($pageInfo["row_offset"],$pageInfo["row_num"]));
					}
				}
				if($status!="deal_orders_log"){
					if($getDealOrders){
						foreach($getDealOrders as $key=>$val){
							$u_temp=$deal_orders->get_other_datas("cms_user","user_name","id",$val['user_id']);
							$getDealOrders[$key]['user_name']=$u_temp[0]['user_name'];
						}
					}
				}
				$this->tpl->assign("deal_orders",$getDealOrders);
				$this->tpl->assign("title",$title[$status]);
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->assign("status",$status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/orders/deal_orders.tpl");
				
			} else if($status=="order_incharge"){
				$getOrderIncharge=$deal_orders->get($id);
				$getPayment=$deal_orders->get_other_datas("cms_payment","*","status","1");
				$getUserMoney=$deal_orders->get_other_datas("cms_user","money","id",$getOrderIncharge['user_id']);
				$this->tpl->assign("total",$getOrderIncharge['deal_total_price']+$getOrderIncharge['delivery_fee']-$getOrderIncharge['account_money']-$getOrderIncharge['ecv_money']);
				
				if($_GET['edit']=="do_incharge"){
					$paymentNotice=new PaymentNotice();
					$_POST['total_price']=$getOrderIncharge['deal_total_price']+$getOrderIncharge['delivery_fee']+$getPayment[0]['fee_amount'];
					$_POST['payment_fee']=$getPayment[0]['fee_amount'];
					$_POST['update_time']=Common::get_gmtime();
					$pay_amount= $getOrderIncharge['deal_total_price']+ $getOrderIncharge['delivery_fee']-$getOrderIncharge['account_money']-$getOrderIncharge['ecv_money']+$getPayment[0]['fee_amount'];
					$payment_name=$deal_orders->get_other_datas("cms_payment","pay_name","id",$_POST['payment_id']);
					
					$infos=array("payment_name"=>$payment_name[0]['pay_name'],
								 "user_money"=>$getUserMoney[0]['money'],
								 "pay_amount"=>$pay_amount,
								 "order_info"=>$getOrderIncharge
								 );
					
					$notice_array=array("money"=>$pay_amount,
										"order_id"=>$id,
										"user_id"=>$getOrderIncharge['user_id'],
										"payment_id"=>$_POST['payment_id'],
										"memo"=>$_POST['memo']
										);
					
					if($deal_orders->modOrderIncharge($_POST,$infos)){
						if($paymentNotice->addPaymentNotice($notice_array)){
							$deal_orders->orderPaid($id);
							$this->message(1, $deal_orders->getMessList());
							$link[0]['text'] = "返回";
							$link[0]['href'] = '?act=order_incharge&id='.$id;
							$this->mess_page($deal_orders->getMessList(),$link);
							
						}
					} else {
						$this->message(0, $deal_orders->getMessList());
					}
				}
				
				$this->tpl->assign("getPayment",$getPayment);
				$this->tpl->assign("getUserMoney",$getUserMoney[0]['money']);
				$this->tpl->assign("getOrderIncharge",$getOrderIncharge);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/orders/order_incharge.tpl");
				
			} else if($status=="delivery"){
				$deal_orders_log=new DealOrdersLog();
				$delivery_info=$deal_orders->get_delivery($id);
				if($_GET['edit']=="do_delivery"){
					if($deal_orders->validateDelivery($_POST)){
						if($deal_orders->doDelivery($_POST)){
							$deal_orders_log->write_log("发货成功！".$_POST['notice_sn'],$id);
							$this->message(1, $deal_orders->getMessList());
							$link[0]['text'] = "返回";
							$link[0]['href'] = '?act=delivery&id='.$id;
							$this->mess_page($deal_orders->getMessList(),$link);
						} else {
							$this->message(0, $deal_orders->getMessList());
						}
					} else {
						$this->message(0, $deal_orders->getMessList());
					}
				}
				$this->tpl->assign("id",$id);
				$this->tpl->assign("delivery_info",$delivery_info);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/orders/delivery.tpl");
			} 
				
		}
		//------------------------付款单列表-----------------------------//
		private function paymentNotice($status="",$id=0){
			$paymentNotice=new PaymentNotice();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($paymentNotice->get_paymentNotice_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				
				
				if($_GET['edit']=="search"){
					$getPaymentNotice=$paymentNotice->get_paymentNotice(false,$pageInfo["row_offset"],$pageInfo["row_num"],true);
				} else {
					$getPaymentNotice=$paymentNotice->get_paymentNotice(false,$pageInfo["row_offset"],$pageInfo["row_num"]);
				}
				
				if($getPaymentNotice){
					foreach($getPaymentNotice as $key=>$val){
						$u_temp=$paymentNotice->get_other_datas("cms_user","user_name","id",$val['user_id']);
						$o_temp=$paymentNotice->get_other_datas("cms_deal_orders","type,order_sn","id",$val['order_id']);
						$getPaymentNotice[$key]['user_name']=$u_temp[0]['user_name'];
						$getPaymentNotice[$key]['deal_order_type']=$o_temp[0]['type'];
						$getPaymentNotice[$key]['deal_order_sn']=$o_temp[0]['order_sn'];
					}
				}
				
				
				$this->tpl->assign("getPaymentNotice",$getPaymentNotice);
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/orders/payment_notice.tpl");
			}
		}
		//------------------------支付接口-----------------------------//
		private function payment($status="",$id=0){
			$payment=new Payment();
			if($status==""){
				$this->tpl->assign("payments",$payment->get_payments());
				$this->tpl->display(APP_ADMIN_STYLE."/admin/orders/payment.tpl");
			}
			if($status=="edit_payment"){
				if($_GET['edit']=="mod"){
					$getPayment=$payment->get($id);
					$parameters=$payment->getParameters($getPayment);
					$this->tpl->assign("act", "mod");
					if($getPayment["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
					$this->tpl->assign("bmpPath", urldecode(GALLERY_PATH.$getPayment["logo"]));
					$this->tpl->assign("getPayment", $getPayment);
					$this->tpl->assign("parameters", $parameters);
				}
				
				if($_POST['act']=="mod"){
					if($payment->validateForm($_POST)){
						if($payment->modPayment(new FileUpload(array("filePath"=>UPLOADPIC_PATH)),$_POST,$_FILES)){
							$this->logAction->write_log(1,"payment","编辑");
							$this->message(1, $payment->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=payment';
							$this->mess_page($payment->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"payment","编辑");
							$this->message(0, $payment->getMessList());
						}
					} else {
						$this->message(0, $payment->getMessList());
					}
				}
				$this->tpl->assign("status",$status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/orders/edit_payment.tpl");
			}
		}
		
		
		
		//------------------------配送地区-----------------------------//
		private function delivery_area($status="",$id=0){
			$delivery_area=new DeliveryArea();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($delivery_area->get_deliveryArea_num($id),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($delivery_area->delDeliveryArea($post_temp)){
						$this->logAction->write_log(1,"delivery_area","放入回收站");
						$this->message(1, $delivery_area->getMessList());
						$this->mess_page($delivery_area->getMessList());
					} else {
						$this->logAction->write_log(0,"delivery_area","放入回收站");
						$this->message(0, $delivery_area->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($delivery_area->delDeliveryAreas($_POST["del"])){
						$this->logAction->write_log(1,"delivery_area","批量放入回收站");
						$this->message(1, $delivery_area->getMessList());
						$this->mess_page($delivery_area->getMessList());
					} else {
						$this->logAction->write_log(0,"delivery_area","批量放入回收站");
						$this->message(0, $delivery_area->getMessList());
					}
				}
				$this->tpl->assign("delivery_areas",$delivery_area->get_deliveryAreas(false,$id,$pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->assign("id",$id);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/orders/delivery_area.tpl");
			}
			if($status=="delivery_areaTree"){
				$this->tpl->assign("delivery_areas_1",$delivery_area->get_deliveryAreas_all(1));
				$this->tpl->assign("delivery_areas_2",$delivery_area->get_deliveryAreas_all(2));
				$this->tpl->assign("delivery_areas_3",$delivery_area->get_deliveryAreas_all(3));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/orders/delivery_areaTree.tpl");
			}
			if($status=="add_deliveryArea"){
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
				}
				
				if($_GET['edit']=="mod"){
					$getDeliveryArea=$delivery_area->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getDeliveryArea", $getDeliveryArea);
				}
				
				if($_POST['act']=="add"){
					if($delivery_area->validateForm($_POST)){
						if($delivery_area->addDeliveryArea($_POST)){
							$this->logAction->write_log(1,"delivery_area","添加");
							$this->message(1, $delivery_area->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_deliveryArea&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=delivery_area';
							$this->mess_page($delivery_area->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"delivery_area","添加");
							$this->message(0, $delivery_area->getMessList());
						}
					} else {
						$this->message(0, $delivery_area->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($delivery_area->validateForm($_POST)){
						if($delivery_area->modDeliveryArea($_POST)){
							$this->logAction->write_log(1,"delivery_area","编辑");
							$this->message(1, $delivery_area->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=delivery_area';
							$this->mess_page($delivery_area->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"delivery_area","编辑");
							$this->message(0, $delivery_area->getMessList());
						}
					} else {
						$this->message(0, $delivery_area->getMessList());
					}
				}
				
				
				$this->tpl->assign("status",$status);
				$this->tpl->assign("delivery_areas",$delivery_area->get_deliveryAreas(true));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/orders/add_deliveryArea.tpl");
			}
		}
		//------------------------配送方式-----------------------------//
		private function delivery_way($status="",$id=0){
			$delivery_way=new DeliveryWay();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($delivery_way->get_deliveryWay_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($delivery_way->delDeliveryWay($post_temp)){
						$this->logAction->write_log(1,"delivery_way","放入回收站");
						$this->message(1, $delivery_way->getMessList());
						$this->mess_page($delivery_way->getMessList());
					} else {
						$this->logAction->write_log(0,"delivery_way","放入回收站");
						$this->message(0, $delivery_way->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($delivery_way->delDeliveryWays($_POST["del"])){
						$this->logAction->write_log(1,"delivery_way","批量放入回收站");
						$this->message(1, $delivery_way->getMessList());
						$this->mess_page($delivery_way->getMessList());
					} else {
						$this->logAction->write_log(0,"delivery_way","批量放入回收站");
						$this->message(0, $delivery_way->getMessList());
					}
				} 
				$this->tpl->assign("delivery_ways",$delivery_way->get_deliveryWays(false,$pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/orders/delivery_way.tpl");
			}
			
			if($status=="add_deliveryWay"){
				$weight=new Weight();
				$delivery_fee=new DeliveryFee();
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
					$this->tpl->assign("weight",$weight->get_weight(true));
				}
				
				if($_GET['edit']=="mod"){
					$getDeliveryWay=$delivery_way->get($id);
					$getDeliveryFees=$delivery_fee->get_DeliveryFees($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getDeliveryWay", $getDeliveryWay);
					$this->tpl->assign("getDeliveryFees", $getDeliveryFees);
					if($getDeliveryWay["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
					$this->tpl->assign("weight",$weight->get_weight(true));
				}
				
				if($_POST['act']=="add"){
					if($delivery_way->validateForm($_POST)){
						if($d_id=$delivery_way->addDeliveryWay($_POST)){
							$loop_num=count($_POST['support_ids']);
							if($loop_num){
								$post_temp=array();
								for($i=0;$i<$loop_num;$i++){
									$tmp=array("delivery_id"=>$d_id,
											   "area_ids"=>$_POST['support_ids'][$i],
											   "area_name"=>$_POST['area_name'][$i],
											   "first_fee"=>$_POST['first_fees'][$i],
										       "first_weight"=>$_POST['first_weights'][$i],
										   	   "continue_fee"=>$_POST['continue_fees'][$i],
										       "continue_weight"=>$_POST['continue_weights'][$i]
										       );
									array_push($post_temp,$tmp);
								}
								
								$delivery_fee->addDeliveryFee($post_temp);
							}
							$this->logAction->write_log(1,"delivery_way","添加");
							$this->message(1, $delivery_way->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_deliveryWay&edit=add';
							$link[1]['text'] = "返回列表";
							$link[1]['href'] = '?act=delivery_way';
							$this->mess_page($delivery_way->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"delivery_way","添加");
							$this->message(0, $delivery_way->getMessList());
						}
					} else {
						$this->message(0, $delivery_way->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($delivery_way->validateForm($_POST)){
						if($delivery_way->modDeliveryWay($_POST)){
							
							$loop_num=count($_POST['support_ids']);
							$record=count($getDeliveryFees);
							$source=count($_POST['mod_ids']);
							if($loop_num){
								$post_temp=array();
								for($i=0;$i<$loop_num;$i++){
									$tmp=array("mod_id"=>$_POST['mod_ids'][$i],
											   "delivery_id"=>$id,
											   "area_ids"=>$_POST['support_ids'][$i],
											   "area_name"=>$_POST['area_name'][$i],
											   "first_fee"=>$_POST['first_fees'][$i],
										       "first_weight"=>$_POST['first_weights'][$i],
										   	   "continue_fee"=>$_POST['continue_fees'][$i],
										       "continue_weight"=>$_POST['continue_weights'][$i]);
										       
									array_push($post_temp,$tmp);
									
								}
								
								
								if($source){
									if($loop_num-$source){
										$delivery_fee->multiModDeliveryFee($post_temp,$id);
									} else {//代表未有新加入的配送
										if($source==$loop_num){
											$delivery_fee->modDeliveryFee($post_temp);
										}
									}
									
								} else{//代表没有原配送,只有新加入配送
									$delivery_fee->addDeliveryFee($post_temp);
								}
								
							} else {//代表全无新增配送
								if($record){//如果数据库中有记录则删除
									$delivery_fee->delDeliveryFee($id);
								}
							}
							
							
							$this->logAction->write_log(1,"delivery_way","编辑");
							$this->message(1, $delivery_way->getMessList());
							$link[0]['text'] = "返回列表";
							$link[0]['href'] = '?act=delivery_way';
							$this->mess_page($delivery_way->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"delivery_way","编辑");
							$this->message(0, $delivery_way->getMessList());
						}
					} else {
						$this->message(0, $delivery_way->getMessList());
					}
				}
				
				
				$this->tpl->assign("status",$status);
				$this->tpl->assign("delivery_way",$delivery_way->get_deliveryWays(true));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/orders/add_deliveryWay.tpl");
			}
		}
		//------------------------消息模版管理-----------------------------//
		private function msg_template($status="",$id=0){
			$msg_template=new MsgTemplate();
			if($status==""){
				$msgTemplates=$msg_template->get_msgTemplates();
				$this->tpl->assign("msgTemplates",$msgTemplates);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/mail_mess/msg_template.tpl");
			}
			if($status=="edit_msgTemplate"){
				$getMsgTemplate=$msg_template->get($id);
				
				if($_POST['act']=="mod"){
					if($msg_template->validateForm($_POST)){
						if($msg_template->modMsgTemplate($_POST)){
							$this->logAction->write_log(1,"msg_template","编辑");
							$this->message(1, $msg_template->getMessList());
							$link[0]['text'] = "返回消息模版";
							$link[0]['href'] = '?act=msg_template';
							$this->mess_page($msg_template->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"msg_template","编辑");
							$this->message(0, $msg_template->getMessList());
						}
					} else {
						$this->message(0, $msg_template->getMessList());
					}
				}
				$this->tpl->assign("status",$status);
				$this->tpl->assign("getMsgTemplate",$getMsgTemplate);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/mail_mess/edit_msgTemplate.tpl");
			}
			
		}
		//------------------------邮件订阅列表-----------------------------//
		private function mail_list($status="",$id=0){
			$mail_list=new MailList();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($mail_list->get_mailList_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($mail_list->delMailList($post_temp)){
						$this->logAction->write_log(1,"mail_list","放入回收站");
						$this->message(1, $mail_list->getMessList());
						$this->mess_page($mail_list->getMessList());
					} else {
						$this->logAction->write_log(0,"mail_list","放入回收站");
						$this->message(0, $mail_list->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($mail_list->delMailLists($_POST["del"])){
						$this->logAction->write_log(1,"mail_list","批量放入回收站");
						$this->message(1, $mail_list->getMessList());
						$this->mess_page($mail_list->getMessList());
					} else {
						$this->logAction->write_log(0,"mail_list","批量放入回收站");
						$this->message(0, $mail_list->getMessList());
					}
				}
				$mailList_info=$mail_list->get_mailList($pageInfo["row_offset"],$pageInfo["row_num"]);
				if($mailList_info){
					foreach($mailList_info as $key=>$val){
						$m_temp=$mail_list->get_other_datas("cms_city","name","id",$val['city_id']);
						$mailList_info[$key]['city_name']=$m_temp[0]['name'];
					}
				}
				$this->tpl->assign("mail_list",$mailList_info);
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/mail_mess/mail_list.tpl");
			}
			
			if($status=="add_mailList"){
				
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
				}
				if($_GET['edit']=="mod"){
					$getMailList=$mail_list->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getMailList", $getMailList);
					if($getMailList["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
					
				}
				
				if($_POST['act']=="add"){
					if($mail_list->validateForm($_POST)){
						if($mail_list->addMailList($_POST)){
							$this->logAction->write_log(1,"mail_list","添加");
							$this->message(1, $mail_list->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_mailList&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=mail_list';
							$this->mess_page($mail_list->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"mail_list","添加");
							$this->message(0, $mail_list->getMessList());
						}
					} else {
						$this->message(0, $mail_list->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($mail_list->validateForm($_POST)){
						if($mail_list->modMailList($_POST)){
							$this->logAction->write_log(1,"mail_list","编辑");
							$this->message(1, $mail_list->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=mail_list';
							$this->mess_page($mail_list->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"mail_list","编辑");
							$this->message(0, $mail_list->getMessList());
						}
					} else {
						$this->message(0, $mail_list->getMessList());
					}
				}
				$this->tpl->assign("cities",$mail_list->get_other_datas("cms_city where is_delete=0","id,name"));
				$this->tpl->assign("status",$status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/mail_mess/add_mailList.tpl");
			}
		}
		//------------------------邮件服务器列表-----------------------------//
		private function mail_server($status="",$id=0){
			$mail_server=new MailServer();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($mail_server->get_mailServer_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($mail_server->delMailServer($post_temp)){
						$this->logAction->write_log(1,"mail_server","放入回收站");
						$this->message(1, $mail_server->getMessList());
						$this->mess_page($mail_server->getMessList());
					} else {
						$this->logAction->write_log(0,"mail_server","放入回收站");
						$this->message(0, $mail_server->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($mail_server->delMailServers($_POST["del"])){
						$this->logAction->write_log(1,"mail_server","批量放入回收站");
						$this->message(1, $mail_server->getMessList());
						$this->mess_page($mail_server->getMessList());
					} else {
						$this->logAction->write_log(0,"mail_server","批量放入回收站");
						$this->message(0, $mail_server->getMessList());
					}
				} 
				$this->tpl->assign("mail_server",$mail_server->get_mailServer($pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/mail_mess/mail_server.tpl");
			}
			
			
			if($status=="add_mailServer"){
				
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
				}
				if($_GET['edit']=="mod"){
					$getMailServer=$mail_server->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getMailServer", $getMailServer);
					if($getMailServer["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
					
				}
				
				if($_POST['act']=="add"){
					if($mail_server->validateForm($_POST)){
						if($mail_server->addMailServer($_POST)){
							$this->logAction->write_log(1,"mail_server","添加");
							$this->message(1, $mail_server->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_mailServer&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=mail_server';
							$this->mess_page($mail_server->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"mail_server","添加");
							$this->message(0, $mail_server->getMessList());
						}
					} else {
						$this->message(0, $mail_server->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($mail_server->validateForm($_POST)){
						if($mail_server->modMailServer($_POST)){
							$this->logAction->write_log(1,"mail_server","编辑");
							$this->message(1, $mail_server->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=mail_server';
							$this->mess_page($mail_server->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"mail_server","编辑");
							$this->message(0, $mail_server->getMessList());
						}
					} else {
						$this->message(0, $mail_server->getMessList());
					}
				}
				$this->tpl->assign("status",$status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/mail_mess/add_mailServer.tpl");
			}
			
			if($status=="send_test"){
				$getMailServer=$mail_server->get($id);
				$this->tpl->assign("act", "test");
				$this->tpl->assign("getMailServer", $getMailServer);
				if($_POST['act']=="test"){
					$datas=array("FromName"=>"乐尚团购",
								 "Subject"=>"乐尚团购",
								 "Body"=>"好！这是一封检测邮件服务器设置的测试邮件。收到此邮件，意味着您的邮件服务器设置正确！您可以进行其它邮件发送的操作了！",
								 "address"=>trim($_POST['address']));
					if($mail_server->send($getMailServer,$datas)){
						$this->logAction->write_log(1,"mail_server","发送测试邮件");
						$this->message(1, $mail_server->getMessList());
						$link[0]['text'] = "返回";
						$link[0]['href'] = '?act=send_test';
						$this->mess_page($mail_server->getMessList(),$link);
					} else {
						$this->logAction->write_log(0,"mail_server","发送测试邮件");
						$this->message(0, $mail_server->getMessList());
					}
					
				}
				$this->tpl->display(APP_ADMIN_STYLE."/admin/mail_mess/send_test.tpl");
			}
			
			if($status=="set_mailServer_default"){
				$post_temp=array("is_default"=>1,"id"=>$id);
				if($mail_server->set_default($post_temp)){
					$this->logAction->write_log(1,"mail_server","设置默认邮件服务器");
					$this->message(1, $mail_server->getMessList());
					$this->mess_page($mail_server->getMessList());
				} else {
					$this->logAction->write_log(0,"mail_server","设置默认邮件服务器");
					$this->message(0, $mail_server->getMessList());
				}
			}
			
		}
		//------------------------短信接口-----------------------------//
		private function sms_list($status="",$id=0){
			$sms_list=new SmsList();
			$getSmsList=$sms_list->get($id);
			$this->tpl->assign("act", "mod");
			$this->tpl->assign("getSmsList", $getSmsList);
			if($_POST['act']=="mod"){
				if($sms_list->validateForm($_POST)){
					if($sms_list->modSmsList($_POST)){
						$this->logAction->write_log(1,"sms_list","编辑");
						$this->message(1, $sms_list->getMessList());
						$link[0]['text'] = "返回";
						$link[0]['href'] = '?act=sms_list&id=1';
						$this->mess_page($sms_list->getMessList(),$link);
					} else {
						$this->logAction->write_log(0,"sms_list","编辑");
						$this->message(0, $sms_list->getMessList());
					}
				} else {
					$this->message(0, $sms_list->getMessList());
				}
			}
				
			if($_POST['act']=="sms_sendTest"){
				$temp_config=$sms_list->read_config();
				if($sms_list->sendSMS($temp_config['user_name'],$temp_config['password'],trim($_POST['phone']),"测试短信！")){
						$this->logAction->write_log(1,"sms_list","发送测试短信");
						$this->message(1, $sms_list->getMessList());
						$link[0]['text'] = "返回";
						$link[0]['href'] = '?act=sms_list&id=1';
						$this->mess_page($sms_list->getMessList(),$link);
					} else {
						$this->logAction->write_log(0,"sms_list","发送测试短信");
						$this->message(0, $sms_list->getMessList());
					}
			}
			
			$this->tpl->display(APP_ADMIN_STYLE."/admin/mail_mess/sms_list.tpl");
			
		}
		//------------------------短信订阅列表-----------------------------//
		private function sms_subscription($status="",$id=0){
			$sms_subscription=new SmsSubscription();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($sms_subscription->get_smsSubscription_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($sms_subscription->delSmsSubscription($post_temp)){
						$this->logAction->write_log(1,"sms_subscription","放入回收站");
						$this->message(1, $sms_subscription->getMessList());
						$this->mess_page($sms_subscription->getMessList());
					} else {
						$this->logAction->write_log(0,"sms_subscription","放入回收站");
						$this->message(0, $sms_subscription->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($sms_subscription->delSmsSubscriptions($_POST["del"])){
						$this->logAction->write_log(1,"sms_subscription","批量放入回收站");
						$this->message(1, $sms_subscription->getMessList());
						$this->mess_page($sms_subscription->getMessList());
					} else {
						$this->logAction->write_log(0,"sms_subscription","批量放入回收站");
						$this->message(0, $sms_subscription->getMessList());
					}
				} 
				$sms_subscription_info=$sms_subscription->get_smsSubscription($pageInfo["row_offset"],$pageInfo["row_num"]);
				if($sms_subscription_info){
					foreach($sms_subscription_info as $key=>$val){
						$s_temp=$sms_subscription->get_other_datas("cms_city","name","id",$val['city_id']);
						$sms_subscription_info[$key]['city_name']=$s_temp[0]['name'];
					}
				}
				$this->tpl->assign("sms_subscription",$sms_subscription_info);
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/mail_mess/sms_subscription.tpl");
			}
			
			if($status=="add_smsSubscription"){
				
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
				}
				if($_GET['edit']=="mod"){
					$getSmsSubscription=$sms_subscription->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getSmsSubscription", $getSmsSubscription);
					if($getSmsSubscription["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
					
				}
				
				if($_POST['act']=="add"){
					if($sms_subscription->validateForm($_POST)){
						if($sms_subscription->addSmsSubscription($_POST)){
							$this->logAction->write_log(1,"sms_subscription","添加");
							$this->message(1, $sms_subscription->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_smsSubscription&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=sms_subscription';
							$this->mess_page($sms_subscription->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"sms_subscription","添加");
							$this->message(0, $sms_subscription->getMessList());
						}
					} else {
						$this->message(0, $sms_subscription->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($sms_subscription->validateForm($_POST)){
						if($sms_subscription->modSmsSubscription($_POST)){
							$this->logAction->write_log(1,"sms_subscription","编辑");
							$this->message(1, $sms_subscription->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=sms_subscription';
							$this->mess_page($sms_subscription->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"sms_subscription","编辑");
							$this->message(0, $sms_subscription->getMessList());
						}
					} else {
						$this->message(0, $sms_subscription->getMessList());
					}
				}
				$cities=$sms_subscription->get_other_datas("cms_city","id,name");
				$this->tpl->assign("cities",$cities);
				$this->tpl->assign("status",$status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/mail_mess/add_smsSubscription.tpl");
			}
		}
		
		//------------------------队列列表-----------------------------//
		
		private function deal_msg_list($status="",$id=0){
			$deal_msg_list=new DealMsgList();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($deal_msg_list->get_dealMsgList_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del") {
					if(isset($_POST["del"])){
						$id=$_POST["del"];
					}else{
						$id=$_GET["id"];
					}
					if($deal_msg_list->delDealMsgList($id)){
						$this->logAction->write_log(1,"msg_queue","删除");
						$this->message(1, $deal_msg_list->getMessList());
						$this->mess_page($deal_msg_list->getMessList());
					} else {
						$this->logAction->write_log(0,"msg_queue","删除");
						$this->message(0, $deal_msg_list->getMessList());
					}
				}
				$deal_msg_lists=$deal_msg_list->get_dealMsgList($pageInfo["row_offset"],$pageInfo["row_num"]);
				if($deal_msg_lists){
					foreach($deal_msg_lists as $key=>$val){
						$d_temp=$deal_msg_list->get_other_datas("cms_user","user_name","id",$val['user_id']);
						$deal_msg_lists[$key]['user_name']=$d_temp[0]['user_name'];
					}
				}
				
			}
			if($status=="send_deal_msg"){
				$type=intval($_GET['st']);
				$type_str=$type?"邮件":"短信";
				
				if($deal_msg_list->dmlSend($type,$id)){
					$this->logAction->write_log(1,"msg_queue","发送".$type_str);
					$this->message(1, $deal_msg_list->getMessList());
					$this->mess_page($deal_msg_list->getMessList());
				} else {
					$this->logAction->write_log(0,"msg_queue","发送".$type_str);
					$this->message(0, $deal_msg_list->getMessList());
					$this->mess_page($deal_msg_list->getMessList(),array(),0);
				}
				
			}
			$this->tpl->assign("deal_msg_list",$deal_msg_lists);
			$this->tpl->assign("pageinfo",$pageInfo);
			$this->tpl->display(APP_ADMIN_STYLE."/admin/mail_mess/deal_msg_list.tpl");
		}
		
		//------------------------系统设置-----------------------------//
		private function sys_config($status=""){
			$sys_config=new SysConfig();
			$this->tpl->assign("act", "mod");
			$getSysConfig=$sys_config->getSysConfig();
			
			foreach($getSysConfig["base_config"] as $var){
				
				if($var["name"]=="SITE_CLOSE_HTML"){
					$SITE_CLOSE_HTML = new FCKeditor("SITE_CLOSE_HTML");
					$SITE_CLOSE_HTML->BasePath = '../FCKeditor/';
					$SITE_CLOSE_HTML->Value=$var["value"];
				}
				
			}
			
			foreach($getSysConfig["img_config"] as $var){
				
				if($var["name"]=="WATER_MARK"){
					$this->tpl->assign("bmpPath", urldecode(GALLERY_PATH.$var["value"]));
				}
				
			}
			
			foreach($getSysConfig["site_config"] as $var){
				
				if($var["name"]=="SITE_FOOTER"){
					$SITE_FOOTER = new FCKeditor("SITE_FOOTER");
					$SITE_FOOTER->BasePath = '../FCKeditor/';
					$SITE_FOOTER->Value=$var["value"];
				}
				if($var["name"]=="REFERRAL_HELP"){
					$REFERRAL_HELP = new FCKeditor("REFERRAL_HELP");
					$REFERRAL_HELP->BasePath = '../FCKeditor/';
					$REFERRAL_HELP->Value=$var["value"];
				}
				if($var["name"]=="REFERRAL_SIDE_HELP"){
					$REFERRAL_SIDE_HELP = new FCKeditor("REFERRAL_SIDE_HELP");
					$REFERRAL_SIDE_HELP->BasePath = '../FCKeditor/';
					$REFERRAL_SIDE_HELP->Value=$var["value"];
				}
				if($var["name"]=="COUPON_PRT_TPL"){
					$COUPON_PRT_TPL = new FCKeditor("COUPON_PRT_TPL");
					$COUPON_PRT_TPL->BasePath = '../FCKeditor/';
					$COUPON_PRT_TPL->Value=$var["value"];
				}
				
				if($var["name"]=="SITE_LOGO"){
					$this->tpl->assign("logoPath", urldecode(GALLERY_PATH.$var["value"]));
				}
				
				if($var["name"]=="FOOTER_LOGO"){
					$this->tpl->assign("footerlogoPath", urldecode(GALLERY_PATH.$var["value"]));
				}
			}
			
				if($_POST['act']=="mod"){
					if($sys_config->validateForm($_POST)){
						if($sys_config->modSysConfig(new FileUpload(array("filePath"=>UPLOADPIC_PATH)),$_POST,$_FILES)){
							$this->logAction->write_log(1,"site_config","编辑");
							$this->message(1, $sys_config->getMessList());
							$link[0]['text'] = "返回系统设置";
							$link[0]['href'] = '?act=sys_config';
							$this->mess_page($sys_config->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"site_config","编辑");
							$this->message(0, $sys_config->getMessList());
						}
					} else {
						$this->message(0, $sys_config->getMessList());
					}
				}
			$this->tpl->assign("SITE_FOOTER",$SITE_FOOTER->Create());
			$this->tpl->assign("REFERRAL_HELP",$REFERRAL_HELP->Create());
			$this->tpl->assign("REFERRAL_SIDE_HELP",$REFERRAL_SIDE_HELP->Create());
			$this->tpl->assign("COUPON_PRT_TPL",$COUPON_PRT_TPL->Create());
			$this->tpl->assign("SITE_CLOSE_HTML",$SITE_CLOSE_HTML->Create());
			$this->tpl->assign("getSysConfig",$getSysConfig);
			$this->tpl->display(APP_ADMIN_STYLE."/admin/sys_config/sys_config.tpl");
		}
		//------------------------管理员分组-----------------------------//
		
		private function role($status="",$id=0){
			$role=new Role();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($role->get_role_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($role->delRole($post_temp)){
						$this->logAction->write_log(1,"role","放入回收站");
						$this->message(1, $role->getMessList());
						$this->mess_page($role->getMessList());
					} else {
						$this->logAction->write_log(0,"role","放入回收站");
						$this->message(0, $role->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($role->delRoles($_POST["del"])){
						$this->logAction->write_log(1,"role","批量放入回收站");
						$this->message(1, $role->getMessList());
						$this->mess_page($role->getMessList());
					} else {
						$this->logAction->write_log(0,"role","批量放入回收站");
						$this->message(0, $role->getMessList());
					}
				} 
				$this->tpl->assign("role",$role->get_role(false,$pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/sys_config/role.tpl");
			}
			
			if($status=="add_role"){
				
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
				}
				if($_GET['edit']=="mod"){
					$getRole=$role->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getRole", $getRole);
					$this->tpl->assign("getNode", explode(",",$getRole['access']));
					if($getRole["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
					
				}
				$this->tpl->assign("module", $role->get_module());
				$this->tpl->assign("node", $role->get_node());
				
				if($_POST['act']=="add"){
					if($role->validateForm($_POST)){
						if($role->addRole($_POST)){
							$this->logAction->write_log(1,"role","添加");
							$this->message(1, $role->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_role&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=role';
							$this->mess_page($role->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"role","添加");
							$this->message(0, $role->getMessList());
						}
					} else {
						$this->message(0, $role->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($role->validateForm($_POST)){
						if($role->modRole($_POST)){
							$this->logAction->write_log(1,"role","编辑");
							$this->message(1, $role->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=role';
							$this->mess_page($role->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"role","编辑");
							$this->message(0, $role->getMessList());
						}
					} else {
						$this->message(0, $role->getMessList());
					}
				}
				$this->tpl->assign("status",$status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/sys_config/add_role.tpl");
			}
		}
		//------------------------系统管理员-----------------------------//
		private function admin($status="",$id=0){
			$admin=new Admin();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($admin->get_admin_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($admin->delAdmin($post_temp)){
						$this->logAction->write_log(1,"admin","放入回收站");
						$this->message(1, $admin->getMessList());
						$this->mess_page($admin->getMessList());
					} else {
						$this->logAction->write_log(0,"admin","放入回收站");
						$this->message(0, $admin->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($admin->delAdmins($_POST["del"])){
						$this->logAction->write_log(1,"admin","批量放入回收站");
						$this->message(1, $admin->getMessList());
						$this->mess_page($admin->getMessList());
					} else {
						$this->logAction->write_log(0,"admin","批量放入回收站");
						$this->message(0, $admin->getMessList());
					}
				} 
				$admin_info=$admin->get_admin($pageInfo["row_offset"],$pageInfo["row_num"]);
				if($admin_info){
					foreach($admin_info as $key=>$val){
						$a_temp=$admin->get_other_datas("cms_role","name","id",$val['role_id']);
						$admin_info[$key]['role_name']=$a_temp[0]['name'];
					}
				}
				$this->tpl->assign("admin",$admin_info);
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/sys_config/admin.tpl");
			}
			
			if($status=="add_admin"){
				
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
				}
				if($_GET['edit']=="mod"){
					$getAdmin=$admin->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getAdmin", $getAdmin);
					if($getAdmin["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
					
				}
				
				if($_POST['act']=="add"){
					if($admin->validateForm($_POST)){
						if($admin->addAdmin($_POST)){
							$this->logAction->write_log(1,"admin","添加");
							$this->message(1, $admin->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_admin&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=admin';
							$this->mess_page($admin->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"admin","添加");
							$this->message(0, $admin->getMessList());
						}
					} else {
						$this->message(0, $admin->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($admin->validateForm($_POST)){
						if($admin->modAdmin($_POST)){
							$this->logAction->write_log(1,"admin","编辑");
							$this->message(1, $admin->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=admin';
							$this->mess_page($admin->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"admin","编辑");
							$this->message(0, $admin->getMessList());
						}
					} else {
						$this->message(0, $admin->getMessList());
					}
				}
				$this->tpl->assign("role",$admin->get_other_datas("cms_role where is_delete=0","id,name"));
				$this->tpl->assign("status",$status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/sys_config/add_admin.tpl");
			}
			
			if($status=="set_admin_default"){
				$post_temp=array("is_default"=>1,"id"=>$id);
				if($admin->set_default($post_temp)){
					$this->logAction->write_log(1,"admin","设为默认");
					$this->message(1, $admin->getMessList());
					$this->mess_page($admin->getMessList());
				} else {
					$this->logAction->write_log(0,"admin","设为默认");
					$this->message(0, $admin->getMessList());
				}
			}
		}
		//------------------------数据备份-----------------------------//
		private function backup($status="",$id=0){
			$database=new Database();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($database->get_database_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del") {
					if(isset($_POST["del"])){
						$id=$_POST["del"];
					}else{
						$id=$_GET["id"];
					}
					if($database->delDatabase($id)){
						$this->logAction->write_log(1,"backup","删除");
						$this->message(1, $database->getMessList());
						$link[0]['text'] = "返回数据备份列表";
						$link[0]['href'] = '?act=backup';
						$this->mess_page($database->getMessList(),$link);
					} else {
						$this->logAction->write_log(1,"backup","删除");
						$this->message(0, $database->getMessList());
					}
				}
				
				if($_GET['edit']=="restore") {
					if($database->restore($id)){
						$this->logAction->write_log(1,"backup","还原");
						$this->message(1, $database->getMessList());
						$link[0]['text'] = "返回数据备份列表";
						$link[0]['href'] = '?act=backup';
						$this->mess_page($database->getMessList(),$link);
					}else {
						$this->logAction->write_log(0,"backup","还原");
						$this->message(0, $database->getMessList());
						$this->mess_page($database->getMessList(),array(),0);
					}
				}
			}
			if($status=="do_backup"){
					if($database->backup_database()){
							$this->logAction->write_log(1,"backup");
							$this->message(1, $database->getMessList());
							$link[0]['text'] = "返回数据备份列表";
							$link[0]['href'] = '?act=backup';
							$this->mess_page($database->getMessList(),$link);
							
						} else {
							$this->logAction->write_log(0,"backup");
							$this->message(0, $database->getMessList());
						}
			}
			$this->tpl->assign("pageinfo",$pageInfo);
			$this->tpl->assign("database",$database->get_backup_files($pageInfo["row_offset"],$pageInfo["row_num"]));
			$this->tpl->display(APP_ADMIN_STYLE."/admin/sys_config/database.tpl");
		}
		
		//------------------------清理缓存-----------------------------//
		private function clear_cache($status="",$id=0){
			$tplcache_status=false;
			$datacache_status=false;
			if($status=="do_clearCache"){
				if(in_array("tplcache",$_POST['type'])){
					if($this->tpl->clearCompiledTemplate()){
						$tplcache_status=true;
					}
				}
				if (in_array("datacache",$_POST['type'])){
					if($this->tpl->clearAllCache()){
						$datacache_status=true;
					} 
				}
				if($tplcache_status || $datacache_status){
					$this->message(1, "清除缓存成功");
						$link[0]['text'] = "返回清除缓存列表";
						$link[0]['href'] = '?act=clear_cache';
						$this->mess_page("清除缓存成功",$link);
				} else {
						$this->message(0, "缓存已清除,无需再清除!");
				}
				
			}
			$this->tpl->display(APP_ADMIN_STYLE."/admin/sys_config/clear_cache.tpl");
		}
		
		//------------------------系统日志-----------------------------//
		private function logs($status="",$id=0){
			$logs=new LogAction();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($logs->get_logs_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del") {
					if(isset($_POST["del"])){
						$id=$_POST["del"];
					}else{
						$id=$_GET["id"];
					}
					if($logs->delLogs($id)){
						$this->message(1, $logs->getMessList());
						$this->mess_page($logs->getMessList());
					} else {
						$this->message(0, $logs->getMessList());
					}
				}
				$logs_info=$logs->get_logs($pageInfo["row_offset"],$pageInfo["row_num"]);
				$this->tpl->assign("logs",$logs_info);
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/sys_config/logs.tpl");
			}
		}
		//------------------------团购管理-----------------------------//
		private function deals($status="",$id=0){
			$deals=new Deals();
			
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($deals->get_deals_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($deals->delDeal($post_temp)){
						$this->logAction->write_log(1,"deals","放入回收站");
						$this->message(1, $deals->getMessList());
						$this->mess_page($deals->getMessList());
					} else {
						$this->logAction->write_log(0,"deals","放入回收站");
						$this->message(0, $deals->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($deals->delDeals($_POST["del"])){
						$this->logAction->write_log(1,"deals","批量放入回收站");
						$this->message(1, $deals->getMessList());
						$this->mess_page($deals->getMessList());
					} else {
						$this->logAction->write_log(0,"deals","批量放入回收站");
						$this->message(0, $deals->getMessList());
					}
				}
				$deals_info=$deals->get_deals(false,$pageInfo["row_offset"],$pageInfo["row_num"]);
				if($deals_info){
					foreach($deals_info as $key=>$val){
						$c_temp=$deals->get_other_datas("cms_city","name","id",$val['city_id']);
						$d_temp=$deals->get_other_datas("cms_deal_category","name","id",$val['cate_id']);
						$deals_info[$key]['city_name']=$c_temp[0]['name'];
						$deals_info[$key]['cate_name']=$d_temp[0]['name'];
					}
				}
				$this->tpl->assign("deals",$deals_info);
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/deals.tpl");
			}
			if($status=="add_deals"){
				$dealImg=new DealImg();
				$description = new FCKeditor("description");
				$description->BasePath = '../FCKeditor/';
				
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
					
				}
				
				if($_GET['edit']=="mod"){
					$getDeal=$deals->get($id);
					$getDealImgs=$dealImg->get_dealImg($id);
					$tmp=array(0,1,2,3,4);
					if(!$getDealImgs){
						$getDealImgs=array();
						foreach($tmp as $var){
							$empty=array("id"=>0,"img"=>"images/no_image.gif","deal_id"=>$id,"sort"=>$var);
							array_push($getDealImgs,$empty);
						}
					} else {
						foreach((array)$getDealImgs as $val){
							if(in_array($val['sort'],$tmp)){
								unset($tmp[$val['sort']]);
							}
						}
						foreach($tmp as $var){
							$empty=array("id"=>0,"img"=>"images/no_image.gif","deal_id"=>$id,"sort"=>$var);
							array_push($getDealImgs,$empty);
						}
					}
					

					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getDeal", $getDeal);
					if($getDeal["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
					$description->Value=$getDeal["description"];
					$this->tpl->assign("bmpPath", $getDealImgs);
					$this->tpl->assign("GALLERY_PATH", GALLERY_PATH);
					$this->tpl->assign("thumb", $getDeal['img']);
				}
				
				$this->tpl->assign("category",$deals->get_other_datas("cms_deal_category where is_delete=0","id,name"));
				$this->tpl->assign("cities",$deals->get_other_datas("cms_city  where is_delete=0","id,name"));
				$this->tpl->assign("supplier",$deals->get_other_datas("cms_supplier","id,name"));
				$this->tpl->assign("weight",$deals->get_other_datas("cms_weight","id,name"));
				
				if($_POST['act']=="add"){
					if($deals->validateForm($_POST)){
						if($deals->addDeal(new FileUpload(array("filePath"=>UPLOADPIC_PATH)),$_POST,$_FILES)){
							$this->logAction->write_log(1,"deals","添加");
							$this->message(1, $deals->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_deals&edit=add';
							$link[1]['text'] = "返回团购列表";
							$link[1]['href'] = '?act=deals';
							$this->mess_page($deals->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"deals","添加");
							$this->message(0, $deals->getMessList());
						}
					} else {
						$this->message(0, $deals->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($deals->validateForm($_POST)){
						if($deals->modDeal(new FileUpload(array("filePath"=>UPLOADPIC_PATH)),$_POST,$_FILES,$getDealImgs)){
							$this->logAction->write_log(1,"deals","编辑");
							$this->message(1, $deals->getMessList());
							$link[0]['text'] = "继续编辑";
							$link[0]['href'] = '?act=add_deals&edit=mod&id='.$id;
							$link[1]['text'] = "返回团购列表";
							$link[1]['href'] = '?act=deals';
							$this->mess_page($deals->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"deals","编辑");
							$this->message(0, $deals->getMessList());
						}
					} else {
						$this->message(0, $deals->getMessList());
					}
				}
				$this->tpl->assign("description",$description->Create());
				$this->tpl->assign("status",$status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/add_deals.tpl");
			}
			if($status=="deal_detail"){
				$getDetails=$deals->get_detail($id);
				$this->tpl->assign("getDetails", $getDetails);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/deal_detail.tpl");
			}
		}
		//------------------------团购管理-----------------------------//
		private function deal_coupon($status="",$id=0){
			$deal_coupon=new DealCoupon();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($deal_coupon->get_dealCoupon_num($id),$current_page,5);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($deal_coupon->delDealCoupon($post_temp)){
						$this->logAction->write_log(1,"deal_coupon","放入回收站");
						$this->message(1, $deal_coupon->getMessList());
						$this->mess_page($deal_coupon->getMessList());
					} else {
						$this->logAction->write_log(0,"deal_coupon","放入回收站");
						$this->message(0, $deal_coupon->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($deal_coupon->delDealCoupons($_POST["del"])){
						$this->logAction->write_log(1,"deal_coupon","批量放入回收站");
						$this->message(1, $deal_coupon->getMessList());
						$this->mess_page($deal_coupon->getMessList());
					} else {
						$this->logAction->write_log(0,"deal_coupon","批量放入回收站");
						$this->message(0, $deal_coupon->getMessList());
					}
				}
				$deal_coupons=$deal_coupon->get_dealCoupons(false,$id,$pageInfo["row_offset"],$pageInfo["row_num"]);
				if($deal_coupons){
					foreach($deal_coupons as $key=>$val){
						$d_temp=$deal_coupon->get_other_datas("cms_user","user_name","id",$val['user_id']);
						$deal_coupons[$key]['user_name']=$d_temp[0]['user_name'];
					}
				}
				$this->tpl->assign("deal_coupons",$deal_coupons);
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->assign("id",$id);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/deal_coupon.tpl");
			}
			
			if($status=="send_coupon_sms"){
				if($deal_coupon->send_deal_coupon('sms',$id)){
					  $this->message(1, $deal_coupon->getMessList());
					  $this->mess_page($deal_coupon->getMessList(),$link);
					  
				  } else {
					  $this->message(0, $deal_coupon->getMessList());
					  $this->mess_page($deal_coupon->getMessList(),array(),0);
				}
			}
			
			if($status=="send_coupon_mail"){
				if($deal_coupon->send_deal_coupon('mail',$id)){
					  $this->message(1, $deal_coupon->getMessList());
					  $this->mess_page($deal_coupon->getMessList(),$link);
					  
				  } else {
					  $this->message(0, $deal_coupon->getMessList());
					  $this->mess_page($deal_coupon->getMessList(),array(),0);
				}
			}
			
			if($status=="add_dealCoupon"){
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
				}
				if($_GET['edit']=="mod"){
					$getDealCoupon=$deal_coupon->get($id);
					$order_info=$deal_coupon->get_other_datas("cms_deal_orders","*","id",$getDealCoupon['order_id']);
					if($getDealCoupon['confirm_account']){
						$account_name=$deal_coupon->get_other_datas("cms_supplier_account","account_name","id",$getDealCoupon['confirm_account']);
						$this->tpl->assign("account_name", $account_name[0]['$account_name']);
					}
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getDealCoupon", $getDealCoupon);
					$this->tpl->assign("order_sn", $order_info[0]['order_sn']);
					
				}
				
				if($_POST['act']=="add"){
					if($deal_coupon->validateForm($_POST)){
						if($deal_coupon->addDealCoupon($_POST)){
							$this->logAction->write_log(1,"deal_coupon","添加");
							$this->message(1, $deal_coupon->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_dealCoupon&edit=add&cid='.intval($_GET['cid']);
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=deal_coupon&id='.intval($_GET['cid']);
							$this->mess_page($deal_coupon->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"deal_coupon","添加");
							$this->message(0, $deal_coupon->getMessList());
						}
					} else {
						$this->message(0, $deal_coupon->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($deal_coupon->validateForm($_POST)){
						if($deal_coupon->modDealCoupon($_POST)){
							$this->logAction->write_log(1,"deal_coupon","编辑");
							$this->message(1, $deal_coupon->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=deal_coupon&id='.intval($_GET['cid']);
							$this->mess_page($deal_coupon->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"deal_coupon","编辑");
							$this->message(0, $deal_coupon->getMessList());
						}
					} else {
						$this->message(0, $deal_coupon->getMessList());
					}
				}
				$users=$deal_coupon->get_other_datas("cms_user","user_name,id");
				$supplier_id=$deal_coupon->get_other_datas("cms_deal","supplier_id","id",intval($_GET['cid']));
				
				$this->tpl->assign("deal_coupon",$deal_coupon->get_dealCoupons(true,$id));
				$this->tpl->assign("status",$status);
				$this->tpl->assign("supplier_id",$supplier_id[0]['supplier_id']);
				$this->tpl->assign("cid",intval($_GET['cid']));
				$this->tpl->assign("users",$users);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/add_dealCoupon.tpl");
			}
			
		}
		
		//------------------------重量单位管理-----------------------------//
		private function weight($status="",$id=0){
			$weight=new Weight();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($weight->get_weight_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del") {
					if(isset($_POST["del"])){
						$id=$_POST["del"];
					}else{
						$id=$_GET["id"];
					}
					if($weight->delWeight($id)){
						$this->logAction->write_log(1,"weight","删除");
						$this->message(1, $weight->getMessList());
						$this->mess_page($weight->getMessList());
					} else {
						$this->logAction->write_log(0,"weight","删除");
						$this->message(0, $weight->getMessList());
					}
				}
				$this->tpl->assign("weight",$weight->get_weight(false,$pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/weight.tpl");
			}
			if($status=="add_weight"){
			
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
				}
				if($_GET['edit']=="mod"){
					$getWeight=$weight->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getWeight", $getWeight);
					
				}
				
				if($_POST['act']=="add"){
					if($weight->validateForm($_POST)){
						if($weight->addWeight($_POST)){
							$this->logAction->write_log(1,"weight","添加");
							$this->message(1, $weight->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_weight&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=weight';
							$this->mess_page($weight->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"weight","添加");
							$this->message(0, $weight->getMessList());
						}
					} else {
						$this->message(0, $weight->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($weight->validateForm($_POST)){
						if($weight->modWeight($_POST)){
							$this->logAction->write_log(1,"weight","编辑");
							$this->message(1, $weight->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=weight';
							$this->mess_page($weight->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"weight","编辑");
							$this->message(0, $weight->getMessList());
						}
					} else {
						$this->message(0, $weight->getMessList());
					}
				}
				
				$this->tpl->assign("weight",$weight->get_weight(true));
				$this->tpl->assign("status",$status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/add_weight.tpl");
			}
			
		}
		//------------------------团购分类-----------------------------//
		private function deals_category($status="",$id=0){
			$deals_cate=new Deals_category();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($deals_cate->get_cate_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"id"=>$id);
					if($deals_cate->delCategory($post_temp)){
						$this->logAction->write_log(1,"deals_category","放入回收站");
						$this->message(1, $deals_cate->getMessList());
						$this->mess_page($deals_cate->getMessList());
					} else {
						$this->logAction->write_log(0,"deals_category","放入回收站");
						$this->message(0, $deals_cate->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($deals_cate->delCategories($_POST["del"])){
						$this->logAction->write_log(1,"deals_category","批量放入回收站");
						$this->message(1, $deals_cate->getMessList());
						$this->mess_page($deals_cate->getMessList());
					} else {
						$this->logAction->write_log(0,"deals_category","批量放入回收站");
						$this->message(0, $deals_cate->getMessList());
					}
				} 
				$this->tpl->assign("category",$deals_cate->get_category(false,true,'all',false,$pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/deals_category.tpl");
			}
			
			if($status=="add_dealsCate"){
			
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
				}
				if($_GET['edit']=="mod"){
					$getCate=$deals_cate->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getCate", $getCate);
					if($getCate["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
					
				}
				
				if($_POST['act']=="add"){
					if($deals_cate->validateForm($_POST)){
						if($deals_cate->addCategory($_POST)){
							$this->logAction->write_log(1,"deals_category","添加");
							$this->message(1, $deals_cate->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_dealsCate&edit=add';
							$link[1]['text'] = "返回分类列表";
							$link[1]['href'] = '?act=deals_category';
							$this->mess_page($deals_cate->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"deals_category","添加");
							$this->message(0, $deals_cate->getMessList());
						}
					} else {
						$this->message(0, $deals_cate->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($deals_cate->validateForm($_POST)){
						if($deals_cate->modCategory($_POST)){
							$this->logAction->write_log(1,"deals_category","编辑");
							$this->message(1, $deals_cate->getMessList());
							$link[0]['text'] = "返回分类列表";
							$link[0]['href'] = '?act=deals_category';
							$this->mess_page($deals_cate->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"deals_category","编辑");
							$this->message(0, $deals_cate->getMessList());
						}
					} else {
						$this->message(0, $deals_cate->getMessList());
					}
				}
				
				$this->tpl->assign("status",$status);
				$this->tpl->assign("category",$deals_cate->get_category());
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/add_dealsCate.tpl");
			}
			
		}
		
		//------------------------供应商-----------------------------//
		private function supplier($status="",$id=0){
			$supplier=new Supplier();
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($supplier->get_supplier_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del") {
					if(isset($_POST["del"])){
						$id=$_POST["del"];
					}else{
						$id=$_GET["id"];
					}
					if($supplier->delSupplier($id)){
						$this->logAction->write_log(1,"supplier","删除");
						$this->message(1, $supplier->getMessList());
						$this->mess_page($supplier->getMessList());
					} else {
						$this->logAction->write_log(0,"supplier","删除");
						$this->message(0, $supplier->getMessList());
					}
				}
				$supplier_info=$supplier->get_supplier(false,$pageInfo["row_offset"],$pageInfo["row_num"]);
				if($supplier_info){
					foreach($supplier_info as $key=>$val){
						$s_temp=$supplier->get_other_datas("cms_deal_category","name","id",$val['cate_id']);
						$supplier_info[$key]['cate_name']=$s_temp[0]['name'];
					}
				}
				$this->tpl->assign("supplier",$supplier_info);
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/supplier.tpl");
			}
			
			if($status=="add_supplier"){
				$content = new FCKeditor("content");
				$content->BasePath = '../FCKeditor/';
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
				}
				if($_GET['edit']=="mod"){
					$getSupplier=$supplier->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getSupplier", $getSupplier);
					$content->Value=$getSupplier["content"];
					$this->tpl->assign("bmpPath", urldecode(GALLERY_PATH.$getSupplier["preview"]));
				}
				
				if($_POST['act']=="add"){
					if($supplier->validateForm($_POST)){
						if($supplier->addSupplier(new FileUpload(array("filePath"=>UPLOADPIC_PATH)),$_POST,$_FILES)){
							$this->logAction->write_log(1,"supplier","添加");
							$this->message(1, $supplier->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_supplier&edit=add';
							$link[1]['text'] = "返回供应商列表";
							$link[1]['href'] = '?act=supplier';
							$this->mess_page($supplier->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"supplier","添加");
							$this->message(0, $supplier->getMessList());
						}
					} else {
						$this->message(0, $supplier->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($supplier->validateForm($_POST)){
						if($supplier->modSupplier(new FileUpload(array("filePath"=>UPLOADPIC_PATH)),$_POST,$_FILES)){
							$this->logAction->write_log(1,"supplier","编辑");
							$this->message(1, $supplier->getMessList());
							$link[0]['text'] = "返回供应商列表";
							$link[0]['href'] = '?act=supplier';
							$this->mess_page($supplier->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"supplier","编辑");
							$this->message(0, $supplier->getMessList());
						}
					} else {
						$this->message(0, $supplier->getMessList());
					}
				}
				
				$this->tpl->assign("content",$content->Create());
				$this->tpl->assign("status",$status);
				$this->tpl->assign("category",$supplier->get_other_datas("cms_deal_category where is_delete=0","id,name"));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/add_supplier.tpl");
			}
		}
		//------------------------供应商帐户-----------------------------//
		private function supplierAccount($status="",$id=0){
			$supplierAccount=new SupplierAccount();
			if($status==""){
				$this->tpl->assign("supplier_id", $id);
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($supplierAccount->get_supplierAccount_num(false,$id),$current_page,6);
				$pageInfo=$page->getPageInfo();
				
				if($_GET['edit']=="del"){
					$supplier_id=$_GET["supplier_id"];
					$post_temp=array("is_delete"=>1,"id"=>$id,"supplier_id"=>$supplier_id);
					if($supplierAccount->delSupplierAccount($post_temp)){
						$this->logAction->write_log(1,"supplier_account","放入回收站");
						$this->message(1, $supplierAccount->getMessList());
						$this->mess_page($supplierAccount->getMessList());
					} else {
						$this->logAction->write_log(0,"supplier_account","放入回收站");
						$this->message(0, $supplierAccount->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					$supplier_id=$_POST["supplier_id"];
					$this->tpl->assign("supplier_id", $supplier_id);
					if($supplierAccount->delSupplierAccounts($_POST["del"],$id)){
						$this->logAction->write_log(1,"supplier_account","批量放入回收站");
						$this->message(1, $supplierAccount->getMessList());
						$this->mess_page($supplierAccount->getMessList());
					} else {
						$this->logAction->write_log(0,"supplier_account","批量放入回收站");
						$this->message(0, $supplierAccount->getMessList());
					}
				} 
				$this->tpl->assign("Records", $supplierAccount->get_supplierAccount_num(false,$id));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->assign("getAccount",$supplierAccount->get_supplierAccount(false,$pageInfo["row_offset"],$pageInfo["row_num"],$id));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/supplier_account.tpl");
			}
			
			if($status=="add_supplierAccount"){
				$supplier_id=$_REQUEST['supplier_id'];
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("supplier_id", $id);
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
					$this->tpl->assign("update_time",Common::get_gmtime());
				}
				if($_GET['edit']=="mod"){
					$getSupplierAccount=$supplierAccount->get_s_a($supplier_id,$id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getSupplierAccount", $getSupplierAccount);
					if($getSupplierAccount["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
					$this->tpl->assign("supplier_id", $supplier_id);
					$this->tpl->assign("update_time",Common::get_gmtime());
				}
				if($_POST['act']=="add"){
					if($supplierAccount->validateForm($_POST)){
						if($supplierAccount->addSupplierAccount($_POST)){
							$this->logAction->write_log(1,"supplier_account","添加");
							$this->message(1, $supplierAccount->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_supplierAccount&edit=add';
							$link[1]['text'] = "返回列表";
							$link[1]['href'] = '?act=supplier_account&id='.$supplier_id;
							$this->mess_page($supplierAccount->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"supplier_account","添加");
							$this->message(0, $supplierAccount->getMessList());
						}
					} else {
						$this->message(0, $supplierAccount->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($supplierAccount->validateForm($_POST)){
						if($supplierAccount->modSupplierAccount($_POST)){
							$this->logAction->write_log(1,"supplier_account","编辑");
							$this->message(1, $supplierAccount->getMessList());
							$link[0]['text'] = "返回列表";
							$link[0]['href'] = '?act=supplier_account&id='.$supplier_id;
							$this->mess_page($supplierAccount->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"supplier_account","编辑");
							$this->message(0, $supplierAccount->getMessList());
						}
					} else {
						$this->message(0, $supplierAccount->getMessList());
					}
				}
				
				$this->tpl->assign("status",$status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/add_supplierAccount.tpl");
			}
		}
		
		
		private function supplierLocation($status="",$id=0){
			$supplierLocation=new SupplierLocation();
			$this->tpl->assign("Records", $supplierLocation->get_supplierLocation_num(false,$id));
			if($status==""){
				$this->tpl->assign("supplier_id", $id);
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($supplierLocation->get_supplierLocation_num(false,$id),$current_page,6);
				$pageInfo=$page->getPageInfo();
				
				if($_GET['edit']=="del"){
					$supplier_id=$_GET["supplier_id"];
					$post_temp=array("is_delete"=>1,"is_main"=>0,"id"=>$id,"supplier_id"=>$supplier_id);
					if($supplierLocation->delSupplierLocation($post_temp)){
						$this->logAction->write_log(1,"supplier_location","放入回收站");
						$this->message(1, $supplierLocation->getMessList());
						$this->mess_page($supplierLocation->getMessList());
					} else {
						$this->logAction->write_log(0,"supplier_location","放入回收站");
						$this->message(0, $supplierLocation->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					$supplier_id=$_POST["supplier_id"];
					$this->tpl->assign("supplier_id", $supplier_id);
					if($supplierLocation->delSupplierLocations($_POST["del"],$id)){
						$this->logAction->write_log(1,"supplier_location","批量放入回收站");
						$this->message(1, $supplierLocation->getMessList());
						$this->mess_page($supplierLocation->getMessList());
					} else {
						$this->logAction->write_log(0,"supplier_location","批量放入回收站");
						$this->message(0, $supplierLocation->getMessList());
					}
				} 
				
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->assign("getLocation",$supplierLocation->get_supplierLocation(false,$pageInfo["row_offset"],$pageInfo["row_num"],$id));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/supplier_location.tpl");
			}
			
			if($status=="add_supplierLocation"){
				$supplier_id=$_REQUEST['supplier_id'];
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("supplier_id", $id);
					$this->tpl->assign("submitButton", "添加");
				}
				if($_GET['edit']=="mod"){
					$getSupplierLocation=$supplierLocation->get_s_l($supplier_id,$id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getSupplierLocation", $getSupplierLocation);
					$this->tpl->assign("supplier_id", $supplier_id);
				}
				if($_POST['act']=="add"){
					if($supplierLocation->validateForm($_POST)){
						if($supplierLocation->addSupplierLocation($_POST)){
							$this->logAction->write_log(1,"supplier_location","添加");
							$this->message(1, $supplierLocation->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_supplierLocation&edit=add';
							$link[1]['text'] = "返回列表";
							$link[1]['href'] = '?act=supplier_location&id='.$supplier_id;
							$this->mess_page($supplierLocation->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"supplier_location","添加");
							$this->message(0, $supplierLocation->getMessList());
						}
					} else {
						$this->message(0, $supplierLocation->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($supplierLocation->validateForm($_POST)){
						if($supplierLocation->modSupplierLocation($_POST)){
							$this->logAction->write_log(1,"supplier_location","编辑");
							$this->message(1, $supplierLocation->getMessList());
							$link[0]['text'] = "返回列表";
							$link[0]['href'] = '?act=supplier_location&id='.$supplier_id;
							$this->mess_page($supplierLocation->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"supplier_location","编辑");
							$this->message(0, $supplierLocation->getMessList());
						}
					} else {
						$this->message(0, $supplierLocation->getMessList());
					}
				}
				
				$this->tpl->assign("status",$status);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/add_supplierLocation.tpl");
			}
			
			if($status=="set_location_main"){
				$supplier_id=$_GET['supplier_id'];
				$post_temp=array("is_main"=>1,"supplier_id"=>$supplier_id,"id"=>$id);
				if($supplierLocation->set_location_main($post_temp)){
					$this->logAction->write_log(1,"supplier_location","设为默认分店");
					$this->message(1, $supplierLocation->getMessList());
					$this->mess_page($supplierLocation->getMessList());
				} else {
					$this->logAction->write_log(0,"supplier_location","设为默认分店");
					$this->message(0, $supplierLocation->getMessList());
				}
			}
		}
		
		//------------------------城市列表-----------------------------//
		private function cities($status="",$id=0){
			$cities=new City();
			$this->tpl->assign("Records",$cities->get_city_num());
			if($status==""){
				$current_page=isset($_GET["page"])?$_GET["page"]:1;
				$page=new Page($cities->get_city_num(),$current_page,ALL_PAGE_SIZE);
				$pageInfo=$page->getPageInfo();
				if($_GET['edit']=="del"){
					$post_temp=array("is_delete"=>1,"is_default"=>0,"id"=>$id);
					if($cities->delCity($post_temp)){
						$this->logAction->write_log(1,"city","放入回收站");
						$this->message(1, $cities->getMessList());
						$this->mess_page($cities->getMessList());
					} else {
						$this->logAction->write_log(0,"city","放入回收站");
						$this->message(0, $cities->getMessList());
					}
				} else if($_GET['edit']=="delAll") {
					if($cities->delCities($_POST["del"])){
						$this->logAction->write_log(1,"city","批量放入回收站");
						$this->message(1, $cities->getMessList());
						$this->mess_page($cities->getMessList());
					} else {
						$this->logAction->write_log(0,"city","批量放入回收站");
						$this->message(0, $cities->getMessList());
					}
				} 
				$this->tpl->assign("cities",$cities->get_cities(false,false,$pageInfo["row_offset"],$pageInfo["row_num"]));
				$this->tpl->assign("pageinfo",$pageInfo);
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/cities.tpl");
			}
			if($status=="add_city"){
				$description = new FCKeditor("description");          // 创建FCKeditor实例，可创建多个实例
				$notice=new FCKeditor("notice");
				$description->BasePath = '../FCKeditor/';      // 设置FCKeditor目录地址
				$notice->BasePath = '../FCKeditor/';
				
				if($_GET['edit']=="add"){
					$this->tpl->assign("act", "add");
					$this->tpl->assign("submitButton", "添加");
					$this->tpl->assign("statused", "checked='checked'");
					$this->tpl->assign("opened", "checked='checked'");
				}
				
				if($_GET['edit']=="mod"){
					$getCities=$cities->get($id);
					$this->tpl->assign("act", "mod");
					$this->tpl->assign("submitButton", "修改");
					$this->tpl->assign("getCities", $getCities);
					$description->Value=$getCities["description"];
					$notice->Value=$getCities["notice"];
					if($getCities["status"]){
						$this->tpl->assign("statused", "checked='checked'");
					} else {
						$this->tpl->assign("noStatused", "checked='checked'");
					}
					
					if($getCities["is_open"]){
						$this->tpl->assign("opened", "checked='checked'");
					} else {
						$this->tpl->assign("noOpened", "checked='checked'");
					}
				}
				
				if($_POST['act']=="add"){
					if($cities->validateForm($_POST)){
						if($cities->addCity($_POST)){
							$this->logAction->write_log(1,"city","添加");
							$this->message(1, $cities->getMessList());
							$link[0]['text'] = "继续添加";
							$link[0]['href'] = '?act=add_city&edit=add';
							$link[1]['text'] = "返回城市列表";
							$link[1]['href'] = '?act=city';
							$this->mess_page($cities->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"city","添加");
							$this->message(0, $cities->getMessList());
						}
					} else {
						$this->message(0, $cities->getMessList());
					}
				}
				
				if($_POST['act']=="mod"){
					if($cities->validateForm($_POST)){
						if($cities->modCity($_POST)){
							$this->logAction->write_log(1,"city","编辑");
							$this->message(1, $cities->getMessList());
							$link[0]['text'] = "返回城市列表";
							$link[0]['href'] = '?act=city';
							$this->mess_page($cities->getMessList(),$link);
						} else {
							$this->logAction->write_log(0,"city","编辑");
							$this->message(0, $cities->getMessList());
						}
					} else {
						$this->message(0, $cities->getMessList());
					}
				}
				$this->tpl->assign("Description",$description->Create());
				$this->tpl->assign("Notice",$notice->Create());
				$this->tpl->assign("status",$status);
				$this->tpl->assign("cities",$cities->get_cities(false,true));
				$this->tpl->display(APP_ADMIN_STYLE."/admin/deals/add_city.tpl");
			}
			
			if($status=="set_default"){
				$post_temp=array("is_default"=>1,"id"=>$id);
				if($cities->set_Default($post_temp)){
					$this->logAction->write_log(1,"city","设为默认城市");
					$this->message(1, $cities->getMessList());
					$this->mess_page($cities->getMessList());
				} else {
					$this->logAction->write_log(0,"city","设为默认城市");
					$this->message(0, $cities->getMessList());
				}
			}
		}
		//------------------------系统提示信息-----------------------------//
		private function no_access(){
			$this->message(0, "您无权限管理此栏目!");
			$this->tpl->display(APP_ADMIN_STYLE."/admin/common/no_access.tpl");
		}
		private function access(){
			$act=trim($_GET['act']);
			$edit=trim($_GET['edit']);
			if(!isset($_GET['act']) && !isset($_GET['edit'])){
				return true;
			} else {
				if($edit=="delAll"){
					$edit="del";
				}
				if($act=="deal_detail"){
					$act="deals";
				}
				if($act=="paymentNotice" && $edit=="search"){
					$edit="";
				}
				$node_id=$this->logAction->get_other_datas("cms_role_node","id","action","'{$act}' and edit='{$edit}'");
				$access=$this->logAction->get_other_datas("cms_role","access","id",$_SESSION[md5(AUTH_KEY)]['role_id']);
				$temp_access=explode(",",$access[0]['access']);
				if(in_array($node_id[0]['id'],$temp_access)){
					return true;
				} else {
					return false;
				}
			}
		}
		
		private function message($bool, $message){
			if($bool){
				$this->tpl->assign("mess", "sucess");
				$this->tpl->assign("tmess", $message);
				
			}else{
				$this->tpl->assign("mess", "error");
				$this->tpl->assign("tmess", $message);
			}
		}
		
		private function mess_page($msg_detail,$links=array(),$status=1,$auto_redirect = true,$seconds=5){
		    if (count($links) == 0){
 				$links[0]['text'] = '返回上一页';
				$links[0]['href'] = 'javascript:self.location=document.referrer;';
			}
			$status_class=$status?"mess_status_right":"mess_status_error";
   			$this->tpl->assign('ur_here',     '系统提示');
   			$this->tpl->assign('msg_detail',  $msg_detail);
			$this->tpl->assign('status_class',$status_class);
   			$this->tpl->assign('links',       $links);
   			$this->tpl->assign('default_url', $links[0]['href']);
   			$this->tpl->assign('auto_redirect', $auto_redirect);
			$this->tpl->assign('seconds', $seconds);
			$this->tpl->display(APP_ADMIN_STYLE."/admin/common/information.tpl");
			exit();
		}
		
		//------------------------系统耗时计算-----------------------------//
		function __destruct(){
			$this->timer->stop();
			$this->tpl->assign("timer", $this->timer->spent());
			$this->tpl->display(APP_ADMIN_STYLE."/admin/index/timer.tpl");
		}
		
	
		
	}
?>