<?php
/*==================================================================*/
	/*		�ļ���:deal.php                                    */
	/*		��Ҫ: ��ϸ�Ź�ҳ����ű�.    	   	    */
	/*		����: ����                                        */
	/*==================================================================*/

	
	@define('Web_flag', true);
	//����ͨ�õĽű��ļ�
	require "common.php";
	if(!$tpl->isCached("deal.tpl")) {
		//ָ����ϸҳģ��
		$seo_info=$template->getRow("select seo_title,seo_keyword,seo_description from ".TAB_PREFIX."cms_deal where id='".intval($_GET['id'])."'");
		$tpl->assign("seo_title",$seo_info['seo_title']);
		$tpl->assign("seo_keyword",$seo_info['seo_keyword']);
		$tpl->assign("seo_description",$seo_info['seo_description']);
		$tpl->assign("side_deal_num",Common::get_config("SIDE_DEAL_NUM"));
		$tpl->assign("side_deal_tag",1);
		$tpl->display($current_template."/deal.tpl");
	}
		
?>