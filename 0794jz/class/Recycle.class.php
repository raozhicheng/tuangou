<?php
/*==================================================================*/
	/*		�ļ���:Recycle.class.php                              */
	/*		��Ҫ: ����վ      	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Recycle extends BaseLogic {
		
		private $name;
		
		public function __construct($tables,$current,$showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX.$current;
				$this->fieldList=array($tables[$current][1],"is_delete");
				$this->name="id".",".$tables[$current][1];
		}
		
		//==========================================
		// ����: modRecycle($post)
		// ����: ���������ݿ��л�ԭ��Ϣ
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����: true��false
		//==========================================	
		public function modRecycle($post) {
			if($this->restore($post)){
				$this->messList[] = "��ԭ�ɹ���";
				return true;
			}else{
				$this->messList[] = "��ԭʧ�ܣ�";
				return false;
			}
		}
		
		
		function restore($id) {
			if(is_array($id))
				$tmp = "IN (" . join(",", $id) . ")";
			else 
				$tmp = "= $id";
			
			$sql = "UPDATE {$this->tabName} SET is_delete=0  WHERE id " . $tmp ;
			return $this->mysqli->query($sql);	
		
		}
		//==========================================
		// ����: delRecycle($id)
		// ����: ������վ��������ɾ��
		// ����: id�ǳ���ID
		// ����: true��false
		//==========================================
		public function delRecycle($post){
			if($this->del($post)){
				$this->messList[] = "ɾ���ɹ���";
				return true;
			}else{
				$this->messList[] = "ɾ��ʧ�ܣ�";
				return false;
			}
		}
		
	
		
		//==========================================
		// ����: get_recycle()
		// ����: ��ȡ����վ�б�
		// ����:  offset:is_allΪ��Ļ�ƫ����,num:����
		// ����: false���б�
		//==========================================
		public function get_recycle($offset=0,$num=0){
			
			$limit=" LIMIT {$offset}, {$num}";
		    $sql="select {$this->name} from {$this->tabName} where is_delete=1 order by id desc".$limit;
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
		
		//��ȡ�ܸ���(
		public function get_recycle_num(){
			$sql="select id from {$this->tabName} where is_delete=1";
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>