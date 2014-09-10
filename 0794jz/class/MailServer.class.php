<?php
/*==================================================================*/
	/*		�ļ���:MailServer.class.php                              */
	/*		��Ҫ: �ʼ�����������     	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class MailServer extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_mail_server";
				$this->fieldList=array("smtp_server","smtp_name","smtp_pwd","is_ssl","smtp_port","use_limit","is_reset","status","total_use","is_verify","is_delete","is_default");
		}
		//==========================================
		// ����: addMailServer($post)
		// ����: ���������ݿ�������ʼ��������б�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addMailServer($post) {
			if($this->add($post)){
				$this->messList[] = "��ӳɹ���";
				return true;
			}else{
				$this->messList[] = "���ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: modMailServer($post)
		// ����: ���������ݿ����޸��ʼ��������б�
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modMailServer($post) {
			if($this->mod($post)){
				$this->messList[] = "�޸ĳɹ���";
				return true;
			}else{
				$this->messList[] = "�޸�ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delMailServer($post)
		// ����: ������������վ��
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================
		public function delMailServer($post){
			if($this->mod($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: delMailServers($id)
		// ����: ��������������վ��
		// ����: id������ID
		// ����: true��false
		//==========================================
		function delMailServers($id) {
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
		
				
		public function set_default($post) {
			$sql="update {$this->tabName} set is_default=0 where is_default=1";
			$result=$this->mysqli->query($sql);
			if($result && $this->mod($post)) {
				$this->messList[] = "���ķ������ɹ���";
				return true;
			} else {
				$this->messList[] = "����ʧ�ܣ�";
				return false;
			}
		}
		
		//==========================================
		// ����: get_mailServer()
		// ����: ��ȡ�����б�
		// ����: offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_mailServer($offset=0,$num=0){
			$limit=" LIMIT {$offset}, {$num}";
			$sql="select * from {$this->tabName} where is_delete!=1 order by id asc".$limit;
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
		// ����: send()
		// ����: �����ʼ�
		// ����: idΪ��ǰ������ID,addressΪ�����˵�ַ
		// ����: false
		//==========================================
		public function send($getMailServer,$datas){
			require_once(APP_PATH.'phpmailer/class.phpmailer.php');
			$mail= new PHPMailer();
			$mail->SetLanguage("zh_cn");
    		$mail->CharSet ="GB2312";//�趨�ʼ����룬Ĭ��ISO-8859-1����������Ĵ���������ã���������
    		$mail->IsSMTP(); // �趨ʹ��SMTP����
   			$mail->SMTPDebug  = 0;                     // ����SMTP���Թ���
                                           // 1 = errors and messages
                               // 2 = messages only
   			$mail->SMTPAuth   = $getMailServer['is_verify']?true:false;              // ���� SMTP ��֤����
  			//$mail->SMTPSecure = "ssl";                 // ��ȫЭ��
   			$mail->Host       = $getMailServer['smtp_server'];      // SMTP ������
   			$mail->Port       = intval($getMailServer['smtp_port']);                   // SMTP�������Ķ˿ں�
   			$mail->Username   = $getMailServer['smtp_name'];  // SMTP�������û���
   			$mail->Password   = $getMailServer['smtp_pwd'];             // SMTP����������
			$mail->From = $getMailServer['smtp_name']; //�ʼ�������email��ַ ����
			$mail->FromName = $datas['FromName']; 
    		$mail->Subject    = $datas['Subject'];
    		$mail->Body    =  $datas['Body']; 
			$mail->Encoding = "base64";
			$mail->AltBody ="text/html";
    		$mail->AddAddress($datas['address'],"");
			if(isset($datas['is_html'])){
				$datas['is_html']=$datas['is_html']?true:false;
			} else {
				$datas['is_html']=false;
			}
			$mail->IsHTML($datas['is_html']);
    		if(!$mail->Send()) {
				$this->messList[] = "�ʼ�����ʧ�ܣ�".$mail->ErrorInfo;
       			return false;
    		} else {
				$this->messList[] = "�ʼ����ͳɹ���";
       			return true;
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
			if(!Validate::required($_POST['smtp_server'])){
				$this->messList[] = "SMTP��������ַ����Ϊ��!";
				$result=false;
			}
			if(!Validate::required($_POST['smtp_name'])){
				$this->messList[] = "�������ʺŲ���Ϊ��!";
				$result=false;
			}
			if(!Validate::required($_POST['smtp_pwd'])){
				$this->messList[] = "���������벻��Ϊ��!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['total_use'])){
				$this->messList[] = "���ô�����Ϊ����!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['use_limit'])){
				$this->messList[] = "���ô�����Ϊ����!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['smtp_port'])){
				$this->messList[] = "�˿ں���Ϊ����!";
				$result=false;
			}
			return  $result;
		}	
		
		public function get_default_server(){
				$sql_condition= "SELECT * FROM {$this->tabName} WHERE is_default = 1 and status=1 and ((use_limit > total_use and use_limit > 0) or (use_limit = 0))";
				$result=@$this->mysqli->query($sql);
				if(!$result){//�ѿ��������Ĭ�Ϸ���������
					$sql_zero = "update {$this->tabName} set total_use = 0 where is_reset = 1 and status = 1 and use_limit <= total_use and use_limit > 0";
					$this->mysqli->query($sql_zero);
					$result=$this->mysqli->query($sql_condition);
				}
			
			

			if($result){
				return $result->fetch_assoc();
			}else{
				
				return $error_num;
			}
		}
		
		//��ȡ�ܸ���
		public function get_mailServer_num(){
			$sql="select id from {$this->tabName} where is_delete!=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>