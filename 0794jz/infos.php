<?php
/*==================================================================*/
	/*		�ļ���:infos.php                                    */
	/*		��Ҫ: �Ź�����ҳ���ܴ���ű�.    	   	    */
	/*		����: ����                                        */
	/*		����ʱ��: 2009-05-20                                */
	/*		����޸�ʱ��:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	
	@define('Web_flag', true);
	//����ͨ�õĽű��ļ�
	require "common.php";
	if(!$tpl->isCached("infos.tpl")) {
		//ָ���Ź��б�ҳ
		$cate_id=intval($_GET['id']);
		$tpl->assign("cate_id",$cate_id);
		$tpl->display($current_template."/infos.tpl");
	}
		
?>