<?php
	/*==================================================================*/
	/*		�ļ���:BaseLogic.class.php                          */
	/*		��Ҫ: ���ݴ�������.                	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class BaseLogic extends MyDB {
		protected $tabName;		//�������
		protected $fieldList;
		protected $messList;


		//==========================================
		// ����: add($postList)
		// ����: ���
		// ����: $postList �ύ�ı����б� 
		// ����: �ղ��������ID
		//==========================================
		function add($postList) {
			$fieldList='';
			$value='';
			foreach ($postList as $k=>$v) {
				if(in_array($k, $this->fieldList)){
					$fieldList.=$k.",";
					if (!get_magic_quotes_gpc())
						$value .= "'".addslashes($v)."',";
					else
						$value .= "'".$v."',";
				} 
			}

			$fieldList=rtrim($fieldList, ",");//���ַ�����ĩ�˿�ʼɾ���հ��ַ���","
			$value=rtrim($value, ",");

			$sql="INSERT INTO {$this->tabName} (".$fieldList.") VALUES (".$value.")";
			$result=$this->mysqli->query($sql);

			if($result && $this->mysqli->affected_rows>0) 
				return $this->mysqli->insert_id;
			else
				return false;
		}

		//==========================================
		// ����: adds($postList)
		// ����: ��Ӷ����¼
		// ����: $postList �ύ�ı����б� 
		// ����: �ղ��������ID
		//==========================================
		
		function adds($postList){
			$fieldList='';
			$value='';
			$i=0;
			foreach ($postList as $k=>$v) {
				$value.='(';
				$i++;
				foreach($v as $key=>$val){
					if(in_array($key, $this->fieldList) && $i==1){
						$fieldList.=$key.",";
					}
					if(in_array($key, $this->fieldList)){
						if (!get_magic_quotes_gpc())
							$value .= "'".addslashes($val)."',";
						else
							$value .= "'".$val."',";
					}
				}
				$value=rtrim($value, ",");
				$value.='),';
			}
			
			$fieldList=rtrim($fieldList, ",");
			$value=rtrim($value, ",");
			
			$sql="INSERT INTO {$this->tabName} (".$fieldList.") VALUES ".$value;
			$result=$this->mysqli->query($sql);

			if($result && $this->mysqli->affected_rows>0) 
				return $this->mysqli->insert_id;
			else
				return false;
			
		}

		//==========================================
		// ����: mod($postList)
		// ����: �޸ı�����
		// ����: $postList �ύ�ı����б�
		//==========================================
		function mod($postList) {
			$id=$postList["id"];
			unset($postList["id"]);
			$value='';
			foreach ($postList as $k=>$v) {
				if(in_array($k, $this->fieldList)){
					if (!get_magic_quotes_gpc())
						$value .= $k." = '".addslashes($v)."',";
					else
						$value .= $k." = '".$v."',";
				}
			}
			$value=rtrim($value, ",");
			$sql = "UPDATE {$this->tabName} SET {$value} WHERE id={$id}";
			return $this->mysqli->query($sql);	
		}
	
		//==========================================
		// ����: mods($postList,$where)
		// ����: �޸Ķ���������
		// ����: $postList �ύ�ı����б� ,$where ��������
		//==========================================
		function mods($postList,$where='') {
			extract($postList);
			$value='';
			foreach ($postList as $k=>$v) {
				if(in_array($k, $this->fieldList)){
					if (!get_magic_quotes_gpc())
						$value .= $k." = '".addslashes($v)."',";
					else
						$value .= $k." = '".$v."',";
				}
			}
			$value=rtrim($value, ",");
			$sql = "UPDATE {$this->tabName} SET {$value} WHERE id={$id} ".$where;
			return $this->mysqli->query($sql);	
		}
	
		//==========================================
		// ����: del($id)
		// ����: ɾ��
		// ����: $id ��Ż�ID�б�����
		// ����: 0 ʧ�� �ɹ�Ϊɾ���ļ�¼��
		//==========================================
		function del($id) {
			if(is_array($id))
				$tmp = "IN (" . join(",", $id) . ")";
			else 
				$tmp = "= $id";
			
			$sql = "DELETE FROM {$this->tabName} WHERE id " . $tmp ;
			return $this->mysqli->query($sql);	
		
		}
		
		
		//==========================================
		// ����: get($id)
		// ����: ��ȡID���ڼ�¼
		// ����: $id ��Ż�ID�б�����
		// ����: 0 ʧ�� �ɹ�Ϊɾ���ļ�¼��
		//==========================================
		
		function get($id) {
			$sql = "SELECT * FROM {$this->tabName} WHERE id ={$id}";
			$result=$this->mysqli->query($sql);

			if($result && $result->num_rows ==1){
				return $result->fetch_assoc();
			}else{
				return false;
			}
	
		}
		
		function get_other_datas($database,$tables,$d_id='',$id=0,$sort=''){
			$database=TAB_PREFIX.$database;
			if($sort){
				$sort="order by {$sort} desc";
			}
			if($d_id!='' || $id!=0){
				$conditions="WHERE {$d_id}={$id}";
			} else {
				$conditions="";
			}
			$sql = "SELECT ".$tables." FROM {$database} ".$conditions." ".$sort;
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
		
		//��ȡ��ǰSQL�е�һ������
		public function getOne($sql,$limited=false){
			if ($limited == true){
            	$sql = trim($sql . ' LIMIT 1');
       		}
			$result= $this->mysqli->query($sql);
			
			if ($result){
				$row = $result->fetch_row();
	
				if ($row){
					return $row[0];
				}
				else{
					return '';
				}
			}else{
				return false;
			}
		}
		
		//��ȡ��ǰSQL�е�ȫ������
		public function getAll($sql){
			$result= $this->mysqli->query($sql);
			if ($result){
				 $arr = array();
				while ($row=$result->fetch_assoc()){
					$arr[] = $row;
				}
				return $arr;
			}else{
				return false;
			}
		}
		
		public function getRow($sql, $limited = false){
			if ($limited == true)
			{
				$sql = trim($sql . ' LIMIT 1');
			}
			
	
			$res = $this->mysqli->query($sql);
			if ($res)
			{
				return $res->fetch_assoc();
			}
			else
			{
				return false;
			}
		}
		
		public function query($sql){
			$result= $this->mysqli->query($sql);
			if($result){
				return true;
			} else {
				return false;
			}
		}
		
		public function getCount($sql){
			$result= $this->mysqli->query($sql);
			if($result){
				return $result->num_rows;
			} else {
				return false;
			}
		}
		
	
		function getMessList(){
			$message="";
			if(!empty($this->messList)){
				foreach($this->messList as $value){
					$message.=$value."&nbsp;&nbsp;";
				}
			}
			return $message; 	
		}
		
		
		public function showStatus($status,$mess='',$ajax=0,$default_url=''){
			if($ajax==1){
				if($status){
					$result['status'] = 1;
				}else{
					$result['status'] = 0;
				}
				$result['info'] = $mess;
				Common::ajax_return($result);
				exit;
			}else{
				if($status){
					$status_class="status_success";
				} else{
					$status_class="status_error";
				}
				if($default_url=='')
				{
					$default_url = $_SERVER['HTTP_REFERER'];
				}
				$result['status_class']=$status_class;
				$result['mess']=$mess;
				$result['default_url']=$default_url;
				return $result;
			}
		}
	}
?>
