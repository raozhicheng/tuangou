<?php
/*==================================================================*/
	/*		�ļ���:DeliveryNotice.class.php                              */
	/*		��Ҫ: �Ź�����֪ͨ����    	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DeliveryNotice extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_delivery_notice";
				$this->fieldList=array("notice_sn","delivery_time","is_arrival","arrival_time","order_item_id","user_id","memo");
		}
		
		
		//==========================================
		// ����: addDeliveryNotice($post)
		// ����: ���������ݿ���������ͷ�ʽ֪ͨ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addDeliveryNotice($post) {
				if($id=$this->add($post)){
					return $id;
				}else{
					return false;
				}
		}
		
		//==========================================
		// ����: modDeliveryNotice($post)
		// ����: ���������ݿ����޸����ͷ�ʽ֪ͨ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modDeliveryNotice($post) {
			$sql='';
			foreach ($post as $k=>$v) {
				$id=$v["mod_id"];
				$value='';
				foreach($v as $key=>$val){
					if(in_array($key, $this->fieldList)){
						if (!get_magic_quotes_gpc())
							$value .= $key." = '".addslashes($val)."',";
						else
							$value .= $key." = '".$val."',";
					}
				}
				
			$value=rtrim($value, ",");
			$sql.= "UPDATE {$this->tabName} SET {$value} WHERE id={$id};";
			}
			if(count($post)>1){
				return $this->mysqli->multi_query($sql);	
			} else {
				return $this->mysqli->query($sql);	
			}
				
			
		}
		
		
		//==========================================
		// ����: delDeliveryNotice($id)
		// ����: ֱ��ɾ��
		// ����: id���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================
		public function delDeliveryNotice($id){
			if(is_array($id))
				$tmp = "IN (" . join(",", $id) . ")";
			else 
				$tmp = "= $id";
			
			$sql = "DELETE FROM {$this->tabName} WHERE delivery_id " . $tmp ;
			return $this->mysqli->query($sql);	
		}
		
		
		
		
		//==========================================
		// ����: get_DeliveryNotices($id)
		// ����: ��ȡ���ͷ�ʽ��չ�б�
		// ����: id:��ǰID
		// ����: false���б�
		//==========================================
		public function get_DeliveryNotices($id){
			$sql="select * from {$this->tabName} where delivery_id={$id} order by id asc";
			$result=$this->mysqli->query($sql);
			if($result){
				while($row=$result->fetch_assoc()){
					$temp[]=$row;
				}
				if(count($temp)==0){
					return false;
				} else {
					return $temp;
				}
			}
			return false;
		}
		
		
		
		
		
		
	}
	
?>