<?php
function smarty_modifier_set($Web_info,$configName){
	
	
	$value=Common::get_config($configName);
	switch($configName){
		case 'WATER_MARK':
		case 'SITE_LOGO':
		case 'FOOTER_LOGO':
			$value=GALLERY_PATH.$value;
		break;
		case 'ONLINE_QQ':
			
			$value=explode(",",Common::get_config("ONLINE_QQ"));
		break;
		
	}
	
	return $value;
}
?>