<?php
/*==================================================================*/
	/*		文件名:index.php                                    */
	/*		概要: 网站首页的功能处理脚本.    	   	    */
	/*		作者: 李文                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	
	@define('Web_flag', true);
	//包含通用的脚本文件
	require "common.php";
	if(Common::get_config("IS_SITE_OPEN")){
		$cate_id=intval($_GET["cate_id"]);
		if(!$tpl->isCached("index.tpl")) {
			//指向首页模版
			$tpl->assign("cate_id",$cate_id);
			$tpl->display($current_template."/index.tpl");
		}
		
	} else{
		$tpl->assign("site_close_html",Common::get_config("SITE_CLOSE_HTML"));
		$tpl->display($current_template."/closed.tpl");
	}


?>