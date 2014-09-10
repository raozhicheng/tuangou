<?php
/*==================================================================*/
	/*		�ļ���:DeliveryFee.class.php                              */
	/*		��Ҫ: �Ź����ͷ�ʽ��չ��չ����    	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class DeliveryFee extends BaseLogic {
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_delivery_fee";
				$this->fieldList=array("delivery_id","area_ids","area_name","first_fee","first_weight","continue_fee","continue_weight");
		}
		
		
		//==========================================
		// ����: addDeliveryFee($post)
		// ����: ���������ݿ���������ͷ�ʽ��չ��Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function addDeliveryFee($post) {
				if($this->adds($post)){
					return true;
				}else{
					return false;
				}
		}
		
		//==========================================
		// ����: modDeliveryFee($post)
		// ����: ���������ݿ����޸����ͷ�ʽ��չ��Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modDeliveryFee($post) {
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
		
		public function multiModDeliveryFee($post,$id){
			if($this->delDeliveryFee($id)&&$this->adds($post)){
				return true;
			} else {
				return false;
			}
		}
		
		
		//==========================================
		// ����: delDeliveryFee($id)
		// ����: ֱ��ɾ��
		// ����: id���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================
		public function delDeliveryFee($id){
			if(is_array($id))
				$tmp = "IN (" . join(",", $id) . ")";
			else 
				$tmp = "= $id";
			
			$sql = "DELETE FROM {$this->tabName} WHERE delivery_id " . $tmp ;
			return $this->mysqli->query($sql);	
		}
		
		
		
		
		//==========================================
		// ����: get_DeliveryFees($id)
		// ����: ��ȡ���ͷ�ʽ��չ�б�
		// ����: id:��ǰID
		// ����: false���б�
		//==========================================
		public function get_DeliveryFees($id){
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
		
		/**
		 * 
		 * @param $weight  ����
		 * @param $region_id  ���͵���ID
		 * @param $delivery_id  ���ͷ�ʽID
		 * 
		 * return delivery_fee  �˷�
		 */
		public function countDeliveryFee($weight,$region_id,$delivery_id)
		{
				$region_id = intval($region_id);
				$delivery_id = intval($delivery_id);
				$delivery=new DeliveryWay();
				$weight=new Weight();
				$delivery_info = $delivery->get($delivery_id);
				$delivery_weight_unit = $weight->get(intval($delivery_info['weight_id']));  //���ͷ�ʽ���ص�����
				
				//��ʼ��ȡ��Ӧ�����Ը����ͷ�ʽ������֧��
				$child = new Child("delivery_area");
				
				$delivery_items = $this->get_DeliveryFees(intval($delivery_info['id']));
				foreach(array($delivery_items) as $k=>$v)
				{
							$support_ids = array();
							$sp_ids = $v['region_ids']; //ÿ��֧�ֵ���ֵ
							$sp_ids = explode(",",$sp_ids);
							foreach($sp_ids as $sp_id)
							{
								$tmp_ids = $child->getChildIds($sp_id);
								$tmp_ids[] = $sp_id;
								$support_ids = array_merge($support_ids,$tmp_ids);
							}
							if(in_array($region_id,$support_ids))
							{				
								//֧�ָ����͵���
								$delivery_weight_conf = $v;
								break;
							}
				}
				
				//��û���ӵ���֧��ʱ���鿴�Ƿ�֧������
				if(!$delivery_weight_conf)
				{
					if($delivery_info['allow_default'] == 1)
					{
						$delivery_weight_conf = $delivery_info;
					}	
				}
				
				if($delivery_weight_conf)
				{
					
					$delivery_weight_conf['first_weight'] = $delivery_weight_conf['first_weight'] * $delivery_weight_unit['rate'];
					$delivery_weight_conf['continue_weight'] = $delivery_weight_conf['continue_weight'] * $delivery_weight_unit['rate'];
					
					if($weight <= $delivery_weight_conf['first_weight']) //δ��������
					{
						$delivery_fee = $delivery_weight_conf['first_fee'];
					}
					else
					{
						//����
						if($delivery_weight_conf['continue_weight']!=0)
						$continue_fee = (($weight - $delivery_weight_conf['first_weight']) / $delivery_weight_conf['continue_weight']) * $delivery_weight_conf['continue_fee'];
						else
						$continue_fee = 0;
						$delivery_fee = $delivery_weight_conf['first_fee'] + $continue_fee;
					}
				}
				else
				{
					$delivery_fee = 0;
				}
			return $delivery_fee;
			
		}
		
		
		
		
	}
	
?>