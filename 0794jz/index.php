<?php
/*==================================================================*/
	/*		�ļ���:index.php                                    */
	/*		��Ҫ: ��վ��ҳ�Ĺ��ܴ���ű�.    	   	    */
	/*		����: ����                                        */
	/*		����ʱ��: 2009-05-20                                */
	/*		����޸�ʱ��:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	
	@define('Web_flag', true);
	//����ͨ�õĽű��ļ�
	require "common.php";
	if(Common::get_config("IS_SITE_OPEN")){
		$cate_id=intval($_GET["cate_id"]);
		if(!$tpl->isCached("index.tpl")) {
			//ָ����ҳģ��
			$tpl->assign("cate_id",$cate_id);
			$tpl->display($current_template."/index.tpl");
		}
		
	} else{
		$tpl->assign("site_close_html",Common::get_config("SITE_CLOSE_HTML"));
		$tpl->display($current_template."/closed.tpl");
	}


?>