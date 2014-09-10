<?php
function smarty_modifier_type($pages,$types,$num){
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	switch($types){
		case 'deal':
			$page=new Page($num,$current_page,Common::get_config("DEAL_PAGE_SIZE"));
			$pageInfo=$page->getPageInfo();
		break;
		case 'other':
			$page=new Page($num,$current_page,Common::get_config("PAGE_SIZE"));
			$pageInfo=$page->getPageInfo();
		break;
		
	}
	
	return $pageInfo;
}
?>