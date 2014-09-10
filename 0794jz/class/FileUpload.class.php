<?php
	/*==================================================================*/
	/*		文件名:FileUpload.class.php                         */
	/*		概要: 文件上传管理类.                	       	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class FileUpload {
		private $filePath;   //* 文件目的路径
		private $fileField; //* 默认$_FILES[$fileField],通过$_FILES环境变量获取上传文件信息
		private $originName; //源文件名
		private $originMultiName;
		private $tmpFileName; //临时文件名
		private $tmpFileMultiName;
		private $fileType; //文件类型(文件后缀)
		private $fileMultiType;
		private $fileSize; //文件大小
		private $fileMultiSize;
		private $newFileName; //新文件名
		private $newFileMultiName; 
		private $allowType;
		private $maxSize; //允许文件上传的最大长度
		private $isUserDefName = false; //是否采用用户自定义名
		private $userDefName; //用户定义名称
		private $userDefMultiName;
		private $isRandName = true; //是否随机重命名
		private $randName; //系统随机名称
		private $errorNum = 0; //错误号
		private $isCoverModer = true; //是否覆盖模式
		private $loopNum;//多文件上传循环次数

		function __construct($options=array()) {
			$this->setOptions($options);//设置上传时属性列表
			$this->allowType=explode(",",Common::get_config("ALLOW_FILE_EXT"));
			$this->maxSize=Common::get_config("FILE_MAXSIZE");
		}
		
		//单文件上传
		public function uploadFile($filefield) {
        	$this->setOption('errorNum',0); //设置错误位
        	$this->setOption('fileField', $filefield);//设置fileField
			$this->setFiles(); //设置文件信息
			$this->checkValid();//判断合法性
			$this->checkFilePath();//检查文件路径
			$this->setNewFileName(); //设置新文件名
			if ($this->errorNum < 0) //检查是否出错
				return $this->errorNum; 
			return $this->copyFile(); //上传文件
		}
		
		//多文件上传
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
			$str = "上传文件出错 : ";
			switch ($this->errorNum) {
				case -1:
					$str .= "未知错误";
					break;
				case -2:
					$str .= "未允许类型";
					break;
				case -3:
					$str .= "文件过大";
					break;
				case -4:
					$str .= "产生文件名出错";
					break;
				case -5:
					$str .= "上传失败";
					break;
				case -6:
					$str .= "目录不存在";
					break;
				case -7:
					$str .= "建立目录失败";
					break;
			}
			return $str;
		}
	}
?>
