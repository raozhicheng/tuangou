<?php
/*==================================================================*/
	/*		文件名:Child.class.php                              */
	/*		概要:获取子集    	       	    */
	/*		作者: 李文                                          */
	/*==================================================================*/
	class Child extends BaseLogic {
		
		private $childIds;
		
		public function __construct($tabname,$showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX.$tabname;
		}
		
		private function _getChildIds($pid = '0', $pk_str='id' , $pid_str ='pid')
		{
			$childItem_arr = $this->getAll("select id from ".TAB_PREFIX.$this->tb_name." where ".$pid_str."=".$pid);
			if($childItem_arr)
			{
				foreach($childItem_arr as $childItem)
				{
					$this->childIds[] = $childItem[$pk_str];
					$this->_getChildIds($childItem[$pk_str],$pk_str,$pid_str);
				}
			}
		}
		public function getChildIds($pid = '0', $pk_str='id' , $pid_str ='pid')
		{
			$this->childIds = array();
			$this->_getChildIds($pid,$pk_str,$pid_str);
			return $this->childIds;
		}
		
	}
	
?>