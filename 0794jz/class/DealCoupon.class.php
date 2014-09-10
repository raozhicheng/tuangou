<?php
/*==================================================================*/
	/*		�ļ���:DealCoupon.class.php                              */
	/*		��Ҫ: �Ź�ȯ����     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DealCoupon extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal_coupon";
				$this->fieldList=array("sn","password","begin_time","end_time","is_valid","user_id","deal_id","order_id","order_deal_id","is_new","supplier_id","confirm_account","is_delete","confirm_time","mail_count","sms_count");
		}
		//==========================================
		// ����: addDealCoupon($post)
		// ����: ���������ݿ�������Ź�ȯ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addDealCoupon($post) {
			$deal_info=$this->get_other_datas("cms_deal","*","id",$post['deal_id']);
			
			if(!$post['sn']){
				$post['sn']=Common::get_rand_num(8);
			}
			if(!$post['password']){
				$post['password']=Common::get_rand_num(12);
			}
			if($post['begin_time']!=""){
				$post['begin_time']=strtotime($post['begin_time']);
			} else{
				$post['begin_time']=$deal_info[0]['coupon_begin_time'];
			}
			
			if($post['end_time']!=""){
				$post['end_time']=strtotime($post['end_time']);
			} else{
				$post['end_time']=$deal_info[0]['coupon_end_time'];
			}
			
			if($post['order_id']){
				$order_info=$this->get_other_datas("cms_deal_orders","*","id",$post['order_id']);			
				$post['user_id'] = $order_info[0]['user_id'];
				$post['order_id'] = $order_info[0]['id'];
				$post['order_deal_id'] = $post['order_deal_id'];
			}
			
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ��,�ֶ����Ʋ������ظ���";
				return false;
			}
		}
		
		//==========================================
		// ����: modDealCoupon($post)
		// ����: ���������ݿ����޸��Ź�ȯ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modDealCoupon($post) {
			
			if($post['begin_time']!=""){
				$post['begin_time']=strtotime($post['begin_time']);
			} else{
				$post['begin_time']=$deal_info[0]['coupon_begin_time'];
			}
			
			if($post['end_time']!=""){
				$post['end_time']=strtotime($post['end_time']);
			} else{
				$post['end_time']=$deal_info[0]['coupon_end_time'];
			}
			
			if($this->mod($post)){
				$this->messList[] = "�޸ĳɹ���";
				return true;
			}else{
				$this->messList[] = "�޸�ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delDealCoupon($id)
		// ����: ���Ź�ȯ�������վ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delDealCoupon($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delDealCoupons($id)
		// ����: ���Ź�ȯ�������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delDealCoupons($id) {
			if(count($id)==0){
				$this->messList[] = "��ѡ����Ҫɾ���ķ��࣡";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1 WHERE id ";
			if(is_array($id)) {
				$sql .= "IN (" . join(",", $id) . ")";

			}else{
				$sql .= "= $id";
			}

			if($this->mysqli->query($sql)){
				$this->messList[] = "����ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "����ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		public function send_deal_coupon($type='',$deal_coupon_id){
			if($type=="sms"){
				if($this->send_deal_coupon_sms($deal_coupon_id)){
					$this->messList[] = "���ŷ��ͳɹ���";
					return true;
				} else {
					$this->messList[] = "���ŷ���ʧ�ܣ�";
					return false;
				}
			} elseif($type=="mail"){
				if($this->send_deal_coupon_mail($deal_coupon_id)){
					$this->messList[] = "�ʼ����ͳɹ���";
					return true;
				} else {
					$this->messList[] = "�ʼ�����ʧ�ܣ�";
					return false;
				}
			}
		}
		
		//�������Ź�ȯ
		public function send_deal_coupon_sms($deal_coupon_id){
			
			if(Common::get_config("SMS_ON")&&Common::get_config("COUPON_SMS_NOTICE")){
				$coupon_data=$this->get($deal_coupon_id);		
				if($coupon_data)
				{
					$user_info=$this->get_other_datas("cms_user","*","id",$coupon_data['user_id']);
					if($user_info[0]['mobile']!='')
					{
						$deal_msg_list=new DealMsgList();
						$tmpl = $this->get_other_datas("cms_msg_template","*","name","'TPL_SMS_COUPON'");	
						$tmpl_content = $tmpl[0]['content'];
						$coupon_data['begin_time_format'] = $coupon_data['begin_time']==0?'���޿�ʼʱ��':Common::to_date($coupon_data['begin_time'],'Y-m-d');
						$coupon_data['end_time_format'] = $coupon_data['end_time']==0?'���޵���ʱ��':Common::to_date($coupon_data['end_time'],'Y-m-d');			
						$coupon_data['user_name'] = $user_info[0]['user_name'];
						$coupon_data['deal_name'] =$this->get_other_datas("cms_deal_order_item","sub_name","id",$coupon_data['order_deal_id']);	
						$msg=Common::getTempStr("coupon_data",$coupon_data,$tmpl_content);
						$msg_data['dest'] = $user_info[0]['mobile'];
						$msg_data['send_type'] = 0;
						$msg_data['content'] = addslashes($msg);;
						$msg_data['send_time'] = 0;
						$msg_data['is_send'] = 0;
						$msg_data['create_time'] = Common::get_gmtime();
						$msg_data['user_id'] = $user_info[0]['id'];
						$msg_data['is_html'] = $tmpl[0]['is_html'];
						if($deal_msg_list->addDealMsgList($msg_data))
							return true;
						else
							return false;
					}
				}		
			}
			return false;
		}
		
		public function send_deal_coupon_mail($deal_coupon_id){
			
			if(Common::get_config("MAIL_ON")&&Common::get_config("COUPON_MAIL_NOTICE")){
				$coupon_data=$this->get($deal_coupon_id);
				if($coupon_data){
					$deal_msg_list=new DealMsgList();
					$tmpl = $this->get_other_datas("cms_msg_template","*","name","'TPL_MAIL_COUPON'");	
					$tmpl_content = $tmpl[0]['content'];
					$user_info=$this->get_other_datas("cms_user","*","id",$coupon_data['user_id']);	
					$coupon_data['begin_time_format'] = $coupon_data['begin_time']==0?'���޿�ʼʱ��':Common::to_date($coupon_data['begin_time'],'Y-m-d');
					$coupon_data['end_time_format'] = $coupon_data['end_time']==0?'���޵���ʱ��':Common::to_date($coupon_data['end_time'],'Y-m-d');			
					$coupon_data['user_name'] = $user_info[0]['user_name'];
					$deal_name=$this->get_other_datas("cms_deal_order_item","sub_name","id",$coupon_data['order_deal_id']);
					$coupon_data['deal_name'] =$deal_name[0]['sub_name'];
					$msg=Common::getTempStr("coupon_data",$coupon_data,$tmpl_content);
					$msg_data['dest'] = $user_info[0]['email'];
					$msg_data['send_type'] = 1;
					$msg_data['title'] = '���ѻ���Ź�ȯ';
					$msg_data['content'] = addslashes($msg);;
					$msg_data['send_time'] = 0;
					$msg_data['is_send'] = 0;
					$msg_data['create_time'] = Common::get_gmtime();
					$msg_data['user_id'] = $user_info[0]['id'];
					$msg_data['is_html'] = $tmpl[0]['is_html'];
					if($deal_msg_list->addDealMsgList($msg_data))	
						return true;
					else
						return false;
					
				}
			}
			return false;
		}
		
				
		
		
		//==========================================
		// ����: get_dealCoupons()
		// ����: ��ȡ�Ź�ȯ
		// ����: is_all:�Ƿ���ȫ���г�,offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_dealCoupons($is_all=true,$id,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where is_delete!=1 and deal_id={$id}".$limit;
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
						$temp[]=$row;
				}
				return $temp;
			}
		}
		
		
		public function get_front_coupon($user_id=0,$status,$offset=0,$num=0){
			if($offset!=0 || $num!=0){
				$limit=" LIMIT {$offset}, {$num}";
			} else{
				$limit="";
			}
			$confirm_condition="";
			if($status==1){
				$confirm_condition = " and confirm_time = 0 ";
			}
			if($status==2){
				$confirm_condition = " and confirm_time <> 0 ";
			}
			$sql="select * from ".TAB_PREFIX."cms_deal_coupon where user_id = ".$user_id." and is_delete = 0 and is_valid = 1 ".$confirm_condition." order by order_id desc ".$limit;
			$list = $this->getAll($sql);
			foreach($list as $k=>$v){
				$sql="select * from ".TAB_PREFIX."cms_deal_order_item where id = ".$v['order_deal_id'];
				$t=$this->getAll($sql);
				$list[$k]['deal_item'] =$t[0] ;
			}
			
			return $list;
		}
		
		public function get_allOrders(){
			$sql="SELECT id,order_sn,type from {$this->tabName} WHERE is_delete!=1 order by id desc";
			$result=$this->mysqli->query($sql);
			if(!$result){
				return false;
			} else {
				while($row=$result->fetch_assoc()){
						$temp[]=$row;
				}
				return $temp;
			}
		}
		
		
		
		
		//==========================================
		// ����: validateForm()
		// ����: ����ӵ����ݻ��޸ĵ����ݽ�����֤
		// ����: ��
		// ����: true��false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::checkLength($_POST['sn'], 40)) {
				$this->messList[] = "���кŲ��ܳ���20���ַ�!";
				$result=false;
			}
			if(!Validate::match($_POST['sn'],"/^\w+$/") && $_POST['sn']!='') {
				$this->messList[] = "���к�ֻ��Ϊ������ĸ��!";
				$result=false;
			}
			if(!Validate::match($_POST['password'],"/^\w+$/") && $_POST['password']!='') {
				$this->messList[] = "����ֻ��Ϊ������ĸ��!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['password'], 40)) {
				$this->messList[] = "���벻�ܳ���20���ַ�!";
				$result=false;
			}
			
			if(Validate::required($_POST['begin_time']) && Validate::required($_POST['end_time'])) {
				if($_POST['begin_time']>$_POST['end_time']){
					$this->messList[] = "��ʼʱ�䲻�ܴ��ڽ���ʱ��!";
					$result=false;
				}
			}
			return  $result;
		}	
		
		//��ȡ�Ź�ȯ�ܸ���()
		public function get_dealCoupon_num($id){
			$sql="select * from {$this->tabName} where is_delete!=1 and deal_id={$id}";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>