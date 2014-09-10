<?php
/*==================================================================*/
	/*		�ļ���:cart.php                                    */
	/*		��Ҫ: ���ﳵ����ű�.    	   	    */
	/*		����: ����                                        */
	/*==================================================================*/

	
	@define('Web_flag', true);
	//����ͨ�õĽű��ļ�
	require "common.php";
	$tpl->caching=0;
	//�Ź�״̬��������
	$deal_status=array(
	'DEAL_ERROR_1'	=>	'�Ź�������',
	'DEAL_ERROR_2'	=>	'�Ź��ѹ���',
	'DEAL_ERROR_3'	=>	'�Ź�δ��ʼ',
	'DEAL_ERROR_4'	=>	'�Ź���������',
	'DEAL_ERROR_5'	=>	'�û���С����������',
	'DEAL_ERROR_6'	=>	'�û������������'
	);
	
	$act=trim($_REQUEST['act']);
	$user_info=$_SESSION['user_info']?$_SESSION['user_info']:array("id"=>0);
	if($act=="addcart"){
		$id = intval($_GET['id']);
		$deal=new Deals();
		$check = $deal->check_deal_time($id);
		if($check['status'] == 0){
			$res['open_win'] = 2;
			$res['info'] = $check['info']." ".$deal_status['DEAL_ERROR_'.$check['data']];
			Common::ajax_return($res);
		}
		$attr = $_REQUEST['attr'];
		$t = $deal->get_front_deal($id);
		$deal_info=$t[0];
		//����֤�ۻ������ֽ�
		$cart_sum_return_score = $deal->getOne("select sum(return_total_score) from ".TAB_PREFIX."cms_deal_cart where session_id='".session_id()."' and user_id=".intval($user_info['id'])." and return_total_score < 0");
		$cart_sum_return_money = $deal->getOne("select sum(return_total_money) from ".TAB_PREFIX."cms_deal_cart where session_id='".session_id()."' and user_id=".intval($user_info['id'])." and return_total_money < 0");
		if($deal_info['return_score']<0&&$user_info['score']<(abs($deal_info['return_score'])+abs($cart_sum_return_score))){
			//�������ڴ���
			$res['open_win'] = 1;
			$res['html'] = '���ֲ��㣬�޷�����';
			Common::ajax_return($res);
		}
		if($deal_info['return_money']<0&&$user_info['money']<(abs($deal_info['return_money'])+abs($cart_sum_return_money))){
			//�������ڴ���
			$res['open_win'] = 1;
			$res['html'] = '���㣬�޷�����';
			Common::ajax_return($res);
		}
		if(!$attr&&$deal_info['deal_attr_list']){
			$this->assign("deal_info",$deal_info);
			$html = $tpl->fetch("deal_attr.html");
			//�������ڴ���
			$res['open_win'] = 1;
			$res['html'] = $html;
			Common::ajax_return($res);
		} else {
			//���빺�ﳵ�������ύ���ԣ� ��������ʱ
			$attr_str = '0';
			$attr_name = '';
			if($attr)
			{
				$attr_str = implode(",",$attr);
				$attr_name = $deal->getOne("select group_concat(name) from ".TAB_PREFIX."cms_deal_attr where id in(".$attr_str.")");
			}
			$verify_code = md5($id."_".$attr_str);
			$session_id = session_id();
			
			if(Common::get_config("IS_CART")==0){
				$deal->query("delete from ".TAB_PREFIX."cms_deal_cart where session_id = '".$session_id."' and user_id = ".intval($user_info['id']));
			}
			$sql="select * from ".TAB_PREFIX."cms_deal_cart where session_id='".$session_id."' and user_id = ".intval($user_info['id'])." and verify_code = '".$verify_code."'";
			$cart_item = $deal->getAll($sql);
			if(!$cart_item)
			{
				$attr_price = $deal->getOne("select sum(price) from ".TAB_PREFIX."cms_deal_attr where id in($attr_str)");
				
				$cart_item['session_id'] = $session_id;
				$cart_item['user_id'] = intval($user_info['id']);
				$cart_item['deal_id'] = $id;
				//����
				if($attr_name != '')
				{
					$cart_item['name'] = $deal_info['name']." [".$attr_name."]";
					$cart_item['sub_name'] = $deal_info['sub_name']." [".$attr_name."]";
				}
				else
				{
					$cart_item['name'] = $deal_info['name'];
					$cart_item['sub_name'] = $deal_info['sub_name'];
				}
				
				$cart_item['attr'] = $attr_str;
				$cart_item['unit_price'] = $deal_info['current_price'] + $attr_price;
				$cart_item['number'] = 1;
				$cart_item['total_price'] = $cart_item['unit_price'] * $cart_item['number'];
				$cart_item['verify_code'] = $verify_code;
				$cart_item['create_time'] = Common::get_gmtime();
				$cart_item['update_time'] = Common::get_gmtime();
				$cart_item['return_score'] = $deal_info['return_score'];
				$cart_item['return_total_score'] = $deal_info['return_score'] * $cart_item['number'];
				$cart_item['return_money'] = $deal_info['return_money'];
				$cart_item['return_total_money'] = $deal_info['return_money'] * $cart_item['number'];
				$cart_item['buy_type']	=	$deal_info['buy_type'];
				$deal_cart=new DealCart();
				$deal_cart->add($cart_item);
			}		
			$res['open_win'] = 0;
			
			Common::ajax_return($res);	
		}
	} elseif($act=='delcart'){
			$id = intval($_GET['id']);
			$deal_cart=new DealCart();
			$deal_cart->del($id);
			$cart_list = $deal_cart->getCartList($user_info['id']);
			if($cart_list)
			{
				$tpl->assign("cart_list",$cart_list);
				$total_price=$deal_cart->getOne("select sum(total_price) from ".TAB_PREFIX."cms_deal_cart where session_id = '".session_id()."' and user_id = ".intval($user_info['id']));
				$tpl->assign("total_price",sprintf("%.2f", $total_price));
				$html=trim($tpl->fetch($current_template."/inc/cart/cart_list.tpl"));
				$result['html'] =Common::compress_html($html);
				$result['status'] = 1;
				Common::ajax_return($result);
			}else{
				$result['status'] = 0;
				Common::ajax_return($result);
			}
	} elseif($act=="modifycart"){
		$id = intval($_REQUEST['id']);
		$deal=new Deals();
		$deal_cart=new DealCart();
		$cart_item = $deal_cart->get($id);
		$number = intval($_REQUEST['number']);
		if($number<=0)
		{
			$result['info'] = '������������Ϊ��';
			$result['status'] = 0;
			Common::ajax_return($result);	
		}
		$add_number = $number - $cart_item['number'];
		$check = $deal->check_deal_number($cart_item['deal_id'],$add_number);
		if($check['status']==0)
		{
			$result['info'] = $check['info']." ".$deal_status['DEAL_ERROR_'.$check['data']];
			$result['status'] = 0;
			Common::ajax_return($result);
		}
		$deal_cart->query("update ".TAB_PREFIX."cms_deal_cart set number =".$number.", total_price = ".$number."* unit_price, return_total_score = ".$number."* return_score, return_total_money = ".$number."* return_money where id =".$id);
		$cart_list = $deal_cart->getCartList($user_info['id']);
		$total_price=$deal_cart->getOne("select sum(total_price) from ".TAB_PREFIX."cms_deal_cart where session_id = '".session_id()."' and user_id = ".intval($user_info['id']));
		$tpl->assign("cart_list",$cart_list);
		$tpl->assign("total_price",sprintf("%.2f", $total_price));
		$html=trim($tpl->fetch($current_template."/inc/cart/cart_list.tpl"));
		$result['html'] =Common::compress_html($html);
		$result['status'] = 1;
		Common::ajax_return($result);
		
	} elseif($act=="check"){
		$deal=new Deals();
		$ajax = intval($_REQUEST['ajax']);
		if(!$user_info['id'])
		{				
			if($ajax)
			{
				$tpl->assign("ajax",1);
				$html = trim($tpl->fetch($current_template."/member/login_form.tpl"));
				//�������ڴ���
				$res['open_win'] = 1;
				$res['html'] = Common::compress_html($html);
				Common::ajax_return($res);
			}else{
				$res['open_win'] = 0;
				$res['info']='���½';
				Common::ajax_return($res);
			}
		}
		$deal_ids = $deal->getAll("select distinct(deal_id) as deal_id from ".TAB_PREFIX."cms_deal_cart where session_id = '".session_id()."' and user_id = ".$user_info['id']);
		foreach($deal_ids as $row)
		{
			$checker = $deal->check_deal_time($row['deal_id']);
			if($checker['status']==0)
			{
				Common::ajax_msg_return($checker['info'].' '.$deal_status['DEAL_ERROR_'.$checker['data']],0);
			}
			
			$checker = $deal->check_deal_number($row['deal_id']);
			if($checker['status']==0)
			{
				Common::ajax_msg_return($checker['info'].' '.$deal_status['DEAL_ERROR_'.$checker['data']],0);
			}
		}
		if($ajax == 1)
		{
			$result['status'] = 1;
			Common::ajax_return($result);	
		} else {
			if(!$user_info)
			{
				$status_class="status_error";
				$default_url=Common::rewrite_url(APP_PATH."user.php?act=member_index");
				$mess="���½!";
				$tpl->assign("mess",$mess);
				$tpl->assign("default_url",$default_url);
				$tpl->assign("status_class",$status_class);
				$tpl->display($current_template."/inc/information.tpl");
			}
			$deal_cart=new DealCart();
			$cart_list=$deal_cart->getCartList($user_info['id']);
			if(!$cart_list)
			{
				Common::redirect(APP_PATH);
			}
			//������ﳵ����
			$tpl->assign("cart_list",$cart_list);
			$total_price=$deal_cart->getOne("select sum(total_price) from ".TAB_PREFIX."cms_deal_cart where session_id = '".session_id()."' and user_id = ".intval($user_info['id']));
			$tpl->assign("total_price",sprintf("%.2f", $total_price));
			$tpl->assign("title","�ύ����");
			$is_delivery = 0;
			foreach($cart_list as $k=>$v)
			{
				$d=$deal->get($v['deal_id']);
				if($d['is_delivery']==1)
				{
					$is_delivery = 1;
					break;
				}
			}
			if($is_delivery)
			{
				//������ͷ�ʽ
				$consignee_id = $deal_cart->getOne("select id from ".TAB_PREFIX."cms_user_consignee where user_id = ".$user_info['id']);
				$tpl->assign("consignee_id",intval($consignee_id));
			}
			$payment=new Payment();
			$payment_list = $payment->get_front_payments();
			$ud=$payment->getRow("select * from ".TAB_PREFIX."cms_user where id = ".$user_info['id']." and status = 1 and is_delete = 0");
			if($ud&&$ud['money']>0){
				$account_html="�ʻ���"."<strong style='color:red'>&yen;".round($ud['money'],2)."</strong>&nbsp;&nbsp;ʹ�����֧����<input type='text' style='width: 50px;' value='' name='account_money' class='f-input' id='account_money'>&nbsp;&nbsp;<label><input type='checkbox' checked='checked' id='check-all-money' name='all_account_money' value='1'>ȫ��֧��</label>";
			}
			$order_info=array('id'=>0);
			$tpl->assign("payment_list",$payment_list);
			$tpl->assign("account_html",$account_html);
			$tpl->assign("order_info",$order_info);
			$tpl->assign("is_delivery",$is_delivery);
			$tpl->display($current_template."/cart_check.tpl");
		}
		
	}elseif($act=="done" || $act=="order_done"){
		$deal_cart=new DealCart();
		if($act=="order_done"){
			$id = intval($_POST['id']); //������
			$order = $deal_cart->getRow("select * from ".TAB_PREFIX."cms_deal_orders where id = ".$id." and is_delete = 0");
			if(!$order){
				$status_class="status_error";
				$default_url="javascript:history.go(-1)";
				$mess="�Ƿ��Ķ���!";
				$tpl->assign("mess",$mess);
				$tpl->assign("default_url",$default_url);
				$tpl->assign("status_class",$status_class);
				$tpl->display($current_template."/inc/information.tpl");
				exit;
			}
		}
		$region_id = intval($_POST['region_lv3']);
		$delivery_id = intval($_POST['delivery']);
		$payment = intval($_POST['payment']);
		$account_money = floatval($_POST['account_money']);
		$all_account_money = intval($_POST['all_account_money']);
		$ecvsn = $_POST['ecvsn']?trim($_POST['ecvsn']):'';
		$ecvpassword = $_POST['ecvpassword']?trim($_POST['ecvpassword']):'';
		$user_id = intval($user_info['id']);
		if($act=="done"){
			$session_id = session_id();
			$goods_list = $deal_cart->getCartList($user_info['id']);
		} elseif($act=="order_done"){
			$goods_list = $deal_cart->getAll("select * from ".TAB_PREFIX."cms_deal_order_item where order_id = ".$order['id']);
		}
		if(!$user_info['id']){
			$status_class="status_error";
			$default_url="javascript:history.go(-1)";
			$mess="��½ʧ��,������!";
			$tpl->assign("mess",$mess);
			$tpl->assign("default_url",$default_url);
			$tpl->assign("status_class",$status_class);
			$tpl->display($current_template."/inc/information.tpl");
			exit;
		}
		if($act=="done"){
			$deal_ids = $deal_cart->getAll("select distinct(deal_id) as deal_id from ".TAB_PREFIX."cms_deal_cart where session_id = '".$session_id."' and user_id = ".$user_id);
			$deal=new Deals();
			foreach($deal_ids as $row){
				$check = $deal->check_deal_time($row['deal_id']);
				if($check['status'] == 0){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess = $check['info']." ".$deal_status['DEAL_ERROR_'.$check['data']];
					$tpl->assign("mess",$mess);
					$tpl->assign("default_url",$default_url);
					$tpl->assign("status_class",$status_class);
					$tpl->display($current_template."/inc/information.tpl");
					exit;
				}
				$check = $deal->check_deal_time($row['deal_id']);
				if($check['status'] == 0){
					$status_class="status_error";
					$default_url="javascript:history.go(-1)";
					$mess = $check['info']." ".$deal_status['DEAL_ERROR_'.$check['data']];
					$tpl->assign("mess",$mess);
					$tpl->assign("default_url",$default_url);
					$tpl->assign("status_class",$status_class);
					$tpl->display($current_template."/inc/information.tpl");
					exit;
				}
			}
		}
		$data =$deal_cart->countBuyTotal($region_id,$delivery_id,$payment,$account_money,$all_account_money,$ecvsn,$ecvpassword,$goods_list);
		if($data['is_delivery'] == 1){
			if(!$data['region_info']||$data['region_info']['level'] != 3){
				$deal_cart->showStatus(0,"��ѡ���������͵�����������Ϣ",1);
			}
			if(trim($_REQUEST['consignee'])==''){
				$deal_cart->showStatus(0,"��ѡ���������͵�����������Ϣ",1);
			}
			if(trim($_REQUEST['address'])==''){
				$deal_cart->showStatus(0,"����д��ַ",1);
			}
			if(trim($_REQUEST['zip'])==''){
				$deal_cart->showStatus(0,"����д�ʱ�",1);
			}
			if(trim($_REQUEST['mobile'])==''){
				$deal_cart->showStatus(0,"����д�ֻ����� ",1);
			}
			if(!Validate::check_mobile($_REQUEST['mobile'])){
				$deal_cart->showStatus(0,"����д��ȷ���ֻ����� ",1);
			}
			if(!$data['delivery_info']){
				$deal_cart->showStatus(0,"��ѡ�����ͷ�ʽ ",1);
			}
		}
		if(round($data['pay_price'],4)>0&&!$data['payment_info']){
			$deal_cart->showStatus(0,"��ѡ��֧����ʽ",1);
		}
		$deal_order=new DealOrder();
		$now = Common::get_gmtime();
		if($act=="done"){
			$order['order_sn'] = Common::to_date(Common::get_gmtime(),"Ymdhis").rand(10,99); 
			$order['type'] = 0; //��ͨ����
			$order['user_id'] = $user_id;
			$order['create_time'] = $now;	
			$order['update_time'] = 0;
			$order['total_price'] = $data['pay_total_price'];  //Ӧ���ܶ�  ��Ʒ�� - ��Ա�ۿ� + �˷� + ֧��������
			$order['pay_amount'] = 0;  
			$order['pay_status'] = 0;  //�µ���Ϊ�㣬 �����������ͬ������״̬
			$order['delivery_status'] = $data['is_delivery']==0?5:0;  
			$order['order_status'] = 0;  //�µ���Ϊ�㣬 �����������ͬ������״̬
			$order['return_total_score'] = $data['return_total_score'];  //�ᵥ���͵Ļ���
			$order['return_total_money'] = $data['return_total_money'];  //�ᵥ���͵��ֽ�
			$order['refund_amount']=0;
			$order['admin_memo'] = '';
			$order['is_delete']=0;
			$order['memo'] = htmlspecialchars(trim($_REQUEST['memo']));
			$order['region_lv1'] = intval($_REQUEST['region_lv1']);
			$order['region_lv2'] = intval($_REQUEST['region_lv2']);
			$order['region_lv3'] = intval($_REQUEST['region_lv3']);
			$order['region_lv4'] = 0;
			$order['address']	=	htmlspecialchars(trim($_REQUEST['address']));
			$order['mobile']	=	htmlspecialchars(trim($_REQUEST['mobile']));
			$order['consignee']	=	htmlspecialchars(trim($_REQUEST['consignee']));
			$order['zip']	=	htmlspecialchars(trim($_REQUEST['zip']));
			$order['deal_total_price'] = $data['total_price'];   //�Ź���Ʒ�ܼ�
			$order['discount_price'] = $data['user_discount'];
			$order['delivery_fee'] = $data['delivery_fee'];
			$order['ecv_money'] = 0;
			$order['account_money'] = 0;
			if($order['delivery_status']==5){
				$order['delivery_id']=0;
			} else {
				$order['delivery_id'] = $data['delivery_info']['id'];
			}
			$order['payment_id'] = $data['payment_info']['id'];
			$order['payment_fee'] = $data['payment_fee'];
			$order['extra_status']=0;
			$order['after_sale']=0;
			$order['refund_money']=0;
			$order_id=$deal_order->addDealOrder($order);
		} elseif($act=="order_done"){
			$order['total_price'] = $data['pay_total_price'];  //Ӧ���ܶ�  ��Ʒ�� - ��Ա�ۿ� + �˷� + ֧��������
			$order['memo'] = htmlspecialchars(trim($_REQUEST['memo']));
			$order['region_lv1'] = intval($_REQUEST['region_lv1']);
			$order['region_lv2'] = intval($_REQUEST['region_lv2']);
			$order['region_lv3'] = intval($_REQUEST['region_lv3']);
			$order['region_lv4'] = intval($_REQUEST['region_lv4']);
			$order['address']	=	htmlspecialchars(addslashes(trim($_REQUEST['address'])));
			$order['mobile']	=	htmlspecialchars(addslashes(trim($_REQUEST['mobile'])));
			$order['consignee']	=	htmlspecialchars(addslashes(trim($_REQUEST['consignee'])));
			$order['zip']	=	htmlspecialchars(addslashes(trim($_REQUEST['zip'])));
			$order['delivery_fee'] = $data['delivery_fee'];
			$order['delivery_id'] = $data['delivery_info']['id'];
			$order['payment_id'] = $data['payment_info']['id'];
			$order['payment_fee'] = $data['payment_fee'];
			$deal_order->modDealOrder($order);
		}
		
		//���ɶ�����Ʒ
		if($act=="done"){
			$deal_order_item=new DealOrderItem();
			foreach($goods_list as $k=>$v){
				$goods_item = array();
				$goods_item['deal_id'] = $v['deal_id'];
				$goods_item['number'] = $v['number'];
				$goods_item['unit_price'] = $v['unit_price'];
				$goods_item['total_price'] = $v['total_price'];
				$goods_item['delivery_status'] = 0;  
				$goods_item['name'] = $v['name'];
				$goods_item['sub_name'] = $v['sub_name'];
				$goods_item['attr'] = $v['attr'];
				$goods_item['verify_code'] = $v['verify_code'];
				$goods_item['order_id'] = $order_id;
				$goods_item['return_score'] = $v['return_score'];
				$goods_item['return_total_score'] = $v['return_total_score'];
				$goods_item['return_money'] = $v['return_money'];
				$goods_item['return_total_money'] = $v['return_total_money'];
				$goods_item['buy_type']	=	$v['buy_type']; 
				$deal_order_item->addDealOrderItem($goods_item);
			}
			$deal_cart->delDealCart($user_info['id']);
		}
		if($data['is_delivery']==1){
			$uc=new UserConsignee();
			$user_consignee=$uc->getUserConsignee($user_info['id']);
			$user_consignee['region_lv1'] = intval($_REQUEST['region_lv1']);
			$user_consignee['region_lv2'] = intval($_REQUEST['region_lv2']);
			$user_consignee['region_lv3'] = intval($_REQUEST['region_lv3']);
			$user_consignee['address']	=	htmlspecialchars(trim($_REQUEST['address']));
			$user_consignee['mobile']	=	htmlspecialchars(trim($_REQUEST['mobile']));
			$user_consignee['consignee']	=	htmlspecialchars(trim($_REQUEST['consignee']));
			$user_consignee['zip']	=	htmlspecialchars(trim($_REQUEST['zip']));
			$user_consignee['user_id']	=	$user_id;
			if(intval($user_consignee['id'])==0)
			{
				//���� 
				$uc->addUserConsignee($user_consignee);
			}
			else
			{
				//����
				$uc->modUserConsignee($user_consignee);
			}
		}
		if($act=="order_done"){
			$order_id=$order['id'];
		}
		// ���֧��
		$account_money = $data['account_money'];
		$payment_notice=new PaymentNotice();
		if(floatval($account_money) > 0)
		{
			$account_payment_id =4;
			$notice['notice_sn']=Common::date_to_name();
			$notice['create_time']=Common::get_gmtime();
			$notice['pay_time']=0;
			$notice['order_id']=$order_id;
			$notice['is_paid']=0;
			$notice['user_id']=$user_id;
			$notice['payment_id']=$account_payment_id;
			$notice['memo']='';
			$notice['money']=$account_money;
			$notices=array("memo"=>"","order_id"=>$order_id);
			$payment_notice_id =$payment_notice->makePaymentNotice($notice);
			$payment_notice->paymentPaid($payment_notice_id,$notices);
		}
		// ��Ӧ��֧���ӿ�
		$payment_info = $data['payment_info'];
		if($payment_info&&$data['pay_price']>0)
		{
			$notice['notice_sn']=Common::date_to_name();
			$notice['create_time']=Common::get_gmtime();
			$notice['pay_time']=0;
			$notice['order_id']=$order_id;
			$notice['is_paid']=0;
			$notice['user_id']=$user_id;
			$notice['payment_id']=$payment_info['id'];
			$notice['memo']='';
			$notice['money']=$data['pay_price'];
			$payment_notice_id =$payment_notice->makePaymentNotice($notice);
			//����֧���ӿڵĸ��
		}
		
		if($deal_order->orderPaid($order_id)){
			
			Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=done&id=".$order_id));
			
		} else {
			Common::redirect(Common::rewrite_url(APP_PATH."payment.php?act=pay&id=".$payment_notice_id));
		}
			
		
	}else {
			
		$deal_cart=new DealCart();
		$deal_cart->query("update ".TAB_PREFIX."cms_deal_cart set update_time=".Common::get_gmtime()." where session_id = '".session_id()."' and user_id = ".intval($user_info['id']));
		$cart_list=$deal_cart->getCartList($user_info['id']);
		if(!$cart_list[0]){
			Common::redirect(APP_PATH);
		} else {
			$total_price=$deal_cart->getOne("select sum(total_price) from ".TAB_PREFIX."cms_deal_cart where session_id = '".session_id()."' and user_id = ".intval($user_info['id']));
			$tpl->assign("total_price",sprintf("%.2f", $total_price));
			$tpl->assign("title","���ﳵ�б�");
			$tpl->assign("cart_list",$cart_list);
			$tpl->display($current_template."/cart.tpl");
		}
	}
	
?>