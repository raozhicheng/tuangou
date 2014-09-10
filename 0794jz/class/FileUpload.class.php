<?php
	/*==================================================================*/
	/*		�ļ���:FileUpload.class.php                         */
	/*		��Ҫ: �ļ��ϴ�������.                	       	    */
	/*		����: ����                                          */
	/*		����ʱ��: 2011-07-15                                */
	/*		����޸�ʱ��:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class FileUpload {
		private $filePath;   //* �ļ�Ŀ��·��
		private $fileField; //* Ĭ��$_FILES[$fileField],ͨ��$_FILES����������ȡ�ϴ��ļ���Ϣ
		private $originName; //Դ�ļ���
		private $originMultiName;
		private $tmpFileName; //��ʱ�ļ���
		private $tmpFileMultiName;
		private $fileType; //�ļ�����(�ļ���׺)
		private $fileMultiType;
		private $fileSize; //�ļ���С
		private $fileMultiSize;
		private $newFileName; //���ļ���
		private $newFileMultiName; 
		private $allowType;
		private $maxSize; //�����ļ��ϴ�����󳤶�
		private $isUserDefName = false; //�Ƿ�����û��Զ�����
		private $userDefName; //�û���������
		private $userDefMultiName;
		private $isRandName = true; //�Ƿ����������
		private $randName; //ϵͳ�������
		private $errorNum = 0; //�����
		private $isCoverModer = true; //�Ƿ񸲸�ģʽ
		private $loopNum;//���ļ��ϴ�ѭ������

		function __construct($options=array()) {
			$this->setOptions($options);//�����ϴ�ʱ�����б�
			$this->allowType=explode(",",Common::get_config("ALLOW_FILE_EXT"));
			$this->maxSize=Common::get_config("FILE_MAXSIZE");
		}
		
		//���ļ��ϴ�
		public function uploadFile($filefield) {
        	$this->setOption('errorNum',0); //���ô���λ
        	$this->setOption('fileField', $filefield);//����fileField
			$this->setFiles(); //�����ļ���Ϣ
			$this->checkValid();//�жϺϷ���
			$this->checkFilePath();//����ļ�·��
			$this->setNewFileName(); //�������ļ���
			if ($this->errorNum < 0) //����Ƿ����
				return $this->errorNum; 
			return $this->copyFile(); //�ϴ��ļ�
		}
		
		//���ļ��ϴ�
		public function uploadFiles($filefield) {
			$this->loopNum=count($filefield);
			$this->setOption('errorNum',0); 
        	$this->setOption('fileField', $filefield);
			$this->setMultiFiles(); 
			$this->checkMultiValid();
			$this->checkFilePath();
			$this->setNewFileMultiName(); 
			if ($this->errorNum < 0) 
				return $this->errorNum;
			return $this->copyMultiFile(); 
		}

		private function setOptions($options=array()) {
			foreach ($options as $key=>$val) {
				if (!in_array($key, array('filePath','fileField','originName','allowType','maxSize','isUserDefName','userDefName','isRandName','randName'))) 
					continue;
				$this->setOption($key, $val);
			}
		}
		
		
				
		private function setFiles() {
			if ($this->getFileErrorFromFILES() != 0) {
				$this->setOption('errorNum', -1);
				return $this->errorNum;
			}
			
			$this->setOption('originName', $this->getFileNameFromFILES());
			$this->setOption('tmpFileName', $this->getTmpFileNameFromFILES());
			$this->setOption('fileType', $this->getFileTypeFromFILES());
			$this->setOption('fileSize', $this->getFileSizeFromFILES());

		}
		
		private function setMultiFiles() {
			
			$this->setOption('originMultiName', $this->getPropertyFromMultiFILES("name"));
			$this->setOption('tmpFileMultiName', $this->getPropertyFromMultiFILES("tmp_name"));
			$this->setOption('fileMultiType', $this->getFileTypeFromMultiFILES());
			$this->setOption('fileMultiSize', $this->getPropertyFromMultiFILES("size"));

		}
    

		private function setOption($key, $val) {
			$this->$key = $val;
		}

		private function setNewFileName() {
			if ($this->isRandName == false && $this->isUserDefName == false) {
				$this->setOption('newFileName', $this->originName);
			} else if ($this->isRandName == true && $this->isUserDefName == false) {
				$this->setOption('newFileName', $this->proRandName().'.'.$this->fileType);
			} else if ($this->isRandName == false && $this->isUserDefName == true) {
				$this->setOption('newFileName', $this->userDefName);
			} else {
				$this->setOption('errorNum', -4);
			}
		}
		
		private function setNewFileMultiName() {
			if ($this->isRandName == false && $this->isUserDefName == false) {
				$this->setOption('newFileMultiName', $this->originMultiName);
			} else if ($this->isRandName == true && $this->isUserDefMultiName == false) {
				foreach($this->fileField as $key=>$val){
					$tmp[$key]= $this->proRandName().".".$this->fileMultiType[$key];
				}
				$this->setOption('newFileMultiName', $tmp);
			} else if ($this->isRandName == false && $this->isUserDefName == true) {
				$this->setOption('newFileMultiName', $this->userDefMultiName);
			} else {
				$this->setOption('errorNum', -4);
			}
		}
 		
		private function checkValid() {
			$this->checkFileSize();
			$this->checkFileType();
		}
		
		private function checkMultiValid() {
			$this->checkFileMultiSize();
			$this->checkFileMultiType();
		}
		
		private function checkFileType() {
			if (!in_array($this->fileType, $this->allowType)) 
				$this->setOption('errorNum', -2);
			return $this->errorNum;
		}
		
		private function checkFileMultiType() {
			foreach($this->fileField as $key=>$val){
				if (!in_array($this->fileMultiType[$key], $this->allowType)) {
					$this->setOption('errorNum', -2);
					return $this->errorNum;
				}
			}
		}
    
		private function checkFileSize() {
			if ($this->fileSize > $this->maxSize) 
				$this->setOption('errorNum', -3);
			return $this->errorNum;
		}
		
		private function checkFileMultiSize() {
			foreach($this->fileField as $key=>$val){
				if ($this->fileMultiSize[$key] > $this->maxSize) 
					$this->setOption('errorNum', -3);
				return $this->errorNum;
			}
		}
		
		private function checkFilePath() {
			if (!file_exists($this->filePath)) {
				if ($this->isCoverModer) {
					$this->makePath();
				} else {
					$this->setOption('errorNum', -6);
				}
			}
		}
		
		private function proRandName() {
			$tmpStr = "abcdefghijklmnopqrstuvwxyz0123456789";
			$str = "";
			for ($i=0; $i<8; $i++) {
				$num = rand(0, strlen($tmpStr));
				$str .= $tmpStr[$num];
			}    
			return md5($str);
		}
		
		
		private function makePath() {
			if (!@mkdir($this->filePath, 0755)) {
				$this->setOption('errorNum', -7);
			}
		}

		private function copyFile() {
			$filePath = $this->filePath;
			if ($filePath[strlen($filePath)-1] != '/') {
				$filePath .= '/'; 
			}
			
			$filePath .= $this->newFileName;
			if (!@move_uploaded_file($this->tmpFileName, $filePath)) {
				$this->setOption('errorNum', -5);
			}
			return $this->errorNum;
		}
		
		private function copyMultiFile() {
			foreach($this->fileField as $key=>$val){
				$filePath = $this->filePath;
				if ($filePath[strlen($filePath)-1] != '/') {
					$filePath .= '/'; 
				}
				$filePath .= $this->newFileMultiName[$key];
				if (!@move_uploaded_file($this->tmpFileMultiName[$key], $filePath)) {
					$this->setOption('errorNum', -5);
				}
			}
			return $this->errorNum;
		}
		
		function getNewFileName(){
			return $this->newFileName;
		}
		
		function getNewFileMultiName(){
			return $this->newFileMultiName;
		}

		private function getFileErrorFromFILES() {
			return $this->fileField['error'];
		}
		
		
		private function getFileTypeFromFILES() {
			$str = $this->fileField['name'];
			$aryStr = explode(".", $str);
			$ret = strtolower($aryStr[count($aryStr)-1]);
			return $ret;
		}
		
		
		private function getFileTypeFromMultiFILES() {
			foreach($this->fileField as $key=>$val){
				$str = $this->fileField[$key]['name'];
				$aryStr = explode(".", $str);
				$ret[$key]= strtolower($aryStr[count($aryStr)-1]);
			}
			return $ret;
		}
		
		private function getFileNameFromFILES() {
			return $this->fileField['name'];
		}
		private function getPropertyFromMultiFILES($proper) {
			$tmp=array();
			foreach($this->fileField as $key=>$val){
				$tmp[$key]=$this->fileField[$key][$proper];
			}
			return $tmp;
		}
		
		private function getTmpFileNameFromFILES() {
			return $this->fileField['tmp_name'];
		}
		
		private function getFileSizeFromFILES() {
			return $this->fileField['size'];
		}
		
		public function getPicNum(){
			return $this->loopNum;
		}
		
		public function getErrorMsg() {
			$str = "�ϴ��ļ����� : ";
			switch ($this->errorNum) {
				case -1:
					$str .= "δ֪����";
					break;
				case -2:
					$str .= "δ��������";
					break;
				case -3:
					$str .= "�ļ�����";
					break;
				case -4:
					$str .= "�����ļ�������";
					break;
				case -5:
					$str .= "�ϴ�ʧ��";
					break;
				case -6:
					$str .= "Ŀ¼������";
					break;
				case -7:
					$str .= "����Ŀ¼ʧ��";
					break;
			}
			return $str;
		}
	}
?>
