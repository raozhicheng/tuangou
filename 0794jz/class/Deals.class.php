<?php
/*==================================================================*/
	/*		文件名:Deals.class.php                              */
	/*		概要: 团购管理     	         	    */
	/*		作者: 李文                                          */
	/*		创建时间: 2011-07-15                                */
	/*		最后修改时间:2011-07-15                             */
	/*		copyright (c)2011 15919572@qq.com                  */
	/*==================================================================*/
	class Deals extends BaseLogic {
		private $deals_list=array();
		
		public function __construct($showError=TRUE) {
				parent::__construct($showError);
				$this->tabName=TAB_PREFIX."cms_deal";
				$this->fieldList=array("name","sub_name","cate_id","supplier_id","img","description","begin_time","end_time","min_bought","max_bought","user_min_bought","user_max_bought","origin_price","current_price","city_id","is_coupon","is_delivery","status","is_delete","user_count","buy_count","time_status","buy_status","deal_type","allow_promote","return_money","return_score","brief","sort","deal_goods_type","success_time","coupon_begin_time","coupon_end_time","code","weight","weight_id","is_referral","buy_type","discount","seo_title","seo_keyword","seo_description","notice","free_delivery","define_payment");
		}
		
		private function uploadPic($fileUpload,$file_arr,$file){
			if($file_arr['num']>1){
				$fun=$fileUpload->uploadFiles($file);
			} else {
				$fun=$fileUpload->uploadFile($file[$file_arr['key'][0]]);
			}
			if($fun<0){
				$this->messList[] = $fileUpload->getErrorMsg();
				return false;
			}else{
				return true;
			}	
		}
		
		private function imgToSql($names,$pid,$mode,$imgs=array()){
			$tabNameTmp=TAB_PREFIX."cms_deal_imgs";
			if($mode=='add'){
				$i=0;
				foreach($_FILES as $key=>$var){
					if(!$var['error']){
						$sort[]=intval(substr($key,9,1));
					}
				}
				foreach((array)$names as $val){
					$tmp.="('$val','$pid','$sort[$i]'),";
					$i++;
				}
				$tmp=substr($tmp,0,-1);
				$sql="INSERT INTO {$tabNameTmp} (img,deal_id,sort) VALUES {$tmp}";
				$result=$this->mysqli->query($sql);
				if($result){
					return true;
				} else {
					return false;
				}
			} else if($mode=='mod'){
				$tmp=array();
				foreach((array)$imgs as $val){
					if($val['id'])
						array_push($tmp,$val['sort']);
				}
				foreach((array)$names as $key=>$val){
					$sort=intval(substr($key,-1,1));
					if(in_array($sort,$tmp)){
						$sql[]="UPDATE {$tabNameTmp} SET img='{$val}' WHERE deal_id={$pid} and sort={$sort};";
					} else {
						$sql[]="INSERT INTO {$tabNameTmp} (img,deal_id,sort) VALUES ('{$val}','{$pid}','{$sort}');";
					}
				}
				foreach($sql as $var){
					if($this->mysqli->query($var)){
						$t=true;
					} else {
						$t=false;
					}
				}
				return $t;
				
			}

		}
		
		private function update_img($post){
			$val=$post['img'];
			$id=$post['id'];
			$sql = "UPDATE {$this->tabName} SET img='{$val}' WHERE id={$id}";
			$result=$this->mysqli->query($sql);

			if($result){
				return true;
			}else{
				return false;
			}
		}
		//==========================================
		// 函数: addDeal($fileUpload,$post,$file)
		// 功能: 用于向数据库中添加团购信息
		// 参数: post是用户在表单中提交的文章全部内容数组,$fileUpload是调用
		//		 FileUpload类,$file是提交的图片
		// 返回: true或false
		//==========================================	
		public function addDeal($fileUpload,$post,$file) {
			
		$post["description"]=stripslashes($post["description"]);
		$post['time_status']=$this->set_time_status($post);
		$post['begin_time']=strtotime($post['begin_time']);
		$post['end_time']=strtotime($post['end_time']);
		$post['coupon_begin_time']=strtotime($post['coupon_begin_time']);
		$post['coupon_end_time']=strtotime($post['coupon_end_time']);
		
		$file_arr=Common::check_files_num($file);
		foreach($post as $key=>$val){
			if($val==""){
				unset($post[$key]);
			}
		}
		
		foreach($file as $key=>$val){
			if(!$file[$key]['name']){
				unset($file[$key]);
			}
		}
		
		if($id=$this->add($post)){
			if($file_arr['num']){
				if($this->uploadPic($fileUpload,$file_arr,$file)){
					$name=$fileUpload->getNewFileMultiName();
					if($this->imgToSql($name,$id,"add")){
						
						$this->messList[] = "图片添加成功！";
						if($post['hasThumb']!=""){ //生成缩略图
							$tName="uploadPic".$post['hasThumb'];
							$ThumbName=$name[$tName];
							$gdImage=new GDImage(UPLOADPIC_PATH,$ThumbName);
							global $thumbSize;
							$post_temp=array("img"=>$gdImage->getNewThumbName(),"id"=>$id);
							if($gdImage->makeThumb($thumbSize["width"], $thumbSize["height"]) && $this->update_img($post_temp)){
								
								$this->messList[] = "生成缩略图片成功！";
							}else{
								$this->messList[] = "生成缩略图片失败！";
							}
						}
					} else {
						$this->messList[] = "图片添加失败！";
					}
					
					
					
					/*
					if(!empty($post['hasMark'])){	//加水印
							global $waterText;
							if($gdImage->waterMark($waterText)){
								$this->messList[] = "添加水印成功！";
								return true;
							}else{
								$this->messList[] = "添加水印失败！";
								return false;
							}
						}*/
					}
				} 
				
				$this->messList[] = "添加团购信息成功！";
				return true;
				
			}else{
					$this->messList[] = "添加团购信息失败！";
					return false;
			}
		}
		
		private function set_time_status($post){
			
			if(($post['begin_time']=="" || $post['begin_time']=="0") && ($post['end_time']=="" || $post['end_time']=="0")){
				return 1;
			} else if(($post['begin_time']!="" || $post['begin_time']!="0") && ($post['end_time']=="" || $post['end_time']=="0")){
				
				if(strtotime($post['begin_time'])>=time()){
					return 0;
				} else {
					return 1;
				}
			} else if(($post['begin_time']=="" || $post['begin_time']=="0") && ($post['end_time']!="" || $post['end_time']!="0")){
				
				if(strtotime($post['end_time'])>time()){
					return 1;
				} else {
					return 2;
				}
			} else {
				
				if(strtotime($post['begin_time'])<time() && strtotime($post['end_time'])>time()){
					return 1;
				} else if(strtotime($post['begin_time'])>time()){
					return 0;
				} else if(strtotime($post['end_time'])<time()){
					return 2;
				}
			}
		}
		
		//==========================================
		// 函数: modDeal($post)
		// 功能: 用于向数据库中修改团购信息
		// 参数: post是用户在表单中提交的文章全部内容数组
		// 返回: true或false
		//==========================================	
		public function modDeal($fileUpload,$post,$file,$imgs) {
		
			$post["description"]=stripslashes($post["description"]);
			$post['time_status']=$this->set_time_status($post);
			if($post['begin_time']==""){
				$post['begin_time']=0;
			}else {
				$post['begin_time']=strtotime($post['begin_time']);
			}
			if($post['end_time']==""){
				$post['end_time']=0;
			}else {
				$post['end_time']=strtotime($post['end_time']);
			}
			if($post['coupon_begin_time']==""){
				$post['coupon_begin_time']=0;
			}else {
				$post['coupon_begin_time']=strtotime($post['coupon_begin_time']);
			}
			if($post['coupon_end_time']==""){
				$post['coupon_end_time']=0;
			}else {
				$post['coupon_end_time']=strtotime($post['coupon_end_time']);
			}
			$file_arr=Common::check_files_num($file);
			
			foreach($post as $key=>$val){
				if($val===""){
					unset($post[$key]);
				}
			}
			
			foreach($file as $key=>$val){
				if(!$file[$key]['name']){
					unset($file[$key]);
				}
			}
			if($file_arr['num']){
				
				if($this->uploadPic($fileUpload,$file_arr,$file)){
					if($file_arr['num']>1){
						$name=$fileUpload->getNewFileMultiName();
					} else {
						$name=array($file_arr['key'][0]=>$fileUpload->getNewFileName());
					}
					if($this->imgToSql($name,$post['id'],"mod",$imgs)){
						$this->messList[] = "图片修改成功！";
					} else {
						$this->messList[] = "图片修改失败！";
					}
				}
				if($post['hasThumb']!=""){ //生成缩略图
					$tName=basename($post["pic".$post['hasThumb']]);
					$gdImage=new GDImage(UPLOADPIC_PATH,$tName);
					global $thumbSize;
					$post_temp=array("img"=>$gdImage->getNewThumbName(),"id"=>$post['id']);
					if($gdImage->makeThumb($thumbSize["width"], $thumbSize["height"]) && $this->update_img($post_temp)){
						
						$this->messList[] = "生成缩略图片成功！";
					}else{
						$this->messList[] = "生成缩略图片失败！";
					}
				}
				
				if($this->mod($post)){
					$this->messList[] = "修改成功！";
					return true;
				}else{
					$this->messList[] = "修改失败！";
					
					return false;
				}
				
			} else {
				
				if($post['hasThumb']!=""){ //生成缩略图
					$tName=basename($post["pic".$post['hasThumb']]);
					$gdImage=new GDImage(UPLOADPIC_PATH,$tName);
					global $thumbSize;
					$post_temp=array("img"=>$gdImage->getNewThumbName(),"id"=>$post['id']);
					if($gdImage->makeThumb($thumbSize["width"], $thumbSize["height"]) && $this->update_img($post_temp)){
						
						$this->messList[] = "生成缩略图片成功！";
					}else{
						$this->messList[] = "生成缩略图片失败！";
					}
				}
				if($this->mod($post)){
					$this->messList[] = "修改成功！";
					return true;
				}else{
					$this->messList[] = "修改失败！";
					return false;
				}
			}
		}
		
		//==========================================
		// 函数: delDeal($id)
		// 功能: 将团购信息放入回收站内
		// 参数: id是城市ID
		// 返回: true或false
		//==========================================
		public function delDeal($post){
			if($this->mod($post)){
				$this->messList[] = "删除成功！";
				return true;
			}else{
				$this->messList[] = "删除失败！";
				return false;
			}
		}
		
		//==========================================
		// 函数: delCategories($id)
		// 功能: 将团购信息组放入回收站内
		// 参数: id是数组ID
		// 返回: true或false
		//==========================================
		function delDeals($id) {
			if(count($id)==0){
				$this->messList[] = "请选择您要删除的团购信息！";
				return false;
			}
			$sql = "UPDATE {$this->tabName} SET is_delete=1 WHERE id ";
			if(is_array($id)) {
				$sql .= "IN (" . join(",", $id) . ")";

			}else{
				$sql .= "= $id";
			}

			if($this->mysqli->query($sql)){
				$this->messList[] = "批量删除成功！";
				return true;
			}else{
				$this->messList[] = "批量删除失败！";
				return false;
			}
		}
		
				
		//同步未过期团购的状态
		function syn_dealing(){
			$deals = $this->getAll("select id from ".TAB_PREFIX."cms_deal where time_status <> 2");
			
			foreach($deals as $v)
			{
				$this->syn_deal_status($v['id']);
			}
		}
		
		//同步XXID的团购商品的状态,time_status,buy_status
		function syn_deal_status($id){
			$deal_info=$this->get($id);
			//时间状态
			//1 无开始与结束时间
			if($deal_info['begin_time']==0&&$deal_info['end_time']==0)
			{
				if($deal_info['time_status']!=1)
				{
					$temp=array("time_status"=>1,"id"=>$id);
					$this->mod($temp);
				}
			}
			//2 无开始时间，有结束时间
			if($deal_info['begin_time']==0&&$deal_info['end_time']!=0)
			{
				
				//进行中
				if($deal_info['end_time']>Common::get_gmtime())
				{
					if($deal_info['time_status']!=1)
					{
						$temp=array("time_status"=>1,"id"=>$id);
						$this->mod($temp);
					}
				}
				//过期
				if($deal_info['end_time']<=Common::get_gmtime())
				{
					if($deal_info['time_status']!=2)
					{
						$temp=array("time_status"=>2,"id"=>$id);
						$this->mod($temp);
					}
				}
			}
			
			//3 有开始时间，无结束时间
			if($deal_info['begin_time']!=0&&$deal_info['end_time']==0)
			{
				//进行中
				if($deal_info['begin_time']<=Common::get_gmtime())
				{
					if($deal_info['time_status']!=1)
					{
						$temp=array("time_status"=>1,"id"=>$id);
						$this->mod($temp);
					}
				}
				//未开始
				if($deal_info['begin_time']>Common::get_gmtime())
				{
					if($deal_info['time_status']!=0)
					{
						$temp=array("time_status"=>0,"id"=>$id);
						$this->mod($temp);
					}
				}
			}
			
			//4 开始结束都有时间
			if($deal_info['begin_time']!=0&&$deal_info['end_time']!=0)
			{
				//未开始
				if($deal_info['begin_time']>Common::get_gmtime())
				{
					if($deal_info['time_status']!=0)
					{
						$temp=array("time_status"=>0,"id"=>$id);
						$this->mod($temp);
					}
				}
				//进行中
				if($deal_info['begin_time']<=Common::get_gmtime()&&$deal_info['end_time']>Common::get_gmtime())
				{
					if($deal_info['time_status']!=1)
					{
						$temp=array("time_status"=>1,"id"=>$id);
						$this->mod($temp);
					}
				}
				//过期
		
				if($deal_info['end_time']<=Common::get_gmtime())
				{
					if($deal_info['time_status']!=2)
					{
						$temp=array("time_status"=>2,"id"=>$id);
						$this->mod($temp);
					}
				}		
			}
			
			//开始更新 buy_status
			
				//未成功
				if($deal_info['buy_count']<$deal_info['min_bought'])
				{
					if($deal_info['buy_status']!=0)
					{
						$temp=array("buy_status"=>0,"success_time"=>0,"id"=>$id);
						$this->mod($temp);
					}
				}
				//成功未卖光
				if($deal_info['buy_count']>=$deal_info['min_bought']&&(($deal_info['buy_count']<$deal_info['max_bought']&&$deal_info['max_bought']>0)||$deal_info['max_bought']==0))
				{
					if($deal_info['buy_status']!=1)
					{
						$temp=array("buy_status"=>1,"success_time"=>Common::get_gmtime(),"id"=>$id);
						$this->mod($temp);
					}
				}
				//卖光
				if($deal_info['buy_count']>=$deal_info['max_bought']&&$deal_info['max_bought']>0) //库存零表示不限
				{
					if($deal_info['buy_status']!=2)
					{
						$temp=array("buy_status"=>2,"id"=>$id);
						$this->mod($temp);
					}
				}
		
				//同步成功后，发相应的团购券发券
				$buy_status = $this->getOne("select buy_status from ".TAB_PREFIX."cms_deal where id = ".$id);
				if($buy_status > 0)
				{
					//成功后发券, 将user_id <> 0 且 is_valid = 0的发放出去
					$deal_coupons = $this->getAll("select * from ".TAB_PREFIX."cms_deal_coupon where user_id <> 0 and is_valid = 0 and is_delete = 0 and deal_id = ".$id);
					foreach($deal_coupons as $deal_coupon)
					{
						$this->send_deal_coupon($deal_coupon['id']);	
					}			
				}
		}
		
		//发放团购券
		function send_deal_coupon($deal_coupon_id)
		{
			$result=$this->mysqli->query("update ".TAB_PREFIX."cms_deal_coupon set is_valid = 1 where id = ".$deal_coupon_id." and user_id <> 0 and is_delete = 0 and is_valid = 0");
			$rs = $result->affected_rows;
			if($rs)
			{
				$deal_coupon=new DealCoupon();
				//发邮件团购券
				$deal_coupon->send_deal_coupon_mail($deal_coupon_id);
				//发短信团购券
				$deal_coupon->send_deal_coupon_sms($deal_coupon_id);			
			}
		}
		//==========================================
		// 函数: get_deals()
		// 功能: 获取团购信息列表
		// 参数: is_delete:是否为已删除,is_all:是否是全部列出,offset:is_all为否的话偏移量,num:个数
		// 返回: false或列表
		//==========================================
		public function get_deals($is_all=true,$offset=0,$num=0){
			!$is_all?$limit=" LIMIT {$offset}, {$num}":$limit="";
			$sql="select * from {$this->tabName} where is_delete!=1 order by sort asc".$limit;
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
		
		
		
		//筛选用于在前台显示的团购
		//所有的输入参数都是可选的，$offset要从哪行开始，$num要几行数据
		public function get_front_deal($id=0,$cate_id=0,$city_id=0,$type=1,$offset=0,$num=0){
			if($id>0){
				$deal=$this->getAll("select * from ".TAB_PREFIX."cms_deal where id = ".intval($id)." and status = 1 and is_delete = 0 ");
			}
			if(!$deal){//如果$deal为空，主要是$id为0的时候
				$condition="";
				$time_condition=' and ( 1<>1 ';
				$time=Common::get_gmtime();
				if($offset!=0 || $num!=0){
					$limit=" LIMIT {$offset}, {$num}";
				} else{
					$limit="";
				}
				if($id){
					$condition.=" and id={$id}";
				}
				if($cate_id){
					$all=$this->getAll("select id,pid from ".TAB_PREFIX."cms_deal_category where status=1");
					$arr=$this->get_child_datas($cate_id,$all);
					$condition.=" and cate_id in (".implode(",",$arr).")";
				}
				if($city_id){
					$all=$this->getAll("select id,pid from ".TAB_PREFIX."cms_city where status=1");
					$arr=$this->get_child_datas($city_id,$all);
					$condition.=" and city_id in (".implode(",",$arr).")";
					
				}
				switch($type){
					case 1:
						$time_condition .= " or ((".$time.">= begin_time or begin_time = 0) and (".$time."<end_time or end_time = 0) and buy_status <> 2) ";
					break;
					case 2:
						$time_condition .= " or ((".$time.">=end_time and end_time <> 0) or buy_status = 2) ";
					break;
					case 3:
						$time_condition .= " or ((".$time." < begin_time and begin_time <> 0)) ";
					break;
				}
				$time_condition .= ')';
				$sql="select * from {$this->tabName} where is_delete!=1 and status=1 and buy_type = 0".$time_condition.$condition." order by sort desc".$limit;
				$result=$this->mysqli->query($sql);
				if(!$result){
					return false;
				} else {
					while($item=$result->fetch_assoc()){
						if($item['img']){
							$item['img']=APP_PATH."admin/uploadFiles/".$item['img'];
						}
						$item['origin_price']=number_format($item['origin_price'],2);
						$item['current_price']=number_format($item['current_price'],2);
						$item['return_money']=number_format($item['return_money'],2);
						$item['weight']=number_format($item['weight'],2);
						$item['discount']=number_format($item['discount'],1);
						
						if($item['origin_price']>0&&floatval($item['discount'])==0){ //手动折扣
							$item['save_price'] = $item['origin_price'] - $item['current_price'];	
						}else{
							$item['save_price'] = $item['origin_price']*((10-$item['discount'])/10);
						}
						
						if($item['origin_price']>0&&floatval($item['discount'])==0){
							$item['discount'] = round(($item['current_price']/$item['origin_price'])*10,2);
						}
						$item['discount'] = round($item['discount'],2);
						$item['link']=Common::rewrite_url(APP_PATH."deal.php?id=".$item['id']);
						$temp[]=$item;
						
					}
					return $temp;
				}
			} else{//如果$deal不为空，主要是$id>0的时候
				if($row['time_status']==0 && $row['begin_time']==0 || $row['begin_time']<Common::get_gmtime()){
					$this->syn_deal_status($deal['id']);
				}
				foreach($deal as $k=>$item){//价格信息
					if($item['img']){
						$item['img']=APP_PATH."admin/uploadFiles/".$item['img'];
					}
					$item['origin_price']=number_format($item['origin_price'],2);
					$item['current_price']=number_format($item['current_price'],2);
					$item['return_money']=number_format($item['return_money'],2);
					$item['weight']=number_format($item['weight'],2);
					$item['discount']=number_format($item['discount'],1);
					
					if($item['origin_price']>0&&floatval($item['discount'])==0){ //手动折扣
						$item['save_price'] = $item['origin_price'] - $item['current_price'];	
					}else{
						$item['save_price'] = $item['origin_price']*((10-$item['discount'])/10);
					}
					
					if($item['origin_price']>0&&floatval($item['discount'])==0){
						$item['discount'] = round(($item['current_price']/$item['origin_price'])*10,2);
					}
					$item['discount'] = round($item['discount'],2);
					$item['link']=Common::rewrite_url(APP_PATH."deal.php?id=".$item['id']);
					$deal[$k]=$item;
				}
				//商户信息
				$deal[0]['supplier_info'] = $this->getAll("select * from ".TAB_PREFIX."cms_supplier where id = ".intval($deal[0]['supplier_id']));
				$deal[0]['supplier_info'][0]["preview"]=APP_PATH."admin/uploadFiles/".$deal[0]['supplier_info'][0]["preview"];
				$deal[0]['img_list']=$this->getAll("select * from ".TAB_PREFIX."cms_deal_imgs where deal_id = ".intval($id)." order by sort asc");
				foreach($deal[0]['img_list'] as $key=>$var){
					$var['img']=APP_PATH."admin/uploadFiles/".$var['img'];
					$deal[0]['img_list'][$key]=$var;
				}
				$s_m = $this->getAll("select * from ".TAB_PREFIX."cms_supplier_location where supplier_id = ".intval($deal[0]['supplier_id'])." and is_main = 1");
				$s_nm=$this->getAll("select * from ".TAB_PREFIX."cms_supplier_location where supplier_id = ".intval($deal[0]['supplier_id'])." and is_main = 0");
				$deal[0]['supplier_address_info']=array_merge($s_m,$s_nm);
				foreach($deal[0]['supplier_address_info'] as $k=>$var){
					$var['api_address']=urlencode($var['api_address']);
					$deal[0]['supplier_address_info'][$k]=$var;
				}
				
				//属性列表
				$deal_attrs_res = $this->getAll("select * from ".TAB_PREFIX."cms_deal_attr where deal_id = ".intval($deal[0]['id']));
				if($deal_attrs_res)
				{
					foreach($deal_attrs_res as $k=>$v)
					{
						$deal_attr[$v['goods_type_attr_id']]['name'] = $this->getOne("select name from ".TAB_PREFIX."goods_type_attr where id = ".intval($v['goods_type_attr_id']));
						$deal_attr[$v['goods_type_attr_id']]['attrs'][] = $v;
					}
					$deal[0]['deal_attr_list'] = $deal_attr;
				}
				return $deal;
			}
			
		}
		
		
		/*取得子集并形成数组*/
		private function get_child_datas($id=0,$datas=array(),$ids=array()){
			$ids[]=$id;
			foreach($datas as $value){
				if($value['pid']==$id){
					return $this->get_child_datas($value['id'],$datas,$ids);
				}
			}
			return $ids;
		}
		
		
		public function get_detail($id){
			$id = intval($id);
			$deal_info=$this->get($id);
			$data=array();
			//购买的单数
			$real_user_count = intval($this->getOne("select count(distinct(do.id)) from ".TAB_PREFIX."cms_deal_order_item as doi left join ".TAB_PREFIX."cms_deal_orders as do on doi.order_id = do.id where doi.deal_id = ".$id." and do.pay_status = 2"));
			$real_buy_count =  intval($this->getOne("select sum(doi.number) from ".TAB_PREFIX."cms_deal_order_item as doi left join ".TAB_PREFIX."cms_deal_orders as do on doi.order_id = do.id where doi.deal_id = ".$id." and do.pay_status = 2"));
			$real_coupon_count = intval($this->getCount("select id from ".TAB_PREFIX."cms_deal_coupon where deal_id=".$id." and is_valid=1"));
			
			//总收款，不计退款
			$pay_total_rows = $this->getAll("select pn.money from ".TAB_PREFIX."cms_payment_notice as pn left join ".TAB_PREFIX."cms_deal_orders as do on pn.order_id = do.id left join ".TAB_PREFIX."cms_deal_order_item as doi on do.id = doi.order_id where do.pay_status = 2 and doi.deal_id = ".$id." and pn.is_paid = 1 group by pn.id");
			$pay_total = 0;
			foreach($pay_total_rows as $money){
				$pay_total = $pay_total + floatval($money['money']);
			}
			//每个支付方式下的收款
			$payment_list = $this->get_other_datas("cms_payment","*");
			foreach($payment_list as $k=>$v){
				$payment_pay_total = 0;
				$payment_pay_total_rows = $this->getAll("select pn.money from ".TAB_PREFIX."cms_payment_notice as pn left join ".TAB_PREFIX."cms_deal_orders as do on pn.order_id = do.id left join ".TAB_PREFIX."cms_deal_order_item as doi on do.id = doi.order_id where do.pay_status = 2 and doi.deal_id = ".$id." and pn.is_paid = 1 and pn.payment_id = ".$v['id']." group by pn.id");
				foreach($payment_pay_total_rows as $money)
				{
					$payment_pay_total = $payment_pay_total + floatval($money['money']);
				}	
				$payment_list[$k]['pay_total'] = $payment_pay_total;
			}
			//订单实收
			$order_total = 0;
			$order_total_rows = $this->getAll("select do.pay_amount as money from ".TAB_PREFIX."cms_deal_orders as do inner join ".TAB_PREFIX."cms_deal_order_item as doi on do.id = doi.order_id where do.pay_status = 2 and doi.deal_id = ".$id." group by do.id");
			foreach($order_total_rows as $money){
				$order_total = $order_total + floatval($money['money']);
			}
			//额外退款的订单
			$extra_count = $this->getOne("select count(distinct(do.id)) from ".TAB_PREFIX."cms_deal_orders as do left join ".TAB_PREFIX."cms_deal_order_item as doi on do.id = doi.order_id where do.extra_status > 0 and doi.deal_id = ".$id);
			//额外退款的订单
			$aftersale_count = $this->getOne("select count(distinct(do.id)) from ".TAB_PREFIX."cms_deal_orders as do left join ".TAB_PREFIX."cms_deal_order_item as doi on do.id = doi.order_id where do.after_sale > 0 and doi.deal_id = ".$id);
			//售后退款
			$refund_money = 0;
			$refund_total_rows = $this->getAll("select do.refund_money as money from ".TAB_PREFIX."cms_deal_orders as do inner join ".TAB_PREFIX."cms_deal_order_item as doi on do.id = doi.order_id where do.pay_status = 2 and doi.deal_id = ".$id." group by do.id");
			foreach($refund_total_rows as $money){
				$refund_money = $refund_money + floatval($money['money']);
			}
			$data=array("deal_info"=>$deal_info,"real_user_count"=>$real_user_count,"real_buy_count"=>$real_buy_count,"real_coupon_count"=>$real_coupon_count,"pay_total"=>$pay_total,"payment_list"=>$payment_list,"order_total"=>$order_total,"extra_count"=>$extra_count,"aftersale_count"=>$aftersale_count,"refund_money"=>$refund_money);
			return $data;
		}
		
		
		public function check_deal_time($id){
			$deal_info=$this->get($id);
			$now = Common::get_gmtime();
			//开始验证团购时间
			if($deal_info['begin_time']!=0){
				//有开始时间
				if($now<$deal_info['begin_time'])
				{		
					$result['status'] = 0;
					$result['data'] = 3;  //未上线
					$result['info'] = $deal_info['sub_name'];
					return $result;
				}
			}
			if($deal_info['end_time']!=0){
				//有结束时间
				if($now>=$deal_info['end_time'])
				{
					$result['status'] = 0;
					$result['data'] = 2;  //过期
					$result['info'] = $deal_info['sub_name'];
					return $result;
				}
			}
			//验证团购时间
			
			$result['status'] = 1;
			$result['info'] = $deal_info['name'];
			return $result;
		}
		
		public function check_deal_number($id,$number=0){
			$id = intval($id);
			$deal_status=array("DEAL_OUT_OF_STOCK"=>4,"DEAL_ERROR_MIN_USER_BUY"=>5,"DEAL_ERROR_MAX_USER_BUY"=>6,"EXIST_DEAL_COUPON_SN"=>1);
			$user_info=$_SESSION['user_info']?$_SESSION['user_info']:array("id"=>0);
			$deal_info=$this->get($id);
			$deal_buy_count = intval($deal_info['buy_count']);
			$deal_user_cart_count = intval($this->getOne("select sum(number) from ".TAB_PREFIX."cms_deal_cart where session_id='".session_id()."' and deal_id =".$id." and user_id = ".intval($user_info['id'])));
			$deal_user_paid_count = intval($this->getOne("select sum(oi.number) from ".TAB_PREFIX."cms_deal_order_item as oi left join ".TAB_PREFIX."cms_deal_order as o on oi.order_id = o.id where o.user_id = ".intval($user_info['id'])." and o.pay_status = 2 and oi.deal_id = ".$id." and o.is_delete = 0"));
			$deal_user_unpaid_count = intval($this->getOne("select sum(oi.number) from ".TAB_PREFIX."cms_deal_order_item as oi left join ".TAB_PREFIX."cms_deal_order as o on oi.order_id = o.id where o.user_id = ".intval($user_info['id'])." and o.pay_status <> 2 and oi.deal_id = ".$id." and o.is_delete = 0"));
			if($deal_user_cart_count + $deal_buy_count + $deal_user_unpaid_count + $number > $deal_info['max_bought'] && $deal_info['max_bought'] > 0)
			{		
				$result['status'] = 0;
				$result['data'] = $deal_status['DEAL_OUT_OF_STOCK'];  //库存不足
				$result['info'] = $deal_info['sub_name']." ".sprintf("库存为%s件",$deal_info['max_bought']);
				return $result;
			}
			if($deal_user_cart_count + $deal_user_paid_count + $number < $deal_info['user_min_bought'] && $deal_info['user_min_bought'] > 0)
			{
				$result['status'] = 0;
				$result['data'] = $deal_status['DEAL_ERROR_MIN_USER_BUY'];  //用户最小购买数不足
				$result['info'] = $deal_info['sub_name']." ".sprintf("每个用户最少要买%s件",$deal_info['user_min_bought']);
				return $result;
			}
			if($deal_user_cart_count + $deal_user_paid_count + $deal_user_unpaid_count + $number > $deal_info['user_max_bought'] && $deal_info['user_max_bought'] > 0)
			{
				$result['status'] = 0;
				$result['data'] = $deal_status['DEAL_ERROR_MAX_USER_BUY'];  //用户最大购买数超出
				$result['info'] = $deal_info['sub_name']." ".sprintf("每个用户最多买%s件",$deal_info['user_max_bought']);
				return $result;
			}
			/*验证数量*/
			
			$result['status'] = 1;
			$result['info'] = $deal_info['sub_name'];
			return $result;	
			
		}
		
		//==========================================
		// 函数: validateForm()
		// 功能: 对添加的内容或修改的内容进行验证
		// 参数: 无
		// 返回: true或false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['name'])){
				$this->messList[] = "团购名称不能为空!";
				$result=false;
			}
			if(!Validate::checkLength($_POST['name'], 40)) {
				$this->messList[] = "团购名称不能超过20个字符!";
				$result=false;
			}
			if(!Validate::required($_POST['sort'])){
				$this->messList[] = "排序不能为空!";
				$result=false;
			}
			if(!Validate::isNumber($_POST['sort'])){
				$this->messList[] = "排序必须为数字!";
				$result=false;
			}
			if(!Validate::noZero($_POST['cate_id'])) {
				$this->messList[] = "请选择团购分类!";
				$result=false;
			}
			if(!Validate::noZero($_POST['city_id'])) {
				$this->messList[] = "请选择城市!";
				$result=false;
			}
			if(!Validate::noZero($_POST['supplier_id'])) {
				$this->messList[] = "请选择团购供应商!";
				$result=false;
			}
			if(Validate::required($_POST['begin_time']) && Validate::required($_POST['end_time'])) {
				if($_POST['begin_time']>$_POST['end_time']){
					$this->messList[] = "团购开始时间不能大于结束时间!";
					$result=false;
				}
			}
			
			if(Validate::required($_POST['coupon_begin_time']) && Validate::required($_POST['coupon_end_time'])) {
				if($_POST['coupon_begin_time']>$_POST['coupon_end_time']){
					$this->messList[] = "团购券生效时间不能大于结束时间!";
					$result=false;
				}
			}
			return  $result;
		}	
		
		//获取团购信息总个数(false=未删除,true=已删除)
		public function get_deals_num($is_delete=false){
			if(!$is_delete){
				$sql="select id from {$this->tabName} where is_delete!=1";
			} else {
				$sql="select id from {$this->tabName}";
			}
			$result=$this->mysqli->query($sql);
			return $result->num_rows;
		}
	}
	
?>