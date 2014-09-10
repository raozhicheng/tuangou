<?php
	/*==================================================================*/
	/*		�ļ���:Page.class.php                               */
	/*		��Ҫ: ��ҳ������.                	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Page {
		private $total;     //��ѯ���е������ܼ�¼��
		private $page;      //��ǰ�ڼ�ҳ
		private $num;       //ÿҳ��ʾ��¼������
		private $pageNum;   //һ������ҳ
		private $offset;    //�����ݿ���ȡ��¼�Ŀ�ʼƫ����

		function __construct($total, $page=1, $num=5) {
			$this->total=$total;
			$this->page=$page;
			$this->num=$num;
			$this->pageNum=$this->getPageNum();
			$this->offset=$this->getOffset();	
		}

		private function getPageNum(){
			return ceil($this->total/$this->num);
		}

		private function getNextPage() {
			if($this->page==$this->pageNum)
				return false;
			else
				return $this->page+1;
		}	

		private function getPrevPage() {
			if($this->page==1) 
				return false;
			else
				return $this->page-1;
		}
		//���ݿ��ѯ��ƫ����
		private function getOffset() {
			return ($this->page-1)*$this->num;
		}
		//��ǰҳ��ʼ�ļ�¼��
		private function getStartNum() {
			if($this->total==0)
				return 0;
			else 
				return $this->offset+1;
		}
		//��ǰҳ�����ļ�¼��
		private function getEndNum() {
			return min($this->offset+$this->num,$this->total);
		}
		
		private function getCurrentPageUrl(){
			$url=$this->get_current_url()."page=1";
			return $url;
		}
		private function getNextPageUrl(){
			$url=$this->get_current_url()."page=".$this->getNextPage();
			return $url;
		}
		private function getPrevPageUrl(){
			$url=$this->get_current_url()."page=".$this->getPrevPage();
			return $url;
		}
		private function getEndNumUrl(){
			$url=$this->get_current_url()."page=".$this->getPageNum();
			return $url;
		}
		private function get_current_url(){
			$url=str_replace('/','',$_SERVER["REQUEST_URI"]);
			if(!isset($_GET['city'])){
				$city=new City();
				$current_city=$city->get_current_city();
			}
			if(!isset($_GET['page'])){
				if(strpos($url,"?")){
					return APP_PATH.$url."&";
				} else {
					return APP_PATH.$url."?city=".$current_city['uname']."&";
				}
				
			}  else {
				$u=preg_replace('/page=\d+/','',$url); 
				return APP_PATH.$u;
				
			}
		}
		
		public function getPageInfo(){
			$pageInfo=array(
					"row_total" => $this->total,
					"row_num" => $this->num,
					"page_num" => $this->getPageNum(),
					"current_page"	=> $this->page,
					"current_page_url" => $this->getCurrentPageUrl(),
					"row_offset" => $this->getOffset(),
					"next_page" => $this->getNextPage(),
					"next_page_url" => $this->getNextPageUrl(),
					"prev_page" => $this->getPrevPage(),
					"prev_page_url" => $this->getPrevPageUrl(),
					"page_start" => $this->getStartNum(),
					"page_end" => $this->getEndNum(),
					"page_end_url" => $this->getEndNumUrl()
				);
			return $pageInfo;
		}	
	}
?>
