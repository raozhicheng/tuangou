<?php
/*==================================================================*/
	/*		�ļ���:message.php                                    */
	/*		��Ҫ: �Ź����������ܴ���ű�.    	   	    */
	/*		����: ����                                        */
	/*==================================================================*/

	
	@define('Web_flag', true);
	//����ͨ�õĽű��ļ�
	require "common.php";
	$act=trim($_GET['act']);
	// �����ύ����ҳ�棬���ܳɹ�������ʧ��
	if($act=='add'){
		if(!$_SESSION['user_info']){
			$status_class="status_error";
			$mess="����δ��½,���½���ύ!";
		} elseif(!Common::check_ipop_limit(Common::get_ip(),"message",intval(Common::get_config("SUBMIT_DELAY")),0)){
			$status_class="status_error";
			$mess="���ύ��Ƶ�ʹ���,���Ժ�����!";
		} else {
			$message=new Message();
			$m_post['title']=$_POST['title'];
			$m_post['content']=$_POST['content'];
			$m_post['create_time'] = Common::get_gmtime();
			$m_post['update_time']=0;
			$m_post['admin_reply']='';
			$m_post['admin_id']=0;
			$m_post['group_id']=intval($_POST['group_id']);
			$m_post['user_id']=$_SESSION['user_info']['id'];
			$m_post['is_member']=intval($_POST['is_member']);
			$m_post['city_id']=$current_city['id'];
			$m_post['is_delete']=0;
			if($message->addMessage($m_post)){
				$status_class="status_success";
				$mess="�����ύ�ɹ�!";
			} else {
				$status_class="status_error";
				$mess="�����ύʧ��!";
			}
		}
		//�������Ա༭ҳ��
		$default_url="javascript:history.go(-1)";
		$tpl->assign("mess",$mess);
		$tpl->assign("default_url",$default_url);
		$tpl->assign("status_class",$status_class);
		$tpl->display($current_template."/inc/information.tpl");
	} else {
		// ����groupid��ʾ��ͬ��������
		if(!$tpl->isCached("message.tpl")) {
			$group_id=intval($_GET['group_id']);
			$mg=new Message_group();
			//��������ǩ�µ��������
			if(!$group_id){
				$preset=1;
				$temp=$mg->get_front_messageGroup(0,0,$preset);
				$group_id=$temp[0]['id'];
			}
			$mg_info=$mg->get($group_id);
			$tpl->assign("mg_info",$mg_info);
			$tpl->display($current_template."/message.tpl");
		}
	}
		
?>