<?php
function smarty_modifier_name($Web_link,$linkName,$id=0){
	
	switch($linkName){
		case 'login':
			$value=Common::rewrite_url(APP_PATH."user.php?act=login");
		break;
		case 'logout':
			$value=Common::rewrite_url(APP_PATH."user.php?act=logout");
		break;
		case 'do_login':
			$value=Common::rewrite_url(APP_PATH."user.php?act=do_login");
		break;
		case 'register':
			$value=Common::rewrite_url(APP_PATH."user.php?act=register");
		break;
		case 'do_register':
			$value=Common::rewrite_url(APP_PATH."user.php?act=do_register");
		break;
		case 'getPassword':
			$value=Common::rewrite_url(APP_PATH."user.php?act=getPassword");
		break;
		case 'sendPassword':
			$value=Common::rewrite_url(APP_PATH."user.php?act=sendPassword");
		break;
		case 'do_modify_password':
			$value=Common::rewrite_url(APP_PATH."user.php?act=do_modify_password");
		break;
		case 'member':
			$value=Common::rewrite_url(APP_PATH."user.php?act=member_index");
		break;
		case 'incharge':
			$value=Common::rewrite_url(APP_PATH."user.php?act=incharge");
		break;
		case 'pay':
			$value=Common::rewrite_url(APP_PATH."payment.php?act=pay&id=".$id);
		break;
		case 'extracts_cash':
			$value=Common::rewrite_url(APP_PATH."message.php?group_id=1");
		break;
		case 'business':
			$value=Common::rewrite_url(APP_PATH."message.php?group_id=2");
		break;
		case 'feedback':
			$value=Common::rewrite_url(APP_PATH."message.php?group_id=3");
		break;
		case 'deal_order':
			$value=Common::rewrite_url(APP_PATH."message.php?group_id=4");
		break;
		case 'question':
			$value=Common::rewrite_url(APP_PATH."message.php?group_id=5");
		break;
		case 'infos':
			$value=Common::rewrite_url(APP_PATH."infos.php?id=".$id);
		break;
		case 'message':
			$value=Common::rewrite_url(APP_PATH."message.php");
		break;
		case 'my_order':
			$value=Common::rewrite_url(APP_PATH."user.php?act=my_order");
		break;
		case 'mod_consignee':
			$value=Common::rewrite_url(APP_PATH."user.php?act=mod_consignee");
		break;
		case 'mod_profile':
			$value=Common::rewrite_url(APP_PATH."user.php?act=mod_profile");
		break;
		case 'incharge_done':
			$value=Common::rewrite_url(APP_PATH."user.php?act=incharge_done");
		break;
		case 'cart':
			$value=Common::rewrite_url(APP_PATH."cart.php");
		break;
		case 'cart_check':
			$value=Common::rewrite_url(APP_PATH."cart.php?act=check");
		break;
		case 'add_cart':
			$value=Common::rewrite_url(APP_PATH."cart.php?act=addcart");
		break;
		case 'del_cart':
			$value=Common::rewrite_url(APP_PATH."cart.php?act=delcart");
		break;
		case 'modify_cart':
			$value=Common::rewrite_url(APP_PATH."cart.php?act=modifycart");
		break;
		case 'done':
			$value=Common::rewrite_url(APP_PATH."cart.php?act=done");
		break;
		case 'order_done':
			$value=Common::rewrite_url(APP_PATH."cart.php?act=order_done");
		break;
		case 'subscribe_mail':
			$value=Common::rewrite_url(APP_PATH."subscribe.php?act=mail");
		break;
		case 'subscribe_addmail':
			$value=Common::rewrite_url(APP_PATH."subscribe.php?act=addmail");
		break;
		case 'coupon_verify':
			$value=Common::rewrite_url(APP_PATH."coupon.php?act=verify");
		break;
		case 'supplier_dologin':
			$value=Common::rewrite_url(APP_PATH."coupon.php?act=supplier_dologin");
		break;
		case 'supplier_loginout':
			$value=Common::rewrite_url(APP_PATH."coupon.php?act=loginout");
		break;
		case 'supplier_login':
			$value=Common::rewrite_url(APP_PATH."coupon.php?act=supplier_login");
		break;
		case 'supplier_modPass':
			$value=Common::rewrite_url(APP_PATH."coupon.php?act=supplier_modPass");
		break;
		case 'supplier_doModPass':
			$value=Common::rewrite_url(APP_PATH."coupon.php?act=supplier_doModPass");
		break;
	}
	
	return $value;
}
?>