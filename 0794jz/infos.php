<?php
/*==================================================================*/
	/*		文件名:infos.php                                    */
	/*		概要: 团购新闻页功能处理脚本.    	   	    */
	/*		作者: 李文                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	
	@define('Web_flag', true);
	//包含通用的脚本文件
	require "common.php";
	if(!$tpl->isCached("infos.tpl")) {
		//指向团购列表页
		$cate_id=intval($_GET['id']);
		$tpl->assign("cate_id",$cate_id);
		$tpl->display($current_template."/infos.tpl");
	}
		
?>